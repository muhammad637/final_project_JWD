<?php
require "function.php";
session_start();
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id']; 
    $key = $_COOKIE['key']; 
    $query = mysqli_query($conn, "SELECT nama FROM USER WHERE id = '$id'"); 
    $row =  mysqli_fetch_assoc($query);
    // cek apakah usernma dan id sama
    if($key === hash('sha256', $row['nama']) ){
        $_SESSION['login'] = true;
    }
}

if(isset($_SESSION['login'])){
    header("Location: index.php");
}


if(isset($_POST["login"])){
    // global $conn;
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM USER where nama = '$username'";
    $result = mysqli_query($conn, "SELECT * FROM USER WHERE nama = '$username'");
    if(mysqli_num_rows($result) === 1 ){
        // cek Password 
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            // cek remember me
           

            $_SESSION["login"] = true;

            if(isset($_POST['remember'])){
                setcookie('id',$row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['nama']), time() + 60);
            }
           echo  "<script> alert('registrasi berhasil') 
           </script>";
           header("Location: index.php");
            exit;
        }else{
            echo  "<script> alert('login gagal') 
            // document.location.href= 'index.php' ;
            </script>";
        }
    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
    <?php include('partials/link.php');?>
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
    <!-- <h1>halaman Login</h1> -->
   

    
    <main class="form-signin w-100 m-auto">
        <form action="" method="POST">
            <h1 class="h3 mb-3 fw-normal">Please Login</h1>
            <?php if(isset($error)): ?>
                <p style="color:red;font-size:12px;font-style:italic;"> username / password salah</p>
            <?php endif ?>

            <div class="form-floating">
                <input type="text" class="form-control" name="username" id="username" placeholder="username"
                    autocomplete="off">
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember" name="remember" id="remember"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
            <p class="mt-2 mb-3 text-muted">tidak punya akun <a href="register.php"
                    class="text-decoration-none text-italic"> registrasi</a> sekarang</p>
        </form>
    </main>
    <!-- <form action="" method="POST"> -->

        <!-- <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td><input type="text" name="username" id="username" value="takim"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" id="password"value="123"></td>
            </tr>
            <tr>  
                <td><input type="checkbox" name="remember" id="remember" ></td>
                <td><label for="remember">Remember me</label></td>
            </tr>
            <tr>
                <td><button type="submit" name="login">Login</button></td>
            </tr>
        </table> -->
    </form>
</body>
</html>