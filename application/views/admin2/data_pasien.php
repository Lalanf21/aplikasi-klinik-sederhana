<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pasien</h1>
        </div>

        <div class="row mb-2">
            <div class="col-lg-12 col-md-12">
                <button type="button" href="" class="btn btn-primary btn-large" data-toggle="modal" data-target="#exampleModal">Tambah Pasien Baru</button>
            </div>
        </div>


        <!-- table data pasien -->
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Pasien</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tanggal lahir</th>
                                    <th>Rekam medis</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="#" class="font-weight-600"> Bagus Dwi Cahya</a>
                                    </td>
                                    <td>
                                        10-sept-1999
                                    </td>
                                    <td>
                                        Asma Dan DBD
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="font-weight-600">
                                            Bagus Dwi Cahya
                                        </a>
                                    </td>
                                    <td>
                                        10-sept-1999
                                    </td>
                                    <td>
                                        Asma Dan DBD
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="font-weight-600">
                                            Bagus Dwi Cahya</a>
                                    </td>
                                    <td>
                                        10-sept-1999
                                    </td>
                                    <td>
                                        Asma Dan DBD
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

    </section>
</div>
<!-- akhir main -->

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Tambah Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="modal-body-lg">
                        <div class="form-group">
                            <label for="nama"> NAMA </label>
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
                            <label for="no_ktp"> No KTP</label>
                            <input class="form-control" type="text" name="no_ktp" id="no_ktp">
                        </div>

                        <div class="form-group">
                            <label for="no_telepon"> No Telepon </label>
                            <input class="form-control" type="text" name="no_telepon" id="no_telepon">
                        </div>

                        <div class="form-group">
                            <label for="alamat"> Alamat </label>
                            <input class="form-control" type="alamat" name="alamat" id="alamat">
                        </div>

                        <div class="form-group">
                            <select name="jenis_kartu" id="jenis_kartu" class="custom-select">
                                <option selected>--Jenis kartu--</option>
                                <option value="umum">UMUM</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="no-kartu"> No kartu </label>
                            <input class="form-control" type="no-kartu" name="no-kartu" id="no-kartu">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                            <button type="submit" class="btn btn-outline-success" name="tambah">TAMBAH PASIEN</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- akhir modal -->