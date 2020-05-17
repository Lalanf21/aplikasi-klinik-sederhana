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
            <h1>Form Edit Pendaftar</h1>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('edit-pendaftaran') ?>
            <table class="table">
                <tr>
                    <td>
                        <a href="<?= base_url('pendaftaran') ?>" class="btn btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Kembali">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
                <?php foreach ($query->result() as $key) : ?>
                <tr>
                    <td>No pendaftaran</td>
                    <td><input type="text" name="no_daftar" autofocus="on" class="form-control" value="<?= $key->no_pendaftaran ?>" readonly=""></td>
                </tr>
                <tr>
                    <td> No urut </td>
                    <td><input type="text" name="no_urut" class="form-control" value="<?= $key->no_urut ?>" readonly></td>
                </tr>
                <tr>
                    <td>Nama Pasien</td>
                    <td>
                        <select name="nm_pasien" class="form-control">
                            <option> --pilih-- </option>
                            <?php foreach ($q_pasien->result() as $p) : ?>
                            <?php if ($key->kd_pasien == $p->kd_pasien) : ?>
                            <option value="<?= $p->kd_pasien ?>" selected> <?= $p->nama_pasien ?></option>
                            <?php else: ?>
                            <option value="<?= $p->kd_pasien ?>"> <?= $p->nama_pasien ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nama Dokter</td>
                    <td>
                        <select name="nm_pegawai" class="form-control">
                            <option> --pilih-- </option>
                            <?php foreach ($q_pegawai->result() as $pe) : ?>
                            <?php if ($key->nik == $pe->nik) : ?>
                            <option value="<?= $pe->nik ?>" selected> <?= $pe->nama_pegawai ?> </option>
                            <?php else: ?>
                            <option value="<?= $pe->nik ?>"> <?= $pe->nama_pegawai ?> </option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <span class="helper-text text-danger"><?= form_error('nm_pegawai') ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Daftar</td>
                    <td><input type="date" name="tgl_daftar" id="harga" class="form-control" value="<?= $key->tgl_daftar ?>"></td>
                </tr>
                <tr>
                    <td> Keluhan</td>
                    <td><input type="text" name="keluhan" class="form-control" value="<?= $key->keluhan ?>"></td>
                </tr>
                <tr>
                    <td> Status </td>
                    <td>
                        <option>
                            <?php $d = ['tunggu', 'selesai','periksa'] ?>
                            <select name="status" class="form-control">
                                <option>==Pilih==</option>
                                <?php foreach($d as $s) :?>
                                <?php if($key->status == $s): ?>
                                    <option value="<?= $s ?>" selected><?= $s ?></option>
                                <?php else: ?>
                                    <option value="<?= $s ?>"><?= $s ?></option>
                                <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </option>
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