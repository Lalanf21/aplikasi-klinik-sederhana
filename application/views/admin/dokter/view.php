<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data dokter</h1>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?php form_open('#') ?>
                <table>
                    <tr>
                        <td><input type="text" name="search" class="form-control" placeholder="Pencarian"></td>
                        <td><a href="#" class="btn btn-primary"><i class="fas fa-search" ></i></a></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12 mt-2">
            <a href="<?= base_url('tambah-dokter')?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
            <table class="table table-stripped table-responsive">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama lengkap</td>
                        <td>No sertifikat</td>
                        <td>Expired</td>
                        <td>Jenis Kelamin</td>
                        <td>Tgl Lahir</td>
                        <td>spesialis</td>
                        <td>Telepon</td>
                        <td>Alamat</td>
                        <td>Biaya Pemeriksaan</td>
                        <td>Opsi</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="section-body">
        </div>
    </section>
</div>
<!-- akhir main content -->