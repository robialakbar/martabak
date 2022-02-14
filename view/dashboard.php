<?php
    // CEK SESSION -- ADMIN
    if(isset($_SESSION['nama_simpeg'],$_SESSION['username_simpeg'],$_SESSION['bagian_simpeg']) AND ($_SESSION['level_simpeg']=="admin"))
    {
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="bootstrap/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="bootstrap/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bootstrap/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bootstrap/bower_components/jvectormap/jquery-jvectormap.css">
   <link rel="stylesheet" href="bootstrap/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="bootstrap/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bootstrap/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bootstrap/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="bootstrap/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<?php 
$row_data= mysqli_fetch_array($data);
    if ($row_data['logo']==""){
  ?><link rel="shortcut icon" href="logo/bm.png">
  <?php
  }
  else
  {
  ?>
  <link rel="shortcut icon" href="logo/<?php echo $row_data['logo'];?>">
  <?php
  }
  ?>
</head>
      <!-- warna sidebar-->
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php?controller=sistem&method=home" class="logo">
      
      <b>
      <?php
          echo $row_data['nama'];
      ?>
      </b>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
      <?php
                  include ("config/koneksi.php");
                  include ("tanggal_indo.php");

                  $data_th = mysqli_query($koneksi,"SELECT * FROM user WHERE username ='$_SESSION[username_simpeg]'");

                    $row_data2= mysqli_fetch_array($data_th);
      ?>
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php

                if($row_data2['foto']=="")
                  {
                    if($row_data2['gender']=="l")
                  {
              ?>
                  <img style="height: 20px;" src="logo/pria.png" class="img-circle" alt="User Image">
              <?php
                }
                  else
                  {
                ?>
                    <img style="height: 20px;" src="logo/wanita.png" class="img-circle" alt="User Image">
              <?php
                }
              }
                else
                {
              ?>
                <img src="logo/<?php echo $row_data2['foto'];?>" class="img-circle" style="height: 20px;width: 20px" alt="User Image">
              <?php
                }
              ?>
              <span class="hidden-xs"><?php echo $row_data2['nama'];?> <i class=" fa fa-chevron-down"></i></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
            <?php

                if($row_data2['foto']=="")
                  {
                    if($row_data2['gender']=="l")
                  {
              ?>
                  <img style="height: 100px;width: 100px;" class="img-circle" src="logo/pria.png" alt="User Image">
              <?php
                }
                  else
                  {
                ?>
                    <img style="height: 100px;width: 100px" class="img-circle" src="logo/wanita.png" alt="User Image">
              <?php
                }
              }
                else
                {
              ?>
                <img src="logo/<?php echo $row_data2['foto'];?>" class="img-circle" style="height: 100px;width: 100" alt="User Image">
              <?php
                }
              ?>

                <p>
                  <?php echo $row_data2['nama'];?>
                  <small>Admin || NIP. <?php echo $row_data2['nip'];?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="index.php?controller=user&method=select" class="btn btn-default btn-flat">Akun</a>
                </div>
                <div class="pull-right">
                  <a href="index.php?controller=sistem&method=logout"onClick="return confirm('Yakin Mau Keluar??')" class="btn btn-default btn-flat">
                 Keluar  <i class="glyphicon glyphicon-sign-out"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
           <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php

                if($row_data2['foto']=="")
                  {
                    if($row_data2['gender']=="l")
                  {
              ?>
                  <img style="height: 50px;width: 50px;" class="img-circle" src="logo/pria.png" alt="User Image">
              <?php
                }
                  else
                  {
                ?>
                    <img style="height: 50px;width: 50px;" class="img-circle" src="logo/wanita.png" alt="User Image">
              <?php
                }
              }
                else
                {
              ?>
                <img src="logo/<?php echo $row_data2['foto'];?>" style="height: 50px;width: 50px;" class="img-circle" alt="User Image">
              <?php
                }
              ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $row_data2['nama'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Admin 
          <br>( NIP. <?php echo $row_data2['nip'];?> )</a>
        </div>
      </div>
<ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php?controller=sistem&method=home">
            <i class="fa fa-home"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?controller=kategori&method=pangkat"><i class="fa fa-circle-o"></i> Data Pangkat / Golongan</a></li>
            <li><a href="index.php?controller=kategori&method=jabatan"><i class="fa fa-circle-o"></i> Data Jabatan</a></li>
            <li><a href="index.php?controller=kategori&method=jenis"><i class="fa fa-circle-o"></i> Data Jenis Kepegawaian</a></li>
            <li><a href="index.php?controller=kategori&method=status"><i class="fa fa-circle-o"></i> Data Status Kepegawaian</a></li>
            <li><a href="index.php?controller=golongan&method=golongan"><i class="fa fa-circle-o"></i> Data Golongan Ijasah</a></li>
            <li><a href="index.php?controller=sk&method=sk"><i class="fa fa-circle-o"></i> Data SK</a></li>
          </ul>
        </li>
        <li>
          <a href="index.php?controller=pegawai&method=select">
            <i class="fa fa-street-view"></i> <span>Data Kepegawaian</span>
          </a>
        </li>
        <li>
          <a href="index.php?controller=gaji&method=select">
            <i class="fa fa-money"></i> <span>Data Penggajian</span>
          </a>
        </li>
        <li>
          <a href="index.php?controller=mutasi&method=select">
            <i class="fa fa-line-chart"></i> <span>Data Mutasi</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-whatsapp"></i> <span>Whatsapp</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?controller=wa&method=pemberitahuan"><i class="fa fa-circle-o"></i> Pemberitahuan Kenaikan</a></li>
            <li><a href="index.php?controller=wa&method=kirim"><i class="fa fa-circle-o"></i> Kirim Pesan</a></li>
            <li><a href="index.php?controller=wa&method=setting"><i class="fa fa-circle-o"></i> Setting</a></li>
          </ul>
        </li>
        <li>
          <a href="index.php?controller=sistem&method=pengaturan">
            <i class="fa fa-gear"></i> <span>Pengaturan</span>
          </a>
        </li>
        <li>
          <a href="index.php?controller=user&method=pengguna">
            <i class="fa fa-users"></i> <span>Data Pengguna</span>
          </a>
        </li>
        <li>
          <a href="index.php?controller=user&method=select">
            <i class="fa fa-user"></i> <span>Akun</span>
          </a>
        </li>
        <li class="header"></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
          <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- BAGIAN INDEX.PHP UNTUK MENANGANI KONTEN -->
        <div id="page-wrapper">
          <!-- INI BAGIAN PENGATUR KOMUNIKASI USER DENGAN CONTROLLER -->
          <?php
            // MENGARAHKAN KE FILE VIEW SESUAI NILAI CONTROLLER DAN METHOD DARI LINK
            include ("$_GET[controller]/$_GET[method].php");
          ?>
        </div>
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <center><strong>Copyright &copy; <?php 
                            $a=2020;
                            $b=date('Y');

                            $tgl = $b-$a;

                            if($tgl=="0")
                            {
                              echo "2020";
                            }else{
                              echo "2020 - "; echo $b;
                            }
                        ?> <a><?php echo $row_data['nama'];?> - <?php echo $row_data['instansi'];?> </a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<script src="bootstrap/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="bootstrap/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="bootstrap/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="bootstrap/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- daterangepicker -->
<script src="bootstrap/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="bootstrap/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bootstrap/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- datepicker -->
<script src="bootstrap/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="bootstrap/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bootstrap/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- Select2 -->
<script src="bootstrap/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- FastClick -->
<!-- AdminLTE App -->
<script src="bootstrap/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="bootstrap/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="bootstrap/dist/js/demo.js"></script>
<script>
$(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
</script>
<script>
  $(function () {
    $('#tabel').DataTable()
    $('#tabel2').DataTable()
    $('#tabel3').DataTable()
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
<script type="text/javascript">
     
     function printDiv(elementId) {
    var a = document.getElementById('print-area-2').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
    }
    </script>
</body>
</html>
<?php
}elseif(isset($_SESSION['nama_simpeg'],$_SESSION['username_simpeg'],$_SESSION['bagian_simpeg']) AND ($_SESSION['level_simpeg']=="user"))
    {
      include ("config/koneksi.php");
                  include ("tanggal_indo.php");

                  $data_th = mysqli_query($koneksi,"SELECT * FROM user WHERE username ='$_SESSION[username_simpeg]'");

                    $row_data2= mysqli_fetch_array($data_th);
                    $row_cek= mysqli_num_rows($data_th);

      $data_cek=mysqli_query($koneksi,"SELECT * FROM pegawai WHERE nip='$row_data2[nip]' ");
      $cek  = mysqli_num_rows($data_cek);

      if($cek>0)
      {
        if($row_cek>0)
        {
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="bootstrap/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="bootstrap/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bootstrap/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bootstrap/bower_components/jvectormap/jquery-jvectormap.css">
   <link rel="stylesheet" href="bootstrap/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="bootstrap/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bootstrap/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bootstrap/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="bootstrap/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<?php 
$row_data= mysqli_fetch_array($data);
    if ($row_data['logo']==""){
  ?><link rel="shortcut icon" href="logo/bm.png">
  <?php
  }
  else
  {
  ?>
  <link rel="shortcut icon" href="logo/<?php echo $row_data['logo'];?>">
  <?php
  }
  ?>
</head>
      <!-- warna sidebar-->
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php?controller=sistem&method=home" class="logo">
      
      <b>
      <?php
          echo $row_data['nama'];
      ?>
      </b>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
      <?php

                    $sql = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE nip='$row_data2[nip]'");
                    $row_pegawai = mysqli_fetch_array($sql);
        ?>

        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php

                if($row_data2['foto']=="")
                  {
                    if($row_data2['gender']=="l")
                  {
              ?>
                  <img style="height: 20px;" src="logo/pria.png" class="img-circle" alt="User Image">
              <?php
                }
                  else
                  {
                ?>
                    <img style="height: 20px;" src="logo/wanita.png" class="img-circle" alt="User Image">
              <?php
                }
              }
                else
                {
              ?>
                <img src="logo/<?php echo $row_data2['foto'];?>" class="img-circle" style="height: 20px;width: 20px" alt="User Image">
              <?php
                }
              ?>
              <span class="hidden-xs"><?php echo $row_pegawai['nama'];?> <i class=" fa fa-chevron-down"></i></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
            <?php

                if($row_data2['foto']=="")
                  {
                    if($row_data2['gender']=="l")
                  {
              ?>
                  <img style="height: 100px;width: 100px;" class="img-circle" src="logo/pria.png" alt="User Image">
              <?php
                }
                  else
                  {
                ?>
                    <img style="height: 100px;width: 100px" class="img-circle" src="logo/wanita.png" alt="User Image">
              <?php
                }
              }
                else
                {
              ?>
                <img src="logo/<?php echo $row_data2['foto'];?>" class="img-circle" style="height: 100px;width: 100" alt="User Image">
              <?php
                }
              ?>

                <p>
                  <?php echo $row_pegawai['nama'];?>
                  <small>NIP. <?php echo $row_pegawai['nip'];?> </small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="index.php?controller=user&method=select" class="btn btn-default btn-flat">Akun</a>
                </div>
                <div class="pull-right">
                  <a href="index.php?controller=sistem&method=logout"onClick="return confirm('Yakin Mau Keluar??')" class="btn btn-default btn-flat">
                 Keluar  <i class="glyphicon glyphicon-sign-out"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
           <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php

                if($row_data2['foto']=="")
                  {
                    if($row_data2['gender']=="l")
                  {
              ?>
                  <img style="height: 50px;width: 50px;" class="img-circle" src="logo/pria.png" alt="User Image">
              <?php
                }
                  else
                  {
                ?>
                    <img style="height: 50px;width: 50px;" class="img-circle" src="logo/wanita.png" alt="User Image">
              <?php
                }
              }
                else
                {
              ?>
                <img src="logo/<?php echo $row_data2['foto'];?>" style="height: 50px;width: 50px;" class="img-circle" alt="User Image">
              <?php
                }
              ?>
        </div>
        <div class="pull-left info">
          <p><?php echo $row_pegawai['nama'];?></p>
          <a href="#">NIP. <?php echo $row_pegawai['nip'];?> </a>
        </div>
      </div>
<ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php?controller=sistem&method=home">
            <i class="fa fa-home"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="index.php?controller=pegawai&method=select">
            <i class="fa fa-users"></i> <span>Data Pegawai</span>
          </a>
        </li>
        <li>
          <a href="index.php?controller=pegawai&method=detail&nip=197809282002121001">
            <i class="fa fa-street-view"></i> <span>Data Diri</span>
          </a>
        </li>
        <li>
          <a href="index.php?controller=pegawai&method=info_gaji">
            <i class="fa fa-money"></i> <span>Data Gaji</span>
          </a>
        </li>
        <li>
          <a href="index.php?controller=berkas&method=select">
            <i class="fa fa-file-archive-o"></i> <span>Data Lampiran</span>
          </a>
        </li>
        <li>
          <a href="index.php?controller=user&method=select">
            <i class="fa fa-user"></i> <span>Akun</span>
          </a>
        </li>
        <li class="header"></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
          <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- BAGIAN INDEX.PHP UNTUK MENANGANI KONTEN -->
        <div id="page-wrapper">
          <!-- INI BAGIAN PENGATUR KOMUNIKASI USER DENGAN CONTROLLER -->
          <?php
            // MENGARAHKAN KE FILE VIEW SESUAI NILAI CONTROLLER DAN METHOD DARI LINK
            include ("$_GET[controller]/$_GET[method].php");
          ?>
        </div>
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <center><strong>Copyright &copy; <?php 
                            $a=2020;
                            $b=date('Y');

                            $tgl = $b-$a;

                            if($tgl=="0")
                            {
                              echo "2020";
                            }else{
                              echo "2020 - "; echo $b;
                            }
                        ?> <a><?php echo $row_data['nama'];?> - <?php echo $row_data['instansi'];?> </a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<script src="bootstrap/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="bootstrap/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="bootstrap/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="bootstrap/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- daterangepicker -->
<script src="bootstrap/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="bootstrap/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bootstrap/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- datepicker -->
<script src="bootstrap/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="bootstrap/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bootstrap/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- Select2 -->
<script src="bootstrap/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- FastClick -->
<!-- AdminLTE App -->
<script src="bootstrap/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="bootstrap/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="bootstrap/dist/js/demo.js"></script>
<script>
$(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
</script>
<script>
  $(function () {
    $('#tabel').DataTable()
    $('#tabel2').DataTable()
    $('#tabel3').DataTable()
    //Initialize Select2 Elements
    $('.select2').select2()
  })
</script>
<script type="text/javascript">
     
     function printDiv(elementId) {
    var a = document.getElementById('print-area-2').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
    }
    </script>
</body>
</html>
<?php
    }
          else {
              echo "<script> 
                     alert('Maaf Anda Harus Login'); 
                     window.location = 'http://martabak.online/';
                    </script>";
          }
  }
    else {
        echo "<script> 
               alert('Maaf Data Nip Tidak Ada'); 
               window.location = 'http://martabak.online/';
              </script>";
    }
}    
    else {
        echo "<script> 
               alert('Maaf! Anda Harus Login!'); 
               window.location = 'http://martabak.online/';
              </script>";
    }
?>