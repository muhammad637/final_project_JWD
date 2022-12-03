<?php

require "../function.php";
$keyword = $_GET['keyword'];
$query = "SELECT * FROM MAHASISWA WHERE
     NAMA LIKE'%$keyword%' OR
     EMAIL LIKE'%$keyword%' OR
     JURUSAN LIKE'%$keyword%' OR
     NIM LIKE'%$keyword%' 
     ";
$mahasiswa = db($query);

?>
<table border="1" cellpadding="10" cellspacing="0" style="margin: auto;">
            <tr>
                <th>No</th>
                <th>aksi</th>
                <th>Gambar</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>email</th>
                <th>jurusan</th>


            </tr>
            <?php $i = 1 ?>
            <?php foreach ($mahasiswa as $dta) : ?>

            <tr>
                <td>
                    <?= $i ?>
                </td>
                <td><a href="update.php?id=<?= $dta["id"] ?>">ubah</a>|
                    <a href="hapus.php?id=<?= $dta["id"] ?>"
                        onclick=" return confirm('Are you sure you want to delete?');">hapus</a>
                </td>
                <td><img src="img/<?= $dta["gambar"]?>" height="40px" alt=""></td>
                <td><?= $dta["nim"] ?></td>
                <td><?= $dta["nama"] ?></td>
                <td><?= $dta["email"] ?></td>
                <td><?= $dta["jurusan"] ?></td>
                <?php $i++ ?>
            </tr>

            <?php endforeach ?>
        </table>