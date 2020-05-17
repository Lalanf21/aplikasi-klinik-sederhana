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
            <h1>Form edit pasien</h1>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('edit-pasien') ?>
            <table class="table">
                <?php foreach ($query->result() as $key) : ?>
                <tr>
                    <td>
                        <a href="<?= base_url('pasien') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Kembali">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
                <input type="hidden" name="id" value="<?= $key->kd_pasien ?>">
                <tr>
                    <td>NO identitas</td>
                    <td><input type="text" name="no_nik" autofocus="on" class="form-control" value="<?= $key->no_ktp ?>"></td>
                </tr>
                <tr>
                    <td>nama lengkap</td>
                    <td>
                        <input type="text" name="nama" class="form-control" value="<?= $key->nama_pasien ?>">
                    </td>
                </tr>
                <tr>
                    <td>jenis kelamin</td>
                    <td>
                        <select name="j_kelamin" class="form-control" required>
                            <option>-- Pilih --</option>
                            <?php if ($key->gender == 'pria') : ?>
                            <option value="pria" selected>Pria</option>
                            <option value="wanita">Wanita</option>
                            <?php else : ?>
                            <option value="wanita" selected>Wanita</option>
                            <option value="pria">Pria</option>
                            <?php endif ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>tempat lahir</td>
                    <td><input type="text" name="tempat_lahir" class="form-control" value="<?= $key->tempat_lahir ?>"></td>
                </tr>
                <tr>
                    <td>tgl lahir</td>
                    <td>
                        <input type="date" name="tgl_lahir" class="form-control" value="<?= $key->tgl_lahir ?>">
                    </td>
                </tr>
                <tr>
                    <td>telepon</td>
                    <td>
                        <input type="text" name="telepon" class="form-control" value="<?= $key->no_telp ?>">
                    </td>
                </tr>
                <tr>
                    <td>alamat</td>
                    <td>
                        <textarea cols=40 rows="5" name="alamat" class="form-control"><?= $key->alamat ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-warning"><i class="fas fa-pen"></i> Edit</button></td>
                </tr>
            </table>
            </form>
            <?php endforeach; ?>
            <div class="section-body">
            </div>
    </section>
</div>
<!-- akhir main content -->