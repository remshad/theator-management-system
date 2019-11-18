<?php
require('login1.php'); 

//include_once('head.php');    
?>  


<div class="container">

<?php
  
    if(isset($_GET['action']))
    {
        if($_GET['action']=='edit')
        {    
            if(isset($_GET['cat_id']))
            {
                if(isset($_GET['nvalue']) && strlen($_GET['nvalue'])>0)
                {
                    $_GET['nvalue']=mysqli_real_escape_string($link,$_GET['nvalue']);
                    $_GET['cat_id']=intval($_GET['cat_id']);
                    urldecode($_GET['nvalue']);
                    $sql="UPDATE category set cat_name='{$_GET['nvalue']}' WHERE cat_id='{$_GET['cat_id']}'";
                    $result=mysqli_query($link,$sql);
                    if(mysqli_error($link))
                    {
                        die(mysqli_error($link));
                    }
                }
            }
        }
    }
    
    if(isset($_POST['submitadd']))
    {
        
    /*
        if(isset($_POST['new_cat']) && strlen($_POST['new_cat'])>2)
        {
            //echo '<script>alert("'.$_GET['nvalue'].'")</script>';
            
            $_POST['new_cat']=mysqli_real_escape_string($link,$_POST['new_cat']);
            $sql="SELECT * FROM category WHERE cat_name='{$_POST['new_cat']}'";

            
            $result = mysqli_query($link,$sql);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            }
            
            if(mysqli_num_rows($result)>0)
            {
                echo '<script>alert("Duplicate Entry Not Allowed")</script>';
            } else {

                $sql="INSERT INTO category (cat_name) VALUES ('{$_POST['new_cat']}')";
                //echo $sql;
                
                $result = mysqli_query($link,$sql);
                if(mysqli_error($link))
                {
                    die(mysqli_error($link));
                }
            }    
        }


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

        for ($i=0;$i<count($_POST["new_movcat"]);$i++){
            echo $_POST["new_movcat"][$i];
        }
        echo '<br>';
        $movname = $_POST["new_movname"];
        $movlang = $_POST["new_lang"];
        $movimg = $_POST["new_imgsrc"];
           //$movimg = mysqli_real_escape_string($link,$movimg);
        $movdur = explode(":",$_POST['new_movdur']);
            $movdur = intval($movdur[0])*60 + intval($movdur[1]);   
        $movvid = $_POST["new_vidsrc"];
           //$movvid = mysqli_real_escape_string($link,$movvid);
        $movreld = $_POST["new_movreldate"];
            $movreld = strtotime($movreld);
        $movdir = $_POST["new_movdir"];
        $movcast = $_POST["new_movcast"];
        $movprod = $_POST["new_movprod"];
        $movdesc = $_POST["new_movdesc"];
        echo $movimg."<br>";
        //echo $movname.$movlang.$movimg.$movdur.$movvid.$movreld.$movdir.$movcast.$movprod.$movdesc;
        /*$parsedUrl = parse_url( $url );

        if( $parsedUrl['scheme'] != 'http' ) {
            // reject URL
        } else {
            $url = mysqli_real_escape_string( $mysqli, $url );
            $sql = "INSERT INTO table (url) VALUES ('$url')";
            // insert query
        }*/
        //$movname, $movlang, $movimg, $movdur, $movvid, $movreld, $movdir, $movcast, $movprod, $movdesc

        $sql='INSERT INTO movie (mov_name, lang_id, mov_img_path, mov_duration, mov_description, mov_youtube_link, mov_released, mov_direction, mov_starring, mov_production) VALUES ("'.$movname.'", '.$movlang.', "'.$movimg.'", '.$movdur.', "'.$movdesc.'", "'.$movvid.'", '.$movreld.', "'.$movdir.'", "'.$movcast.'", "'.$movprod.'")';
        echo $sql;

        $result = mysqli_query($link,$sql);
        if(mysqli_error($link))
        {
            die(mysqli_error($link));
        } else {
            $sql="SELECT MAX(mov_id) FROM movie";
            //echo $sql;

            $result = mysqli_query($link,$sql);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            } else {
                $row=mysqli_fetch_assoc($result);
                $movid = $row['MAX(mov_id)'];
            }

            for ($i=0;$i<count($_POST["new_movcat"]);$i++){
                //echo $_POST["new_movcat"][$i];
                $sql="INSERT INTO movie_category (mov_id, cat_id) VALUES ($movid, {$_POST['new_movcat'][$i]})";
                //echo $sql;

                $result = mysqli_query($link,$sql);
                if(mysqli_error($link))
                {
                    die(mysqli_error($link));
                    break;
                }
            }
            echo "<H1>SUCCESS</H1>";
            header( "refresh:2;url=movie.php" ); 
        } 
    }       
?>
        
 
<?php
    include_once('foot.php');
?>
     