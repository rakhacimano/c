<?php
include('koneksi.php');

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Minggu 6</title>

    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>

<body class="bg-dark" data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid container">
            <a class="navbar-brand" href="index.php">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="#">Data Mahasiswa</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h3>Data Mahasiswa</h3>
        <a href="tambah.php" class="btn btn-primary mb-4">Tambah Data</a>

        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {

                    $data["jenis_kelamin"] = ($data["jenis_kelamin"] == 'l') ? 'Laki-Laki' : 'Perempuan';

                    echo '            
                            <tr>
                                <td>' . $no . '</td>
                                <td>' . $data['nrp'] . '</td>
                                <td>' . $data['nama'] . '</td>
                                <td>' . $data['jurusan'] . '</td>
                                <td>' . $data['jenis_kelamin'] . '</td>
                                <td>' . $data['agama'] . '</td>
                                <td>' . $data['umur'] . '</td>
                                <td>' . $data['alamat'] . '</td>
                                <td>
                                    <a href="edit.php?id_mahasiswa=' . $data['id_mahasiswa'] . '" class="btn btn-warning">Edit</a>
                                    <a href="hapus.php?id_mahasiswa=' . $data['id_mahasiswa'] . '" class="btn btn-danger" onclick="return confirm(\'Apakah anda yakin ingin menghapus data ini?\')">Hapus</a>
                                </td>
                            </tr>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>