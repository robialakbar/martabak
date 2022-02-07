<title><?php echo $row_data['nama'];?> | Berkas </title>
<?php
date_default_timezone_set('Asia/Jakarta');
    $row_detail  = mysqli_fetch_array($data_detail);
?>

            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Berkas
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Berkas</li>
              </ol>
            </section>
            <section class="content">
             <a href="index.php?controller=pegawai&method=select" class="btn btn-md btn-success" data-toggle="tooltip" data-placement="top" title="Data Pegawai"><i class="fa fa-chevron-left fa-fw"></i>Back</a>

             <a href="index.php?controller=pegawai&method=detail&nip=<?php echo $row_detail['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Data Pegawai"><i class="fa fa-user fa-fw"></i>Data Diri</a>

             <a href="index.php?controller=pegawai&method=keluarga&nip=<?php echo $row_detail['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Data Istri / Suami"><i class="fa fa-street-view fa-fw"></i>Data Istri / Suami</a>

             <a href="index.php?controller=pegawai&method=anak&nip=<?php echo $row_detail['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Data Anak"><i class="fa fa-venus-double fa-fw"></i>Data Anak</a>

             <a href="index.php?controller=pegawai&method=gaji&nip=<?php echo $row_detail['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Penghasilan"><i class="fa fa-money fa-fw"></i>Penghasilan</a>

             <a href="index.php?controller=pegawai&method=berkas&nip=<?php echo $row_detail['nip'];?>" class="btn btn-md btn-danger" data-toggle="tooltip" data-placement="top" title="Lampiran"><i class="fa fa-file-archive-o fa-fw"></i>Lampiran</a>
             
             <div class="pull-right">
             <form method="post" action="laporan/surat_keterangan.php" target="_blank">
               <input name="pencetak" type="hidden" value="<?php echo $_SESSION['nama_simpeg'];?>"></input>
               <input name="nip_cetak" type="hidden" value="<?php echo $row_data2['nip'];?>"></input>
               <input name="nip" type="hidden" value="<?php echo $row_detail['nip'];?>"></input>
               <button class="btn btn-md btn-primary" name="ctk" data-toggle="tooltip" data-placement="top" title="Data Pegawai"><i class="fa fa-print fa-fw"></i>Cetak</button>
             </form>
             </div>

             <br>
             <br>
            <!-- INI UNTUK ISI -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-file-archive-o fa-fw"></i> Data Berkas
                            <div class="pull-right">
                                <label class="label" style="font-size: 15px;"> Pegawai : <?php echo $row_detail['nama'];?>
                                </label>
                            </div>
                        </div>

                        <!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body table-responsive">
                        <button type="button" class="btn btn-warning btn-xs pull-right" data-toggle="modal" data-target="#modal-danger"><li class="fa fa-plus"></li> Add</button>
                             <br>
                             <br>
                            <!-- INI BAGIAN TABEL -->
                             <table width="100%" id="tabel" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="odd bg-gray">
                                        <th width="1%">No</th>
                                        <th width="15%"><center>Tanggal Berkas</center></th>
                                        <th><center>Keterangan</center></th>
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
                                    if(isset($data_berkas)) {
                                        while($row_berkas  = mysqli_fetch_array($data_berkas)) {
                                ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo TanggalIndo($row_berkas['tgl']); ?></td>
                                        <td><?php echo $row_berkas['keterangan']; ?></td>
                                        <td align="center">
                                        <?php
                                        if($row_berkas['tipe']=="gambar"){?>
                                          <a  data-toggle="modal" data-target="#preview<?php echo $row_berkas['id']; ?>">
                                          <img src="logo/<?php echo $row_berkas['foto'];?>" style="width: 70px;height: 70px;"></a>
                                        <?php } else {?>
                                            <i class="fa fa-file-text">
                                                <br> File Berkas
                                            </i>
                                        <?php } ?>
                                        </td>
                                        <td><center>

                                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ubah<?php echo $row_berkas['id']; ?>"> <li class="fa fa-edit"></li> </button>
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



                                            <!--Modal Untuk Tambah Data -->
<div class="modal modal-success fade" id="ubah<?php echo $row_berkas['id']; ?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Ubah Data Lampiran</h4></center>
              </div>
              <form role="form" method="POST" name="kategori" action="index.php?controller=berkas&method=ubah_berkas" enctype="multipart/form-data" onsubmit="return validasi();">
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
                    <input type="hidden" name="nip" value="<?php echo $row_detail['nip'];?>"></input>
                    <input type="hidden" name="id" value="<?php echo $row_berkas['id'];?>"></input>
                  <input type="text" name="berkas" id="nomor_kas" class="form-control" placeholder="Keterangan" value="<?php echo $row_berkas['keterangan'];?>" required oninvalid="this.setCustomValidity('Masukan Keterangan')" oninput="setCustomValidity('')" autocomplete="off" style="width: 100%">
                    </div>
                  </td>
                  <td></td>
                </tr>

                <tr>
                  <td></td>
                  <td>
                    <div class="modal-body">
                      <label>Lampiran</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <?php
                            if($row_berkas['tipe']=="gambar"){
                                    if($row_berkas['foto']=="")
                                    {
                                    }
                                    else
                                    {
                                      ?>
                                      <img src="logo/<?php echo $row_berkas['foto'];?>" style=";height: 60%;width: 60%;">
                                    <?php
                                    }
                            } else { echo "<i class='fa fa-file-text'> File Berkas</i>"; }
                        ?>
                                    <br>
                                    <br>
                                         <input type="file" name="gambar">
                    </div>
                  </td><td></td>
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

                                          <center>
                                            <a href="index.php?controller=berkas&method=delete&id=<?php echo $row_berkas['id']; ?>&nip=<?php echo $row_detail['nip'];?>" class="btn btn-danger btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Delete" onClick="return confirm('Yakin hapus?')"> <i class="fa fa-trash"></i> </a>
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
                    <input type="hidden" name="nip" value="<?php echo $row_detail['nip'];?>"></input>
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

        <!-- /.modal -->
<script type="text/javascript">
  function angka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }
</script>
