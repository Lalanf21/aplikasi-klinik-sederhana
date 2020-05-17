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
            <h1>Form add Pegawai</h1>
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('add-pegawai') ?>
            <table class="table">
                <tr>
                    <td>
                        <a href="<?= base_url('pegawai') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Kembali">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>NO identitas</td>
                    <td>
                        <input type="text" name="no_id" autofocus="on" class="form-control">
                        <span class="helper-text text-danger"><?= form_error('no_id') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>nama lengkap</td>
                    <td>
                        <input type="text" name="nama" class="form-control">
                        <span class="helper-text text-danger"><?= form_error('nama') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Jenis kelamin</td>
                    <td>
                        <select name="j_kelamin" class="form-control">
                            <option>-- pilih --</option>
                            <option value="pria">Pria</option>
                            <option value="wanita">wanita</option>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('j_kelamin') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>jabatan</td>
                    <td><?php $dt = array('administrasi', 'apoteker', 'dokter'); ?>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option>-- Pilih --</option>
                            <?php foreach ($dt as $k) : ?>
                            <option value="<?= $k ?>"><?= $k ?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('jabatan') ?></span>
                    </td>
                </tr>
                <tr id="dokter">
                    <td>spesialis</td>
                    <td>
                        <select name="spesialis" class="form-control">
                            <?php foreach ($q_kategori->result() as $key): ?>
                            <option value="<?= $key->id_kategori ?>"><?= $key->kategori ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('spesialis') ?></span>
                    </td>
                </tr>
                <tr id="dokter">
                    <td>Biaya pemeriksaan</td>
                    <td>
                        <input class="form-control" type="text" name="biaya">
                        <span class="helper-text text-danger"><?= form_error('biaya') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>tempat lahir</td>
                    <td>
                        <input type="text" name="tempat_lahir" class="form-control">
                        <span class="helper-text text-danger"><?= form_error('tempat_lahir') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>tgl lahir</td>
                    <td>
                        <input type="text" name="tgl_lahir" class="form-control datepicker">
                        <span class="helper-text text-danger"><?= form_error('tgl_lahir') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>telepon</td>
                    <td>
                        <input type="number" name="telepon" class="form-control">
                        <span class="helper-text text-danger"><?= form_error('telepon') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>alamat</td>
                    <td>
                        <textarea class="form-control" name="alamat"></textarea>
                        <span class="helper-text text-danger"><?= form_error('alamat') ?></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-primary"><i class="fas fa-save "></i> Simpan</button></td>
                </tr>
            </table>
            </form>

            <div class="section-body">
            </div>
    </section>
</div>
<!-- akhir main content -->