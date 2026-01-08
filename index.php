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




/* college introduction */
.stats{
border-radius:20px;
padding:0 20px;
/* margin:25px auto; */
margin:35px 0px 5px 0px;
height:60px;              /* small but usable */
width:100%;
box-shadow:0 15px 35px rgba(0,0,0,0.1);

display:flex;
justify-content:space-between;
align-items:center;
text-align:center;
}



/* course template- bca, bba , bhm */
.cards-row{
    display:flex;
    width:calc(100% - 70px);   /* ⬅ reduce width */
    margin:0 auto;             /* ⬅ center it */
    gap:25px;
}


.card{
    flex:1;
    background:#16476A;
    color:#fff;
    border-radius:18px;
    padding:30px 25px;
    text-align:center;
    box-shadow:0 15px 30px rgba(0,0,0,0.35);
}

.card-img{
    width:130px;
    height:130px;
    border-radius:50%;
    object-fit:cover;
    margin-bottom:20px;
}

.card h2{
    font-size:22px;
    color:#fb8500;
    margin-bottom:15px;
}

.card p{
    font-size:16px;
    line-height:1.6;
    color:#ddd;
    margin-bottom:25px;
}

.btn{
    display:inline-block;
    background:#c76b00;
    color:#fff;
    padding:10px 22px;
    border-radius:6px;
    text-decoration:none;
    font-size:14px;
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
    font-size:24px;
}


.info-strip2{
    background:#2d3142;
    color:white;
    text-align:center;
    padding:18px;
    font-size:24px;

    width:80%;
    margin:20px auto;     /* 🔥 centers the whole div */
    border-radius:12px;  /* rounded corners */
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
            <span>ESTD 2007 &nbsp•&nbsp MAKAUT University</span>
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









<div style="
    max-width:95%;
    margin:60px auto;
    background:#4a4e69;
    border-radius:18px;
    padding:40px;
    box-shadow:0 20px 40px rgba(0,0,0,0.4);
">

    <!-- FULL WIDTH TOP HEADING -->
    <h1 style="
        font-size:38px;
        margin-bottom:35px;
        color:#ff9f43;
        text-align:center;
        line-height:1.25;
    ">
        Tamralipta Institute of Management & Technology
    </h1>

    <!-- CONTENT ROW -->
    <div style="
        display:flex;
        gap:40px;
        align-items:stretch;
    ">

        <!-- LEFT CONTENT -->
        <div style="
            flex:1;
            color:#fff;
            display:flex;
            flex-direction:column;
            justify-content:center;
        ">

            <!-- TEXT BLOCK (LOGOS + PARAGRAPH SAME WIDTH) -->
            <div style="max-width:520px;">

                <!-- LOGOS ROW -->
                <div style="
                    display:flex;
                    justify-content:space-between;
                    margin:20px 0 18px 0;
                ">

                    <div style="text-align:left;">
                        <p style="color:#00d2ff;font-weight:600;margin-bottom:8px;">
                            AFFILIATED TO
                        </p>
                        <img src="images/makaut.jpg" style="width:110px;">
                    </div>

                    <div style="text-align:center;">
                        <p style="color:#ffa502;font-weight:600;margin-bottom:8px;">
                            APPROVED BY
                        </p>
                        <img src="images/aicte.jpg" style="width:110px;">
                    </div>

                    <div style="text-align:right;">
                        <p style="color:#ff6b81;font-weight:600;margin-bottom:8px;">
                            RECOGNISED BY
                        </p>
                        <img src="images/ugc.jpg" style="width:110px;">
                    </div>

                </div>

                <!-- DESCRIPTION -->
                <p style="
                    color:#ddd;
                    font-size:15px;
                    line-height:1.7;
                    text-align:justify;
                ">
                    The Tamralipta Institute of Management & Technology (TIMT) is situated at
                    Tamluk, the district headquarters of Purba Medinipur. It is affiliated to
                    Maulana Abul Kalam Azad University of Technology (MAKAUT), West Bengal.
                    TIMT is approved by AICTE and recognised by UGC, known for quality education,
                    strong infrastructure, and experienced faculty. <br> <br>

                    We deliver quality academics and co-curricular opportunities through effective teaching and 
                    modern facilities. Established in 2007 by Haji Sk Kazem Ali under the N.H.K Welfare Foundation, 
                    TIMT aims to develop industry-ready professionals for a globalizing nation. It expanded programs 
                    and affiliations.
                </p>

            </div>
        </div>

        <!-- RIGHT IMAGE -->
        <div style="flex:1;">
            <img src="images/college.jpg" style="
                width:100%;
                height:100%;
                object-fit:cover;
                border-radius:14px;
                box-shadow:0 15px 30px rgba(0,0,0,0.5);
            ">
        </div>

    </div>

    <!-- STATS -->
        <div class="stats" style="background:#c9ada7;">
            <div class="stat-box"><h2>500+</h2><p><b>Active Students</b></p></div>
            <div class="stat-box"><h2>20+</h2><p><b>Expert Faculty</b></p></div>
            <div class="stat-box"><h2>10+</h2><p><b>Programs Offered</b></p></div>
        </div>
</div>








<!-- INFO -->
<div class="info-strip2">
    Courses Offered • Courses Offered • Courses Offered
</div>


<br>


<div class="cards-row">

    <div class="card">
        <img src="images/bca.png" class="card-img">
        <h2>BACHELOR OF COMPUTER APPLICATION</h2>
        <p>
            A Bachelor of Computer Application (BCA) degree provides strong foundations in computer programming, software development, and IT skills for careers in the technology sector.
        </p>
        <!-- <a href="#" class="btn">Read More</a> -->
    </div>

    <div class="card">
        <img src="images/bba.png" class="card-img">
        <h2>BACHELOR OF BUSINESS ADMINISTRATION</h2>
        <p>
            A Bachelor of Business Administration (BBA) degree helps to develop the managerial, innovative, leadership, and entrepreneurial skills required for success in business and corporate environments.
        </p>
        <!-- <a href="#" class="btn">Read More</a> -->
    </div>

    <div class="card">
        <img src="images/bhm.png" class="card-img">
        <h2>BACHELOR OF HOSPITAL MANAGEMENT</h2>
        <p>
            A Bachelor of Hospital Management (BHM) degree helps to prepare students for careers in hospital and hospitality management, focusing on operations, administration, and service excellence.
        </p>
        <!-- <a href="#" class="btn">Read More</a> -->
    </div>

    <div class="card">
        <img src="images/msc.png" class="card-img">
        <h2>MSC. IN COMPUTER SCIENCE</h2>
        <p>
            A MSc degree in Computer Science helps to provide advanced knowledge in computing, software systems, and research-oriented IT careers for future professionals worldwide.
        </p>
        <!-- <a href="#" class="btn">Read More</a> -->
    </div>

</div>





<!-- FACULTY -->
<!-- FACULTY SECTION -->
<div class="faculty">
    <h2>Our Expert Faculty</h2>
    <p><b><font size="5">Learn from industry leaders and experienced educators</font></b></p>

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
