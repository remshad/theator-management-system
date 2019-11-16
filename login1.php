    <?php
include_once('dbs.php');
$notlogged    =    "You need to be logged in to access this page";        // The "Need to be logged in" message 
$errormsg    =    "The password provided did not work out for you";    // The error message 
$loc_action    =    "login.php"; // The action document for the form 
$loc_succ    =    "index.php"; // Location to go to after successful login 
$loc_error    =    $_SERVER['PHP_SELF'];    // The doc to go to on bad login. You can leave $PHP_SELF in most cases 
$but_log    =    "Login";    // Text on the submit button 


if(isset($_COOKIE['t_user']) && isset($_COOKIE['t_pass']))
{
    $logged_user = $_COOKIE['t_user']; 
    $logged_pass = $_COOKIE['t_pass'];  
    
  // $logged_user=preg_replace('/[^0-9a-zA-Z ]/','',$logged_user);
  // $logged_pass=preg_replace('/[^0-9a-zA-Z ]/','',$logged_pass);       
    
}


if(isset($logged_user) && isset($logged_pass))
{
   $kku=mysqli_query($link,"select * from `user` where `u_name`='{$logged_user}' and u_password='{$logged_pass}' and type='0' ") ;
   if(mysqli_num_rows($kku)>0)
   {
   //     $bot=  mysqli_fetch_assoc($kku)  ;                               
    //  header("Location: ".$loc_succ);   
   
       
   }else
   {
      // $_GET['msg']="invalid login";
      $error[]="invalid login....";
      header("Location: ".$loc_action); 
      exit();
   }
   
}
else
{
    header("Location: ".$loc_action);  
exit();
}



 
?>

