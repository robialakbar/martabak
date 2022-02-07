<title><?php echo $row_data['nama'];?> | Detail Detail Pegawai</title>
<?php 
include('config/koneksi.php');
$q = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$_SESSION[username_simpeg]'");
$usr= mysqli_fetch_array($q);

$sql = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE nip='$usr[nip]'");
$row_pegawai = mysqli_fetch_array($sql);
?>

<!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Data Detail 
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Pegawai</li>
              </ol>
            </section>
            <section class="content">
            <br>
            <!-- INI UNTUK ISI -->
      <div class="row">
        <div class="col-lg-12">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs bg-">
              <li><a href="#tab_1-1" data-toggle="tab"><b>Data Pegawai</b></a></li>
              <li><a href="#tab_2-2" data-toggle="tab"><b>Data Istri/Suami</b></a></li>
              <li><a href="#tab_3-2" data-toggle="tab"><b>Data Anak</b></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1-1">
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
                                        <?php if($row_pegawai['tmt_golongan']=="0000-00-00" OR $row_pegawai['tmt_golongan']==""){}else{ echo TanggalIndo($row_pegawai['tmt_golongan']);}?>
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
                                    <?php if($row_pegawai['tgl_lahir']=="0000-00-00" OR $row_pegawai['tgl_lahir']==""){}else{ echo TanggalIndo($row_pegawai['tgl_lahir']); } ?>
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
                                        <?php if($row_pegawai['tmt_capeg']=="0000-00-00" OR $row_pegawai['tmt_capeg']==""){}else{ echo TanggalIndo($row_pegawai['tmt_capeg']); }?>
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
                                     Digaji Menurut ( PP / SK )
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
                                <td>
                                    <div class="form-group">
                                    Alamat
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <?php echo $row_pegawai['alamat'];?>
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





              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                <table width="100%" id="tabel" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="odd bg-gray">
                                        <th width="1%">No</th>
                                        <th><center>Nama Istri / Suami</center></th>
                                        <th><center>Tempat, Tanggal Lahir</center></th>
                                        <th><center>NIP/NIK</center></th>
                                        <th><center>Pekerjaan</center></th>
                                        <th width="10%"><center>Tanggal Nikah</center></th>
                                        <th><center>Istri / Suami ke</center></th>
                                        <th><center>Penghasilan / Bulan</center></th>
                                    </tr>
                                </thead>
                                <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
                                <tbody>
                                <?php
                                    // SET NOMOR URUT DATA
                                    $nomor          =   1;
                                    $data_keluarga       = mysqli_query($koneksi,"SELECT * FROM keluarga WHERE nip='$row_pegawai[nip]'");
                                    while($row_keluarga  = mysqli_fetch_array($data_keluarga)) {
                                ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row_keluarga['nama']; ?></td>
                                        <td><?php echo $row_keluarga['tempat']; ?>, <?php echo TanggalIndo($row_keluarga['tgl_lahir']); ?></td>
                                        <td><?php echo $row_keluarga['nik']; ?></td>
                                        <td><?php echo $row_keluarga['pekerjaan']; ?></td>
                                        <td><?php echo TanggalIndo($row_keluarga['tgl_nikah']); ?></td>
                                        <td align="center"><?php echo $row_keluarga['ke']; ?></td>
                                        <td align="right"><?php echo number_format($row_keluarga['penghasilan']); ?></td>
                                        </tr>
                                        <?php }  ?>
                                </tbody>
              </table>
              </div>



              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3-2">
                <table width="100%" id="tabel2" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="odd bg-gray">
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
                                    
                                    // CEK DATA YANG DITERIMA
                                    $data_anak = mysqli_query($koneksi,"SELECT * FROM anak WHERE nip='$row_pegawai[nip]'");
                                        while($row_anak  = mysqli_fetch_array($data_anak)) {
                                ?>
                                
                                    <tr class="odd gradeX">
                                        <td><?php echo $nomor; ?></td>
                                        <td><?php echo $row_anak['nama']; ?></td>
                                        <td><?php echo $row_anak['tempat']; ?>, <?php echo TanggalIndo($row_anak['tanggal_lahir']); ?></td>
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
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
        </div>
