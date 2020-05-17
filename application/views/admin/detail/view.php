<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data detail dokter</h1>
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
        <div class="col-sm-12 col-lg-6 col-md-6 mt-2">
        	<a href="<?= base_url('tambah-detail')?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 mt-2">
            <?= $this->session->flashdata('alert')?>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 mt-3">
        	<table class="table table-striped text-uppercase">
        		<thead class="table-dark font-weight-bold">
        			<tr>
        				<td>No</td>
        				<td>Nama dokter</td>
                        <td>Spesialis dokter</td>
        				<td>Opsi</td>
        			</tr>
        		</thead>
                <tbody><?php $no=1; ?>
                    <?php foreach ($query->result() as $key): ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $key->nama_obat ?></td>
                        <td><?= $key->jenis_obat ?></td>
                        <td><?= $key->dosis ?></td>
                        <td><?= 'Rp. '.number_format($key->harga); ?></td>
                        <td>
                            <a href="<?=base_url('ubah-obat/').$key->id_obat?>"><i class="fas fa-pen"></i></a>
                            |
                            <a onclick="return confirm('apakah anda yakin?')" href="<?=base_url('delete-obat/').$key->id_obat?>" ><i class="fas fa-trash"></i></a>
                        </td>
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