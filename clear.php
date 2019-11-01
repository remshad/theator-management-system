<?php
session_start();
if(isset($_SESSION['mail']))
{
  
            $a=$_SESSION['mail'];
  
}
else
{
    header("location:login.php");
    //echo 'hi';
}


?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>online theatre</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
                  <style>
            select{
            width: 50%;
           
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input{
            width: 50%;
           
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        </style>
	</head>
	<body>
		<!---start-wrap--->
		<div class="wrap">
			<!---start-header--->
			<div class="header">
			<!---start-top-header--->
			<div class="top-header">
				
				
				<div class="clear"> </div>
			</div>
			<div class="clear"> </div>
			<div class="sub-header">
				<div class="logo">
					 <a href=""><img src="images/logoo.jpg" height=200px width=300px title="logo" /></a>
				</div>
				
<!--				<div class="sub-header-right">
					<ul>
                                            <li><a href="login.php">log in</a></li>
						<li><a href="signup.php">signup</a></li>
						
					</ul>
				</div>-->
				<div class="clear"> </div>
			</div>
			<div class="clear"> </div>
			<div class="top-nav">
                                               <?php
   include 'connection.php';
  // include 'connection.php';
   $a=$_SESSION['mail'];
  
  $sql="select * from signup where email='$a'" ;
  $res=  mysqli_query($conn,$sql);
  while($res1=mysqli_fetch_assoc($res))
  {
       ?>
  
				<ul>
                                    <li class="active1"><a href="admin.php">Add Films</a></li>
                                        <li><a href="view.php">View Films</a></li>
                                        <li><a href="addtheatre.php">Add Theatre </a></li>
                                          <li><a href="updatefilms.php">Update Films </a></li>
                                       <li><a href="addsnacks.php">Add Snacks </a></li>
                                         <li><a href="vieworder.php">View Order</a></li>
                                         <li><a href="clear.php">Clear Seats</a></li>
					<li style="float:right"><a href="logout.php">(<?php echo $res1['name']; ?>)</a></li> 
        
						</ul>
                                            <?php
  }                                        
  ?>
					<div class="clear"> </div>
		
			</div>
                        
                        <div class="content">
<form method="post" action="#">
    <select name="filmname">
    <?php
    $s="select * from book";
$s1=  mysqli_query($conn, $s);
while ($s2=  mysqli_fetch_assoc($s1))
{
     $sc1=$s2['filmname'];

    ?>
    <option value="<?php echo $sc1;?>"><?php echo $sc1;?></option>

   <?php
}
?>
 </select>
    <select name="time" >
    <?php
    $s="select * from book";
$s1=  mysqli_query($conn, $s);
while ($s2=  mysqli_fetch_assoc($s1))
{
     $sc1=$s2['time'];

    ?>
    <option value="<?php echo $sc1;?>"><?php echo $sc1;?></option>

   <?php
}
?>
 </select>
    <input type="submit" name="sub" value="CLEAR">
</form>
<?php
include 'connection.php';
if(isset($_POST['sub']))
{
$filmname=$_POST['filmname'];
$time=$_POST['time'];

$s="delete from book where filmname='$filmname' && time='$time'";
$s1=  mysqli_query($conn, $s);
if($s1==TRUE)
{
     echo "<script>
window.location='admin.php';
        alert('Booked seats are cleared');
                
               </script>";
}
 else {
     echo "<script>
window.location='clear.php';
        alert('Failed');
                
               </script>";
}
}
?>
</div>
                        
                        <div class="clear"> </div>
			<div class="footer">
				<div class="wrap">
				<div class="section group">
				<div class="col_1_of_4 span_1_of_4">
					<h3>INFORMATION</h3>
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Theatre List</a></li>
						<li><a href="#">Films</a></li>
					</ul>
                                </div>
				<div class="col_1_of_4 span_1_of_4 footer-lastgrid">
					<h3>Get in touch</h3>
					<ul>
						<li><a href="#"><img src="images/facebook.png" title="facebook" /></a></li>
						<li><a href="#"><img src="images/twitter.png" title="Twiiter" /></a></li>
						<li><a href="#"><img src="images/rss.png" title="Rss" /></a></li>
						<li><a href="#"><img src="images/gpluse.png" title="Google+" /></a></li>
					</ul>
					<p></p>
				</div>
			</div>
			</div>
		</div>
		<!---End-wrap--->
	</body>
</html>