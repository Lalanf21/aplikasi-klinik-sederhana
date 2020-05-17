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
            <h1>Form Edit Resep Obat Pasien</h1>
        </div>
        <div class="col-lg-12">
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('edit-resep') ?>
            <table class="table" id="table">
                <tr>
                    <td>
                        <a href="<?= base_url('resep') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Kembali"> <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td colspan="2">
                        <input type="text" name="tanggal" class="form-control text-center" value="<?= $query['tanggal'] ?>" readonly>
                        <span class="helper-text text-danger"><?= form_error('tanggal') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Nama Pasien</td>
                    <td>
                        <select name="pasien" class="form-control">
                            <option> --pilih-- </option>
                            <option value="<?= $query['kd_daftar'] ?>" selected>
                            <?= $query['pasien'] ?>
                            </option>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('pasien') ?></span>
                    </td>
                    <td>
                        <input type="text" name="diagnosa" class="form-control" value="<?= $query['diagnosa'] ?>">
                        <span class="helper-text text-danger"><?= form_error('diagnosa') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Nama Obat</td>
                    <td>
                        <div class="form-group">
                            <select name="nama_obat[]" class="form-control" multiple>
                                <option>--pilih--</option>
                                <?php foreach ($obat->result() as $key) : ?>
                                    <option value="<?= $key->nama_obat ?>"> <?= $key->nama_obat ?> </option>
                                <?php endforeach ?>
                                <span class="helper-text text-danger"><?= form_error('nama_obat[]') ?></span>
                            </select>
                        </div>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="aturan_pakai[]" placeholder="Aturan Pakai ex: 3x1">
                        <span class="helper-text text-danger"><?= form_error('aturan_pakai[]') ?></span>
                    </td>
                </tr>
            </table>


            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <button id="add" type="button" class="btn btn-large" data-toggle="tooltip" title="Tambah Field" data-placement="bottom">
                            <i class="fas fa-chevron-circle-down text-success" style="font-size: 30px;"></i>
                        </button>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
                <table class="table table-dark">
            </div>
    </section>
    </form>
</div>
<!-- akhir main content -->