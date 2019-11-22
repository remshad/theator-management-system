<?php
    include_once('dbs.php');
  
?>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
   <meta charset="utf-8">

 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="css/style.css?key=<?php echo time(); ?>" rel="stylesheet" type="text/css" />


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
      <a class="navbar-brand" href="index.php">Admin Control</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    
    <ul class="nav navbar-nav">
        <li <?php if(strstr($_SERVER['PHP_SELF'],'add_category.php')) echo 'class="active"';  ?> ><a href="add_category.php">Category</a></li>
        <li <?php if(strstr($_SERVER['PHP_SELF'],'add_lang.php')) echo 'class="active"';  ?> ><a href="add_lang.php">Languages</a></li>
        <li <?php if(strstr($_SERVER['PHP_SELF'],'time_slots.php')) echo 'class="active"';  ?> ><a href="time_slots.php">Time Slots</a></li>
        <li <?php if(strstr($_SERVER['PHP_SELF'],'location.php')) echo 'class="active"';  ?> ><a href="location.php">Locations</a></li>
        <li <?php if(strstr($_SERVER['PHP_SELF'],'users.php')) echo 'class="active"';  ?> ><a href="users.php">Users</a></li>
        <li <?php if(strstr($_SERVER['PHP_SELF'],'movie.php')) echo 'class="active"';  ?> ><a href="movie.php">Movies</a></li>
        <li <?php if(strstr($_SERVER['PHP_SELF'],'report.php')) echo 'class="active"';  ?> ><a href="report.php">Report</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    </div>
  </div>
</nav>