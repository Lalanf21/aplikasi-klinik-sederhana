<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Dokter</h1>
        </div>

        <div class="row mb-2">
            <div class="col-lg-12 col-md-12">
                <button type="button" href="" class="btn btn-primary btn-large" data-toggle="modal" data-target="#exampleModal">Tambah Dokter</button>
            </div>
        </div>

        <!-- table data pasien -->
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card mt-6">
                <div class="card-header">
                    <h4>Data Dokter</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Spesialis</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="#" class="font-weight-600"> Bagus Dwi Cahya</a>
                                    </td>
                                    <td>
                                        Umum
                                    </td>
                                    <td>
                                        Tangerang
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="font-weight-600"> Bagus Dwi Cahya</a>
                                    </td>
                                    <td>
                                        Gigi
                                    </td>
                                    <td>
                                        Bekasi
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir table data pasien -->

        <div class="section-body"> </div>
    </section>
</div>
<!-- akhir main -->

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama"> NAMA</label>
                            <input class="form-control" type="text" name="nama" id="nama" autofocus>
                        </div>

                        <div class="form-group">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="custom-select">
                                <option selected>--Jenis Kelamin--</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggal-lahir"> Tanggal lahir</label>
                            <input class="form-control" type="text" name="tanggal-lahir" id="tanggal-lahir">
                        </div>

                        <div class="form-group">
                            <label for="no_telepon"> No Telepon </label>
                            <input class="form-control" type="text" name="no_telepon" id="no_telepon">
                        </div>


                        <div class="form-group">
                            <label for="spesialis"> Spesialis</label>
                            <input class="form-control" type="text" value="umum" readonly>
                        </div>

                        <div class="form-group">
                            <label for="biaya"> Biaya Pemeriksaan </label>
                            <input class="form-control" type="biaya" name="biaya" id="biaya">
                        </div>

                        <div class="form-group">
                            <label for="password"> Password </label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-outline-success">TAMBAH DATA</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- akhir modal -->