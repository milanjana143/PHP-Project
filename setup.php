<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$con = mysqli_connect("localhost","root","", "", 3306);
echo "Connected<br>";

mysqli_query($con,"CREATE DATABASE training");
echo "Database training CREATED<br>";

mysqli_select_db($con,"training");

mysqli_query($con,"
CREATE TABLE reg (
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
)");
echo "Table reg CREATED";
?>
