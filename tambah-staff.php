<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: auth/login.php");
    exit();
}
include_once("./connect.php");

if(isset($_POST["submit"])){
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];

    $query = mysqli_query($db, "INSERT INTO staff VALUES(
        NULL, '$nama',  '$telp', '$email'
    )");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="tambah-staff.php" method="post">
        <label for="nama">Nama: </label>
        <input type="text" name="nama" id="nama">
        <br>
        <br>

        <label for="telp">Telepon: </label>
        <input type="text" name="telp" id="telp">
        <br>
        <br>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email">

        <br>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <a href="./staff.php">Kembali ke halaman staff</a>

</body>

</html>