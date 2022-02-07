<?php
	
	// CLASS MODEL PENDUDUK
	class model_sk extends database {
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			
		
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS KONEKSI 
				parent::__construct();	

			}
			
		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function datask() {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM sk";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}
		
		
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataInsert_sk($keterangan) {
				$koneksi = $this->koneksi;

				// SQL
				$query		= "INSERT INTO sk VALUES
							   ('','$keterangan')";
				
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
			function dataUpdate_sk($id,$keterangan) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "UPDATE sk SET
								keterangan 		= '$keterangan'
							   WHERE id 	= '$id'
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
			function dataDeletesk($id) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "DELETE FROM sk
							   WHERE id= '$id'";
				
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