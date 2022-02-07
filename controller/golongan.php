<?php
	// INCLUDE KONEKSI DATABASE 
	include ("config/database.php");
	// INCLUDE MODEL DARI FOLDER MODEL 
	include ("model/model_golongan.php");
	include ("model/model_sistem.php");
	
	// CLASS PENDUDUK
	class golongan {
		// PROPERTY
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			public $golongan;
			public $sistem;
			
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS MODEL PENDUDUK
				$this->golongan	= new model_golongan();
				$this->sistem	= new model_sistem();
				
			}
		
			// FUNCTION UNTUK MENANGANI PROSES SELECT
			function golongan() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$data			        = $this->sistem->dataHome();
				$data_golongan			= $this->golongan->datagolongan();

				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function insert_golongan() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$golongan		= $_POST['golongan'];
				$keterangan 	= $_POST['keterangan'];
				
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->golongan->dataInsert_golongan($golongan,$keterangan);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data 		== TRUE) {
					echo "<script>
						  window.location = 'index.php?controller=golongan&method=golongan'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Insert Gagal!');
						  window.location = 'index.php?controller=golongan&method=golongan'; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function update_golongan() {
				// DARI CONTROLLER
				// MENAMPUNG DATA YANG DIUBAH
				$golongan		= $_POST['golongan'];
				$golongan_baru	= $_POST['golongan_baru'];
				$keterangan 	= $_POST['keterangan'];

				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->golongan->dataUpdate_golongan($golongan,$golongan_baru,$keterangan);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES UPDATE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=golongan&method=golongan'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/UPDATE.PHP
				// JIKA HASIL PROSES UPDATE GAGAL
				else {
					echo "<script> 
						  alert('Proses Update Gagal!');
						  window.location = 'index.php?controller=golongan&method=golongan'; 
						  </script>";
				}
			}
		
		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function delete_golongan() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$golongan			= $_GET['golongan'];

				$data = $this->golongan->dataDeletegolongan($golongan);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  alert('Proses Delete Berhasil!');
						  window.location = 'index.php?controller=golongan&method=golongan'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script>
							alert('Proses Delete Gagal!'); 
						  window.location = 'index.php?controller=golongan&method=golongan'; 
						  </script>";
				}
			}

	}
?>