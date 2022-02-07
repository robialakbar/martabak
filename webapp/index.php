

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    include('../config/koneksi.php');
    $data = mysqli_query($koneksi,"SELECT * FROM profil");
    $home = mysqli_fetch_array($data); 
    ?>
    <title><?php echo $home['nama'];?> | Login </title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bootstrap/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bootstrap/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../bootstrap/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../bootstrap/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="shortcut icon" href="../logo/bm.png">

</head>
<body style="background: linear-gradient(to right,#60CEFF, #48D1CC);background: url(../logo/bg.jpg)no-repeat center center fixed;-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

<body class="hold-transition login-page" style="background: linear-gradient(to right,#87CEFA, #48D1CC);">
<br>
<table width="100%"> 
<tr>
    <td width="15%" align="center">         
         <img src="../logo/bm.png" style="width: 80%;">
    </td>
    <td width="80%">
     <b style="font-size: 10px;text-shadow: 0 0 5px white;">Sistem Informasi Kenaikan Pangkat dan Kenaikan Gaji Berkala (SEPAKAT BEKAWAN) <?php echo $home['nama'];?><br>
     <?php echo $home['instansi'];?></b>
     <p style="color: black;text-shadow: 0 0 5px white;font-size: 8px;"><b><?php echo $home['alamat'];?></b></p>
    </td>
</tr>
</table>
<div class="container">
  <hr>
</div>

<div class="col-md-4 col-lg-4"></div>
<div class="col-md-4 col-lg-4">
  <!-- /.login-logo -->
  <div class="box box-info">
            <div class="box-header with-border bg-blue">
             <center> <h3 class="box-title">Form Login</h3></center>
            </div>
            <br>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="../proses?valid=sistem&method=validasi_app">
              <div class="box-body">
                <div class="form-group" style="padding-right: 40px;padding-left: 40px;">
                   <table width="100%">
                    <tr>
                        <td width="30%">
                        <div class="form-group has-feedback">
                            Username
                        </div>
                        </td>
                        <td width="70%">
                        <div class="form-group has-feedback">
                            <input type="text" name="username" class="form-control" placeholder="Username" required oninvalid="this.setCustomValidity('Masukan Username Terlebih Dahulu')" oninput="setCustomValidity('')">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">
                        <div class="form-group has-feedback">
                            Password
                        </div>
                        </td>
                        <td width="70%">
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="Password" required oninvalid="this.setCustomValidity('Masukan Password Terlebih Dahulu')" oninput="setCustomValidity('')">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        </td>
                    </tr>
                      </table>
                </div>
                <div class="form-group" style="padding-left: 20px;padding-right: 20px;">
                  <center>
                        <button type="submit" class="btn btn-primary block  m-b">Masuk</button></center>
                </div><hr>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <br><br>
        <table width="100%">
          <tr>
            <td align="center" style="font-size: 10px;">Copyright &copy; <?php 
                            $a=2020	;
                            $b=date('Y');

                            $tgl = $b-$a;

                            if($tgl=="0")
                            {
                              echo "2020";
                            }else{
                              echo "2020 - "; echo $b;
                            }
                        ?>
            </td>
          </tr>
        </table>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../bootstrap/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
