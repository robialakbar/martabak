<title><?php echo $row_data['nama'];?> | Data Istri/Suami</title>
<?php
    $row_detail  = mysqli_fetch_array($data_detail);
?>

            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Data Detail Pegawai ( Data Istri / Suami )
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Data Pegawai</li>
              </ol>
            </section>
            <section class="content">
             <a href="index.php?controller=pegawai&method=select" class="btn btn-md btn-success" data-toggle="tooltip" data-placement="top" title="Data Pegawai"><i class="fa fa-chevron-left fa-fw"></i>Back</a>

             <a href="index.php?controller=pegawai&method=detail&nip=<?php echo $row_detail['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Data Pegawai"><i class="fa fa-user fa-fw"></i>Data Diri</a>

             <a href="index.php?controller=pegawai&method=keluarga&nip=<?php echo $row_detail['nip'];?>" class="btn btn-md btn-danger" data-toggle="tooltip" data-placement="top" title="Data Istri / Suami"><i class="fa fa-street-view fa-fw"></i>Data Istri / Suami</a>

             <a href="index.php?controller=pegawai&method=anak&nip=<?php echo $row_detail['nip'];?>" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Data Anak"><i class="fa fa-venus-double fa-fw"></i>Data Anak</a>

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
                            <i class="fa fa-street-view fa-fw"></i> Data Istri/Suami
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
                                        <th><center>Nama Istri / Suami</center></th>
                                        <th><center>Tempat, Tanggal Lahir</center></th>
                                        <th><center>NIP/NIK</center></th>
                                        <th><center>Pekerjaan</center></th>
                                        <th width="10%"><center>Tanggal Nikah</center></th>
                                        <th><center>Istri / Suami ke</center></th>
                                        <th><center>Penghasilan / Bulan</center></th>
                                        <th><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
                                <tbody>
                                <?php
                                    // SET NOMOR URUT DATA
                                    $nomor          =   1;
                                    
                                    // CEK DATA YANG DITERIMA
                                    if(isset($data_keluarga)) {
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
                                        <td><center>

                                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#ubah<?php echo $row_keluarga['id']; ?>"> <li class="fa fa-edit"></li> </button>
                                            <!--Modal Untuk Tambah Data -->
<div class="modal modal-success fade" id="ubah<?php echo $row_keluarga['id']; ?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <center><h4 class="modal-title">Ubah Data Istri/Suami</h4></center>
              </div>
              <form role="form" method="POST" name="kategori" action="index.php?controller=pegawai&method=ubah_keluarga" enctype="multipart/form-data" onsubmit="return validasi();">
                  <table width="100%" class="modal-body">
                  <tr>
                  <td>
                    <div class="modal-body">
                      <label>Nama Istri / Suami</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                    <input type="hidden" name="nip" value="<?php echo $row_detail['nip'];?>"></input>
                    <input type="hidden" name="id" value="<?php echo $row_keluarga['id'];?>"></input>
                      <input type="text" name="nama" id="nomor_kas" class="form-control" placeholder="Nama Istri / Suami" value="<?php echo $row_keluarga['nama'];?>" required oninvalid="this.setCustomValidity('Masukan Nama Istri / Suami')" oninput="setCustomValidity('')" autocomplete="off" style="width: 100%">
                    </div>
                  </td>
                  <td></td>
                  <td>
                    <div class="modal-body">
                      <label>Pekerjaan</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <input type="text" name="pekerjaan" value="<?php echo $row_keluarga['pekerjaan'];?>" id="nomor_kas" class="form-control" placeholder="Pekerjaan" required oninvalid="this.setCustomValidity('Masukan Pekerjaan')" oninput="setCustomValidity('')" autocomplete="off" style="width: 100%">
                    </div>
                  </td>
                  </tr>
                  <!-- 2 -->
                  <tr>
                  <td>
                    <div class="modal-body">
                      <label>Tempat Lahir</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <input type="text" name="tempat" value="<?php echo $row_keluarga['tempat'];?>" id="nomor_kas" class="form-control" placeholder="Tempat Lahir" required oninvalid="this.setCustomValidity('Masukan Tempat Lahir')" oninput="setCustomValidity('')" autocomplete="off" style="width: 100%">
                    </div>
                  </td>
                  <td></td>
                  <td>
                    <div class="modal-body">
                      <label>Tanggal Pekawinan</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <div class="form-group input-group date" id="ex2" data-date="" data-date-format="yyyy-mm-dd">
                        <input name="tgl_perkawinan"  class="form-control" placeholder="Masukkan Tanggal" value="<?php echo $row_keluarga['tgl_nikah'];?>" readonly="readonly">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                    </div>
                  </td>
                  </tr>
                  <!--3-->
                  <tr>
                  <td>
                    <div class="modal-body">
                      <label>Tanggal Lahir</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <table width="100%">
                                    <td width="15%">
                                      <select name="hari" style="color: black;" class="form-control select2">
                                        <?php     
                                        $tgl = date('d',strtotime($row_keluarga['tgl_lahir']));
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
                                        $bln = date('m',strtotime($row_keluarga['tgl_lahir']));
                                        $bln2 = date('F',strtotime($row_keluarga['tgl_lahir']));
                                            // MENAMPILKAN OPSI Kategori
                                                echo "<option value='$bln'>$bln2</option>"; 
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
                                        $thn = date('Y',strtotime($row_keluarga['tgl_lahir']));
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
                  <td></td>
                  <td>
                    <div class="modal-body">
                      <label>Istri / Suami Ke</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <input type="text" name="ke" value="<?php echo $row_keluarga['ke'];?>" id="nomor_kas" class="form-control" placeholder="Istri / Suami Ke" required oninvalid="this.setCustomValidity('Masukan Istri / Suami ke')" oninput="setCustomValidity('')" onkeypress="return angka(event);" autocomplete="off" style="width: 100%">
                    </div>
                  </td>
                  </tr>
                  <!-- 4 -->
                  <tr>
                  <td>
                    <div class="modal-body">
                      <label>Nip / Nik</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <input type="text" name="nik" value="<?php echo $row_keluarga['nik'];?>" id="nomor_kas" class="form-control" placeholder="Nip / Nik" onkeypress="return angka(event);" autocomplete="off" style="width: 100%">
                    </div>
                  </td>
                  <td></td>
                  <td>
                    <div class="modal-body">
                      <label>Penghasilan / Bulan</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <input type="text" name="penghasilan" value="<?php echo $row_keluarga['penghasilan'];?>" id="nomor_kas" class="form-control" placeholder="Penghasilan" value="0" min="0" onkeypress="return angka(event);" autocomplete="off" style="width: 100%">
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

                                           
                                            <a href="index.php?controller=pegawai&method=delete_keluarga&id=<?php echo $row_keluarga['id']; ?>&nip=<?php echo $row_detail['nip'];?>" class="btn btn-danger btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Delete" onClick="return confirm('Yakin hapus?')"> <i class="fa fa-trash"></i> </a>
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
                <center><h4 class="modal-title">Tambah Data Istri/Suami</h4></center>
              </div>
              <form role="form" method="POST" name="kategori" action="index.php?controller=pegawai&method=insert_keluarga" enctype="multipart/form-data" onsubmit="return validasi();">
                  <table width="100%" class="modal-body">
                  <tr>
                  <td>
                    <div class="modal-body">
                      <label>Nama Istri / Suami</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                    <input type="hidden" name="nip" value="<?php echo $row_detail['nip'];?>"></input>
                      <input type="text" name="nama" id="nomor_kas" class="form-control" placeholder="Nama Istri / Suami" required oninvalid="this.setCustomValidity('Masukan Nama Istri / Suami')" oninput="setCustomValidity('')" autocomplete="off">
                    </div>
                  </td>
                  <td></td>
                  <td>
                    <div class="modal-body">
                      <label>Pekerjaan</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <input type="text" name="pekerjaan" id="nomor_kas" class="form-control" placeholder="Pekerjaan" required oninvalid="this.setCustomValidity('Masukan Pekerjaan')" oninput="setCustomValidity('')" autocomplete="off">
                    </div>
                  </td>
                  </tr>
                  <!-- 2 -->
                  <tr>
                  <td>
                    <div class="modal-body">
                      <label>Tempat Lahir</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <input type="text" name="tempat" id="nomor_kas" class="form-control" placeholder="Tempat Lahir" required oninvalid="this.setCustomValidity('Masukan Tempat Lahir')" oninput="setCustomValidity('')" autocomplete="off">
                    </div>
                  </td>
                  <td></td>
                  <td>
                    <div class="modal-body">
                      <label>Tanggal Pekawinan</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <div class="form-group input-group date" id="ex2" data-date="" data-date-format="yyyy-mm-dd">
                        <input name="tgl_perkawinan"  class="form-control" placeholder="Masukkan Tanggal" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                    </div>
                  </td>
                  </tr>
                  <!--3-->
                  <tr>
                  <td>
                    <div class="modal-body">
                      <label>Tanggal Lahir</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <table width="100%">
                                    <td width="15%">
                                      <select name="hari" style="color: black;" class="form-control select2">
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
                  <td></td>
                  <td>
                    <div class="modal-body">
                      <label>Istri / Suami Ke</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <input type="text" name="ke" id="nomor_kas" class="form-control" placeholder="Istri / Suami Ke" required oninvalid="this.setCustomValidity('Masukan Istri / Suami ke')" oninput="setCustomValidity('')" onkeypress="return angka(event);" autocomplete="off">
                    </div>
                  </td>
                  </tr>
                  <!-- 4 -->
                  <tr>
                  <td>
                    <div class="modal-body">
                      <label>Nip / Nik</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <input type="text" name="nik" id="nomor_kas" class="form-control" placeholder="Nip / Nik" onkeypress="return angka(event);" autocomplete="off">
                    </div>
                  </td>
                  <td></td>
                  <td>
                    <div class="modal-body">
                      <label>Penghasilan / Bulan</label>
                    </div>
                  </td>
                  <td>
                      <div class="modal-body">
                      :
                    </div>
                  </td>
                  <td>
                    <div class="modal-body">
                      <input type="text" name="penghasilan" id="nomor_kas" class="form-control" placeholder="Penghasilan" value="0" min="0" onkeypress="return angka(event);" autocomplete="off">
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

<script language='javascript'>
  function validasi()
  {
    if (document.kategori.hari.selectedIndex==0)
    {
      alert("Pilih Tanggal Lahir");
      document.kategori.hari.focus();
      return false;
    }
    if (document.kategori.bulan.selectedIndex==0)
    {
      alert("Pilih Bulan Kelahiran");
      document.kategori.bulan.focus();
      return false;
    }
    if (document.kategori.tahun.selectedIndex==0)
    {
      alert("Pilih Tahun Kelahiran");
      document.kategori.tahun.focus();
      return false;
    }
    return true
  }
</script>
