<?php
	// INCLUDE KONEKSI DATABASE 
	include ("config/database.php");
	// INCLUDE MODEL DARI FOLDER MODEL
	include ("model/model_sistem.php"); 
	include ("model/model_user.php");
	
	// CLASS PENDUDUK
	class user {
		// PROPERTY
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			public $user;
			public $sistem;
			
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS MODEL PENDUDUK
				$this->user	= new model_user();
				$this->sistem	= new model_sistem();
				
			}
			
		// FUNCTION UNTUK MENANGANI PROSES SELECT
			function select() {
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->sistem->dataHome();
				$data_user			= $this->user->dataUser();
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES SELECT
			function pengguna() {
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->sistem->dataHome();
				$data_pengguna	= $this->user->dataUser();
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}
		// FUNCTION UNTUK MENANGANI PROSES INSERT
			function insert() {
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				include "view/dashboard.php";
			}
		
		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function insert_data() {
				$options = ['cost' => 5,];
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$nip 				= $_POST['nip'];
				$username		= $_POST['username'];
				$nama				= $_POST['nama'];
				$password			= $_POST['password'];
				$level		= $_POST['level'];
				$gender 			= $_POST['gender'];
				//insert foto

				$cek_nip		= $this->user->dataCekNip($nip);
				if($cek_nip > 0)
				{
					echo "<script> 
						  alert('Maaf Data Nip ".$nip." Sudah Diinput'); 
						  window.location = 'index.php?controller=user&method=pengguna';
						  
						  </script>";
				}else{

                $pswd = password_hash($password, PASSWORD_DEFAULT, $options);
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->user->dataInsert($username,$nip,$pswd,$nama,$level,$gender);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=user&method=pengguna';
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  window.location = 'index.php?controller=user&method=pengguna';
						  alert('Username Sudah Dipakai!'); 
						  </script>";
				}
			  }
			}

		
		// FUNCTION UNTUK MENANGANI PROSES UPDATE
			function update() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$username			= $_GET['username'];
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->sistem->dataHome();
				$data_akun		= $this->user->dataDetail($username);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/UPDATE.PHP
				include "view/dashboard.php";
			}
		// FUNCTION UNTUK MENANGANI PROSES UPDATE
			function update_password() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$username			= $_GET['username'];
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->sistem->dataHome();
				$data_akun		= $this->user->dataDetail($username);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/UPDATE.PHP
				include "view/dashboard.php";
			}
		
		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function update_data() {
				// DARI CONTROLLER
				// MENAMPUNG DATA YANG DIUBAH
				$username			= $_POST['username'];
				$password_lama		= $_POST['password'];
				$nama				= $_POST['nama'];
				$gender 			= $_POST['gender'];
				$fotox   			= $_FILES['gambar']['name'];
				$lokasi 			= $_FILES['gambar']['tmp_name'];

				$foto   			= $username.'_'.$fotox;
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL USER
				$cek 			= $this->user->dataCek($username);
				
				if(password_verify($password_lama,$cek['password'])) 
				{
					$data		= $this->user->dataUpdate($username,$nama,$foto,$gender,$lokasi,$fotox);
					if ($data == TRUE) 
						{
						echo "<script> 
						  alert('Proses Ubah Data Berhasil!');
						  window.location ='index.php?controller=user&method=select';
						  </script>";
						}
				}
				else
				{
					echo "<script> 
						  alert('Password Salah!');
						  window.history.go(-1);
						  </script>";
				}
				
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function update_data_password() {
				$options = ['cost' => 5,];
				// DARI CONTROLLER
				// MENAMPUNG DATA YANG DIUBAH
				$username			= $_POST['username'];
				$password_lama		= $_POST['password_lama'];
				$password_baru		= $_POST['password_baru'];
				$konfirmasi			= $_POST['konfirmasi'];

				$pswd = password_hash($password_baru, PASSWORD_DEFAULT, $options);
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$cek 			= $this->user->dataCek($username);
				
				if(password_verify($password_lama,$cek['password'])) 
				{
					if ($password_baru!=$konfirmasi) 
					{
						echo "<script> 
						  alert('Password Baru Dan Password Konfirmasi Harus Sama!');
						  window.history.go(-1);
						   
						  </script>";
					}
					else
					{
						$data = $this->user->dataUpdatePassword($username,$pswd);
						
						if ($data == TRUE) 
						{
						echo "<script> 
						  alert('Proses Ubah Password Berhasil!');
						  window.location ='index.php?controller=user&method=select';
						  </script>";
						}
					}
				} 
				// JIKA HASIL PROSES LOGIN GAGAL
				else {
					echo "<script> 
						  alert('Password lama Salah!');
						  window.history.go(-1);
						   
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function update_pengguna() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$nip 				= $_POST['nip'];
				$username			= $_POST['username'];
				$nama				= $_POST['nama'];
				$level				= $_POST['level'];
				$gender 			= $_POST['gender'];
				//insert foto
				$foto   			= $_FILES['gambar']['name'];
				$lokasi 			= $_FILES['gambar']['tmp_name'];

				$foto   			= $username.'_'.$fotox;
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->user->UpdateDataPengguna($username,$nip,$nama,$level,$foto,$gender,$lokasi,$fotox);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data == TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=user&method=pengguna'; 
						  alert('Proses Update Berhasil!');
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  window.location = 'index.php?controller=user&method=pengguna';
						  alert('Update Gagal!'); 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function off() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$username			= $_GET['username'];

				$data = $this->user->dataOff($username);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=user&method=pengguna';
						  alert('Proses Berhasil!'); 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script> 
						  window.location = 'index.php?controller=user&method=pengguna'; 
						  alert('Proses Gagal!');
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function on() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$username			= $_GET['username'];

				$data = $this->user->dataOn($username);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=user&method=pengguna';
						  alert('Proses Berhasil!'); 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script> 
						  window.location = 'index.php?controller=user&method=pengguna'; 
						  alert('Proses Gagal!');
						  </script>";
				}
			}
		
		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function delete() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$username			= $_GET['username'];

				$data = $this->user->dataDelete($username);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=user&method=pengguna';
						  alert('Proses Delete Berhasil!'); 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script> 
						  window.location = 'index.php?controller=user&method=pengguna'; 
						  alert('Proses Delete Gagal!');
						  </script>";
				}
			}
		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function hapus_foto() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$username			= $_GET['username'];

				$data = $this->user->dataDeleteFoto($username);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=user&method=select';
						  alert('Proses Delete Berhasil!'); 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script> 
						  window.location = 'index.php?controller=user&method=select'; 
						  alert('Proses Delete Gagal!');
						  </script>";
				}
			}
	}
?>