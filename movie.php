<?php

require_once('db.php');
require_once('head.php');
require_once('menu.php');
$mov_id=$_GET['mov_id'];
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
                                <h2 class="entity-title">Blick</h2>
                                <div class="entity-category">
                                    <?php
$sql="SELECT * FROM  movie_category  NATURAL JOIN category WHERE mov_id={$mov_id}";
$result=mysqli_query($link,$sql);
while($row1=mysqli_fetch_assoc($result))
{

$link[]="<a class='content-link' '#' >{$row1['cat_name']}</a>";

}

echo implode(",",$link);
                                    ?>
                                   
                                </div>
                                <div class="entity-info">
                                    <div class="info-lines">
                                        <div class="info info-short">
                                            <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                            <span class="info-text">8,7</span>
                                            <span class="info-rest">/10</span>
                                        </div>
                                        <div class="info info-short">
                                            <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                            <span class="info-text">130</span>
                                            <span class="info-rest">&nbsp;min</span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="entity-list">
                                    <li>
                                        <span class="entity-list-title">Release:</span>July 21, 2014 (Dolby Theatre),
                                        August 1, 2014 (United States)</li>
                                    <li>
                                        <span class="entity-list-title">Directed:</span>
                                        <a class="content-link" href="#">Lindson Wardens</a>,
                                        <a class="content-link" href="#">Anabelle One</a>
                                    </li>
                                    <li>
                                        <span class="entity-list-title">Starring:</span>
                                        <a class="content-link" href="#">Octopus Wardens</a>,
                                        <a class="content-link" href="#">Quanta Wardens</a>,
                                        <a class="content-link" href="#">Anabelle Two</a>,
                                        <a class="content-link" href="#">Anabelle Three</a>
                                    </li>
                                    <li>
                                        <span class="entity-list-title">Production company:</span>
                                        <a class="content-link" href="#">Re-Production Bro.</a>,
                                        <a class="content-link" href="#">Pentakid</a>
                                    </li>
                                    <li>
                                        <span class="entity-list-title">Country:</span>
                                        <a class="content-link" href="#">USA</a>,
                                        <a class="content-link" href="#">India</a>
                                    </li>
                                    <li>
                                        <span class="entity-list-title">Language:</span>english</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="section-line">
                        <div class="section-head">
                            <h2 class="section-title text-uppercase">Synopsis</h2>
                        </div>
                        <div class="section-description">
                            <p class="lead">Lead text. Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen
                                book.</p>
                            <h6 class="text-dark">Why do we use it?</h6>
                            <p>It is a long established fact that a reader will be distracted by the readable content of
                                a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                more-or-less normal distribution of letters, as opposed to using 'Content here, content
                                here', making it look like readable English. Many desktop publishing packages and web
                                page editors now use Lorem Ipsum as their default model text, and a search for 'lorem
                                ipsum' will uncover many web sites still in their infancy. Various versions have evolved
                                over the years, sometimes by accident, sometimes on purpose (injected humour and the
                                like).</p>
                            <h6 class="text-dark">Where does it come from?</h6>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                                McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                                the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through
                                the cites of the word in classical literature, discovered the undoubtable source. Lorem
                                Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
                                Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                                theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum,
                                "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                                interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero
                                are also reproduced in their exact original form, accompanied by English versions from
                                the 1914 translation by H. Rackham.</p>
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
                                    <div class="entity-links">
                                        <div class="entity-list-title">Tags:</div>
                                        <a class="content-link" href="#">family</a>,&nbsp;
                                        <a class="content-link" href="#">gaming</a>,&nbsp;
                                        <a class="content-link" href="#">historical</a>
                                    </div>
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
                    <div class="movie-short-line-entity">
                        <a class="entity-preview" href="movie-info-sidebar-right.html">
                            <span class="embed-responsive embed-responsive-16by9">
                                <img class="embed-responsive-item" src="http://via.placeholder.com/1920x1080" alt="">
                            </span>
                        </a>
                        <div class="entity-content">
                            <h4 class="entity-title">
                                <a class="content-link" href="movie-info-sidebar-right.html">Deadman skull</a>
                            </h4>
                            <p class="entity-subtext">11 nov 2018</p>
                        </div>
                    </div>
                    <div class="movie-short-line-entity">
                        <a class="entity-preview" href="movie-info-sidebar-right.html">
                            <span class="embed-responsive embed-responsive-16by9">
                                <img class="embed-responsive-item" src="http://via.placeholder.com/1920x1080" alt="">
                            </span>
                        </a>
                        <div class="entity-content">
                            <h4 class="entity-title">
                                <a class="content-link" href="movie-info-sidebar-right.html">Dream forest</a>
                            </h4>
                            <p class="entity-subtext">29 oct 2018</p>
                        </div>
                    </div>
                    <div class="movie-short-line-entity">
                        <a class="entity-preview" href="movie-info-sidebar-right.html">
                            <span class="embed-responsive embed-responsive-16by9">
                                <img class="embed-responsive-item" src="http://via.placeholder.com/1920x1080" alt="">
                            </span>
                        </a>
                        <div class="entity-content">
                            <h4 class="entity-title">
                                <a class="content-link" href="movie-info-sidebar-right.html">Fall</a>
                            </h4>
                            <p class="entity-subtext">29 oct 2018</p>
                        </div>
                    </div>
                </section>
              
                <section class="section-sidebar">
                    <a class="d-block" href="#">
                        <img class="w-100" src="http://via.placeholder.com/350x197" alt="">
                    </a>
                </section>
            </div>
        </div>

    </div></section>
