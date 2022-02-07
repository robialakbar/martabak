<?php
// Tentukan folder file yang boleh di download
$folder = "logo/";
// Lalu cek menggunakan fungsi file_exist
if (!file_exists($folder.$_GET['foto'])) {
  echo "<h1>Access forbidden!</h1>
      <p> Anda tidak diperbolehkan mendownload file ini.</p>";
  exit;
}

// Apabila mendownload file di folder files
else {

  // header yang menunjukkan nama file yang akan didownload
    header("Content-Disposition: attachment; filename=".$_GET['foto']);


  $fp = fopen($folder.$_GET['foto'], "r");
  $data = fread($fp, filesize($folder.$_GET['foto']));
  fclose($fp);
  print $data;
}
?>