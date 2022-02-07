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
				$this->user		= new model_user();

			}

		// FUNCTION UNTUK MENANGANI PROSES LOGIN JURI
			function homeapp() {
				// VIEW
				$data			= $this->sistem->dataHome();

				$data_pegawai   = $this->pegawai->dataSelect();
				$data_pengguna  = $this->user->dataUser();
				// MENGARAHKAN KE FILE VIEW/LOGIN.PHP

				include "view/dashboardapp.php";
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
						  window.location = 'http://localhost/Aplikasi%20Dora/Simpeg/';
						  </script>";
						
					}
				} 
				// MENGARAHKAN KE FILE VIEW/LOGIN.PHP
				// JIKA HASIL PROSES LOGIN GAGAL
				else {
					echo "<script> 
						  alert('Proses Login Gagal! Username / Password Salah! Silakan Coba Lagi!'); 
						  window.location = 'http://wsimpegku.000webhostapp.com'; 
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


		$cek_nip		= $this->sistem->dataCekNip1($nip);
		if($cek_nip > 0)
				{
					echo "<script> 
						  alert('Maaf Nip ".$nip." Sudah Dipakai'); 
						  window.location = 'daftar';
						  
						  </script>";
				}else{

				$ceknip 	= $this->sistem->dataCekNip($nip);

				if ($ceknip != FALSE ) {
					# code...

				
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
								  window.location = 'http://wsimpegku.000webhostapp.com'; 
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
						//cek nip
						else {
							echo "<script> 
								  alert('Maaf Data NIP ".$nip." Tidak Terdaftar');
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
						  window.location = 'http://wsimpegku.000webhostapp.com'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Gagal!');
						  window.location = 'http://wsimpegku.000webhostapp.com'; 
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
			function validasi_app() {
				// MEMULAI SESSION
				

				// CONTROLLER
				// MENAMPUNG USERNAME DAN PASSWORD
				$username 		= addslashes(trim($_POST['username']));
				$password 		= addslashes($_POST['password']);
				
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL SISTEM
				$data_valid		= $this->sistem->dataValidasi_app($username);

				if(password_verify($password,$data_valid['password'])) {
					// MENYIMPAN NILAI SESSION
					$_SESSION['nama_simpeg'] = $data_valid['nama'];
					$_SESSION['username_simpeg'] = $data_valid['username'];
					$_SESSION['level_simpeg'] = $data_valid['level'];
					$_SESSION['bagian_simpeg'] = $data_valid['level'];
					
					if($data_valid['level']=='admin'){
					
					echo "<script>
					 	alert('Maaf Aplikasi ini Khusus Digunakan Oleh User'); 
						  window.location = 'webapp';
						  </script>";
					}
					elseif ($data_valid['level']=='user') {
						echo "<script>  
						  window.location = 'proses.php?valid=sistem&method=homeapp';
						  </script>";
						
					}
					else  {
						echo "<script> 
						  alert('Tidak Bisa Login, Hak Akses Salah!'); 
						  window.location = 'webapp';
						  </script>";
						
					}
				} 
				// MENGARAHKAN KE FILE VIEW/LOGIN.PHP
				// JIKA HASIL PROSES LOGIN GAGAL
				else {
					echo "<script> 
						  alert('Proses Login Gagal! Username / Password Salah! Silakan Coba Lagi!'); 
						  window.location = 'webapp'; 
						  </script>";
				}
			
				
			}
		
	}
?>