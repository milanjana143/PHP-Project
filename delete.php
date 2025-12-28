<?php
include("connect.php");

// get id from URL
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // delete query
    $qry = "DELETE FROM reg WHERE id = $id";

    // execute query (mysqli)
    $sql = mysqli_query($con, $qry);

    if ($sql) {
        echo "<script>
                alert('Record Deleted Successfully');
                window.location.href='viewdel.php';
              </script>";
    } else {
        echo "<script>alert('Delete Failed');</script>";
    }

} else {
    echo "<script>alert('Invalid Request');</script>";
}
?>
