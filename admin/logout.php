<?php 
    setcookie("t_user", "", time()-3600,"/");
    setcookie("t_pass", "", time()-3600,"/");    
    setcookie("t_power", "", time()-3600,"/");
  //  setcookie("share_power", "", time()-3600);    
    unset($_COOKIE['t_user']);
    unset($_COOKIE['t_pass']);   
    unset($_COOKIE['t_power']);
    //unset($_COOKIE['share_power']);   
    header("Location:../login.php"); 
    exit();
?>