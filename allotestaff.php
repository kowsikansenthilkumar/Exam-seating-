<?php
    session_start();
    include("dbconnect.php");

    if (!isset($_SESSION['admin'])) {
        header("Location: adminlog.php");
        exit;
    }

    $message = '';
    if (isset($_POST['btn'])) {
        $uname = $_POST['uname'] ?? '';
        $date  = $_POST['date']  ?? '';
        $ses   = $_POST['ses']   ?? '';
        $ename = $_POST['ename'] ?? '';
        $room  = $_POST['room']  ?? '';

        $check = $conn->prepare("SELECT id FROM stalt WHERE regno = ? AND date = ? AND ses = ?");
        $check->bind_param("sss", $uname, $date, $ses);
        $check->execute();
        $check->store_result();

        if ($check->num_rows === 1) {
            $message = '<div style="color:orange;">This staff is already allotted on this date and session for another room.</div>';
        } else {
            $stmt = $conn->prepare("INSERT INTO stalt VALUES ('', ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $uname, $date, $ename, $room, $ses);
            if ($stmt->execute()) {
                $message = '<div style="color:green;">Staff allotted successfully.</div>';
            } else {
                $message = '<div style="color:red;">Error: Could not allot staff.</div>';
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
    <form id="f1" name="f1" method="post" action="" enctype="multipart/form-data">
  <table width="35%" border="0" align="center">
	
    <tr>
      <td height="40" colspan="2"  align="center" ><div class="style5"><h3>Staff Registration</h></div></td>
    </tr>
	
	
	
		 <tr>
      <td height="39">Date</td>
      <td>       <input name="date" type="date"  /></td>
      
    </tr>
	
    <tr>
     
      <td width="41%" height="44">Exam Name:</td>
      <td width="59%"> <select name="ename" >
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
      </td>
      
    </tr>
	
	
	 <tr>
    
      <td height="36">Room Number</td>
      <td>
     <select name="room" >
                  <option value="Select">Select</option>
				  <?php
				  $qry1=mysqli_query($conn,"select distinct(roomnum) from rooms");
				  while($row=mysqli_fetch_array($qry1)){
				  
				  
				  
				   ?>
                  <option value="<?php echo htmlspecialchars($row['roomnum']); ?>"><?php echo htmlspecialchars($row['roomnum']); ?></option>
                 <?php } ?>
                </select>
      </td>
     
    </tr>
	
    <tr>
     
      <td height="38">Session</td>
      <td><select name="ses" >
                  <option value="Select">Select</option>
                  <option value="FN">FN</option>
                  <option value="AN">AN</option>
                                </select></td>
     
    </tr>
	
   
	
		
		<tr>
      <td height="41">Staff Register Number</td>
      <td><select name="uname" >
                  <option value="Select">Select</option>
				  <?php
				  $qry1=mysqli_query($conn,"select distinct(regno) from staffreg");
				  while($row=mysqli_fetch_array($qry1)){
				  
				  
				  
				   ?>
                  <option value="<?php echo htmlspecialchars($row['regno']); ?>"><?php echo htmlspecialchars($row['regno']); ?></option>
                 <?php } ?>
                </select></td>
    </tr>
	
   
	
	<tr>
      <td height="53">&nbsp;</td>
      <td><input name="btn" type="submit" id="btn" value="Submit" />
      <input type="reset" name="Submit2" value="Reset" /></td>
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
