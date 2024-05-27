<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: auth/login.php");
    exit();
}
include_once ("./connect.php");

$id = $_GET['id'];

$query_get = mysqli_query($db, "SELECT * FROM buku WHERE id=$id");

$data = mysqli_fetch_assoc($query_get);

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $isbn = $_POST["isbn"];
    $unit = $_POST["unit"];

    $query = mysqli_query($db, "UPDATE buku SET nama='$nama', isbn='$isbn', unit=$unit WHERE id='$id'");

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>

<body>
    <form action="edit-buku.php?id=<?php echo $id;?>" method="post">
        <label for="nama">Name: </label>
        <input type="text" name="nama" id="nama" value="<?php echo $data['nama'] ?>">
        <br>
        <br>

        <label for="isbn">ISBN: </label>
        <input type="text" name="isbn" id="isbn" value="<?php echo $data['isbn'] ?>">
        <br>
        <br>

        <label for="unit">Unit: </label>
        <input type="number" name="unit" id="nama" value="<?php echo $data['unit'] ?>">

        <br>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <br>
    <br>
    <a href="./buku.php">Kembali ke halaman buku</a>

</body>

</html>