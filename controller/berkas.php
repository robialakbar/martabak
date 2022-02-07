<?php
	// INCLUDE KONEKSI DATABASE 
	include ("config/database.php");
	// INCLUDE MODEL DARI FOLDER MODEL 
	include ("model/model_berkas.php");
	include ("model/model_sistem.php");
	
	// CLASS PENDUDUK
	class berkas {
		// PROPERTY
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			public $berkas;
			public $sistem;
			
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS MODEL PENDUDUK
				$this->berkas	= new model_berkas();
				$this->sistem	= new model_sistem();
				
			}
		
			// FUNCTION UNTUK MENANGANI PROSES SELECT
			function select() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$data			        = $this->sistem->dataHome();

				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}
		
		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function insert_berkas() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$nip 			= $_POST['nip'];
				$keterangan		= $_POST['berkas'];
				$tgl 			= $_POST['tgl'];

				$fotox   				= $_FILES['gambar']['name'];
				$lokasi 				= $_FILES['gambar']['tmp_name'];
				$tipe                   = $_FILES['gambar']['type'];

				$foto 					= $nip.'_'.$fotox;
				

				if ($tipe== "image/png") {
					echo "<script> 
							  alert('Tambah lampiran gagal, File PNG tidak Diijinkan');
							  window.location = 'index.php?controller=pegawai&method=berkas&nip=$nip'; 
							  </script>";
				}else{
					// DARI MODEL
					// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
					$data			= $this->berkas->dataInsert($nip,$keterangan,$tgl,$foto,$tipe,$lokasi);
					
					// DARI VIEW
					// MENGARAHKAN KE FILE VIEW/SELECT.PHP
					// JIKA HASIL PROSES INSERT BERHASIL
					if($data 		== TRUE) {
						echo "<script> 
							  window.location = 'index.php?controller=pegawai&method=berkas&nip=$nip'; 
							  </script>";
					
					} 
					// MENGARAHKAN KE FILE VIEW/INSERT.PHP
					// JIKA HASIL PROSES INSERT GAGAL
					else {
						echo "<script> 
							  alert('Proses Insert Gagal!');
							  window.location = 'index.php?controller=pegawai&method=berkas&nip=$nip'; 
							  </script>";
					}
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function ubah_berkas() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$id 			= $_POST['id'];
				$nip 			= $_POST['nip'];
				$keterangan		= $_POST['berkas'];

				$fotox   				= $_FILES['gambar']['name'];
				$lokasi 				= $_FILES['gambar']['tmp_name'];
				$tipe                   = $_FILES['gambar']['type'];

				$foto 					= $nip.'_'.$fotox;

				if ($tipe== "image/png") {
					echo "<script> 
							  alert('Tambah lampiran gagal, File PNG tidak Diijinkan');
							  window.location = 'index.php?controller=pegawai&method=berkas&nip=$nip'; 
							  </script>";
				}else{
					// DARI MODEL
					// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
					$data			= $this->berkas->dataUpdate($id,$nip,$keterangan,$foto,$tipe,$fotox,$lokasi);
					
					// DARI VIEW
					// MENGARAHKAN KE FILE VIEW/SELECT.PHP
					// JIKA HASIL PROSES INSERT BERHASIL
					if($data 		== TRUE) {
						echo "<script> 
							  window.location = 'index.php?controller=pegawai&method=berkas&nip=$nip'; 
							  </script>";
					
					} 
					// MENGARAHKAN KE FILE VIEW/INSERT.PHP
					// JIKA HASIL PROSES INSERT GAGAL
					else {
						echo "<script> 
							  alert('Proses Update Gagal!');
							  window.location = 'index.php?controller=pegawai&method=berkas&nip=$nip'; 
							  </script>";
					}
				}
			}
		
		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function delete() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$nip			= $_GET['nip'];
				$id 			= $_GET['id'];

				$data = $this->berkas->dataDelete($nip,$id);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=pegawai&method=berkas&nip=$nip'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script>
							alert('Proses Delete Gagal!'); 
						  window.location = 'index.php?controller=pegawai&method=berkas&nip=$nip'; 
						  </script>";
				}
			}
	}
?>