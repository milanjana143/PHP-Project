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
<title>Student Records | College Portal</title>

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

/* ================= CARD & TABLE ================= */
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

.search-box{
    width:100%;
    padding:14px 16px;
    border:1px solid #ddd;
    border-radius:12px;
    background:#f9f9f9;
    font-size:15px;
    margin-bottom:25px;
    outline:none;
}

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
    text-align:left;
    font-size:14px;
}

th{
    background:#f8f9fa;
    font-weight:600;
    color:#444;
}

tr:hover{
    background:#fdfdfd;
}

.empty{
    text-align:center;
    padding:50px 0;
    color:#555;
}

/* ================= FOOTER ================= */
/* ===== FOOTER ===== */
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
    .nav-links{
        margin-left:0;
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
            <span>Affiliated to MAKAUT &nbsp•&nbsp Approved by AICTE &nbsp•&nbsp Recognised by UGC</span>
        </div>
    </div>
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="reg.php">Registration</a>
        <a href="view.php" class="active">Student Records</a>
        <a href="viewdel.php">Manage Records</a>
    </div>
</div>

<div class="page-content">
    <div class="card">
        <h2>Student Records</h2>
        <p>Viewing all registered entries (Total: <strong><?php echo $total; ?></strong>)</p>

        <input type="text" class="search-box" id="myInput" onkeyup="searchTable()"
            placeholder="🔍 Search by name, email, course, or college...">

        <?php if($total == 0){ ?>
            <div class="empty">
                <p>No students registered yet.</p>
                <p><a href="reg.php" style="color:#203a43;">Click here to register a new student.</a></p>
            </div>
        <?php } else { ?>

        <div class="table-wrapper">
            <table id="recordsTable">
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
                <a href="https://www.facebook.com/timttmluk"><img src="images/fb.png" style="width:28px;height:28px;border-radius:50%;"></a>
                <a href="https://www.instagram.com/tamralipta_inst_of_man_nd_tech"><img src="images/insta.png" style="width:28px;height:28px;border-radius:50%;"></a>
                <a href="https://www.youtube.com/@tamraliptainstituteofmanag3871"><img src="images/yt.png" style="width:28px;height:28px;border-radius:50%;"></a>
            </div>
        </div>

        <div><h3>Contact</h3><p>Email: timt.institute@gmail.com</p><p>Phone: +91 8697511132</p></div>
    </div>

    <div class="footer-bottom">
        © 2025 College Portal || Developed by 
        <a href="https://www.linkedin.com/in/milanjana143/"
           style="color:#fff;background:#1f3c88;padding:6px 12px;border-radius:20px;text-decoration:none;font-weight:600;">
           Milan Jana
        </a>
    </div>
</div>

<script>
function searchTable() {
    var input = document.getElementById("myInput");
    var filter = input.value.toUpperCase();
    var table = document.getElementById("recordsTable");
    var tr = table.getElementsByTagName("tr");

    for (var i = 1; i < tr.length; i++) {
        tr[i].style.display = "none";
        var td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
            if (td[j]) {
                if (td[j].innerText.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                }
            }
        }
    }
}
</script>

</body>
</html>
