<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pendaftar</h1>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('pendaftaran/search') ?>
            <table>
                <tr>
                    <td><input type="text" name="search" class="form-control" placeholder="Pencarian"></td>
                    <td><button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button></td>
                    <td>
                        <a href="<?= base_url('pendaftaran') ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Refresh">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12 mt-2">
            <a href="<?= base_url('tambah-pendaftaran') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
            <?= $this->session->flashdata('alert') ?>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
            <table class="table table-striped text-uppercase text-center">
                <thead class="font-weight-bold table-dark">
                    <tr>
                        <td>No</td>
                        <td> Tanggal </td>
                        <td> Nama Pasien </td>
                        <td> Keluhan </td>
                        <td> Status </td>
                        <td> Opsi </td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($query->result() as $key) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $key->tgl_daftar ?></td>
                        <td><?= $key->nama_pasien ?></td>
                        <td><?= $key->keluhan ?></td>
                        <td><?= $key->status ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#m<?= $key->no_pendaftaran ?>"><i class="fas fa-eye"></i></a>
                            |
                            <a href="<?= base_url('ubah-pendaftaran/') . $key->no_pendaftaran ?>"><i class="fas fa-pen text-warning"></i></a>
                            |
                            <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('delete-pendaftaran/') . $key->no_pendaftaran ?>"><i class="fas fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="section-body">
        </div>
    </section>
</div>
<!-- akhir main content -->

<!-- Modal -->
<?php foreach ($query->result() as $key) : ?>
<div class="modal fade" id="m<?= $key->no_pendaftaran ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase text-center" id="exampleModalLabel"> Pasien <?= $key->nama_pasien ?> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <style type="text/css">
                    table td:nth-child(1) {
                        font-weight: bold;
                    }
                </style>
                <table class="table table-striped text-uppercase">
                    <tr>
                        <td>No pendaftaran</td>
                        <td><?= $key->no_pendaftaran ?></td>
                    </tr>
                    <tr>
                        <td>NO Urut</td>
                        <td><?= $key->no_urut ?></td>
                    </tr>
                    <tr>
                        <td>Nama dokter</td>
                        <td><?= $key->nama_pegawai ?></td>
                    </tr>
                    <tr>
                        <td>tgl daftar</td>
                        <td><?= $key->tgl_daftar ?></td>
                    </tr>
                    <tr>
                        <td>Keluhan</td>
                        <td><?= $key->keluhan ?></td>
                    </tr>
                    <tr>
                        <td>status</td>
                        <td><?= $key->status ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>