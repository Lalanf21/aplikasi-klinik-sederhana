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
            <h1>Form Add Pendaftar</h1>
        </div>
        <div class="col-lg-12">
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('add-pendaftaran') ?>
            <table class="table">
                <tr>
                    <td>
                        <a href="<?= base_url('pendaftaran') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Kembali">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>No pendaftaran</td>
                    <td>
                        <input type="text" name="no_daftar" autofocus="on" class="form-control" value="<?= date('dmy') . noRegistrasiotomatis() ?>" readonly>
                        <span class="helper-text text-danger"><?= form_error('no_daftar') ?></span>
                    </td>
                </tr>
                <tr>
                    <td> No antrian </td>
                    <td>
                        <input type="text" name="no_urut" class="form-control" value="<?= noRegistrasiotomatis() ?>" disabled>
                    </td>
                </tr>
                <tr>
                    <td>Nama Pasien</td>
                    <td>
                        <select name="nm_pasien" class="form-control nm_pasien">
                            <?php foreach ($q_pasien->result() as $key) : ?>
                            <option value="<?= $key->kd_pasien ?>"> <?= $key->nama_pasien ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('nm_pasien') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Nama Dokter</td>
                    <td>
                        <select name="nm_pegawai" class="form-control">
                            <option> --pilih-- </option>
                            <?php foreach ($q_pegawai->result() as $key) : ?>
                            <option value="<?= $key->nik_pegawai ?>"> <?= $key->nama_pegawai ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('nm_pegawai') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Daftar</td>
                    <td>
                        <input type="text" name="tgl_daftar" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                        <span class="helper-text text-danger"><?= form_error('tgl_daftar') ?></span>
                    </td>
                </tr>
                <tr>
                    <td> Keluhan</td>
                    <td>
                        <input type="text" name="keluhan" class="form-control" value="<?= set_value('keluhan') ?>">
                        <span class="helper-text text-danger"><?= form_error('keluhan') ?></span>
                    </td>
                </tr>
                <tr>
                    <td> Status </td>
                    <td>
                        <select name="status" class="form-control">
                            <option>==Pilih==</option>
                            <option value="selesai">selesai</option>
                            <option value="tunggu">tunggu</option>
                            <option value="periksa">periksa</option>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('status') ?></span>
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