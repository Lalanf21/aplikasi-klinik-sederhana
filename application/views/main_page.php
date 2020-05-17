<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="col-lg-12 text-center">
            <h2>Selamat Datang !</h2>
            <h3>Sistem Informasi Klinik Wahyu</h3>
        </div>

        <div class="section-body">
            <!-- card -->
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Pasien</h4>
                            </div>
                            <div class="card-body">
                                <?= $pasien ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Dokter</h4>
                            </div>
                            <div class="card-body">
                                <?= $dokter ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-vial"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Obat</h4>
                            </div>
                            <div class="card-body">
                                <?= $obat ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengguna</h4>
                            </div>
                            <div class="card-body">
                                <?= $user ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir card -->
        </div>
    </section>
</div>
<!-- akhir main content -->