<?php
session_start();

date_default_timezone_set('Asia/Jakarta');
include ('../config/koneksi.php');

$peg          = mysqli_query($koneksi,"SELECT * FROM pegawai ORDER BY id ASC");


$nomor=1;
$tot=0;
$data        = mysqli_query($koneksi,"SELECT * FROM profil");

$home = mysqli_fetch_array($data);

require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$pdf = new Dompdf();
ob_start();
?>
<title>Data Pegawai <?php echo $home['nama'];?></title>
<link rel="shortcut icon" href="../logo/bm.png">
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

<center><a style="text-align: center;font-size: 18px;"><b><?php echo $home['instansi'];?></b></a><br>
<a style="text-align: center;font-size: 16px;"><b>Daftar Kepegawian <?php echo $home['nama'];?></b></a><br>
<a style="text-align: center;font-size: 14px;"><b> <?php echo $home['alamat'];?> </b></a></center>
<br>
<hr>
<br>
<table width="100%" border="1" style="font-size: 12px;" cellspacing="0" >
  <tr style="background: orange;">
    <td align="center" width="3%" height="20"><b>No</b></td>
    <td align="center"><b>NIP></b></td>
    <td align="center" width="20%"><b>Nama Pegawai</b></td>
    <td align="center"><b>Pangkat / Golongan</td>
    <td align="center"><b>Jenis Pegawai</b></td>
    <td align="center"><b>Status Pegawai</b></td>
    <td align="center"><b>Jabatan</b></td>
  </tr>
  
      </tr>
      <?php
      $nomor=1;
        while($row_data=mysqli_fetch_array($peg))
        {
      ?>
  <tr>
    <td align="center" width="3%"><?php echo $nomor++;?></td>
    <td align="center"><?php echo $row_data['nip'];?></td>
    <td style="padding-left: 5px;"><?php echo $row_data['nama'];?></td>
    <td style="padding-left: 5px;"><?php echo $row_data['pangkat'];?></td>
    <td style="padding-left: 5px;"><?php echo $row_data['jenis_pegawai'];?></td>
    <td style="padding-left: 5px;"><?php echo $row_data['status_pegawai'];?></td>
    <td style="padding-left: 5px;"><?php echo $row_data['jabatan'];?></td>
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
    <td width="25%" style=";font-size: 13px;"align="center">
      <!--Admin
      <br>
      <br>
      <br>
      <br>
      <br>
      <?php echo $_SESSION['nama_simpeg'];?>-->
    </td>
    <td width="53%">
    </td>
    <td width="40%" style="font-size: 13px;">
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

$pdf->stream('Data Pegawai '.$home['nama'].'.pdf', Array('Attachment'=>0));
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