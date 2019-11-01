
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
                                            
                                                                             
                 
                                   
                                                                  <?php
                                                    include 'connection.php';
                                                     $rat3=0; 
                                                    $movie=$_GET['filmname'];
                                                      $sql="select * from films where name='$movie'";
           $sql1=  mysqli_query($conn, $sql);
            while ($sql2=  mysqli_fetch_array($sql1))
           {
                $image=$sql2['image'];
                $name=$sql2['name'];
            }
            ?><div class="cartires-grids">
							
								<div class="cartire-grid-img">
                                                               
								
										
									 <span><h3 style="margin-left: 150px"><?php echo $name;?></h3></span>
									<img src="films/.<?php echo $image?>" height="200" style="margin-left: 150px">
                                                                   
                                                                </div>
								
                                                            <?php
								$rat="select * from review where moviename='$movie'";
           $rat1=  mysqli_query($conn, $rat);
           while ($rat2=  mysqli_fetch_array($rat1))
           {
           $rat3+=$rat2['rating'];
           
          $rating=$rat2['review'];
          $user=$rat2['username'];
           
           
             
           
           
          
           ?>
                                 
							

						
								<div class="cartire-grid-info">
                                                                        <p style="margin-left: 150px"><b><?php echo $rating;?></b></p>
                                                                        <h3 style="margin-left: 250px"><?php echo $user;?></h3>
									  <?php
                                                                         
							}
           echo $rat3;
           ?>
                                                                </div>
                                                           
								<div class="clear"> </div>
                                                              
							<br />
							
							
						</div>
								
								
									
										
									
									
                                                                     
							
                                                                                
                                                                                
								
								<div class="clear"> </div>
							<br />
							
						
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



