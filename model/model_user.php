<?php
	
	// CLASS MODEL PENDUDUK
	class model_user extends database{
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			
		
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS KONEKSI 
				parent::__construct();	

			}

		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataCekNip($nip) {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM user WHERE nip ='$nip' AND status='Aktif'";
				
				$sql		= mysqli_query($koneksi,$query);
				$data 		= mysqli_fetch_array($sql);
				$num		= mysqli_num_rows($sql);

				// CEK 
				if($num > 0) {
					return $data;
				}
				else {
					return FALSE;
				}
			}

		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataSelect() {
			}

		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataUser() {
				
				$koneksi = $this->koneksi;
				
				$query		= "SELECT * FROM user ORDER BY level ASC";
				
				$sql		= mysqli_query($koneksi,$query);
				
				return $sql;
			}
		
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataInsert($username,$nip,$pswd,$nama,$level,$gender) {

				$koneksi = $this->koneksi;
				// SQL
				$query		= "INSERT INTO user VALUES
							   ('$username','$nip','$pswd','$nama','$level','$gender','','Aktif')";
				
				$sql		= mysqli_query($koneksi,$query);
				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}
		
		// QUERY UNTUK MENAMPILKAN DETAIL DATA (DETAIL)
			function dataDetail($username) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "SELECT * FROM user
							   WHERE username = '$username'";
				
				$sql		= mysqli_query($koneksi,$query);
				
				return $sql;
			}


		// QUERY UNTUK MENAMPILKAN DETAIL DATA (DETAIL)
			function dataCek($username) {

				$koneksi = $this->koneksi;
				// SQL
				$query	= "SELECT * FROM user WHERE username = '$username'";

				$sql		= mysqli_query($koneksi,$query);
				$data 		= mysqli_fetch_array($sql);
				$num		= mysqli_num_rows($sql);

				// CEK 
				if($num > 0) {
					return $data;
				}
				else {
					return FALSE;
				}
			}

		// QUERY UNTUK MENGUBAH DATA (UPDATE)
			function dataUpdatePassword($username,$password_baru) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "UPDATE user SET
								password		= '$password_baru'
							   WHERE username	= '$username'";
				
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
			function dataUpdate($username,$nama,$foto,$gender,$lokasi,$fotox) {
				$koneksi = $this->koneksi;

				if(empty($fotox))
				  {
				// SQL
				$query		= "UPDATE user SET
								nama            = '$nama',
								gender 			= '$gender'
							   WHERE username	= '$username'
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
			 else
			 	{
				// SQL
					$query2  = "SELECT * FROM user WHERE username = '$username'";
					$sql2	= mysqli_query($koneksi,$query2);
					$dt  	= mysqli_fetch_array($sql2);

					if($dt['foto']=="")
					{	
						move_uploaded_file($lokasi, "logo/".$foto);
					}else
					  {
					  //nama field foto
						$tag		= $dt['foto'];
						// alamat folder foto
						$hapus		= "logo/$tag";
						// script hapus gambar dari foleder
						
						unlink($hapus);
						// simpan foto baru
						move_uploaded_file($lokasi, "logo/".$foto);
					}

					//SQL
					$query3 	= "UPDATE user SET
								nama            = '$nama',
								foto 			= '$foto',
								gender 			= '$gender'
							   WHERE username	= '$username'";

					$sql3		= mysqli_query($koneksi,$query3);
					// CEK SQL
						if($sql3 == TRUE) {
							return TRUE;
						} 
						else {
							return FALSE;
						}
					}
			}

		// QUERY UNTUK MENGHAPUS DATA (DELETE)
			function UpdateDataPengguna($username,$nip,$nama,$level,$foto,$gender,$lokasi) {
				$koneksi = $this->koneksi;


				if(empty($fotox))
				  {
					$query 	= "UPDATE user SET
								nip 			= '$nip',
								nama            = '$nama',
								level 			= '$level',
								gender 			= '$gender'
							   WHERE username	= '$username'";

					$sql		= mysqli_query($koneksi,$query);
					// CEK SQL
					if($sql == TRUE) {
						return TRUE;
					} 
					else {
						return FALSE;
					}
				  }
				else
				  {
				// SQL
					$query2  = "SELECT * FROM user WHERE username = '$username'";
					$sql2	= mysqli_query($koneksi,$query2);
					$dt  	= mysqli_fetch_array($sql2);

					
					if($dt['foto']=="")
					{
						move_uploaded_file($lokasi, "logo/".$foto);
					}else
					  {
					  //nama field foto
						$tag		= $dt['foto'];
						// alamat folder foto
						$hapus		= "logo/$tag";
						// script hapus gambar dari foleder
						unlink($hapus);
						// simpan foto baru
						move_uploaded_file($lokasi, "logo/".$foto);
					}
					

					//SQL
					$query3 	= "UPDATE user SET
								nama            = '$nama',
								level 			= '$level',
								foto 			= '$foto',
								gender 			= '$gender'
							   WHERE username	= '$username'";

					$sql3		= mysqli_query($koneksi,$query3);
					// CEK SQL
						if($sql3 == TRUE) {
							return TRUE;
						} 
						else {
							return FALSE;
						}
					}
			}

			// QUERY UNTUK MENGHAPUS DATA (DELETE)
			function dataOff($username) {
				$koneksi = $this->koneksi;
				// SQL

				$query		= "UPDATE user SET
								status    = 'Tidak Aktif'
							   WHERE username = '$username'";
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
			function dataOn($username) {
				$koneksi = $this->koneksi;
				// SQL

				$query		= "UPDATE user SET
								status    = 'Aktif'
							   WHERE username = '$username'";
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
			function dataDelete($username) {
				$koneksi = $this->koneksi;
				// SQL
				$query      = "SELECT * FROM user WHERE username = '$username'";
				$sql		= mysqli_query($koneksi,$query);

				$dt  		= mysqli_fetch_array($sql);
				if($dt['foto']=="")
				{

				}
				else
				{
				//nama field foto
				$lokasi		= $dt['foto'];
				// alamat folder foto
				$hapus		= "logo/$lokasi";
				// script hapus gambar dari foleder
				unlink($hapus);
				}


				$query2		= "DELETE FROM user
							   WHERE username = '$username'";
				
				
				$sql2		= mysqli_query($koneksi,$query2);
				
				// CEK SQL
				if($sql2 == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}

		// QUERY UNTUK MENGHAPUS DATA (DELETE)
			function dataDeleteFoto($username) {
				$koneksi = $this->koneksi;
				// SQL
				$query      = "SELECT * FROM user WHERE username = '$username'";
				$sql		= mysqli_query($koneksi,$query);

				$dt  		= mysqli_fetch_array($sql);
	
				//nama field foto
				$lokasi		= $dt['foto'];
				// alamat folder foto
				$hapus		= "logo/$lokasi";
				// script hapus gambar dari foleder
						unlink($hapus);
				$query		= "UPDATE user SET
								foto    = ''
							   WHERE username = '$username'";
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