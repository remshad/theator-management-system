<?php
require('login1.php'); 

include_once('head.php');    
?>  


<div class="container">

<?php
  
    
    if(isset($_POST['submitedit']))
    {
            echo $_POST['edit_movid'];
        
    
            $sql="SELECT * FROM movie NATURAL JOIN language WHERE mov_id='{$_POST['edit_movid']}'";
            $result = mysqli_query($link,$sql);
            if(mysqli_error($link))
            {
                die(mysqli_error($link));
            }
           
            while($row=mysqli_fetch_assoc($result))
            {
                $sqlcat="SELECT * FROM movie NATURAL JOIN movie_category NATURAL JOIN category WHERE mov_id='{$row['mov_id']}'";
                $resultcat = mysqli_query($link,$sqlcat);
                if(mysqli_error($link))
                {
                    die(mysqli_error($link));
                }
                $categories="";
                while($rowcat=mysqli_fetch_assoc($resultcat))
                {
                    $categories.="{$rowcat['cat_name']}&nbsp";
                }
                $sqlcount="SELECT COUNT(DISTINCT(t_id)) FROM movie NATURAL JOIN movie_show NATURAL JOIN show_time NATURAL JOIN screen NATURAL JOIN theatre WHERE mov_id='{$row['mov_id']}'";
                $resultcount = mysqli_query($link,$sqlcount);
                if(mysqli_error($link))
                {
                    die(mysqli_error($link));
                }
                while($rowcount=mysqli_fetch_assoc($resultcount))
                {
                    $theatrecount=$rowcount['COUNT(DISTINCT(t_id))'];
                }
    
                $desc=" <b style='font-size:30px'>{$row['mov_id']}.{$row['mov_name']}</font>&nbsp({$row['language']})&nbsp{$row['mov_duration']}mins</b><br>
                <b></b> <b>Categories:&nbsp</b>{$categories}<br>
                        <b>Director:&nbsp</b>{$row['mov_direction']}<br>
                        <b>Cast:&nbsp</b>{$row['mov_starring']}<br>
                        <b>Production:&nbsp;</b>{$row['mov_production']}<br>
                        <b>Release Date:&nbsp</b>{$row['mov_released']}<br>
                        <b>Description:&nbsp</b>{$row['mov_description']}<br>";
                
    
               echo "<div class='movgrid-item'>
                        <div class='movgrid-itemimg' height='400px'><img src='{$row['mov_img_path']}'></div>
                        
                        <div class='movgrid-itemdesc'>
                            <div>{$desc}</div>
                            <div>
                                <form name='finishedit' action='movie.php'>
                                <input type='submit'value='Finish'>
                                </form></div>
                        </div>
                    </div>";
            }
    }       
?>
        
 
<?php
    include_once('foot.php');
?>
     