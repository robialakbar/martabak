<?php
	// INCLUDE KONEKSI DATABASE 
	include ("config/database.php");
	// INCLUDE MODEL DARI FOLDER MODEL 
	include ("model/model_pegawai.php");
	include ("model/model_sistem.php");
	
	// CLASS PENDUDUK
	class pegawai {
		// PROPERTY
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			public $pegawai;
			public $sistem;
			
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS MODEL PENDUDUK
				$this->pegawai	= new model_pegawai();
				$this->sistem	= new model_sistem();
				
			}
		
			// FUNCTION UNTUK MENANGANI PROSES SELECT
			function select() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$data			        = $this->sistem->dataHome();
				$data_pegawai			= $this->pegawai->dataSelect();

				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function detail() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$nip			= $_GET['nip'];

				$data		 = $this->sistem->dataHome();
				$data_pegawai = $this->pegawai->dataDetail($nip);
			
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES SELECT
			function insert() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$data			        = $this->sistem->dataHome();

				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES SELECT
			function keluarga() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$nip					= $_GET['nip'];


				$data			        = $this->sistem->dataHome();
				$data_detail   			= $this->pegawai->dataDetail($nip);
				$data_keluarga   		= $this->pegawai->dataKeluarga($nip);

				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES SELECT
			function anak() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$nip					= $_GET['nip'];


				$data			        = $this->sistem->dataHome();
				$data_detail   			= $this->pegawai->dataDetail($nip);
				$data_anak   			= $this->pegawai->dataAnak($nip);

				
				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES SELECT
			function gaji() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$nip					= $_GET['nip'];


				$data			        = $this->sistem->dataHome();
				$data_pegawai   			= $this->pegawai->dataDetail($nip);
				$data_pegawai2   			= $this->pegawai->dataDetail($nip);

				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES SELECT
			function berkas() {
				// MODEL
				// MENGARAH KE METHOD DI CLASS MODEL AGAMA
				$nip					= $_GET['nip'];


				$data			        = $this->sistem->dataHome();
				$data_detail   			= $this->pegawai->dataDetail($nip);
				$data_berkas   			= $this->pegawai->dataBerkas($nip);

				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}

		// FUNCTION UNTUK MENANGANI PROSES SELECT
			function info() {
				// MODEL


				$data			        = $this->sistem->dataHome();

				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}
		// FUNCTION UNTUK MENANGANI PROSES SELECT
			function info_gaji() {
				// MODEL


				$data			        = $this->sistem->dataHome();

				// VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				include "view/dashboard.php";
			}
		
		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function insert_data() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$nip 			= $_POST['nip'];
				$nama			= $_POST['nama'];
				$tempat_lahir 	= $_POST['tempat'];
				$tahun			= $_POST['tahun'];
				$bulan 			= $_POST['bulan'];
				$hari 			= $_POST['hari'];
				$tgl_lahir  	= $tahun."-".$bulan."-".$hari;
				$gender			= $_POST['gender'];
				$agama 			= $_POST['agama_pegawai'];
				$kebangsaan 	= $_POST['kebangsaan'];
				$jumlah_keluarga= $_POST['jml_keluarga'];
				$alamat 		= $_POST['alamat'];
				$sk_terakhir 	= $_POST['sk_terakhir'];
				$pangkat 		= $_POST['pangkat'];
				$tmt_golongan	= $_POST['tmt_golongan'];
				$jenis 			= $_POST['jenis_pegawai'];
				$tmt_capeg 		= $_POST['tmt_capeg'];
				$status 		= $_POST['status_pegawai'];
				$jabatan		= $_POST['jabatan'];
				$digaji 		= $_POST['gaji'];
				
				$gaji_pokok1 	= $_POST['gaji_pokok'];
				$gaji_pokok 	= str_replace(".", "", $gaji_pokok1);

				$masa_golongan 	= $_POST['masa_golongan'];
				$masa_keseluruhan= $_POST['masa_keseluruhan'];
				$npwp 			= $_POST['npwp'];
				$rt 			= $_POST['rt'];
				$rw 			= $_POST['rw'];
				$desa 			= $_POST['desa'];
				$kecamatan 		= $_POST['kecamatan'];
				$kabupaten 		= $_POST['kabupaten'];
				$wa             = $_POST['wa'];

				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->pegawai->dataInsert($nip,$nama,$tempat_lahir,$tgl_lahir,$gender,$agama,$kebangsaan,$jumlah_keluarga,$alamat,$sk_terakhir,$pangkat,$tmt_golongan,$jenis,$tmt_capeg,$status,$jabatan,$digaji,$gaji_pokok,$masa_golongan,$masa_keseluruhan,$npwp,$rt,$rw,$desa,$kecamatan,$kabupaten,$wa);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=pegawai&method=select'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Insert Gagal!');
						  window.location = 'index.php?controller=pegawai&method=insert'; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function ubah_data() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$nip 			= $_POST['nip'];
				$nama			= $_POST['nama'];
				$tempat_lahir 	= $_POST['tempat'];
				$tahun			= $_POST['tahun'];
				$bulan 			= $_POST['bulan'];
				$hari 			= $_POST['hari'];
				$tgl_lahir  	= $tahun."-".$bulan."-".$hari;
				$gender			= $_POST['gender'];
				$agama 			= $_POST['agama_pegawai'];
				$kebangsaan 	= $_POST['kebangsaan'];
				$jumlah_keluarga= $_POST['jml_keluarga'];
				$alamat 		= $_POST['alamat'];
				$sk_terakhir 	= $_POST['sk_terakhir'];
				$pangkat 		= $_POST['pangkat'];
				$tmt_golongan	= $_POST['tmt_golongan'];
				$jenis 			= $_POST['jenis_pegawai'];
				$tmt_capeg 		= $_POST['tmt_capeg'];
				$status 		= $_POST['status_pegawai'];
				$jabatan		= $_POST['jabatan'];
				$digaji 		= $_POST['gaji'];

				$gaji_pokok1 	= $_POST['gaji_pokok'];
				$gaji_pokok 	= str_replace(".", "", $gaji_pokok1);

				$penghasilan1 	= $_POST['penghasilan'];
				$penghasilan 	= str_replace(".", "", $penghasilan1);


				$masa_golongan 	= $_POST['masa_golongan'];
				$masa_keseluruhan= $_POST['masa_keseluruhan'];
				$npwp 			= $_POST['npwp'];
				$rt 			= $_POST['rt'];
				$rw 			= $_POST['rw'];
				$desa 			= $_POST['desa'];
				$kecamatan 		= $_POST['kecamatan'];
				$kabupaten 		= $_POST['kabupaten'];
				$wa             = $_POST['wa'];

				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data			= $this->pegawai->dataUpdate($nip,$nama,$tempat_lahir,$tgl_lahir,$gender,$agama,$kebangsaan,$jumlah_keluarga,$alamat,$sk_terakhir,$pangkat,$tmt_golongan,$jenis,$tmt_capeg,$status,$jabatan,$digaji,$gaji_pokok,$penghasilan,$masa_golongan,$masa_keseluruhan,$npwp,$rt,$rw,$desa,$kecamatan,$kabupaten,$wa);
				
				// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES INSERT BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=pegawai&method=detail&nip=$nip'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Update Gagal!');
						  window.location = 'index.php?controller=pegawai&method=detail&nip=$nip'; 
						  </script>";
				}
			}
		
		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function delete() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$nip			= $_GET['nip'];

				$data = $this->pegawai->dataDelete($nip);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=pegawai&method=select'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script>
							alert('Proses Delete Gagal!'); 
						  window.location = 'index.php?controller=pegawai&method=select'; 
						  </script>";
				}
			}

		// Bagian Keluarga
		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function insert_keluarga() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$nip 			= $_POST['nip'];
				$nama			= $_POST['nama'];
				$tempat_lahir 	= $_POST['tempat'];
				$tahun			= $_POST['tahun'];
				$bulan 			= $_POST['bulan'];
				$hari 			= $_POST['hari'];
				$tgl_lahir  	= $tahun."-".$bulan."-".$hari;
				$pekerjaan 		= $_POST['pekerjaan'];
				$tgl_perkawinan = $_POST['tgl_perkawinan'];
				$ke				= $_POST['ke'];
				$nik 		    = $_POST['nik'];
				$penghasilan	= $_POST['penghasilan'];
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data_insert			= $this->pegawai->dataInsertKeluarga($nip,$nama,$tempat_lahir,$tgl_lahir,$nik,$pekerjaan,$tgl_perkawinan,$ke,$penghasilan);
				
				// DARI VIEW
				if($data_insert 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=pegawai&method=keluarga&nip=$nip';
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Insert Gagal!');
						  window.location = 'index.php?controller=pegawai&method=keluarga&nip='.$nip; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES Update
			function ubah_keluarga() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$id				= $_POST['id'];
				$nip 			= $_POST['nip'];
				$nama			= $_POST['nama'];
				$tempat_lahir 	= $_POST['tempat'];
				$tahun			= $_POST['tahun'];
				$bulan 			= $_POST['bulan'];
				$hari 			= $_POST['hari'];
				$tgl_lahir  	= $tahun."-".$bulan."-".$hari;
				$pekerjaan 		= $_POST['pekerjaan'];
				$tgl_perkawinan = $_POST['tgl_perkawinan'];
				$ke				= $_POST['ke'];
				$nik 		    = $_POST['nik'];
				$penghasilan	= $_POST['penghasilan'];
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data_insert			= $this->pegawai->dataUpdateKeluarga($id,$nama,$tempat_lahir,$tgl_lahir,$nik,$pekerjaan,$tgl_perkawinan,$ke,$penghasilan);
				
				// DARI VIEW
				if($data_insert 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=pegawai&method=keluarga&nip=$nip';
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Update Gagal!');
						  window.location = 'index.php?controller=pegawai&method=keluarga&nip=$nip'; 
						  </script>";
				}
			}
		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function delete_keluarga() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$id			= $_GET['id'];
				$nip		= $_GET['nip'];

				$data = $this->pegawai->dataDeleteKeluarga($id);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=pegawai&method=keluarga&nip=$nip'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script>
							alert('Proses Delete Gagal!'); 
						  window.location = 'index.php?controller=pegawai&method=keluarga&nip=$nip'; 
						  </script>";
				}
			}



		// Bagian Keluarga
		// FUNCTION UNTUK MENANGANI PROSES INSERT KE TABEL
			function insert_anak() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$nip 			= $_POST['nip'];
				$nama			= $_POST['nama'];
				$tempat_lahir 	= $_POST['tempat'];
				$tahun			= $_POST['tahun'];
				$bulan 			= $_POST['bulan'];
				$hari 			= $_POST['tgl'];
				$tgl_lahir  	= $tahun."-".$bulan."-".$hari;
				$kawin			= $_POST['kawin'];
				$tunjangan		= $_POST['tunjangan'];
				$ke				= $_POST['ke'];
				$status 		= $_POST['status'];
				$bekerja 		= $_POST['bekerja'];
				$sekolah		= $_POST['sekolah'];
				$putusan 		= $_POST['putusan'];
				$gender 		= $_POST['gender'];
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data_insert			= $this->pegawai->dataInsertAnak($nip,$nama,$tempat_lahir,$tgl_lahir,$status,$ke,$gender,$tunjangan,$kawin,$bekerja,$sekolah,$putusan);
				
				// DARI VIEW
				if($data_insert 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=pegawai&method=anak&nip=$nip';
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Insert Gagal!');
						  window.location = 'index.php?controller=pegawai&method=anak&nip='.$nip; 
						  </script>";
				}
			}

		// FUNCTION UNTUK MENANGANI PROSES Update
			function ubah_anak() {
				// DARI VIEW
				// MENAMPUNG DATA YANG DIINPUTKAN
				$id				= $_POST['id'];
				$nip 			= $_POST['nip'];
				$nama			= $_POST['nama'];
				$tempat_lahir 	= $_POST['tempat'];
				$tahun			= $_POST['tahun'];
				$bulan 			= $_POST['bulan'];
				$hari 			= $_POST['tgl'];
				$tgl_lahir  	= $tahun."-".$bulan."-".$hari;
				$kawin			= $_POST['kawin'];
				$tunjangan		= $_POST['tunjangan'];
				$ke				= $_POST['ke'];
				$status 		= $_POST['status'];
				$bekerja 		= $_POST['bekerja'];
				$sekolah		= $_POST['sekolah'];
				$putusan 		= $_POST['putusan'];
				$gender 		= $_POST['gender'];
				
				// DARI MODEL
				// MENGARAH KE METHOD DI CLASS MODEL PENDUDUK
				$data_insert			= $this->pegawai->dataUbahAnak($id,$nip,$nama,$tempat_lahir,$tgl_lahir,$status,$ke,$gender,$tunjangan,$kawin,$bekerja,$sekolah,$putusan);
				
				// DARI VIEW
				if($data_insert 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=pegawai&method=anak&nip=$nip';
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/INSERT.PHP
				// JIKA HASIL PROSES INSERT GAGAL
				else {
					echo "<script> 
						  alert('Proses Update Gagal!');
						  window.location = 'index.php?controller=pegawai&method=anak&nip=$nip'; 
						  </script>";
				}
			}
		// FUNCTION UNTUK MENANGANI PROSES DELETE
			function delete_anak() {
				// DARI CONTROLLER
				// MENANGKAP NILAI NIK
				$id			= $_GET['id'];
				$nip		= $_GET['nip'];

				$data = $this->pegawai->dataDeleteAnak($id);
			
				/// DARI VIEW
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE BERHASIL
				if($data 		== TRUE) {
					echo "<script> 
						  window.location = 'index.php?controller=pegawai&method=anak&nip=$nip'; 
						  </script>";
				
				} 
				// MENGARAHKAN KE FILE VIEW/SELECT.PHP
				// JIKA HASIL PROSES DELETE GAGAL
				else {
					echo "<script>
							alert('Proses Delete Gagal!'); 
						  window.location = 'index.php?controller=pegawai&method=anak&nip=$nip'; 
						  </script>";
				}
			}
	}
?>