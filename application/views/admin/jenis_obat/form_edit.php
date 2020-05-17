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
            <h1>Form ubah jenis obat</h1>
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('edit-jenis-obat') ?>
            <?php foreach ($query->result() as $key) : ?>
            <input type="hidden" name="id" value="<?= $key->id_jenis_obat ?>">
            <table class="table">
                <tr>
                    <td>
                        <a href="<?= base_url('jenis-obat') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Kembali">
                            <i class="fas fa-redo"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>jenis obat</td>
                    <td><input type="text" name="jenis_obat" required autofocus="on" class="form-control" value="<?= $key->jenis_obat ?>"></td>
                </tr>
                <tr>
                    <td>keterangan</td>
                    <td><textarea name="keterangan" class="form-control" cols="60" rows="5"><?= $key->keterangan ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-warning"><i class="fas fa-pen"></i> Ubah</button></td>
                </tr>
                <?php endforeach ?>
            </table>
            </form>
            <div class="section-body">
            </div>
    </section>
</div>
<!-- akhir main content -->