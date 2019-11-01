
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
            margin-top: 0px;
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
				
				<div class="sub-header-right">
					<ul>
                                            <li><a href="login.php">log in</a></li>
						<li><a href="signup.php">signup</a></li>
						
					</ul>
				</div>
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
                        
                        <div class="content">
                            <div class="contact-form">
				  
					     <form action="#" method="post">
          <table>
              <tr><td colspan="2"><center><h1><b>LOGIN</b></h1></center></td></tr>
              
              <tr><td>EMAIL</td><td><input type="email" name="mail" placeholder="enter your mail"></td></tr>
              <tr><td>PASSWORD</td><td><input type="password" name="pass" placeholder="enter your password"></td></tr>
              <tr><td colspan="2"><input type="submit" value="LOGIN" name="login"></td></tr>
          </table>
                                                             </form>
				    </div>
                            
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
session_start();
      include 'connection.php';
      if(isset($_POST['login']))
      {
            $mail = $_POST['mail'];
            $password = $_POST['pass'];
        
           $_SESSION['mail']=$mail;
            $sql="select * from login where email='$mail' && password='$password'";
            $res=  mysqli_query($conn, $sql);
            $res1=  mysqli_fetch_assoc($res);
                    if($mail=='admin@gmail.com' && $password=='admin')
                    {
                echo "<script>
                window.location='admin.php';
                </script>";
            }
            else 
                {
                   
            $sql = "select * from login where email='$mail' && password='$password'";
            $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);

     
 



 
 if($row == TRUE)
            {
                echo "<script>
       
        window.location='films.php';
        
        alert('success ');
        
</script>";
            } else {
               
                echo "<script>
       
        window.location='login.php';
        
      alert('failed ');
        
</script>";
            }
       }
        


      }

?>