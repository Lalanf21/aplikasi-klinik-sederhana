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
            <h1>Form ubah kategori</h1>
            <?= $this->session->flashdata('alert');?>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
        	<?= form_open('edit-kategori') ?>
                <?php foreach ($query->result() as $key): ?>
                    <input type="hidden" name="id" value="<?= $key->id_kategori?>">
                <table class="table">
                    <tr>
                        <td>Kategori</td>
                        <td><input type="text" name="kategori" required autofocus="on" class="form-control" value="<?= $key->kategori?>"></td>
                    </tr>
                    <tr>
                        <td><a href="<?= base_url('kategori')?>"><i class="fas fa-chevron-left"></i> Kembali</a></td>
                        <td><button type="submit"><i class="fas fa-disk"></i> Ubah</button></td>
                    </tr>
                <?php endforeach ?>
                </table>
        	</form>
        <div class="section-body">
        </div>
    </section>
</div>
<!-- akhir main content -->