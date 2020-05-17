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
            <h1>Dashboard</h1>
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('add-user') ?>
            <table class="table">
                <tr>
                    <td>
                        <a href="<?= base_url('user') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Kembali">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" autofocus="on" class="form-control">
                        <span class="helper-text text-danger"><?= form_error('username') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" class="form-control">
                        <span class="helper-text text-danger"><?= form_error('password') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>
                        <?php $ar = array('superadmin', 'administrasi', 'apoteker', 'dokter'); ?>
                        <select name="level" class="form-control">
                            <option>-- Pilih --</option>
                            <?php foreach ($ar as $k) : ?>
                            <option value="<?= $k ?>"><?= $k ?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('level') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>kategori</td>
                    <td>
                        <select name="kategori" class="form-control">
                            <option>-- Pilih --</option>
                            <?php foreach ($select->result() as $k) : ?>
                            <option value="<?= $k->kategori ?>"><?= $k->kategori ?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('kategori') ?></span>
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