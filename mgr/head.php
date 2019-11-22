<?php
    include_once('dbs.php');
    if (isset($_COOKIE["t_id"]))
    {
      $mgr_id=$_COOKIE["t_id"];
      //echo "select * from `theatre` where `u_id`='$mgr_id'";
      $th_details1=mysqli_query($link,"select * from `theatre` where `u_id`='$mgr_id'" ) ;
      if(mysqli_num_rows($th_details1) == 0)
      {
        header("Location:add_theatre.php");
      }
      else
      {
        $th_details=mysqli_fetch_array($th_details1);
        if($_COOKIE["t_status"] == 0)
        {
           echo "<script>
alert('you are waiting for the aproval of admin');
window.location.href='login.php';
</script>";
//header("Location:../index.php");
        }
      }
    
    $th_id=$th_details['t_id'];
    $screen_details=mysqli_query($link,"select * from `screen` where `t_id`='$th_id'" ) ; 
 $sc_details=array();
    while ($myrow =mysqli_fetch_array($screen_details))
    {
      $sc_details[]=$myrow;
    } 
    } 
    //print_r($sc_details);     
    


  
?>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
   <meta charset="utf-8">

 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <?php
    if(isset($head)) echo $head;
?>         
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Theatre Control</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    
    <ul class="nav navbar-nav">
      <li><a href="add_timeslot.php">Add Timeslot</a></li>
      <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Add Movie
                    <span class="caret"></span>
                  </a>
      <ul class="dropdown-menu" role="menu">
        <?php
        foreach ($sc_details as $sc)
         {
        ?>
                    <li>
                      <a href="add_movie.php?sc_id=<?php echo $sc['scr_id']; ?>"><?php echo $sc['scr_name']; ?></a>
                    </li>
                    <?php
                  }
                  ?>
                  </ul>
                </li>
        <li><a href="show_report.php">Report</a></li>
        <!-- <li><a href="change_profile.php">Change Profile</a></li> -->
      <li><a href="logout.php">Logout</a></li>
    </ul>
    </div>
  </div>
</nav>