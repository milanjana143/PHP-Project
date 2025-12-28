<?php
include("connect.php");

if (isset($_POST['btn'])) {

    $n  = $_POST['txtn'];
    $sn = $_POST['txtsn'];
    $e  = $_POST['txte'];
    $c  = $_POST['txtc'];
    $cn = $_POST['txtcn'];
    $q  = $_POST['txtq'];
    $co = $_POST['txtco'];
    $f  = $_POST['txtf'];
    $p  = $_POST['txtp'];

    // calculate remaining fees
    $r = $f - $p;

    // correct SQL with column names
    $qry = "INSERT INTO reg 
            (name, surname, email, contact, college, qualification, course, fees, paid, remaining)
            VALUES 
            ('$n','$sn','$e','$c','$cn','$q','$co','$f','$p','$r')";

    // ✅ mysqli_query (NOT mysql_query)
    $sql = mysqli_query($con, $qry);

    if ($sql) {
        echo "<script>alert('Data Saved Successfully');</script>";
    } else {
        echo "<script>alert('Data Not Saved');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
table { border-collapse: collapse; }
body { background-color:#666633; }
a { color:white; text-decoration:none; }
#menu td {
    width:13%;
    text-align:center;
    background-color:#666699;
    color:white;
    font-size:20px;
}
</style>
</head>

<body>

<table border="1" width="80%" align="center">
<tr>
<td width="10%" bgcolor="#00CCCC">
<img src="image/logo3.jpg" width="150" height="150">
</td>
<td bgcolor="#000000"
style="font-size:60px;color:red;font-variant:small-caps;
font-family:arial;text-shadow:4px 4px 4px white"
align="center">
Student Management System
</td>
</tr>
</table>

<table border="1" id="menu" width="80%" align="center">
<tr>
<td><a href="index.php">HOME</a></td>
<td><a href="reg.php">REGISTRATION</a></td>
<td><a href="view.php">STUDENT RECORD</a></td>
<td><a href="viewdel.php">EDIT</a></td>
</tr>
</table>

<table border="1" bgcolor="white" width="80%" align="center">
<tr>
<td align="center">

<fieldset style="width:400px;font-size:25px">
<legend>Registration Form</legend>

<form method="post"
oninput="txtr.value=parseInt(txtf.value||0)-parseInt(txtp.value||0)">

<table cellpadding="8" style="font-size:18px;color:navy">

<tr><td>Name</td><td><input type="text" name="txtn" required></td></tr>
<tr><td>Surname</td><td><input type="text" name="txtsn" required></td></tr>
<tr><td>Email</td><td><input type="email" name="txte" required></td></tr>
<tr><td>Contact</td><td><input type="text" name="txtc" required></td></tr>
<tr><td>College</td><td><input type="text" name="txtcn" required></td></tr>
<tr><td>Qualification</td><td><input type="text" name="txtq" required></td></tr>
<tr><td>Course</td><td><input type="text" name="txtco" required></td></tr>
<tr><td>Fees</td><td><input type="number" name="txtf" required></td></tr>
<tr><td>Paid</td><td><input type="number" name="txtp" required></td></tr>
<tr><td>Remaining</td><td><input type="number" name="txtr" readonly></td></tr>

<tr>
<td></td>
<td><input type="submit" name="btn" value="Save"></td>
</tr>

</table>
</form>
</fieldset>

</td>
</tr>
</table>

</body>
</html>
