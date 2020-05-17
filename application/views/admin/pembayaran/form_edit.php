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
            <h1>Form Edit Transaksi</h1>
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12">
            <?= form_open('#') ?>
            <table class="table">
                <tr>
                    <td><a href="<?= base_url('pembayaran') ?>"><i class="fas fa-chevron-left"></i> Kembali</a></td>
                </tr>
                <tr>
                    <td>No pendaftaran</td>
                    <td>
                        <select id="my-select" class="form-control" name="no_pendaftaran">
                            <option>P001</option>
                            <option>P002</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nama Pegawai</td>
                    <td>
                        <input type="text" name="nm_pegawai" disabled class="form-control" value="Hendra">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nama Pasien</td>
                    <td>
                        <input type="text" name="nm_pasien" class="form-control" disabled value="Suhendar">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tanggal transaksi</td>
                    <td>
                        <input type="date" name="tgl_transaksi" class="form-control" required>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td> Diagnosis </td>
                    <td>
                        <input type="text" name="diagnosa" class="form-control" disabled value="DBD">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td> Total Harga </td>
                    <td>
                        <input type="text" name="total_harga" class="form-control" disabled>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td> Jumlah Bayar </td>
                    <td>
                        <input class="form-control" type="text" name="jumlah_bayar">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td> Kembalian </td>
                    <td>
                        <input type="text" name="kembalian" class="form-control" value="">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Simpan</button>
                    </td>
                </tr>
            </table>
            </form>


            <div class="section-body">
            </div>
    </section>
</div>
<!-- akhir main content -->