<?php $home = mysqli_fetch_array($data); ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $home['nama'];?> | Lupa password </title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="bootstrap/css/animate.css" rel="stylesheet">
    <link href="bootstrap/css/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="logo/bm.png">

</head>

<body class="blue-bg" style="background: linear-gradient(to right,#20CEFF, #48D1CC);">
<h2 align="center" style="font-size: 30px;"><b>
Sistem Informasi Data Pegawai (SI-DAWAI) <br><?php echo $home['nama'];?></b></h2>
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div class="row" style="border-radius: 5px;background: teal;">
        <h3><b>Lupa Password</b></h3>
            <div class="">
                <div class="ibox-content"><br>
                    <form class="m-t" role="form" method="post" action="?controller=sistem&method=ubah_pass" onsubmit="return validasi_input(this)">
                    <table width="100%">
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
                        <center>
                        <button type="submit" class="btn btn-primary block  m-b">Proses</button></center>
                        <a href="../simpeg" >Kembali</a>
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row text-center">
            <div class="text-center">
                Copyright <?php echo $home['nama'];?>
                <br>
                <?php echo $home['instansi'];?>
                <br>
               <small>© <?php 
                            $a=2020;
                            $b=date('Y');

                            $tgl = $b-$a;

                            if($tgl=="0")
                            {
                              echo "2020";
                            }else{
                              echo "2020 - "; echo $b;
                            }
                        ?>
                </small>
            </div>
        </div>
    </div>

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
    alert("Password Minimal 6 Karater!");
    form.re_password.focus();
    return (false);
}
return (true);
}
</script>