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
            <h1>Form tambah jenis obat</h1>
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('add-jenis-obat') ?>
            <table class="table">
                <tr>
                    <td><a href="<?= base_url('jenis-obat') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Kembali">
                    <i class="fas fa-redo"></i></a></td>
                </tr>
                <tr>
                    <td>jenis obat</td>
                    <td>
                        <input type="text" name="jenis_obat" autofocus="on" class="form-control">
                        <span class="helper-text text-danger"><?= form_error('jenis_obat') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>keterangan</td>
                    <td><textarea name="keterangan" cols="60" rows="5" class="form-control"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
                </tr>
            </table>
            </form>
            <div class="section-body">
            </div>
    </section>
</div>
<!-- akhir main content -->