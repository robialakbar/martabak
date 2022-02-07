<?php
	// INCLUDE KONEKSI DATABASE 
	include ("config/database.php");
	// INCLUDE MODEL DARI FOLDER MODEL 
	include ("model/model_wa.php");
	include ("model/model_sistem.php");
	include ("model/model_pegawai.php");
	
	// CLASS PENDUDUK
	class wa {
		// PROPERTY
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			public $wa;
			public $sistem;
			public $pegawai;
			
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS MODEL PENDUDUK
				$this->wa	= new model_wa();
				$this->sistem	= new model_sistem();
				$this->pegawai	= new model_pegawai();
				
			}
		
			// FUNCTION UNTUK MENANGANI PROSES SELECT
			function kirim() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$data			        = $this->sistem->dataHome();
				$data_wa			= $this->wa->dataSelect();

				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

			// FUNCTION UNTUK MENANGANI PROSES SELECT
			function pemberitahuan() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$data			    = $this->sistem->dataHome();
				$data_pegawai		= $this->pegawai->dataSelect();

				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

			// FUNCTION UNTUK MENANGANI PROSES SELECT
			function setting() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$data			        = $this->sistem->dataHome();
				$data_wa			= $this->wa->dataSelect();

				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function edit() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$token			= $_POST['token'];

				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->wa->dataUpdate($token);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=wa&method=setting'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Update Gagal!');
						  window.location = 'index.php?controller=wa&method=setting'; 
						  </script>";
				}
			
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function send() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$wa			= $_POST['wa'];
				//$wamulti    = implode(',', $_POST['wa']);
				$pesan 		= $_POST['pesan'];

				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data_token		= $this->wa->dataValidasi();

				$token = $data_token['token'];


				$curlAPICall = curl_init();

				curl_setopt($curl, CURLOPT_HTTPHEADER,
				    array(
				        "Authorization: ".$token,
				    )
				);

				$data = [
				    'phone' => $wa,
				    'message' => $pesan,
				    
				];

				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
				curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/schedule");
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
				$result = curl_exec($curl);
				curl_close($curl);

				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($result 		== TRUE) {
					echo "<script> 
					alert('Pesan ke nomor ".$wa." berhasil ');
						  window.location = 'index.php?controller=wa&method=kirim'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Kirim Gagal!');
						  window.location = 'index.php?controller=wa&method=kirim'; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function send_pangkat() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$wa			= $_POST['nomor'];
				//$wamulti    = implode(',', $_POST['wa']);
				$pesan 		= $_POST['pesan'];

				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data_token		= $this->wa->dataValidasi();

				$token = $data_token['token'];


				$curl = curl_init();

				curl_setopt($curl, CURLOPT_HTTPHEADER,
				    array(
				        "Authorization: ".$token,
				    )
				);

				$data = [
				    'phone' => $wa,
				    'message' => $pesan,
				    'type' => 'random' 
				];

				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
				curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/send-message");
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
				$result = curl_exec($curl);
				curl_close($curl);

				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($result 		== TRUE) {
					echo "<script> 
					alert('Pesan Pemberitahuan ke nomor ".$wa." berhasil ');
						  window.location = 'index.php?controller=wa&method=pemberitahuan'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Kirim Gagal!');
						  window.location = 'index.php?controller=wa&method=pemberitahuan'; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function send_gaji() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$wa			= $_POST['nomor'];
				//$wamulti    = implode(',', $_POST['wa']);
				$pesan 		= $_POST['pesan'];

				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data_token		= $this->wa->dataValidasi();

				$token = $data_token['token'];


				$curl = curl_init();

				curl_setopt($curl, CURLOPT_HTTPHEADER,
				    array(
				        "Authorization: ".$token,
				    )
				);

				$data = [
				    'phone' => $wa,
				    'message' => $pesan,
				    'type' => 'random' 
				];

				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
				curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/send-message");
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
				$result = curl_exec($curl);
				curl_close($curl);

				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($result 		== TRUE) {
					echo "<script> 
					alert('Pesan Pemberitahuan ke nomor ".$wa." berhasil ');
						  window.location = 'index.php?controller=wa&method=pemberitahuan'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Kirim Gagal!');
						  window.location = 'index.php?controller=wa&method=pemberitahuan'; 
						  </script>";
				}
			}
		
	}
?>