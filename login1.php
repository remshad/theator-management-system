    <?php
include_once('db.php');
$notlogged    =    "You need to be logged in to access this page";        // The "Need to be logged in" message 
$errormsg    =    "The password provided did not work out for you";    // The error message 
$loc_action    =    "login.php"; // The action document for the form 
$loc_succ    =    "index.php"; // Location to go to after successful login 
$loc_error    =    $_SERVER['PHP_SELF'];    // The doc to go to on bad login. You can leave $PHP_SELF in most cases 
$but_log    =    "Login";    // Text on the submit button 

$power=0;
$user='';


if(isset($_COOKIE['t_user']) && isset($_COOKIE['t_pass'])   )
{
    $logged_user = $_COOKIE['t_user'];
    $logged_pass = $_COOKIE['t_pass'];
    $type=$_COOKIE['t_power'];
    
  // $logged_user=preg_replace('/[^0-9a-zA-Z ]/','',$logged_user);
  // $logged_pass=preg_replace('/[^0-9a-zA-Z ]/','',$logged_pass);       
    
}

//echo $logged_user." ".$logged_pass;



if(isset($logged_user) && isset($logged_pass))
{
    $sql="select * from `user` where `u_name`='{$logged_user}' and u_password='{$logged_pass}' and u_type='{$type}' ";
   $kku=mysqli_query($link,$sql) ;
if(mysqli_error($link))
{
    die(mysqli_error($link));
}else{

//   echo "select * from `user` where `u_name`='{$logged_user}' and u_password='{$logged_pass}' and type='0' ";
   if(mysqli_num_rows($kku)>0)
   {
       global $user,$power;
       $user=$logged_user;
       $power=$type;
   //     $bot=  mysqli_fetch_assoc($kku)  ;                               
    //  header("Location: ".$loc_succ);   
   
       
   }else
   {
       $_GET['msg']="invalid login";
      $error[]="invalid login....";
     header("Location: ".$loc_action."?".implode("ad=",$error)); 
      exit();
   }
}
   
}
else
{
    header("Location: ".$loc_action);  
exit();
}



 
?>

