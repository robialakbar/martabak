<title><?php echo $row_data['nama'];?> | Data Pengguna</title>
<?php
if ($_SESSION['level_simpeg']=="admin") {
?>
            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Pengguna
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Pengguna</li>
              </ol>
            </section>
            <section class="content">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-danger"><li class="fa fa-plus"></li> Tambah Data </button>
             <br><br>

            
            <!-- INI UNTUK ISI -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-tasks fa-fw"></i> Data Pengguna
                        </div>

            <!--bagian tabel -->
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="tabel" width="100%" class="table table-bordered table-striped">
                <thead>
                <tr class="odd bg-gray">
                  <th width="1">No</th>
                  <th hidden=""></th>
                  <th> Foto</th>
                  <th><center>NIP</center></th>
                  <th width="20%">Nama Pegawai</th>
                  <th width="12%">Username</th>
                  <th width="15%">level</th>
                  <th>Status</th>
                  <th width="12%"><center>Aksi</center></th>
                </tr>
                </thead>
                <tbody>

                <?php
                  // SET NOMOR URUT DATA
                  $nomor          =   1;
                                    
                  // CEK DATA YANG DITERIMA
                  if(isset($data_pengguna)) {
                  while($row_pengguna  = mysqli_fetch_array($data_pengguna)) {
                
                ?>

                <tr class="odd dradeX">
                  <td> <?php echo $nomor; ?></td>
                  <td hidden=""><?php echo $row_pengguna['username']; ?></td>
                  <td align="center"> 
                  <?php
                  if ($row_pengguna['foto']=="")
                    {
                      if($row_pengguna['gender']=="l")
                      {
                    ?>
                    <img style="object-fit: contain;height: 50px;" class="img-circle" src="logo/pria.png">
                    <?php
                      }
                      else
                      {
                      ?>
                      <img style="object-fit: contain;height: 50px;" class="img-circle" src="logo/wanita.png">
                    <?php
                      }
                    }
                  else
                  {
                    ?>
                  <img style="height: 50px;width: 50px" class="img-circle" src="logo/<?php echo $row_pengguna['foto']; ?>">
                  <?php
                  }
                  ?>
                  </td>
                  <td><?php echo $row_pengguna['nip']; ?></td>
                  <td><?php echo $row_pengguna['nama']; ?></td>
                  <td><?php echo $row_pengguna['username']; ?></td>
                  <td><?php
                // CEK PILIHAN SEBELUMNYA
                  
                  if($row_pengguna['level'] == "user") 
                  {
                    echo '<b style="color: green;">User</b>';
                  } else
                  {
                    echo '<b style="color: red;">Admin</b>';
                  }
                  ?></td>
                <td>
                <?php
                // CEK PILIHAN SEBELUMNYA
                  if($row_pengguna['status'] == "Tidak Aktif") 
                  {
                    ?>
                    <span class="label label-warning">Tidak Aktif</span> 

                    <a href="index.php?controller=user&method=on&username=<?php echo $row_pengguna['username']; ?>" class="btn btn-primary btn-xs pull-right" role="button" data-toggle="tooltip" data-placement="top" title="On"> <i class="fa fa-refresh" onClick="return confirm('Ingin Menganktifkan Data?')"></i> </a>
                  <?php
                  } else
                  {
                   ?>
                   <span class="label label-success">Aktif</span>
                   <a href="index.php?controller=user&method=off&username=<?php echo $row_pengguna['username']; ?>" class="btn btn-primary btn-xs pull-right" role="button" data-toggle="tooltip" data-placement="top" title="Off"> <i class="fa fa-refresh" onClick="return confirm('Yakin ingin Meng Offkan Data?')"></i> </a>
                   <?php
                  }
                  ?> 

                  </td>
                  <td><center>

                  <a href="#" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#MyModa<?php echo $row_pengguna['username']; ?>" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit fa-fw"></i></a>


                   <a href="index.php?controller=user&method=delete&username=<?php echo $row_pengguna['username']; ?>" class="btn btn-danger btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="Delete" onClick="return confirm('Yakin hapus?')"> <i class="fa fa-trash fa-fw"></i> </a>
                   
                   <!--Modal Untuk Edit Data -->
                  <div class="modal modal-success fade" id="MyModa<?php echo $row_pengguna['username']; ?>">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title">Edit Data Pengguna</h4>
                                </div>
                                <form role="form" method="POST" action="index.php?controller=user&method=update_pengguna" enctype="multipart/form-data">
                                    <table width="100%" class="modal-body">
                                    <tr>
                                    <td>
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label>Username</label>
                                      </div>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="modal-body">
                                        <input type="text" name="username" id="nomor_kas" value="<?php echo $row_pengguna['username']; ?>" class="form-control" placeholder="Masukan Username"readonly>
                                    </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label>NIP</label>
                                      </div>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="modal-body">
                                        <input type="text" name="nip" id="nomor_kas" value="<?php echo $row_pengguna['nip']; ?>" class="form-control" placeholder="Masukan NIP">
                                    </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    <div class="modal-body">
                                      <label>Nama Lengkap</label>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="modal-body">
                                        <input name="nama" id="no_telepon" value="<?php echo $row_pengguna['nama']; ?>" class="form-control" placeholder="Masukkan Nama Lengkap" required oninvalid="this.setCustomValidity('Masukan Nama Lengkap')" oninput="setCustomValidity('')">
                                    </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    <div class="modal-body">
                                      <label>Jenis Kelamin</label>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="modal-body">
                                       <?php 
                                    // CEK PILIHAN SEBELUMNYA
                                    if($row_pengguna['gender'] == "l") {
                                      $L    = "checked";
                                      $P    = "";
                                    }
                                      else {
                                      $L    = "";
                                      $P    = "checked";
                                    }
                                    ?>
                                      <div class="radio">
                                        <label>
                                          <input name="gender" type="radio" id="optionsRadios1" value="l" <?php echo $L; ?> required>Laki - Laki
                                        </label>
                                      </div>
                                      <i class="fa fa-fw"></i>
                                      <div class="radio">
                                        <label>
                                          <input name="gender" type="radio" id="optionsRadios2" value="p" <?php echo $P; ?> required>Perempuan
                                        </label>
                                      </div>
                                    </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    <div class="modal-body">
                                      <label>Bagian</label>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="modal-body">
                                        <select name="level" class="form-control"style="width: 40%">
                                        <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
                                        <option value='user' selected >--Pilih Bagian--</option>
                                        <?php 
                                        if($row_pengguna['level']=="admin")
                                        {
                                          echo "<option value='admin' selected >Admin</option>";
                                        }
                                        else 
                                        {
                                          echo "<option value='admin'>Admin</option>";
                                        }

                                        if($row_pengguna['level']=="user")
                                        {
                                          echo "<option value='user' selected >User</option>";
                                        }
                                        else 
                                        {
                                          echo "<option value='user'>User</option>";
                                        }
                                        ?>
                                          </select>
                                    </div>
                                    </td>
                                    </tr>
                                    <tr hidden="">
                                    <td>
                                    <div class="modal-body">
                                      <label>Foto</label>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="modal-body">
                                    <?php
                                    if($row_pengguna['foto']=="")
                                    {
                                       if($row_pengguna['gender']=="l")
                                        {
                                      ?>
                                      <img style="object-fit: contain;height: 80px;" src="logo/pria.png">
                                      <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <img style="object-fit: contain;height: 80px;" src="logo/wanita.png">
                                      <?php
                                        }
                                    }
                                    else
                                    {
                                      ?>
                                      <img src="logo/<?php echo $row_pengguna['foto'];?>" style="object-fit: contain;height: 80px;width: 80px;">
                                    <?php
                                    }
                                    ?>
                                    <br>
                                    <br>
                                         <input type="file" name="gambar">
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
      </section>

<!--Modal Untuk Tambah Data -->
<div class="modal modal-primary fade" id="modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Pengguna</h4>
              </div>
              <form role="form" method="POST" action="index.php?controller=user&method=insert_data" enctype="multipart/form-data" onsubmit="return validasi_input(this)">
                  <table width="100%" class="modal-body">
                  <tr>
                  <td>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Username</label>
                    </div>
                  </div>
                  </td>
                  <td>
                  <div class="modal-body">
                      <input type="text" name="username" id="nomor_kas" class="form-control" placeholder="Masukan Username" required oninvalid="this.setCustomValidity('Masukan Username')" oninput="setCustomValidity('')">
                  </div>
                  </td>
                  </tr>
                  <tr>
                                    <td>
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label>NIP</label>
                                      </div>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="modal-body">
                                        <input type="text" name="nip" id="nomor_kas" class="form-control" placeholder="Masukan NIP">
                                    </div>
                                    </td>
                                    </tr>
                  <tr>
                  <td>
                  <div class="modal-body">
                    <label>Password</label>
                  </div>
                  </td>
                  <td>
                  <div class="modal-body">
                      <input name="password" type="password" id="no_telepon" class="form-control" placeholder="Masukkan Password" required oninvalid="this.setCustomValidity('Masukan Password')" oninput="setCustomValidity('')">
                  </div>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <div class="modal-body">
                    <label>Nama Lengkap</label>
                  </div>
                  </td>
                  <td>
                  <div class="modal-body">
                      <input name="nama" id="no_telepon" class="form-control" placeholder="Masukkan Nama Lengkap" required oninvalid="this.setCustomValidity('Masukan Nama Lengkap')" oninput="setCustomValidity('')">
                  </div>
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <div class="modal-body">
                    <label>Jenis Kelamin</label>
                  </div>
                  </td>
                  <td>
                  <div class="modal-body">
                    <div class="radio">
                        <label>
                            <input name="gender" type="radio" id="optionsRadios1" value="l" required>Laki - Laki
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input name="gender" type="radio" id="optionsRadios2" value="w" required>Perempuan
                        </label>
                    </div>
                  </div>
                  </td>
                  </tr>
                  <tr>
                                    <td>
                                    <div class="modal-body">
                                      <label>Bagian</label>
                                    </div>
                                    </td>
                                    <td>
                                    <div class="modal-body">
                                        <select name="level" class="form-control"style="width: 40%">
                                        <!-- INI UNTUK MENERIMA DATA DARI CONTROLLER -->
                                        <option value='user' selected >--Pilih Bagian--</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                          </select>
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
<script>
function angka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }
</script>


<script type="text/javascript">
function validasi_input(form){
   pola_username=/^[a-zA-Z0-9\_\-]{6,100}$/;
   if (!pola_username.test(form.username.value)){
      alert ('Username minimal 6 karakter dan hanya boleh Huruf atau Angka!');
      form.username.focus();
      return false;
   }
   var mincar = 6;
  if (form.password.value.length < mincar){
    alert("Password Minimal 6 Karater!");
    form.password.focus();
    return (false);
}
    if (form.re_password.value.length < mincar){
    alert("Password Minimal 6 Karater!");
    form.re_password.focus();
    return (false);
}
return (true);
}
</script>

<?php 
}
else
{
    echo "<script>window.history.back(); </script>";
}
?>