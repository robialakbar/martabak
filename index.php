<?php
session_start();
            // LANGKAH 1 : 
            // MENDAPATKAN NILAI CONTROLLER DAN METHOD DARI LINK
            // UNTUK DIGUNAKAN MENGARAHKAN KE FILE CONTROLLER, CLASS DAN METHOD
            if(isset($_GET['controller'])) {
              // LANGKAH 2 :
              // SIMPAN NILAI GET DI VARIABEL
              $controller     = $_GET['controller'];  // UNTUK MENGARAHKAN KE FILE CONTROLLER
              $class          = $_GET['controller'];  // UNTUK MENGGUNAKAN CLASS DI FILE CONTROLLER
              $method         = $_GET['method'];      // UNTUK MENJALANKAN METHOD DI CLASS DI FILE CONTROLLER
            
            }
            else {
              // JIKA CONTROLLER TIDAK ADA, MAKA DIARAHKAN KE DASHBOARD
              // LANGKAH 3 :
              // SIMPAN NILAI GET DI VARIABEL
              $controller     = "sistem";            // UNTUK MENGARAHKAN KE FILE CONTROLLER
              $class          = "sistem";            // UNTUK MENGGUNAKAN CLASS DI FILE CONTROLLER
              $method         = "login";              // UNTUK MENJALANKAN METHOD DI CLASS DI FILE CONTROLLER

            }

            // lANGKAH 4 :
            // MENGARAHKAN KE FILE CONTROLLER SESUAI NILAI CONTROLLER YANG DIDAPAT
            include ("controller/$controller.php");
              
            // LANGKAH 5 :
            // MENGGUNAKAN CLASS DI FILE CONTROLLER DI ATAS
            // CLASS KEMUDIAN DI INSTANSIASI (PEMBENTUKAN OBJEK)
            $objek          = new $class();
              
            // LANGKAH 6 :
            // MENJALANKAN METHOD DI DALAM CLASS DI ATAS
            $objek->$method();
          ?>
