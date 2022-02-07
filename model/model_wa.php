<?php
	
	// CLASS MODEL PENDUDUK
	class model_wa extends database {
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
				$query			= "SELECT * FROM wa";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}

		// QUERY UNTUK MELAKUKAN VALIDASI LOGIN
			function dataValidasi() {
				// SQL
				$koneksi = $this->koneksi;

				$query 		= "SELECT * FROM wa";
							   
				$sql		= mysqli_query($koneksi,$query);
				$data 		= mysqli_fetch_array($sql);

				// CEK 
				if($data > 0) {
					return $data;
				}
				else {
					return FALSE;
				}

			}

		// QUERY UNTUK MENGUBAH DATA (UPDATE)
			function dataUpdate($token) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "UPDATE wa SET
								token					= '$token'
							   WHERE id	= '1'
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
		

	}
?>