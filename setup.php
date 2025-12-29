<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// connect without DB
$con = mysqli_connect("localhost", "root", "");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// create database
mysqli_query($con, "CREATE DATABASE IF NOT EXISTS training");

// select database
mysqli_select_db($con, "training");

// drop old table
mysqli_query($con, "DROP TABLE IF EXISTS reg");

// create correct table
$sql = "CREATE TABLE reg (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    surname VARCHAR(50),
    email VARCHAR(50),
    contact VARCHAR(20),
    college VARCHAR(100),
    qualification VARCHAR(50),
    course VARCHAR(50),
    fees INT,
    paid INT,
    remaining INT
)";

if (mysqli_query($con, $sql)) {
    echo "Database & correct table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($con);
}
?>
