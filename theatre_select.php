<?php

require_once('db.php');


$script = "
function book(mov_id,theator_id,mov_start,mov_nd,screen_id,location)
{    
    usr=getCookie('t_id');
    if(!(parseInt(usr)>0))
    {
        window.location.href='login.php';
        return false;
    }


    $('#myModal2').modal('show');
    modal2_frm.movid.value=mov_id;
    modal2_frm.location.value=location;
    modal2_frm.theatre.value=theator_id;
    modal2_frm.screen.value=screen_id;

    var today = new Date();
    modal2_frm.date.value = today.toISOString().substr(0, 10);
    modal2_frm.date.min=mov_start;
    modal2_frm.date.max=mov_nd;

datePicked(today);
}

function datePicked()
{
 
    var url='./ajax/selecttime.php?date='+modal2_frm.date.value+'&mov_id='+modal2_frm.movid.value+'&screen='+modal2_frm.screen.value;
    var id='times';
    ajax(url,id);   
    this.focus();
}

function timeSelect()
{
    
    var url='./ajax/selectClass.php?date='+modal2_frm.date.value+'&mov_id='+modal2_frm.movid.value+'&screen='+modal2_frm.screen.value+'&times='+modal2_frm.times.value;;
    var id='class';
    ajax(url,id);
}

function seatEntered(data)
{
    var e=document.getElementById('class');
  
   if((e.options[e.selectedIndex].getAttribute('data-available')-data.value)<0)
   {
    seat_msg.style='background-color:red;color:white; display:block; padding:5px;border:2px solid white;';
    seat_msg.innerText='Select seat equal to or below '+e.options[e.selectedIndex].getAttribute('data-available');
   }else
   {
    seat_msg.style='background-color:white;color:black; display:block; padding:5px;border:2px solid white;';
    modal2_frm.conv_fee.value=Math.floor(e.options[e.selectedIndex].getAttribute('data-price')*data.value*.1);

    modal2_frm.ticket_fare.value=e.options[e.selectedIndex].getAttribute('data-price')*data.value;


    seat_msg.innerHTML='<table class=\"table table-bordered\"><tr><td>Ticket price </td><td>'+modal2_frm.ticket_fare.value+' &#8377;</td></tr><tr><td>Conveniant fee:</td><td>'+modal2_frm.conv_fee.value+' &#8377;</td></tr><tr><td>Total :</td><td>'+(parseInt(modal2_frm.conv_fee.value)+parseInt(modal2_frm.ticket_fare.value))+' &#8377;</td></tr></table>';
   }
   
    
}

function validateForm()
{
    if(modal2_frm.date.value.length>0)
    {

        if(modal2_frm.class.value.length>0)
        {
            if(modal2_frm.seat.value.length>0)
        {
            if(modal2_frm.conv_fee.value>0)
            {
               // modal2_frm.submit();
                return true;
            }else
            {
                alert('Please correct the details');
            }

        }else
        {
            modal2_frm.seat.focus();
            alert('Enter seat..!');
        } 

        }else
        {
            modal2_frm.class.focus();
            alert('select a class..!');

        }

    }else
    {
        modal2_frm.date.focus();
        alert('select a date..!');   
    }

    return false;
}

";


require_once('head.php');
require_once('menu.php');

?>

<section class="section-long">
    <div class="container">
        <div class="section-pannel">
            <form autocomplete="off">
                <div class="grid row">
                    <div class="col-md-10">

                        <div class="row form-grid">
                            <div class="col-sm-6 col-lg-3">
                                <div class="input-view-flat input-group">
                                    <select class="form-control" name="genre" onchange="{ window.location='theatre_select.php?mov_id='+this.value; }">
                                        <option selected="true">Select a movie</option>
                                        <?php

                                        $sql = "SELECT * from movie WHERE 1 ORDER by mov_released DESC limit 100";
                                        $result2 = mysqli_query($link, $sql);
                                        if (mysqli_error($link)) {
                                            die(mysqli_error($link));
                                        }

                                        while ($row5 = mysqli_fetch_assoc($result2)) {
                                            echo "<option value='{$row5['mov_id']}' >{$row5['mov_name']}</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            
                             </div>

                    </div>
                    <div class="col-md-2 my-md-auto d-flex">
                        <span class="info-title d-md-none mr-3">Go</span>
                        <ul class="ml-md-auto h5 list-inline">

                            <li class="list-inline-item">


                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>


        <?php
        $movid = intval($_GET['mov_id']);
        $sql = "SELECT * FROM `movie`  WHERE  `mov_id`='{$movid}' ";

        $result = mysqli_query($link, $sql);

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

            $sql1 = "SELECT * FROM category  NATURAL JOIN  `movie_category` WHERE mov_id='{$row['mov_id']}'";
            $result1 = mysqli_query($link, $sql1);
            while ($row1 = mysqli_fetch_assoc($result1)) {

                echo "<a class='content-link' name='{$row1['cat_name']}' title='{$row1['cat_name']}'>{$row1['cat_name']}</a>";
            }
            echo "   </div>
        <div class='entity-info'>
            <div class='info-lines'>
                <div class='info info-short'>
                    <span class='text-theme info-icon'><i class='fas fa-star' onclick='rating(this,{$row['mov_id']});'></i></span>
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
  
</article>";
        }

        ?>









        <?php
        $movid = intval($_GET['mov_id']);
        $location = intval($_COOKIE['location']);
        if(isset($_COOKIE['location']))
        {
            $location=$_COOKIE['location'];
      $someCode=" and district_id='{$location}' ";
        }else
        {
            $someCode="";
            
            echo "<script>alert('You are not selected a location'); </script>";
        }


        $sql = "SELECT * FROM theatre NATURAL JOIN screen NATURAL JOIN show_time NATURAL JOIN movie_show NATURAL JOIN movie WHERE `mov_id`='{$movid}' {$someCode} group by scr_id ORDER by `movsh_end_date` DESC ";

        $result = mysqli_query($link, $sql);

        if(mysqli_num_rows($result)>0)
        {
        while ($row = mysqli_fetch_assoc($result)) {
            $mov_start = date('Y-m-d', $row['movsh_start_date']);
            $mov_end = date('Y-m-d', $row['movsh_end_date']);

            echo "<article class='movie-line-entity'>
    <div class='entity-poster' data-role='hover-wrap'>
        <div class='entity-content'>
      ";
      $sql1 = "SELECT * from show_time  NATURAL JOIN time_slots  WHERE scr_id='{$row['scr_id']}' and movsh_id='{$row['movsh_id']}'";
      $result1 = mysqli_query($link, $sql1);

      while ($row1 = mysqli_fetch_assoc($result1)) {
          $timestr = date('H:i', mktime(0, $row1['time_showtime']));
          echo "<div class='showtime-item' style='margin-bottom: 5px;'>
<i class='btn-time btn' aria-disabled='false'>{$timestr}</i>
</div>";
      }

      echo "<div class='text-uppercase entity-extra-title'> <button typ='button' class='btn-theme btn' onclick='book({$row['mov_id']},{$row['t_id']},\"{$mov_start}\",\"{$mov_end}\",{$row['scr_id']},{$location});' style='margin-top:10px;' >Book</button></div>";



      echo "
        </div>
      </div>
    <div class='entity-content'>
        
        <div class='entity-info'>
        <h3 class='entity-category'>Movie Playing From {$mov_start} to  {$mov_end} </h3>
        <p class='text-short entity-text'>

        
        <div>Theatre:{$row['t_theatrename']}</div>
        <div>Screen:{$row['scr_name']}</div>
        <div>Place:{$row['t_theatre_place']}</div>
        
        ";

           
            echo "</div>
       
        </p>
        <p >
        <img class='embed-responsive-item' src='./images/parts/theatre-img.jpg' style='width:110px;' alt=''>
        </p>
    </div>
  
</article>";
        }}else
        {

            echo "<script>alert('Your location theatres does\'nt have running this movie , Change your location');</script>";
        }

        ?>

    </div>
</section>

<a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
<footer class="section-text-white footer footer-links bg-darken">
    <div class="footer-body container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <a class="footer-logo" href="./">
                    <span class="logo-element">
                        <span class="logo-tape">
                            <span class="svg-content svg-fill-theme" data-svg="./images/svg/logo-part.svg"></span>
                        </span>
                        <span class="logo-text text-uppercase">
                            <span>M</span>emico</span>
                    </span>
                </a>
                <div class="footer-content">
                    <p class="footer-text">Movie Booking
                        <br />Trissur</p>
                    <p class="footer-text">Call us:&nbsp;&nbsp;(+91) 9447796296</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h5 class="footer-title text-uppercase">Movies</h5>
                <ul class="list-unstyled list-wide footer-content">
                    <li>
                        <a class="content-link" href="#">All Movies</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">Upcoming movies</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">Top 100 movies</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">Blockbasters</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">British movies</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">Summer movies collection</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">Movie trailers</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h5 class="footer-title text-uppercase">Information</h5>
                <ul class="list-unstyled list-wide footer-content">
                    <li>
                        <a class="content-link" href="#">Schedule</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">News</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">Contact us</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">Community</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">Blog</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">Events</a>
                    </li>
                    <li>
                        <a class="content-link" href="#">Help center</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h5 class="footer-title text-uppercase">Follow</h5>
                <ul class="list-wide footer-content list-inline">
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-slack-hash"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-dribbble"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="content-link" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
                <h5 class="footer-title text-uppercase">Subscribe</h5>
                <div class="footer-content">
                    <p class="footer-text">Get latest movie news right away with our subscription</p>
                    <form class="footer-form" autocomplete="off">
                        <div class="input-group">
                            <input class="form-control" name="email" type="email" placeholder="Your email" />
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="submit"><i class="fas fa-angle-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">Copyright 2019 &copy; AmigosThemes. All rights reserved.</div>
    </div>
</footer>
<!-- jQuery library -->
<script src="./js/jquery-3.3.1.js"></script>
<!-- Bootstrap -->
<script src="./bootstrap/js/bootstrap.js"></script>
<!-- Paralax.js -->
<script src="./parallax.js/parallax.js"></script>
<!-- Waypoints -->
<script src="./waypoints/jquery.waypoints.min.js"></script>
<!-- Slick carousel -->
<script src="./slick/slick.min.js"></script>
<!-- Magnific Popup -->
<script src="./magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Inits product scripts -->
<script src="./js/script.js"></script>
<script async defer <script async defer src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js"></script>
</body>

<?php



require_once('model.php');
?>

</html>