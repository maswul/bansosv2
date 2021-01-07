<div wire:ignore.self class="modal fade" id="pegawai-Tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Master Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="#">
                    @csrf
                    @if ($modeEdit)
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">User ID</label>
                        <div class="col-sm-10">

                            <input type="text" disabled class="text-sm form-control " wire:model="Pegawai_id">
                            @error('Pegawai_id') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">

                            <input type="text" class="text-sm form-control " wire:model="nip"
                                placeholder="Nomor Induk Pegawai">
                            @error('nip') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">

                            <input type="text" class="text-sm form-control " wire:model="nama"
                                placeholder="Pegawai, ST">
                            @error('nama') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pangkat</label>
                        <div class="col-sm-10">

                            <input type="text" class="text-sm form-control " wire:model="pangkat">
                            @error('pangkat') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Golongan</label>
                        <div class="col-sm-10">

                            <input type="text" class="text-sm form-control " wire:model="gol">
                            @error('gol') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">

                            <input type="text" class="text-sm form-control " wire:model="jabatan">
                            @error('jabatan') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No.HP/WA</label>
                        <div class="col-sm-10">

                            <input type="text" class="text-sm form-control " wire:model="noHP">
                            @error('noHP') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Satuan Kerja</label>
                        <div class="col-sm-10">

                            <input type="text" class="text-sm form-control " wire:model="satuan_kerja">
                            @error('satuan_kerja') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="cancel()" type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
                <button wire:click.prevent="store()" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="pegawai-Excel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload File Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form wire:submit.prevent="saveFiles">
                <div class="modal-body">

                    @csrf
                    <div class="form-group row">
                        <input type="file" wire:model="excel">
                        @error('excel') <span class="error">{{ $message }}</span> @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button wire:click.prevent="cancel()" type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<a name="" id=""
    class="btn btn-social btn-flat btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
    href="#" role="button" onclick="confirm('Are you sure?') || event.stopImmediatePropagation();"
    wire:click="usrDeleteChecked"><i class="fa fa-trash"></i> Hapus </a>

<a wire:click.prevent='tambahBaru()' href="#" class="btn btn-social btn-flat btn-success btn-sm"><i
        class="fa fa-plus"></i> Tambah</a>

<a data-toggle="modal" data-target="#" href="#pegawai-Excel" class="btn btn-social btn-flat btn-warning btn-sm"><i
        class="fa fa-plus"></i> Upload Excel</a>

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
        window.addEventListener('swal', function(e) {
            Swal.fire(e.detail);
        });

        window.livewire.on('pegawaiTambah', (e) => {
            $('#pegawai-Tambah').modal(e);
        });

    </script>
@endpush
