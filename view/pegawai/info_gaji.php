<title><?php echo $row_data['nama'];?> | Detail Gaji</title>

<?php
include('config/koneksi.php');
$q = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$_SESSION[username_simpeg]'");
$usr= mysqli_fetch_array($q);

$sql = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE nip='$usr[nip]'");

$row_pegawai = mysqli_fetch_array($sql);
$data_pegawai = mysqli_fetch_array($sql);

?>
            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Data Detail Penghasilan
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Data Detail Penghasilan</li>
              </ol>
            </section>

            <section class="content">
            <!-- INI UNTUK ISI -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-user fa-fw"></i> Data Diri
                            <div class="pull-right">
                                <label class="label" style="font-size: 15px;"> Pegawai : <?php echo $row_pegawai['nama'];?>
                                </label>
                            </div>
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
                            <label>Gaji Bulan : <?php
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
                            <table width="100%" border="1" style="font-size: 11px;" cellspacing="0" >
  <tr>
    <td align="center" rowspan="7" width="3%">No</td>
    <td align="center" rowspan="7" width="15%">Nama Pegawai
                <br>Tanggal Lahir
                <br>NIP
                <br>Status Pegawai/Golongan
                <br>NPWP
    </td>
    <td rowspan="7" width="7%">-Stts
               <br>&nbsp;Kawin
               <br>-Anak
                <br>    -Jml <br>&nbsp;Jiwa
    </td>
    <td align="center" colspan="4">Penghasilan</td>
    <td align="center" colspan="2">Potongan</td>
  </tr>
  <tr>
        <td width="13%" style="padding-left: 3px;">Gaji Pokok</td>
        <td width="13%" style="padding-left: 3px;">Tunj. Hselon</td>
        <td width="12%" style="padding-left: 3px;">Tunj. Terpencil</td>
        <td width="12%" style="padding-left: 3px;">Tunj. BPJS</td>
        <td width="12%" style="padding-left: 3px;">Pot. Pajak</td>
        <td width="12%" style="padding-left: 3px;">Pot. JKM</td>
  </tr>
  <tr>
        <td style="padding-left: 3px;">Tunj. Istri/Suami</td>
        <td style="padding-left: 3px;">Tunj. Fung Umum</td>
        <td style="padding-left: 3px;">Tunj. TKD</td>
        <td style="padding-left: 3px;">Tunj. JKK</td>
        <td style="padding-left: 3px;">Pot. BPJS</td>
        <td style="padding-left: 3px;">Hutang/Lain"</td>
  </tr>
  <tr>
        <td style="padding-left: 3px;">Tunj. Anak</td>
        <td style="padding-left: 3px;">Tunj. Fungsional</td>
        <td style="padding-left: 3px;">Tunj. Beras</td>
        <td style="padding-left: 3px;">Tunj. JKM</td>
        <td style="padding-left: 3px;">Pot. IWP 21</td>
        <td style="padding-left: 3px;">BULOG</td>
    </tr>
    <tr>
        <td style="padding-left: 3px;"><b>Jumlah</b></td>
        <td style="padding-left: 3px;">Tunj. Khusus</td>
        <td style="padding-left: 3px;">Tunj. Pajak</td>
        <td style="padding-left: 3px;">Pembulatan</td>
        <td style="padding-left: 3px;">Pot. IWP 81</td>
        <td style="padding-left: 3px;">Sewa Rumah</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td style="padding-left: 3px;"><b>Juml. Kotor</b></td>
        <td style="padding-left: 3px;">Pot. Taperum</td>
        <td style="padding-left: 3px;"><b>Potongan</b></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="padding-left: 3px;">Pot. JKK</td>
        <td style="padding-left: 3px;"><b>Jumlah Bersih</b></td>
      </tr>
      <?php
      $nomor=1;

        $row_data_gaji=mysqli_fetch_array($sql);
        {
          $gaji = mysqli_query($koneksi,"SELECT * FROM gaji WHERE nip='$row_pegawai[nip]' AND year(tgl_gaji)='$tahun' AND month(tgl_gaji)='$bulan'");
          $row_gaji=mysqli_fetch_array($gaji);
      ?>
  <tr>
    <td colspan="9"></td>
  </tr>
  <tr>
    <td align="center" rowspan="6" width="3%"><?php echo $nomor++;?></td>
    <td align="center" rowspan="6" width="15%"><?php echo $row_pegawai['nama'];?>
                <br><?php if($row_pegawai['tgl_lahir']=="0000-00-00" OR $row_pegawai['tgl_lahir']==""){ }else{echo TanggalIndo($row_pegawai['tgl_lahir']);}?>
                <br><?php echo $row_pegawai['nip'];?>
                <br><?php echo $row_pegawai['status_pegawai'];?>/<?php echo $row_pegawai['pangkat'];?>
                <br><?php echo $row_pegawai['npwp'];?>
    </td>
    <td rowspan="6" width="7%" align="center"> 
    <?php 
    $dt_keluarga = mysqli_query($koneksi,"SELECT * FROM keluarga WHERE nip ='$row_pegawai[nip]'");
    $dt_anak     = mysqli_query($koneksi,"SELECT * FROM anak WHERE nip ='$row_pegawai[nip]'");

    $jml_keluarga = mysqli_num_rows($dt_keluarga);
    $jml_anak = mysqli_num_rows($dt_anak);

    if($jml_keluarga>=0 && $jml_keluarga<1)
    {
      $stts= "TK - 0";
    }elseif($jml_keluarga>0)
    {
      $stts= "K - ".$jml_keluarga;
    }
    ?>
    <?php echo $stts; ?>
               <br><?php echo $jml_anak;?>
               <br>
                    <?php echo $jml_anak+$jml_keluarga+1;?>
    </td>
        <td width="13%" align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['gaji_pokok'],0,".",".");?></td>
        <td width="13%" align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['tunj_hselon'],0,".",".");?></td>
        <td width="12%" align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['tunj_terpencil'],0,".",".");?></td>
        <td width="12%" align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['tunj_bpjs'],0,".",".");?></td>
        <td width="12%" align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['pot_pajak'],0,".",".");?></td>
        <td width="12%" align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['pot_jkm'],0,".",".");?></td>
  </tr>
  <tr>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['tunj_istri'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['tunj_fung_umum'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['tkd'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['tunj_jkk'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['pot_bpjs'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['hutang'],0,".",".");?></td>
  </tr>
  <tr>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['tunj_anak'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['tunj_fungsional'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['tunj_beras'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['tunj_jkm'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['pot_iwp_21'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['bulog'],0,".",".");?></td>
    </tr>
    <tr>
        <td align="right" style="padding-right: 8px"><b><?php echo number_format($row_gaji['gaji_pokok']+$row_gaji['tunj_istri']+$row_gaji['tunj_anak'],0,".",".");?></b></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['tunj_khusus'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['tunj_pajak'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['pembulatan'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['pot_iwp_01'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['sewa_rumah'],0,".",".");?></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <!-- gaji kotor -->
        <td align="right" style="padding-right: 8px"><b><?php echo number_format($row_gaji['gaji_pokok']+$row_gaji['tunj_anak']+$row_gaji['tunj_istri']+$row_gaji['tunj_hselon']+$row_gaji['tunj_fung_umum']+$row_gaji['tunj_fungsional']+$row_gaji['tunj_khusus']+$row_gaji['tunj_terpencil']+$row_gaji['tkd']+$row_gaji['tunj_beras']+$row_gaji['tunj_pajak']+$row_gaji['tunj_bpjs']+$row_gaji['tunj_jkk']+$row_gaji['tunj_jkm']+$row_gaji['pembulatan'],0,"",".");?></b>
        </td>

        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['pot_tapebum'],0,".",".");?>
        </td>
        <!-- potongan gaji -->
        <td align="right" style="padding-right: 8px"><b><?php echo number_format($row_gaji['pot_pajak']+$row_gaji['pot_bpjs']+$row_gaji['pot_iwp_21']+$row_gaji['pot_iwp_01']+$row_gaji['pot_tapebum']+$row_gaji['pot_jkk']+$row_gaji['pot_jkm']+$row_gaji['hutang']+$row_gaji['bulog']+$row_gaji['sewa_rumah'],0,"",".");?></b>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['pot_jkk'],0,".",".");?></td>
        <td align="right" style="padding-right: 8px"><b><?php echo number_format($row_gaji['gaji_bersih'],0,".",".");?></b></td>
      </tr>
      <?php
        }
      ?>
</table></div></div></div></div></section>


<!--Modal Untuk Tambah Data -->
<div class="modal modal-primary fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Cetak Data Gaji Pegawai</h4></center>
              </div>
              <form role="form" method="POST" action="laporan/slip_gaji.php" enctype="multipart/form-data" target="_blank">
                  <table width="100%" class="modal-body">
                  <input name="nip" type="hidden" value="<?php echo $row_pegawai['nip'];?>"></input>
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



