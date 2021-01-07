<div class="container-fluid">
    {{-- Because she competes with no one, no one can compete with her. --}}

    @include("spt.create")

    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-gradient-warning">
                <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pagu Dalam Daerah</span>
                    <span class="info-box-number">Rp. 200.000.000,- / Rp. 500.000.000,-</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                  Jumlah SPT s/d saat ini
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-gradient-info">
                <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pagu luar Daerah</span>
                    <span class="info-box-number">Rp. 200.000.000,- / Rp. 500.000.000,-</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                    </div>
                    <span class="progress-description">
                  Jumlah SPT s/d saat ini
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box bg-gradient-danger">
                <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pagu Dalam Kota</span>
                    <span class="info-box-number">Rp. 200.000.000,- / Rp. 500.000.000,-</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 90%"></div>
                    </div>
                    <span class="progress-description">
                  Jumlah SPT s/d saat ini
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>

    {{-- Data View ROW, SPT --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Surat Perintah Tugas</h1>
                    <div class="card-tools">
                        <a class="btn btn-primary" href="#" role="button" wire:click.prevent="buat()">Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-responsive">
                        <thead class="">
                        <tr>
                            <th>No.</th>
                            <th>Tgl. Berangkat</th>
                            <th>Nama</th>
                            <th>No. SPT</th>
                            <th>Kegiatan</th>
                            <th>Tujuan</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-muted">
                    Right reserved by AMPLP.2020
                </div>
            </div>
        </div>
    </div>
</div>
@push("js")
    <script type="text/javascript">
        window.livewire.on('sptTambah', (e) => {
            $('#spt-Tambah').modal(e);
        });
    </script>
@endpush
