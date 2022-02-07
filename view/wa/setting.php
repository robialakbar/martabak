<title><?php echo $row_data['nama'];?> | Setting WhatsApp </title>

<?php
if ($_SESSION['level_simpeg']=="admin") {
?>
            <!-- INI UNTUK JUDUL -->
            <section class="content-header">
              <h1>
                Setting WhatsApp Gateway
              </h1>
              <ol class="breadcrumb">
                <li><a href="index.php?controller=sistem&method=home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Setting Whatsapp</li>
              </ol>
            </section>
            <section class="content">
            <!-- INI UNTUK ISI -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- INI BAGIAN ISI UNTUK JUDUL TABEL -->
                        <div class="panel-heading bg-aqua">
                            <i class="fa fa-gears fa-fw"></i> Setting WhatsApp
                        </div>
                        <?php
                        $row = mysqli_fetch_array($data_wa);
                        ?>
                        <!-- INI BAGIAN ISI UTAMA -->
                        <div class="panel-body table-responsive">
                            <!-- INI BAGIAN TABEL -->
                        <form role="form" method="POST" action="index.php?controller=wa&method=edit">
                            <table width="100%">
                             <thead>
                                    <tr>
                                        <th width="10%" class="text-right">Token</th>
                                        <th width="70%" style="padding-left: 5px;">
                                        <input name="token" style="width: 100%" value="<?php echo $row['token'];?>" class="from-control" autocomplete="off"></input>
                                        </th>
                                        <th width="10%" style="padding-left: 5px;">
                                        <button type="submit" name="cari" class="btn btn-info btn-xs" title="Cari"><i class="fa fa-refresh fa-fw"></i></button>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                <b>1. Informasi 
                <br>
                <p style="padding-left: 15px;">* Untuk mendapatkan token silakan kunjungi <a href="https://wablas.com" target="_blank"> Wablas.com</a> , dan nomor WhatsApp harus sudah terdaftar di <a href="https://wablas.com" target="_blank"> Wablas.com</a><br>
                * Aapabila ingin menggunkan whatsapp gateway ini anda harus memverifikasikan nomor whatsapp anda dengan cara scan QR Code ( Bagian Verifikasi Nomor Whatsapp )</p></b>
                <br>
                <b>2. Verifikasi Nomor Whatsapp
                <br>
                   <p style="padding-left: 15px;"> * Masuk ke dashboard menu api dibagian scan QR Code, silahakan scan QR Code yang tampil.
                    <br>
                    * Jika berhasil scan QR Code selanjutnya hubungi IT support <a href="https://wablas.com" target="_blank"> Wablas.com</a> untuk dilakukan pengaktifan layanan.
                    <br>
                    * Jika layanan telah aktif kamu bisa kirim pesan text atau gambar, dengan API yang telah disediakan.
                    </p>
                <br>
                <b>3. Peringatan !!
                    <p style="padding-left: 15px;">
                    * Pastikan nomor whatsapp yang digunakan tidak digunakan untuk akses dari https://web.whatsapp.com
                    <br>
                    * Jika kamu logout dari aplikasi whatsapp kamu, pastikan untuk scan ulang QR code dan upload ulang.</p>
                </b>

            </div>

    </section>

    <?php 
}
else
{
    echo "<script>window.history.back(); </script>";
}
?>