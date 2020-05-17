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
            <h1>Form edit pegawai</h1>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('edit-pegawai') ?>
            <?php foreach ($query->result() as $k) : ?>
            <table class="table">
                <tr>
                    <td>
                        <a href="<?= base_url('pegawai') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Kembali">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>No identitas</td>
                    <td><input type="text" name="no_id" readonly class="form-control" value="<?= $k->nik_pegawai ?>"></td>
                </tr>
                <tr>
                    <td>nama lengkap</td>
                    <td><input type="text" name="nama" required autofocus="on" class="form-control" value="<?= $k->nama_pegawai ?>"></td>
                </tr> 
                <tr>
                    <td>jabatan</td>
                    <td id="cek">
                        <?php $r = array('administrasi', 'apoteker', 'dokter'); ?>
                        <select name="jabatan" id="jabatan" class="form-control" required>
                            <option>-- Pilih --</option>
                            <?php foreach ($r as $o) : ?>
                            <?php if ($k->jabatan == $o) : ?>
                            <option value="<?= $o ?>" selected><?= $o ?></option>
                            <?php continue;
                                    endif ?>
                            <option value="<?= $o ?>"><?= $o ?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <tr id="dokter">
                    <td>spesialis</td>
                    <td>
                        <select name="spesialis" class="form-control">
                            <option>-- Pilih --</option>
                            <?php foreach($select->result() as $p ): ?>
                            <?php if ($k->id_kategori == $p->id_kategori) : ?>
                            <option value=" <?= $p->id_kategori ?> " selected> <?= $p->kategori ?> </option>
                            <?php else: ?>
                            <option value=" <?= $p->id_kategori ?> "> <?= $p->kategori ?> </option>
                            <?php endif ?>
                            <?php endforeach ?>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('spesialis') ?></span>
                    </td>
                </tr>
                <tr id="dokter">
                    <td>Biaya pemeriksaan</td>
                    <td>
                        <input class="form-control" type="text" name="biaya" value="<?= $k->biaya_pemeriksaan ?>">
                        <span class="helper-text text-danger"><?= form_error('biaya') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>jenis kelamin</td>
                    <td>
                        <select name="j_kelamin" class="form-control" required>
                            <option>-- Pilih --</option>
                            <?php if ($k->gender == 'pria') : ?>
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
                    <td>Tempat lahir</td>
                    <td><input type="text" name="tempat_lahir" value="<?= $k->tempat_lahir ?>" class="form-control" required></td>
                </tr>
                <tr>
                    <td>tgl lahir</td>
                    <td><input type="date" name="tgl_lahir" required class="form-control" value="<?= $k->tgl_lahir ?>" required></td>
                </tr>
                <tr>
                    <td>telepon</td>
                    <td><input type="number" name="telepon" class="form-control" value="<?= $k->no_telp ?>"></td>
                </tr>
                <tr>
                    <td>alamat</td>
                    <td><textarea class="form-control" name="alamat" required><?= $k->alamat ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn btn-warning"><i class="fas fa-pen "></i> Edit</button></td>
                </tr>
            </table>
            <?php endforeach ?>
            </form>
            <div class="section-body">
            </div>
    </section>
</div>
<!-- akhir main content -->