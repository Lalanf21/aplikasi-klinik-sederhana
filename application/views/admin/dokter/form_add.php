<style type="text/css">
    table tr td:nth-child(1){
        font-weight: bold;
        text-transform: uppercase;
    }
</style>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form add Pegawai</h1>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
                <?php form_open('#') ?>
                <table class="table">
                    <tr>
                        <td>NO identitas</td>
                        <td><input type="text" name="no_id" required autofocus="on" class="form-control" value=""></td>
                    </tr>
                    <tr>
                        <td>nama lengkap</td>
                        <td><input type="password" name="nama" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td>jabatan</td>
                        <td><?php $dt = array('administrasi','apoteker','dokter'); ?>
                            <select name="jabatan" class="form-control">
                                <option>-- Pilih --</option>
                                <?php foreach ($dt as $k):?>
                                <option value="<?= $k?>"><?= $k?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>jenis kelamin</td>
                        <td>
                            <select name="j_kelamin" class="form-control">
                                <option>-- Pilih --</option>
                                <option value="pria">pria</option>
                                <option value="wanita">wanita</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>tempat lahir</td>
                        <td><input type="text" name="tempat_lahir" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>tgl lahir</td>
                        <td><input type="date" name="tgl_lahir" required class="form-control" value=""></td>
                    </tr>
                    <tr>
                        <td>telepon</td>
                        <td><input type="text" name="telepon" class="form-control"></td>
                    </tr>
                    <tr>
                        <td>alamat</td>
                        <td><textarea cols=40 rows=5></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit"><i class="fas fa-disk"></i> Simpan</button></td>
                    </tr>
                </table>
                </form>
        <div class="section-body">
        </div>
    </section>
</div>
<!-- akhir main content -->