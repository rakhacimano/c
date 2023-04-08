<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>

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

    <div class="container my-5 col-md-4">
        <h3>Edit Data Mahasiswa</h3>

        <?php
            include('koneksi.php');
            $id_mahasiswa = $_GET['id_mahasiswa'];
            
            $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_mahasiswa='$id_mahasiswa'");
            
            $nomor = 1;

            while($data = mysqli_fetch_assoc($query)){
        ?>
        <form method="post" action="" class="mx-auto">
            <div class="form-group my-3">
                <label for="nrp">NRP</label>
                <input type="text" class="form-control" id="nrp" name="nrp" required value="<?php echo $data['nrp'] ?>">
            </div>

            <div class="form-group my-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required value="<?php echo $data['nama'] ?>">
            </div>

            <div class="form-group my-3">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" required value="<?php echo $data['jurusan'] ?>">
            </div>

            <div class="form-group my-3">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="l" <?php echo $data['jenis_kelamin'] == 'l' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="p" <?php echo $data['jenis_kelamin'] == 'p' ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>

            <div class="form-group my-3">
                <label for="agama">Agama</label>
                <input type="text" class="form-control" id="agama" name="agama" required value="<?php echo $data['agama'] ?>">
            </div>

            <div class="form-group my-3">
                <label for="umur">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" required value="<?php echo $data['umur'] ?>">
            </div>

            <div class="form-group my-3">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required><?php echo $data['alamat'] ?></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>

        <?php
            if (isset($_POST['submit'])) {
                $nrp = $_POST['nrp'];
                $nama = $_POST['nama'];
                $jurusan = $_POST['jurusan'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $agama = $_POST['agama'];
                $umur = $_POST['umur'];
                $alamat = $_POST['alamat'];
    
                mysqli_query($koneksi, "UPDATE mahasiswa SET nrp='$nrp', nama='$nama', jurusan='$jurusan', jenis_kelamin='$jenis_kelamin', agama='$agama', umur='$umur', alamat='$alamat' WHERE id_mahasiswa='$id_mahasiswa'");
    
                header("location: index.php");
            }
        }
        ?>
    </div>
</body>

</html>