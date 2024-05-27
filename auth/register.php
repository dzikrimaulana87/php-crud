<?php
session_start();

if(isset($_SESSION['email'])){
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    <h2>register</h2>
    <form method="post" action="./register-process.php">
        <label for="email">Email</label><br>
        <input name="email" id="email" type="email"><br>

        <label for="password">Password</label><br>
        <input name="password" id="password" type="password"><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>