 <!-- Main Content -->
 <div class="main-content">
     <section class="section">
         <div class="section-header">
             <h1>Input Pasien Baru</h1>
         </div>

         <!-- data pasien -->
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
                                     <th>Rekam medis Terakhir</th>
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
                                 </tr>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
         <!-- akhir table data pasien -->

         <!-- table resep obat -->
         <div class="col-lg-12 col-md-12 col-12 col-sm-12">
             <div class="card">
                 <div class="card-header">
                     <h4>Resep</h4>
                 </div>
                 <div class="card-body p-0">
                     <div class="table-responsive">
                         <table class="table table-striped mb-0">
                             <thead>
                                 <tr>
                                     <th>no</th>
                                     <th>Nama obat</th>
                                     <th>Aturan Pakai</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>
                                         1
                                     </td>
                                     <td>
                                         Hydrocodone
                                     </td>
                                     <td>
                                         3x1 sebelum makan
                                     </td>
                                     <td>
                                         <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                         <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         2
                                     </td>
                                     <td>
                                         Lisinoprol
                                     </td>
                                     <td>
                                         3x1 sebelum makan
                                     </td>
                                     <td>
                                         <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                         <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>
                                         3
                                     </td>
                                     <td>
                                         paracetamol
                                     </td>
                                     <td>
                                         3x1 sesudah makan
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
         <!-- akhir table resep obat -->

         <!-- form input resep -->
         <div class="col-lg-6 offset-lg-3 col-md-12 col-12 col-sm-12">
             <div class="card">
                 <div class="card-header">
                     <h4>Form input resep</h4>
                 </div>
                 <div class="card-body">
                     <form action="" method="post">
                         <div class="form-group">
                             <select name="obat" id="obat" class="custom-select">
                                 <option selected>--pilih obat--</option>
                                 <option value="dekadril">dekadril</option>
                                 <option value="amoxilin">amoxilin</option>
                             </select>
                         </div>

                         <div class="form-group">
                             <label for="aturan"> aturan pakai</label>
                             <input class="form-control" type="text" name="aturan" id="aturan">
                         </div>

                         <div class="form-group">
                             <button type="submit" name="tambah" class="btn btn-outline-primary">
                                 Tambah resep
                             </button>
                             <button type="submit" name="Simpan" class="btn btn-outline-success">
                                 Simpan
                             </button>
                         </div>

                     </form>
                 </div>
             </div>
         </div>
         <!-- akhir form input resep -->

         <div class="section-body"> </div>
     </section>
 </div>
<!-- akhir main -->