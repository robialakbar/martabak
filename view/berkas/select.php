<title><?php echo $row_data['nama'];?> | Berkas Lampiran </title>
<?php
date_default_timezone_set('Asia/Jakarta');
if($_SESSION['level_simpeg']=="user"){
?>

            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Berkas Lampiran
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Lampiran</li>
              </ol>
            </section>
            <section class="content">

            <!-- INI UNTUK ISI -->
            
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->

                        <br>
                            <center>
                                
                                    <!-- <a href="" class="btn btn-info btn-lg">
                                        <span class="glyphicon glyphicon-upload"></span> Upload Berkas Lampiran
                                    </a> -->
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-danger"><i class="glyphicon glyphicon-upload"></i> Upload Berkas Lampiran</button>
                              

                            </center>
                        </br>                  

                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-file-archive-o fa-fw"></i> Data Berkas Lampiran
                            <div class="pull-right">
                                <label class="label" style="font-size: 15px;"> Pegawai : <?php echo $row_pegawai['nama'];?>
                                </label>
                            </div>
                        </div>

                        <!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body table-responsive">
                            <!-- INI BAGIAN TABEL -->
                             <table width="100%" id="tabel" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="odd bg-gray">
                                        <th width="1%">No</th>
                                        <th width="15%"><center>Tanggal Berkas</center></th>
                                        <th><center>Keteranganx</center></th>
                                        <th width="15%"><center>Lampiran</center></th>
                                        <th width="13%"><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
                                <tbody>
                                <?php
                                    // SET NOMOR URUT DATA
                                    $nomor          =   1;
                                    
                                    // CEK DATA YANG DITERIMA
                                    $data_berkas = mysqli_query($koneksi,"SELECT * FROM berkas WHERE nip='$row_pegawai[nip]' ORDER BY id DESC");
                                        while($row_berkas  = mysqli_fetch_array($data_berkas)) {
                                ?>
                               
                                    <tr class="odd gradeX">
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo TanggalIndo($row_berkas['tgl']); ?></td>
                                        <td><?php echo $row_berkas['keterangan']; ?></td>
                                        <td align="center">
                                        <?php 
                                        if($row_berkas['tipe']=="gambar"){ ?>
                                          <a  data-toggle="modal" data-target="#preview<?php echo $row_berkas['id']; ?>">
                                          <img src="logo/<?php echo $row_berkas['foto'];?>" style="width: 70px;height: 70px;"></a>
                                        <?php } else{?>
                                            <i class="fa fa-file-text">
                                                <br> File Berkas
                                            </i>
                                        <?php } ?>
                                        </td>
                                        <td>
                                            <center>
                                                <!-- prefiew foto -->
                                                <div class="modal fade" id="preview<?php echo $row_berkas['id']; ?>">
                                                  <div class=" modal-lg">
                                                    <div class="">
                                                      <div class="">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span></button>

                                                          <img src="logo/<?php echo $row_berkas['foto'];?>" style="width: 100%;height: 100%;">
                                                      </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                      </div>

                                                    </div>
                                                    <!-- /.modal-content -->
                                                  </div>
                                                  <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->  
                                            <center>    
                                                <a href="download.php?foto=<?php echo $row_berkas['foto']; ?>" class="btn btn-danger btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Download" onClick="return confirm('Anda Yakin Ingin Mendownload File Ini???...')"> <i class="fa fa-download"></i></a>

                                                <a href="index.php?controller=berkas&method=delete&id=<?php echo $row_berkas['id']; ?>&nip=<?php echo $row_berkas['nip'];?>" class="btn btn-danger btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Delete" onClick="return confirm('Anda Yakin Ingin Menghapus File Ini???...')"> <i class="fa fa-trash"></i></a>
                                            </center> 
                                        </td>
                                    </tr>
                                
                                <?php
                                        // INCREMENT NOMOR URUT
                                        $nomor++;
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
                            <!-- sampai sini -->
                            <!--Modal Untuk Tambah Data -->
                                <div class="modal modal-primary fade" id="modal-danger">
                                          <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                <center><h4 class="modal-title">Tambah Data Lampiran</h4></center>
                                              </div>
                                              <form role="form" method="POST" name="kategori" action="index.php?controller=berkas&method=insert_berkas" enctype="multipart/form-data" onsubmit="return validasi();">
                                                  <table width="100%" class="modal-body">
                                                    <tr>
                                                        <td></td>
                                                          <td>
                                                            <div class="modal-body">
                                                              <label>Keterangan</label>
                                                            </div>
                                                          </td>
                                                          <td>
                                                              <div class="modal-body">
                                                              :
                                                            </div>
                                                          </td>
                                                          <td>
                                                            <div class="modal-body">
                                                            <input type="hidden" name="nip" value="<?php echo $row_pegawai['nip'];?>"></input>
                                                              <input type="text" name="berkas" id="nomor_kas" class="form-control" placeholder="Keterangan" required oninvalid="this.setCustomValidity('Masukan Keterangan')" oninput="setCustomValidity('')" autocomplete="off">
                                                              <input type="hidden" name="tgl" value="<?php echo date('Y-m-d');?>"></input>
                                                            </div>
                                                          </td>
                                                          <td></td>
                                                    </tr>
                                                    <tr>
                                                      <td></td>
                                                      <td>
                                                        <div class="modal-body">
                                                          <label>Berkas Lampiran</label>
                                                        </div>
                                                      </td>
                                                      <td>
                                                          <div class="modal-body">
                                                          :
                                                        </div>
                                                      </td>
                                                      <td>
                                                        <div class="modal-body">
                                                          <input type="file" name="gambar" class="form-control" required oninvalid="this.setCustomValidity('Masukan Berkas Foto')" oninput="setCustomValidity('')">
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
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </section>
<?php
}
else{
    echo "<script>window.history.back(); </script>";
}
?>