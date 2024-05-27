<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: auth/login.php");
    exit();
}
include_once("./connect.php");

if(isset($_POST["submit"])){
    $nama = $_POST["nama"];
    $isbn = $_POST["isbn"];
    $unit = $_POST["unit"];

    $query = mysqli_query($db, "INSERT INTO buku VALUES(
        NULL, '$nama',  '$isbn', $unit
    )");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
</head>

<body>
    <form action="tambah-buku.php" method="post">
        <label for="nama">Name: </label>
        <input type="text" name="nama" id="nama">
        <br>
        <br>

        <label for="isbn">ISBN: </label>
        <input type="text" name="isbn" id="isbn">
        <br>
        <br>

        <label for="unit">Unit: </label>
        <input type="number" name="unit" id="nama">

        <br>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <a href="./buku.php">Kembali ke halaman buku</a>
</body>

</html>