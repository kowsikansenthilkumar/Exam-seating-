<?php
session_start();
include("dbconnect.php");
extract($_POST);
if(isset($_POST['btn']))
{

	$qry=mysqli_query($conn,"insert into subject values('','$dept','$sem','$s1','$s2','$s3','$s4','$s5','$s6')");
if($qry)
{
?>
<script language="javascript">
	alert("Subject Add Successfully..");
	window.location.href="addsub.php";
	</script>
	<?php
}
else
{
?>
<script language="javascript">
	alert("Subject  Add Unsuccessfully..");
	window.location.href="addsub.php";
	</script>
	<?php
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
              <h2>Subject  Details </h2>
            �</div>
          
          <table width="95%" border="0">
            <tr>
              <td height="36">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Department</td>
              <td><label>
			    <select name="dept" id="dept">
               <option value="Select">Select</option>
                    
                    <option value="EEE">EEE</option>
  <option value="CSE">CSE</option>
  <option value="MECH">MECH</option>
    <option value="CIVIL">CIVIL</option>
	 <option value="ECE">ECE</option>
	  <option value="IT">IT</option>	  </select>
              </label></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="7%" height="43">&nbsp;</td>
              <td width="33%">&nbsp;</td>
              <td width="13%">Semester</td>
              <td width="33%"><label>
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
              <td width="7%">&nbsp;</td>
              <td width="7%">&nbsp;</td>
            </tr>
            <tr>
              <td height="32">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Subject1</td>
              <td><input name="s1" type="text" id="s1" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="51">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Subject2</td>
              <td><input name="s2" type="text" id="s2" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="51">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Subject3</td>
              <td><input name="s3" type="text" id="s3" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="51">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Subject4</td>
              <td><input name="s4" type="text" id="s4" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="51">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Subject5</td>
              <td><input name="s5" type="text" id="s5" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="51">&nbsp;</td>
              <td>&nbsp;</td>
              <td>Subject6</td>
              <td><input name="s6" type="text" id="s6" /></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
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
