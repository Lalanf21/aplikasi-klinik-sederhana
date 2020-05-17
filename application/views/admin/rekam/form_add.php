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
            <h1>Form Rekam Medis Pasien</h1>
        </div>
        <div class="col-lg-12">
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('add-rekam') ?>
            <table class="table">
                <tr>
                    <td>
                        <a href="<?= base_url('rekam-medis') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Kembali">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>
                        <input type="text" name="tanggal" autofocus="on" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                        <input type="hidden" name="no_pendaftaran" value="">
                    </td>
                </tr>
                <tr>
                    <td> Nama Pasien </td>
                    <td>
                        <input type="text" id="rekam" name="nama" class="form-control" value="" >
                        <span class="helper-text text-danger"><?= form_error('nama') ?></span>
                    </td>
                </tr>
                <tr>
                    <td> No Identitas </td>
                    <td>
                        <input type="text" name="no_ktp" class="form-control" value="" readonly>
                        <span class="helper-text text-danger"><?= form_error('no_ktp') ?></span>
                    </td>
                </tr>
                <tr>
                    <td> Alamat </td>
                    <td>
                        <input type="text" name="alamat" class="form-control" value="" readonly>
                        <span class="helper-text text-danger"><?= form_error('alamat') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>keluhan</td>
                    <td>
                        <input type="text" name="keluhan" class="form-control" value="" readonly>
                        <span class="helper-text text-danger"><?= form_error('keluhan') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Diagnosa</td>
                    <td>
                        <input type="text" name="diagnosa" class="form-control" value="" >
                        <span class="helper-text text-danger"><?= form_error('diagnosa') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Tindakan Rujuk</td>
                    <td>
                        <select name="rujukan" id="rujukan" class="form-control">
                            <option>--pilih--</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('rujukan') ?></span>
                    </td>
                </tr>
                <tr id="rumah_sakit">
                    <td> Nama Rumah sakit </td>
                    <td>
                        <input type="text" name="rumah_sakit" class="form-control">
                        <span class="helper-text text-danger"><?= form_error('rumah_sakit') ?></span>
                    </td>
                </tr>
                <tr id="poli">
                    <td> Poli </td>
                    <td>
                        <input type="text" name="poli" class="form-control">
                        <span class="helper-text text-danger"><?= form_error('poli') ?></span>
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