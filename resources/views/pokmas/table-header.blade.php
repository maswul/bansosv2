<div wire:ignore.self class="modal fade" id="pokmas-Tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pokmas - {{ $nama }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="#">
                    @csrf
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="">Pokmas</label>
                            <input type="text" class="form-control form-control-border" wire:model="nama"
                                placeholder="Nama Pokmas">
                            @error('nama') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="">Desa</label>
                            <input type="text" class="form-control form-control-border" wire:model="desa">
                            @error('desa') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="Kecamatan">Kecamatan</label>
                            <input type="text" class="form-control form-control-border" wire:model="kec">
                            @error('kec') <span class="error">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="Kabupaten">Kabupaten</label>
                            <input type="text" class="form-control form-control-border" wire:model="kab">
                            @error('kab') <span class="error">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="Kegiatan">Kegiatan</label>
                            <input type="text" class="form-control form-control-border" wire:model="keg">
                            @error('keg') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="pagu">Pagu</label>
                            <input type="text" class="form-control form-control-border" wire:model="pagu">
                            @error('pagu') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control form-control-border" wire:model="status">
                                    <option value="0">Baru</option>
                                    <option value="1">Verifikasi</option>
                                    <option value="2">Survei</option>
                                    <option value="3">NPHD</option>
                                    <option value="4">LPJ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="">Users</label>
                                @if (Auth::user()->role < 3)
                                    <select class="form-control form-control-border" wire:model="user_id">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <input type="hidden" wire:model="user_id">
                                    <input type="text" disabled value="{{ Auth::user()->nip }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="">Kontak</label>
                                <input type="text" class="form-control form-control-border" wire:model="kontak_nama">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="">No HP</label>
                                <input type="text" class="form-control form-control-border" wire:model="kontak_noHP">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="cancel" type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
                <button wire:click.prevent="simpanData" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

@include('pokmas.detail')

<div class="btn-group">
    <a class="btn btn-social btn-flat btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i
            class="fa fa-plus"></i> Tambah</a>
    <div class="text-sm dropdown-menu" aria-labelledby="triggerId">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#pokmas-Tambah">Tambah Manual</a>
        @if (Auth::user()->role < 3)
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#pokmas-Impor">Impor Excel</a>
        @endif
    </div>
</div>


<a name="" id=""
    class="btn btn-social btn-flat btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
    href="#" role="button" onclick="confirm('Are you sure?') || event.stopImmediatePropagation();"
    wire:click="usrDeleteChecked"><i class="fa fa-trash"></i> Hapus </a>

<div class="btn-group">
    <a class="btn btn-social btn-flat btn-info btn-sm dropdown-toggle" data-toggle="dropdown"><i
            class="fa fa-arrow-circle-down" aria-hidden="true"></i> Aksi</a>
    <div class="text-sm dropdown-menu" aria-labelledby="triggerId">
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#pokmas-Detail">Cetak NPHD</a>
    </div>
</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript">
        window.addEventListener('swal', function(e) {
            Swal.fire(e.detail);
        });

        window.livewire.on('pokmasSimpan', () => {
            $('#pokmas-Tambah').modal('hide');
        });

        window.livewire.on('pokmasDetail', (e) => {
            $('#pokmas-Detail').modal(e);
        });

    </script>
@endpush
