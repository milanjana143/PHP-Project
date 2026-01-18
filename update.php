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
    <h1>Update Student Record</h1>
    <p style="font-size:17px;">Edit and update student information.</p>

    <form method="post"
    oninput="txtr.value=parseInt(txtf.value||0)-parseInt(txtp.value||0)">

        <!-- PERSONAL -->
        <div class="section">
            <h3 style="font-size:25px; font-weight:650; color:#1f3c88;">Personal Information :</h3>
            <div class="grid-2">
                <div class="field">
                    <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Name</label>
                    <input type="text" name="txtn" value="<?php echo $row['name']; ?>" required>
                </div>
                <div class="field">
                    <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Surname</label>
                    <input type="text" name="txtsn" value="<?php echo $row['surname']; ?>" required>
                </div>
                <div class="field">
                    <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Email</label>
                    <input type="email" name="txte" value="<?php echo $row['email']; ?>" required>
                </div>
                <div class="field">
                    <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Contact</label>
                    <input type="text" name="txtc" value="<?php echo $row['contact']; ?>">
                </div>
            </div>
        </div>

        <!-- ACADEMIC -->
        <div class="section">
            <h3 style="font-size:25px; font-weight:650; color:#1f3c88;">Academic Information :</h3>
            <div class="grid-2">
                <div class="field">
                    <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">College</label>
                    <input type="text" name="txtcn" value="<?php echo $row['college']; ?>">
                </div>

                <div class="field">
                    <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Qualification</label>
                    <input type="text" name="txtq" value="<?php echo $row['qualification']; ?>">
                    
                </div>
                
                <div class="field">
                    <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Course</label>
                    <input type="text" name="txtco" value="<?php echo $row['course']; ?>">
                </div>
            </div>
        </div>

        <!-- FEES -->
        <div class="section">
            <h3 style="font-size:25px; font-weight:650; color:#1f3c88;">Fees Information :</h3>
            <div class="grid-3">
                <div class="field">
                    <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Fees</label>
                    <input type="number" name="txtf" value="<?php echo $row['fees']; ?>">
                </div>
                <div class="field">
                    <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Paid</label>
                    <input type="number" name="txtp" value="<?php echo $row['paid']; ?>">
                </div>
                <div class="field">
                    <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Remaining</label>
                    <input type="number" name="txtr" value="<?php echo $row['remaining']; ?>" readonly>
                </div>
            </div>
        </div>


        <h3 style="font-size:25px; font-weight:650; color:#1f3c88;">Terms & Conditions :</h3><br>

        <p style="display:block; margin-bottom:5px; font-size:15px; color:black;">
        Before making any changes to student information, please read the following terms and conditions
        carefully. These guidelines are designed to protect the accuracy, privacy, and integrity of
        student records maintained by the institution. By proceeding with the update process, you agree
        to follow all rules stated below.
        </p> <br>

        <div style="max-height:650px; overflow-y:auto; border:1px solid #ccc; padding:12px; border-radius:8px; background:#f9f9f9;">

            <ul style="font-size:15px; color:#555; line-height:1.7; padding-left:20px; margin-bottom:15px;">
            <li>All information entered or modified must be accurate, complete, and up to date.</li>
            <li>Providing false, misleading, or incomplete details may affect official student records.</li>
            <li>Proper authorization is required before editing, deleting, or accessing any student data.</li>
            <li>Every change made in the system is logged and stored for record-keeping and audit purposes.</li>
            <li>Unauthorized access or modification of student records is treated as a serious policy violation.</li>
            <li>Misuse of the system, including intentional data manipulation, may result in disciplinary action.</li>
            <li>Access privileges may be suspended or revoked in cases of repeated or severe misuse.</li>
            <li>Legal action may be taken if student data is altered, shared, or handled irresponsibly.</li>
            <li>Confidentiality of student information must be maintained at all times.</li>
            <li>Any technical or data-related issues should be reported immediately to the system administrator.</li>
            <li>System access is granted only for official academic and administrative purposes.</li>
            <li>Sharing login credentials or allowing unauthorized users to access the system is strictly prohibited.</li>
            <li>All users are responsible for protecting sensitive student data from accidental or intentional exposure.</li>
            <li>Edits made to student records should follow institutional guidelines and approval procedures.</li>
            <li>Any attempt to bypass system security or controls will be treated as a serious offense.</li>
            <li>Regular audits may be conducted to ensure compliance with data protection policies.</li>
            <li>Failure to comply with institutional rules may lead to restricted system access.</li>
            <li>All activities performed in the system are subject to monitoring for security purposes.</li>
            <li>Students’ personal and academic information must be handled with care and professionalism.</li>
            <li>In case of uncertainty, guidance should be sought from authorized staff before making changes.</li>
            <li>All updates should be reviewed carefully before final submission to avoid accidental errors.</li>
            <li>Changes made to student records cannot be reversed once officially approved.</li>
            <li>Only authorized staff members are permitted to handle sensitive academic data.</li>
            <li>Any form of data duplication or unauthorized copying is strictly prohibited.</li>
            <li>Records must be updated in accordance with institutional data protection policies.</li>
            <li>Users are expected to log out after completing their work to maintain system security.</li>
            <li>Any unusual system behavior should be reported immediately to technical support.</li>
            <li>Editing privileges may vary depending on user roles and access levels.</li>
            <li>All information handled through this system must comply with privacy regulations.</li>
            <li>Failure to follow proper data-handling procedures may result in restricted system access.</li>

            </ul>
        </div>   <br> 

        <p style="display:block; margin-bottom:5px; font-size:15px; color:black;">
        If you do not agree with these terms and conditions, please do not proceed with editing the student
        information. For any clarification regarding data usage or access rights, kindly contact the
        system administrator or the college office.
        </p>

        <div style="margin-top:12px;">
        <label style="display:block; margin-bottom:5px; font-weight:600; font-size:17px; color:black;">
        <input type="checkbox" name="accept_terms" required
            style="transform:scale(1.3); margin-top:3px;">
        &nbsp I have read and agree to the Terms & Conditions for editing student data. *
        </label>
        </div> <br>




        <div class="buttons">
            <button type="submit" name="btn" class="btn-submit" style="font-size:19px;">Update Record</button>
            <button type="button" class="btn-back" onclick="window.location='viewdel.php'"  style="font-size:19px; font-weight:600">
                Cancel
            </button>
        </div>

    </form>
</div>


<div class="footer">
    <div class="footer-content">
        <div><h3>TIMT</h3><p>Where education meets innovation.</p></div>

        <div>
            <h3>Social Links</h3>
            <div style="margin-top:15px; display:flex; gap:14px;">
                <a href="https://www.facebook.com/timttmluk" target="_blank"><img src="images/fb.png" style="width:28px;height:28px;border-radius:50%;"></a>
                <a href="https://www.instagram.com/tamralipta_inst_of_man_nd_tech" target="_blank"><img src="images/insta.png" style="width:28px;height:28px;border-radius:50%;"></a>
                <a href="https://www.youtube.com/@tamraliptainstituteofmanag3871" target="_blank"><img src="images/yt.png" style="width:28px;height:28px;border-radius:50%;"></a>
            </div>
        </div>

        <div><h3>Contact</h3><p>Email: timt.institute@gmail.com</p><p>Phone: +91 8697511132</p></div>
    </div>

    <div class="footer-bottom">
        Copyright © 2025 timt.infinityfreeapp.com - All Rights Reserved || Developed by 
        <a href="https://milan-jana-portfolio.vercel.app/" target="_blank"
           style="color:#fff;background:#1f3c88;padding:6px 12px;border-radius:20px;text-decoration:none;font-weight:600;">
           Milan Jana
        </a>
    </div>
</div>



</body>
</html>
