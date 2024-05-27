<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: auth/login.php");
    exit();
}

include_once ("./connect.php");

$query = mysqli_query($db, "SELECT * from buku");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Buku</title>

</head>

<body>
    <h1>Daftar Buku</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>ISBN</th>
            <th>Unit</th>
            <th>Edit</th>
        </tr>
        <?php foreach ($query as $buku): ?>
            <tr>
                <td><?php echo $buku['nama']; ?></td>
                <td><?php echo $buku['isbn']; ?></td>
                <td><?php echo $buku['unit']; ?></td>
                <td>
                    <a href="edit-buku.php?id=<?php echo $buku["id"]; ?>">Ubah Data</a> |
                    <a href="delete-buku.php?id=<?php echo $buku["id"] ?>"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus buku?')">Hapus Buku</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="index.php">Kembali ke halaman utama</a>
    <br>
    <a href="tambah-buku.php">Tambah buku</a>


</body>

</html>