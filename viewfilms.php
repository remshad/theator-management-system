
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
                          
				<<ul>
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
                                                    <?php
                                                    include 'connection.php';
                   
                    
       $a="select * from films";
       $b=mysqli_query($conn, $a);
       while($c=mysqli_fetch_assoc($b))
       {
           $name=$c['name'];
          
           $lang=$c['language'];
           $type=$c['category'];
           $image=$c['image'];
         
       ?>
							<div class="grid_1_of_5 images_1_of_5">
                                                         
                                           
                                                            <img src="films/.<?php echo $image?>"height="200px">
                                                                 <h3><?php echo $name; ?></h3>
								 <p><?php echo $lang; ?></p>
								 <h4><?php echo $type; ?></h4>
                                                                
                                                                 <div class="button"><span><a href="viewrating.php?filmname=<?php echo $name;?>">Read More</a></span></div>
						   </div>
							 <?php
                    }
                                        ?>
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

