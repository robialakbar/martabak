<?php
	
	// CLASS MODEL PENDUDUK
	class model_kategori extends database {
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			
		
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS KONEKSI 
				parent::__construct();	

			}
			
		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataPangkat() {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM jabatan WHERE jenis ='pangkat'";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}
		
		
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataInsert_Pangkat($pangkat) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "INSERT INTO jabatan VALUES
							   ('','$pangkat','pangkat')";
				
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
			function dataUpdate_Pangkat($pangkat,$pangkat_baru) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "UPDATE jabatan SET
								nama		= '$pangkat_baru'
							   WHERE nama 	= '$pangkat'
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
			function dataDeletePangkat($pangkat) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "DELETE FROM jabatan
							   WHERE nama = '$pangkat'";
				
				$sql		= mysqli_query($koneksi,$query);
				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}


		// QUERY UNTUK MENAMPILKAN DATA (SELECT) DATA JABATAN
			function dataJabatan() {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM jabatan WHERE jenis ='jabatan'";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}
		
		
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataInsert_Jabatan($pangkat) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "INSERT INTO jabatan VALUES
							   ('','$pangkat','jabatan')";
				
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
			function dataUpdate_Jabatan($pangkat,$pangkat_baru) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "UPDATE jabatan SET
								nama		= '$pangkat_baru'
							   WHERE nama 	= '$pangkat'
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
			function dataDeleteJabatan($pangkat) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "DELETE FROM jabatan
							   WHERE nama = '$pangkat'";
				
				$sql		= mysqli_query($koneksi,$query);
				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}

		// QUERY UNTUK MENAMPILKAN DATA (SELECT) DATA JENIS
			function dataJenis() {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM jabatan WHERE jenis ='jenis'";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}
		
		
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataInsert_Jenis($pangkat) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "INSERT INTO jabatan VALUES
							   ('','$pangkat','jenis')";
				
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
			function dataUpdate_Jenis($pangkat,$pangkat_baru) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "UPDATE jabatan SET
								nama		= '$pangkat_baru'
							   WHERE nama 	= '$pangkat'
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
			function dataDeleteJenis($pangkat) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "DELETE FROM jabatan
							   WHERE nama = '$pangkat'";
				
				$sql		= mysqli_query($koneksi,$query);
				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}


		// QUERY UNTUK MENAMPILKAN DATA (SELECT) DATA STATUS
			function dataStatus() {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM jabatan WHERE jenis ='status'";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}
		
		
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataInsert_Status($pangkat) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "INSERT INTO jabatan VALUES
							   ('','$pangkat','status')";
				
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
			function dataUpdate_Status($pangkat,$pangkat_baru) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "UPDATE jabatan SET
								nama		= '$pangkat_baru'
							   WHERE nama 	= '$pangkat'
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
			function dataDeleteStatus($pangkat) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "DELETE FROM jabatan
							   WHERE nama = '$pangkat'";
				
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