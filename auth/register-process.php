<?php

session_start();

include_once('./../connect.php');

if(isset($_POST['email']) && isset($_POST['password'])){

    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the email exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0){
        echo "Email already exists!";
    } else {
        // Email doesn't exist, so register it
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$pass')";
        if(mysqli_query($db, $sql)){
            echo "Registration successful!";
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
}
?>
