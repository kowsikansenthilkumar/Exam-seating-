<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
include("dbconnect.php");
session_start();
extract($_POST);

if(isset($_POST['btn'])){
    $sel = mysqli_query($conn, "select * from rooms where ename='$ename' && year='$year' && date='$date' && ses='$ses'");
    $row = mysqli_fetch_assoc($sel); // Fetching the row as an associative array

    if($row === null){ // Checking if no rows are returned
        for($i = 1; $i <= 40; $i++){
            for($j = 1; $j <= 40; $j++){
			
			$a='R1';
			$b='R2';
			
			
			if($i<=20){
			
			
			
			
			
			
			
			
                $qry = mysqli_query($conn, "insert into rooms values('', '$year', '$i', 'seat$j', '$ename', '$a','','','','','$date','$ses')");
				
				
				}elseif($i>20){
				
				
				
				  $qry = mysqli_query($conn, "insert into rooms values('', '$year', '$i', 'seat$j', '$ename', '$b','','','','','$date','$ses')");
				
				}
            }
        }
        echo "<script>alert('Rooms Added Successfully')</script>";
    } else {
        echo "<script>alert('Rooms Already Added For This Exam')</script>";
    }
}
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
	 </br>        
           </br>   <form id="form1" name="form1" method="post" action="">
            <div align="center">
              <p class="style5">
              <h2>Add Exams</h2>
            ?</div>
          
          <table width="95%" border="0">
            <tr>
              <td height="36">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Exam Name</td>
              <td><label>
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
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
			
			 <tr>
              <td height="36">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Exam Date</td>
              <td><label>
			    <input type="date" name="date" required>
              </label></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
			
			
			 <tr>
              <td height="36">&nbsp;</td>
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
              <td width="7%" height="43">&nbsp;</td>
              <td width="33%">&nbsp;</td>
              <td width="13%">Year</td>
              <td width="33%"><label>
               <input type="number" name="year" required>
              </label></td>
              <td width="7%">&nbsp;</td>
              <td width="7%">&nbsp;</td>
            </tr>
     
            <tr>
              <td height="51">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><input name="btn" type="submit" class="button211" id="btn" value="Submit" />
                <input name="Submit2" type="reset" class="button211" value="Reset" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
		  </form>
               
           </br></br> </br>          
 
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
