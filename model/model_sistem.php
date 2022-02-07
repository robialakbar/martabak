<?php
	// CLASS MODEL SISTEM
	class model_sistem extends database{
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			
		
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS KONEKSI 
				parent::__construct();	

			}
			
		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataHome() {
				$koneksi = $this->koneksi;

				$query		= "SELECT * FROM profil";
				
				$sql		= mysqli_query($koneksi,$query);
				
				return $sql;
			}


		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataDaftar($username,$nip,$pswd,$nama,$gender) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "INSERT INTO user VALUES
							   ('$username','$nip','$pswd','$nama','user','$gender','','Aktif')";
				
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
			function UpdateData($username,$nama,$password,$foto,$gender,$lokasi) {
				$koneksi = $this->koneksi;


				if(empty($foto))
				  {
					$query 	= "UPDATE user SET
								nama            = '$nama',
								gender 			= '$gender',
								password 		= '$password'
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
						move_uploaded_file($lokasi, "../logo/".$foto);
					}else
					  {
					  //nama field foto
						$tag		= $dt['foto'];
						// alamat folder foto
						$hapus		= "../logo/$tag";
						// script hapus gambar dari foleder
						
						unlink($hapus);
						// simpan foto baru
						move_uploaded_file($lokasi, "../logo/".$foto);
					}
					

					//SQL
					$query3 	= "UPDATE user SET
								nama            = '$nama',
								password			= '$password',
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

		// QUERY UNTUK MENGUBAH DATA (UPDATE)
			function dataUpdate($id,$nama_profil,$judul,$provinsi,$kota,$alamat,$foto,$lokasi,$fb,$twitter,$ig,$fotox) {
				$koneksi = $this->koneksi;
				// SQL
				if(empty($fotox))
				  {
				$query		= "UPDATE profil SET
								nama	 	= '$nama_profil',
								instansi 	= '$judul',
								alamat		= '$alamat',
								provinsi	= '$provinsi',
								kota        = '$kota',
								fb 			= '$fb',
								twitter		= '$twitter',
								ig 			= '$ig'
							   WHERE id	= '$id'";
				
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
					$query2  = "SELECT * FROM profil";
					$sql2	= mysqli_query($koneksi,$query2);
					$dt  	= mysqli_fetch_array($sql2);

					if($dt['logo']=="")
					{
						$q1 	= mysqli_query($koneksi,"SELECT * FROM profil ORDER BY id DESC");
						$dtx 	= mysqli_fetch_array($q1);
						$idx		= $dtx['id']+1;

						$id_f = $idx."_".$foto;

						move_uploaded_file($lokasi, "logo/".$id_f);
					}else
					  {
					  //nama field foto
						$tag		= $dt['logo'];
						// alamat folder foto
						$hapus		= "logo/$tag";
						// script hapus gambar dari foleder
						
						unlink($hapus);
						// simpan foto baru
						$q1 	= mysqli_query($koneksi,"SELECT * FROM profil ORDER BY id DESC");
						$dtx 	= mysqli_fetch_array($q1);
						$idx		= $dtx['id']+1;

						$id_f = $idx."_".$foto;

						move_uploaded_file($lokasi, "logo/".$id_f);
					}

				$query		= "UPDATE profil SET
								nama	 	= '$nama_profil',
								instansi 	= '$judul',
								alamat		= '$alamat',
								provinsi	= '$provinsi',
								kota        = '$kota',
								logo		= '$id_f',
								fb 			= '$fb',
								twitter		= '$twitter',
								ig 			= '$ig'
							   WHERE id	= '$id'";
				
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

		// QUERY UNTUK MELAKUKAN VALIDASI LOGIN
			function dataValidasi($username) {
				// SQL
				$koneksi = $this->koneksi;

				$query 		= "SELECT * FROM user
							   WHERE username = '$username' AND status='Aktif' ";
							   
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

		// QUERY UNTUK MELAKUKAN VALIDASI LOGIN
			function dataValidasi_app($username) {
				// SQL
				$koneksi = $this->koneksi;

				$query 		= "SELECT * FROM user
							   WHERE username = '$username' AND status='Aktif' AND level='user' ";
							   
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

		// QUERY UNTUK MELAKUKAN VALIDASI LOGIN
			function dataCek($username) {
				// SQL
				$koneksi = $this->koneksi;

				$query 		= "SELECT * FROM user
							   WHERE username = '$username'
							   ";
							   
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

		// QUERY UNTUK MENGHAPUS DATA (DELETE)
			function UpdateLupaPassword($username,$pswd) {
				$koneksi = $this->koneksi;
				
					//SQL
					$query3 	= "UPDATE user SET
								password			= '$pswd'
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

		// QUERY UNTUK MENGHAPUS DATA (OFF Akun)
			function UserOff($username) {
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
		// QUERY UNTUK MENGHAPUS DATA (OFF Akun)
			function UserOn($username) {
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
			function DeleteLogo() {
				$koneksi = $this->koneksi;

				$query2  = "SELECT * FROM profil";
					$sql2	= mysqli_query($koneksi,$query2);
					$dt  	= mysqli_fetch_array($sql2);

					  //nama field foto
						$tag		= $dt['logo'];
						// alamat folder foto
						$hapus		= "logo/$tag";
						// script hapus gambar dari foleder
						
						unlink($hapus);
				
				// SQL
				$query		= "UPDATE profil SET
								logo =''
								WHERE id	= '1'";
				
				$sql		= mysqli_query($koneksi,$query);
				
				// CEK SQL
				if($sql == TRUE) {
					return TRUE;
				} 
				else {
					return FALSE;
				}
			}

		// QUERY UNTUK MELAKUKAN VALIDASI LOGIN
			function dataCekNip($nip) {
				$koneksi = $this->koneksi;
				// SQL		
				$query 		= "SELECT * FROM pegawai
							   WHERE nip = '$nip'";
							   
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
			function dataCekNip1($nip) {
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
	}
?>