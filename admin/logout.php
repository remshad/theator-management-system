<?php 
    setcookie("share_user", "", time()-3600);
    setcookie("share_pass", "", time()-3600);    
    setcookie("share_id", "", time()-3600);
    setcookie("share_power", "", time()-3600);    
    unset($_COOKIE['share_user']);
    unset($_COOKIE['share_pass']);   
    unset($_COOKIE['share_id']);
    unset($_COOKIE['share_power']);   
    header("Location:login1.php"); 
?>