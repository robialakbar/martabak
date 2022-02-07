<title><?php echo $row_data['nama'];?> | Ubah Detail Gaji</title>
<?php
if ($_SESSION['level_simpeg']=="admin") {
?>
<?php
date_default_timezone_set('Asia/Jakarta');
    $row_pegawai  = mysqli_fetch_array($data_pegawai);
    $row_gaji  = mysqli_fetch_array($data_gaji);
?>
            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Data Detail Gaji 
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="index.php?controller=gaji&method=select"> Data Gaji</a></li>
                <li class="active">Data Detail</li>
              </ol>
            </section>

            <section class="content">
             <a href="index.php?controller=gaji&method=select" class="btn btn-md btn-success" data-toggle="tooltip" data-placement="top" title="Data Pegawai"><i class="fa fa-chevron-left fa-fw"></i>Back</a>
             <br>
             <br>
            <!-- INI UNTUK ISI -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-money fa-fw"></i> 

                            <div class="pull-right">
                                <label class="label" style="font-size: 15px;"> Pegawai : <?php echo $row_pegawai['nama'];?>
                                </label>
                            </div>
                        </div>

                        <!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body table-responsive">
                            <!-- INI BAGIAN TABEL -->
                            <div class="">
                                <label>Ubah Data Detail Gaji Bulan ||
                             <?php
                             $bulan = date('m',strtotime($row_gaji['tgl_gaji']));
                                            if ($bulan=="01") {
                                                echo "Januari";
                                             }
                                            elseif ($bulan=="02") {
                                                echo "Februari";
                                             }
                                            elseif ($bulan=="03") {
                                                echo "Maret";
                                             }
                                            elseif ($bulan=="04") {
                                                echo "April";
                                             }
                                            elseif ($bulan=="05") {
                                                echo "Mei";
                                             }
                                            elseif ($bulan=="06") {
                                                echo "Juni";
                                             }
                                            elseif ($bulan=="07") {
                                                echo "Juli";
                                             }
                                            elseif ($bulan=="08") {
                                                echo "Agustus";
                                             }
                                            elseif ($bulan=="09") {
                                                echo "September";
                                             }
                                            elseif ($bulan=="10") {
                                                echo "Oktober";
                                             }
                                            elseif ($bulan=="11") {
                                                echo "November";
                                             }
                                            elseif ($bulan=="12") {
                                                echo "Desember";
                                             }
                                echo " / ".date('Y',strtotime($row_gaji['tgl_gaji']));?> || </label><br>
                                <label class="label" style="font-size: 15px;color: black;">NIP: <?php echo $row_pegawai['nip'];?> / <?php echo $row_pegawai['nama'];?>
                                </label>
                            </div>
            <form action="index.php?controller=gaji&method=update_data" method="post">

                <input name="nip" type="hidden" value="<?php echo $row_pegawai['nip'];?>"></input>
                <input name="tgl" type="hidden" value="<?php echo $row_gaji['tgl_gaji'];?>"></input>
                <input name="id" type="hidden" value="<?php echo $row_gaji['id'];?>"></input>
                    <table width="100%">
                        <hr>
                            <!--baris 1-->
                            <tr>
                                <td width="17%">
                                    <div class="form-group">
                                    Gaji Pokok
                                    </div>
                                </td>
                                <td width="3%" >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="30%">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="gaji_pokok" id="gaji_pokok" class="form-control" placeholder="Masukkan Tanggal" value="<?php echo number_format($row_gaji['gaji_pokok'],0,"",".");?>" style="text-align: right;width: 70%;"  onkeyup="sum();" min="0">
                                    </div>
                                </td>
                                <td width="1%" ></td>
                                <td width="22%">
                                    <div class="form-group">
                                    Potongan Pajak
                                    </div>
                                </td>
                                <td width="3%" >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td width="23%">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="pot_pajak" id="pot_pajak" class="form-control" placeholder="Potongan Pajak" onkeyup="sum();" value="<?php echo number_format($row_gaji['pot_pajak'],0,"",".");?>" style="text-align: right;" >
                                    </div>
                                </td>
                            </tr>
                            <!--baris 2-->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tunj Istri / Suami
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="tunj_istri" id="tunj_istri" class="form-control" placeholder="Tunj Istri / Suami" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['tunj_istri'],0,"",".");?>" > 
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Pot BPJS Kes 
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="pot_bpjs" id="pot_bpjs" class="form-control" placeholder="Potongan BPJS" style="text-align: right;" onkeyup="sum();" value="<?php echo number_format($row_gaji['pot_bpjs'],0,"",".");?>" >
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 3 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tunjangan Anak
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="tunj_anak" id="tunj_anak" class="form-control" placeholder="Tunjangan Anak" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['tunj_anak'],0,"",".");?>" >
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Pot IWP 21
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="pot_iwp_21" id="pot_iwp_21" class="form-control" placeholder="Pot IWP 21" style="text-align: right;" onkeyup="sum();" value="<?php echo number_format($row_gaji['pot_iwp_21'],0,"",".");?>">
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 4 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tunjangan Hselon
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="tunj_hselon" id="tunj_hselon" class="form-control" placeholder="Tunjangan Hselon" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['tunj_hselon'],0,"",".");?>" >
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Pot IWP 81
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="pot_iwp_81" id="pot_iwp_81" class="form-control" placeholder="Pot IWP 81" style="text-align: right;" onkeyup="sum();" value="<?php echo number_format($row_gaji['pot_iwp_01'],0,"",".");?>" >
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 5 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tunj Fung Umum
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="tunj_fung_umum" id="tunj_fung_umum" class="form-control" placeholder="Tunjangan Fung Umum" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['tunj_fung_umum'],0,"",".");?>">
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Pot Tapebum
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="pot_tapebum" id="pot_tapebum" class="form-control" placeholder="Pot Tapebum" style="text-align: right;" onkeyup="sum();" value="<?php echo number_format($row_gaji['pot_tapebum'],0,"",".");?>" >
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 6  -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tunj Fungsional
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="tunj_fungsional" id="tunj_fungsional" class="form-control" placeholder="Tunjangan Fungsional" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['tunj_fungsional'],0,"",".");?>" >
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Potongan JKK
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="pot_jkk" id="pot_jkk" class="form-control" placeholder="Potongan JKK" style="text-align: right;" onkeyup="sum();" value="<?php echo number_format($row_gaji['pot_jkk'],0,"",".");?>" >
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 6  -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tunjangan Khusus
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="tunj_kusus" id="tunj_kusus" class="form-control" placeholder="Tunjangan Khusus" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['tunj_khusus'],0,"",".");?>" >
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                     Potongan JKM
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="pot_jkm" id="pot_jkm" class="form-control" placeholder="Potongan JKM" style="text-align: right;" onkeyup="sum();" value="<?php echo number_format($row_gaji['pot_jkm'],0,"",".");?>" >
                                    </div>
                                    </div>
                                </td>
                            </tr>
                             <!-- baris 7  -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tunjangan Terpencil
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="tunj_terpencil" id="tunj_terpencil" class="form-control" placeholder="Tunjangan Terpencil" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['tunj_terpencil'],0,"",".");?>" >
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Hutang /Lain"
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="hutang" id="hutang" class="form-control" placeholder="Hutang / Lain" style="text-align: right;" onkeyup="sum();" value="<?php echo number_format($row_gaji['hutang'],0,"",".");?>" >
                                    </div>
                                    </div>
                                </td>
                            </tr>
                             <!-- baris 8  -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    TKD
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="tkd" id="tkd" class="form-control" placeholder="TKD" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['tkd'],0,"",".");?>" >
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    BULOG
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="bulog" id="bulog" class="form-control" placeholder="BULOG" style="text-align: right;" onkeyup="sum();" value="<?php echo number_format($row_gaji['bulog'],0,"",".");?>" >
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 9  -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tunjangan Beras
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="tunj_beras" id="tunj_beras" class="form-control" placeholder="Tunjangan Beras" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['tunj_beras'],0,"",".");?>" >
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    Sewa Rumah
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="sewa" id="sewa" class="form-control" placeholder="Sewa Rumah" style="text-align: right;" onkeyup="sum();" value="<?php echo number_format($row_gaji['sewa_rumah'],0,"",".");?>" >
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 10  -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tunjangan Pajak
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="tunj_pajak" id="tunj_pajak" class="form-control" placeholder="Tunjangan Pajak" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['tunj_pajak'],0,"",".");?>" >
                                    </div>
                                    </div>
                                </td>
                                <td ></td>
                                <td>
                                    <div class="form-group">
                                    <b>POTONGAN</b>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="potongan" id="potongan" class="form-control" placeholder="POTONGAN" style="text-align: right;" onkeyup="sum();" value="<?php echo number_format($row_gaji['pot_pajak']+$row_gaji['pot_bpjs']+$row_gaji['pot_iwp_21']+$row_gaji['pot_iwp_01']+$row_gaji['pot_tapebum']+$row_gaji['pot_jkk']+$row_gaji['pot_jkm']+$row_gaji['hutang']+$row_gaji['bulog']+$row_gaji['sewa_rumah'],0,"",".");?>" >
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- baris 11 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tunjangan BPJS
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="tunj_bpjs" id="tunj_bpjs" class="form-control" placeholder="Tunjangan BPJS" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['tunj_bpjs'],0,"",".");?>" >
                                    </div>
                                    </div>
                                </td>
                                <td class="4" ></td>
                            </tr>
                            <!-- baris 12 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tunjangan JKK
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="tunj_jkk" id="tunj_jkk" class="form-control" placeholder="Tunjangan JKK" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['tunj_jkk'],0,"",".");?>" >
                                    </div>
                                    </div>
                                </td>
                                <td class="4" ></td>
                            </tr>
                            <!-- baris 11 -->
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Tunjangan JKM
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="tunj_jkm" id="tunj_jkm" class="form-control" placeholder="Tunjangan JKM" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['tunj_jkm'],0,"",".");?>">
                                    </div>
                                    </div>
                                </td>
                                <td class="4" ></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                    Pembulatan
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="pembulatan" id="pembulatan" class="form-control" placeholder="Pembulatan" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['pembulatan'],0,"",".");?>" >
                                    </div>
                                    </div>
                                </td>
                                <td class="4" ></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                    <b>JUMLAH KOTOR</b>
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="jml_kotor" id="jml_kotor" class="form-control" placeholder="Jumlah Kotor" style="text-align: right;width: 70%" onkeyup="sum();" value="<?php echo number_format($row_gaji['gaji_pokok']+$row_gaji['tunj_anak']+$row_gaji['tunj_istri']+$row_gaji['tunj_hselon']+$row_gaji['tunj_fung_umum']+$row_gaji['tunj_fungsional']+$row_gaji['tunj_khusus']+$row_gaji['tunj_terpencil']+$row_gaji['tkd']+$row_gaji['tunj_beras']+$row_gaji['tunj_pajak']+$row_gaji['tunj_bpjs']+$row_gaji['tunj_jkk']+$row_gaji['tunj_jkm']+$row_gaji['pembulatan'],0,"",".");?>" >
                                    </div>
                                    </div>
                                </td>
                                <td class="4" ></td>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <hr>
                                </td>
                            </tr>
                            <tr><td colspan="4"></td>
                                <td>
                                    <div class="form-group">
                                    <b>JUMLAH BERSIH</b>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    :
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input name="jml_bersih" id="jml_bersih" class="form-control" placeholder="Jumlah Bersih" onkeypress="return angka(event);" style="text-align: right;" readonly="" value="<?php echo number_format($row_gaji['gaji_bersih'],0,"",".");?>" >
                                    </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <hr>
                        <div>
                            
                            <button class="btn btn-success btn-md pull-right"><i class="fa fa-download fa-fw"></i> Simpan </button>
                            <a href="index.php?controller=gaji&method=select" class="btn btn-success btn-md pull-left"><i class="fa fa-close fa-fw"></i>Batal</a>

                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </section>
<script type="text/javascript">
  function angka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;
  }
</script>


<script type="text/javascript">
        
    /* Tunjangan */
    //gaji pokok
    var gaji_pokok = document.getElementById('gaji_pokok');
    gaji_pokok.addEventListener('keyup', function(e)
    {
        gaji_pokok.value = formatRupiah(this.value);
    });
    //tunj istri
    var tunj_istri = document.getElementById('tunj_istri');
    tunj_istri.addEventListener('keyup', function(e)
    {
        tunj_istri.value = formatRupiah(this.value);
    });
    //tunj anak
    var tunj_anak = document.getElementById('tunj_anak');
    tunj_anak.addEventListener('keyup', function(e)
    {
        tunj_anak.value = formatRupiah(this.value);
    });
    //tunj hselon
    var tunj_hselon = document.getElementById('tunj_hselon');
    tunj_hselon.addEventListener('keyup', function(e)
    {
        tunj_hselon.value = formatRupiah(this.value);
    });
    //tunj func umum
    var tunj_fung_umum = document.getElementById('tunj_fung_umum');
    tunj_fung_umum.addEventListener('keyup', function(e)
    {
        tunj_fung_umum.value = formatRupiah(this.value);
    });
    //tunj func umum
    var tunj_fungsional = document.getElementById('tunj_fungsional');
    tunj_fungsional.addEventListener('keyup', function(e)
    {
        tunj_fungsional.value = formatRupiah(this.value);
    });
    //tunj Kusus
    var tunj_kusus = document.getElementById('tunj_kusus');
    tunj_kusus.addEventListener('keyup', function(e)
    {
        tunj_kusus.value = formatRupiah(this.value);
    });
    //tunj terpencil
    var tunj_terpencil = document.getElementById('tunj_terpencil');
    tunj_terpencil.addEventListener('keyup', function(e)
    {
        tunj_terpencil.value = formatRupiah(this.value);
    });
    //tkd
    var tkd = document.getElementById('tkd');
    tkd.addEventListener('keyup', function(e)
    {
        tkd.value = formatRupiah(this.value);
    });
    //tunj terpencil
    var tunj_beras = document.getElementById('tunj_beras');
    tunj_beras.addEventListener('keyup', function(e)
    {
        tunj_beras.value = formatRupiah(this.value);
    });
    //tunj terpencil
    var tunj_pajak = document.getElementById('tunj_pajak');
    tunj_pajak.addEventListener('keyup', function(e)
    {
        tunj_pajak.value = formatRupiah(this.value);
    });
    //tunj BPJS
    var tunj_bpjs = document.getElementById('tunj_bpjs');
    tunj_bpjs.addEventListener('keyup', function(e)
    {
        tunj_bpjs.value = formatRupiah(this.value);
    });
    //tunj jkk
    var tunj_jkk = document.getElementById('tunj_jkk');
    tunj_jkk.addEventListener('keyup', function(e)
    {
        tunj_jkk.value = formatRupiah(this.value);
    });
    //tunj jkm
    var tunj_jkm = document.getElementById('tunj_jkm');
    tunj_jkm.addEventListener('keyup', function(e)
    {
        tunj_jkm.value = formatRupiah(this.value);
    });
    //pembulatan
    var pembulatan = document.getElementById('pembulatan');
    pembulatan.addEventListener('keyup', function(e)
    {
        pembulatan.value = formatRupiah(this.value);
    });
    //jml bersih
    var jml_kotor = document.getElementById('jml_kotor');
    jml_kotor.addEventListener('keyup', function(e)
    {
        jml_kotor.value = formatRupiah(this.value);
    });




    /* Potongan */
    //pot pajak
    var pot_pajak = document.getElementById('pot_pajak');
    pot_pajak.addEventListener('keyup', function(e)
    {
        pot_pajak.value = formatRupiah(this.value);
    });
    //pot bpjs
    var pot_bpjs = document.getElementById('pot_bpjs');
    pot_bpjs.addEventListener('keyup', function(e)
    {
        pot_bpjs.value = formatRupiah(this.value);
    });
    //pot iwp 21
    var pot_iwp_21 = document.getElementById('pot_iwp_21');
    pot_iwp_21.addEventListener('keyup', function(e)
    {
        pot_iwp_21.value = formatRupiah(this.value);
    });
    //pot iwp 81
    var pot_iwp_81 = document.getElementById('pot_iwp_81');
    pot_iwp_81.addEventListener('keyup', function(e)
    {
        pot_iwp_81.value = formatRupiah(this.value);
    });
    //pot tapebum
    var pot_tapebum = document.getElementById('pot_tapebum');
    pot_tapebum.addEventListener('keyup', function(e)
    {
        pot_tapebum.value = formatRupiah(this.value);
    });
    //pot jkk
    var pot_jkk = document.getElementById('pot_jkk');
    pot_jkk.addEventListener('keyup', function(e)
    {
        pot_jkk.value = formatRupiah(this.value);
    });
    //pot jkk
    var pot_jkm = document.getElementById('pot_jkm');
    pot_jkm.addEventListener('keyup', function(e)
    {
        pot_jkm.value = formatRupiah(this.value);
    });
    //pot hutang / lain"
    var hutang = document.getElementById('hutang');
    hutang.addEventListener('keyup', function(e)
    {
        hutang.value = formatRupiah(this.value);
    });
    //BULOG
    var bulog = document.getElementById('bulog');
    bulog.addEventListener('keyup', function(e)
    {
        bulog.value = formatRupiah(this.value);
    });
    //sewa rumah
    var sewa = document.getElementById('sewa');
    sewa.addEventListener('keyup', function(e)
    {
        sewa.value = formatRupiah(this.value);
    });
    
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function sum()
    {
        //tunjangan
        var gaji_pokok = document.getElementById('gaji_pokok').value;
        var tunj_istri = document.getElementById('tunj_istri').value;
        var tunj_anak = document.getElementById('tunj_anak').value;
        var tunj_hselon = document.getElementById('tunj_hselon').value;
        var tunj_fung_umum = document.getElementById('tunj_fung_umum').value;
        var tunj_fungsional = document.getElementById('tunj_fungsional').value;
        var tunj_kusus = document.getElementById('tunj_kusus').value;
        var tunj_terpencil = document.getElementById('tunj_terpencil').value;
        var tkd = document.getElementById('tkd').value;
        var tunj_beras = document.getElementById('tunj_beras').value;
        var tunj_pajak = document.getElementById('tunj_pajak').value;
        var tunj_bpjs = document.getElementById('tunj_bpjs').value;
        var tunj_jkk = document.getElementById('tunj_jkk').value;
        var tunj_jkm = document.getElementById('tunj_jkm').value;
        var pembulatan = document.getElementById('pembulatan').value;

        //
        var pot_pajak = document.getElementById('pot_pajak').value;
        var pot_bpjs = document.getElementById('pot_bpjs').value;
        var pot_iwp_21 = document.getElementById('pot_iwp_21').value;
        var pot_iwp_81 = document.getElementById('pot_iwp_81').value;
        var pot_tapebum = document.getElementById('pot_tapebum').value;
        var pot_jkk = document.getElementById('pot_jkk').value;
        var pot_jkm = document.getElementById('pot_jkm').value;
        var hutang = document.getElementById('hutang').value;
        var bulog = document.getElementById('bulog').value;
        var sewa = document.getElementById('sewa').value;

    // total tunjangan
    //gaji pokok
    if(gaji_pokok=="")
    {
        var gaji = 0;
    }else{
        var gaji = parseInt(gaji_pokok.split(".").join(""));
    }
    // tunjangan istri
    if(tunj_istri=="")
    {
        var istri =0;
    }else{
        var istri = parseInt(tunj_istri.split(".").join(""));
    }
    //tunjangan anak
    if (tunj_anak=="") {
        var anak =0;
    } else{
        var anak = parseInt(tunj_anak.split(".").join(""));
    }
    // tunjangan hselon
    if (tunj_hselon=="") {
        var hselon =0;
    }else{
        var hselon = parseInt(tunj_hselon.split(".").join(""));
    }
    //tunjangan umum
    if (tunj_fung_umum=="") {
        var fung_umum =0;
    }else{
        var fung_umum = parseInt(tunj_fung_umum.split(".").join(""));
    }
    //tunjangan fungsional
    if (tunj_fungsional=="") {
        var fungsional =0;
    }else{
        var fungsional = parseInt(tunj_fungsional.split(".").join(""));
    }
    //tunjangan kusus 
    if (tunj_kusus=="") {
        var kusus =0;
    }else{
       var kusus = parseInt(tunj_kusus.split(".").join("")); 
    }
    //tunjangan terpencil
    if (tunj_terpencil=="") {
        var terpencil=0;
    }else{
        var terpencil = parseInt(tunj_terpencil.split(".").join(""));
    }
    //tkd
    if (tkd=="") {
        var tkd=0;
    }else{
        var tkd = parseInt(tkd.split(".").join(""));
    }
    //tunj beras
    if (tunj_beras=="") {
        var beras =0;
    }else{
        var beras = parseInt(tunj_beras.split(".").join(""));
    }
    //tunj pajak
    if (tunj_pajak=="") {
        var pajak =0;
    }else{
        var pajak = parseInt(tunj_pajak.split(".").join(""));
    }
    //tunj bpjs
    if (tunj_bpjs=="") {
        var bpjs =0;
    }else{
        var bpjs = parseInt(tunj_bpjs.split(".").join(""));
    }
    //tunj jkk
    if (tunj_jkk=="") {
        var jkk=0;
    }else{
        var jkk = parseInt(tunj_jkk.split(".").join(""));
    }
    //tunj jkm
    if (tunj_jkm=="") {
        var jkm=0;
    }else{
      var jkm = parseInt(tunj_jkm.split(".").join(""));  
    }
    // pembulatan
    if (pembulatan=="") {
        var pembulatan =0;
    }else{
        var pembulatan = parseInt(pembulatan.split(".").join(""));
    }
    



    // total potongan
    //potongan pajak
    if (pot_pajak=="") {
        var pot_pajak=0;
    }else{
        var pot_pajak = parseInt(pot_pajak.split(".").join(""));
    }
    //potongan bpjs
    if (pot_bpjs=="") {
        var pot_bpjs=0;
    }else{
        var pot_bpjs = parseInt(pot_bpjs.split(".").join(""));
    }
    //potongan iwp 21
    if (pot_iwp_21=="") {
        var pot_iwp_21=0;
    }else{
        var pot_iwp_21 = parseInt(pot_iwp_21.split(".").join(""));
    }
    //potongan 81
    if (pot_iwp_81=="") {
        var pot_iwp_81=0;
    }else{
        var pot_iwp_81 = parseInt(pot_iwp_81.split(".").join(""));
    }
    //potongan potabum
    if (pot_tapebum=="") {
        var pot_tapebum=0;
    }else{
        var pot_tapebum = parseInt(pot_tapebum.split(".").join(""));
    }
    //potongan jkk
    if (pot_jkk=="") {
        var pot_jkk=0;
    }else{
        var pot_jkk = parseInt(pot_jkk.split(".").join(""));
    }
    //potongan jkm
    if (pot_jkm=="") {
        var pot_jkm=0;
    }else{
        var pot_jkm = parseInt(pot_jkm.split(".").join(""));
    }
    //potongan hutang / lain
    if (hutang=="") {
        var hutang=0;
    }else{
        var hutang = parseInt(hutang.split(".").join(""));
    }
    //potongan bulog
    if (bulog=="") {
        var bulog=0;
    }else{
        var bulog = parseInt(bulog.split(".").join(""));
    }
    //potongan sewa rumah
    if (sewa=="") {
        var sewa=0;
    }else{
        var sewa = parseInt(sewa.split(".").join(""));
    }


    
    // Gaji Kotor
    var kotor = gaji+istri+anak+hselon+fung_umum+fungsional+kusus+terpencil+tkd+beras+pajak+bpjs+jkk+jkm+pembulatan;

    if(!isNaN(kotor)){
            document.getElementById('jml_kotor').value = kotor.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        }
    
    // Total Potongan
    var jml_potongan = pot_pajak+pot_bpjs+pot_iwp_21+pot_iwp_81+pot_tapebum+pot_jkk+pot_jkm+hutang+bulog+sewa;

    if(!isNaN(jml_potongan)){
            document.getElementById('potongan').value = jml_potongan.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        }

    
    var jml_total = parseInt(kotor) - parseInt(jml_potongan);
        if(!isNaN(jml_total)){
            document.getElementById('jml_bersih').value = jml_total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        }
    
    }

</script>

<?php 
}
else
{
    echo "<script>window.history.back(); </script>";
}
?>