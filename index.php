<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>College Portal | Student Management System</title>

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

/* ================= NAVBAR ================= */
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

/* ================= NAVBAR RESPONSIVE ================= */
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



/* ================= HERO SLIDER (FIXED) ================= */
.hero{
    position: relative;
    height: 400px;
    overflow: hidden;
}

/* Slider track */
.hero-slider{
    display: flex;
    height: 100%;
    width: 400vw; /* 3 slides */
    animation: heroSlide 12s infinite ease-in-out;
}

/* Animation - Smoothly transitions to the 4th (duplicate) slide before snapping back */
@keyframes heroSlide {
    /* Show Slide 1 */
    0%, 20% { transform: translateX(0); }

    /* Show Slide 2 */
    25%, 45% { transform: translateX(-100vw); }

    /* Show Slide 3 */
    50%, 70% { transform: translateX(-200vw); }

    /* Show Slide 4 (which looks like Slide 1) */
    75%, 95% { transform: translateX(-300vw); }

    /* At 100%, it 'snaps' back to 0 so fast you can't see it */
    100% { transform: translateX(0); }
}

/* Each slide */
.hero-slide{
    width: 100vw;
    height: 100%;
    background-size: cover;
    background-position: center;
    flex-shrink: 0;
}

/* Images */
.hero-slide.one{ background-image: url("images/college.jpg"); }
.hero-slide.two{ background-image: url("images/library.png"); }
.hero-slide.three{ background-image: url("images/student.png"); }


/* Overlay */
.hero-overlay{
    position:absolute;
    inset:0;
    background:rgba(25,35,85,0.75);
    z-index:2;
}

/* Content */
.hero-content{
    position:absolute;
    inset:0;
    z-index:3;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    color:white;
}

.hero-content h1{
    font-size:52px;
    margin-bottom:15px;
}

.hero-content p{
    font-size:20px;
    margin-bottom:30px;
}

/* Buttons */
.hero-buttons a{
    padding:14px 30px;
    border-radius:30px;
    text-decoration:none;
    font-size:18px;
    margin:0 10px;
    display:inline-block;
}

.btn-primary{
    background:white;
    color:#1f3c88;
    font-weight:600;
}

.btn-secondary{
    background:#1f3c88;
    color:white;
    border:2px solid white;
}

/* Animation */
@keyframes heroSlide{
    0%   { transform: translateX(0); }
    30%  { transform: translateX(0); }

    33%  { transform: translateX(-100vw); }
    63%  { transform: translateX(-100vw); }

    66%  { transform: translateX(-200vw); }
    100% { transform: translateX(-200vw); }
}


/* ================= INFO STRIP ================= */
.info-strip{
    background:#009688;
    color:white;
    text-align:center;
    padding:18px;
    font-size:18px;
}

/* ================= STATS ================= */
.stats{
    display:flex;
    justify-content:space-around;
    background:white;
    padding:60px 40px;
}

.stat-box{
    text-align:center;
}

.stat-box h2{
    font-size:36px;
    color:#1f3c88;
}

.stat-box p{
    color:#555;
}

/* ================= FACULTY ================= */
.faculty{
    background:#f9fbff;
    padding:60px 40px;
}

.faculty h2{
    text-align:center;
    font-size:34px;
    margin-bottom:10px;
}

.faculty p{
    text-align:center;
    color:#666;
    margin-bottom:40px;
}

.faculty-grid{
    display:grid;
    grid-template-columns:repeat(5,1fr);
    gap:25px;
}

.faculty-card{
    min-width: 220px;   /* 👈 THIS CONTROLS WIDTH */
    max-width: 220px;   /* 👈 KEEP CONSISTENT */
    background: #f2e4dc;
    border-radius:14px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,0.15);
    transition:0.3s;
}

.faculty-card:hover{
    transform:translateY(-8px);
}

.faculty-card img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.faculty-card .info{
    padding:15px;
    text-align:center;
}

.faculty-card h4{
    margin-bottom:5px;
}

.faculty-card span{
    color:#1f3c88;
    font-size:14px;
}





/* ===== CONTINUOUS FACULTY SLIDER ===== */
.faculty-slider-wrapper{
    overflow:hidden;
    width:100%;
}

.faculty-slider{
    display:flex;
    gap:25px;
    width:max-content;
    animation: facultyScroll 40s linear infinite;
}

/* pause on hover */
.faculty-slider-wrapper:hover .faculty-slider{
    animation-play-state: paused;
}

/* continuous left scroll */
@keyframes facultyScroll{
    from{
        transform: translateX(0);
    }
    to{
        transform: translateX(-50%);
    }
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

</style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">
        <img src="images/logo.png">
        <div>
            <h2>Tamralipta Institute of Management & Technology</h2>
            <span>Affiliated to MAKAUT &nbsp•&nbsp Approved by AICTE &nbsp•&nbsp Recognised by UGC</span>
        </div>
    </div>
    <div class="nav-links">
        <a href="index.php" class="active">Home</a>
        <a href="reg.php">Registration</a>
        <a href="view.php">Student Records</a>
        <a href="viewdel.php">Manage Records</a>
    </div>
</div>

<!-- HERO -->
<!-- HERO SLIDER -->
<div class="hero">

    <div class="hero-slider">
        <div class="hero-slide one"></div>
        <div class="hero-slide two"></div>
        <div class="hero-slide three"></div>
    </div>

    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1>Student Management System</h1>
        <p>Empowering Education Through Technology</p>

        <div class="hero-buttons">
            <a href="reg.php" class="btn-primary">Register Now</a>
            <a href="view.php" class="btn-secondary">View Records</a>
        </div>
    </div>

</div>


<!-- INFO -->
<div class="info-strip">
    Expert Faculties • Smart Learning • Career Focused Education
</div>

<!-- STATS -->
<div class="stats">
    <div class="stat-box"><h2>500+</h2><p>Active Students</p></div>
    <div class="stat-box"><h2>20+</h2><p>Expert Faculty</p></div>
    <div class="stat-box"><h2>10+</h2><p>Programs Offered</p></div>
</div>

<!-- FACULTY -->
<!-- FACULTY SECTION -->
<div class="faculty">
    <h2>Our Expert Faculty</h2>
    <p>Learn from industry leaders and experienced educators</p>

    <div class="faculty-slider-wrapper">
        <div class="faculty-slider">

            <!-- ===== ORIGINAL LIST ===== -->
            <div class="faculty-card">
                <img src="images/anathbandhu.jpeg">
                <div class="info"><h4>Dr. Anathbandhu Patra</h4><span>Ph.D (IIT Kharagpur), MBA , DHRM, MA</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/manas.jpeg">
                <div class="info"><h4>Manas Kumar Khatua</h4><span>M.Sc (Math)</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/dhruba.jpeg">
                <div class="info"><h4>Dhrubajoti Mondal</h4><span>M.Com, MBA (Finance)</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/sandip.jpeg">
                <div class="info"><h4>Sandip Sekhar Santra</h4><span>Ph.D, MBA</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/srijib.jpeg">
                <div class="info"><h4>Srijib Samanta</h4><span>Ph.D, MCA</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/prasad.jpeg">
                <div class="info"><h4>Prasad Manna</h4><span>M.Sc (Eco), MBA</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/santanu.jpeg">
                <div class="info"><h4>Santanu Kumar Jana</h4><span>Ph.D, MCA</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/suman.jpeg">
                <div class="info"><h4>Suman Das</h4><span>MCA</span></div>
            </div>

            <!-- ===== DUPLICATE LIST (FOR SMOOTH LOOP) ===== -->
            <div class="faculty-card">
                <img src="images/anathbandhu.jpeg">
                <div class="info"><h4>Dr. Anathbandhu Patra</h4><span>Ph.D (IIT Kharagpur), MBA , DHRM, MA</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/manas.jpeg">
                <div class="info"><h4>Manas Kumar Khatua</h4><span>M.Sc (Math)</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/dhruba.jpeg">
                <div class="info"><h4>Dhrubajoti Mondal</h4><span>M.Com, MBA (Finance)</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/sandip.jpeg">
                <div class="info"><h4>Sandip Sekhar Santra</h4><span>Ph.D, MBA</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/srijib.jpeg">
                <div class="info"><h4>Srijib Samanta</h4><span>Ph.D, MCA</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/prasad.jpeg">
                <div class="info"><h4>Prasad Manna</h4><span>M.Sc (Eco), MBA</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/santanu.jpeg">
                <div class="info"><h4>Santanu Kumar Jana</h4><span>Ph.D, MCA</span></div>
            </div>

            <div class="faculty-card">
                <img src="images/suman.jpeg">
                <div class="info"><h4>Suman Das</h4><span>MCA</span></div>
            </div>

        </div>
    </div>
</div>


<!-- FOOTER -->
<div class="footer">
    <div class="footer-content">
        <div><h3>TIMT</h3><p>Where education meets innovation.</p></div>
        <div><h3>Quick Links</h3>
        
        <div style="margin-top:15px; display:flex; gap:14px;">

  <a href="https://www.facebook.com/timttmluk">
    <img src="images/fb.png"
         style="width:28px; height:28px; border-radius:50%;">
  </a>

  <a href="https://www.instagram.com/tamralipta_inst_of_man_nd_tech?igsh=OG05aGIybDR5MjZp">
    <img src="images/insta.png"
         style="width:28px; height:28px; border-radius:50%;">
  </a>

  <a href="https://www.youtube.com/@tamraliptainstituteofmanag3871">
    <img src="images/yt.png"
         style="width:28px; height:28px; border-radius:50%;">
  </a>

</div>

</div>
        <div><h3>Contact</h3><p>Email: timt.institute@gmail.com</p><p>Phone: +91 8697511132</p></div>
    </div>
   <div class="footer-bottom">
    © 2025 College Portal || Developed by 
    <a href="https://www.linkedin.com/in/milanjana143/"
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
