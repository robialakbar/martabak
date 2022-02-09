<?php $home = mysqli_fetch_array($data); ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $home['nama'];?> | Login </title>

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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="shortcut icon" href="logo/bm.png">

</head>
<body style="background: linear-gradient(to right,#60CEFF, #48D1CC);background: url(logo/bg21.jpg)no-repeat center center fixed;-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

<body class="hold-transition login-page" style="background: linear-gradient(to right,#87CEFA, #48D1CC);">
<br>
<table width="100%"> 
<tr>
    <td align="center" width="15%">         
         <img src="logo/bm.png" style="width: 100px;">
    </td>
    <td width="85%">
     <h3><b style="color: White;">
     <img src="logo/namlogin.png" style="width: 100px;"><br>
     <?php echo $home['instansi'];?></b></h3>
     <p style="color: black;text-shadow: 0 0 5px white;"><b><?php echo $home['alamat'];?></b></p>
    </td>
</tr>
</table>


<div class="col-md-8 col-lg-8"></div>
<div class="col-md-4 col-lg-4">
  <!-- /.login-logo -->
  <div class="box box-info">
            <div class="box-header with-border bg-blue">
             <center> <h3 class="box-title">Form Login</h3></center>
            </div>
            <br>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="proses?valid=sistem&method=validasi">
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
                        <button type="submit" class="btn btn-primary block  m-b">Masuk</button></center><br>
                        <a href="daftar/" class="pull-left">Buat Akun</a>
                        <a href="lost/" class="pull-right">lupa Password ??</a>
                        <br>
                </div><hr>
                <div class="form-group" style="padding-left: 20px;padding-right: 20px;">
                  <center>

                    <a href="https://www.facebook.com/<?php echo $home['fb'];?>" target="_blank" title="Facebook" class="btn btn-primary" style="border-radius: 100px;width: 38px;height: 38px"><i class="fa fa-facebook"></i></a>
                    <i class="fa fa-fw"></i>

                    <a href="https://www.twitter.com/<?php echo $home['twitter'];?>" target="_blank" title="Twitter" class="btn btn-info" style="border-radius: 100px;width: 38px;height: 38px"><i class="fa fa-twitter"></i></a>

                    <i class="fa fa-fw"></i>
                    <a href="https://www.instagram.com/<?php echo $home['ig'];?>" title="Instagram" target="_blank" class="btn btn-danger" style="border-radius: 100px;width: 38px;height: 38px"><i class="fa fa-instagram"></i></a>

                    <i class="fa fa-fw"></i>
                    <a href="https://drive.google.com/" target="_blank" title="Download Versi Android" class="btn btn-success" style="border-radius: 100px;width: 38px;height: 38px"><i class="fa fa-android"></i></a>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bootstrap/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
