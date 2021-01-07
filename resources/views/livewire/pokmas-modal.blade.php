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
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="">Desa</label>
                            <input type="text" class="form-control form-control-border" wire:model="desa"
                            >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="Kecamatan">Kecamatan</label>
                            <input type="text" class="form-control form-control-border" wire:model="kec"
                            >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="Kabupaten">Kabupaten</label>
                            <input type="text" class="form-control form-control-border" wire:model="kab"
                            >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="Kegiatan">Kegiatan</label>
                            <input type="text" class="form-control form-control-border" wire:model="keg"
                            >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="pagu">Pagu</label>
                            <input type="text" class="form-control form-control-border" wire:model="pagu"
                            >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control form-control-border" wire:model="status">
                                    <option value="new">Baru</option>
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
                                    <input type="text" disabled wire:model="user_id">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
