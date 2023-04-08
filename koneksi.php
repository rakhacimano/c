<?php 
    $servername     = "localhost";
    $username       = "root";
    $password       = "";
    $dbname         = "db_mahasiswa";

    $koneksi = mysqli_connect($servername, $username, $password, $dbname);

    if(!$koneksi)
    {
        die("Koneksi Gagal: " . mysqli_connect_error());
    }

    // echo "Koneksi Berhasil<br/>";

?>