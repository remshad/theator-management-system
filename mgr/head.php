<?php
    include_once('dbs.php');
    if (!isset($_COOKIE["share_id"]))
    {
      header("Location:login1.php");
    }
    if (isset($_COOKIE["share_id"]))
    {
      $mgr_id=$_COOKIE["share_id"];
      $th_details=mysqli_query($link,"select * from `theatre` where `mgr_id`='$mgr_id'" ) ;
      if(mysqli_num_rows($th_details) == 0)
      {
        header("Location:add_theatre.php");
      }
      else
      {
        if($_COOKIE["share_status"] == 0)
        {
          echo '<script language="javascript">';
echo 'alert("you are waiting for the aproval of admin")';
echo '</script>';
//header("Location:../index.php");
        }
      }
    }
    


  
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
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Movie
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <a href="add_movie.php">Add movie</a>
                    </li>
                    <li>
                      <a href="remove_movie.php">Remove movie</a>
                    </li>
                    </ul>
                </li>
        <li><a href="show_order.php">Orders</a></li>
        <li><a href="show_report.php">Report</a></li>
        <li><a href="change_profile.php">Change Profile</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
    </div>
  </div>
</nav>