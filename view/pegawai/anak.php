<title><?php echo $row_data['nama'];?> | Data Anak</title>
<?php
    $row_detail  = mysqli_fetch_array($data_detail);
?>

            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Data Detail Pegawai ( Data Anak )
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Data Pegawai</li>
              </ol>
            </section>
            <section class="content">
             <a href="index.php?controller=pegawai&method=select" class="btn btn-md btn-success" data-toggle="tooltip" data-placement="top" title="Data Pegawai"><i class="fa fa-chevron-left fa-fw"></i>Back</a>

             <a href="index.php?controller=pegawai&method=detail&nip=<?php echo $row_detail['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Data Pegawai"><i class="fa fa-user fa-fw"></i>Data Diri</a>

             <a href="index.php?controller=pegawai&method=keluarga&nip=<?php echo $row_detail['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Data Istri / Suami"><i class="fa fa-street-view fa-fw"></i>Data Istri / Suami</a>

             <a href="index.php?controller=pegawai&method=anak&nip=<?php echo $row_detail['nip'];?>" class="btn btn-md btn-danger" data-toggle="tooltip" data-placement="top" title="Data Anak"><i class="fa fa-venus-double fa-fw"></i>Data Anak</a>

             <a href="index.php?controller=pegawai&method=gaji&nip=<?php echo $row_detail['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Penghasilan"><i class="fa fa-money fa-fw"></i>Penghasilan</a>

             <a href="index.php?controller=pegawai&method=berkas&nip=<?php echo $row_detail['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Lampiran"><i class="fa fa-file-archive-o fa-fw"></i>Lampiran</a>

             <div class="pull-right">
             <form method="post" action="laporan/surat_keterangan.php" target="_blank">
               <input name="pencetak" type="hidden" value="<?php echo $_SESSION['nama_simpeg'];?>"></input>
               <input name="nip_cetak" type="hidden" value="<?php echo $row_data2['nip'];?>"></input>
               <input name="nip" type="hidden" value="<?php echo $row_detail['nip'];?>"></input>
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
                            <i class="fa fa-venus-double fa-fw"></i> Data Anak
                            <div class="pull-right">
                                <label class="label" style="font-size: 15px;"> Pegawai : <?php echo $row_detail['nama'];?>
                                </label>
                            </div>
                        </div>

                        <!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body table-responsive">
                        <button type="button" class="btn btn-warning btn-xs pull-right" data-toggle="modal" data-target="#modal-danger"><li class="fa fa-plus"></li> Add</button>
                             <br>
                             <br>
                            <!-- INI BAGIAN TABEL -->
                             <table width="100%" id="tabel" class="table table-striped table-bordered table-hover">
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
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
                                <tbody>
                                <?php
                                    // SET NOMOR URUT DATA
                                    $nomor          =   1;
                                    
                                    // CEK DATA YANG DITERIMA
                                    if(isset($data_anak)) {
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
                                        <td><center>

                                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ubah<?php echo $row_anak['id']; ?>"> <li class="fa fa-edit"></li> </button>
                                            <!--Modal Untuk Tambah Data -->
<div class="modal modal-success fade" id="ubah<?php echo $row_anak['id']; ?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Ubah Data Anak</h4></center>
              </div>
              <form role="form" method="POST" name="kategori" action="index.php?controller=pegawai&method=ubah_anak" enctype="multipart/form-data" onsubmit="return validasi();">
            <table width="100%" class="modal-body">
            <div class="modal-body"></div>
            <tr>
                <td style="padding-left: 20px;">
                   <div class="form-group">
                        <label>Nama Anak</label>
                        <input type="hidden" name="nip" value="<?php echo $row_detail['nip'];?>"></input>
                        <input type="hidden" name="id" value="<?php echo $row_anak['id'];?>"></input>
                        <input type="text" style="width: 100%" value="<?php echo $row_anak['nama'];?>" name="nama" id="nama_anak" class="form-control" required="" autocomplete="off" />
                        <span id="error_nama_anak" class="text-danger"></span>
                    </div> 
                </td>
                <td width="3%"></td>
                <td style="padding-right: 20px;">
                   <div class="form-group">
                        <label>Dari Istri / Suami ke</label>
                        <input  name="ke" value="<?php echo $row_anak['ke'];?>" style="width: 100%" min="1" id="anak_dari" class="form-control" onkeypress="return angka(event);" autocomplete="off" />
                        <span id="error_anak_dari" class="text-danger"></span>
                    </div> 
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                   <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat" value="<?php echo $row_anak['tempat'];?>" style="width: 100%" id="tempat_lahir_anak" class="form-control" required="" autocomplete="off" />
                        <span id="error_tempat_lahir_anak" class="text-danger"></span>
                    </div> 
                </td>
                <td width="3%"></td>
                <td style="padding-right: 20px;">
                   <div class="form-group">
                        <label>Sudah / Belum Kawin</label>
                        <select name="kawin" id="kawin" class="form-control select2" style="width: 100%">
                            <?php     
                                // MENAMPILKAN OPSI Kategori
                                 echo "<option value='$row_anak[kawin]'>$row_anak[kawin]</option>"; 
                            ?>
                            <option value="Sudah">Sudah</option>
                            <option value="Belum">Belum</option>
                        </select>
                        <span id="error_kawin" class="text-danger"></span>
                    </div> 
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                   <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <table width="100%">
                                    <td width="20%">
                                      <select name="tgl" id="tgl_anak" style="color: black;width: 100%" class="form-control select2">
                                      <span id="error_tgl_anak" class="text-danger"></span>
                                      <?php     
                                        $tgl = date('d',strtotime($row_anak['tanggal_lahir']));
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
                                      <select name="bulan" id="bulan_anak" style="color: black;width: 100%" class="form-control select2">
                                      <span id="error_bulan_anak" class="text-danger"></span>
                                        <?php     
                                        $bln = date('F',strtotime($row_anak['tanggal_lahir']));
                                        $bln1 = date('m',strtotime($row_anak['tanggal_lahir']));
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
                                      <select name="tahun" id="tahun_anak" style="color: black;width: 100%" class="form-control select2">
                                      <span id="error_tahun_anak" class="text-danger"></span>
                                        <?php     
                                        $thn = date('Y',strtotime($row_anak['tanggal_lahir']));
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
                <td style="padding-right: 20px;">
                   <div class="form-group">
                        <label>Dapat Tunjangan / Tidak</label>
                        <select name="tunjangan" id="tunjangan_anak" style="width: 100%" class="form-control select2">
                            <?php     
                                // MENAMPILKAN OPSI Kategori
                                echo "<option value='$row_anak[tunjangan]'>$row_anak[tunjangan]</option>"; 
                            ?>
                            <option value="Dapat">Dapat</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                        <span id="error_tunjangan_anak" class="text-danger"></span>
                    </div> 
                </td>
            </tr>
            <tr>
                <td width="50%"  style="padding-left: 20px;">
                   <div class="form-group">
                        <label>Status Anak</label>
                        <select name="status" id="status_anak" class="form-control select2" style="width: 100%">
                            <?php     
                                // MENAMPILKAN OPSI Kategori
                                echo "<option value='$row_anak[status]'>$row_anak[status]</option>"; 
                            ?>
                            <option value="AK">Anak Kandung (AK)</option>
                            <option value="AT">Anak Tiri (AT)</option>
                            <option value="AA">Anak Angkat (AA)</option>
                        </select>
                        <span id="error_status_anak" class="text-danger"></span>
                    </div> 
                </td>
                <td width="3%"></td>
                <td width="48%" style="padding-right: 20px;">
                   <div class="form-group">
                        <label>Bekerja</label>
                        <select name="bekerja" id="bekerja" class="form-control select2" style="width: 100%">
                            <?php
                                // MENAMPILKAN OPSI Kategori
                                echo "<option value='$row_anak[bekerja]'>$row_anak[bekerja]</option>"; 
                            ?>
                            <option value="Bekerja">Bekerja</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                        <span id="error_bekerja" class="text-danger"></span>
                    </div> 
                </td>
            </tr>
            <tr>
                <td width="50%" style="padding-left: 20px;">
                   <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="gender" id="gender_anak" style="width: 100%" class="form-control select2">
                        <?php  
                            // MENAMPILKAN OPSI Kategori
                            echo "<option value='$row_anak[gender]'>$row_anak[gender]</option>"; 
                        ?>
                            <option value="Laki - Laki">Laki - laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div> 
                </td>
                <td width="3%"></td>
                <td width="48%" style="padding-right: 20px;">
                   <div class="form-group">
                        <label>Masih / Tidak Sekolah / Kuliah</label>
                        <select name="sekolah" id="sekolah" style="width: 100%" class="form-control select2">
                            <?php     
                                // MENAMPILKAN OPSI Kategori
                                echo "<option value='$row_anak[sekolah]'>$row_anak[sekolah]</option>"; 
                            ?>
                            <option value="Masih">Masih</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Kuliah">Kuliah</option>
                        </select>
                        <span id="error_sekolah" class="text-danger"></span>
                    </div> 
                </td>
            </tr>
            <tr>
                <td width="50%" style="padding-left: 20px;">
                </td>
                <td width="3%"></td>
                <td width="48%" style="padding-right: 20px;">
                   <div class="form-group">
                        <label>Putusan Pengadilan ( Khusus AA )</label>
                        <input type="text" value="<?php echo $row_anak['putusan'];?>" name="putusan" style="width: 100%" id="putusan" class="form-control"/>
                        <span id="error_putusan" class="text-danger"></span>
                    </div> 
                </td>
            </tr>
        </table>
            <div class="modal-body"></div>
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

                                           
                                            <a href="index.php?controller=pegawai&method=delete_anak&id=<?php echo $row_anak['id']; ?>&nip=<?php echo $row_detail['nip'];?>" class="btn btn-danger btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Delete" onClick="return confirm('Yakin hapus data anak <?php echo $row_anak['nama'];?> ?')"> <i class="fa fa-trash"></i> </a>
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
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Tambah Data Anak</h4></center>
              </div>
        <form role="form" method="POST" name="kategori" action="index.php?controller=pegawai&method=insert_anak" enctype="multipart/form-data" onsubmit="return validasi();">
        <br>
        <table width="100%">
            <tr>
                <td style="padding-left: 20px;">
                   <div class="form-group">
                        <label>Nama Anak</label>
                        <input type="hidden" name="nip" value="<?php echo $row_detail['nip'];?>"></input>
                        <input type="text" name="nama" id="nama_anak" autocomplete="off" class="form-control" required="" />
                        <span id="error_nama_anak" class="text-danger"></span>
                    </div> 
                </td>
                <td width="3%"></td>
                <td style="padding-right: 20px;">
                   <div class="form-group">
                        <label>Dari Istri / Suami ke</label>
                        <input  name="ke"  style="width: 60px;" min="1" id="anak_dari" class="form-control" onkeypress="return angka(event);" autocomplete="off" />
                        <span id="error_anak_dari" class="text-danger"></span>
                    </div> 
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                   <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat" id="tempat_lahir_anak" autocomplete="off" class="form-control" required="" />
                        <span id="error_tempat_lahir_anak" class="text-danger"></span>
                    </div> 
                </td>
                <td width="3%"></td>
                <td style="padding-right: 20px;">
                   <div class="form-group">
                        <label>Sudah / Belum Kawin</label>
                        <select name="kawin" id="kawin" class="form-control select2" style="width: 100%">
                            <option value="">--Pilih--</option>
                            <option value="Sudah">Sudah</option>
                            <option value="Belum">Belum</option>
                        </select>
                        <span id="error_kawin" class="text-danger"></span>
                    </div> 
                </td>
            </tr>
            <tr>
                <td style="padding-left: 20px;">
                   <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <table width="100%">
                                    <td width="20%">
                                      <select name="tgl" id="tgl_anak" style="color: black;width: 100%" class="form-control select2">
                                      <span id="error_tgl_anak" class="text-danger"></span>
                                      
                                        <?php for($hari=1;$hari<=31;$hari++)
                                          {
                                        ?> <option value="<?php echo $hari;?>"><?php echo $hari;?></option>
                                        <?php
                                        }?>
                                      </select>
                                    </td>
                                    <td width="20%" style="padding-left: 5px;">
                                      <select name="bulan" id="bulan_anak" style="color: black;width: 100%" class="form-control select2">
                                      <span id="error_bulan_anak" class="text-danger"></span>
                                        
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
                                      <select name="tahun" id="tahun_anak" style="color: black;width: 100%" class="form-control select2">
                                      <span id="error_tahun_anak" class="text-danger"></span>
                                        
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
                <td style="padding-right: 20px;">
                   <div class="form-group">
                        <label>Dapat Tunjangan / Tidak</label>
                        <select name="tunjangan" id="tunjangan_anak" style="width: 100%" class="form-control select2">
                            <option value="">--Pilih--</option>
                            <option value="Dapat">Dapat</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                        <span id="error_tunjangan_anak" class="text-danger"></span>
                    </div> 
                </td>
            </tr>
            <tr>
                <td width="50%"  style="padding-left: 20px;">
                   <div class="form-group">
                        <label>Status Anak</label>
                        <select name="status" id="status_anak" class="form-control select2" style="width: 100%">
                            <option value="">--Pilih--</option>
                            <option value="AK">Anak Kandung (AK)</option>
                            <option value="AT">Anak Tiri (AT)</option>
                            <option value="AA">Anak Angkat (AA)</option>
                        </select>
                        <span id="error_status_anak" class="text-danger"></span>
                    </div> 
                </td>
                <td width="3%"></td>
                <td width="48%" style="padding-right: 20px;">
                   <div class="form-group">
                        <label>Bekerja</label>
                        <select name="bekerja" id="bekerja" class="form-control select2" style="width: 100%">
                            <option value="">--Pilih--</option>
                            <option value="Bekerja">Bekerja</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                        <span id="error_bekerja" class="text-danger"></span>
                    </div> 
                </td>
            </tr>
            <tr>
                <td width="50%" style="padding-left: 20px;">
                   <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="gender" id="gender_anak" style="width: 100%" class="form-control select2">
                            <option value="L">Laki - laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div> 
                </td>
                <td width="3%"></td>
                <td width="48%" style="padding-right: 20px;">
                   <div class="form-group">
                        <label>Masih / Tidak Sekolah / Kuliah</label>
                        <select name="sekolah" id="sekolah" style="width: 100%" class="form-control select2">
                            <option value="">--Pilih--</option>
                            <option value="Masih">Masih Sekolah</option>
                            <option value="Tidak">Tidak Sekolah</option>
                            <option value="Kuliah">Kuliah</option>
                        </select>
                        <span id="error_sekolah" class="text-danger"></span>
                    </div> 
                </td>
            </tr>
            <tr>
                <td width="50%" style="padding-left: 20px;">
                </td>
                <td width="3%"></td>
                <td width="48%" style="padding-right: 20px;">
                   <div class="form-group">
                        <label>Putusan Pengadilan ( Khusus AA )</label>
                        <input type="text" name="putusan" id="putusan" class="form-control"/>
                        <span id="error_putusan" class="text-danger"></span>
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
