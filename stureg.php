<?php
    session_start();
    include("dbconnect.php");

    if (!isset($_SESSION['admin'])) {
        header("Location: adminlog.php");
        exit;
    }

    $message = '';
    if (isset($_POST['btn'])) {
        $regno   = $_POST['regno']   ?? '';
        $name    = $_POST['name']    ?? '';
        $gender  = $_POST['gender']  ?? '';
        $dob     = $_POST['dob']     ?? '';
        $depart  = $_POST['depart']  ?? '';
        $year    = $_POST['year']    ?? '';
        $sem     = $_POST['sem']     ?? '';
        $class   = $_POST['class']   ?? '';
        $address = $_POST['address'] ?? '';
        $pnumber = $_POST['pnumber'] ?? '';
        $email   = $_POST['email']   ?? '';

        $check = $conn->prepare("SELECT id FROM student WHERE regno = ?");
        $check->bind_param("s", $regno);
        $check->execute();
        $check->store_result();

        if ($check->num_rows === 1) {
            $message = '<div style="color:red;">Register number already taken.</div>';
        } else {
            $stmt = $conn->prepare("INSERT INTO student VALUES ('', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssssss", $regno, $name, $gender, $dob, $depart, $year, $sem, $class, $address, $pnumber, $email);
            if ($stmt->execute()) {
                $message = '<div style="color:green;">Student registered successfully.</div>';
            } else {
                $message = '<div style="color:red;">Error: Could not register student.</div>';
            }
            $stmt->close();
        }
        $check->close();
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
                    
					<li><a href="stureg.php">ADD STUDENT</a></li>
					<li><a href="adminhome.php">ADD STAFF</a></li>
					<li><a href="addsub.php">ADD SUBJECT</a></li>
                  <li><a href="addhall.php">ADD HALL</a></li>
				   <li><a href="allote.php">ALLOTE HALL</a></li>
				   <li><a href="allotestaff.php">ALLOTE STAFF</a></li>
				      
				    <li><a href="view.php">VIEW</a></li>	
					<li><a href="index.php">LOGOUT</a></li>  
                </ul>
            </div>
           
        </div>
    </div>
	<img id="back"/>
	</div>
	<br /><br />
    <?php if (!empty($message)) echo $message; ?>
    <form id="form1" name="form1" method="post" action="">
            <div align="center">
              <p class="style5">
              <h2>Student Details </h2>
             </div>
          
          <table width="95%" border="0">
            <tr>
              <td width="7%" height="36">&nbsp;</td>
              <td width="33%">&nbsp;</td>
              <td width="13%">Reg.No</td>
              <td width="33%"><label>
                <input name="regno" type="text" id="regno" />
              </label></td>
              <td width="7%">&nbsp;</td>
              <td width="7%">&nbsp;</td>
            </tr>
            <tr>
              <td height="32">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Name</td>
              <td><input name="name" type="text" id="name" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="34">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Gender</td>
              <td><label>
                <input name="gender" type="radio" value="male" />
              Male
              <input name="gender" type="radio" value="female" />
              Female</label></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="35">&nbsp;</td>
              <td>&nbsp;</td>
              <td>DOB</td>
              <td><input name="dob" type="date" id="dob" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="35">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Department</td>
              <td><label>
                <select name="depart" id="depart">
                  <option value="Select">Select</option>
                    <option value="EEE">EEE</option>
  <option value="CSE">CSE</option>
  <option value="MECH">MECH</option>
    <option value="CIVIL">CIVIL</option>
	 <option value="ECE">ECE</option>
	  <option value="IT">IT</option>
                </select>
				
			   
				
				
              </label></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="29">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Year</td>
              <td><label>
                <select name="year" id="year">
                  <option value="Select">Select</option>
                  <option value="1 Year">1 Year</option>
                  <option value="2 Year">2 year</option>
                  <option value="3 Year">3 year</option>
               
                </select>
              </label></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="37">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Sem</td>
              <td><label>
              <select name="sem" id="sem">
                <option value="Select">Select</option>
                <option value="I semester">I semester</option>
                <option value="II semester">II semester</option>
                <option value="III semester">III semester</option>
                <option value="IV semester">IV semester</option>
                <option value="V semester">V semester</option>
                <option value="VI semester">VI semester</option>
             
              </select>
              </label></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="37">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Class</td>
              <td><label>
                <input name="class" type="text" id="class" />
              </label></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="56">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Address</td>
              <td><textarea name="address" id="address"></textarea></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="49">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Phone Number </td>
              <td><input name="pnumber" type="text" id="pnumber" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="33">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Email Id </td>
              <td><input name="email" type="text" id="email" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="51">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><label>
                <input name="btn" type="submit" class="button21" id="btn" value="Submit" />
                <input name="Submit2" type="reset" class="button21" value="Reset" />
              </label></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
		  </form>
      </br></br> </br>          
 
<br />
          &copy; 2024 examseat| All Rights Reserved |  <a href="http://binarytheme.com" style="color: #fff" target="_blank">Design by : binarytheme.com</a>
    </div>
     <!-- FOOTER SECTION END-->
   
    <!--  Jquery Core Script -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="assets/js/bootstrap.js"></script>
    <!--  Flexslider Scripts --> 
         <script src="assets/js/jquery.flexslider.js"></script>
     <!--  Scrolling Reveal Script -->
    <script src="assets/js/scrollReveal.js"></script>
    <!--  Scroll Scripts --> 
    <script src="assets/js/jquery.easing.min.js"></script>
    <!--  Custom Scripts --> 
         <script src="assets/js/custom.js"></script>
</body>
</html>
