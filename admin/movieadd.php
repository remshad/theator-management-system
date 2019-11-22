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
    
    if(isset($_POST['submitadd']))
    {
        

        /* for ($i=0;$i<count($_POST["new_movcat"]);$i++){
            echo $_POST["new_movcat"][$i];
        } */
        $movname = $_POST["new_movname"];
        $movlang = $_POST["new_lang"];
        $movimg = $_POST["new_imgsrc"];
        $movdur = explode(":",$_POST['new_movdur']);
            $movdur = intval($movdur[0])*60 + intval($movdur[1]);   
        $movvid = $_POST["new_vidsrc"];
        $movreld = $_POST["new_movreldate"];
            $movreld = strtotime($movreld);
        $movdir = $_POST["new_movdir"];
        $movcast = $_POST["new_movcast"];
        $movprod = $_POST["new_movprod"];
        $movdesc = $_POST["new_movdesc"];
        

        if (testtexta($movname) && testtexta($movdir) && testtext($movcast) && testtext($movprod) && testtext($movdesc)){    
            $sql='INSERT INTO movie (mov_name, lang_id, mov_img_path, mov_duration, mov_description, mov_youtube_link, mov_released, mov_direction, mov_starring, mov_production) VALUES ("'.$movname.'", '.$movlang.', "'.$movimg.'", '.$movdur.', "'.$movdesc.'", "'.$movvid.'", '.$movreld.', "'.$movdir.'", "'.$movcast.'", "'.$movprod.'")';
            

            $result = mysqli_query($link,$sql);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            } else {
                $sql="SELECT MAX(mov_id) FROM movie";

                $result = mysqli_query($link,$sql);
                if(mysqli_error($link))
                {
                    die(mysqli_error($link));
                } else {
                    $row=mysqli_fetch_assoc($result);
                    $movid = $row['MAX(mov_id)'];
                }

                for ($i=0;$i<count($_POST["new_movcat"]);$i++){
                    $sql="INSERT INTO movie_category (mov_id, cat_id) VALUES ($movid, {$_POST['new_movcat'][$i]})";
                    
                    $result = mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                        break;
                    }
                }
                echo "<H1>SUCCESS</H1>";
                header( "refresh:1;url=movie.php" ); 
            } 
        } else {
            echo "<H1>UNSUCCESSFUL</H1>";
                header( "refresh:2;url=movie.php" ); 
        }
    }       
?>
        
 
<?php
    include_once('foot.php');
?>
     