<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Klinik Wahyu</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/all.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/jquery-ui/jquery-ui.min.css') ?>">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/component.css') ?>">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg bg-danger"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                </ul>
                <ul class="navbar-nav navbar-right ml-auto">
                    <h4 class="text-uppercase font-weight-bold text-white">
                        <?= $this->session->userdata('level') ?>
                    </h4>
                </ul>
                <ul class="navbar-nav navbar-right ml-auto">
                    <p class="text-lowercase font-weight-bold text-muted">
                        <?= $this->session->userdata('username') ?>
                    </p>
                </ul>
            </nav>
            <div class="main-sidebar bg-dark">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href=""> <i class="fas fa-hospital"></i> Klinik Wahyu</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href=""><i class="fas fa-clinic-medical"></i></a>
                    </div>
                    <ul class="sidebar-menu">
                        <!-- Superadmin dan admin -->
                        <?php if ($this->session->userdata('level') == 'superadmin' || $this->session->userdata('level') == 'admin') : ?>
                            <?php if ($this->uri->segment('1') == 'dashboard') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('dashboard') ?>"><i class="fas fa-tachometer-alt"></i></i><span>Dashboard</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('dashboard') ?>"><i class="fas fa-tachometer-alt"></i></i><span>Dashboard</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'user') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('user') ?>"><i class="fas fa-users"></i></i><span>user</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('user') ?>"><i class="fas fa-users"></i></i><span>user</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'obat') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('obat') ?>"><i class="fas fa-capsules"></i></i><span>Obat</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('obat') ?>"><i class="fas fa-capsules"></i></i><span>Obat</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'jenis_obat') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('jenis_obat') ?>"><i class="fas fa-mortar-pestle"></i><span>Jenis Obat</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('jenis_obat') ?>"><i class="fas fa-mortar-pestle"></i><span>Jenis Obat</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'pasien') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('pasien') ?>"><i class="fas fa-user-shield"></i><span>Pasien</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('pasien') ?>"><i class="fas fa-user-shield"></i><span>Pasien</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'pendaftaran') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('pendaftaran') ?>"><i class="fas fa-user-plus"></i><span>Pendaftaran</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('pendaftaran') ?>"><i class="fas fa-user-plus"></i><span>Pendaftaran</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'pegawai') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('pegawai') ?>"><i class="fas fa-user-nurse"></i><span>Pegawai</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('pegawai') ?>"><i class="fas fa-user-nurse"></i><span>Pegawai</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'resep') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('resep') ?>"><i class="fas fa-file-invoice"></i><span>Resep</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('resep') ?>"><i class="fas fa-file-invoice"></i><span>Resep</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'kategori') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('kategori') ?>"><i class="fas fa-stethoscope"></i><span>Kategori</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('kategori') ?>"><i class="fas fa-stethoscope"></i><span>Kategori</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'pembayaran') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('pembayaran') ?>"><i class="fas fa-money-bill-wave-alt"></i><span>Pembayaran</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('pembayaran') ?>"><i class="fas fa-money-bill-wave-alt"></i><span>Pembayaran</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'rekam-medis') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('rekam-medis') ?>"><i class="fas fa-file-invoice"></i><span>Rekam medis</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('rekam-medis') ?>"><i class="fas fa-file-invoice"></i><span>Rekam medis</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'laporan') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('laporan') ?>"><i class="fas fa-file-invoice-dollar"></i><span>Laporan</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('laporan') ?>"><i class="fas fa-file-invoice-dollar"></i><span>Laporan</span></a>
                                </li>
                            <?php endif ?>

                            <!-- Dokter -->
                        <?php elseif ($this->session->userdata('level') == 'dokter') : ?>
                            <?php if ($this->uri->segment('1') == 'resep') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('resep') ?>"><i class="fas fa-file-invoice"></i><span>Resep</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('resep') ?>"><i class="fas fa-file-invoice"></i><span>Resep</span></a>
                                </li>
                            <?php endif ?>
                            <?php if ($this->uri->segment('1') == 'rekam-medis') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('rekam-medis') ?>"><i class="fas fa-file-invoice"></i><span>Rekam medis</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('rekam-medis') ?>"><i class="fas fa-file-invoice"></i><span>Rekam medis</span></a>
                                </li>
                            <?php endif ?>
                            <!-- Apoteker -->
                        <?php elseif ($this->session->userdata('level') == 'apoteker') : ?>

                            <?php if ($this->uri->segment('1') == 'resep') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('resep') ?>"><i class="fas fa-file-invoice"></i><span>Resep</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('resep') ?>"><i class="fas fa-file-invoice"></i><span>Resep</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'obat') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('obat') ?>"><i class="fas fa-capsules"></i></i><span>Obat</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('obat') ?>"><i class="fas fa-capsules"></i></i><span>Obat</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'pembayaran') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('pembayaran') ?>"><i class="fas fa-money-bill-wave-alt"></i><span>Pembayaran</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('pembayaran') ?>"><i class="fas fa-money-bill-wave-alt"></i><span>Pembayaran</span></a>
                                </li>
                            <?php endif ?>
                            <!-- Administrasi -->
                        <?php elseif ($this->session->userdata('level') == 'administrasi') : ?>
                            <?php if ($this->uri->segment('1') == 'pendaftaran') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('pendaftaran') ?>"><i class="fas fa-user-plus"></i><span>Pendaftaran</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('pendaftaran') ?>"><i class="fas fa-user-plus"></i><span>Pendaftaran</span></a>
                                </li>
                            <?php endif ?>

                            <?php if ($this->uri->segment('1') == 'pasien') : ?>
                                <li class="nav-item active">
                                    <a href="<?= base_url('pasien') ?>"><i class="fas fa-user-shield"></i><span>Pasien</span></a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('pasien') ?>"><i class="fas fa-user-shield"></i><span>Pasien</span></a>
                                </li>
                            <?php endif ?>

                        <?php endif ?>
                        <li class="nav-item mt-5">
                            <a href="" data-toggle="modal" data-target="#logoutModal" class="btn btn-outline-danger"><i class="fas fa-power-off"></i></i><span>keluar</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <?php $this->load->view($konten) ?>
            <!-- akhir main -->

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2019 <div class="bullet"></div> Design By <a href="">Dea</a>
                </div>
                <div class="footer-right">
                    1.0.0
                </div>
            </footer>
        </div>
    </div>

    <!-- modal logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" Jika kamu Yakin untuk keluar dari halaman ini !</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('logout') ?>">LOGOUT</a>
                </div>
            </div>
        </div>
    </div>
    <!-- modal logout -->


    <!-- General JS Scripts -->
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/nice-scroll.js') ?>"></script>
    <script src="<?= base_url('assets/js/moment.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/stisla.js') ?>"></script>
    <script src="<?= base_url('vendor/jquery-ui/jquery-ui.min.js') ?>"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?= base_url('assets/js/scripts.js') ?>"></script>
    <script src="<?= base_url('/assets/js/custom.js') ?>"></script>
    <!-- Page Specific JS File -->

    <script>
        $(document).ready(function() {

            $("input#rekam").autocomplete({
                source: "<?= base_url('rekam_medis/get_auto') ?>",
                select: function(event, ui) {
                    $('input[name=nama]').val(ui.item.label);
                    $('input[name=no_pendaftaran]').val(ui.item.no_daftar);
                    $('input[name=keluhan]').val(ui.item.keluhan);
                    $('input[name=alamat]').val(ui.item.alamat);
                    $('input[name=no_ktp]').val(ui.item.no_ktp);
                }
            });

        });
    </script>

    <script>
        $("#add").click(function() {
            var form =
                '<tr>' +
                '<td>Nama obat</td>' +
                '<td>' +
                '<select name="nama_obat[]" class="form-control" multiple>' +
                '<option>--pilih--</option>' +
                '<?php foreach ($select->result() as $key) : ?>' +
                '<option value="<?= $key->nama_obat ?>">' +
                '<?= $key->nama_obat ?> </option>' +
                '<?php endforeach ?>' +
                '</select>' +
                '<span class="helper-text text-danger"><?= form_error('nama_obat[]') ?></span>' +
                '</td>' +
                '<td>' +
                '<input class="form-control" type="text" name="aturan_pakai[]" placeholder="Aturan Pakai ex: 3x1">' +
                '</td>' +
                '</tr>'

            $("#table").append(form)
            // alert("The text has been changed.");
        });
    </script>
</body>

</html>