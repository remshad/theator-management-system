<?php

require_once('db.php');
$mov_id=$_GET['mov_id'];

$style="";

  
  $script='
  function sens(val){
    uid=getCookie("t_id");
  var request=new XMLHttpRequest();
  request.open("GET","./ajax/rating.php?val="+val+"&user="+uid+"&mov_id='.$mov_id.'");
  request.onreadystatechange=function(){
    if(this.readyState===4 && this.status===200)
    {
//alert(this.responseText);
 // var assign=document.getElementById(id);
 // assign.innerHTML=this.responseText;
 if(parseInt(this.responseText)==2)
 {
     alert("Sucess");
 }else
 {
    alert("Either you are not logged in already starred..!");
 }
    }
  }
  request.send(); } ';

require_once('head.php');
require_once('menu.php');

?>

<?php

$sql="SELECT * FROM `movie` WHERE `mov_id`='{$mov_id}'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($result);

?>
<section class="section-long">
    <div class="container">

    <div class="sidebar-container">
            <div class="content">
                <section class="section-long">
                    <div class="section-line">
                        <div class="movie-info-entity">
                            <div class="entity-poster" data-role="hover-wrap">
                                <div class="embed-responsive embed-responsive-poster">
                                    <img class="embed-responsive-item" src="<?php echo $row['mov_img_path']; ?>" alt="">
                                </div>
                                <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                    <div class="entity-play">
                                        <a class="action-icon-theme action-icon-bordered rounded-circle" href="<?php echo $row['mov_youtube_link']; ?> " data-magnific-popup="iframe">
                                            <span class="icon-content"><i class="fas fa-play"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="entity-content">
                                <h2 class="entity-title"><?php echo $row['mov_name']; ?></h2>
                                <div class="entity-category">
                                    <?php
$sql="SELECT * FROM  movie_category  NATURAL JOIN category WHERE mov_id={$mov_id}";
$result=mysqli_query($link,$sql);
if(mysqli_error($link))
{
    die(mysqli_errno($link));
}

while($row1=mysqli_fetch_assoc($result))
{

$links[]="<a class='content-link' '#' >{$row1['cat_name']}</a>";

}

echo implode(",",$links);
                                    ?>
                                   
                                </div>
                                <div class="entity-info">
                                    <div class="info-lines">
                                        <div class="info info-short">
                                            <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
<span class="info-text"><?php   $sql1="SELECT sum(rat_rating)/COUNT(*) as rating FROM rating NATURAL JOIN movie WHERE mov_id={$mov_id}";
$result1=mysqli_query($link,$sql1);
$row1=mysqli_fetch_assoc($result1);

          if($row1['rating']!=null)
          {
              
              echo number_format((float) $row1['rating'], 2, '.', '');
          }  
           ?> </span>
                                            <span class="info-rest">/10</span>
                                        </div>
                                        <div class="info info-short">
                                            <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                            <span class="info-text"><?php echo $row['mov_duration'];  ?></span>
                                            <span class="info-rest">&nbsp;min</span>
                                            
                                        </div>
                                  

                                    </div>
                                </div>
                                <ul class="entity-list">
                                    <li>
                                        <span class="entity-list-title">Release:</span> <?php echo date('d F Y',$row['mov_released']); ?></li>
                                    <li>
                                        <span class="entity-list-title">Directed: </span>
                                        <a class="content-link" href="#"> <?php echo $row['mov_direction']; ?></a>
                                    </li>
                                    <li>

                                        <span class="entity-list-title">Starring:</span>
                                        <?php echo $row['mov_starring']; ?>
                                        
                                    </li>
                                    <li>
                                        <span class="entity-list-title">Production company:</span>
                                        <a class="content-link" href="#"><?php echo $row['mov_production']; ?></a>
                                    </li>
                                   
                                    <li>
                                        <span class="entity-list-title">Language:</span>     <?php  $sql="SELECT `language` FROM `language` WHERE  lang_id='{$row['lang_id']}'";  
                                        $result=mysqli_query($link,$sql);
                                        if(mysqli_errno($link))
                                        {
                                            die(mysqli_errno($link));
                                        }
                                        $row2=mysqli_fetch_assoc($result);
                                    
                                        echo $row2['language'];

                                        ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="section-line">
                        <div class="section-head">
                            <h2 class="section-title text-uppercase">Synopsis</h2>
                        </div>
                        <div class="section-description">
                            <p class="lead">
                                
<?php
echo $row['mov_description'];

?>
                            </p>
                           
                        </div>
                        <div class="section-bottom">
                            <div class="row">
                                <div class="mr-auto col-auto">
                                    <div class="entity-links">
                                        <div class="entity-list-title">Share:</div>
                                        <a class="content-link entity-share-link" href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a class="content-link entity-share-link" href="#"><i class="fab fa-twitter"></i></a>
                                        <a class="content-link entity-share-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                                        <a class="content-link entity-share-link" href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a class="content-link entity-share-link" href="#"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                 
                                </div>
                            </div>
                        </div>
                    </div>
              
                </section>
            </div>
            <div class="sidebar section-long order-lg-last">
                <section class="section-sidebar">
                    <div class="section-head">
                        <h2 class="section-title text-uppercase">Latest movies</h2>
                    </div>


                    <?php
$sql="SELECT * from movie WHERE 1 ORDER by `mov_released` DESC limit 5";
$ressult=mysqli_query($link,$sql);
if(mysqli_errno($link))
{
    die(mysqli_errno($link));
}

while($row3=mysqli_fetch_assoc($ressult))
{

echo "<div class='movie-short-line-entity'>
<a class='entity-preview' href='movie.php?mov_id={$row3['mov_id']}'>
    <span class='embed-responsive embed-responsive-16by9'>
        <img class='embed-responsive-item' src='{$row3['mov_img_path']}' alt='' style='height:auto;'>
    </span>
</a>
<div class='entity-content'>
    <h4 class='entity-title'>
        <a class='content-link' href='movie.php?mov_id={$row3['mov_id']}'>{$row3['mov_name']}</a>
    </h4>
    <p class='entity-subtext'>".date('d F Y',$row3['mov_released'])."</p>
</div>
</div>";

}


?>
                  </section>
              
                <section class="section-sidebar">
                    <a class="d-block" href="#">
                       <a href="theatre_select.php?mov_id=<?php echo $mov_id; ?>"><button type='button' class="btn-theme btn" >Go to Booking Page</button></a>
                    </a>
                </section>
            </div>
        </div>

    </div></section>




<?php

require_once('foot.php');

require_once('model.php');
?>

</html>
