<?php
	
	// CLASS MODEL PENDUDUK
	class model_pegawai extends database {
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			
		
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS KONEKSI 
				parent::__construct();	

			}
			
		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataSelect() {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM pegawai 
							   		ORDER BY id ASC";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}

		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataDetail($nip) {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM pegawai WHERE nip ='$nip'";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}

		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataKeluarga($nip) {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM keluarga WHERE nip ='$nip'";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}

		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataAnak($nip) {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM anak WHERE nip ='$nip'";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}
		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataGaji($nip) {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM gaji WHERE nip ='$nip'";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}

		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataBerkas($nip) {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM berkas WHERE nip ='$nip' ORDER BY id DESC";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}
		
		
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataInsert($nip,$nama,$tempat_lahir,$tgl_lahir,$gender,$agama,$kebangsaan,$jumlah_keluarga,$alamat,$sk_terakhir,$pangkat,$tmt_golongan,$jenis,$tmt_capeg,$status,$jabatan,$digaji,$gaji_pokok,$masa_golongan,$masa_keseluruhan,$npwp,$rt,$rw,$desa,$kecamatan,$kabupaten,$wa) {
				$koneksi = $this->koneksi;
				// SQL

				$asc			= "SELECT * FROM pegawai 
							   		ORDER BY id DESC";
				
				$cek_sql		= mysqli_query($koneksi,$asc);
				$idx 			= mysqli_fetch_array($cek_sql);
				$id 			= $idx['id']+1;

				$query		= "INSERT INTO pegawai VALUES
							   ('$id','$nip','$nama','$tempat_lahir','$tgl_lahir','$gender','$agama','$kebangsaan','$jumlah_keluarga','$alamat','$sk_terakhir','$pangkat','$tmt_golongan','$jenis','$tmt_capeg','$status','$jabatan','$digaji','$gaji_pokok','0','$masa_golongan','$masa_keseluruhan','$npwp','$rt','$rw','$desa','$kecamatan','$kabupaten','$wa')";
				
				$sql		= mysqli_query($koneksi,$query);
				
				$mutasi 	= "INSERT INTO mutasi VALUES
								('$nip','','','','','','','','')";
				$sql_mutasi	= mysqli_query($koneksi,$mutasi);

				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
				// CEK SQL
				if($sql_mutasi == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}
		
		// QUERY UNTUK MENGUBAH DATA (UPDATE)
			function dataUpdate($nip,$nama,$tempat_lahir,$tgl_lahir,$gender,$agama,$kebangsaan,$jumlah_keluarga,$alamat,$sk_terakhir,$pangkat,$tmt_golongan,$jenis,$tmt_capeg,$status,$jabatan,$digaji,$gaji_pokok,$penghasilan,$masa_golongan,$masa_keseluruhan,$npwp,$rt,$rw,$desa,$kecamatan,$kabupaten,$wa) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "UPDATE pegawai SET
								nama						= '$nama',
								tempat_lahir 				= '$tempat_lahir',
								tgl_lahir 					= '$tgl_lahir',
								gender 						= '$gender',
								agama 						= '$agama',
								kebangsaan 					= '$kebangsaan',
								jumlah_keluarga				= '$jumlah_keluarga',
								alamat						= '$alamat',
								sk_terakhir 				= '$sk_terakhir',
								pangkat 					= '$pangkat',
								tmt_golongan				= '$tmt_golongan',
								jenis_pegawai 				= '$jenis',
								tmt_capeg 					= '$tmt_capeg',
								status_pegawai 				= '$status',
								jabatan 					= '$jabatan',
								digaji_menurut				= '$digaji',
								gaji_pokok					= '$gaji_pokok',
								besarnya_penghasilan 		= '$penghasilan',
								masa_kerja_golongan		= '$masa_golongan',
								masa_kerja_keseluruhan 	= '$masa_keseluruhan',
								npwp 						= '$npwp',
								rt 							= '$rt',
								rw 							= '$rw',
								desa 						= '$desa',
								kecamatan 					= '$kecamatan',
								kabupaten 					= '$kabupaten',
								wa                          = '$wa'
							   WHERE nip	= '$nip'
							   ";
				
				$sql		= mysqli_query($koneksi,$query);
				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}
		
		// QUERY UNTUK MENGHAPUS DATA (DELETE)
			function dataDelete($nip) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "DELETE FROM pegawai
							   WHERE nip = '$nip'";

				$query2		= "DELETE FROM keluarga
							   WHERE nip = '$nip'";

				$query3		= "DELETE FROM anak
							   WHERE nip = '$nip'";

				$query4		= "DELETE FROM gaji
							   WHERE nip = '$nip'";

				//gambar
				$query_hps  = "SELECT * FROM berkas WHERE nip ='$nip'";
					$sql_hps= mysqli_query($koneksi,$query_hps);
					while($dt  	= mysqli_fetch_array($sql_hps)){

					if($dt['foto']=="")
					{

					}else
					  {
					  //nama field foto
						$tag		= $dt['foto'];
						// alamat folder foto
						$hapus		= "logo/$tag";
						// script hapus gambar dari foleder
						
						unlink($hapus);
					   }
					}

				$query5		= "DELETE FROM berkas
							   WHERE nip = '$nip'";
				
				$sql		= mysqli_query($koneksi,$query);
				$sql2		= mysqli_query($koneksi,$query2);
				$sql3		= mysqli_query($koneksi,$query3);
				$sql4		= mysqli_query($koneksi,$query4);
				$sql5		= mysqli_query($koneksi,$query5);

				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
				if($sql2 == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
				if($sql3 == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
				if($sql4 == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
				if($sql5 == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}


		//Bagian Keluarga
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataInsertKeluarga($nip,$nama,$tempat_lahir,$tgl_lahir,$nik,$pekerjaan,$tgl_perkawinan,$ke,$penghasilan) {
				$koneksi = $this->koneksi;
				// SQL
				$q1 	= mysqli_query($koneksi,"SELECT * FROM keluarga ORDER BY id DESC");
				$dt 	= mysqli_fetch_array($q1);
				$id		= $dt['id']+1;

				$query		= "INSERT INTO keluarga VALUES
							   ('$id','$nip','$nama','$tempat_lahir','$tgl_lahir','$nik','$pekerjaan','$tgl_perkawinan','$ke','$penghasilan')";
				
				$sql		= mysqli_query($koneksi,$query);
				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataUpdateKeluarga($id,$nama,$tempat_lahir,$tgl_lahir,$nik,$pekerjaan,$tgl_perkawinan,$ke,$penghasilan) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "UPDATE keluarga SET
								nama		= '$nama',
								tempat 		= '$tempat_lahir',
								tgl_lahir   = '$tgl_lahir',
								nik 		= '$nik',
								pekerjaan 	= '$pekerjaan',
								tgl_nikah 	= '$tgl_perkawinan',
								ke 			= '$ke',
								penghasilan = '$penghasilan'
							   WHERE id	= '$id'
							   ";
				
				$sql		= mysqli_query($koneksi,$query);
				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}
			// QUERY UNTUK MENGHAPUS DATA (DELETE)
			function dataDeleteKeluarga($id) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "DELETE FROM keluarga
							   WHERE id = '$id'";
				
				$sql		= mysqli_query($koneksi,$query);
				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}


		//Bagian Anak
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataInsertAnak($nip,$nama,$tempat_lahir,$tgl_lahir,$status,$ke,$gender,$tunjangan,$kawin,$bekerja,$sekolah,$putusan) {
				$koneksi = $this->koneksi;
				// SQL
				$q1 	= mysqli_query($koneksi,"SELECT * FROM anak ORDER BY id DESC");
				$dt 	= mysqli_fetch_array($q1);
				$id		= $dt['id']+1;

				$query		= "INSERT INTO anak VALUES
							   ('$id','$nip','$nama','$tempat_lahir','$tgl_lahir','$status','$ke','$gender','$tunjangan','$kawin','$bekerja','$sekolah','$putusan')";
				
				$sql		= mysqli_query($koneksi,$query);
				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataUbahAnak($id,$nip,$nama,$tempat_lahir,$tgl_lahir,$status,$ke,$gender,$tunjangan,$kawin,$bekerja,$sekolah,$putusan) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "UPDATE anak SET
								nama			= '$nama',
								tempat 			= '$tempat_lahir',
								tanggal_lahir   = '$tgl_lahir',
								status 			= '$status',
								ke 				= '$ke',
								gender 			= '$gender',
								tunjangan 		= '$tunjangan',
								kawin 			= '$kawin',
								bekerja 		= '$bekerja',
								sekolah 		= '$sekolah',
								putusan 		= '$putusan'
							   WHERE id	= '$id'
							   ";
				
				$sql		= mysqli_query($koneksi,$query);
				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}
			// QUERY UNTUK MENGHAPUS DATA (DELETE)
			function dataDeleteAnak($id) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "DELETE FROM anak
							   WHERE id = '$id'";
				
				$sql		= mysqli_query($koneksi,$query);
				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}
	}
?>