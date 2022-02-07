<title><?php echo $row_data['nama'];?> | Pengaturan</title>
<!-- INI UNTUK JUDUL -->
<?php
if ($_SESSION['level_simpeg']=="admin") {
?>

            <section class="content-header">
              <h1>
                Pengaturan
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-edit"></i> Data Pengaturan</a></li>
                <li class="active">pengaturan</li>
              </ol>
            </section>
            <section class="content">
            <br>
            <!-- INI UNTUK ISI -->
      <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-tasks fa-fw"></i> Pengaturan
                        </div>

                        <!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body bg-gray">
          <form role="form" method="POST" action="index.php?controller=sistem&method=update_data" enctype="multipart/form-data">

              <!-- INI BAGIAN TABEL -->
              
              <table width="100%" style="background: linear-gradient(to right,#70CEFA, #48D1CC);border-radius: 5px;">
              <?php
              $row_data = mysqli_fetch_array($data_pengaturan);
              ?>
                <tr>
                  <td width="18%"></td>
                  <td width="15%">
                  <br>
                    <b>Nama Profil Web</b>
                  </td>
                  <td width="2%">
                  <br>:
                  </td>
                  <td width="18%">
                  <br>
                  <input class="form-control" name="nama_profil" value="<?php echo $row_data['nama'];?>"></input>
                  <input type="hidden" name="id" value="<?php echo $row_data['id'];?>"></input>
                  </td>
                  <td width="10%"></td>
                </tr>
                <tr>
                  <td>
                    <br>
                  </td>
                </tr>
                <tr>
                  <td width="18%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Instansi Induk</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="18%">
                  <div class="form-group">
                   <input class="form-control" name="judul" value="<?php echo $row_data['instansi'];?>">
                    </div>
                  </td>
                  <td width="10%"></td>
                </tr>
                <tr>
                  <td width="18%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Provinsi</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="18%">
                  <div class="form-group">
                   <input class="form-control" name="provinsi" value="<?php echo $row_data['provinsi'];?>">
                    </div>
                  </td>
                  <td width="10%"></td>
                </tr>
                <tr>
                  <td width="18%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Kota</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="18%">
                  <div class="form-group">
                   <input class="form-control" name="kota" value="<?php echo $row_data['kota'];?>">
                    </div>
                  </td>
                  <td width="10%"></td>
                </tr>
                  <td width="18%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Alamat</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="18%">
                  <div class="form-group">
                   <input class="form-control" name="alamat" value="<?php echo $row_data['alamat'];?>">
                    </div>
                  </td>
                  <td width="10%"></td>
                </tr>
                <tr>
                  <td width="18%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Facebook</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="18%">
                  <div class="form-group">
                   <input class="form-control" name="fb" placeholder="@facebook" value="<?php echo $row_data['fb'];?>">
                    </div>
                  </td>
                  <td width="10%"></td>
                </tr>
                <tr>
                  <td width="18%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Instagram</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="18%">
                  <div class="form-group">
                   <input class="form-control" name="ig" placeholder="@instagram" value="<?php echo $row_data['ig'];?>">
                    </div>
                  </td>
                  <td width="10%"></td>
                </tr>
                <tr>
                  <td width="18%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>Twitter</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="18%">
                  <div class="form-group">
                   <input class="form-control" name="twitter" placeholder="@twitter" value="<?php echo $row_data['twitter'];?>">
                    </div>
                  </td>
                  <td width="10%"></td>
                </tr>
                <tr>
                  <td width="18%"></td>
                  <td width="15%">
                  <div class="form-group">
                    <b>logo Objek</b>
                    </div>
                  </td>
                  <td width="2%"><div class="form-group">:</div></td>
                  <td width="18%">
                  <div class="form-group">
                   <?php
                  if ($row_data['logo']=="")
                    {
                    ?>
                    <img style="height: 200px;" src="logo/bm.png">
                  <?php
                    }
                  else
                  {
                    ?>
                  <img style="height: 200px;width: 200px;"  src="logo/<?php echo $row_data['logo']; ?>">
                  <?php
                  }
                  ?>
                  <?php 
                  if($row_data['logo']==""){
                  }else
                  {?><a href="index.php?controller=sistem&method=hapus_logo"class="btn btn-md" data-toggle="tooltip" data-placement="top" title="Hapus logo"><li class="fa fa-trash" ></li></a>
                  <?php } ?>
                  <br>
                  <br>
                    <input type="file" name="gambar" ><p style="font-size: 10px;">* ukuran logo tidak boleh melebihi 1000kb / 1mb</p>

                    </div>
                  </td>
                  <td width="10%"></td>
                </tr>
              </table>
              <br>
              <br>
              <div align="center">
               <button name="submit" class="btn btn-md btn-success" data-placement="top" title="Update" > <i class="fa fa-check"></i> Update </button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</section>
<script language='javascript'>
  function angka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }
</script>

<?php 
}
else
{
    echo "<script>window.history.back(); </script>";
}
?>