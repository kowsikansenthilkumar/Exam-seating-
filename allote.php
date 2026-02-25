<?php
    session_start();
    include("dbconnect.php");

    if (!isset($_SESSION['admin'])) {
        header("Location: adminlog.php");
        exit;
    }

    $message = '';
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
	 </br>         <form id="form1" name="form1" method="post" action="">
            <div align="center">
              <p class="style5">
              <h2> Exam  Arrangement </h2>
            �</div>
          
          <table width="95%" border="0">
            <tr>
              <td height="36">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Department</td>
              <td>
			 
			  <select name="dept" onChange="">
			   
			   
			 <option value="Select">Select</option>
                 
                    <option value="EEE">EEE</option>
  <option value="CSE">CSE</option>
  <option value="MECH">MECH</option>
    <option value="CIVIL">CIVIL</option>
	 <option value="ECE">ECE</option>
	  <option value="IT">IT</option>
			  </select>			  </td>
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
              <td>Section</td>
              <td><label>
                <select name="sec" id="sec">
                  <option value="Select">Select</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
				      <option value="C">C</option>
					  <option value="D">D</option>
					                                  </select>
              </label></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
			
			 <tr>
              <td height="29">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Subject</td>
			<td><label>
                <select name="sub" id="">
                  <option value="Select">Select</option>
				  <?php
				  $qry1=mysqli_query($conn,"select * from subject");
				  while($row=mysqli_fetch_array($qry1)){
				  
				  
				  
				   ?>
                  <option value="<?php echo htmlspecialchars($row['s1']); ?>"><?php echo htmlspecialchars($row['s1']); ?></option>
				   <option value="<?php echo htmlspecialchars($row['s2']); ?>"><?php echo htmlspecialchars($row['s2']); ?></option>
				    <option value="<?php echo htmlspecialchars($row['s3']); ?>"><?php echo htmlspecialchars($row['s3']); ?></option>
					 <option value="<?php echo htmlspecialchars($row['s4']); ?>"><?php echo htmlspecialchars($row['s4']); ?></option>
					  <option value="<?php echo htmlspecialchars($row['s5']); ?>"><?php echo htmlspecialchars($row['s5']); ?></option>
					   <option value="<?php echo htmlspecialchars($row['s6']); ?>"><?php echo htmlspecialchars($row['s6']); ?></option>
                 <?php } ?>
                </select>
              </label></td>
			      <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
			
			    <tr>
              <td width="7%" height="36">&nbsp;</td>
              <td width="33%">&nbsp;</td>
              <td width="13%">Exam Name </td>
              <td width="33%"><label>
              <select name="ename" >
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

              </select>
              </label></td>
              <td width="7%">&nbsp;</td>
              <td width="7%">&nbsp;</td>
            </tr>
			
			
				
			 
             
             <tr>
              <td height="37">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Session</td>
              <td><label>
                <select name="ses" >
                  <option value="Select">Select</option>
                  <option value="FN">FN</option>
                  <option value="AN">AN</option>
                                </select>
              </label></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
		  
		  
		   <tr>
              <td height="37">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Row</td>
              <td><label>
                <select name="roww" >
                  <option value="Select">Select</option>
                  <option value="R1">1</option>
                  <option value="R2">2</option>
                                </select>
              </label></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
           
          
            <tr>
              <td height="37">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Date </td>
              <td><label>
                <input name="date" type="date" id="sdate" />
              </label></td>
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
           </br></br>
		   
		   
		<?php
if (isset($_POST['btn'])) {
    $dept  = $_POST['dept']  ?? '';
    $year  = $_POST['year']  ?? '';
    $sec   = $_POST['sec']   ?? '';
    $sub   = $_POST['sub']   ?? '';
    $ename = $_POST['ename'] ?? '';
    $ses   = $_POST['ses']   ?? '';
    $roww  = $_POST['roww']  ?? '';
    $date  = $_POST['date']  ?? '';

    $chk = $conn->prepare("SELECT id FROM rooms WHERE ename = ? AND date = ? AND ses = ?");
    $chk->bind_param("sss", $ename, $date, $ses);
    $chk->execute();
    $chk->store_result();
    $count = $chk->num_rows;
    $chk->close();

    $chk1 = $conn->prepare("SELECT id FROM rooms WHERE ename = ? AND date = ? AND ses = ? AND sect = ? AND dep = ? AND sub = ?");
    $chk1->bind_param("ssssss", $ename, $date, $ses, $sec, $dept, $sub);
    $chk1->execute();
    $chk1->store_result();
    $count1 = $chk1->num_rows;
    $chk1->close();

    if ($count == 0) {
        echo '<div style="color:red;">No hall created for this exam.</div>';
    } elseif ($count1 > 0) {
        echo '<div style="color:orange;">This section is already added for this exam.</div>';
    } else {
        $maxStmt = $conn->prepare("SELECT MAX(id) AS max_id FROM rooms WHERE ename = ? AND date = ? AND ses = ? AND regno != '' AND roww = ?");
        $maxStmt->bind_param("ssss", $ename, $date, $ses, $roww);
        $maxStmt->execute();
        $maxResult = $maxStmt->get_result();
        $maxRow = $maxResult->fetch_assoc();
        $maxID = $maxRow['max_id'];
        $maxStmt->close();

        if (empty($maxID)) {
            $firstStmt = $conn->prepare("SELECT id FROM rooms WHERE roww = ? ORDER BY id ASC LIMIT 1");
            $firstStmt->bind_param("s", $roww);
            $firstStmt->execute();
            $firstResult = $firstStmt->get_result();
            $firstRow = $firstResult->fetch_assoc();
            $maxID = $firstRow['id'];
            $firstStmt->close();
        } else {
            $maxID = $maxID + 1;
        }

        $stuStmt = $conn->prepare("SELECT regno FROM student WHERE dept = ? AND year = ? AND class = ?");
        $stuStmt->bind_param("sss", $dept, $year, $sec);
        $stuStmt->execute();
        $stuResult = $stuStmt->get_result();

        $updateStmt = $conn->prepare("UPDATE rooms SET regno = ?, sect = ?, dep = ?, sub = ? WHERE id = ? AND roww = ?");
        $updateOk = false;
        while ($row3 = $stuResult->fetch_assoc()) {
            $regno = $row3['regno'];
            $updateStmt->bind_param("ssssss", $regno, $sec, $dept, $sub, $maxID, $roww);
            $updateStmt->execute();
            $updateOk = true;
            $maxID++;
        }
        $updateStmt->close();
        $stuStmt->close();

        if ($updateOk) {
            echo '<div style="color:green;">Hall allotment updated successfully.</div>';
        } else {
            echo '<div style="color:orange;">No students found for the selected criteria.</div>';
        }
    }
}
?>

 </br>          
 
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
