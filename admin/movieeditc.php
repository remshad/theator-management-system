<?php
require('login1.php'); 

//include_once('head.php');    
?>  


<div class="container">

<?php
  
  function testtext($text){
    if((!preg_match("/^[a-zA-Z0-9\W ]+$/",$text))||(preg_match("/^[ ]+$/",$text)))  
    {
        return false;     
    } else {
        return true;
    }
}

function testtexta($text){
    if((!preg_match("/^[a-zA-Z ]+$/",$text))||(preg_match("/^[ ]+$/",$text)))  
    {
        return false;     
    } else {
        return true;
    }
}   
    
    if(isset($_POST['submiteditc']))
    {
        
    /*
        


        array(12) { 
            ["new_movname"]=> string(7) "movname" 
            ["new_lang"]=> string(1) "1" 
            ["new_movcat"]=> array(2) { 
                [0]=> string(1) "4" 
                [1]=> string(1) "5" 
            } 
            ["new_imgsrc"]=> string(7) "pic.jpg" 
            ["new_movdur"]=> string(5) "02:20" 
            ["new_vidsrc"]=> string(11) "vid.com/vid" 
            ["new_movreldate"]=> string(10) "2019-11-13" 
            ["new_movdir"]=> string(3) "Abc" 
            ["new_movcast"]=> string(8) "Mno, Xyz" 
            ["new_movprod"]=> string(9) "Universal" 
            ["new_movdesc"]=> string(18) "Happily Ever After" 
            ["submitadd"]=> string(3) "Add" 
        }

        array(2) { 
            [0]=> string(1) "4" 
            [1]=> string(1) "5" 
        }


        */
        //var_dump($_POST);
        //echo "<br><br>";
        //var_dump($_POST['new_movcat']);

        /* for ($i=0;$i<count($_POST["new_movcat"]);$i++){
            echo $_POST["new_movcat"][$i];
        } */
        

        $movid = $_POST["new_movid"];
        $movname = $_POST["new_movname"];
        $movlang = $_POST["new_lang"];
        $movimg = $_POST["new_imgsrc"];
        $movdur = explode(":",$_POST['new_movdur']);
            $movdur = intval($movdur[0])*60 + intval($movdur[1]);   
        $movvid = $_POST["new_vidsrc"];
        $movreld = $_POST["new_movreldate"];
            $movreld = strtotime($movreld);
        $movdir = $_POST["new_movdir"];
        $movcast = trim($_POST["new_movcast"], '\'');
        $movprod = $_POST["new_movprod"];
        $movdesc = trim($_POST["new_movdesc"], '\'');


        
        //echo "<br><br>".$sql;


        if (testtexta($movname) && testtexta($movdir) && testtext($movcast) && testtext($movprod) && testtext($movdesc)){
            $sql='UPDATE movie SET 
                mov_name="'.$movname.'",
                lang_id="'.$movlang.'",
                mov_img_path="'.$movimg.'",
                mov_duration="'.$movdur.'",
                mov_description="'.$movdesc.'",
                mov_youtube_link="'.$movvid.'",
                mov_released="'.$movreld.'",
                mov_direction="'.$movdir.'",
                mov_starring="'.$movcast.'",
                mov_production="'.$movprod.'" 
                WHERE 
                mov_id='.$movid;
            $result=mysqli_query($link,$sql);

            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            } else {
                
                echo "<H1>SUCCESS</H1>";
                header( "refresh:2;url=movieedit.php?movid=".$movid); 
            }
        }
    }       
?>
        
 
<?php
    include_once('foot.php');
?>
     