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
            <h1>Form edit</h1>
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('edit-user') ?>
            <?php foreach ($query->result() as $key) : ?>
            <input type="hidden" name="id" value="<?= $key->id_user ?>">
            <table class="table">
                <tr>
                    <td>
                        <a href="<?= base_url('user') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="top" title="Kembali">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" autofocus="on" class="form-control" value="<?= $key->username ?>">
                        <span class="helper-text text-danger"><?= form_error('username') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" class="form-control" value="<?= $key->password ?>">
                        <span class="helper-text text-danger"><?= form_error('password') ?></span>
                    </td>
                </tr>
                <tr>
                    <?php $dt = array('superadmin', 'administrasi', 'dokter', 'apoteker'); ?>
                    <td>Level</td>
                    <td>
                        <select name="level" class="form-control">
                            <option>-- Pilih --</option>
                            <?php foreach ($dt as $k) { ?>
                            <?php if ($k == $key->level) : ?>
                            <option value="<?= $key->level ?>" selected><?= $key->level ?></option>
                            <?php continue; ?>
                            <?php endif ?>
                            <option value="<?= $k ?>"><?= $k ?></option>
                            <?php  } ?>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('level') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori" class="form-control">
                            <option>-- Pilih --</option>
                            <?php foreach ($select->result() as $k) { ?>
                            <?php if ($k->kategori == $key->kategori) : ?>
                            <option value="<?= $key->kategori ?>" selected><?= $key->kategori ?></option>
                            <?php continue; ?>
                            <?php endif ?>
                            <option value="<?= $k->kategori ?>"><?= $k->kategori ?></option>
                            <?php  } ?>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('kategori') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <?php $status = array('0' => 'Non-aktif', '1' => 'Aktif'); ?>
                        <select name="status" class="form-control">
                            <option>-- Pilih --</option>
                            <?php foreach ($status as $k => $v) { ?>
                            <?php if ($k == $key->status) : ?>
                            <option value="<?= $k ?>" selected><?= $v ?></option>
                            <?php continue; ?>
                            <?php endif ?>
                            <option value="<?= $k ?>"><?= $v ?></option>
                            <?php  } ?>
                        </select>
                    </td>
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