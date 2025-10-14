<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();
	error_reporting(0);
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
           </br>       <form id="form1" name="form1" method="post" action="">
            <div align="center">
            <p class="style5"></div>
          
          <table width="95%" border="0">
            <tr>
              <td width="8%" height="36">&nbsp;</td>
             
              </select></td>
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
			    <td width="8%">Select Hall</td>
			  <td><label>
                <select name="room" id="">
                  <option value="Select">Select</option>
				  <?php
				  $qry1=mysqli_query($conn,"select distinct(roomnum) from rooms");
				  while($row=mysqli_fetch_array($qry1)){
				  
				  
				  
				   ?>
                  <option value="<?php echo $row['roomnum']; ?>"><?php echo $row['roomnum']; ?></option>
                 <?php } ?>
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
            </tr>
		<?php 	if(isset($_POST['btn']))
			{
          ?>
          </table>
		  </form>
		  <table width="80%" border="1" align="center">
            <tr>
			
             
              <td ><div align="center" class="style4">Seat</div></td>
			  
			   <td ><div align="center" class="style4">Register Number</div></td>
			     <td ><div align="center" class="style4">Exam</div></td>
           
              </tr>
			<?php
			
			$i1=1;
			$i=1;
			$qrt=mysqli_query($conn,"select * from rooms where date='$date' && ses='$ses' && roomnum='$room' && ename='$sem'");
			while($rb=mysqli_fetch_array($qrt)){
			
			
			
			?>
            <tr>
            
             
              <td><div align="center"><?php echo $rb['seat'];?></div></td>
			      <td><div align="center"><?php echo $rb['regno'];?></div></td>
				        <td><div align="center"><?php echo $rb['sub'];?></div></td>
              </tr>
			<?php
			}
			
			
			?>
			 
			<?php } ?>
          </table>
               
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
