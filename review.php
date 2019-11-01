

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
                      textarea{
                          width:500px;
                       height:200px;
                      }
                      p input{
                          height: 50px;
                          margin-left: 300px;
                          margin-top: 50px;
                          margin-bottom: 50px;
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

			</div>
			<!---end-top-header--->
			<!---End-header--->
			</div>
       
			<div class="content">

				
										<div class="Cartires">

						<div class="cartires-grids">
							<div class="cartire-grid">
                                                            <?php
                                                            include 'connection.php';
                                                            $id=$_GET['id'];
                                                            $a="select * from films where id=$id";
                                                                    $b=  mysqli_query($conn,$a);
                                                                     while($c=mysqli_fetch_assoc($b))
       {
           $name=$c['name'];
          
           $lang=$c['language'];
           $type=$c['category'];
           $image=$c['image'];
                                                            ?>
								<div class="cartire-grid-img">
                                                                    <img src="films/.<?php echo $image?>"height="300px" width="200px"title="tries" />
								</div>
                                                             <form action="#" method="post">
								<div class="cartire-grid-info">
									<ul>
                                                                            <li><span><?php echo $name?></span> |&nbsp;&nbsp;<?php echo $lang;?> !</li>
									</ul>
                                                                    <h3><?php echo $type?></h3>
                                                                   
                                                                    <p><textarea name="reviews" placeholder="write your reviews"></textarea></p>
                                                                    <p><input type="text" name="name" required="" placeholder="type your name"></p>
								</div>
								<div class="cartire-grid-cartinfo">
									<h4>Rating</h4>
                                                                        <input type="radio" name="rate" value="5">Good<br>
                                                                        <input type="radio" name="rate" value="4">Above Average<br>
                                                                        <input type="radio" name="rate" value="3">Average<br>
                                                                        <input type="radio" name="rate" value="2">Below Average<br>
                                                                        <input type="radio" name="rate" value="1">Bad<br><br><br><br><br><br><br><br><br>
                                                                        <input type="submit" name="sub" value="sumbit">  
								</div>
                                                             </form>
								<div class="clear"> </div>
							</div>
                                                    <?php
       }?><br />
							
							
						</div>
								
								<div class="clear"> </div>
							</div><br />
							
							
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
    $user=$_POST['name'];
    $rev=$_POST['reviews'];
    $rat=$_POST['rate'];
    $sql="insert into review(moviename,language,review,rating,category,username) values('$name','$lang','$rev','$rat','$type','$user')";
    $sql1=  mysqli_query($conn, $sql);
    if($sql1=TRUE)
    {
         echo "<script>alert('review added');window.location='films.php';</script>";
    }
    else
         echo "<script>alert('failed');window.location='review.php';</script>";
}
?>

