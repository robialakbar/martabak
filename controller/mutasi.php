<?php
	// INCLUDE KONEKSI DATABASE 
	include ("config/database.php");
	// INCLUDE MODEL DARI FOLDER MODEL 
	include ("model/model_mutasi.php");
	include ("model/model_sistem.php");

	
	// CLASS PENDUDUK
	class mutasi {
		// PROPERTY
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			public $mutasi;
			public $sistem;
			
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS MODEL PENDUDUK
				$this->mutasi	= new model_mutasi();
				$this->sistem	= new model_sistem();
				
			}
		
			// FUNCTION UNTUK MENANGANI PROSES SELECT
			function select() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$data			        = $this->sistem->dataHome();
				$data_pegawai				= $this->mutasi->dataSelect();

				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function detail() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$nip			= $_GET['nip'];

				$data		 	= $this->sistem->dataHome();
				$data_pegawai 	= $this->mutasi->dataDetail($nip);
			
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function update_mutasi() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$nip 				= $_POST['nip'];
				$pangkat 			= $_POST['pangkat'];
				$bln 				= $_POST['bulan'];
				$thn 				= $_POST['tahun'];
				$tmt_pangkat 		= $thn."-".$bln."-1";
				$gajix 				= $_POST['gaji'];
				$gaji 				= str_replace(".", "", $gajix);
				$tmt_gaji 			= $_POST['tmt_gaji'];
				$pensiun 			= $_POST['pensiun'];
				$tmt_pensiun 		= $_POST['tmt_pensiun'];
				$ijasah 			= $_POST['ijasah'];
				$tmt_ijasah 		= $_POST['tmt_ijasah'];

				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->mutasi->dataUpdate($nip,$pangkat,$tmt_pangkat,$gaji,$tmt_gaji,$pensiun,$tmt_pensiun,$ijasah,$tmt_ijasah);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=mutasi&method=select'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Update Gagal!');
						  window.location = 'index.php?controller=mutasi&method=select'; 
						  </script>";
				}
			}
		
		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function delete() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$nip			= $_GET['nip'];

				$data = $this->mutasi->dataDelete($nip);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=mutasi&method=select'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script>
							alert('Proses Delete Gagal!'); 
						  window.location = 'index.php?controller=mutasi&method=select'; 
						  </script>";
				}
			}
	}
?>