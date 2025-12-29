<?php
include("connect.php");

// fetch records
$qry = "SELECT * FROM reg";
$sql = mysqli_query($con, $qry);
$total = mysqli_num_rows($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit / Delete Students | College Portal</title>

<style>
/* ================= RESET ================= */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", Arial, sans-serif;
}

body{
    background:#f4f6fb;
}

/* ================= NAVBAR (MATCHES INDEX) ================= */
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
    transition: 0.3s;
}

.nav-links a.active,
.nav-links a:hover{
    background:white;
    color:#203a43;
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
    color: #333;
}

.card p{
    color:#666;
    margin-bottom:25px;
}

/* ================= TABLE STYLE ================= */
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
    color: #444;
}

/* ACTION BUTTONS */
.action-btn{
    padding:8px 15px;
    border-radius:6px;
    font-size:13px;
    text-decoration:none;
    font-weight:600;
    display: inline-block;
    transition: 0.2s;
}

.edit-btn{
    background:#1f3c88;
    color:white;
    margin-bottom: 5px;
}

.edit-btn:hover{ background: #162d66; }

.delete-btn{
    background:#d32f2f;
    color:white;
}

.delete-btn:hover{ background: #b71c1c; }

.empty{
    text-align:center;
    padding:50px 0;
    color:#555;
}

/* ================= FOOTER (MATCHES INDEX) ================= */
.footer{
    background:#0f2027;
    color:white;
    padding:40px 50px;
    margin-top:60px;
}

.footer-content{
    display:flex;
    justify-content:space-between;
    flex-wrap:wrap;
    gap: 30px;
}

.footer h3{
    margin-bottom:12px;
}

.footer a{
    color:#ddd;
    text-decoration:none;
    display: block;
    margin-bottom: 8px;
}

.footer a:hover {
    color: white;
}

.footer-bottom{
    text-align:center;
    margin-top:30px;
    border-top:1px solid #333;
    padding-top:15px;
    font-size:14px;
}

/* RESPONSIVE */
@media(max-width:768px){
    .navbar {
        padding: 15px 20px;
        flex-direction: column;
        gap: 15px;
    }
    .nav-links a {
        margin: 0 5px;
        padding: 6px 12px;
        font-size: 13px;
    }
}
</style>
</head>

<body>

<div class="navbar">
    <div class="logo">
        <img src="images/logo.png" alt="Logo">
        <div>
            <h2>Tamralipta Institute of Management & Technology</h2>
            <span>Affiliated to MAKAUT &nbsp•&nbsp Approved by AICTE &nbsp•&nbsp Recognised by UGC</span>
        </div>
    </div>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="reg.php">Registration</a>
        <a href="view.php">Student Records</a>
        <a href="viewdel.php" class="active">Manage Records</a>
    </div>
</div>

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
                        <a class="action-btn edit-btn"
                           href="update.php?id=<?php echo $row['id']; ?>">
                           Edit
                        </a>

                        <a class="action-btn delete-btn"
                           href="delete.php?id=<?php echo $row['id']; ?>"
                           onclick="return confirm('Are you sure you want to delete this record?')">
                           Delete
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php } ?>
</div>

<div class="footer">
    <div class="footer-content">
        <div>
            <h3>TIMT</h3>
            <p>Streamlining education with technology.</p>
        </div>
        <div>
            <h3>Quick Links</h3>
            <a href="index.php">Home</a>
            <a href="reg.php">Registration</a>
            <a href="view.php">Student Records</a>
        </div>
        <div>
            <h3>Contact Us</h3>
            <p>Email: timt.institute@gmail.com</p>
            <p>Phone: +91 8697511132</p>
        </div>
    </div>
    <div class="footer-bottom">
        © 2025 College Portal | Developed by Milan Jana 😊
    </div>
</div>

</body>
</html>