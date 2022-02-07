<?php
session_start();

date_default_timezone_set('Asia/Jakarta');
include ('../config/koneksi.php');

$peg          = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE nip='$_POST[nip]'");
$peg2          = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE nip='$_POST[nip]'");
$data_pegawai = mysqli_fetch_array($peg);

if((!empty($_POST['bulan'])) && (!empty($_POST['tahun']))) {
          $bulan      = $_POST['bulan'];
          $tahun      = $_POST['tahun'];

  $where    = "WHERE month(tgl_gaji)='$bulan' AND year(tgl_gaji)='$tahun' AND nip='$data_pegawai[nip]' ";
}
elseif(!empty($_POST['bulan'])){
          $bulan      = $_POST['bulan'];
          $tahun      = date('Y');

  $where    = "WHERE month(tgl_gaji)='$bulan' AND year(tgl_gaji)='$tahun' AND nip='$data_pegawai[nip]' ";
}
elseif(!empty($_POST['tahun'])){
          $tahun      = $_POST['tahun'];
          $bulan      = date('m');

  $where    = "WHERE month(tgl_gaji)='$bulan' AND year(tgl_gaji)='$tahun' AND nip='$data_pegawai[nip]' ";
}
else {
  $bulan      = date('m');
  $tahun      = date('Y');

  $where    = "WHERE month(tgl_gaji)='$bulan' AND year(tgl_gaji)='$tahun' AND nip='$data_pegawai[nip]' ";

}

$nomor=1;
$tot=0;
$data        = mysqli_query($koneksi,"SELECT * FROM profil");

$home = mysqli_fetch_array($data);

require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$pdf = new Dompdf();
ob_start();
?>
<title>Data Slip Gaji Pegawai <?php echo $data_pegawai['nama']; ?></title>
<link rel="shortcut icon" href="../logo/bm.png">
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

<center><a style="text-align: center;font-size: 18px;"><b><?php echo $home['instansi'];?></b></a><br>
<a style="text-align: center;font-size: 16px;"><b>Daftar Pembayaran Gaji Induk PNS/CPNS</b></a><br>
<a style="text-align: center;font-size: 14px;"><b><?php echo $home['nama'];?> || <?php echo $home['nama'];?> </b></a><br>
<a style="text-align: center;font-size: 14px;"><b>Bulan : 
                                          <?php 
                                            if ($bulan=="01") {
                                                $bln = "Januari";
                                             }
                                            elseif ($bulan=="02") {
                                                $bln = "Februari";
                                             }
                                            elseif ($bulan=="03") {
                                                $bln = "Maret";
                                             }
                                            elseif ($bulan=="04") {
                                                $bln = "April";
                                             }
                                            elseif ($bulan=="05") {
                                                $bln = "Mei";
                                             }
                                            elseif ($bulan=="06") {
                                                $bln = "Juni";
                                             }
                                            elseif ($bulan=="07") {
                                                $bln = "Juli";
                                             }
                                            elseif ($bulan=="08") {
                                                $bln = "Agustus";
                                             }
                                            elseif ($bulan=="09") {
                                                $bln = "September";
                                             }
                                            elseif ($bulan=="10") {
                                                $bln = "Oktober";
                                             }
                                            elseif ($bulan=="11") {
                                                $bln = "November";
                                             }
                                            elseif ($bulan=="12") {
                                                $bln = "Desember";
                                             } echo " ".$bln. " ". $tahun;?></b></a></center>
<br>
<hr>
<br>
<table width="100%" border="1" style="font-size: 11px;" cellspacing="0" >
  <tr>
    <td align="center" rowspan="7" width="3%">No</td>
    <td align="center" rowspan="7" width="20%">Nama Pegawai
                <br>Tanggal Lahir
                <br>NIP
                <br>Status Pegawai/Golongan
                <br>NPWP
    </td>
    <td rowspan="7" width="7%">-Stts
               <br>&nbsp;Kawin
               <br>-Anak
               <hr>
                    -Jml <br>&nbsp;Jiwa
    </td>
    <td align="center" colspan="4">Penghasilan</td>
    <td align="center" colspan="2">Potongan</td>
  </tr>
  <tr>
        <td width="13%">Gaji Pokok</td>
        <td width="13%">Tunj. Hselon</td>
        <td width="12%">Tunj. Terpencil</td>
        <td width="12%">Tunj. BPJS</td>
        <td width="12%">Pot. Pajak</td>
        <td width="12%">Pot. JKM</td>
  </tr>
  <tr>
        <td>Tunj. Istri/Suami</td>
        <td>Tunj. Fung Umum</td>
        <td>Tunj. TKD</td>
        <td>Tunj. JKK</td>
        <td>Pot. BPJS</td>
        <td>Hutang/Lain"</td>
  </tr>
  <tr>
        <td>Tunj. Anak</td>
        <td>Tunj. Fungsional</td>
        <td>Tunj. Beras</td>
        <td>Tunj. JKM</td>
        <td>Pot. IWP 21</td>
        <td>BULOG</td>
    </tr>
    <tr>
        <td><b>Jumlah</b></td>
        <td>Tunj. Khusus</td>
        <td>Tunj. Pajak</td>
        <td>Pembulatan</td>
        <td>Pot. IWP 81</td>
        <td>Sewa Rumah</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>Juml. Kotor</b></td>
        <td>Pot. Taperum</td>
        <td><b>Potongan</b></td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>Pot. JKK</td>
        <td><b>Jumlah Bersih</b></td>
      </tr>
      <?php
      $nomor=1;
        while($row_data=mysqli_fetch_array($peg2))
        {
          $gaji = mysqli_query($koneksi,"SELECT * FROM gaji WHERE nip='$row_data[nip]' AND year(tgl_gaji)='$tahun' AND month(tgl_gaji)='$bulan'");
          $row_gaji=mysqli_fetch_array($gaji);
      ?>
  <tr>
    <td colspan="9"></td>
  </tr>
  <tr>
    <td align="center" rowspan="6" width="3%"><?php echo $nomor++;?></td>
    <td align="center" rowspan="6" width="20%"><?php echo $row_data['nama'];?>
                <br><?php if($row_data['tgl_lahir']=="0000-00-00"){ echo"NULL"; }else{echo TanggalIndo($row_data['tgl_lahir']);}?>
                <br><?php echo $row_data['nip'];?>
                <br><?php echo $row_data['status_pegawai'];?>/<?php echo $row_data['pangkat'];?>
                <br><?php echo $row_data['npwp'];?>
    </td>
    <td rowspan="6" width="7%" align="center"> 
    <?php 
    $dt_keluarga = mysqli_query($koneksi,"SELECT * FROM keluarga WHERE nip ='$row_data[nip]'");
    $dt_anak     = mysqli_query($koneksi,"SELECT * FROM anak WHERE nip ='$row_data[nip]'");

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
               <hr>
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
        <td align="right" style="padding-right: 8px"><b><?php echo number_format($row_gaji['gaji_pokok']+$row_gaji['tunj_anak']+$row_gaji['tunj_istri']+$row_gaji['tunj_hselon']+$row_gaji['tunj_fung_umum']+$row_gaji['tunj_fungsional']+$row_gaji['tunj_khusus']+$row_gaji['tunj_terpencil']+$row_gaji['tkd']+$row_gaji['tunj_beras']+$row_gaji['tunj_pajak']+$row_gaji['tunj_bpjs']+$row_gaji['tunj_jkk']+$row_gaji['tunj_jkm']+$row_gaji['pembulatan'],0,"",".");?></b></td>

        <td align="right" style="padding-right: 8px"><?php echo number_format($row_gaji['pot_tapebum'],0,".",".");?></td>
        <!-- potongan gaji -->
        <td align="right" style="padding-right: 8px"><b><?php echo number_format($row_gaji['pot_pajak']+$row_gaji['pot_bpjs']+$row_gaji['pot_iwp_21']+$row_gaji['pot_iwp_01']+$row_gaji['pot_tapebum']+$row_gaji['pot_jkk']+$row_gaji['pot_jkm']+$row_gaji['hutang']+$row_gaji['bulog']+$row_gaji['sewa_rumah'],0,"",".");?></b></td>
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
</table>
<br>
<br>
<table width="100%">
<td width="66%"></td>
<td style="font-size: 13px;">  <?php
    $tgl = date('Y-m-d');
    echo $home['kota'];
    echo ", ";
    echo TanggalIndo($tgl);?>
</td>
</table>
  <table width="100%">
    <td width="28%" style=";font-size: 13px;padding-left: 10px;">
    Pegawai Yang Bersangkutan
      <br>
      <br>
      <br>
      <br>
      <?php echo "( ". $data_pegawai['nama']." )";?>
      <br>
      NIP : <?php echo $_POST['nip'];?>
    </td>
    <td width="40%">
    </td>
    <td width="35%" style="font-size: 13px;">
      Kepala <?php echo $home['nama'];?>
      <br>
      <br>
      <br>
      <br>
      <?php 
      $ttd=mysqli_query($koneksi,"SELECT * FROM pegawai WHERE jabatan='KEPALA DINAS'");
      $dt=mysqli_fetch_array($ttd);
      echo "( ".$dt['nama']." )";
      ?><br>
      NIP : <?php echo $dt['nip'];?>
    </td>
</table>
</body>
</html>

<?php

$html =ob_get_clean();

$pdf->loadHtml($html);

$pdf->setPaper('F4', 'Potrait',1, 1, 1, 1);

$pdf->render();
$pdf->stream('Data Gaji Pegawai '.$data_pegawai['nama'].'_Bulan_'.$bln.'_'.$tahun.'.pdf', Array('Attachment'=>0));
?>

<?php
    function TanggalIndo($date){
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
     
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
     
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;     
        return($result);
    }
    ?>