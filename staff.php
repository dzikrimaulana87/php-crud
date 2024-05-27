<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: auth/login.php");
    exit();
}
include_once ("./connect.php");

$query = mysqli_query($db, "SELECT * from staff");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Staff</title>
</head>

<body>
    <h1>ini staff</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Edit</th>
        </tr>
        <?php foreach ($query as $staff): ?>
            <tr>
                <td><?php echo $staff['nama']; ?></td>
                <td><?php echo $staff['telp']; ?></td>
                <td><?php echo $staff['email']; ?></td>
                <td>
                    <a href="edit-staff.php?id=<?php echo $staff["id"]; ?>">Ubah Data</a> |
                    <a href="delete-staff.php?id=<?php echo $staff["id"] ?>"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus staff?')">Hapus Staff</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="index.php">Kembali ke halaman utama</a>
    <br>
    <br>
    <a href="tambah-staff.php">Tambah staff</a>


</body>

</html>