<?php
    session_start();
    include("dbconnect.php");

    if (isset($_POST['btn'])) {
        $regno    = $_POST['regno'] ?? '';
        $password = $_POST['password'] ?? '';

        $stmt = $conn->prepare("SELECT * FROM staffreg WHERE regno = ? AND psw = ?");
        $stmt->bind_param("ss", $regno, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $_SESSION['stregno'] = $row['regno'];
            header("Location: stahome.php");
            exit;
        } else {
            $loginError = "Invalid Register Number or Password.";
        }
        $stmt->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Staff Login &mdash; Exam Seat Management System</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
        body { background: linear-gradient(135deg, #1b5e20 0%, #388e3c 100%); min-height: 100vh; display: flex; flex-direction: column; }
        .page-wrap { flex: 1; display: flex; align-items: center; justify-content: center; padding: 80px 16px 40px; }
        .login-card { background: #fff; border-radius: 12px; box-shadow: 0 8px 32px rgba(0,0,0,0.25); padding: 40px 44px; width: 100%; max-width: 420px; }
        .login-card .login-icon { font-size: 3em; color: #2e7d32; text-align: center; margin-bottom: 10px; }
        .login-card h2 { text-align: center; color: #2e7d32; font-weight: 700; margin-bottom: 28px; }
        .form-group label { font-weight: 600; color: #37474f; }
        .form-control { border-radius: 6px; border: 1px solid #b0bec5; padding: 10px 14px; font-size: 15px; }
        .form-control:focus { border-color: #388e3c; box-shadow: 0 0 0 2px rgba(56,142,60,0.15); }
        .btn-login { background: #2e7d32; color: #fff; border: none; border-radius: 6px; padding: 11px; font-size: 15px; font-weight: 700; width: 100%; letter-spacing: 0.5px; margin-top: 6px; }
        .btn-login:hover { background: #1b5e20; color: #fff; }
        .back-link { text-align: center; margin-top: 18px; font-size: 13px; }
        .back-link a { color: #558b2f; }
        footer { background: rgba(0,0,0,0.2); color: #c8e6c9; text-align: center; padding: 14px; font-size: 13px; }
    </style>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top" id="menu">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
          <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php" style="font-weight:700;">
          <i class="fa fa-graduation-cap"></i> EXAM SEAT MANAGEMENT
        </a>
      </div>
      <div class="collapse navbar-collapse" id="main-nav">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php"><i class="fa fa-home"></i> HOME</a></li>
          <li><a href="adminlog.php"><i class="fa fa-user-secret"></i> ADMIN LOGIN</a></li>
          <li class="active"><a href="staff.php"><i class="fa fa-users"></i> STAFF LOGIN</a></li>
          <li><a href="student.php"><i class="fa fa-user"></i> STUDENT LOGIN</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="page-wrap">
    <div class="login-card">
      <div class="login-icon"><i class="fa fa-users"></i></div>
      <h2>Staff Login</h2>
      <?php if (!empty($loginError)): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($loginError); ?></div>
      <?php endif; ?>
      <form id="form1" method="post" action="">
        <div class="form-group">
          <label for="regno">Register Number</label>
          <input name="regno" type="text" id="regno" class="form-control" placeholder="Enter staff register number" required autofocus />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input name="password" type="password" id="password" class="form-control" placeholder="Enter password" required autocomplete="current-password" />
        </div>
        <button name="btn" type="submit" class="btn btn-login">
          <i class="fa fa-sign-in"></i> Login
        </button>
      </form>
      <div class="back-link"><a href="index.php"><i class="fa fa-arrow-left"></i> Back to Home</a></div>
    </div>
  </div>

  <footer>&copy; 2024 Exam Seat Management System &mdash; All Rights Reserved</footer>

  <script src="assets/js/jquery-1.10.2.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>