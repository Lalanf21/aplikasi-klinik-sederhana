<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pembayaran</h1>
        </div>
        <div class="col my-3">
            <a href="<?= base_url('pembayaran') ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Kembali">
                <i class="fas fa-arrow-left"></i></a>
        </div>
        <?= $this->session->flashdata('alert'); ?>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('pembayaran/search_list') ?>
            <table>
                <tr>
                    <td><input type="text" name="search" class="form-control" placeholder="Pencarian"></td>
                    <td><button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button></td>
                    <td>
                        <a href="<?= base_url('pegawai') ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Redresh">
                            <i class="fas fa-redo"></i></a>
                    </td>
                </tr>
            </table>
            </form>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
            <table class="table table-striped text-uppercase text-justify">
                <thead class="font-weight-bold table-dark">
                    <tr>
                        <td>No</td>
                        <td>Nama pasien</td>
                        <td>Tanggal</td>
                        <td>Total</td>
                        <td>Jumlah Bayar</td>
                        <td>kembalian</td>
                        <td>Opsi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($query as $k) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $k->nama_pasien ?></td>
                        <td><?= $k->tgl_bayar ?></td>
                        <td><?= 'Rp ' . number_format($k->total_harga) ?></td>
                        <td><?= 'Rp ' . number_format($k->total_bayar) ?></td>
                        <td><?= 'Rp ' . number_format($k->kembalian) ?></td>
                        <td>
                            <a href="<?= base_url('print-struk/') . $k->no_bayar ?>" data-toggle="tooltip" data-placement="right" title="Print"><i class="fas fa-print" style="font-size: 20px;"></i></a>
                            <?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'superadmin') : ?>
                            |
                            <a onclick="return confirm('apakah anda yakin?')" href="<?= base_url('delete-pembayaran/') . $k->no_bayar ?>"><i class="fas fa-trash text-danger" style="font-size: 20px;"></i></a>
                            <?php endif ?>
                        </td>

                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- akhir main content -->