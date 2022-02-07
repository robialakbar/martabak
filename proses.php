<?php
session_start();
            // LANGKAH 1 : 
            // MENDAPATKAN NILAI valid DAN METHOD DARI LINK
            // UNTUK DIGUNAKAN MENGARAHKAN KE FILE valid, CLASS DAN METHOD
            if(isset($_GET['valid'])) {
              // LANGKAH 2 :
              // SIMPAN NILAI GET DI VARIABEL
              $valid     = $_GET['valid'];  // UNTUK MENGARAHKAN KE FILE valid
              $class          = $_GET['valid'];  // UNTUK MENGGUNAKAN CLASS DI FILE valid
              $method         = $_GET['method'];      // UNTUK MENJALANKAN METHOD DI CLASS DI FILE valid
            
            }
            else {
              // JIKA valid TIDAK ADA, MAKA DIARAHKAN KE DASHBOARD
              // LANGKAH 3 :
              // SIMPAN NILAI GET DI VARIABEL
              $valid     = "sistem";            // UNTUK MENGARAHKAN KE FILE valid
              $class          = "sistem";            // UNTUK MENGGUNAKAN CLASS DI FILE valid
              $method         = "login";              // UNTUK MENJALANKAN METHOD DI CLASS DI FILE valid

            }

            // lANGKAH 4 :
            // MENGARAHKAN KE FILE valid SESUAI NILAI valid YANG DIDAPAT
            include ("valid/$valid.php");
              
            // LANGKAH 5 :
            // MENGGUNAKAN CLASS DI FILE valid DI ATAS
            // CLASS KEMUDIAN DI INSTANSIASI (PEMBENTUKAN OBJEK)
            $objek          = new $class();
              
            // LANGKAH 6 :
            // MENJALANKAN METHOD DI DALAM CLASS DI ATAS
            $objek->$method();
          ?>
