<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: auth/login.php");
    exit();
}
include_once ("./connect.php");

$id = $_GET['id'];

$query_get = mysqli_query($db, "SELECT * FROM staff WHERE id=$id");

$data = mysqli_fetch_assoc($query_get);

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];

    $query = mysqli_query($db, "UPDATE staff SET nama='$nama', telp='$telp', email='$email' WHERE id='$id'");

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff</title>
</head>

<body>
    <form action="edit-staff.php?id=<?php echo $id;?>" method="post">
        <label for="nama">Name: </label>
        <input type="text" name="nama" id="nama" value="<?php echo $data['nama'] ?>">
        <br>
        <br>

        <label for="telp">telp: </label>
        <input type="text" name="telp" id="telp" value="<?php echo $data['telp'] ?>">
        <br>
        <br>

        <label for="email">email: </label>
        <input type="email" name="email" id="nama" value="<?php echo $data['email'] ?>">

        <br>
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <br>
    <br>
    <a href="./staff.php">Kembali ke halaman staff</a>

</body>

</html>