<?php
    session_start();
    include("dbconnect.php");
    error_reporting(0);

    if (!isset($_SESSION['regno'])) {
        header("Location: student.php");
        exit;
    }
    $regno = $_SESSION['regno'];
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
                   <li ><a href="stuhome.php">HOME</a></li>
				     
					
					<li><a href="index.php">LOGOUT</a></li>  
                </ul>
            </div>
           
        </div>
    </div>
	<img id="back"/>
	</div>
	<br /><br />
    <form id="form1" name="form1" method="post" action="">
            <div align="center">
            </div>
          
          <table width="95%" border="0">
            <tr>
              <td width="8%" height="36">&nbsp;</td>
              <td width="8%">Select Exam </td>
              <td width="12%"><label>
                <select name="sem" id="sem">
                 <option value="Select">Select</option>
				 <option value="cycle test 1">cycle test 1</option>
                <option value="cycle test 2">cycle test 2</option>
                <option value="cycle test 3">cycle test 3</option>
                <option value="I semester">I semester</option>
                <option value="II semester">II semester</option>
                <option value="III semester">III semester</option>
                <option value="IV semester">IV semester</option>
                <option value="V semester">V semester</option>
                <option value="VI semester">VI semester</option>
                <option value="VII semester">VII semester</option>
                <option value="VIII semester">VIII semester</option>
                </select>
              </label></td>
			 
			
			   <td width="8%">Select Session </td>
			    <td><label>
                <select name="ses" id="sess">
                  <option value="Select">Select</option>
                  <option value="FN">FN</option>
                  <option value="AN">AN</option>
                                </select>
              </label></td>
			   <td width="8%">Select date </td>
			   <td><label>
                <input name="date" type="date" id="sdate" />
              </label></td>
             
              <td width="51%"><input name="btn" type="submit" class="button211" id="btn" value="Search" /></td>
            </tr>  </table>
		<?php if (isset($_POST['btn'])) {
            $sem  = $_POST['sem']  ?? '';
            $ses  = $_POST['ses']  ?? '';
            $date = $_POST['date'] ?? '';
          ?>
        
		  </form>
		  <table width="80%" border="1" align="center">
          
		   <tr>
              <td><div align="center"><strong>Seat Number</strong></div></td>
			  <td><div align="center"><strong>Register Number</strong></div></td>
			  <td><div align="center"><strong>Exam</strong></div></td>
			  <td><div align="center"><strong>Room Number</strong></div></td>
              </tr>
			<?php
            $stmt = $conn->prepare("SELECT seat, regno, sub, roomnum FROM rooms WHERE date = ? AND ses = ? AND ename = ? AND regno = ?");
            $stmt->bind_param("ssss", $date, $ses, $sem, $regno);
            $stmt->execute();
            $qrt = $stmt->get_result();
            $rb = $qrt->fetch_assoc();
            $stmt->close();
			?>
            <tr>
              <td><div align="center"><?php echo htmlspecialchars($rb['seat'] ?? ''); ?></div></td>
			  <td><div align="center"><?php echo htmlspecialchars($rb['regno'] ?? ''); ?></div></td>
			  <td><div align="center"><?php echo htmlspecialchars($rb['sub'] ?? ''); ?></div></td>
			  <td><div align="center"><?php echo htmlspecialchars($rb['roomnum'] ?? ''); ?></div></td>
              </tr>
			
          </table>
             <?php } ?>
          <br /><br /><br />

<br />
          &copy; 2024 examseat | All Rights Reserved
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
