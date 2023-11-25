<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg-login" src="asset/bg-login.png" alt="-">
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <form action="function.php" method="POST" class="form-login rounded">
            <h4 class="img-guest text-light"><i class="fa fa-user-circle" aria-hidden="true"></i></h4>
            <div class="p-1">
                <input required class="rounded ps-5" type="text" name="username" id="" placeholder="Username">
            </div>
            <div class="p-1">
                <input required class="rounded ps-5 py-1" type="password" name="password" id="" placeholder="Password">
            </div>
            <input type="submit" name="login" value="Login" class="btn btn-primary my-5 rounded">
        </form>
    </div>
</body>
</html>