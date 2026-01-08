<?php
include("connect.php");

/* Get ID from URL */
$id = $_GET['id'] ?? '';

if ($id == '') {
    header("location:viewdel.php");
    exit;
}

/* Fetch existing record */
$qry = "SELECT * FROM reg WHERE id='$id'";
$sql = mysqli_query($con, $qry);
$row = mysqli_fetch_assoc($sql);

/* Update record */
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
    $r  = $f - $p;

    $update = "UPDATE reg SET
                name='$n',
                surname='$sn',
                email='$e',
                contact='$c',
                college='$cn',
                qualification='$q',
                course='$co',
                fees='$f',
                paid='$p',
                remaining='$r'
               WHERE id='$id'";

    if (mysqli_query($con, $update)) {
        echo "<script>
                alert('Record Updated Successfully');
                window.location='viewdel.php';
              </script>";
    } else {
        echo "<script>alert('Update Failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>TIMT Student DB</title>
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", Arial, sans-serif;
}

body{
    background:#f4f6fb;
}


/* ===== BACKGROUND IMAGE BEHIND FORM ===== */
body{
    position: relative;
    background: #f4f6fb;
}

body::before{
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("images/college.jpg") no-repeat center center / cover;
    opacity: 0.4;
    z-index: -1;
}


/* ===== NAVBAR ===== */
.navbar{
    background:linear-gradient(90deg,#0f2027,#203a43,#2c5364);
    color:white;
    padding:15px 50px;
    display:flex;
    align-items:center;
    justify-content:space-between;
}

.logo{
    display:flex;
    align-items:center;
    gap:12px;
}

.logo img{
    width:52px;
    height:52px;
}

.logo h2{
    font-size:22px;
}

.logo span{
    font-size:14px;
    opacity:0.8;
}

.nav-links a{
    color:white;
    text-decoration:none;
    margin-left:20px;
    padding:8px 18px;
    border-radius:20px;
    transition:0.3s;
}

.nav-links a.active,
.nav-links a:hover{
    background:white;
    color:#203a43;
}

.nav-links{
    display:flex;
    align-items:center;
}


/* ================= NAVBAR RESPONSIVE ================= */

    @media(max-width:768px){

  .navbar{
    padding:15px 20px;
    flex-direction:column;
    align-items:center;
  }

  .logo{
    flex-direction:column;
    text-align:center;
  }

  /* 🔥 THIS WAS MISSING */
  .nav-links{
    width:100%;
    display:grid;                         /* change layout */
    grid-template-columns:repeat(2,1fr);  /* 2 buttons per row */
    gap:10px;
    margin-top:12px;
  }

  .nav-links a{
    margin:0;
    padding:10px 6px;
    font-size:13px;
    text-align:center;
    white-space:normal;                  /* allow wrapping */
  }
}

/* ===== FORM CARD ===== */
.form-wrapper{
    max-width:900px;
    margin:50px auto;
    background:white;
    padding:35px;
    border-radius:16px;
    box-shadow:0 10px 35px rgba(0,0,0,0.15);
}

.form-wrapper h2{
    margin-bottom:6px;
}

.form-wrapper p{
    color:#666;
    margin-bottom:25px;
}

.section{
    margin-bottom:30px;
}

.section h3{
    margin-bottom:15px;
}

.grid-2{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:18px;
}

.grid-3{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
}

.field{
    display:flex;
    flex-direction:column;
}

.field label{
    font-size:14px;
    font-weight:600;
    min-height:18px;
}

.field input,
.field select{
    margin-top:8px;
    padding:13px 14px;
    border:none;
    border-radius:10px;
    background:#f2f2f2;
    font-size:14px;
    height:46px;
}

.field input[readonly]{
    background:#e6e6e6;
}

/* BUTTONS */
.buttons{
    display:flex;
    gap:15px;
}

.buttons button{
    flex:1;
    padding:14px;
    border:none;
    border-radius:10px;
    font-size:15px;
    cursor:pointer;
}

.btn-submit{
    background:linear-gradient(90deg,#000,#1f3c88);
    color:white;
}

.btn-back{
    background:#ddd;
}

/* RESPONSIVE */
@media(max-width:768px){
    .grid-2,.grid-3{
        grid-template-columns:1fr;
    }
}


/* ===== FOOTER (FROM INDEX.PHP) ===== */
.footer{
    background:#0f2027;
    color:white;
    padding:10px 50px;
}

.footer-content{
    display:flex;
    justify-content:space-between;
    flex-wrap:wrap;
}

.footer h3{
    margin: bottom 6px;
}

.footer a{
    color:#ddd;
    text-decoration:none;
}

.footer-bottom{
    text-align:center;
    margin-top:20px;
    border-top:1px solid #333;
    padding-top:13px;
    padding-bottom:10px;
    font-size:14px;
}

/* RESPONSIVE */
/* @media(max-width:768px){
    .grid-2,.grid-3{
        grid-template-columns:1fr;
    }
} */


</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">
        <img src="images/logo.png">
        <div>
            <h2>Tamralipta Institute of Management & Technology</h2>
            <span>ESTD 2007 &nbsp•&nbsp MAKAUT University</span>
        </div>
    </div>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="reg.php">Registration</a>
        <a href="view.php">Student Records</a>
        <a href="viewdel.php" class="active">Manage Records</a>
    </div>
</div>

<!-- FORM -->
<div class="form-wrapper">
    <h2>Update Student Record</h2>
    <p>Edit and update student information</p>

    <form method="post"
    oninput="txtr.value=parseInt(txtf.value||0)-parseInt(txtp.value||0)">

        <!-- PERSONAL -->
        <div class="section">
            <h3>Personal Information</h3>
            <div class="grid-2">
                <div class="field">
                    <label>Name</label>
                    <input type="text" name="txtn" value="<?php echo $row['name']; ?>" required>
                </div>
                <div class="field">
                    <label>Surname</label>
                    <input type="text" name="txtsn" value="<?php echo $row['surname']; ?>" required>
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="txte" value="<?php echo $row['email']; ?>" required>
                </div>
                <div class="field">
                    <label>Contact</label>
                    <input type="text" name="txtc" value="<?php echo $row['contact']; ?>">
                </div>
            </div>
        </div>

        <!-- ACADEMIC -->
        <div class="section">
            <h3>Academic Information</h3>
            <div class="grid-2">
                <div class="field">
                    <label>College</label>
                    <input type="text" name="txtcn" value="<?php echo $row['college']; ?>">
                </div>

                <div class="field">
                    <label>Qualification</label>
                    <input type="text" name="txtq" value="<?php echo $row['qualification']; ?>">
                    
                </div>
                
                <div class="field">
                    <label>Course</label>
                    <input type="text" name="txtco" value="<?php echo $row['course']; ?>">
                </div>
            </div>
        </div>

        <!-- FEES -->
        <div class="section">
            <h3>Fee Information</h3>
            <div class="grid-3">
                <div class="field">
                    <label>Fees</label>
                    <input type="number" name="txtf" value="<?php echo $row['fees']; ?>">
                </div>
                <div class="field">
                    <label>Paid</label>
                    <input type="number" name="txtp" value="<?php echo $row['paid']; ?>">
                </div>
                <div class="field">
                    <label>Remaining</label>
                    <input type="number" name="txtr" value="<?php echo $row['remaining']; ?>" readonly>
                </div>
            </div>
        </div>

        <div class="buttons">
            <button type="submit" name="btn" class="btn-submit">Update Record</button>
            <button type="button" class="btn-back" onclick="window.location='viewdel.php'">
                Cancel
            </button>
        </div>

    </form>
</div>


<div class="footer">
    <div class="footer-content">
        <div><h3>TIMT</h3><p>Where education meets innovation.</p></div>

        <div>
            <h3>Quick Links</h3>
            <div style="margin-top:15px; display:flex; gap:14px;">
                <a href="https://www.facebook.com/timttmluk" target="_blank"><img src="images/fb.png" style="width:28px;height:28px;border-radius:50%;"></a>
                <a href="https://www.instagram.com/tamralipta_inst_of_man_nd_tech" target="_blank"><img src="images/insta.png" style="width:28px;height:28px;border-radius:50%;"></a>
                <a href="https://www.youtube.com/@tamraliptainstituteofmanag3871" target="_blank"><img src="images/yt.png" style="width:28px;height:28px;border-radius:50%;"></a>
            </div>
        </div>

        <div><h3>Contact</h3><p>Email: timt.institute@gmail.com</p><p>Phone: +91 8697511132</p></div>
    </div>

    <div class="footer-bottom">
        © 2025 College Portal || Developed by 
        <a href="https://milan-jana-portfolio.vercel.app/" target="_blank"
           style="color:#fff;background:#1f3c88;padding:6px 12px;border-radius:20px;text-decoration:none;font-weight:600;">
           Milan Jana
        </a>
    </div>
</div>



</body>
</html>
