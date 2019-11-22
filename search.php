<?php

require_once('db.php');
require_once('head.php');
require_once('menu.php');

?>

<section class="section-long">
    <div class="container">


        <div class="section-head" style="background-image: none;">
            <form autocomplete="off" method="post" action="search.php">     
                <div class="row form-grid">
                    <div class="col-sm-6 col-lg-3">
                        <div class="input-view-flat input-group">

                            <input class='form-control' type="text" name="mov_name" placeholder="Movie Name" >

                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="input-view-flat date input-group" data-toggle="datetimepicker" data-target="#release-year-field">
                            <input class="datetimepicker-input form-control" id="release-year-field" name="releaseYear" type="text" placeholder="release year" data-target="#release-year-field" data-date-format="Y">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="input-view-flat input-group">
                            <select class="form-control" name="language">
                                <option selected="true">Language</option>
                                <?php $sql = "SELECT * FROM `language` WHERE 1";

                                $result = mysqli_query($link, $sql);

                                if (mysqli_errno($link)) {

                                    die(mysqli_errno($link));
                                }

                                

                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo "<option value='{$row['lang_id']}'>{$row['language']}</option>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="input-view-flat input-group">
                            <select class="form-control" name="category">
                                <option selected="true">Category</option>
                                <?php $sql = "SELECT * FROM `category` WHERE 1";

                                $result = mysqli_query($link, $sql);

                                if (mysqli_errno($link)) {

                                    die(mysqli_errno($link));
                                }

                               

                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="input-view-flat input-group">

                            <input class='form-control' type="submit" name="submit" value="Apply">

                        </div>
                    </div>
                </div>
            </form>

        </div>





        
            <?php

            if (isset($_POST['submit'])) {
                echo ' <div class="section-head"> <h2 class="section-title text-uppercase">Search result</h2>
           </div>';


if(isset($_POST['mov_name']) && strlen($_POST['mov_name'])>0)
{
$part[]=" `mov_name` like '%{$_POST['mov_name']}%' ";
}

if(isset($_POST['releaseYear']) && intval($_POST['releaseYear'])>0)
{
    
$year=strtotime($_POST['releaseYear']);

    $part[]=" `mov_released` like '{$year}' ";
}


if(isset($_POST['language']) && intval($_POST['language'])>0)
{
$part[]=" `lang_id` like {$_POST['language']} ";
}

if(isset($_POST['category']) && intval($_POST['category'])>0)
{
$part[]=" `cat_id` like {$_POST['category']} ";
}

if(count($part)>0)
{

    $all=implode(" AND ",$part);
}else
{
    $all='1';
}


             $sql = "SELECT * FROM `movie` NATURAL join movie_show natural join movie_category WHERE $all ORDER by movsh_end_date DESC  LIMIT 25";

                $result = mysqli_query($link, $sql);
if(mysqli_num_rows($result)){
                while ($row = mysqli_fetch_assoc($result)) {

                    echo "<article class='movie-line-entity'>
    <div class='entity-poster' data-role='hover-wrap'>
        <div class='embed-responsive embed-responsive-poster'>
            <img class='embed-responsive-item' src='{$row['mov_img_path']}' alt=''>
        </div>
        <div class='d-over bg-theme-lighted collapse animated faster' data-show-class='fadeIn show' data-hide-class='fadeOut show'>
            <div class='entity-play'>
                <a class='action-icon-theme action-icon-bordered rounded-circle' href='{$row['mov_youtube_link']}' data-magnific-popup='iframe'>
                    <span class='icon-content'><i class='fas fa-play'></i></span>
                </a>
            </div>
        </div>
    </div>
    <div class='entity-content'>
        <h4 class='entity-title'>
            <a class='content-link' href='movie.php?mov_id={$row['mov_id']}'>{$row['mov_name']}</a>
        </h4>
        <div class='entity-category'>";



                    $sql = "SELECT * FROM  movie_category  NATURAL JOIN category WHERE mov_id={$row['mov_id']}";
                    $result = mysqli_query($link, $sql);
                    if (mysqli_error($link)) {
                        die(mysqli_errno($link));
                    }

                    while ($row1 = mysqli_fetch_assoc($result)) {

                        $links[] = "<a class='content-link' '#' >{$row1['cat_name']}</a>";
                    }

                    echo implode(",", $links);



                    echo "   </div>
        <div class='entity-info'>
            <div class='info-lines'>
                <div class='info info-short'>
                    <span class='text-theme info-icon'><i class='fas fa-star'></i></span>
                    <span class='info-text'>";

                    $sql1 = "SELECT sum(rat_rating)/COUNT(*) as rating FROM rating NATURAL JOIN movie WHERE mov_id={$row['mov_id']}";
                    $result1 = mysqli_query($link, $sql1);
                    $row1 = mysqli_fetch_assoc($result1);

                    if ($row1['rating'] != null) {

                        echo number_format((float) $row1['rating'], 2, '.', '');
                    }
                    echo "</span>
                    <span class='info-rest'>/10</span>
                </div>
                <div class='info info-short'>
                    <span class='text-theme info-icon'><i class='fas fa-clock'></i></span>
                    <span class='info-text'>{$row['mov_duration']}</span>
                    <span class='info-rest'>&nbsp;min</span>
                </div>";

                    echo "<div class='info info-short'>
<span class='text-theme info-icon'><i class='fas fa-language'></i></span>";


                    $sql1 = "SELECT * FROM `language` NATURAL JOIN movie WHERE mov_id={$row['mov_id']}";
                    $result1 = mysqli_query($link, $sql1);
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        echo "<span class='info-text'>{$row1['language']}</span>";
                        echo "<span class='info-rest'>&nbsp;,</span>";
                    }




                    echo "</div></div>
        </div>
        <p class='text-short entity-text'>{$row['mov_description']}
        </p>
    </div>
    <div class='entity-extra'>
        <div class='text-uppercase entity-extra-title'>Showtime</div>
        <div class='entity-showtime'>
            <div class='showtime-wrap'>
                ";
                    $sql1 = "SELECT * FROM `time_slots`  NATURAL JOIN show_time NATURAL JOIN movie_show WHERE mov_id='1'";
                    $result1 = mysqli_query($link, $sql1);
                    if (mysqli_error($link)) {

                        die(mysqli_error($link));
                    } else {
                        while ($row1 = mysqli_fetch_assoc($result1)) {

                            $timestr = date('H:i', mktime(0, $row1['time_showtime']));

                            echo " <div class='showtime-item'>
        <a class='btn-time btn' aria-disabled='false' href='#'>{$timestr}</a>
    </div>";
                        }
                    }


                    echo "
            </div>
        </div>";

                    echo "<br/><div class='text-uppercase entity-extra-title'><a href='theatre_select.php?mov_id={$row['mov_id']}'><button typ='button' class='btn-theme btn'  >Go To Booking Page</button></a></div>";

                    echo "</div>
</article>";}
                }else{
                    echo '<h1>No result found</h1>';
                }
            } else { }

            ?>

        </div>
</section>



<?php

require_once('foot.php');

require_once('model.php');
?>

</html>