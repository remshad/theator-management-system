




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
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
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
			<!---end-top-header--->
			<!---End-header--->
			</div>
				<div class="content">
                                    <table>
  <tr>
    <th>THEATER NAME</th>
 
    <th>SCREEN1</th>

    <th>SCREEN2</th>
   
    <th>MORNIG SHOW</th>
    <th>MATINEE</th>
    <th>FIRST SHOW</th>
        <th>SECOND SHOW</th>

  </tr>
  <?php
  include 'connection.php';
  $sql="select * from theatre";
          $sql1=  mysqli_query($conn, $sql);
          while ($res=  mysqli_fetch_assoc($sql1))
          {
              
          $theatrename=$res['theatrename'];
     
          $screen1=$res['screen1'];
         
           $screen2=$res['screen2'];
          
    
           $show1=$res['morningshow'];
      $show2=$res['matinee'];
      $show3=$res['firstshow'];
      $show4=$res['secondshow'];
      ?>
  <tr><td><?php echo $theatrename;?></td><td><a href="book.php?name=<?php echo $theatrename;?>&screen1=<?php echo $screen1; ?>&show1=<?php echo $show1; ?>&show2=<?php echo $show2; ?>&show3=<?php echo $show3; ?>&show4=<?php echo $show4; ?>"><?php echo $screen1;?></a></td><td><a href="book1.php?name=<?php echo $theatrename;?>&screen2=<?php echo $screen2; ?>&show1=<?php echo $show1; ?>&show2=<?php echo $show2; ?>&show3=<?php echo $show3; ?>&show4=<?php echo $show4; ?>"><?php echo $screen2;?></a></td><td><?php echo $show1;?></td><td><?php echo $show2;?></td><td><?php echo $show3;?></td><td><?php echo $show4;?></td></tr>
        <?php
  }
  ?>

</table>
				
							
							
							
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
<!--				<div class="col_1_of_4 span_1_of_4">
					<h3>OUR OFFERS</h3>
					<ul>
						<li><a href="#">New products</a></li>
						<li><a href="#">top sellers</a></li>
						<li><a href="#">Specials</a></li>
						<li><a href="#">Products</a></li>
						<li><a href="#">Comments</a></li>
					</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>YOUR ACCOUNT</h3>
					<ul>
						<li><a href="#">Your Account</a></li>
						<li><a href="#">Personal info</a></li>
						<li><a href="#">Prices</a></li>
						<li><a href="#">Address</a></li>
						<li><a href="#">Locations</a></li>
					</ul>
				</div>-->
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

