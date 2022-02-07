<?php
session_start();

date_default_timezone_set('Asia/Jakarta');
include ('../config/koneksi.php');



$pencetak = $_POST['pencetak'];
$nipcetak = $_POST['nip_cetak'];
$nip      = $_POST['nip'];



$peg          = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE nip='$nip'");
$data_pegawai = mysqli_fetch_array($peg);


$nomor=1;
$tot=0;
$data        = mysqli_query($koneksi,"SELECT * FROM profil");

$home = mysqli_fetch_array($data);

require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$pdf = new Dompdf();
ob_start();
?>
<title>Surat Keterangan <?php echo $data_pegawai['nama'];?></title>
<link rel="shortcut icon" href="../logo/bm.png">
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

<center><a style="text-align: center;font-size: 17px;"><b>SURAT KETERANGAN
                                                      <br>
                                                      UNTUK MENDAPATKAN PEMBAYARAN TUNJANGAN KELUARGA  </b></a>
                                                      </center>
<hr>
<br>
<table width="100%" style="font-size: 14px;">
  <tr>
    <td>NAMA INSTANSI</td>
    <td>: <?php echo $home['nama'];?></td>
  </tr>
  <tr>
    <td>ALAMAT LENGKAP INSTANSI</td>
    <td>: <?php echo $home['alamat'];?></td>
  </tr>
  <tr>
    <td>INSTANSI INDUK</td>
    <td>: <?php echo $home['instansi'];?></td>
  </tr>
  <tr>
    <td>BENDAHARAWAN / PEMBUAT D. GAJI</td>
    <td>: <?php echo $pencetak;?> / NIP. <?php echo $nipcetak;?></td>
  </tr>
  <tr>
    <td style="padding-top: 30px;padding-left: 12px;">1 DATA PEGAWAI:</td>
    <td></td>
  </tr>
  <tr>
    <td style="padding-left: 60px;">1 Nama Lengkap</td>
    <td>: <?php echo $data_pegawai['nama'];?></td>
  </tr>
  <tr>
    <td style="padding-left: 60px;">2 NIP</td>
    <td>: <?php echo $data_pegawai['nip'];?></td>
  </tr>
  <tr>
    <td style="padding-left: 60px;">3 Pangkat / Golongan ( ruang )</td>
    <td>: <?php echo $data_pegawai['pangkat'];?></td>
  </tr>
  <tr>
    <td style="padding-left: 60px;">4 TMT Golongan ( ruang )</td>
    <td>: <?php if($data_pegawai['tmt_golongan']=="0000-00-00"){}else{ echo TanggalIndo($data_pegawai['tmt_golongan']); }?></td>
  </tr>
  <tr>
    <td style="padding-left: 60px;">5 Tempat / tanggal lahir</td>
    <td>: <?php echo $data_pegawai['tempat_lahir'];?> / <?php if($data_pegawai['tgl_lahir']=="0000-00-00"){}else{ echo TanggalIndo($data_pegawai['tgl_lahir']);} ?></td>
  </tr>
  <tr>
    <td style="padding-left: 60px;">6 Jenis Kelamin</td>
    <td>: <?php if($data_pegawai['gender']=="l"){ echo "Laki - Laki"; } else { echo "Wanita"; }?></td>
  </tr>
  <tr>
    <td style="padding-left: 60px;">7 Agama / Kebangsaan</td>
    <td>: <?php echo $data_pegawai['agama'];?> / <?php echo $data_pegawai['kebangsaan'];?></td>
  </tr>
  <tr>
    <td style="padding-left: 60px;" valign="top">8 Alamat Lengkap</td>
    <td>: <?php echo $data_pegawai['alamat'];?>
          <br>&nbsp; RT / RW : <?php echo $data_pegawai['rt'];?> / <?php echo $data_pegawai['rw'];?>
          <br>&nbsp; Desa ( Kelurahan ) : <?php echo $data_pegawai['desa'];?>
          <br>&nbsp; Kecamatan : <?php echo $data_pegawai['kecamatan'];?>
          <br>&nbsp; Kabupaten / Kotamadya : <?php echo $data_pegawai['kabupaten'];?>
    </td>
  </tr>
  <tr>
    <td style="padding-left: 60px;">9 TMT Capeg</td>
    <td>: <?php if($data_pegawai['tmt_capeg']=="0000-00-00"){}else{ echo TanggalIndo($data_pegawai['tmt_capeg']);}?></td>
  </tr>
  <tr>
    <td style="padding-left: 53px;">10 Jenis Kepegawaian</td>
    <td>: <?php echo $data_pegawai['jenis_pegawai'];?></td>
  </tr>
  <tr>
    <td style="padding-left: 53px;">11 Status Kepegawaian</td>
    <td>: <?php echo $data_pegawai['status_pegawai'];?></td>
  </tr>
  <tr>
    <td style="padding-left: 53px;">12 Digaji menurut ( PP / SK)</td>
    <td>: <?php echo $data_pegawai['digaji_menurut'];?><a style="padding-left: 10px;"> Gaji pokok </a> <a style="text-align: right;padding-left: 10px;">Rp. <?php echo number_format($data_pegawai['gaji_pokok'],0,".",".");?></a></td>
  </tr>
  <tr>
    <td style="padding-left: 53px;">13 Besarnya Penghasilan</td>
    <td>: Rp. <?php echo number_format($data_pegawai['besarnya_penghasilan'],0,".",".");?></td>
  </tr>
  <tr>
    <td style="padding-left: 53px;">14 Jabatan Struktural / Fungsional</td>
    <td>: <?php echo $data_pegawai['jabatan'];?></td>
  </tr>
  <tr>
    <td style="padding-left: 53px;">15 Jumlah Keluarga Tertanggung</td>
    <td>: 
    <?php if ($data_pegawai['jumlah_keluarga']>0 && $data_pegawai['jumlah_keluarga']<=10)
    {echo $data_pegawai['jumlah_keluarga'];}
    elseif($data_pegawai['jumlah_keluarga']>10)
      {}?> 
    <?php if ($data_pegawai['jumlah_keluarga']=="0" OR $data_pegawai['jumlah_keluarga']=="") {}
          elseif ($data_pegawai['jumlah_keluarga']=="1") {
                echo "(satu)     orang";
         }elseif ($data_pegawai['jumlah_keluarga']=="2") {
                echo "(dua)     orang";
        }elseif ($data_pegawai['jumlah_keluarga']=="3") {
                echo "(tiga)     orang";
        }elseif ($data_pegawai['jumlah_keluarga']=="4") {
                echo "(empat)     orang";
        }elseif ($data_pegawai['jumlah_keluarga']=="5") {
                echo "(lima)     orang";
        }elseif ($data_pegawai['jumlah_keluarga']=="6") {
                echo "(enam)     orang";
        }elseif ($data_pegawai['jumlah_keluarga']=="7") {
                echo "(tujuh)     orang";
        }elseif ($data_pegawai['jumlah_keluarga']=="8") {
                echo "(delapan)     orang";
        }elseif ($data_pegawai['jumlah_keluarga']=="9") {
                echo "(sembilan)     orang";
        }elseif ($data_pegawai['jumlah_keluarga']=="10") {
                echo "(sepuluh)     orang";
        }elseif ($data_pegawai['jumlah_keluarga']>="1") {
                echo "(lebih dari sepuluh)     orang";
        }          ?>
    </td>
  </tr>
  <tr>
    <td style="padding-left: 53px;">16 SK Terakhir yang dimiliki</td>
    <td>: <?php echo $data_pegawai['sk_terakhir'];?></td>
  </tr>
  <tr>
    <td style="padding-left: 53px;">17 Masa kerja golongan</td>
    <td>: <?php echo $data_pegawai['masa_kerja_golongan'];?> </td>
  </tr>
  <tr>
    <td style="padding-left: 72px;"> Masa kerja keseluruhan</td>
    <td>: <?php echo $data_pegawai['masa_kerja_keseluruhan'];?> </td>
  </tr>
<tr>
  <td colspan="2" style="padding-top: 30px;padding-left: 17px;">
    Keterangan ini saya buat dengan sesungguhnya dan apabila ini tidak benar ( palsu ), saya bersedia <br>dituntut dimuka pengadilan berdasarkan undang undang yang berlaku, dan bersedia mengembalikan semua <br> uang tunjangan yang telah saya terima yang seharusnya bukan menjadi hak saya.
  </td>
</tr>
</table>
<br>
  <table width="100%" style="font-size: 14px;">
  <tr>
    <td width="58%" style=";padding-left: 29px;">
    Mengetahui / mengesahkan
      <br>Plt. Kepala <?php echo $home['nama'];?>
      <br>
      <br>
      <br>
      <br>
      <br>
      <?php 
      $ttd=mysqli_query($koneksi,"SELECT * FROM pegawai WHERE jabatan='KEPALA DINAS'");
      $dt=mysqli_fetch_array($ttd); ?>
      <a style="text-decoration: underline;"> <?php echo $dt['nama'];?></a><br>
      NIP . <?php echo $dt['nip'];?>
    </td>
    <td width="30%">
      <?php echo $home['kota'];?>, <?php $tgl = date('Y-m-d'); echo TanggalIndo($tgl);?>
      <br>
      Pegawai yang bersangkutan
      <br>
      <br>
      <br><br><br>
      <a style="text-decoration: underline;"><?php echo $data_pegawai['nama'];?></a>
      <br>
      NIP . <?php echo $data_pegawai['nip'];?>
    </td>
  </tr>
</table>
</body>





<br><br><br><br>



<!-- ke 2 -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>

<p><a style="font-size: 15px;"><b>DATA KELUARGA ( YANG MENJADI TANGGUNGAN PEGAWAI )</a>
                                                      </p>
<hr>
<br>
<table width="100%" style="font-size: 15px;">
  <tr>
    <td style="padding-left: 30px;"><b>A. KAWIN SYAH DENGAN ISTRI / SUAMI</b></td>
  </tr>
  <tr>
    <td style="padding-top: 20px;">
    <table width="100%"  border="1" cellspacing="0" style="font-size: 10px;">
                                <thead>
                                    <tr class="odd bg-gray">
                                        <th width="1%">No</th>
                                        <th><center>Nama Istri / Suami</center></th>
                                        <th width="18%"><center>Tempat, Tanggal Lahir</center></th>
                                        <th width="15%"><center>NIP/NIK</center></th>
                                        <th width="13%"><center>Pekerjaan</center></th>
                                        <th width="15%"><center>Tanggal Nikah</center></th>
                                        <th width="7%"><center>Istri / Suami ke</center></th>
                                        <th width="13%"><center>Penghasilan / Bulan</center></th>
                                    </tr>
                                </thead>
                                <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
                                <tbody>
                                <?php
                                    // SET NOMOR URUT DATA
                                    $nomor          =   1;
                                    
                                    // CEK DATA YANG DITERIMA
                                    $data_keluarga = mysqli_query($koneksi,"SELECT * FROM keluarga WHERE nip ='$data_pegawai[nip]'");
                                        while($row_keluarga  = mysqli_fetch_array($data_keluarga)) {
                                ?>
                                
                                    <tr class="odd gradeX">
                                        <td align="center"><?php echo $nomor; ?></td>
                                        <td style="padding-left: 5px"><?php echo $row_keluarga['nama']; ?></td>
                                        <td style="padding-left: 5px;"><?php echo $row_keluarga['tempat']; ?>, <?php if($row_keluarga['tgl_lahir']=="0000-00-00"){}else{ echo TanggalIndo($row_keluarga['tgl_lahir']);} ?></td>
                                        <td align="center"><?php echo $row_keluarga['nik']; ?></td>
                                        <td align="center"><?php echo $row_keluarga['pekerjaan']; ?></td>
                                        <td align="center"><?php if($row_keluarga['tgl_nikah']=="0000-00-00"){}else{ echo TanggalIndo($row_keluarga['tgl_nikah']); } ?></td>
                                        <td align="center"><?php echo $row_keluarga['ke']; ?></td>
                                        <td align="right" style="padding-right: 10px;"><?php echo number_format($row_keluarga['penghasilan']); ?></td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
    </td>
  </tr>
  <tr>
    <td style="padding-top: 20px;"></td>
  </tr>
  <tr>
    <td style="padding-left: 30px;"><b>B. ANAK - ANAK YANG MENJADI TANGGUNGAN</b></td>
  </tr>
  <tr>
    <td style="padding-top: 20px;">
    <table width="100%" border="1" cellspacing="0" style="font-size: 10px;">
        <thead>
          <tr>
              <th width="1%">No</th>
              <th><center>Nama Anak</center></th>
              <th><center>Tempat, Tanggal Lahir</center></th>
              <th><center>Status Anak</center></th>
              <th><center>Dari Istri/Suami Ke</center></th>
              <th><center>Gender</center></th>
              <th><center>Dapat / Tidak Tunjangan</center></th>
              <th><center>Sudah / Belum Kawin</center></th>
              <th><center>Bekerja</center></th>
              <th><center>Masih / Tidak Sekolah / Kuliah</center></th>
              <th><center>Putusan Pengadilan (Khusus AA)</center></th>
          </tr>
        </thead>
    <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
        <tbody>
          <?php
            // SET NOMOR URUT DATA
            $nomor          =   1;
            $data_anak = mysqli_query($koneksi,"SELECT * FROM anak WHERE nip='$data_pegawai[nip]'");
            // CEK DATA YANG DITERIMA
              while($row_anak  = mysqli_fetch_array($data_anak)) {
          ?>
                                
            <tr class="odd gradeX">
              <td align="center"><?php echo $nomor; ?></td>
              <td><?php echo $row_anak['nama']; ?></td>
              <td><?php echo $row_anak['tempat']; ?>, <?php if($row_anak['tanggal_lahir']=="0000-00-00"){}else{ echo TanggalIndo($row_anak['tanggal_lahir']); } ?></td>
              <td align="center"><?php echo $row_anak['status']; ?></td>
              <td align="center"><?php echo $row_anak['ke']; ?></td>
              <td align="center"><?php echo $row_anak['gender']; ?></td>
              <td align="center"><?php echo $row_anak['tunjangan']; ?></td>
              <td align="center"><?php echo $row_anak['kawin']; ?></td>
              <td align="center"><?php echo $row_anak['bekerja']; ?></td>
              <td align="center"><?php echo $row_anak['sekolah']; ?></td>
              <td><?php echo $row_anak['putusan']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
    </td>
  </tr>
</table>
</body>
</html>

<?php

$html =ob_get_clean();

$pdf->loadHtml($html);

$pdf->setPaper('A4', 'Potrait',1, 1, 1, 1);

$pdf->render();
$pdf->stream('Surat Keterangan_'.$data_pegawai['nama'].'.pdf', Array('Attachment'=>0));
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

