
<?php
$cdate=  date("d/m/Y");

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
  table, th, td{
    border: 1px solid black;


            padding: 20px;
         
        }
        th{
            color: #361775;
            font-size: larger;
            font-style: oblique; 
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
<ul>
                                    <li class="active1"><a href="index.php">Home</a></li>
                                    <li><a href="viewfilms.php">Reviews</a></li>
                                    <li><a href="films.php">Films</a></li>
                                    <li><a href="theaterlist.php">Theatre List</a></li>
                                        <li><a href="snacks.php">Snacks</a></li>
                                        <li><a href="about.php">About</a></li>
                                        <li><a href="contact.php">Contact</a></li>
					
					<div class="clear"> </div>
				</ul>
			</div>
			<!---end-top-header--->
			<!---End-header--->
			</div>
       
					<div class="content">
                                            
                                    
					<div class="products-box">
					<div class="products">
						
                                                
       
                    
						<div class="section group">
                                                    <form action="#" method="post">
                                                    <table>
                                                        <tr><td>ITEM NAME</td><td><select name="name" <option value="">select
				</option>
                    <?php
               
   include 'connection.php';
   $a1="select * from snacks";
                $ar=  mysqli_query($conn, $a1);
       while($s=mysqli_fetch_assoc($ar))
	     {
	?>
      <option value="<?php echo $s["name"]; ?>" ><?php echo $s["name"]; ?>
      </option>
    <?php
		 }
	 ?>
					
				</select></td>
                                                        <tr><td>Quantity</td><td><input type="text" name="quantity"></td></tr>
                                                        <tr><td>Username</td><td><input type="text" name="username" required=""></td></tr>
                                                        <tr><td>Theatrename</td><td><select name="theatrename">             
  <?php
   include 'connection.php';
   $a="select * from theatre";
                $ar=  mysqli_query($conn, $a);
       while($s=mysqli_fetch_assoc($ar))
	     {
	?>
      <option value="<?php echo $s["theatrename"]; ?>" ><?php echo $s["theatrename"]; ?>
      </option>
    <?php
		 }
	 ?></select></td></tr>
                                                    
                                                        <tr><td>Date</td><td><input type="text" name="date" required="" value="<?php echo $cdate;?>"></td></tr>       
                                                        <tr><td colspan="2"><center><input type="submit" name="sub" value="SUBMIT"></center></td></tr>
                                                    </table>
                                                    </form>
                                                    
                                                    
                                                    
                                                    
                                                    </div>
                                               
					</div>
					
				</div>
			</div>
				</div>
			</div>
					</div>
					<!--End-cartires-page---->
				</div>
			<div class="clear"> </div>
		</div>
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

if(isset($_POST['sub']))
{
    
    $name=$_POST['name'];
    $count=$_POST['quantity'];
    $user=$_POST['username'];
     $theatrename=$_POST['theatrename'];
     $date=$_POST['date'];
    $s="select * from snacks where name='$name'";
    $s1=  mysqli_query($conn, $s);
    while ($s2=  mysqli_fetch_assoc($s1))
    {
        
        $price=$s2['price'];
    }
    session_start();
        $t=$count * $price;
        $_SESSION['total']=$t;
        
        $s3="insert into buy(name,price,quantity,totalamount,username,theatrename,date,status)values('$name','$price','$count','$t','$user','$theatrename','$date','ordered')";
        $s4=  mysqli_query($conn, $s3);
        if($s4==TRUE)
        {
      echo "<script>alert('total amount is'+'$t'+'username is'+'$user');
                window.location='bank.php';
               </script>";
        }
 else {
      echo "<script>alert('failed');
                
               </script>";
 }
        
}
?>