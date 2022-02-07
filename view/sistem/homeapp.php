<title><?php echo $row_data['nama'];?> | Dashboard</title>

<!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>Dashboard
                <small>Control panel</small>
              </h1>
              <ol class="breadcrumb">
                <li><a href="proses.php?valid=sistem&method=homeapp"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"></i>Dashboard</li>
              </ol>
            </section>
            <section class="content-header">
            <section class="content-header bg-teal" style="border-radius: 5px;">
            
            <marquee><b>Selamat Datang Di Sistem Informasi Kenaikan Pangkat, Kenaikan Gaji Berkala dan Arsip Kepegawaian (SEPAKAT BERKAWAN) <?php
          echo $row_data['nama'];
      ?> <?php
          echo $row_data['instansi'];
      ?> 
      </b></marquee>
            </section>
            </section>
            <section class="content">

            <table width="100%"> 
            <tr>
                <td align="center" width="15%">         
                     <img src="logo/bm.png" style="width: 100px;">
                </td>
                <td width="85%">
                 <h2><b style="color: orange;">Sistem Informasi Kenaikan Pangkat, Kenaikan Gaji Berkala dan Arsip Kepegawaian (SEPAKAT BERKAWAN) <?php echo $row_data['nama'];?><br>
                 <?php echo $row_data['instansi'];?></b></h2>
                 <p style="color: black;text-shadow: 0 0 5px white;"><b><?php echo $row_data['alamat'];?></b></p>
                </td>
            </tr>
            </table>
            <br><br>
            <!-- INI UNTUK ISI -->
            <!-- INI UNTUK ISI -->
            <div class="row">

            <?php
                $usr = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$_SESSION[username_simpeg]'");
                $dt = mysqli_fetch_array($usr);

                $data_gaji   = mysqli_query($koneksi,"SELECT * FROM gaji WHERE nip ='$dt[nip]' ORDER BY id DESC");
                $jml = mysqli_fetch_array($data_gaji);
            ?>
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <p>Data Penghasilan Terakhir : <br> <?php if($jml['tgl_gaji']=="" OR $jml['tgl_gaji']=="0000-00-00"){ echo "<br>";}else{ echo str_replace("01 ","",TanggalIndo($jml['tgl_gaji'])); }?></p>
                      <p style="font-size: 25px;" align="center"><b>Rp. <?php echo number_format($jml['gaji_bersih'],0,".","."); ?></b></p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-money"></i>
                    </div>
                    <a href="index.php?controller=pegawai&method=info_gaji" class="small-box-footer">Lihat Riwayat Penggajian <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>



                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-blue">
                  <?php
                     $dt_keluarga = mysqli_query($koneksi,"SELECT * FROM keluarga WHERE nip ='$dt[nip]'");
                    $dt_anak     = mysqli_query($koneksi,"SELECT * FROM anak WHERE nip ='$dt[nip]'");

                    $jml_keluarga = mysqli_num_rows($dt_keluarga);
                    $jml_anak = mysqli_num_rows($dt_anak);

                    ?>
                    <div class="inner">
                      <p>Jumlah Tanggungan Keluarga</p>
                      <br>
                      <p align="center" style="font-size: 25px;"><b><?php echo $jml_anak+$jml_keluarga;?> Orang</b></p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-users"></i>
                    </div>
                    <a href="index.php?controller=pegawai&method=info" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

            </div>
    </section>