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
    <title><?php echo $home['nama'];?> | Lupa Password </title>

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
    <link rel="shortcut icon" href="../logo/bm11.png">

</head>
<body style="background: linear-gradient(to right,#60CEFF, #48D1CC);background: url(../logo/bg22.png)no-repeat center center fixed;-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">

<body class="hold-transition login-page" style="background: linear-gradient(to right,#87CEFA, #48D1CC);">
<br>
<table width="100%"> 
<tr>
    <td align="center" width="15%">         
         <img src="" style="width: 100px;">
    </td>
    <td width="85%">
     <h2><b style="color: orange;">Sistem Kepegawaian <?php echo $home['nama'];?><br>
     <?php echo $home['instansi'];?></b></h2>
     <p style="color: black;text-shadow: 0 0 5px white;"><b><?php echo $home['alamat'];?></b></p>
    </td>
</tr>
</table>
<br>
<div class="col-md-8 col-lg-8"></div>
<div class="col-md-4 col-lg-4">
  <!-- /.login-logo -->
  <div class="box box-info">
            <div class="box-header with-border bg-blue">
             <center> <h3 class="box-title">Ubah Password</h3></center>
            </div>
            <br>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="m-t" role="form" method="post" action="../proses?valid=sistem&method=ubah_pass" onsubmit="return validasi_input(this)"  style="padding-left: 20px;padding-right: 20px;">
                    <table width="100%" >
                        <tr style="color: black;">
                        <td>
                           <div class="form-group" align="left">Username</div> 
                        </td>
                        <td width="3%">
                           <div class="form-group">:</div> 
                        </td>
                        <td>
                        <div class="form-group">
                            <input type="text" name="username" style="color: black;" class="form-control" placeholder="Username" required oninvalid="this.setCustomValidity('Masukan Username Terlebih Dahulu')" oninput="setCustomValidity('')" autocomplete="off">
                        </div>
                        </td>
                        </tr>
                        <tr style="color: black;">
                        <td>
                           <div class="form-group" align="left">Password Baru</div> 
                        </td>
                        <td>
                           <div class="form-group">:</div> 
                        </td>
                        <td>
                        <div class="form-group">
                            <input type="password" name="password" style="color: black;" class="form-control" placeholder="Password" required oninvalid="this.setCustomValidity('Masukan Password Terlebih Dahulu')" oninput="setCustomValidity('')" autocomplete="off">
                        </div>
                        </td>
                        </tr>
                        </table>
                        <hr>
                         <div class="form-group">
                        <a href="http://martabak.online/" class="pull-left">Home</a>
                        <button type="submit" class="btn btn-primary block pull-right">Simpan</button>
                        <br>
                        </div>
                        <br>
                    </form>
          </div>
  <!-- /.login-box-body -->
  <br>
<br><br>
</div>
<!-- /.login-box -->
<br>
<br><br>
<!-- jQuery 3 -->
<script src="../bootstrap/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>
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
    alert("Password Konfirmasi Minimal 6 Karater!");
    form.re_password.focus();
    return (false);
}
return (true);
}
</script>