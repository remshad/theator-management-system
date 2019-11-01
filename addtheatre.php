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
                   table{
            margin-top: 100px;
            margin-left: 35%;
           margin-right: 35%;
           margin-bottom: 100px;
            padding: 50px;
            width: 30%;
        }
        input{
            width: 100%;
           
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
         select{
            width: 100%;
           
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
                           <form action="#" method="post" enctype="multipart/form-data">
          <table>
              <tr><td colspan="2"><center><h1><b>ADD THEATRES</b></h1></center></td></tr>
              <tr><td>THEATRE NAME</td><td><input type="text" name="theatrename" placeholder="enter theatre name"></td></tr>
              
              <tr><td>SCREEN1</td><td><select name="screen1" <option value="">select
				</option>
                    <?php
   include 'connection.php';
   $a="select * from films";
                $ar=  mysqli_query($conn, $a);
       while($s=mysqli_fetch_assoc($ar))
	     {
	?>
      <option value="<?php echo $s["name"]; ?>" ><?php echo $s["name"]; ?>
      </option>
    <?php
		 }
	 ?>
					
				</select></td></tr>
            
               <tr><td>SCREEN2</td><td><select name="screen2" <option value="">select
				</option>
                    <?php
   include 'connection.php';
   $a="select * from films";
                $ar=  mysqli_query($conn, $a);
       while($s=mysqli_fetch_assoc($ar))
	     {
	?>
      <option value="<?php echo $s["name"]; ?>" ><?php echo $s["name"]; ?>
      </option>
    <?php
		 }
	 ?>
					
				</select></td></tr>
              
               <tr><td>MORNING SHOW</td><td><input type="time" name="mshow" ></td></tr>
               <tr><td>MATINEE</td><td><input type="time" name="matinee"></td></tr>
               <tr><td>FIRST SHOW</td><td><input type="time" name="fshow"></td></tr>
               <tr><td>SECOND SHOW</td><td><input type="time" name="sshow"></td></tr>
              
              <tr><td colspan="2"><input type="submit" value="ADD" name="add"></td></tr>
          </table>
          </form>
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

 <?php
      include 'connection.php';
      if(isset($_POST['add']))
      {
          $theatrename=$_POST['theatrename'];
      
          $screen1=$_POST['screen1'];
           $screen2=$_POST['screen2'];
       
           $show1=$_POST['mshow'];
      $show2=$_POST['matinee'];
      $show3=$_POST['fshow'];
      $show4=$_POST['sshow'];
      
          
    
   $sql="insert into theatre(theatrename,screen1,screen2,morningshow,matinee,firstshow,secondshow)values('$theatrename','$screen1','$screen2','$show1','$show2','$show3','$show4')";
    $res=  mysqli_query($conn,$sql);
    if ($res==TRUE)
    {
        echo "<script>alert('Theater added successfully');
                
               </script>";
    }
 else {
        echo "<script>
               
                alert('failed');
                </script>";
    }
    
}
?>










      