<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();
if(isset($_POST['btn']))
{

  
$qry1=mysqli_query($conn,"select * from staffreg where regno='$uname' ");
$num=mysqli_num_rows($qry1);
if($num==1)
{
	echo "<script>alert('username already taken')</script>";
}else{

 


$qry=mysqli_query($conn,"insert into staffreg values('','$name','$age','$gender','$dep','$email','$uname','$psw')");
	if($qry){
	echo "<script>alert('inserted sucessfully')</script>";
	
	}
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
           </br>  <form id="f1" name="f1" method="post" action="#" enctype="multipart/form-data">
  <table width="35%" border="0" align="center">
	
    <tr>
      <td height="40" colspan="2"  align="center" ><div class="style5"><h3>Staff Registration</h></div></td>
    </tr>
	
    <tr>
     
      <td width="41%" height="44">Name</td>
      <td width="59%"><input name="name" type="text" id="name" required/>
      </td>
      
    </tr>
	
	
	 <tr>
    
      <td height="36">Date Of Birth</td>
      <td>
        <input name="age" type="date" id="age"  required/>
      </td>
     
    </tr>
	
    <tr>
     
      <td height="38">Gender</td>
      <td><input name="gender" type="radio" value="male" required/>
        Male
          <input name="gender" type="radio" value="female" /> 
          Female</td>
     
    </tr>
	
   
	
		 <tr>
      <td height="39">department</td>
	  
	  
      <td> <select name="dep"> <option value="Select">Select</option>
                    
                    <option value="EEE">EEE</option>
  <option value="CSE">CSE</option>
  <option value="MECH">MECH</option>
    <option value="CIVIL">CIVIL</option>
	 <option value="ECE">ECE</option>
	  <option value="IT">IT</option>
			  </select>		</td>
      
    </tr>
		
		<tr>
      <td height="41">Email Id</td>
      <td><input name="email" type="email" id="email" required/></td>
    </tr>
	
    <tr>
      <td height="40">Register Number</td>
      <td><input name="uname" type="text" id="uname" required/></td>
    </tr>
	
    <tr>
     <td height="42">Password</td>
      <td><input name="psw" type="password" id="psw" required/></td>
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
