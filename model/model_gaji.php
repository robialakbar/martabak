<?php
	
	// CLASS MODEL PENDUDUK
	class model_gaji extends database {
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

		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataGaji($nip) {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM gaji WHERE nip ='$nip'";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}

		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataUbahGaji($nip) {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM gaji WHERE nip ='$nip'";
				
				$sql			= mysqli_query($koneksi,$query);
				
				return $sql;
			}

		// QUERY UNTUK MENAMPILKAN DATA (SELECT)
			function dataCek($nip,$tahun,$bulan) {
				$koneksi = $this->koneksi;
				// SQL
				$query			= "SELECT * FROM gaji WHERE nip ='$nip' AND year(tgl_gaji)='$tahun' AND month(tgl_gaji)='$bulan'";
				
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
		
		// QUERY UNTUK MEMASUKKAN DATA (INSERT)
			function dataInsert($nip,$gaji_pokok,$tunj_istri,$tunj_anak,$tunj_hselon,$tunj_fung_umum,$tunj_fungsional,$tunj_kusus,$tunj_terpencil,$tkd,$tunj_beras,$tunj_pajak,$tunj_bpjs,$tunj_jkk,$tunj_jkm,$pembulatan,$pot_pajak,$pot_bpjs,$pot_iwp_21,$pot_iwp_81,$pot_tapebum,$pot_jkk,$pot_jkm,$hutang,$bulog,$sewa,$tgl,$gaji_bersih) {

				$koneksi = $this->koneksi;
				// SQL
				$q1 	= mysqli_query($koneksi,"SELECT * FROM gaji ORDER BY id DESC");
				$dt 	= mysqli_fetch_array($q1);
				$id		= $dt['id']+1;

				$query		= "INSERT INTO gaji VALUES
							   ('$id','$nip','$gaji_pokok','$tunj_istri','$tunj_anak','$tunj_hselon','$tunj_fung_umum','$tunj_fungsional','$tunj_kusus','$tunj_terpencil','$tkd','$tunj_beras','$tunj_pajak','$tunj_bpjs','$tunj_jkk','$tunj_jkm','$pembulatan','$pot_pajak','$pot_bpjs','$pot_iwp_21','$pot_iwp_81','$pot_tapebum','$pot_jkk','$pot_jkm','$hutang','$bulog','$sewa','$tgl','$gaji_bersih')";
				
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
			function dataUpdate($id,$nip,$gaji_pokok,$tunj_istri,$tunj_anak,$tunj_hselon,$tunj_fung_umum,$tunj_fungsional,$tunj_kusus,$tunj_terpencil,$tkd,$tunj_beras,$tunj_pajak,$tunj_bpjs,$tunj_jkk,$tunj_jkm,$pembulatan,$pot_pajak,$pot_bpjs,$pot_iwp_21,$pot_iwp_81,$pot_tapebum,$pot_jkk,$pot_jkm,$hutang,$bulog,$sewa,$tgl,$gaji_bersih) {
				$koneksi = $this->koneksi;
				// SQL
				$query		= "UPDATE gaji SET
								gaji_pokok					= '$gaji_pokok',
								tunj_istri					= '$tunj_istri',
								tunj_anak					= '$tunj_anak',
								tunj_hselon					= '$tunj_hselon',
								tunj_fung_umum				= '$tunj_fung_umum',
								tunj_fungsional				= '$tunj_fungsional',
								tunj_khusus					= '$tunj_kusus',
								tunj_terpencil 				= '$tunj_terpencil',
								tkd							= '$tkd',
								tunj_beras					= '$tunj_beras',
								tunj_pajak					= '$tunj_pajak',
								tunj_bpjs					= '$tunj_bpjs',
								tunj_jkk					= '$tunj_jkk',
								tunj_jkm					= '$tunj_jkm',
								pembulatan					= '$pembulatan',
								pot_pajak					= '$pot_pajak',
								pot_bpjs					= '$pot_bpjs',
								pot_iwp_21					= '$pot_iwp_21',
								pot_iwp_01					= '$pot_iwp_81',
								pot_tapebum					= '$pot_tapebum',
								pot_jkk						= '$pot_jkk',
								pot_jkm						= '$pot_jkm',
								hutang 						= '$hutang',
								bulog 						= '$bulog',
								sewa_rumah 					= '$sewa',
								tgl_gaji 					= '$tgl',
								gaji_bersih					= '$gaji_bersih'
							   WHERE nip	= '$nip' AND id='$id'
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
				$query		= "DELETE FROM gaji
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