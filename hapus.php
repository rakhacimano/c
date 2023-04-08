<?php
    include('koneksi.php');
    
    $id_mahasiswa = $_GET['id_mahasiswa'];

    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa='$id_mahasiswa'";
    $delete = mysqli_query($koneksi, $query);

    if(!$delete)
    {
        die("Gagal Menghapus Data: " .
        mysqli_errno($koneksi) . " - " .
        mysqli_error($koneksi));
    } else
    {
        echo "<script>
			  	alert('Data berhasil dihapus');window.location='index.php';
			  </script>";
    }
    
?>