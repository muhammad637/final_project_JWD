<?php
$conn = mysqli_connect("localhost", "root", "", "belajar_php");

function db($syntax)
{
     global $conn;
     $rows = [];
     $result = mysqli_query($conn, $syntax);
     while ($row = mysqli_fetch_assoc($result)) {
          $rows[] = $row;
     }
     return $rows;
}

function tambah($data)
{
     global $conn;
     $nim = htmlspecialchars($data["nim"]);
     $nama = htmlspecialchars($data["nama"]);
     $email = htmlspecialchars($data["email"]);
     $jurusan = htmlspecialchars($data["jurusan"]);
     // mengambil data gambar
     $gambar = upload();
     if(!$gambar){
          return false;
     }
     $query = "INSERT INTO mahasiswa VALUES ('','$nim','$nama','$email','$jurusan','$gambar')";
     mysqli_query($conn, $query);
     return mysqli_affected_rows($conn);
     // return mysql_error($conn);
}
function upload(){
     $namaFile = $_FILES["gambar"]["name"];
     $sizeFile = $_FILES["gambar"]["size"];
     $errorFile = $_FILES["gambar"]["error"];
     $tmpFile = $_FILES["gambar"]["tmp_name"];
   

     if($errorFile == 4){
          echo "<script>alert('gambar belum ditambahkan')</script>";
          return false;
     }
     // cek apakah gamabar valid
     $ekstensiGambar = ["jpg", "png", "jpeg"];
     $eksGambar = explode('.', $namaFile);
     $eksGambar = strtolower(end($eksGambar));
     if(!in_array($eksGambar, $ekstensiGambar)){
          echo "<script>alert('yang anda upload bukan gambar')</script>";
          return false;
     }

     // cek maksimal upload gambar
     $mb = 1000000;
     if($sizeFile > 5*$mb ){
          echo "<script>alert('harap upload gambar kurang dari 5mb')</script>";
          return false; 
     }
     // generate nama Random
     $namaBaru = uniqid();
     $namaBaru .= ".";
     $namaBaru .= $eksGambar;


     move_uploaded_file($tmpFile, 'img/'. $namaBaru);
     return $namaBaru;

}


function ubah($data)
{
     global $conn;
     $id = $data["id"];
     $nim = htmlspecialchars($_POST["nim"]);
     $nama = $_POST["nama"];
     $email = htmlspecialchars($_POST["email"]);
     $jurusan = htmlspecialchars($_POST["jurusan"]);
     $gambar = upload();
     if(!$gambar){
          return false;
     }
     $query = "UPDATE MAHASISWA  
     SET NIM = '$nim',
     email = '$email',
     jurusan = '$jurusan',
     gambar = '$gambar',
     Nama = '$nama' 
     WHERE id = $id";
     mysqli_query($conn, $query);
     return mysqli_affected_rows($conn);
}

function hapus($id)
{
     global $conn;
     $delete = "DELETE FROM mahasiswa where id = $id";
     mysqli_query($conn, $delete);
     return mysqli_affected_rows($conn);
}
function cari($keyword)
{

     $query = "SELECT * FROM MAHASISWA WHERE
     NAMA LIKE'%$keyword%' OR
     EMAIL LIKE'%$keyword%' OR
     JURUSAN LIKE'%$keyword%' OR
     NIM LIKE'%$keyword%' 
     ";
     return db($query);
}


?>
