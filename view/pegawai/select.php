<title><?php echo $row_data['nama'];?> | Pegawai</title>


            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Data Pegawai
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Data Pegawai</li>
              </ol>
            </section>
            <section class="content">
            <?php 
            if($_SESSION['level_simpeg']=="admin"){?>
             <a href="index.php?controller=pegawai&method=insert" class="btn btn-md btn-info" data-toggle="tooltip" data-placement="top" title="Tambah Data"><i class="fa fa-plus fa-fw"></i>Tambah Data</a>
             <a href="laporan/cetak_pegawai.php" target="_blank" class="btn btn-md btn-primary pull-right" data-toggle="tooltip" data-placement="top" title="Cetak"><i class="fa fa-print"></i></a>
             <br>
             <br>
             <?php } ?>
            <!-- INI UNTUK ISI -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-users fa-fw"></i> Data Pegawai
                        </div>

                        <!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body table-responsive">
                            <!-- INI BAGIAN TABEL -->
                             <table width="100%" id="tabel" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="odd bg-gray">
                                        <th width="5%">No</th>
                                        <th><center>Nip</center></th>
                                        <th><center>Nama Pegawai</center></th>
                                        <th><center>Jabatan</center></th>
                                        <?php 
                                        if($_SESSION['level_simpeg']=="user"){?>
                                        <th><center>Pangkat / Golongan</center></th>
                                        <th><center>TMT Pangkat / Golongan</center></th>
                                        <?php } ?>
                                        <th><center>Gender</center></th>
                                        <?php 
                                        if($_SESSION['level_simpeg']=="admin"){?>
                                        <th><center>Agama</center></th>
                                        <?php } ?>
                                        <?php 
                                        if($_SESSION['level_simpeg']=="admin"){?>
                                        <th><center>Aksi</center></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
                                <tbody>
                                <?php
                                    // SET NOMOR URUT DATA
                                    $nomor          =   1;
                                    
                                    // CEK DATA YANG DITERIMA
                                    if(isset($data_pegawai)) {
                                        while($row_pegawai  = mysqli_fetch_array($data_pegawai)) {
                                ?>
                                
                                    <tr class="odd gradeX">
                                        <td align="center"><?php echo $nomor; ?></td>
                                        <td><?php echo $row_pegawai['nip']; ?></td>
                                        <td><?php echo $row_pegawai['nama']; ?></td>
                                        <td><?php echo $row_pegawai['jabatan']; ?></td>
                                        
                                         <?php 
                                        if($_SESSION['level_simpeg']=="user"){?>
                                        <td><?php echo $row_pegawai['pangkat']; ?></td>
                                        <td align="center"><?php echo TanggalIndo($row_pegawai['tmt_golongan']); ?></td>
                                        <?php } ?>
                                        
                                        <td>
                                        <?php 
                                        if($row_pegawai['gender']=="l")
                                            {
                                                echo "Laki - Laki";
                                            }else {
                                                echo "Perempuan";
                                                } ?>
                                        </td>
                                        
                                        <?php 
                                        if($_SESSION['level_simpeg']=="admin"){?>
                                        <td><?php echo $row_pegawai['agama']; ?></td>
                                        <?php } ?>
                                        
                                        <?php 
                                        if($_SESSION['level_simpeg']=="admin"){?>
                                        <td><center>
                                            <a href="index.php?controller=pegawai&method=detail&nip=<?php echo $row_pegawai['nip']; ?>" class="btn btn-primary btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Detail" > <i class="fa fa-info fa-fw"></i> </a>

                                            <a href="index.php?controller=pegawai&method=delete&nip=<?php echo $row_pegawai['nip']; ?>" class="btn btn-danger btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Delete" onClick="return confirm('Yakin ingin menghapus data NIP : <?php echo $row_pegawai['nip']; ?> ?')"> <i class="fa fa-trash fa-fw"></i> </a>
                                            </center>
                                        </td>
                                        <?php } ?>
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
