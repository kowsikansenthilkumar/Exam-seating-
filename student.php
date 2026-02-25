<?php
    session_start();
    include("dbconnect.php");

    if (isset($_POST['btn'])) {
        $regno    = $_POST['regno'] ?? '';
        $password = $_POST['password'] ?? '';

        $stmt = $conn->prepare("SELECT * FROM student WHERE regno = ? AND dob = ?");
        $stmt->bind_param("ss", $regno, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $_SESSION['regno'] = $row['regno'];
            header("Location: stuhome.php");
            exit;
        } else {
            $loginError = "Invalid Register Number or Date of Birth.";
        }
        $stmt->close();
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Exam Seat Management System</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
     <!-- FLEXSLIDER CSS -->
<link href="assets/css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />    
  <!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
	<style>
	#back{
	background-image:url("images/1.jpeg");
	height:600px;
	width:100%;
	background-position:left;
	}
	
	
	</style>
</head>
<body >
   
 <div class="navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><h2  style="color:#FFFFFF;">EXAM SEAT MANAGEMENT SYSTEM</h2>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
                   <li ><a href="index.php">HOME</a></li>
					<li><a href="adminlog.php">ADMIN LOGIN</a></li>
                          
                    <li><a href="student.php">STUDENT LOGIN</a></li>  
                </ul>
            </div>
           
        </div>
    </div>
	<img id="back"/>
	</div>
	<br /><br /><br />
  <?php if (!empty($loginError)): ?>
    <div style="color:red; text-align:center; margin-bottom:10px;"><?php echo htmlspecialchars($loginError); ?></div>
  <?php endif; ?>
  <form id="form1" name="form1" method="post" action="">
	   <table width="46%" border="0" align="center">
         <tr>
           <td colspan="2"><div align="center"><strong>Student Login</strong></div></td>
		 </tr>
         <tr>
           <td width="48%" height="31" align="center"><strong>Register Number</strong></td>
           <td><input name="regno" type="text" id="regno" required /></td>
         </tr>
         <tr>
           <td height="44" align="center"><strong>Date of Birth</strong></td>
           <td><input name="password" type="date" id="password" required /></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td>
             <input name="btn" type="submit" id="btn" value="Login" />
             <input type="reset" name="Submit2" value="Cancel" />
           </td>
         </tr>
  </table>
</form>
<br />
     <div id="footer">
          &copy; 2024 examseat | All Rights Reserved
     </div>
     <!-- FOOTER SECTION END-->
     
</body>
</html>
