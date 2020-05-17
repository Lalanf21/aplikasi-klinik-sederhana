<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data pegawai</h1>
        </div>
        <?= $this->session->flashdata('alert'); ?>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('pegawai/search') ?>
            <table>
                <tr>
                    <td><input type="text" name="search" class="form-control" placeholder="Pencarian"></td>
                    <td><button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button></td>
                    <td>
                        <a href="<?= base_url('pegawai') ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Redresh">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12 mt-2">
            <a href="<?= base_url('tambah-pegawai') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
            <table class="table table-striped text-uppercase text-justify">
                <thead class="font-weight-bold table-dark">
                    <tr>
                        <td>No</td>
                        <td>No Identitas</td>
                        <td>Nama lengkap</td>
                        <td>Jabatan</td>
                        <td>Spesialis</td>
                        <td>Telepon</td>
                        <td>Opsi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($query->result() as $k) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $k->nik_pegawai ?></td>
                        <td><?= $k->nama_pegawai ?></td>
                        <td><?= $k->jabatan ?></td>
                        <td><?= $k->kategori ?></td>
                        <td><?= $k->no_telp ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#m<?= $k->nik_pegawai ?>"><i class="fas fa-eye"></i></a>
                            |
                            <a href="<?= base_url('ubah-pegawai/') . $k->nik_pegawai ?>"><i class="fas fa-pen text-warning"></i></a>
                            |
                            <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('delete-pegawai/') . $k->nik_pegawai ?>"><i class="fas fa-trash text-danger"></i></a>
                        </td>

                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- akhir main content -->
<!-- Button trigger modal -->

<!-- Modal -->
<?php foreach ($query->result() as $k) : ?>
<div class="modal fade" id="m<?= $k->nik_pegawai ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase text-center" id="exampleModalLabel"><?= $k->nama_pegawai ?> </h4>
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
                        <td><?= $k->nik_pegawai ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td><?= $k->gender ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td><?= $k->jabatan ?></td>
                    </tr>
                    <tr>
                        <td>Spesialis</td>
                        <td><?= $k->kategori ?></td>
                    </tr>
                    <tr>
                        <td>Biaya pemeriksaan</td>
                        <td><?= 'Rp.' . number_format($k->biaya_pemeriksaan) ?></td>
                    </tr>
                    <tr>
                        <td>Tempat lahir</td>
                        <td><?= $k->tempat_lahir ?></td>
                    </tr>
                    <tr>
                        <td>Tgl lahir</td>
                        <td><?= $k->tgl_lahir ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?= $k->alamat ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>