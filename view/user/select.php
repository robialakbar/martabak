<title><?php echo $row_data['nama'];?> | Akun</title>
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
                            <form role="form" method="POST" action="bm?controller=user&method=select">

							<!-- INI BAGIAN TABEL -->
              <table width="100%">
              <?php
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
                    <img style="object-fit: contain;height: 200px;width: 200px" class="img-circle" src="logo/pria.png">
                    <?php
                      }
                      else
                      {
                      ?>
                      <img style="object-fit: contain;height: 200px;width: 200px" class="img-circle" src="logo/wanita.png">
                    <?php
                      }
                    }
                  else
                  {
                    ?>
                  <img style="height: 200px;width: 200px" class="img-circle" src="logo/<?php echo $row_user['foto']; ?>">
                  <br>
                  <a href="index.php?controller=user&method=hapus_foto&username=<?php echo $row_user['username'];?>"class="btn btn-md" data-toggle="tooltip" data-placement="top" title="Hapus Foto"><li class="fa fa-trash" ></li></a>
                  <?php
                  }
                  ?>
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
                    <?php echo $row_user['username'];?>
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
                    echo $row_user['nama'];
                  }
                    else{

                    $sql = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE nip='$row_user[nip]'");
                    $row_pegawai = mysqli_fetch_array($sql);

                    echo $row_pegawai['nama']; 
                    }
                  ?>
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
                   if($row_user['gender']=="l")
                   {
                    echo "Laki Laki";
                   }else
                   {
                    echo "Perempuan";
                   }
                   ?>
                  </div>
                  </td>
                  <td width="10%"></td>
                </tr>
              </table>
              <br>

              <div align="center">
               <a href="index.php?controller=user&method=update_password&username=<?php echo $row_user['username']; ?>" class="btn btn-primary btn-md" role="button" data-toggle="tooltip" data-placement="top" title="Ubah Password" > <i class="fa fa-edit fa-edit"></i> Ubah Password </a>
              </div>
              <br>
              <div align="center">
               <a href="index.php?controller=user&method=update&username=<?php echo $row_user['username']; ?>" class="btn btn-success btn-md" role="button" data-toggle="tooltip" data-placement="top" title="Edit" > <i class="fa fa-edit fa-edit"></i> Edit </a>
               </div>
              
            </form>
          </div>
        </div>
      </div>
  </div>
</section>