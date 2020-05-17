<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi Pembayaran</h1>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('pembayaran/search') ?>
            <table>
                <tr>
                    <td><input type="text" name="search" class="form-control" placeholder="Pencarian"></td>
                    <td><button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button></td>
                    <td>
                        <a href="<?= base_url('pembayaran') ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Refresh">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12 mt-2">
            <a href="<?= base_url('list-pembayaran') ?>" class="btn btn-primary"><i class="far fa-list-alt"></i> List Pembayaran</a>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <?= $this->session->flashdata('alert'); ?>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
            <table class="table table-striped text-uppercase text-justify">
                <thead class="font-weight-bold table-dark">
                    <tr>
                        <td>No</td>
                        <td>No Pendaftaran</td>
                        <td>Tanggal</td>
                        <td>Nama Pasien</td>
                        <td>Opsi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($query->result() as $key) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $key->no_pendaftaran ?></td>
                        <td><?= $key->tanggal ?></td>
                        <td><?= $key->nama_pasien ?></td>
                        <td>
                            <a href="<?= base_url('tambah-pembayaran/') . $key->id_resep ?>" data-toggle="tooltip" data-placement="right" title="Cashout"><i class="fas fa-cash-register text-success" style="font-size: 20px;"></i></a>
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
<!-- modal -->
<div class="modal fade" id="m" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-uppercase text-center" id="exampleModalLabel">
                    Struk Pembayaran a/n Ani
                </h4>
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
                        <td>No Pendaftaran</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Nama Pasien</td>
                        <td>Ani</td>
                    </tr>
                    <tr>
                        <td>Diagnosa</td>
                        <td>darah tinggi</td>
                    </tr>
                    <tr>
                        <td>Nama Dokter</td>
                        <td>Wahyu</td>
                    </tr>
                    <tr>
                        <td>tanggal transakasi</td>
                        <td>10 agustus 2019</td>
                    </tr>
                    <tr>
                        <td>Total Harga</td>
                        <td>200000</td>
                    </tr>
                    <tr>
                        <td>Jumlah bayar</td>
                        <td>200000</td>
                    </tr>
                    <tr>
                        <td>Kembalian</td>
                        <td>0</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="#" class="btn btn-success"><i class="fas fa-print"></i> Cetak</a>
            </div>
        </div>
    </div>
</div>