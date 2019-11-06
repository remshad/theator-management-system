<?php
include_once('dbs.php');
$notlogged    =    "You need to be logged in to access this page";        // The "Need to be logged in" message 
$errormsg    =    "The password provided did not work out for you";    // The error message 
$loc_action    =    "login1.php"; // The action document for the form 
$loc_succ    =    "index.php"; // Location to go to after successful login 
$loc_error    =    $_SERVER['PHP_SELF'];    // The doc to go to on bad login. You can leave $PHP_SELF in most cases 
$but_log    =    "Login";    // Text on the submit button 


if(isset($_POST['mod'])&& $_POST['mod']='login')
{
    $mod = $_POST['mod'];   
}
if(isset($_COOKIE['share_user']) && isset($_COOKIE['share_pass']))
{
    $logged_user = $_COOKIE['share_user']; 
    $logged_pass = $_COOKIE['share_pass'];  
    
   $logged_user=preg_replace('/[^0-9a-zA-Z ]/','',$logged_user);
   $logged_pass=preg_replace('/[^0-9a-zA-Z ]/','',$logged_pass);       
    
}


if(isset($logged_user) && strstr($_SERVER['PHP_SELF'],"login1.php"))
{
   $kku=mysqli_query("select * from `user` where `Name`='{$logged_user}' and password='{$logged_pass}' and type='1' ") ;
   if(mysqli_num_rows($kku)>0)
   {
        $bot=  mysqli_fetch_assoc($kku)  ;                               
      header("Location: ".$loc_succ);   
   
       
   }else
   {
       $_GET['msg']="invalid login";
   }
   
}
else if(!isset($logged_user) && !isset($mod)) 
{ 
    echo '<html>
        <head>
    <link href="css/style.css" rel="stylesheet" type="text/css" /> 
    </head>
    <body>
    <div id="main">
    <div  id="content1">
    <div id="main1"><center> 
    <b>'.$notlogged.'</b><p>'; 
    echo'<form name="login" action="'.$loc_action.'" method="POST"> 
    </br>
    <table class="box"><caption>';
        if(isset($_GET['msg']) &&  $_GET['msg'] !='') 
    {     
        echo '<font color="red">'.$_GET['msg'].'</font>'; 
    } 

    echo '</caption>
  <tr><td><label>User Name</label> </td><td><input type="text" name="user" value=""> </td></tr>
 <tr><td><label>Password</label> </td><td>  <input type="password" name="pass" value=""> <input type="hidden" name="mod" value="login"> </td></tr>
     <tr><td colspan="2">
    <input type="submit"  value="'.$but_log.'"> 
    </td></tr></form></center>
    </div>'; 
    // If there is a bad login, the error message will be displayed 
    die; 
}
else if(!isset($logged_user) && $mod == "login") 
{
    // if the user is logging in   
    // check the password 
    $user=preg_replace('/[^0-9a-zA-Z ]/','',$_POST['user']);
   $pass=preg_replace('/[^0-9a-zA-Z ]/','',$_POST['pass']);       
   $pass=md5($pass);
  
   $aaf="select * from `user` where `name`='{$user}' and password='{$pass}'" ;
     $kku=mysqli_query($link,$aaf) ;
   if(mysqli_num_rows($kku)>0)
   {  
       $bot=  mysqli_fetch_assoc($kku)  ;
    $power=$bot['power'];
    $uid=$bot['id'];  
    
       setcookie("share_user", "{$user}"); 
       setcookie("share_pass", "{$pass}");     
       setcookie("share_id", "{$uid}"); 
       setcookie("share_power", "{$power}");   
                       
        header("Location: ".$loc_succ); 
        
    
       
   }
    else 
    { 
        // On bad login, go back to where you came from and try it again 
     //   header("Location:".$loc_action."?msg='{$errormsg}'"); 
        echo '<html>
        <head>
    <link href="css/style.css" rel="stylesheet" type="text/css" /> 
    </head>
    <body>
    <div id="main">
    <div  id="content1">
    <div id="main1"><center> 
    <b>Invalid login </b><p>'; 
    echo'<form name="login" action="'.$loc_action.'" method="POST"> 
    </br>
    <table class="box"><caption>';
        if(isset($_GET['msg']) &&  $_GET['msg'] !='') 
    {     
        echo '<font color="red">'.$_GET['msg'].'</font>'; 
    } 

    echo '</caption>
  <tr><td><label>User Name</label> </td><td><input type="text" name="user" value=""> </td></tr>
 <tr><td><label>Password</label> </td><td>  <input type="password" name="pass" value=""> <input type="hidden" name="mod" value="login"> </td></tr>
     <tr><td colspan="2">
    <input type="submit"  value="'.$but_log.'"> 
    </td></tr></form></center>
    </div>'; 
        exit;
    } 
}

 
?>

