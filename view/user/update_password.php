<title><?php echo $row_data['nama'];?> | Update Password</title>
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
            <form class="m-t" role="form" method="post"  action="index.php?controller=user&method=update_data_password" onsubmit="return validasi_input(this)">

              <!-- INI BAGIAN TABEL -->
              <table width="100%">
              <?php
                // SET NOMOR URUT DATA
                // CEK DATA YANG DITERIMA
                $row_user  = mysqli_fetch_array($data_akun);
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
                  <img style="height: 200px;width: 200px" class="img-circle" src="logo/<?php echo $row_user['foto']; ?>">
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
                  <input type="hidden" name="username" value="<?php echo $row_user['username'];?>"></input>
                    </div>
                  </td>
                  <td width="10%"></td>
                </tr>
                <tr>
                  <td width="20%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Password Lama</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="20%">
                  <div class="form-group">
                   <input type="password" class="form-control" name="password_lama" required oninvalid="this.setCustomValidity('Masukan Password Lama')" oninput="setCustomValidity('')" autocomplete="off">
                    </div>
                  </td>
                  <td width="10%"></td>
                </tr>
                <tr>
                  <td width="20%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Password Baru</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="20%">
                  <div class="form-group">
                   <input type="password" class="form-control" name="password_baru" required oninvalid="this.setCustomValidity('Masukan Password Baru')" oninput="setCustomValidity('')" autocomplete="off">
                    </div>
                  </td>
                  <td width="10%"></td>
                </tr>
                <tr>
                  <td width="20%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Konfirmasi Password</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="20%">
                  <div class="form-group">
                   <input type="password" class="form-control" name="konfirmasi" required oninvalid="this.setCustomValidity('Masukan Password Konfirmasi')" oninput="setCustomValidity('')" autocomplete="off">
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

<script type="text/javascript">
function validasi_input(form){
   var mincar = 6;
  if (form.password_baru.value.length < mincar){
    alert("Password Minimal 6 Karater!");
    form.password_baru.focus();
    return (false);
}
    if (form.konfirmasi.value.length < mincar){
    alert("Konfrimasi Password Minimal 6 Karater!");
    form.konfirmasi.focus();
    return (false);
}
return (true);
}
</script>