<?php

require "function.php";
function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek password
    if($password !== $password2){
        echo "<script> alert('password tidak sama') </script>";
        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password); die();

    // tambahkan user ke database
    $query = "INSERT INTO  user VALUES('','$username','$email','$password')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);


}
if(isset($_POST["submit"])){
    if(registrasi($_POST) > 0 ){
        echo "<script> alert('registrasi berhasil') 
        document.location.href= 'login.php' ;
        </script>";
    }else{
        echo "<script> alert('anda gagal registrasi') 
        document.location.href= 'login.php' ;
        </script>";
        // var_dump(mysqli_error($conn));
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
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
<main class="container col-md-3 m-auto">
        <form action="" method="POST">
            <h1 class="h3 mb-3 fw-normal">Please Register</h1>

            <div class="form-floating">
                <input type="text" class="form-control rounded-0" autocomplete="off" name="username" id="username" placeholder="username"
                    autocomplete="off">
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control rounded-0" autocomplete="off" name="email" id="email" placeholder="email"
                    autocomplete="off">
                <label for="email">Email</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control rounded-0" autocomplete="off" name="password" id="password" placeholder="Password">
                <label for="password">Password</label>
            </div>

            <div class="form-floating">
                <input type="password2" class="form-control rounded-0" autocomplete="off" name="password2" id="password2" placeholder="Konfirmasi Password">
                <label for="password2">Konfirmasi Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-2" type="submit" name="submit">Register</button>
            <p class="mt-2 mb-3 text-muted">sudah punya akun? <a href="login.php"
                    class="text-decoration-none text-italic"> login</a> sekarang</p>
        </form>
    </main>
   
    <!-- <h1>Registration</h1>
    <form action="" method="post">
    <table>
        <tr>
            <td>
                <label for="username">UserName</label>
            </td>
            <td>
                <input type="text" name="username" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="email">email</label>
            </td>
            <td>
                <input type="email" name="email" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="password">Password</label>
            </td>
            <td>
                <input type="password" name="password" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="password2">Konfirmasi Password</label>
            </td>
            <td>
                <input type="password" name="password2" required>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" name="submit"> SignUp </button></td>
        </tr>
    </table>
    </form> -->
</body>

</html>