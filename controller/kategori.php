<?php
	// INCLUDE KONEKSI DATABASE 
	include ("config/database.php");
	// INCLUDE MODEL DARI FOLDER MODEL 
	include ("model/model_kategori.php");
	include ("model/model_sistem.php");
	
	// CLASS PENDUDUK
	class kategori {
		// PROPERTY
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			public $kategori;
			public $sistem;
			
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS MODEL PENDUDUK
				$this->kategori	= new model_kategori();
				$this->sistem	= new model_sistem();
				
			}
		
			// FUNCTION UNTUK MENANGANI PROSES SELECT
			function pangkat() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$data			        = $this->sistem->dataHome();
				$data_pangkat			= $this->kategori->dataPangkat();

				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function insert_pangkat() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$pangkat		= $_POST['pangkat'];
				
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->kategori->dataInsert_Pangkat($pangkat);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data 		== TRUE) {
					echo "<script>
						  window.location = 'index.php?controller=kategori&method=pangkat'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Insert Gagal!');
						  window.location = 'index.php?controller=kategori&method=pangkat'; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function update_pangkat() {
				// DARI CONTROLLER
				// MENAMPUNG DATA YANG DIUBAH
				$pangkat		= $_POST['pangkat'];
				$pangkat_baru		= $_POST['pangkat_baru'];

				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->kategori->dataUpdate_Pangkat($pangkat,$pangkat_baru);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES UPDATE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=kategori&method=pangkat'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/UPDATE.PHP
				// JIKA HASIL PROSES UPDATE GAGAL
				else {
					echo "<script> 
						  alert('Proses Update Gagal!');
						  window.location = 'index.php?controller=kategori&method=pangkat'; 
						  </script>";
				}
			}
		
		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function delete_pangkat() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$pangkat			= $_GET['nama'];

				$data = $this->kategori->dataDeletePangkat($pangkat);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  alert('Proses Delete Berhasil!');
						  window.location = 'index.php?controller=kategori&method=pangkat'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script>
							alert('Proses Delete Gagal!'); 
						  window.location = 'index.php?controller=kategori&method=pangkat'; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES SELECT
			function jabatan() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$data			        = $this->sistem->dataHome();
				$data_jabatan			= $this->kategori->dataJabatan();

				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function insert_jabatan() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$pangkat		= $_POST['jabatan'];
				
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->kategori->dataInsert_Jabatan($pangkat);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data 		== TRUE) {
					echo "<script>
						  window.location = 'index.php?controller=kategori&method=jabatan'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Insert Gagal!');
						  window.location = 'index.php?controller=kategori&method=jabatan'; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function update_Jabatan() {
				// DARI CONTROLLER
				// MENAMPUNG DATA YANG DIUBAH
				$pangkat		= $_POST['jabatan'];
				$pangkat_baru		= $_POST['jabatan_baru'];

				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->kategori->dataUpdate_Jabatan($pangkat,$pangkat_baru);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES UPDATE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=kategori&method=jabatan'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/UPDATE.PHP
				// JIKA HASIL PROSES UPDATE GAGAL
				else {
					echo "<script> 
						  alert('Proses Update Gagal!');
						  window.location = 'index.php?controller=kategori&method=jabatan'; 
						  </script>";
				}
			}
		
		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function delete_Jabatan() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$pangkat			= $_GET['nama'];

				$data = $this->kategori->dataDeleteJabatan($pangkat);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  alert('Proses Delete Berhasil!');
						  window.location = 'index.php?controller=kategori&method=jabatan'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script>
							alert('Proses Delete Gagal!'); 
						  window.location = 'index.php?controller=kategori&method=jabatan'; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES SELECT
			function jenis() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$data			        = $this->sistem->dataHome();
				$data_jenis			= $this->kategori->dataJenis();

				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function insert_jenis() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$pangkat		= $_POST['jenis'];
				
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->kategori->dataInsert_Jenis($pangkat);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data 		== TRUE) {
					echo "<script>
						  window.location = 'index.php?controller=kategori&method=jenis'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Insert Gagal!');
						  window.location = 'index.php?controller=kategori&method=jenis'; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function update_jenis() {
				// DARI CONTROLLER
				// MENAMPUNG DATA YANG DIUBAH
				$pangkat		= $_POST['jenis'];
				$pangkat_baru		= $_POST['jenis_baru'];

				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->kategori->dataUpdate_Jenis($pangkat,$pangkat_baru);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES UPDATE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=kategori&method=jenis'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/UPDATE.PHP
				// JIKA HASIL PROSES UPDATE GAGAL
				else {
					echo "<script> 
						  alert('Proses Update Gagal!');
						  window.location = 'index.php?controller=kategori&method=jenis'; 
						  </script>";
				}
			}
		
		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function delete_jenis() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$pangkat			= $_GET['nama'];

				$data = $this->kategori->dataDeleteJenis($pangkat);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  alert('Proses Delete Berhasil!');
						  window.location = 'index.php?controller=kategori&method=jenis'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script>
							alert('Proses Delete Gagal!'); 
						  window.location = 'index.php?controller=kategori&method=jenis'; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES SELECT
			function status() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$data			        = $this->sistem->dataHome();
				$data_status		= $this->kategori->dataStatus();

				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function insert_status() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$pangkat		= $_POST['status'];
				
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->kategori->dataInsert_Status($pangkat);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data 		== TRUE) {
					echo "<script>
						  window.location = 'index.php?controller=kategori&method=status'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Insert Gagal!');
						  window.location = 'index.php?controller=kategori&method=status'; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function update_status() {
				// DARI CONTROLLER
				// MENAMPUNG DATA YANG DIUBAH
				$pangkat		= $_POST['status'];
				$pangkat_baru		= $_POST['status_baru'];

				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->kategori->dataUpdate_Status($pangkat,$pangkat_baru);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES UPDATE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=kategori&method=status'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/UPDATE.PHP
				// JIKA HASIL PROSES UPDATE GAGAL
				else {
					echo "<script> 
						  alert('Proses Update Gagal!');
						  window.location = 'index.php?controller=kategori&method=status'; 
						  </script>";
				}
			}
		
		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function delete_status() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$pangkat			= $_GET['nama'];

				$data = $this->kategori->dataDeleteStatus($pangkat);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  alert('Proses Delete Berhasil!');
						  window.location = 'index.php?controller=kategori&method=status'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script>
							alert('Proses Delete Gagal!'); 
						  window.location = 'index.php?controller=kategori&method=status'; 
						  </script>";
				}
			}
	}
?>