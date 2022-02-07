<title><?php echo $row_data['nama'];?> | Data Gaji Pegawai </title>
<?php 
if ($_SESSION['level_simpeg']=="admin") {

    $row_pegawai  = mysqli_fetch_array($data_pegawai);
?>



            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Detail Mutasi Pegawai
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                 <li><a href="index.php?controller=mutasi&method=select"><i class="fa fa-line-chart"></i> Data Mutasi</a></li>
                <li class="active">Detail Mutasi</li>
              </ol>
            </section>
            <section class="content">
            
            <!-- INI UNTUK ISI -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-line-chart fa-fw"></i> Detail Mutasi Pegawai
                        </div>
                        <!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body table-responsive">
                            <!-- INI BAGIAN TABEL -->
                           
                             <table width="100%" id="tabel" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr  class="odd bg-blue">
                                        <td colspan="2" align="center">
                                             <label>Nama Pegawai : <?php echo $row_pegawai['nama'];?> </label>
                                        </td>
                                        <td colspan="2" align="center">
                                            <label>NIP : <?php echo $row_pegawai['nip'];?> 
                                                </label>
                                        </td>
                                    </tr>
                                    <tr class="odd bg-gray">
                                        
                                        <th colspan="4"><center>Perkembangan Mutasi</center></th>
                                    </tr>
                                    <tr  class="odd bg-gray">
                                        <th><center>
                                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-pangkat"><li class="fa fa-plus"></li></button>
                                            </center>
                                        </th>
                                        <th>
                                            
                                        </th>
                                        <th>
                                            
                                        </th>
                                        <th>
                                            
                                        </th>
                                    </tr>
                                    <tr class="odd bg-gray">
                                        <th width="25%">
                                            <center>Kenaikan Pangkat
                                                    <br> TMT
                                            </center>
                                        </th>
                                        <th width="25%">
                                            <center>Kenaikan Gaji Berkala
                                                    <br> TMT
                                            </center>
                                        </th>
                                        <th width="20%">
                                            <center>Pensuinan
                                                    <br> TMT
                                            </center>
                                        </th>
                                        <th width="25%">
                                            <center>Penyesuaian Ijasah
                                                    <br> TMT
                                            </center>
                                        </th>
                                    </tr>
                                </thead>
                                <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
                                <tbody>
                                    <tr class="odd gradeX">
                                        <!-- data mutasi -->
                                        
                                        <td align="center">
                                            
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </section>

<!--Modal Untuk Tambah Data -->
<div class="modal modal-primary fade" id="modal-pangkat">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Kenaikan Pangkat</h4></center>
              </div>
              <form role="form" method="POST" action="index.php?controller=kategori&method=insert_status" enctype="multipart/form-data" onsubmit="return validasi();">
                  <table width="100%" class="modal-body">
                  <tr>
                  <td>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Pangkat Sekarang</label>
                    </div>
                  </div>
                  </td>
                  <td>
                  <div class="modal-body">
                   <label>   <?php echo $row_pegawai['pangkat'];?> </label>
                  </div>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Pangkat Berikutnya</label>
                    </div>
                  </div>
                  </td>
                  <td>
                  <div class="modal-body">
                      <select name="pangkat" id="pangkat" class="form-control select2" style="width: 100%">
                                        <option value=" ">- Pilih Pangkat / Golongan -</option>
                                        <option value=" ">Kosong</option>
                                        <?php
                                          include ("config/koneksi.php");
                                            $query_pangkat = "select * from jabatan WHERE jenis='pangkat'"; 
                                              $pangkat = mysqli_query($koneksi,$query_pangkat);
                                                while($row_pangkat = mysqli_fetch_array($pangkat)) {     
                                                // MENAMPILKAN OPSI Kategori
                                                echo "<option value='$row_pangkat[nama]'>$row_pangkat[nama]</option>"; 
                                              }
                                            ?>
                                    </select>
                  </div>
                  </td>
                  </tr>
                   <tr>
                  <td>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>TMT</label>
                    </div>
                  </div>
                  </td>
                  <td>
                  <div class="modal-body">
                      <table width="100%">
                                    <td width="15%">
                                      <select name="hari" style="color: black;" class="form-control select2">
                                      <option value="1">1</option>
                                      </select>
                                    </td>
                                    <td width="20%" style="padding-left: 5px;">
                                      <select name="bulan" style="color: black;" class="form-control select2">
                                        <option value=" ">Bulan</option>
                                        <option value="04">April</option>
                                        <option value="10">Oktober</option>
                                      </select>
                                    </td>
                                    <td width="20%"  style="padding-left: 5px;">
                                      <select name="tahun" class="form-control select2">
                                                <?php
                                                $mulai = date('Y') - 10;
                                                for ($i= $mulai;$i<$mulai + 100;$i++){
                                                    $sel = $i == date('Y') ? ' selected = "selected"' : '';
                                                     echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                }
                                                ?>
                                            </select>
                                    </td>
                                    </table>
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
