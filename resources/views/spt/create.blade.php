<div wire:ignore.self class="modal fade" id="spt-Tambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buat SPT Baru.</h5>
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
                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="form-group">
                                <label>No. SPT</label>
                                <input type="text" class="form-control  ">
                            </div>
                            <div class="form-group">
                                <label>Tgl. Berangkat</label>
                                <input type="text" class="form-control" wire:model.lazy="tgl_berangkat">
                            </div>
                            <div class="form-group">
                                <label>Tgl. Kembali</label>
                                <input type="text" class="form-control" wire:model.lazy="tgl_kembali">
                            </div>
                            <div class="form-group">
                                <label>Lama Perjalanan</label>
                                <input type="text" class="form-control" wire:model.lazy="lama_perjalanan">
                            </div>
                            <div class="form-group">
                                <label>Berangkat Dari</label>
                                <input type="text" class="form-control" wire:model.lazy="berangkat_dari">
                            </div>
                            <div class="form-group">
                                <label>Kota Tujuan</label>
                                <input type="text" class="form-control" wire:model.lazy="kota_tujuan">
                            </div>
                            <div class="form-group">
                                <label>Alat Angkut</label>
                                <input type="text" class="form-control" wire:model.lazy="alat_angkut">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Dasar Pelaksanaan</label>
                                <input type="text" class="form-control" wire:model.lazy="dasar_pelaksanaan">
                            </div>
                            <div class="form-group">
                                <label>Kegiatan</label>
                                <input type="text" class="form-control" wire:model.lazy="kegiatan">
                            </div>
                            <div class="form-group">
                                <label>Nama Pelaksana</label>
                                <input type="text" class="form-control" wire:model.lazy="pelaksana">
                            </div>
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
