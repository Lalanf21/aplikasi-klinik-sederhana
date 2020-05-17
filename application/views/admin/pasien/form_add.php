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
            <h1>Form Add Pasien</h1>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
            <?= $this->session->flashdata('alert') ?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('add-pasien') ?>
            <table class="table">
                <tr>
                    <td>
                        <a href="<?= base_url('pasien') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Kembali">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>NO identitas</td>
                    <td>
                        <input type="text" name="no_nik" class="form-control" value="<?= set_value('no_nik') ?>">
                        <span class="helper-text text-danger text-uppercase"><?= form_error('no_nik') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>nama lengkap</td>
                    <td>
                        <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>">
                        <span class="helper-text text-danger text-uppercase"><?= form_error('nama') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>jenis kelamin</td>
                    <td>
                        <select name="j_kelamin" class="form-control">
                            <option>-- Pilih --</option>
                            <option>pria</option>
                            <option>wanita</option>
                        </select>
                        <span class="helper-text text-danger text-uppercase"><?= form_error('j_kelamin') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Tempat lahir</td>
                    <td>
                        <input type="text" name="tmp_lahir" class="form-control" value="<?= set_value('tmp_lahir') ?>">
                        <span class="helper-text text-danger text-uppercase"><?= form_error('nama') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>tgl lahir</td>
                    <td>
                        <input type="text" name="tgl_lahir" class="form-control datepicker" value="<?= set_value('tgl_lahir') ?>">
                        <span class="helper-text text-danger text-uppercase"><?= form_error('tgl_lahir') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>telepon</td>
                    <td>
                        <input type="number" name="telepon" class="form-control" value="<?= set_value('telepon') ?>">
                        <span class="helper-text text-danger text-uppercase"><?= form_error('telepon') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>alamat</td>
                    <td>
                        <textarea cols=40 rows="5" class="form-control" name="alamat"><?= set_value('alamat') ?></textarea>
                        <span class="helper-text text-danger text-uppercase"><?= form_error('alamat') ?></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan </button></td>
                </tr>
            </table>
            </form>
            <div class="section-body">
            </div>
    </section>
</div>
<!-- akhir main content -->