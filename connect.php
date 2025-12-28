<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$con = mysqli_connect("localhost", "root", "", "training", 3306);

if (!$con) {
    die("Database connection failed");
}
?>
