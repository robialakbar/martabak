<?php
	
	// CLASS MODEL PENDUDUK
	class model_mutasi extends database {
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
				$query			= "SELECT * FROM pegawai ORDER BY id ASC";
				
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
		
		// QUERY UNTUK MENGUBAH DATA (UPDATE)
			function dataUpdate($nip,$pangkat,$tmt_pangkat,$gaji,$tmt_gaji,$pensiun,$tmt_pensiun,$ijasah,$tmt_ijasah) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "UPDATE mutasi SET
								kenaikan_pangkat		= '$pangkat',
								tmt_kenaikan 			= '$tmt_pangkat',
								kenaikan_gaji 			= '$gaji',
								tmt_gaji				= '$tmt_gaji',
								pensiun 				= '$pensiun',
								tmt_pensiun 			= '$tmt_pensiun',
								ijasah 					= '$ijasah',
								tmt_ijasah 				= '$tmt_ijasah'
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
				$query		= "DELETE FROM mutasi
							   WHERE nip = '$nip'";
				
				$sql		= mysqli_query($koneksi,$query);
				$sql2		= mysqli_query($koneksi,$query2);
				$sql3		= mysqli_query($koneksi,$query3);
				
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
			}

	}
?>