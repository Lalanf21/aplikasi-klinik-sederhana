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
            <h1>Edit Rekam Medis Pasien</h1>
        </div>
        <div class="col-lg-12">
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('edit-rekam') ?>
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
                        <input type="text" name="tanggal" autofocus="on" class="form-control" value="<?= $query['tanggal'] ?>" readonly>
                        <input type="hidden" name="id" value="<?= $query['id_rekam'] ?>">
                    </td>
                </tr>
                <tr>
                    <td> Nama Pasien </td>
                    <td>
                        <input type="text" id="rekam" name="nama" class="form-control" value="<?=$query['nama_pasien'] ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td> No Identitas </td>
                    <td>
                        <input type="text" name="no_ktp" class="form-control" value="<?= $query['no_ktp'] ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td> Alamat </td>
                    <td>
                        <input type="text" name="alamat" class="form-control" value="<?= $query['alamat'] ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>keluhan</td>
                    <td>
                        <input type="text" name="keluhan" class="form-control" value="<?= $query['keluhan'] ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Diagnosa</td>
                    <td>
                        <input type="text" name="diagnosa" class="form-control" value="<?= $query['diagnosa'] ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tindakan Rujuk</td>
                    <td>
                        <select name="rujukan" id="rujukan" class="form-control">
                            <?php if ($query['rujukan'] == 'ya'): ?>
                            <option>--pilih--</option>
                            <option value="ya" selected>Ya</option>
                            <option value="tidak">Tidak</option>
                            <?php else: ?>
                            <option>--pilih--</option>
                            <option value="ya">Ya</option>
                            <option value="tidak" selected>Tidak</option>
                            <?php endif ?>
                        </select>
                    </td>
                </tr>
                <tr id="rumah_sakit">
                    <td> Nama Rumah sakit </td>
                    <td>
                        <input type="text" name="rumah_sakit" class="form-control" value="<?= $query['rumah_sakit_tujuan'] ?>">
                    </td>
                </tr>
                <tr id="poli">
                    <td> Poli </td>
                    <td>
                        <input type="text" name="poli" class="form-control" value="<?= $query['poli_tujuan'] ?>">
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