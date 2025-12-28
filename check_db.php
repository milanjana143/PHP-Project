<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$con = mysqli_connect("localhost","root","", "", 3306);
echo "Connected<br>";

$res = mysqli_query($con, "SHOW DATABASES");
echo "<pre>";
while($row = mysqli_fetch_row($res)){
    echo $row[0] . "\n";
}
echo "</pre>";
?>
