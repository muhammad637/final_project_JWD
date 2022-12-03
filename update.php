<?php

session_start();
if(!isset($_SESSION["login"])){
     header("Location: login.php");
     exit();
}
require "function.php";
$id = $_GET["id"];
$mhs = db("SELECT * FROM mahasiswa where id = $id")[0];
// var_dump($mhs);
if (isset($_POST["submit"])) {
     if (ubah($_POST) > 0) {
          // echo "berhasil";
          echo "<script>
          alert('data berhasil diupdate');
          document.location.href = 'index.php';
          </script>";
     } else {
          // echo var_dump(mysqli_affected_rows($conn));
          echo "<script>
          alert('data gagal diupdate');
          document.location.href = 'index.php';
          </script>";
     }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <?php include('partials/link.php');?>
</head>
<body class="text-light">
<?php include('partials/header.php');?>
<div class="container position-absolute ms-5">
    <div class="col-md-6 bg-success p-4 rounded-1 mt-5 mb-5 m-auto" style="--bs-bg-opacity: .5;">
    <div class="mt-3 m-auto">
    <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
    <div class="mb-3">
      <label for="nim" class="form-label">NIM</label>
      <input type="number" class="form-control" id="nim" value="<?= $mhs['nim']?>" name="nim">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" value="<?= $mhs['nama']?>" name="nama">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" id="email" value="<?= $mhs['email']?>" name="email">
    </div>
    <div class="mb-3">
      <label for="nim" class="form-label">Jurusan</label>
      <input type="text" class="form-control" id="jurusan" value="<?= $mhs['jurusan']?>" name="jurusan">
    </div>
    <div class="mb-3">
  <label for="gambar" class="form-label">Image</label>
  <input class="form-control" type="file" id="gambar" value="<?= $mhs['gambar']?>" name="gambar">
</div>
<div class="d-flex justify-content-between">
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <button type="submit" class="btn btn-primary"><a href="index.php" class="text-decoration-none text-white">kembali</a></button>
    </div>  
</form>
    </div>
</div>
</div>

<div style="position: relative; z-index:-99">
    <img src="https://images.unsplash.com/photo-1549057446-9f5c6ac91a04?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1034&q=80" alt="" width="100%">
</div>
</body>
</html>
</body>
</html>