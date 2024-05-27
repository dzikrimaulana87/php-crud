<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: auth/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman utama</title>
</head>
<body>
    <h1>Aplikasi Perpustakaan</h1>

    <a href="buku.php">Lihat daftar buku</a>
    <br>
    <a href="staff.php">Lihat daftar staff</a>

    <form action="auth/logout.php" method="post">
        <button type="submit">Logout</button>
    </form>

    
</body>
</html>