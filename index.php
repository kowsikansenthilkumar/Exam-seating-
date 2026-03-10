<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Exam Seat Management System - Manage exam hall seating arrangements" />
    <title>Exam Seat Management System</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        .hero-section {
            margin-top: 50px;
            background: linear-gradient(135deg, #1a237e 0%, #283593 50%, #3949ab 100%);
            padding: 80px 20px 60px;
            text-align: center;
            color: #fff;
        }
        .hero-section h1 {
            font-size: 2.6em;
            font-weight: 700;
            letter-spacing: 2px;
            text-shadow: 0 2px 8px rgba(0,0,0,0.3);
            margin-bottom: 14px;
        }
        .hero-section p.lead { font-size: 1.2em; color: #c5cae9; margin-bottom: 36px; }
        .hero-section .btn-hero { margin: 8px; padding: 12px 32px; font-size: 15px; font-weight: 600; border-radius: 30px; }
        .btn-admin  { background:#fff; color:#1a237e; border:2px solid #fff; }
        .btn-admin:hover  { background:transparent; color:#fff; }
        .btn-staff  { background:transparent; color:#fff; border:2px solid #c5cae9; }
        .btn-staff:hover  { background:#fff; color:#1a237e; }
        .btn-student { background:#ff6f00; color:#fff; border:2px solid #ff6f00; }
        .btn-student:hover { background:#e65100; border-color:#e65100; color:#fff; }
        .features-section { padding: 50px 0 40px; background: #f5f5f5; }
        .feature-card {
            background: #fff; border-radius: 10px; padding: 30px 24px; margin-bottom: 20px;
            text-align: center; box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .feature-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(0,0,0,0.12); }
        .feature-card .fa { font-size: 2.6em; color: #1a237e; margin-bottom: 16px; }
        .feature-card h4 { color: #1a237e; font-weight: 700; margin-bottom: 10px; }
        .feature-card p { color: #546e7a; font-size: 14px; }
        footer { background: #1a237e; color: #c5cae9; text-align: center; padding: 18px; font-size: 13px; }
    </style>
</head>
<body>

  <nav class="navbar navbar-inverse navbar-fixed-top" id="menu">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php" style="font-weight:700;letter-spacing:1px;">
          <i class="fa fa-graduation-cap"></i> EXAM SEAT MANAGEMENT
        </a>
      </div>
      <div class="collapse navbar-collapse" id="main-nav">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="index.php"><i class="fa fa-home"></i> HOME</a></li>
          <li><a href="adminlog.php"><i class="fa fa-user-secret"></i> ADMIN LOGIN</a></li>
          <li><a href="staff.php"><i class="fa fa-users"></i> STAFF LOGIN</a></li>
          <li><a href="student.php"><i class="fa fa-user"></i> STUDENT LOGIN</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="hero-section">
    <h1><i class="fa fa-university"></i> Exam Seat Management System</h1>
    <p class="lead">Efficiently manage exam hall seating arrangements for students and staff</p>
    <a href="adminlog.php" class="btn btn-hero btn-admin">Admin Login</a>
    <a href="staff.php"    class="btn btn-hero btn-staff">Staff Login</a>
    <a href="student.php"  class="btn btn-hero btn-student">Student Login</a>
  </div>

  <div class="features-section">
    <div class="container">
      <div class="row text-center" style="margin-bottom:30px;">
        <h2 style="color:#1a237e;font-weight:700;">Key Features</h2>
        <p style="color:#546e7a;">Everything you need to manage exam seating efficiently</p>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="feature-card">
            <div class="fa fa-user-plus"></div>
            <h4>Student Management</h4>
            <p>Register and manage student records with department, year, and section details.</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="feature-card">
            <div class="fa fa-building"></div>
            <h4>Hall Management</h4>
            <p>Create and configure exam halls with seat layouts for any exam session.</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="feature-card">
            <div class="fa fa-calendar-check-o"></div>
            <h4>Seat Allotment</h4>
            <p>Automatically allot seats to students based on department and section.</p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="feature-card">
            <div class="fa fa-search"></div>
            <h4>Seat Lookup</h4>
            <p>Students can instantly find their assigned seat and room number online.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    &copy; 2024 Exam Seat Management System &mdash; All Rights Reserved
  </footer>

  <script src="assets/js/jquery-1.10.2.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
