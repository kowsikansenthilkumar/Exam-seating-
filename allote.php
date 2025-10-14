<?php
session_start();
include("dbconnect.php");
extract($_POST);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Free Education Template</title>
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
					<li><a href="addsub.php">ADD SUBJECT</a></li>
                  <li><a href="addhall.php">ADD HALL</a></li>
				   <li><a href="allote.php">ALLOTE HALL</a></li>
				      
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
                  <option value="<?php echo $row['s1']; ?>"><?php echo $row['s1']; ?></option>
				   <option value="<?php echo $row['s2']; ?>"><?php echo $row['s2']; ?></option>
				    <option value="<?php echo $row['s3']; ?>"><?php echo $row['s3']; ?></option>
					 <option value="<?php echo $row['s4']; ?>"><?php echo $row['s4']; ?></option>
					  <option value="<?php echo $row['s5']; ?>"><?php echo $row['s5']; ?></option>
					   <option value="<?php echo $row['s6']; ?>"><?php echo $row['s6']; ?></option>
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
if(isset($_POST['btn'])) {
    $check = mysqli_query($conn, "SELECT * FROM rooms WHERE ename='$ename' AND date='$date' AND ses='$ses'");
    $count = mysqli_num_rows($check);
	
	
	$check1 = mysqli_query($conn, "SELECT * FROM rooms WHERE ename='$ename' AND date='$date' AND ses='$ses' AND sect='$sec' AND dep='$dept' AND sub='$sub'");
    $count1 = mysqli_num_rows($check1);
	
	

    if ($count == 0) {
        echo "<script>alert('No hall created for this exam')</script>";
    }elseif ($count1 > 0) {
        echo "<script>alert('already this sec added for this exam')</script>";
    }else {
        $sql = "SELECT MAX(id) AS max_id FROM rooms WHERE ename='$ename' AND date='$date' AND ses='$ses' AND regno!='' AND roww='$roww'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_array($result);
			
			
			
			
			
            $maxID = $row['max_id'] ;

           



            
			
			
			if($maxID==0){
			
			$qt=mysqli_query($conn,"SELECT id FROM rooms  where roww='$roww' ORDER BY id ASC LIMIT 1");
			
			$rw=mysqli_fetch_array($qt);
			
			
			 $maxID = $rw[0];
			
			
			}else{
			
			            $maxID = $row['max_id']+1;
			}
			
			
           // Displaying the value of $maxID

            $qry3 = mysqli_query($conn, "SELECT * FROM student WHERE dept='$dept' AND year='$year' AND class='$sec'");
            $num = mysqli_num_rows($qry3);
            $num;  // Displaying the value of $num

            while ($row3 = mysqli_fetch_array($qry3)) {
                $regno = $row3['regno'];

                // Assuming you want to update the row with the specific $maxID
                $qry4 = mysqli_query($conn,"UPDATE rooms SET regno='$regno',sect='$sec',dep='$dept',sub='$sub' WHERE id='$maxID' AND roww='$roww' ");
                $maxID++;
            }

           if ($qry4) {
    echo "Update successful";
} else {
    echo "Update failed: " . mysqli_error($conn);
}
        } 
    }
}

?>

 </br>          
 
<br />
          &copy 2024examseat| All Rights Reserved |  <a href="http://binarytheme.com" style="color: #fff" target="_blank">Design by : binarytheme.com</a>
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
