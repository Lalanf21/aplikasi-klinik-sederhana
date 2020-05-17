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
            <h1>Form tambah Kategori</h1>
            <?= $this->session->flashdata('alert');?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
        	<?= form_open('add-kategori') ?>
                <table class="table">
                    <tr>
                        <td>Kategori</td>
                        <td><input type="text" name="kategori" required autofocus="on" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><a href="<?= base_url('kategori')?>"><i class="fas fa-chevron-left"></i> Kembali</a></td>
                        <td><button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button></td>
                    </tr>
                </table>
        	</form>
        <div class="section-body">
        </div>
    </section>
</div>
<!-- akhir main content -->