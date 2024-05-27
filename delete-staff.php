<?php
session_start();

if(!isset($_SESSION['email'])){
    header("Location: auth/login.php");
    exit();
}
include_once ("./connect.php");
$id = $_GET['id'];
$query_get = mysqli_query($db, "DELETE FROM staff WHERE id= '$id' ");

header( 'Location: ./staff.php'); 
