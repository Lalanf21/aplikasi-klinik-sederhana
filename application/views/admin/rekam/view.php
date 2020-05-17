<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Rekam Medis</h1>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('rekam-medis/search') ?>
            <table>
                <tr>
                    <td>
                        <input type="text" name="search" class="form-control" placeholder="cari rekam medis pasien ..." autofocus>
                    </td>
                    <!-- <td>
                        <input type="text" name="tanggal_awal" class="form-control datepicker">
                    </td>
                    <td>
                        <input type="text" name="tanggal_akhir" class="form-control datepicker">
                    </td> -->
                    <td>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>
                        </button>
                    </td>
                    <td>
                        <a href="<?= base_url('rekam-medis') ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Refresh">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12 mt-2">
            <a href="<?= base_url('tambah-rekam') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
            <?= $this->session->flashdata('alert') ?>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
            <table class="table table-striped text-uppercase text-center">
                <thead class="font-weight-bold table-dark">
                    <tr>
                        <td>No</td>
                        <td> NIK</td>
                        <td> Tanggal</td>
                        <td> Nama Pasien </td>
                        <td> Alamat </td>
                        <td> keluhan </td>
                        <td> Diagnosa </td>
                        <td colspan="3"> Opsi </td>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($query) : ?>
                        <?php $i = 1 ?>
                        <?php foreach ($query->result() as $key) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $key->no_ktp ?></td>
                                <td><?= $key->tanggal ?></td>
                                <td><?= $key->nama_pasien ?></td>
                                <td><?= $key->alamat ?></td>
                                <td><?= $key->keluhan ?></td>
                                <td><?= $key->diagnosa ?></td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#m<?= $key->id_rekam  ?>"><i class="fas fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="<?= base_url('ubah-rekam/') . $key->id_rekam ?>"><i class="fas fa-pen text-warning"></i></a>
                                </td>
                                <?php if ($this->session->userdata()=='superadmin' || $this->session->userdata()=='admin'): ?>
                                <td>
                                    <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('delete-rekam/') . $key->id_rekam ?>"><i class="fas fa-trash text-danger"></i></a>
                                </td>
                                <?php endif ?>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7">Tidak ada data</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
        <div class="section-body">
        </div>
    </section>
</div>
<!-- akhir main content -->

<!-- Modal -->
<?php if($query): ?>
<?php foreach ($query->result() as $k) : ?>
    <div class="modal fade" id="m<?= $k->id_rekam ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-uppercase text-center" id="exampleModalLabel"><?= $k->nama_pasien ?> </h4>
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
                            <td>No Identitas</td>
                            <td><?= $k->no_ktp ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $k->alamat ?></td>
                        </tr>
                        <tr>
                            <td>keluhan</td>
                            <td><?= $k->keluhan ?></td>
                        </tr>
                        <tr>
                            <td>Diagnosa</td>
                            <td><?= $k->diagnosa ?></td>
                        </tr>
                        <tr>
                            <td> Rujukan</td>
                            <td><?= $k->rujukan ?></td>
                        </tr>
                        <tr>
                            <td>Rumah sakit Tujuan</td>
                            <td><?= $k->rumah_sakit_tujuan ?></td>
                        </tr>
                        <tr>
                            <td>Poli</td>
                            <td><?= $k->poli_tujuan ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?php endif ?>