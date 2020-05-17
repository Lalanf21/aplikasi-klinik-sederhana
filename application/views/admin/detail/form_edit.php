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
            <h1>Form ubah obat</h1>
            <?= $this->session->flashdata('alert');?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
        	<?= form_open('edit-obat') ?>
                <?php foreach ($query->result() as $key): ?>
                    <input type="hidden" name="id" value="<?= $key->id_obat?>">
                <table class="table">
                    <tr>
                        <td>Nama obat</td>
                        <td><input type="text" name="nama_obat" required autofocus="on" class="form-control" value="<?= $key->nama_obat?>"></td>
                    </tr>
                    <tr>
                        <td>Jenis obat</td>
                        <td>
                            <select name="jenis_obat" class="form-control">
                                <option>-- Pilih --</option>
                                <?php foreach ($jenis->result() as $k): ?>
                                <?php if ($k->jenis_obat == $key->jenis_obat): ?>
                                <option value="<?= $k->jenis_obat?>" selected><?= $k->jenis_obat?></option>
                                <?php continue; ?>
                                <?php endif ?>
                                <option value="<?= $k->jenis_obat?>"><?= $k->jenis_obat?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Dosis</td>
                        <td><input type="text" name="dosis" required class="form-control" value="<?= $key->dosis?>"></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><input type="text" name="harga" required class="form-control" value="<?= $key->harga?>"></td>
                    </tr>
                    <tr>
                        <td><a href="<?= base_url('jenis-obat')?>"><i class="fas fa-chevron-left"></i> Kembali</a></td>
                        <td><button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Ubah</button></td>
                    </tr>
                <?php endforeach ?>
                </table>
        	</form>
        <div class="section-body">
        </div>
    </section>
</div>
<!-- akhir main content -->