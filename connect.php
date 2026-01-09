<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$con = mysqli_connect("localhost", "root", "", "training");

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>

