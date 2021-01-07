<div wire:ignore.self class="modal fade" id="anggaran-Tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Master Data Anggaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="#">
                    @csrf
                    @if ($modeEdit)
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Anggaran ID</label>
                            <div class="col-sm-8">

                                <input type="text" disabled class="text-sm form-control " wire:model="Anggaran_id">
                                @error('Anggaran_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tahun</label>
                        <div class="col-sm-8">

                            <input type="text" class="text-sm form-control " wire:model="tahun" placeholder="2020">
                            @error('tahun') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pagu Dalam Daerah</label>
                        <div class="col-sm-8">

                            <input type="text" id="" class="text-sm form-control "
                                wire:model.lazy="pagu_dlm_daerah">
                            @error('pagu_dlm_daerah') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pagu Luar Daerah</label>
                        <div class="col-sm-8">

                            <input type="text" id="" class="text-sm form-control " wire:model="pagu_luar_daerah">
                            @error('pagu_luar_daerah') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Pagu Dalam Kota</label>
                        <div class="col-sm-8">

                            <input type="text" id="" class="text-sm form-control " wire:model="pagu_dlm_kota">
                            @error('pagu_dlm_kota') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button wire:click.prevent="init()" type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
                <button wire:click.prevent="store()" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<a name="" id=""
    class="btn btn-social btn-flat btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
    href="#" role="button" onclick="confirm('Are you sure?') || event.stopImmediatePropagation();"
    wire:click="usrDeleteChecked"><i class="fa fa-trash"></i> Hapus </a>

<a href="#" wire:click="tambahAnggaran()" class="btn btn-social btn-flat btn-success btn-sm"><i class="fa fa-plus"></i>
    Tambah</a>


@push('js')

    <script type="text/javascript">

        window.livewire.on('anggaranTambah', (e) => {

            $('#anggaran-Tambah').modal(e);
        });

    </script>
@endpush
