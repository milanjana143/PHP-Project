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

    $r = $f - $p;

    $qry = "INSERT INTO reg
            (name, surname, email, contact, college, qualification, course, fees, paid, remaining)
            VALUES
            ('$n','$sn','$e','$c','$cn','$q','$co','$f','$p','$r')";

    if (mysqli_query($con, $qry)) {
        echo "<script>alert('Student Registered Successfully');</script>";
    } else {
        echo "<script>alert('Registration Failed');</script>";
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
/* ===== RESET ===== */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", Arial, sans-serif;
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
    opacity: 0.4;              /* 👈 control image visibility */
    z-index: -1;
}


/* ===== NAVBAR (FROM INDEX.PHP) ===== */
/* ================= HEADER / NAVBAR ================= */
/* ================= NAVBAR ================= */
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

/* GRID */
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
    min-height:18px;     /* 🔥 keeps all labels aligned */
}

.field input,
.field select{
    margin-top:8px;
    padding:13px 14px;
    border:none;
    border-radius:10px;
    background:#f2f2f2;
    font-size:14px;
    height:46px;         /* 🔥 same height for all inputs */
}


.field input,
.field select{
    margin-top:6px;
    padding:12px;
    border:none;
    border-radius:10px;
    background:#f2f2f2;
    font-size:14px;
}

.field input[readonly]{
    background:#e6e6e6;
}

/* BUTTONS */
.buttons{
    display:flex;
    gap:15px;
    margin-top:20px;
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

.btn-clear{
    background:white;
    border:1px solid #ccc;
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
@media(max-width:768px){
    .grid-2,.grid-3{
        grid-template-columns:1fr;
    }
}
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
        <a href="reg.php" class="active">Registration</a>
        <a href="view.php">Student Records</a>
        <a href="viewdel.php">Manage Records</a>
    </div>
</div>

<!-- FORM -->
<div class="form-wrapper">
    <h1>Student Registration Form</h1>
    <p>Please fill in all the required information to register a new student.</p>

    <form method="post"
    oninput="txtr.value=parseInt(txtf.value||0)-parseInt(txtp.value||0)">

        <!-- PERSONAL -->
        <div class="section">
            <h3 style="font-size:25px; font-weight:650; color:#1f3c88;">Personal Information : </h3>
            <div class="grid-2">
                <div class="field">
                    <label >Name *</label>
                    <input type="text" name="txtn" required placeholder="Enter first name">
                </div>
                <div class="field">
                    <label>Surname *</label>
                    <input type="text" name="txtsn" required placeholder="Enter surname">
                </div>
                <div class="field">
                    <label>Email *</label>
                    <input type="email" name="txte" required placeholder="student@example.com">
                </div>
                <div class="field">
                    <label>Contact *</label>
                    <input type="text" name="txtc" required placeholder="+91 0000000000">
                </div>
            </div>
        </div>

        <!-- ACADEMIC -->
        <div class="section">
            <h3 style="font-size:25px; font-weight:650; color:#1f3c88;">Academic Information : </h3>
            <div class="grid-2">
                <div class="field">
                    <label>College *</label>
                    <input type="text" name="txtcn" required placeholder="Enter college name">
                </div>
                <div class="field">
                    <label>Qualification *</label>
                    <select name="txtq" required>
                        <option value="">Select qualification</option>
                        <option>Ph. D</option>
                        <option>Master Degree</option>
                        <option>Bachelor Degree</option>
                        <option>Higher Secondary</option>
                        <option>Madhyamik</option>
                    </select>
                </div>
                <div class="field">
                    <label>Course *</label>
                    <select name="txtco" required>
                        <option value="">Select course</option>
                        <option>BCA</option>
                        <option>BBA</option>
                        <option>BHM</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- FEES -->
        <div class="section">
            <h3 style="font-size:25px; font-weight:650; color:#1f3c88;">Fees Information :</h3>
            <div class="grid-3">
                <div class="field">
                    <label>Fees *</label>
                    <input type="number" name="txtf" required placeholder="Total fees">
                </div>
                <div class="field">
                    <label>Paid *</label>
                    <input type="number" name="txtp" value="0" min="0">
                </div>
                <div class="field">
                    <label>Remaining</label>
                    <input type="number" name="txtr" readonly value="0">
                </div>
            </div>
        </div>


            <h3 style="font-size:25px; font-weight:650; color:#1f3c88;">Personal Feedback :</h3> <br>
            <!-- <div style="display:flex; flex-wrap:wrap; gap:10px; margin-bottom:15px;">
                <div style="flex:1; min-width:200px;">
                <label for="firstName" style="display:block; margin-bottom:5px; font-weight:bold; color:#555;">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; box-sizing:border-box; font-size:14px;">
                </div>
                <div style="flex:1; min-width:200px;">
                <label for="lastName" style="display:block; margin-bottom:5px; font-weight:bold; color:#555;">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; box-sizing:border-box; font-size:14px;">
                </div>
            </div>
            <div style="display:flex; flex-wrap:wrap; gap:10px; margin-bottom:15px;">
                <div style="flex:1; min-width:200px;">
                <label for="email" style="display:block; margin-bottom:5px; font-weight:bold; color:#555;">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; box-sizing:border-box; font-size:14px;">
                </div>
                <div style="flex:1; min-width:200px;">
                <label for="contact" style="display:block; margin-bottom:5px; font-weight:bold; color:#555;">Contact Number</label>
                <input type="tel" id="contact" name="contact" placeholder="Enter your phone number" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; box-sizing:border-box; font-size:14px;">
                </div>
            </div> -->
            

            <!-- <h2 style="font-size:18px; margin-bottom:10px; color:#333;">Feedback Questions</h2> -->


            <div style="margin-bottom:15px;">
                <label for="referral" style="display:block; margin-bottom:5px; font-size:22px; font-weight:550; color:black;">How did you hear about our college?</label>
                <select id="referral" name="referral" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px; background-color:#f9f9f9; font-size:14px;">
                <option value="" disabled selected>Select an option</option>
                <option value="friend">Friend or Family</option>
                <option value="friend">Teacher</option>
                <option value="online">Online Search</option>
                <option value="social">Social Media</option>
                <option value="advertisement">Advertisement</option>
                <option value="other">Other</option>
                </select>
            </div>
            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Was the registration process easy to understand?</label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="reg" value="yes" style="margin-right:5px; cursor:pointer;"> Yes
                </label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="reg" value="no" style="margin-right:5px; cursor:pointer;"> No
                </label>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Did you get clear guidance during admission?</label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="guide" value="yes" style="margin-right:5px; cursor:pointer;"> Yes
                </label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="guide" value="no" style="margin-right:5px; cursor:pointer;"> No
                </label>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Were the staff members helpful?</label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="staff" value="yes" style="margin-right:5px; cursor:pointer;"> Yes
                </label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="staff" value="no" style="margin-right:5px; cursor:pointer;"> No
                </label>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Did you face any difficulty while submitting documents?</label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="diff" value="yes" style="margin-right:5px; cursor:pointer;"> Yes
                </label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="diff" value="no" style="margin-right:5px; cursor:pointer;"> No
                </label>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Was the admission procedure completed on time?</label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="addmission" value="yes" style="margin-right:5px; cursor:pointer;"> Yes
                </label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="addmission" value="no" style="margin-right:5px; cursor:pointer;"> No
                </label>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Do you like extra-curricular activities?</label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="curr" value="yes" style="margin-right:5px; cursor:pointer;"> Yes
                </label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="curr" value="no" style="margin-right:5px; cursor:pointer;"> No
                </label>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Do you have any physical disabilities?</label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="disab" value="yes" style="margin-right:5px; cursor:pointer;"> Yes
                </label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="disab" value="no" style="margin-right:5px; cursor:pointer;"> No
                </label>
            </div>

            <div style="margin-bottom:15px;">
                <label style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Do you have any financial crises?</label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="finance" value="yes" style="margin-right:5px; cursor:pointer;"> Yes
                </label>
                <label style="display:inline-block; margin-right:20px; font-weight:normal; color:#555;">
                <input type="radio" name="finance" value="no" style="margin-right:5px; cursor:pointer;"> No
                </label>
            </div>

            <h3 style="font-size:25px; font-weight:650; color:#1f3c88;">Ratings :</h3> <br>

            <!-- ONE ROW -->
            <div style="display:flex; align-items:center; justify-content:space-between; gap:15px; margin-bottom:14px; flex-wrap:wrap;">
            <span style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Classroom Environment</span>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="class" value="Good"> Average
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="class" value="Good"> Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="class" value="Very Good"> Very Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="class" value="Excellent"> Excellent
                </label>
            </div>
            </div>

            <!-- ONE ROW -->
            <div style="display:flex; align-items:center; justify-content:space-between; gap:15px; margin-bottom:14px; flex-wrap:wrap;">
            <span style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Teaching Quality</span>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="teach" value="Good"> Average
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="teach" value="Good"> Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="teach" value="Very Good"> Very Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="teach" value="Excellent"> Excellent
                </label>
            </div>
            </div>

            <!-- ONE ROW -->
            <div style="display:flex; align-items:center; justify-content:space-between; gap:15px; margin-bottom:14px; flex-wrap:wrap;">
            <span style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Laboratory Facilities</span>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="lab" value="Good"> Average
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="lab" value="Good"> Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="lab" value="Very Good"> Very Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="lab" value="Excellent"> Excellent
                </label>
            </div>
            </div>

            <!-- ONE ROW -->
            <div style="display:flex; align-items:center; justify-content:space-between; gap:15px; margin-bottom:14px; flex-wrap:wrap;">
            <span style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Library Resources</span>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="library" value="Good"> Average
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="library" value="Good"> Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="library" value="Very Good"> Very Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="library" value="Excellent"> Excellent
                </label>
            </div>
            </div>

            <!-- ONE ROW -->
            <div style="display:flex; align-items:center; justify-content:space-between; gap:15px; margin-bottom:14px; flex-wrap:wrap;">
            <span style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Campus Infrastructure</span>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="campus" value="Good"> Average
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="campus" value="Good"> Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="campus" value="Very Good"> Very Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="campus" value="Excellent"> Excellent
                </label>
            </div>
            </div>

            <!-- ONE ROW -->
            <div style="display:flex; align-items:center; justify-content:space-between; gap:15px; margin-bottom:14px; flex-wrap:wrap;">
            <span style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Availability of Study Materials</span>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="meterials" value="Good"> Average
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="meterials" value="Good"> Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="meterials" value="Very Good"> Very Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="meterials" value="Excellent"> Excellent
                </label>
            </div>
            </div>

            <!-- ONE ROW -->
            <div style="display:flex; align-items:center; justify-content:space-between; gap:15px; margin-bottom:14px; flex-wrap:wrap;">
            <span style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Support from Teachers and Staff</span>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="support" value="Good"> Average
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="support" value="Good"> Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="support" value="Very Good"> Very Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="support" value="Excellent"> Excellent
                </label>
            </div>
            </div>

            <!-- ONE ROW -->
            <div style="display:flex; align-items:center; justify-content:space-between; gap:15px; margin-bottom:14px; flex-wrap:wrap;">
            <span style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Cleanliness and Maintenance</span>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="clean" value="Good"> Average
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="clean" value="Good"> Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="clean" value="Very Good"> Very Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="clean" value="Excellent"> Excellent
                </label>
            </div>
            </div>

            <!-- ONE ROW -->
            <div style="display:flex; align-items:center; justify-content:space-between; gap:15px; margin-bottom:14px; flex-wrap:wrap;">
            <span style="display:block; margin-bottom:5px; font-size:18px; font-weight:550; color:black;">Overall Experience</span>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="overall" value="Good"> Average
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="overall" value="Good"> Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="overall" value="Very Good"> Very Good
                </label>
                <label style="padding:6px 14px; border:1px solid #ccc; border-radius:20px; cursor:pointer;">
                <input type="radio" name="overall" value="Excellent"> Excellent
                </label>
            </div>
            </div>



        <div class="buttons">
            <button type="submit" name="btn" class="btn-submit">Register Student</button>
            <button type="reset" class="btn-clear">Clear Form</button>
        </div>

    </form>
</div>

<!-- FOOTER -->
<div class="footer">
    <div class="footer-content">
        <div><h3>TIMT</h3><p>Where education meets innovation.</p></div>
        <div><h3>Quick Links</h3>
        
        <div style="margin-top:15px; display:flex; gap:14px;">

  <a href="https://www.facebook.com/timttmluk" target="_blank">
    <img src="images/fb.png"
         style="width:28px; height:28px; border-radius:50%;">
  </a>

  <a href="https://www.instagram.com/tamralipta_inst_of_man_nd_tech?igsh=OG05aGIybDR5MjZp" target="_blank">
    <img src="images/insta.png"
         style="width:28px; height:28px; border-radius:50%;">
  </a>

  <a href="https://www.youtube.com/@tamraliptainstituteofmanag3871" target="_blank">
    <img src="images/yt.png"
         style="width:28px; height:28px; border-radius:50%;">
  </a>

</div>

</div>
        <div><h3>Contact</h3><p>Email: timt.institute@gmail.com</p><p>Phone: +91 8697511132</p></div>
    </div>
   <div class="footer-bottom">
    © 2025 College Portal || Developed by 
    <a href="https://milan-jana-portfolio.vercel.app/" target="_blank"
       style="
       color:#ffffff;
       background:#1f3c88;
       padding:6px 12px;
       border-radius:20px;
       text-decoration:none;
       font-weight:600;
       margin-left:6px;
       display:inline-block;
       ">
       Milan Jana
    </a>
</div>

</div>

</body>
</html>
