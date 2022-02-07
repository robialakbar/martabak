<?php
	// INCLUDE KONEKSI DATABASE 
	include ("config/database.php");
	// INCLUDE MODEL DARI FOLDER MODEL 
	include ("model/model_sk.php");
	include ("model/model_sistem.php");
	
	// CLASS PENDUDUK
	class sk {
		// PROPERTY
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			public $sk;
			public $sistem;
			
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS MODEL PENDUDUK
				$this->sk	= new model_sk();
				$this->sistem	= new model_sistem();
				
			}
		
			// FUNCTION UNTUK MENANGANI PROSES SELECT
			function sk() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$data			        = $this->sistem->dataHome();
				$data_sk			= $this->sk->datask();

				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function insert_sk() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$keterangan 	= $_POST['keterangan'];
				
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->sk->dataInsert_sk($keterangan);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data 		== TRUE) {
					echo "<script>
						  window.location = 'index.php?controller=sk&method=sk'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Insert Gagal!');
						  window.location = 'index.php?controller=sk&method=sk'; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function update_sk() {
				// DARI CONTROLLER
				// MENAMPUNG DATA YANG DIUBAH
				$id		= $_POST['id'];
				$keterangan 	= $_POST['keterangan'];

				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->sk->dataUpdate_sk($id,$keterangan);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES UPDATE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=sk&method=sk'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/UPDATE.PHP
				// JIKA HASIL PROSES UPDATE GAGAL
				else {
					echo "<script> 
						  alert('Proses Update Gagal!');
						  window.location = 'index.php?controller=sk&method=sk'; 
						  </script>";
				}
			}
		
		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function delete_sk() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$id		= $_GET['id'];

				$data = $this->sk->dataDeletesk($id);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  alert('Proses Delete Berhasil!');
						  window.location = 'index.php?controller=sk&method=sk'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script>
							alert('Proses Delete Gagal!'); 
						  window.location = 'index.php?controller=sk&method=sk'; 
						  </script>";
				}
			}

	}
?>