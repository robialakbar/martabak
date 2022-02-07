<title><?php echo $row_data['nama'];?> | Data Gaji Pegawai </title>
<?php 
date_default_timezone_set('Asia/Jakarta');
if ($_SESSION['level_simpeg']=="admin") {
?>


            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Data Pemberitahuan 
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Data Pemberitahuan</li>
              </ol>
            </section>
            <section class="content">
            <!-- INI UNTUK ISI -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-info fa-fw"></i> Data Pemberitahuan
                        </div>

                        <!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body table-responsive">
                            <!-- INI BAGIAN TABEL -->
                           
                             <table width="100%" id="tabel" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="odd bg-gray">
                                        <th rowspan="2" width="1%" valign="top">No</th>
                                        <th rowspan="2"><center>Nip</center></th>
                                        <th rowspan="2"><center>Nama Pegawai</center></th>
                                        <th colspan="2"><center>Pemberitahuan Mutasi</center></th>
                                    </tr>
                                    <tr class="odd bg-gray">
                                        <th>
                                            <center>Kenaikan Pangkat
                                            </center>
                                        </th>
                                        <th>
                                            <center>Kenaikan Gaji Berkala
                                            </center>
                                        </th>
                                    </tr>
                                </thead>
                                <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
                                <tbody>
                                <?php
                                    // SET NOMOR URUT DATA
                                    $nomor          =   1;
                                    
                                    // CEK DATA YANG DITERIMA
                                    if(isset($data_pegawai)) {
                                        while($row_pegawai  = mysqli_fetch_array($data_pegawai)) {
                                ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row_pegawai['nip']; ?></td>
                                        <td><?php echo $row_pegawai['nama']; ?></td>
                                        <?php 
                                        $q_mutasi = mysqli_query($koneksi,"SELECT * FROM mutasi WHERE nip='$row_pegawai[nip]'");
                                        $mutasi= mysqli_fetch_array($q_mutasi);

                                        $date2 = new DateTime($mutasi['tmt_kenaikan']);

                                        $date1 = new DateTime(date('Y-m-d'));

                                        $date3 = new DateTime($mutasi['tmt_gaji']);


                                        $difference = $date1->diff($date2);

                                        $difference2 = $date3->diff($date1);

                                        $cek=$difference->days;

                                        $cek2=$difference2->days;
                                        ?>
                                        <!-- pangkat -->
                                        <td align="center">
                                        <?php

                                        if(date('Y-m-d')>$mutasi['tmt_kenaikan']){
                                            echo "<label class='label label-danger'>Tidak Ada Kenaikan Pangkat</label>";
                                        }
                                        elseif ($cek>=1 && $cek <= 31) { ?>
                                        <!-- pesan kenaikan -->
                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-kirimpangkat<?php echo $row_pegawai['nip'];?>"><li class="fa fa-send"></li> Kirim</button>
                                        
                                        <div class="modal modal-success fade" id="modal-kirimpangkat<?php echo $row_pegawai['nip'];?>">

                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                <center><h4 class="modal-title">Kirim Pemberitahuan Kenaikan Pangkat</h4></center>
                                              </div>
                                              <form role="form" method="POST" action="index.php?controller=wa&method=send_pangkat" enctype="multipart/form-data" onsubmit="return validasi();">

                                                  <table width="100%" id="tabel" class="table table-striped table-bordered table-hover">
                                                  <br>
                                                  <input name="nomor" type="hidden" value="<?php echo $row_pegawai['wa'];?>"></input>
                                                  <input type="hidden" name="nip" value="<?php echo $row_pegawai['nip'];?>"></input>
                                                  <textarea name="pesan" style="width: 80%" class="form-control" rows="3" >Kepada yang terhormat, Kenaikan Pangkat Bpk/Ibu  <?php echo $row_pegawai['nama']?> Akan Naik Ke Pangkat/Golongan <?php echo $mutasi['kenaikan_pangkat'];?> , TMT <?php echo TanggalIndo($mutasi['tmt_kenaikan']);?></textarea>
                                                  </table>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                <input id="button" type="submit" name="submit" class="btn btn-outline btn-xl"  value="Kirim" data-toggle="tooltip" data-placement="top" title="Kirim">
                                              </div>
                                          </form>
                                                       
                                            </div>
                                            <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                        <!-- end pesan kenaikan pangkat -->
                                        <?php }
                                        elseif ($cek=="0") { echo "<label class='label label-primary'>Naik Pangkat</label>";
                                        }
                                        else{
                                          if ($mutasi['kenaikan_pangkat']=="") {
                                            echo "<label class='label label-danger'>Tidak Ada Kenaikan Pangkat</label>";
                                          }else{ echo "<label class='label label-warning'>".$mutasi['kenaikan_pangkat']." / ".TanggalIndo($mutasi['tmt_kenaikan'])."</label>";
                                                      }
                                              }
                                        ?>

                                        </td>

                                        <!-- gaji -->
                                        <td align="center">
                                        <?php

                                        if(date('Y-m-d')>$mutasi['tmt_gaji']){
                                            echo "<label class='label label-danger'>Tidak Ada Kenaikan Gaji</label>";
                                        }
                                        elseif ($cek2>=1 && $cek2 <= 31) { ?>
                                        <!-- pesan kenaikan -->
                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-kirimgaji<?php echo $row_pegawai['nip'];?>"><li class="fa fa-send"></li> Kirim</button>
                                        
                                        <div class="modal modal-success fade" id="modal-kirimgaji<?php echo $row_pegawai['nip'];?>">

                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span></button>
                                                <center><h4 class="modal-title">Kirim Pemberitahuan Kenaikan Gaji</h4></center>
                                              </div>
                                              <form role="form" method="POST" action="index.php?controller=wa&method=send_gaji" enctype="multipart/form-data" onsubmit="return validasi();">

                                                  <table width="100%" id="tabel" class="table table-striped table-bordered table-hover">
                                                  <br>
                                                  <input name="nomor" type="hidden" value="<?php echo $row_pegawai['wa'];?>"></input>
                                                  <input type="hidden" name="nip" value="<?php echo $row_pegawai['nip'];?>"></input>
                                                  <textarea name="pesan" style="width: 80%" class="form-control" rows="3" >Kepada yang terhormat, Kenaikan Gaji Berkala Bpk/Ibu  <?php echo $row_pegawai['nama']?> akan naik menjadi Rp. <?php echo number_format($mutasi['kenaikan_gaji'],0,".",".") ?> , TMT <?php echo TanggalIndo($mutasi['tmt_gaji']);?></textarea>
                                                  </table>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                <input id="button" type="submit" name="submit" class="btn btn-outline btn-xl"  value="Kirim" data-toggle="tooltip" data-placement="top" title="Kirim">
                                              </div>
                                          </form>
                                                       
                                            </div>
                                            <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                        <!-- end pesan kenaikan pangkat -->
                                        <?php }
                                        elseif ($cek2=="0") { echo "<label class='label label-primary'>Naik Gaji</label>";
                                        }
                                        else{
                                          if ($mutasi['kenaikan_gaji']=="") {
                                            echo "<label class='label label-danger'>Tidak Ada Kenaikan Gaji</label>";
                                          }else{ echo "<label class='label label-warning'>Rp. ".number_format($mutasi['kenaikan_gaji'],0,".",".")." / ".TanggalIndo($mutasi['tmt_gaji'])."</label>";
                                                      }
                                              }
                                        ?>
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



<script language='javascript'>
  function validasi()
  {
    if (document.kategori.bulan.selectedIndex==0)
    {
      alert("Pilih Bulan Kelahiran");
      document.kategori.bulan.focus();
      return false;
    }
    if (document.kategori.tahun.selectedIndex==0)
    {
      alert("Pilih Tahun Kelahiran");
      document.kategori.tahun.focus();
      return false;
    }
    if (document.kategori.pangkat.selectedIndex==0)
    {
      alert("Pilih Pangkat / Golongan");
      document.kategori.pangkat.focus();
      return false;
    }
    return true
  }
</script>


<?php
}
else{
    echo "<script>window.history.back(); </script>";
}
?>
