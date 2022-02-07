<title><?php echo $row_data['nama'];?> | Data Gaji Pegawai </title>
<?php
if ($_SESSION['level_simpeg']=="admin") {
?>

            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Data Gaji Pegawai
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Data Gaji Pegawai</li>
              </ol>
            </section>
            <section class="content">
            <!-- INI UNTUK ISI -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-users fa-fw"></i> Data Pegawai
                        </div>

                        <!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body table-responsive">
                            <!-- INI BAGIAN TABEL -->
                        <form role="form" method="POST" action="">
                            <table width="100%">
                             <thead>
                                    <tr>
                                        <th width="40%">
                                                <select name="bulan" class="form-control select2" style="width: 100%">
                                                  <option value="">Pilih Bulan</option>
                                                    <option value='01'>Januari</option>
                                                    <option value='02'>Februari</option>
                                                    <option value='03'>Maret</option>
                                                    <option value='04'>April</option>
                                                    <option value='05'>Mei</option>
                                                    <option value='06'>Juni</option>
                                                    <option value='07'>Juli</option>
                                                    <option value='08'>Agustus</option>
                                                    <option value='09'>September</option>
                                                    <option value='10'>Oktober</option>
                                                    <option value='11'>November</option>
                                                    <option value='12'>Desember</option>
                                                    </select>
                                        </th>
                                        <th width="1%"></th>
                                        <th width="40%">
                                            <select name="tahun" class="form-control select2" style="width: 100%">
                                                <?php
                                                $mulai = date('Y') - 6;
                                                for ($i= $mulai;$i<$mulai + 100;$i++){
                                                    $sel = $i == date('Y') ? ' selected = "selected"' : '';
                                                     echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </th>
                                        <th width="10%"><center>
                                        <button type="submit" name="cari" class="btn btn-info btn-xs" title="Cari"><i class="fa fa-search fa-fw"></i></button>

                                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-danger"><li class="fa fa-print"></li></button>

                                        </center>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            </form>
                            <?php
                            date_default_timezone_set('Asia/Jakarta');
                                if (isset($_POST['cari'])) {

                                    if((!empty($_POST['bulan'])) && (!empty($_POST['tahun']))) {
                                        $bulan          = $_POST['bulan'];
                                        $tahun          = $_POST['tahun'];
                                    }
                                    elseif(!empty($_POST['bulan'])) {
                                        $bulan           = $_POST['bulan'];
                                        $tahun           = date('Y');
                                    }
                                    elseif(!empty($_POST['tahun'])){
                                        $bulan          = date('m');
                                        $tahun          = $_POST['tahun'];
                                    }
                                    else {
                                        $bulan           = date('m');
                                        $tahun           = date('Y');
                                    }
                                }else
                                {
                                    $bulan           = date('m');
                                    $tahun           = date('Y');
                                }
                            ?>
                            <br>
                            <label>Bulan : <?php
                                            if ($bulan=="01") {
                                                echo "Januari";
                                             }
                                            elseif ($bulan=="02") {
                                                echo "Februari";
                                             }
                                            elseif ($bulan=="03") {
                                                echo "Maret";
                                             }
                                            elseif ($bulan=="04") {
                                                echo "April";
                                             }
                                            elseif ($bulan=="05") {
                                                echo "Mei";
                                             }
                                            elseif ($bulan=="06") {
                                                echo "Juni";
                                             }
                                            elseif ($bulan=="07") {
                                                echo "Juli";
                                             }
                                            elseif ($bulan=="08") {
                                                echo "Agustus";
                                             }
                                            elseif ($bulan=="09") {
                                                echo "September";
                                             }
                                            elseif ($bulan=="10") {
                                                echo "Oktober";
                                             }
                                            elseif ($bulan=="11") {
                                                echo "November";
                                             }
                                            elseif ($bulan=="12") {
                                                echo "Desember";
                                             }
                                echo " / ".$tahun;?></label><hr>
                             <table width="100%" id="tabel" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="odd bg-gray">
                                        <th width="5%">No</th>
                                        <th><center>Nip</center></th>
                                        <th><center>Nama Pegawai</center></th>
                                        <th><center>Gaji Bulan</center></th>
                                        <th><center>Total Gaji</center></th>
                                        <th><center>Aksi</center></th>
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
                                        <td align="center">
                                            <?php
                                            if ($bulan=="01") {
                                                echo "Januari";
                                             }
                                            elseif ($bulan=="02") {
                                                echo "Februari";
                                             }
                                            elseif ($bulan=="03") {
                                                echo "Maret";
                                             }
                                            elseif ($bulan=="04") {
                                                echo "April";
                                             }
                                            elseif ($bulan=="05") {
                                                echo "Mei";
                                             }
                                            elseif ($bulan=="06") {
                                                echo "Juni";
                                             }
                                            elseif ($bulan=="07") {
                                                echo "Juli";
                                             }
                                            elseif ($bulan=="08") {
                                                echo "Agustus";
                                             }
                                            elseif ($bulan=="09") {
                                                echo "September";
                                             }
                                            elseif ($bulan=="10") {
                                                echo "Oktober";
                                             }
                                            elseif ($bulan=="11") {
                                                echo "November";
                                             }
                                            elseif ($bulan=="12") {
                                                echo "Desember";
                                             }
                                              ?> <?php echo $tahun;?>
                                        </td>
                                        <td>
                                        <?php 
                                        include('config/koneksi.php');
                                        $gaji = mysqli_query($koneksi,"SELECT * FROM gaji WHERE nip ='$row_pegawai[nip]' AND month(tgl_gaji)='$bulan' AND year(tgl_gaji)='$tahun'");
                                        $num_gaji = mysqli_num_rows($gaji);
                                        $row_gaji = mysqli_fetch_array($gaji);
                                        if ($num_gaji<1) {
                                            echo "<center><label class='label label-danger'>Tidak Ada Slip Gaji</label></center>";
                                        }else{?>
                                        <a style="color: black;" class="pull-left">Rp. </a><a style="color: black;" class="pull-right"><?php echo number_format($row_gaji['gaji_bersih'],0,"","."); ?></a>
                                        <?php
                                        }
                                        ?>
                                        </td>
                                        <td><center>
                                        <?php
                                        if ($num_gaji<1) {?>
                                            <a href="index.php?controller=gaji&method=insert&nip=<?php echo $row_pegawai['nip']; ?>&m=<?php echo $bulan;?>&y=<?php echo $tahun;?>" class="btn btn-primary btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Detail" > <i class="fa fa-plus fa-fw"></i> Insert </a>
                                        <?php
                                        }else{?>
                                            <a href="index.php?controller=gaji&method=detail&nip=<?php echo $row_pegawai['nip']; ?>&m=<?php echo $bulan;?>&y=<?php echo $tahun;?>" class="btn btn-success btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Detail" > <i class="fa fa-info fa-fw"></i> Detail</a>
                                        <?php
                                        }
                                        ?>
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
                <center><h4 class="modal-title">Cetak Data Gaji Pegawai</h4></center>
              </div>
              <form role="form" method="POST" action="laporan/cetak_gaji.php" enctype="multipart/form-data" target="_blank">
                  <table width="100%" class="modal-body">
                  <div class="modal-body"></div>
                             <thead>
                                    <tr>
                                        <th width="30%"></th>
                                        <th width="40%">
                                                <select name="bulan" class="form-control select2" style="width: 100%">
                                                  <option value="">Pilih Bulan</option>
                                                    <option value='01'>Januari</option>
                                                    <option value='02'>Februari</option>
                                                    <option value='03'>Maret</option>
                                                    <option value='04'>April</option>
                                                    <option value='05'>Mei</option>
                                                    <option value='06'>Juni</option>
                                                    <option value='07'>Juli</option>
                                                    <option value='08'>Agustus</option>
                                                    <option value='09'>September</option>
                                                    <option value='10'>Oktober</option>
                                                    <option value='11'>November</option>
                                                    <option value='12'>Desember</option>
                                                    </select>
                                        </th>
                                        <th width="1%"></th>
                                    </tr>
                                    <tr style="height: 20px;"></tr>
                                    <tr>
                                        <th width="30%"></th>
                                        <th width="40%">
                                            <select name="tahun" class="form-control select2" style="width: 100%">
                                                <?php
                                                $mulai = date('Y') - 6;
                                                for ($i= $mulai;$i<$mulai + 100;$i++){
                                                    $sel = $i == date('Y') ? ' selected = "selected"' : '';
                                                     echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </th>
                                        <th width="30%"><center>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        <div class="modal-body"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <input id="button" type="submit" name="submit" class="btn btn-outline btn-xl"  value="Cetak" data-toggle="tooltip" data-placement="top" title="Cetak">
              </div>
          </form>
                       
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
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
<?php 
}
else
{
    echo "<script>window.history.back(); </script>";
}
?>