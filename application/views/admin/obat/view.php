<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data obat</h1>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('obat/search') ?>
            <table>
                <tr>
                    <td><input type="text" name="search" class="form-control" placeholder="Pencarian"></td>
                    <td><button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button></td>
                    <td>
                        <a href="<?= base_url('obat') ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Refresh">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <?php if($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'superadmin') : ?>
        <div class="col-sm-12 col-lg-6 col-md-6 mt-2">
            <a href="<?= base_url('tambah-obat') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <?php endif ?>
        <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
            <?= $this->session->flashdata('alert') ?>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
            <table class="table table-striped text-uppercase">
                <thead class="table-dark font-weight-bold">
                    <tr>
                        <td>No</td>
                        <td>Nama obat</td>
                        <td>Jenis obat</td>
                        <td>Dosis</td>
                        <td>Harga</td>
                        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'superadmin') : ?>
                        <td>Opsi</td>
                        <?php endif ?>
                    </tr>
                </thead>
                <tbody><?php $no = 1; ?>
                    <?php foreach ($query->result() as $key) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $key->nama_obat ?></td>
                        <td><?= $key->jenis_obat ?></td>
                        <td><?= $key->dosis ?></td>
                        <td><?= 'Rp. ' . number_format($key->harga); ?></td>
                        <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'superadmin') : ?>
                        <td>
                            <a href="<?= base_url('ubah-obat/') . $key->id_obat ?>" data-toggle="tooltip" data-placement="top" title="Edit" class="text-warning">
                                <i class="fas fa-pen"></i></a>
                            |
                            <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('delete-obat/') . $key->id_obat ?>" data-toggle="tooltip" data-placement="top" title="Hapus" class="text-danger">
                                <i class="fas fa-trash"></i></a>
                        </td>
                        <?php endif ?>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="section-body">
        </div>
    </section>
</div>
<!-- akhir main content -->