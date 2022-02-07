<title><?php echo $row_data['nama'];?> | Update Akun</title>
            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Akun
              </h1>
              <ol class="breadcrumb">
                <li><a><i class="fa fa-edit"></i> Data Akun</a></li>
                <li class="active">akun</li>
              </ol>
            </section>
            <section class="content">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-tasks fa-fw"></i> Akun
                        </div>

                        <!-- INI BAGIAN ISI UTAMA -->
                      <div class="panel-body bg-gray">
              <form role="form" method="POST" action="index.php?controller=user&method=update_data" enctype="multipart/form-data">

              <!-- INI BAGIAN TABEL -->
              <table width="100%">
              <?php
                // SET NOMOR URUT DATA
                // CEK DATA YANG DITERIMA
                $dt = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$_SESSION[username_simpeg]'");
                $row_user  = mysqli_fetch_array($dt);
              ?>
              <tr>
                <td align="center" class="bg-gray" style="background: linear-gradient(to right,#70CEFA, #48D1CC);border-radius: 5px;">
                <br>
                <div class="form-group">
                  <?php
                  if ($row_user['foto']=="")
                    {
                      if($row_user['gender']=="l")
                      {
                    ?>
                    <img style="object-fit: contain;height: 200px;" class="img-circle" src="logo/pria.png">
                    <?php
                      }
                      else
                      {
                      ?>
                      <img style="object-fit: contain;height: 200px;" class="img-circle" src="logo/wanita.png">
                    <?php
                      }
                    }
                  else
                  {
                    ?>
                  <img style="height: 200px;width: 200px;" class="img-circle" src="logo/<?php echo $row_user['foto']; ?>">
                  <?php
                  }
                  ?>
                  <br>
                  <br>
                    <input type="file" name="gambar">
                    <p style="font-size: 10px;">* ukuran foto tidak boleh melebihi 1000kb / 1mb</p>
                </div>
                </td>
              </tr>
              </table>
              <br>
              <br>
              <table width="100%">
                <tr>
                  <td width="20%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Username</b>
                  </div>
                  </td>
                  <td width="2%">
                  <div class="form-group">:
                  </div>
                  </td>
                  <td width="20%">
                  <div class="form-group">
                  <input class="form-control" name="username" value="<?php echo $row_user['username'];?>" readonly></input>
                    </div>
                  </td>
                  <td width="10%"></td>
                </tr>
                <tr>
                  <td width="20%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Nama Lengkap</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="20%">
                  <div class="form-group">
                  <?php if ($_SESSION['level_simpeg']=="admin")
                  {
                    $x =$row_user['nama'];
                  }
                    else{

                    $sql = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE nip='$row_user[nip]'");
                    $row_pegawai = mysqli_fetch_array($sql);

                    $x= $row_pegawai['nama']; 
                    }
                  ?>
                   <input class="form-control" name="nama" value="<?php echo $x;?>">
                    </div>
                  </td>
                  <td width="10%"></td>
                </tr>
                <tr>
                  <td width="20%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Jenis Kelamin</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="20%">
                  <div class="form-group">
                   <?php 
                    // CEK PILIHAN SEBELUMNYA
                    if($row_user['gender'] == "l") {
                      $L    = "checked";
                      $P    = "";
                    }
                      else {
                      $L    = "";
                      $P    = "checked";
                    }
                    ?><table width="100%">
                    <td>
                      <div class="radio">
                        <label>
                          <input name="gender" type="radio" id="optionsRadios1" value="l" <?php echo $L; ?> required>Laki - Laki
                        </label>
                      </div>
                      </td>
                      <td>
                      <div class="radio">
                        <label>
                          <input name="gender" type="radio" id="optionsRadios2" value="w" <?php echo $P; ?> required>Perempuan
                        </label>
                      </div>
                      </td>
                      </table>
                  </td>
                  <td width="10%"></td>
                </tr>
                <tr>
                  <td width="20%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Masukan Password</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="20%">
                  <div class="form-group">
                   <input type="password" class="form-control" name="password" placeholder="Masukan Password" required oninvalid="this.setCustomValidity('Masukan Password')" oninput="setCustomValidity('')">
                    </div>
                  </td>
                  <td width="15%"></td>
                </tr>
              </table>
              <br>
              <br>
              <div align="center">

              <a href="index.php?controller=user&method=select" class="btn btn-warning btn-md" role="button" data-toggle="tooltip" data-placement="top" title="Batal" > <i class="fa fa-close"></i> Batal </a>


               <button name="submit" class="btn btn-md btn-success" data-placement="top" title="Edit" > <i class="fa fa-check"></i> Simpan </button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</section>