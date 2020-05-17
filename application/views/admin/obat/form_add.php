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
            <h1>Form tambah obat</h1>
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('add-obat') ?>
            <table class="table">
                <tr>
                    <td>
                        <a href="<?= base_url('obat') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Kembali">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Nama obat</td>
                    <td>
                        <input type="text" name="nama_obat" autofocus="on" class="form-control">
                        <span class="helper-text text-danger"><?= form_error('nama_obat') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Jenis obat</td>
                    <td>
                        <select name="jenis_obat" class="form-control">
                            <option>-- Pilih --</option>
                            <?php foreach ($jenis->result() as $k) : ?>
                            <option value="<?= $k->id_jenis_obat ?>"><?= $k->jenis_obat ?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('jenis_obat') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Dosis</td>
                    <td>
                        <input type="text" name="dosis" class="form-control">
                        <span class="helper-text text-danger"><?= form_error('dosis') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>
                        <input type="number" name="harga" class="form-control">
                        <span class="helper-text text-danger"><?= form_error('harga') ?></span>
                    </td>
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