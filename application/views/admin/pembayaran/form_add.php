<style type="text/css">
    table tr td:nth-child(1) {
        font-weight: bold;
        text-transform: uppercase;
    }
</style>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi</h1>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('add-pembayaran') ?>
            <div class="row ">
                <?php foreach ($query as $k) : ?>
                <div class="col-lg-3 text-center">
                    <input type="hidden" name="id_resep" value="<?= $k->id_resep ?>" class="form-control">
                </div>
                <?php endforeach ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <td>
                            <a href="<?= base_url('pembayaran') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Kembali"> <i class="fas fa-redo"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <?php foreach ($qiu as $key) : ?>
                        <td>
                            <input type="text" value="<?= $key->nama_pasien ?>" class="form-control" readonly>
                        </td>
                        <?php endforeach ?>
                        <?php foreach ($qu->result() as $key) : ?>
                        <td>
                            <input type="text" name="" value="<?= $key->nama_pegawai ?>" class="form-control" readonly>
                        </td>
                        <?php endforeach ?>
                        <?php foreach ($query as $key) : ?>
                        <td>
                            <input type="text" name="" value="<?= $key->nama_obat ?>" class="form-control" readonly>
                        </td>
                        <?php endforeach ?>
                        <td>
                            <input type="text" id="jumlah" name="total" value="<?= number_format($jumlah) ?>" class="form-control" readonly>
                            <input type="hidden" id="jumlah" name="total2" value="<?= $jumlah ?>" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="text-align: right">Bayar (Rp)</td>
                        <td>
                            <input type="number" name="bayar" id="bayar" class="form-control" autofocus>
                            <input type="hidden"  id="bayar2" class="form-control" >
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="text-align: right">Kembalian (Rp)</td>
                        <td>
                            <input type="number" name="kembalian" id="kembalian" value="" class="form-control" readonly>
                        </td>
                    </tr>
                </thead>
            </table>
            <div class="row text-center">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-primary btn-lg"> <i class="fas fa-save"></i> OK</button>
                </div>
            </div>
            </form>
        </div>
        <div class="section-body">
        </div>
    </section>
</div>
<!-- akhir main content -->