<!-- Main Content -->
<style type="text/css">
    table tr td:nth-child(1) {
        font-weight: bold;
        text-transform: uppercase;
    }
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1 class="text-uppercase">data laporan kunjungan pasien</h1>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
            <?= $this->session->flashdata('alert') ?>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <form action="<?= base_url('laporan/export'); ?>" method="POST">
                    <table class="table">
                        <tr>
                            <td>Tanggal Awal</td>
                            <td>
                                <input type="text" name="tanggal1" id="tanggal" class="form-control datepicker">
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Akhir</td>
                            <td>
                                <input type="text" name="tanggal2" id="tanggal1" class="form-control datepicker">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Cetak</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="section-body">
            </div>
    </section>
</div>
<!-- akhir main content -->