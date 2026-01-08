<?php
include("connect.php");

// fetch records
$qry = "SELECT * FROM reg";
$sql = mysqli_query($con, $qry);

// error check
if (!$sql) {
    die("Query Failed: " . mysqli_error($con));
}

$total = mysqli_num_rows($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>TIMT Student DB</title>
<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<style>
/* ================= RESET ================= */
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
    opacity: 0.4;
    z-index: -1;
}

/* ================= NAVBAR ================= */
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


/* ================= CONTENT CARD ================= */
.card{
    max-width:1250px;
    margin:50px auto;
    background:white;
    padding:30px;
    border-radius:16px;
    box-shadow:0 10px 35px rgba(0,0,0,0.1);
}

.card h2{
    margin-bottom:6px;
    color:#333;
}

.card p{
    color:#666;
    margin-bottom:25px;
}

/* ================= TABLE ================= */
.table-wrapper{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

th, td{
    padding:14px 12px;
    border-bottom:1px solid #eee;
    text-align:center;
    font-size:14px;
}

th{
    background:#f8f9fa;
    font-weight:600;
    color:#444;
}

/* ACTION BUTTONS */
.action-btn{
    width:50px;              /* 🔥 FORCE SAME WIDTH */
    height:36px;             /* 🔥 FORCE SAME HEIGHT */
    border-radius:6px;
    font-size:13px;
    text-decoration:none;
    font-weight:600;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    transition:0.2s;
}



.edit-btn{
    background:#1f3c88;
    color:white;
    margin-bottom:5px;
}

.edit-btn:hover{
    background:#162d66;
}

.delete-btn{
    background:#d32f2f;
    color:white;
}

.delete-btn:hover{
    background:#b71c1c;
}

.empty{
    text-align:center;
    padding:50px 0;
    color:#555;
}

/* ================= FOOTER ================= */
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
    margin-bottom:6px;
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
    .navbar{
        padding:15px 20px;
        flex-direction:column;
        gap:15px;
    }
    .nav-links a{
        margin:0 5px;
        padding:6px 12px;
        font-size:13px;
    }
}


html, body{
    height:100%;
}

body{
    display:flex;
    flex-direction:column;
}

.page-content{
    flex:1;
}




</style>
</head>

<body>

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

<div class="page-content">
    <div class="card">
        <h2>Edit / Delete Student Records</h2>
        <p>Manage registered students (Total: <strong><?php echo $total; ?></strong>)</p>

        <?php if($total == 0){ ?>
            <div class="empty">
                <p>No students registered yet.</p>
            </div>
        <?php } else { ?>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>College</th>
                        <th>Qualification</th>
                        <th>Course</th>
                        <th>Fees</th>
                        <th>Paid</th>
                        <th>Remaining</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($sql)){ ?>
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
                            <div style="display:flex; justify-content:center; gap:8px;">
                                <a class="action-btn edit-btn"
                                href="update.php?id=<?php echo $row['id']; ?>">
                                Edit
                                </a>

                                <a class="action-btn delete-btn"
                                href="delete.php?id=<?php echo $row['id']; ?>"
                                onclick="return confirm('Are you sure you want to delete this record?')">
                                Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
    </div>
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
