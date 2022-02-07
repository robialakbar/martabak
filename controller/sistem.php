<?php
	// INCLUDE KONEKSI DATABASE 
	include ("config/database.php");
	// INCLUDE MODEL DARI FOLDER MODEL 
	include ("model/model_sistem.php");
	include ("model/model_pegawai.php");
	include ("model/model_user.php");
	
	// CLASS SISTEM
	class sistem {
		// PROPERTY
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			public $sistem;
			public $pegawai;
			public $user;
			
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS MODEL SISTEM
				$this->sistem		= new model_sistem();
				$this->pegawai		= new model_pegawai();
				$this->user			= new model_user();
				
			}

			// FUNCTION UNTUK MENANGANI PROSES LOGIN JURI
			function home() {
				// VIEW
				$data			= $this->sistem->dataHome();

				$data_pegawai   = $this->pegawai->dataSelect();
				$data_pengguna  = $this->user->dataUser();
				// MENGARAHKAN KE FILE VIEW/LOGIN.PHP

				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES LOGIN JURI
			function login() {
				// VIEW
				$data			= $this->sistem->dataHome();
				// MENGARAHKAN KE FILE VIEW/LOGIN.PHP

				include "view/login.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES DAFTAR JURI
			function daftar() {
				// VIEW
				$data			= $this->sistem->dataHome();
				// MENGARAHKAN KE FILE VIEW/LOGIN.PHP

				include "view/daftar.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES DAFTAR JURI
			function lost_pass() {
				// VIEW
				$data			= $this->sistem->dataHome();
				// MENGARAHKAN KE FILE VIEW/LOGIN.PHP

				include "view/lost.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES DAFTAR JURI
			function pengaturan() {
				// VIEW
				$data			= $this->sistem->dataHome();
				$data_pengaturan			= $this->sistem->dataHome();

				// MENGARAHKAN KE FILE VIEW/LOGIN.PHP

				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function update_data() {
				// DARI CONTROLLER
				// MENAMPUNG DATA YANG DIUBAH
				$id						= $_POST['id'];
				$nama_profil			= $_POST['nama_profil'];
				$alamat					= $_POST['alamat'];
				$judul					= $_POST['judul'];
				$kota					= $_POST['kota'];

				$fotox   				= $_FILES['gambar']['name'];
				$lokasi 				= $_FILES['gambar']['tmp_name'];

				$foto 					= 'ikon_'.$fotox;

				$provinsi 				= $_POST['provinsi'];
				$ig 					= $_POST['ig'];
				$fb 					= $_POST['fb'];
				$twitter 				= $_POST['twitter'];
				

				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->sistem->dataUpdate($id,$nama_profil,$judul,$provinsi,$kota,$alamat,$foto,$lokasi,$fb,$twitter,$ig,$fotox);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES UPDATE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=sistem&method=pengaturan';
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/UPDATE.PHP
				// JIKA HASIL PROSES UPDATE GAGAL
				else {
					echo "<script> 
					alert('Proses Update Gagal!');
						  window.location = 'index.php?controller=sistem&method=pengaturan';
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function hapus_logo() {
				// DARI CONTROLLER

				$data = $this->sistem->DeleteLogo();
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  alert('Proses Delete Berhasil!');
						  window.location = 'index.php?controller=sistem&method=pengaturan'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script>
							alert('Proses Delete Gagal!'); 
						  window.location = 'index.php?controller=sistem&method=pengaturan'; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function user_daftar() {

				$options = ['cost' => 5,];
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$username			= $_POST['username'];
				$nip 				= $_POST['nip'];
				$nama				= $_POST['nama'];
				$password 			= $_POST['password'];
				$re_password 		= $_POST['re_password'];
				$gender 			= $_POST['gender'];

				
				$pswd = password_hash($password, PASSWORD_DEFAULT, $options);
				
				// DARI MODEL

				if($password != $re_password)
				{
					echo "<script> 
						  alert('Gunakan Password Yang Sama!'); 
						  window.location = 'index.php?controller=sistem&method=daftar';
						  </script>";
				}
				else
				{
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->sistem->dataDaftar($username,$nip,$pswd,$nama,$gender);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  alert('Proses Pendaftaran Berhasil!,Silahkan Login');
						  window.location = 'http://martabak.online/'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Username sudah dipakai!');
						  window.location = 'daftar'; 
						  </script>";
				}
			}
			}

			// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function ubah_pass() {

				$options = ['cost' => 5,];
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$username			= $_POST['username'];
				$password 			= $_POST['password'];
				
				$pswd = password_hash($password, PASSWORD_DEFAULT, $options);

				$cek			= $this->sistem->dataCek($username);
				
				// DARI MODEL

				if($cek != FALSE)
				{
					// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->sistem->UpdateLupaPassword($username,$pswd);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  alert('Proses Ubah Password Berhasil!,Silahkan Login');
						  window.location = 'http://martabak.online/'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Gagal!');
						  window.location = 'http://martabak.online/'; 
						  </script>";
				}
			}
			else{

				echo "<script> 
						  alert('Username ".$username." Tidak Terdaftar!'); 
						  window.location = 'lost';
						  </script>";
				}

			}

		// FUNCTION UNTUK MENANGANI PROSES VALIDASI LOGIN
			function validasi() {
				// MEMULAI SESSION
				

				// CONTROLLER
				// MENAMPUNG USERNAME DAN PASSWORD
				$username 		= addslashes(trim($_POST['username']));
				$password 		= addslashes($_POST['password']);
				
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL SISTEM
				$data_valid		= $this->sistem->dataValidasi($username);

				if(password_verify($password,$data_valid['password'])) {
					// MENYIMPAN NILAI SESSION
					$_SESSION['nama_simpeg'] = $data_valid['nama'];
					$_SESSION['username_simpeg'] = $data_valid['username'];
					$_SESSION['level_simpeg'] = $data_valid['level'];
					$_SESSION['bagian_simpeg'] = $data_valid['level'];
					
					if($data_valid['level']=='admin'){
					
					echo "<script> 
						  window.location = 'index.php?controller=sistem&method=home';
						  </script>";
					}
					elseif ($data_valid['level']=='user') {
						echo "<script>  
						  window.location = 'index.php?controller=sistem&method=home';
						  </script>";
						
					}
					else  {
						echo "<script> 
						  alert('Tidak Bisa Login, Hak Akses Salah!'); 
						  window.location = 'http://martabak.online/';
						  </script>";
						
					}
				} 
				// MENGARAHKAN KE FILE VIEW/LOGIN.PHP
				// JIKA HASIL PROSES LOGIN GAGAL
				else {
					echo "<script> 
						  alert('Proses Login Gagal! Username / Password Salah! Silakan Coba Lagi!'); 
						  window.location = 'http://martabak.online/'; 
						  </script>";
				}
			
				
			}

		// FUNCTION UNTUK MENANGANI PROSES LOGOUT
			function logout() {
				// MEMULAI SESSION
				

				
					// MENGHAPUS SESSION
					unset($_SESSION['username_simpeg']);
					unset($_SESSION['nama_simpeg']);
					unset($_SESSION['level_simpeg']);
					unset($_SESSION['bagian_simpeg']);
					// MENUTUP SESSIOn
					session_destroy();
				
				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/LOGIN.PHP
				echo "<script> 
					  alert('Proses Logout Berhasil!'); 
					  window.location = 'http://martabak.online/'; 
					  </script>";
			}
		
	}
?>