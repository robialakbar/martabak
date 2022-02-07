<title><?php echo $row_data['nama'];?> | Kirim Pesan </title>
<?php
if ($_SESSION['level_simpeg']=="admin") {
?>

            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Kirim Pesan
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Pesan</li>
              </ol>
            </section>
            <section class="content">
            <!-- INI UNTUK ISI -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-users fa-fw"></i> Kirim Pesan
                        </div>

                        <!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body table-responsive">
                            <!-- INI BAGIAN TABEL -->
                        <form role="form" method="POST" action="index.php?controller=wa&method=send">
                            <table width="100%">
                             <thead>
                                    <tr>
                                        <th width="6%">
                                            <div class="form-group">
                                                Kontak
                                            </div>
                                        </th>
                                        <th width="60%">
                                            <div class="form-group">
                                                <input name="wa" class="form-control">
                                                
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="form-group">
                                            Pesan
                                            </div>
                                        </th>
                                        <th>
                                            <div class="form-group">
                                            <textarea name="pesan" class="form-control" rows="3" required></textarea>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th width="10%" colspan="2"><center>
                                        <button type="submit" name="submit" class="btn btn-info btn-md pull-right" title="Cari"><i class="fa fa-send fa-fw"></i> Kirim</button>
                                        </center>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            </form>
                            
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </section>
<?php 
}
else
{
    echo "<script>window.history.back(); </script>";
}
?>