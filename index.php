<?php

session_start();

if(!isset($_SESSION["login"])){
     header("Location: login.php");
     exit();
}

require "function.php";
$mahasiswa = db("SELECT * FROM mahasiswa");
if (isset($_POST["key"])) 
{
     $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Belajar mysql dan PHP</title>
   <?php include('partials/link.php');?>
</head>

<body>
    <?php include('partials/header.php')?>
    <main class="container">
        <h1 class="text-center mt-5 mb-2">Daftar Mahasiswa</h1>
            <form class="col-md-6 m-auto" method="post">
                <input class="form-control me-2" name="keyword" id="keyword" type="search" placeholder="Cari Mahasiswa..."
                    aria-label="Search" autocomplete="off">
                <button class="btn btn-outline-success" type="key" name="key" id="tombol-cari">Search</button>
            </form>
            <div class="col-md-4 mt-2 mb-2">
                <div class="btn btn-success">
                    <a href="tambah.php" class="hilang text-decoration-none text-light">Tambah Mahasiswa</a>
                </div>

            </div>
        <!-- </div> -->

        <div class="table-responsive">
            <table class="table table-striped table-sm text-center">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">IMG</th>
                        <th scope="col">NIM</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">JURUSAN</th>
                        <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($mahasiswa as $dta) : ?>

                    <tr>
                        <td>
                            <?= $i ?>
                        </td>

                        <td><img src="img/<?= $dta["gambar"]?>" height="50px" alt=""></td>
                        <td>
                            <?= $dta["nim"] ?>
                        </td>
                        <td>
                            <?= $dta["nama"] ?>
                        </td>
                        <td>
                            <?= $dta["email"] ?>
                        </td>
                        <td>
                            <?= $dta["jurusan"] ?>
                        </td>
                        <td class="hilang"><a href="update.php?id=<?= $dta["id"] ?>" class="btn
                                btn-warning">ubah</a>
                            <a href="hapus.php?id=<?= $dta["id"] ?>" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete?');">hapus</a>
                        </td>
                        <?php $i++ ?>
                    </tr>

                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>