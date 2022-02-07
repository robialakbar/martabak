<title><?php echo $row_data['nama'];?> | Detail Pegawai</title>

<?php
    $row_pegawai  = mysqli_fetch_array($data_pegawai);
?>
            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Data Detail Pegawai 
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="index.php?controller=pegawai&method=select"> Data Pegawai</a></li>
                <li class="active">Data Detail</li>
              </ol>
            </section>

            <section class="content">
             <a href="index.php?controller=pegawai&method=select" class="btn btn-md btn-success" data-toggle="tooltip" data-placement="top" title="Data Pegawai"><i class="fa fa-chevron-left fa-fw"></i>Back</a>

             <a href="index.php?controller=pegawai&method=detail&nip=<?php echo $row_pegawai['nip'];?>" class="btn btn-md btn-danger" data-toggle="tooltip" data-placement="top" title="Data Pegawai"><i class="fa fa-user fa-fw"></i>Data Diri</a>

             <a href="index.php?controller=pegawai&method=keluarga&nip=<?php echo $row_pegawai['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Data Istri / Suami"><i class="fa fa-street-view fa-fw"></i>Data Istri / Suami</a>

             <a href="index.php?controller=pegawai&method=anak&nip=<?php echo $row_pegawai['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Data Anak"><i class="fa fa-venus-double fa-fw"></i>Data Anak</a>

             <a href="index.php?controller=pegawai&method=gaji&nip=<?php echo $row_pegawai['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Penghasilan"><i class="fa fa-money fa-fw"></i>Penghasilan</a>

             <a href="index.php?controller=pegawai&method=berkas&nip=<?php echo $row_pegawai['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Lampiran"><i class="fa fa-file-archive-o fa-fw"></i>Lampiran</a>

             <div class="pull-right">
             <form method="post" action="laporan/surat_keterangan.php" target="_blank">
               <input name="pencetak" type="hidden" value="<?php echo $_SESSION['nama_simpeg'];?>"></input>
               <input name="nip_cetak" type="hidden" value="<?php echo $row_data2['nip'];?>"></input>
               <input name="nip" type="hidden" value="<?php echo $row_pegawai['nip'];?>"></input>
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
                            <i class="fa fa-user fa-fw"></i> Data Diri
                            <div class="pull-right">
                                <label class="label" style="font-size: 15px;"> Pegawai : <?php echo $row_pegawai['nama'];?>
                                </label>
                            </div>
                        </div>

                        <!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body table-responsive">
                            <!-- INI BAGIAN TABEL -->
                             <button type="button" class="btn btn-warning btn-xs pull-right" data-toggle="modal" data-target="#modal-danger"><li class="fa fa-circle-o-notch"></li> Edit</button>
                             <br>
                            <table width="100%">
                        <hr>
                            <!--baris 1-->
                            <tr>
                                <td width="20%">
                                    <div class="form-group">
                                    Nip
                                    </div>
                                </td>
                                <td width="3%" >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="30%">
                                    <div class="form-group">
                                    <?php echo $row_pegawai['nip'];?>
                                    </div>
                                </td>
                                <td width="1%" ></td>
                                <td width="22%">
                                    <div class="form-group">
                                    Pangkat / Golongan 
                                    </div>
                                </td>
                                <td width="3%" >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="23%">
                                    <div class="form-group">
                                    <?php echo $row_pegawai['pangkat'];?>
                                    </div>
                                </td>
                            </tr>
                            <!--baris 2-->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Nama
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <?php echo $row_pegawai['nama'];?>
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    TMT / Golongan 
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" id="data_1">
                                        <?php if($row_pegawai['tmt_golongan']=="0000-00-00") { } else{  echo TanggalIndo($row_pegawai['tmt_golongan']); }?>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 3 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tempat Lahir
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <?php echo $row_pegawai['tempat_lahir'];?>
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Jenis Kepegawaian
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <?php echo $row_pegawai['jenis_pegawai'];?>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 4 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tanggal Lahir
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <?php if($row_pegawai['tgl_lahir']=="0000-00-00"){} else { echo TanggalIndo($row_pegawai['tgl_lahir']); }?>
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    TMT Capeg
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <?php if($row_pegawai['tmt_capeg']=="0000-00-00"){}else { echo TanggalIndo($row_pegawai['tmt_capeg']);}?>
                                            </div>
                                </td>
                            </tr>
                            <!-- baris 5 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Gender
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <?php
                                    if($row_pegawai['gender']=="l")
                                        {
                                            echo "Laki - Laki";
                                        }else {
                                            echo "Perempuan";
                                        }
                                    ?>
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Status Kepegawaian
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <?php echo $row_pegawai['status_pegawai'];?>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 6  -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Agama
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <?php echo $row_pegawai['agama'];?>
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Jabatan Strukural
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                       <?php echo $row_pegawai['jabatan'];?>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 6  -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Kebangsaan
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <?php echo $row_pegawai['kebangsaan'];?>
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                     Digaji Menurut <br>( PP / SK )
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <?php echo $row_pegawai['digaji_menurut'];?>
                                    </div>
                                </td>
                            </tr>
                             <!-- baris 7  -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Jumlah Keluarga
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <?php echo $row_pegawai['jumlah_keluarga'];?>
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Gaji Pokok
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                     Rp.   <?php echo number_format($row_pegawai['gaji_pokok'],0,".",".");?>
                                    </div>
                                </td>
                            </tr>
                             <!-- baris 8  -->
                            <tr>
                                <td rowspan="2">
                                    <div class="form-group">
                                    Alamat
                                    </div>
                                </td>
                                <td rowspan="2">
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td rowspan="2">
                                    <div class="form-group">
                                    <?php echo $row_pegawai['alamat'];?><br> Rt <?php echo $row_pegawai['rt'];?>/Rw<?php echo $row_pegawai['rw'];?>, Desa <?php echo $row_pegawai['rt'];?><br> Kecamatan <?php echo $row_pegawai['kecamatan'];?><br> Kabupaten <?php echo $row_pegawai['kabupaten'];?>
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Besarnya Penghasilan
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <?php 
                                    $sql    = mysqli_query($koneksi,"SELECT * FROM gaji WHERE nip='$row_pegawai[nip]' ORDER BY id DESC");
                                    $row_gaji = mysqli_fetch_array($sql);
                                    ?>
                                       Rp. <?php echo number_format($row_gaji['gaji_bersih'],0,".",".");?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="3%"></td>
                                <td>
                                    <div class="form-group">
                                    Nomor WhatsApp
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <?php echo $row_pegawai['wa'];?>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 9  -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    SK Terakhir
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <?php echo $row_pegawai['sk_terakhir'];?>
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Masa Kerja Golongan
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <?php echo $row_pegawai['masa_kerja_golongan'];?>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 10  -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    NPWP
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <?php echo $row_pegawai['npwp'];?>
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Masa Kerja Keseluruhan
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <?php echo $row_pegawai['masa_kerja_keseluruhan'];?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </section>


<!--Modal Untuk Ubah Data -->
<div class="modal modal-primary fade" id="modal-danger">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Ubah Data Kepegawaian</h4></center>
              </div>
              <form name="kategori" action="index.php?controller=pegawai&method=ubah_data" method="POST" onsubmit="return validasi();">
                     <table width="100%">
                        <hr>
                            <!--baris 1-->
                            <tr>
                                <td width="13%" style="padding-left: 20px;">
                                    <div class="form-group">
                                    Nip
                                    </div>
                                </td>
                                <td width="3%">
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="22%">
                                    <div class="form-group">
                                    <input name="nip" class="form-control" placeholder="Nip" autocomplete="off"  onkeypress="return angka(event);" value="<?php echo $row_pegawai['nip'];?>" readonly=""></input>
                                    </div>
                                </td>
                                <td width="3%"></td>
                                <td width="17%">
                                    <div class="form-group">
                                    Pangkat / Golongan 
                                    </div>
                                </td>
                                <td width="3%">
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="30%"   style="padding-right: 20px;">
                                    <div class="form-group">
                                    <select name="pangkat" style="width: 100%" id="pangkat" class="form-control select2">
                                        <?php
                                          include ("config/koneksi.php");
                                            $query_pangkat = "select * from jabatan WHERE jenis='pangkat'"; 
                                              $pangkat = mysqli_query($koneksi,$query_pangkat);
                                                while($row_pangkat = mysqli_fetch_array($pangkat)) {     
                                                // MENAMPILKAN OPSI Kategori
                                                    if ($row_pegawai['jabatan']=="$row_pangkat[nama]") {
                                                    echo "<option value='".$row_pangkat['nama']."' selected >".$row_pangkat['nama']."</option>";
                                                    }
                                                    else 
                                                    {
                                                        echo "<option value='".$row_pangkat['nama']."'>".$row_pangkat['nama']."</option>";
                                                    }
                                              }
                                            ?>
                                    </select>
                                    </div>
                                </td>
                            </tr>
                            <!--baris 2-->
                            <tr>
                                <td  style="padding-left: 20px;">
                                    <div class="form-group">
                                    Nama
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <input name="nama" class="form-control" value="<?php echo $row_pegawai['nama'];?>" placeholder="Nama" autocomplete="off" required=""></input>
                                    </div>
                                </td>
                                <td width="3%"></td>
                                <td>
                                    <div class="form-group">
                                    TMT / Golongan 
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td   style="padding-right: 20px;">
                                    <div class="form-group" id="data_1">
                                        <div class="form-group input-group date" id="ex2" data-date="" data-date-format="yyyy-mm-dd">
                                                <input name="tmt_golongan" value="<?php echo $row_pegawai['tmt_golongan'];?>" class="form-control" placeholder="Masukkan Tanggal" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 3 -->
                            <tr>
                                <td  style="padding-left: 20px;">
                                    <div class="form-group">
                                    Tempat Lahir
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <input name="tempat" value="<?php echo $row_pegawai['tempat_lahir'];?>" class="form-control" placeholder="Tempat Lahir" autocomplete="off" required=""></input>
                                    </div>
                                </td>
                                <td width="3%"></td>
                                <td>
                                    <div class="form-group">
                                    Jenis Kepegawaian
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td   style="padding-right: 20px;">
                                    <div class="form-group">
                                    <select name="jenis_pegawai" style="width: 100%" id="jenis_pegawai" class="select2 form-control">
                                        <?php
                                          include ("config/koneksi.php");
                                            $query_jenis = "select * from jabatan WHERE jenis='jenis'"; 
                                              $jenis = mysqli_query($koneksi,$query_jenis);
                                                while($row_jenis = mysqli_fetch_array($jenis)) {     
                                                // MENAMPILKAN OPSI Kategori
                                                if ($row_pegawai['jabatan']=="$row_jenis[nama]") {
                                                    echo "<option value='".$row_jenis['nama']."' selected >".$row_jenis['nama']."</option>";
                                                    }
                                                    else 
                                                    {
                                                        echo "<option value='".$row_jenis['nama']."'>".$row_jenis['nama']."</option>";
                                                    }
                                              }
                                            ?>
                                    </select>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 4 -->
                            <tr>
                                <td  style="padding-left: 20px;">
                                    <div class="form-group">
                                    Tanggal Lahir
                                    </div>
                                </td>
                                <td width="3%">
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="30%">
                                    <div class="form-group">
                                    <table width="100%">
                                    <td width="15%">
                                      <select name="hari" style="color: black;" class="form-control select2">
                                        <?php     
                                        $tgl = date('d',strtotime($row_pegawai['tgl_lahir']));
                                            // MENAMPILKAN OPSI Kategori
                                                echo "<option value='$tgl'>$tgl</option>"; 
                                            ?>
                                        <?php for($hari=1;$hari<=31;$hari++)
                                          {
                                        ?> <option value="<?php echo $hari;?>"><?php echo $hari;?></option>
                                        <?php
                                        }?>
                                      </select>
                                    </td>
                                    <td width="20%" style="padding-left: 5px;">
                                      <select name="bulan" style="color: black;" class="form-control select2">
                                        <?php     
                                        $bln = date('F',strtotime($row_pegawai['tgl_lahir']));
                                        $bln1 = date('m',strtotime($row_pegawai['tgl_lahir']));
                                            // MENAMPILKAN OPSI Kategori
                                                echo "<option value='$bln1'>$bln</option>"; 
                                            ?>
                                        <?php 
                                        $namabulan=array("Januari", "Februari", "Maret", "April", "Mei", "juni", "juli", "Agustus", "September", "Oktober", "November", "Desember");
                                        ?>
                                        <?php for($bulan=1;$bulan<=12;$bulan++)
                                          {
                                        ?>
                                        <option value="<?php echo $bulan;?>"><?php echo $namabulan[$bulan-1];?></option>
                                        <?php
                                        } ?>
                                      </select>
                                    </td>
                                    <td width="20%"  style="padding-left: 5px;">
                                      <select name="tahun" style="color: black;" class="form-control select2">
                                        <?php     
                                        $thn = date('Y',strtotime($row_pegawai['tgl_lahir']));
                                            // MENAMPILKAN OPSI Kategori
                                                echo "<option value='$thn'>$thn</option>"; 
                                            ?>
                                        <?php for($tahun=date('Y'); $tahun>=1900; $tahun--)
                                        {
                                        ?>
                                        <option value="<?php echo $tahun;?>"><?php echo $tahun;?></option>
                                        <?php } ?>
                                      </select>
                                    </td>
                                    </table>
                                    </div>
                                </td>
                                <td width="3%"></td>
                                <td>
                                    <div class="form-group">
                                    TMT Capeg
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td   style="padding-right: 20px;">
                                    <div class="form-group input-group date" id="ex2" data-date="" data-date-format="yyyy-mm-dd">
                                                <input name="tmt_capeg"  class="form-control" placeholder="Masukkan Tanggal" value="<?php echo $row_pegawai['tmt_capeg'];?>" readonly="readonly">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                </td>
                            </tr>
                            <!-- baris 5 -->
                            <tr>
                                <td  style="padding-left: 20px;">
                                    <div class="form-group">
                                    Gender
                                    </div>
                                </td>
                                <td width="3%">
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="30%">
                                    <div class="form-group">
                                    <table width="100%">
                                    <?php 
                                    // CEK PILIHAN SEBELUMNYA
                                    if($row_pegawai['gender'] == "l") {
                                      $L    = "checked";
                                      $P    = "";
                                    }
                                      else {
                                      $L    = "";
                                      $P    = "checked";
                                    }
                                    ?>
                                        <tr>
                                            <td>
                                                <input name="gender" type="radio" id="optionsRadios1" value="l" required="" <?php echo $L; ?>>
                                            </td>
                                            <td> Laki - Laki

                                            <td width="2%"></td>
                                            </td>
                                            <td>
                                                <input name="gender" type="radio" id="optionsRadios1" value="p" required="" <?php echo $P; ?>>
                                            </td>
                                            <td>Perempuan
                                            </td>
                                        </tr>
                                    </table>
                                    </div>
                                </td>
                                <td width="3%"></td>
                                <td>
                                    <div class="form-group">
                                    Status Kepegawaian
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td   style="padding-right: 20px;">
                                    <div class="form-group">
                                        <select name="status_pegawai" style="width: 100%" id="status_pegawai" class="form-control select2">
                                        <?php
                                            $query_status = "select * from jabatan WHERE jenis='status'"; 
                                              $status = mysqli_query($koneksi,$query_status);
                                                while($row_status = mysqli_fetch_array($status)) {     
                                                // MENAMPILKAN OPSI Kategori
                                                if ($row_pegawai['jabatan']=="$row_status[nama]") {
                                                    echo "<option value='".$row_status['nama']."' selected >".$row_status['nama']."</option>";
                                                    }
                                                    else 
                                                    {
                                                        echo "<option value='".$row_status['nama']."'>".$row_status['nama']."</option>";
                                                    }
                                              }
                                            ?>
                                    </select>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 6  -->
                            <tr>
                                <td  style="padding-left: 20px;">
                                    <div class="form-group">
                                    Agama
                                    </div>
                                </td>
                                <td width="3%">
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="30%">
                                    <div class="form-group">
                                    <select name="agama_pegawai" id="agama" style="color: black;" class="form-control select2">
                                        <?php
                                        echo "<option value='$row_pegawai[agama]'>$row_pegawai[agama]</option>"; 
                                        ?>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                      </select>
                                    </div>
                                </td>
                                <td width="3%"></td>
                                <td>
                                    <div class="form-group">
                                    Jabatan Strukural
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td   style="padding-right: 20px;">
                                    <div class="form-group">
                                        <select name="jabatan" style="width: 100%" id="jabatan" class="form-control select2">
                                        <?php
                                            $query_jabatan = "select * from jabatan WHERE jenis='jabatan'"; 
                                              $jabatan = mysqli_query($koneksi,$query_jabatan);
                                                while($row_jabatan = mysqli_fetch_array($jabatan)) 
                                                { 
                                                    if ($row_pegawai['jabatan']=="$row_jabatan[nama]") {
                                                    echo "<option value='".$row_jabatan['nama']."' selected >".$row_jabatan['nama']."</option>";
                                                    }
                                                    else 
                                                    {
                                                        echo "<option value='".$row_jabatan['nama']."'>".$row_jabatan['nama']."</option>";
                                                    }
                                              }
                                            ?>
                                    </select>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 6  -->
                            <tr>
                                <td  style="padding-left: 20px;">
                                    <div class="form-group">
                                    Kebangsaan
                                    </div>
                                </td>
                                <td width="3%">
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="30%">
                                    <select name="kebangsaan" style="width: 100%" id="sk_terakhir" class="select2 form-control">
                                        <?php
                                                if ($row_pegawai['kebangsaan']=="WNI") {
                                                    echo "<option value='WNI' selected >WNI</option>";
                                                    }
                                                    else 
                                                    {
                                                        echo "<option value='WNI'>WNI</option>";
                                                    }
                                                if ($row_pegawai['kebangsaan']=="WNA") {
                                                    echo "<option value='WNA' selected >WNA</option>";
                                                    }
                                                    else 
                                                    {
                                                        echo "<option value='WNA'>WNA</option>";
                                                    }
                                              
                                            ?>
                                    </select>
                                    </div>
                                </td>
                                <td width="3%"></td>
                                <td>
                                    <div class="form-group">
                                     Digaji Menurut <br>( PP / SK )
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td   style="padding-right: 20px;">
                                    <div class="form-group">
                                        <input name="gaji" value="<?php echo $row_pegawai['digaji_menurut'];?>" class="form-control" required="" autocomplete="off"></input>
                                    </div>
                                </td>
                            </tr>
                             <!-- baris 7  -->
                            <tr>
                                <td  style="padding-left: 20px;">
                                    <div class="form-group">
                                    Jumlah Keluarga
                                    </div>
                                </td>
                                <td width="3%">
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="30%">
                                    <div class="form-group">
                                    <input name="jml_keluarga" value="<?php echo $row_pegawai['jumlah_keluarga'];?>" style="width: 60px" type="number" value="0" min="0" class="form-control"></input>
                                    </div>
                                </td>
                                <td width="3%"></td>
                                <td>
                                    <div class="form-group">
                                    Gaji Pokok
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td   style="padding-right: 20px;">
                                    <div class="form-group">
                                        <input name="gaji_pokok" id="gaji_pokok" value="<?php echo number_format($row_pegawai['gaji_pokok'],0,".",".");?>" onkeypress="return angka(event);" class="form-control" autocomplete="off"></input>
                                    </div>
                                </td>
                            </tr>
                             <!-- baris 8  -->
                            <tr>
                                <td  style="padding-left: 20px;" rowspan="2">
                                    <div class="form-group">
                                    Alamat
                                    </div>
                                </td>
                                <td width="3%" rowspan="2">
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="30%" rowspan="2">
                                    <div class="form-group">
                                    <table width="100%">
                                        <tr>
                                            <td colspan="3">
                                                <input name="alamat" class="form-control" value="<?php echo $row_pegawai['alamat'];?>" required="" placeholder="Alamat"></input>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%">
                                                <input name="rt" onkeypress="return angka(event)" class="form-control" placeholder="RT" value="<?php echo $row_pegawai['rt'];?>"></input>
                                            </td>
                                            <td width="20%">
                                                <input name="rw" value="<?php echo $row_pegawai['rw'];?>" onkeypress="return angka(event)" class="form-control" placeholder="RW"></input>
                                            </td>
                                            <td width="60%">
                                                <input name="desa" value="<?php echo $row_pegawai['desa'];?>" class="form-control" placeholder="Desa"></input>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" colspan="3">
                                                <input name="kecamatan" value="<?php echo $row_pegawai['kecamatan'];?>" class="form-control" placeholder="Kecamatan"></input>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="20%" colspan="3">
                                                <input name="kabupaten" value="<?php echo $row_pegawai['kabupaten'];?>" class="form-control" placeholder="Kabupaten / kotamadya"></input>
                                            </td>
                                        </tr>
                                    </table>
                                    </div>
                                </td>
                                <td width="3%"></td>
                                <td>
                                    <div class="form-group">
                                    Besarnya Penghasilan
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td   style="padding-right: 20px;">
                                    <div class="form-group">
                                        <input name="penghasilan" value="<?php echo number_format($row_gaji['gaji_bersih'],0,".",".");?>" onkeypress="return angka(event);" class="form-control" readonly="" ></input>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="3%"></td>
                                <td>
                                    <div class="form-group">
                                    Nomor WhatsApp
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input name="wa" onkeypress="return angka(event);" class="form-control" value="<?php echo $row_pegawai['wa'];?>" placeholder="Nomor WhatsApp" ></input>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 9  -->
                            <tr>
                                <td  style="padding-left: 20px;">
                                    <div class="form-group">
                                    SK Terakhir
                                    </div>
                                </td>
                                <td width="3%">
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="30%">
                                    <div class="form-group">
                                    <select name="sk_terakhir" style="width: 100%" id="sk_terakhir" class="select2 form-control">
                                        <?php
                                            $query_sk = "select * from sk"; 
                                              $sk = mysqli_query($koneksi,$query_sk);
                                                while($row_sk= mysqli_fetch_array($sk)) {     
                                                // MENAMPILKAN OPSI Kategori
                                                if ($row_pegawai['sk_terakhir']=="$row_sk[keterangan]") {
                                                    echo "<option value='".$row_sk['keterangan']."' selected >".$row_sk['keterangan']."</option>";
                                                    }
                                                    else 
                                                    {
                                                        echo "<option value='".$row_sk['keterangan']."'>".$row_sk['keterangan']."</option>";
                                                    }
                                              }
                                            ?>
                                    </select>
                                    </div>
                                </td>
                                <td width="3%"></td>
                                <td>
                                    <div class="form-group">
                                    Masa Kerja Golongan
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td   style="padding-right: 20px;">
                                    <div class="form-group">
                                        <input name="masa_golongan" value="<?php echo $row_pegawai['masa_kerja_golongan'];?>" class="form-control" required="" autocomplete="off"></input>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 10  -->
                            <tr>
                                <td  style="padding-left: 20px;">
                                    <div class="form-group">
                                    NPWP
                                    </div>
                                </td>
                                <td width="3%">
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="30%">
                                    <div class="form-group">
                                    <input name="npwp" value="<?php echo $row_pegawai['npwp'];?>" class="form-control" autocomplete="off"></input>
                                    </div>
                                </td>
                                <td width="3%"></td>
                                <td>
                                    <div class="form-group">
                                    Masa Kerja Keseluruhan
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td  style="padding-right: 20px;">
                                    <div class="form-group">
                                        <input name="masa_keseluruhan" value="<?php echo $row_pegawai['masa_kerja_keseluruhan'];?>" class="form-control" required="" autocomplete="off"></input>
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

<script type="text/javascript">
  function angka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }
</script>


<script type="text/javascript">
        
    /* Tunjangan */
    //gaji pokok
    var gaji_pokok = document.getElementById('gaji_pokok');
    gaji_pokok.addEventListener('keyup', function(e)
    {
        gaji_pokok.value = formatRupiah(this.value);
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>