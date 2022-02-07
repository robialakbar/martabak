<?php
	
	// CLASS MODEL PENDUDUK
	class model_berkas extends database {
		// DIGUNAKAN UNTUK MENJADI OBJEK SAAT INSTANSIASI DI SINI
			
		
		// METHOD
		// FUNCTION __CONSTRUCT UNTUK MENANGANI INSTANSIASI CLASS DARI MODEL 
			function __construct() {
				// INSTANSIASI CLASS KONEKSI 
				parent::__construct();	

			}
			
		
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataInsert($nip,$keterangan,$tgl,$foto,$tipe,$lokasi) {
				$koneksi = $this->koneksi;
				// SQL
				$q1 	= mysqli_query($koneksi,"SELECT * FROM berkas ORDER BY id DESC");
				$dt 	= mysqli_fetch_array($q1);
				$id		= $dt['id']+1;

				$id_f = $id."_".$foto;
				
				if($tipe== "image/jpeg" || $tipe == "image/png")
                {

    				$query		= "INSERT INTO berkas VALUES
    							   ('$id','$nip','$keterangan','$tgl','$id_f','gambar')";
    				
    				$sql		= mysqli_query($koneksi,$query);
    				
    				move_uploaded_file($lokasi, "logo/".$id_f);
    				
    				// ubah resolusi
    				$orig_image = imagecreatefromjpeg("logo/".$id_f);
                    $image_info = getimagesize("logo/".$id_f); 
                    $width_orig  = $image_info[0]; // current width as found in image file
                    $height_orig = $image_info[1]; // current height as found in image file
                    if($width_orig<$height_orig){
                    $width = 250; // new image width
                    $height = 400; // new image height
                    }elseif($width_orig>$height_orig)
                    {
                    $width = 400; // new image width
                    $height = 250; // new image height
                    }
                    $destination_image = imagecreatetruecolor($width, $height);
                    imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                    // This will just copy the new image over the original at the same filePath.
                    imagejpeg($destination_image, "logo/".$id_f, 100);
                }else
                {

    				$query		= "INSERT INTO berkas VALUES
    							   ('$id','$nip','$keterangan','$tgl','$id_f','file')";
    				
    				$sql		= mysqli_query($koneksi,$query);
    				
    				move_uploaded_file($lokasi, "logo/".$id_f);
                }
				
				// CEK SQL
				if($sql == TRUE) {
					header('Location: index.php?controller=berkas&method=select');
						exit;
				} 
				else {
					return FALSE;
				}
			}
		
		// QUERY UNTUK MENGUBAH DATA (UPDATE)
			function dataUpdate($id,$nip,$keterangan,$tipe,$foto,$lokasi) {
				$koneksi = $this->koneksi;
				if(empty($foto))
				  {
					// SQL
					$query		= "UPDATE berkas SET
									keterangan					= '$keterangan'
								   WHERE id	= '$id' AND nip='$nip'";
					
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

			 		$query2  = "SELECT * FROM berkas WHERE id = '$id' AND nip='$nip'";
					$sql2	= mysqli_query($koneksi,$query2);
					$dt  	= mysqli_fetch_array($sql2);

					if($dt['foto']=="")
					{	
					    if($tipe== "image/jpeg" || $tipe == "image/png")
                        {
    						$q1 	= mysqli_query($koneksi,"SELECT * FROM berkas ORDER BY id DESC");
    						$dtx 	= mysqli_fetch_array($q1);
    						$idx		= $dtx['id']+1;
    
    						$id_f = $idx."_".$foto;

						    move_uploaded_file($lokasi, "logo/".$id_f);
						    
						    // ubah resolusi
            				$orig_image = imagecreatefromjpeg("logo/".$id_f);
                            $image_info = getimagesize("logo/".$id_f); 
                            $width_orig  = $image_info[0]; // current width as found in image file
                            $height_orig = $image_info[1]; // current height as found in image file
                            if($width_orig<$height_orig){
                            $width = 250; // new image width
                            $height = 400; // new image height
                            }elseif($width_orig>$height_orig)
                            {
                            $width = 400; // new image width
                            $height = 250; // new image height
                            }
                            $destination_image = imagecreatetruecolor($width, $height);
                            imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                            // This will just copy the new image over the original at the same filePath.
                            imagejpeg($destination_image, "logo/".$id_f, 100);
                        }else {
                            $q1 	= mysqli_query($koneksi,"SELECT * FROM berkas ORDER BY id DESC");
    						$dtx 	= mysqli_fetch_array($q1);
    						$idx		= $dtx['id']+1;
    
    						$id_f = $idx."_".$foto;

						    move_uploaded_file($lokasi, "logo/".$id_f);
                        }
					}else
					  {
					  //nama field foto
						$tag		= $dt['foto'];
						// alamat folder foto
						$hapus		= "logo/$tag";
						// script hapus gambar dari foleder
						
						unlink($hapus);
						// simpan foto baru
						$q1 	= mysqli_query($koneksi,"SELECT * FROM berkas ORDER BY id DESC");
    					$dtx 	= mysqli_fetch_array($q1);
    					$idx		= $dtx['id']+1;
    
    					$id_f = $idx."_".$foto;
    					
    					    move_uploaded_file($lokasi, "logo/".$id_f);
    					    
    					    if($tipe== "image/jpeg" || $tipe == "image/png")
                            {
    					    // ubah resolusi
            				$orig_image = imagecreatefromjpeg("logo/".$id_f);
                            $image_info = getimagesize("logo/".$id_f); 
                            $width_orig  = $image_info[0]; // current width as found in image file
                            $height_orig = $image_info[1]; // current height as found in image file
                            if($width_orig<$height_orig){
                            $width = 250; // new image width
                            $height = 400; // new image height
                            }elseif($width_orig>$height_orig)
                            {
                            $width = 400; // new image width
                            $height = 250; // new image height
                            }
                            $destination_image = imagecreatetruecolor($width, $height);
                            imagecopyresampled($destination_image, $orig_image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                            // This will just copy the new image over the original at the same filePath.
                            imagejpeg($destination_image, "logo/".$id_f, 100);
                            
                            //SQL
					               $query3 	= "UPDATE berkas SET
									keterangan					= '$keterangan',
									foto 						= '$id_f',
									tipe                        = 'gambar'
								   WHERE id	= '$id' AND nip ='$nip'";
                            }
                            else
                            {
                                //SQL
					               $query3 	= "UPDATE berkas SET
									keterangan					= '$keterangan',
									foto 						= '$id_f',
									tipe                        = 'file'
								   WHERE id	= '$id' AND nip ='$nip'";
                            }
					}

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
			function dataDelete($nip,$id) {
				$koneksi = $this->koneksi;
				// SQL

				$query2  = "SELECT * FROM berkas WHERE id = '$id' AND nip ='$nip'";
					$sql2	= mysqli_query($koneksi,$query2);
					$dt  	= mysqli_fetch_array($sql2);

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
				$query		= "DELETE FROM berkas
							   WHERE nip = '$nip' AND id ='$id'";

				
				
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