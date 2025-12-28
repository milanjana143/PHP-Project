<?php
include("connect.php");
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

<!-- Header -->
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

<!-- Menu -->
<table border="1" id="menu" width="80%" align="center">
<tr>
<td><a href="index.php">HOME</a></td>
<td><a href="reg.php">REGISTRATION</a></td>
<td><a href="view.php">STUDENT RECORD</a></td>
<td><a href="viewdel.php">EDIT</a></td>
</tr>
</table>

<!-- Records with Delete -->
<table border="1" bgcolor="white" width="80%" align="center">
<tr>
<td>

<table border="1" width="100%" cellpadding="10"
style="color:navy;font-size:18px;text-align:center;">

<tr style="background-color:#003366;color:white">
<td>First Name</td>
<td>Last Name</td>
<td>Email</td>
<td>Contact</td>
<td>College</td>
<td>Qualification</td>
<td>Course</td>
<td>Fees</td>
<td>Paid</td>
<td>Remaining</td>
<td>Delete</td>
</tr>

<?php
$qry = "SELECT * FROM reg";
$sql = mysqli_query($con, $qry);

while ($row = mysqli_fetch_assoc($sql)) {
?>
<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['surname']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['contact']; ?></td>
<td><?php echo $row['college']; ?></td>
<td><?php echo $row['qualification']; ?></td>
<td><?php echo $row['course']; ?></td>
<td><?php echo $row['fees']; ?></td>
<td><?php echo $row['paid']; ?></td>
<td><?php echo $row['remaining']; ?></td>
<td>
    <a href="delete.php?id=<?php echo $row['id']; ?>"
       onclick="return confirm('Are you sure you want to delete?')">
       Delete
    </a>
</td>
</tr>
<?php } ?>

</table>

</td>
</tr>
</table>

</body>
</html>
