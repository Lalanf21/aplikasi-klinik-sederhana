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
            <h1>Form tambah obat</h1>
            <?= $this->session->flashdata('alert');?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
        	<?= form_open('add-obat') ?>
                <table class="table">
                    <tr>
                        <td>Nama dokter</td>
                        <td>
                            <select name="nama_dokter" class="form-control">
                                <option>-- Pilih --</option>
                                <?php foreach ($nama->result() as $k): ?>
                                <option value="<?=$k->nama?>"><?=$k->nama?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Spesialis Dokter</td>
                        <td>
                            <select name="spesialis_dokter" class="form-control">
                                <option>-- Pilih --</option>
                                <?php foreach ($kategori->result() as $k): ?>
                                <option value="<?=$k->kategori?>"><?=$k->kategori?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Dosis</td>
                        <td><input type="text" name="dosis" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><input type="number" name="harga" required class="form-control"></td>
                    </tr>
                    <tr>
                        <td><a href="<?= base_url('obat')?>"><i class="fas fa-chevron-left"></i> Kembali</a></td>
                        <td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
                    </tr>
                </table>
        	</form>
        <div class="section-body">
        </div>
    </section>
</div>
<!-- akhir main content -->