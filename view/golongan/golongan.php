<title><?php echo $row_data['nama'];?> | Golongan </title>
<?php
if ($_SESSION['level_simpeg']=="admin") {
?>

            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Data Golongan Ijasah
              </h1>
              <ol class="breadcrumb">
                <li><a href="?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Data Golongan Ijasah</li>
              </ol>
            </section>
            <section class="content">
             <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-danger"><li class="fa fa-plus"></li> Tambah Data</button>
             <br>
             <br>
            <!-- INI UNTUK ISI -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-default">
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-sitemap fa-fw"></i> Data Golongan Ijasah
                        </div>

                        <!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body table-responsive">
                            <!-- INI BAGIAN TABEL -->
                             <table width="100%" id="tabel" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="odd bg-gray">
                                        <th width="1%"><center>No</center></th>
                                        <th><center>Golongan</center></th>
                                        <th><center>Keterangan</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
                                <tbody>
                                <?php
                                    // SET NOMOR URUT DATA
                                    $nomor          =   1;
                                    
                                    // CEK DATA YANG DITERIMA
                                    if(isset($data_golongan)) {
                                        while($row_golongan  = mysqli_fetch_array($data_golongan)) {
                                ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row_golongan['golongan']; ?></td>
                                        <td><?php echo $row_golongan['keterangan']; ?></td>
                                        <td><center>
                                            <a type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#golongan<?php echo $nomor; ?>" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit fa-fw"></i></a>

                 <div class="modal modal-success fade" id="golongan<?php echo $nomor; ?>">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                 <center> <h4 class="modal-title">Edit Data Golongan Kepegawaian</h4> </center>
                                </div>
                                <form role="form" method="POST" action="index.php?controller=golongan&method=update_golongan" enctype="multipart/form-data">
                                    <table width="100%" class="modal-body">
                                    <tr>
                                    <td>
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label>Golongan</label>
                                      </div>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="modal-body">
                                        <input type="hidden" name="golongan" id="nomor_kas" value="<?php echo $row_golongan['golongan']; ?>" class="form-control" placeholder="Masukan golongan " required>
                                        <input type="text" name="golongan_baru" id="nomor_kas" value="<?php echo $row_golongan['golongan']; ?>" class="form-control" placeholder="Masukan golongan " required>
                                    </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label>Keterangan</label>
                                      </div>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="modal-body">
                                        <input type="text" name="keterangan" value="<?php echo $row_golongan['keterangan']; ?>" id="nomor_kas" class="form-control" placeholder="Keterangan" required oninvalid="this.setCustomValidity('Masukan Keterangan')" oninput="setCustomValidity('')" autocomplete="off">
                                    </div>
                                    </td>
                                    </tr>
                                    </table>
                                    
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

                                  <input id="button" type="submit" name="submit" class="btn btn-outline btn-xl"  value="Simpan" data-toggle="tooltip" data-placement="top" title="Simpan">
                                </div>
                                 </form>        
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->

                                            <a href="index.php?controller=golongan&method=delete_golongan&golongan=<?php echo $row_golongan['golongan']; ?>" class="btn btn-danger btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Delete" onClick="return confirm('Yakin hapus data <?php echo $row_golongan['golongan'];?>?')"> <i class="fa fa-trash fa-fw"></i> </a>
                                            </center>
 
                                        </td>
                                    </tr>
                                
                                <?php
                                        // INCREMENT NOMOR URUT
                                        $nomor++;

                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </section>


<!--Modal Untuk Tambah Data -->
<div class="modal modal-primary fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Tambah Data Golongan</h4></center>
              </div>
              <form role="form" method="POST" action="index.php?controller=golongan&method=insert_golongan" enctype="multipart/form-data">
                  <table width="100%" class="modal-body">
                  <tr>
                  <td>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Golongan</label>
                    </div>
                  </div>
                  </td>
                  <td>
                  <div class="modal-body">
                      <input type="text" name="golongan" id="nomor_kas" class="form-control" placeholder="Golongan" required oninvalid="this.setCustomValidity('Masukan Golongan')" oninput="setCustomValidity('')" autocomplete="off">
                  </div>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Keterangan</label>
                    </div>
                  </div>
                  </td>
                  <td>
                  <div class="modal-body">
                      <input type="text" name="keterangan" id="nomor_kas" class="form-control" placeholder="Keterangan" required oninvalid="this.setCustomValidity('Masukan Keterangan')" oninput="setCustomValidity('')" autocomplete="off">
                  </div>
                  </td>
                  </tr>
                  </table>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <input id="button" type="submit" name="submit" class="btn btn-outline btn-xl"  value="Simpan" data-toggle="tooltip" data-placement="top" title="Simpan">
              </div>
          </form>
                       
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

<?php 
}
else
{
    echo "<script>window.history.back(); </script>";
}
?>