<?php
	
	// CLASS MODEL PENDUDUK
	class model_golongan extends database {
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			
		
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS KONEKSI 
				parent::__construct();	

			}
			
		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function datagolongan() {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM golongan";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}
		
		
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataInsert_golongan($golongan,$keterangan) {
				$koneksi = $this->koneksi;

				// SQL
				$query		= "INSERT INTO golongan VALUES
							   ('$golongan','$keterangan')";
				
				$sql		= mysqli_query($koneksi,$query);
				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}
		
		// QUERY UNTUK MENGUBAH DATA (UPDATE)
			function dataUpdate_golongan($golongan,$golongan_baru,$keterangan) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "UPDATE golongan SET
								golongan		= '$golongan_baru',
								keterangan 		= '$keterangan'
							   WHERE golongan 	= '$golongan'
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
			function dataDeletegolongan($golongan) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "DELETE FROM golongan
							   WHERE golongan = '$golongan'";
				
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