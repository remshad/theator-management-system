<?php

require_once('db.php');
require_once('head.php');
require_once('menu.php');

?>

<section class="section-long">
    <div class="container">
        <div class="section-head">
            <h2 class="section-title text-uppercase">Now in play</h2>
            <p class="section-text"><?php echo 'Dates: '; echo date('d',time()); echo ' - '; echo date('d F Y',time()+60*60*24*2);  ?></p>
        </div>
       

<?php


echo '<article class="movie-line-entity">
                <div class="entity-poster" data-role="hover-wrap">
                    <div class="embed-responsive embed-responsive-poster">
                        <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="">
                    </div>
                    <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                        <div class="entity-play">
                            <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                <span class="icon-content"><i class="fas fa-play"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="entity-content">
                    <h4 class="entity-title">
                        <a class="content-link" href="movie-info-sidebar-right.html">Outsider</a>
                    </h4>
                    <div class="entity-category">
                        <a class="content-link" href="movies-blocks.html">crime</a>,
                        <a class="content-link" href="movies-blocks.html">comedy</a>
                    </div>
                    <div class="entity-info">
                        <div class="info-lines">
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                <span class="info-text">8,1</span>
                                <span class="info-rest">/10</span>
                            </div>
                            <div class="info info-short">
                                <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                <span class="info-text">125</span>
                                <span class="info-rest">&nbsp;min</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-short entity-text">Aenean molestie turpis eu aliquam bibendum. Nulla facilisi.
                        Vestibulum quis risus in lorem suscipit tempor. Morbi consectetur enim vitae justo finibus
                        consectetur. Mauris volutpat nunc dui, quis condimentum dolor efficitur et. Phasellus rhoncus
                        porta nunc eu fermentum. Nullam vitae erat hendrerit, tempor arcu eget, eleifend tortor.
                    </p>
                </div>
                <div class="entity-extra">
                    <div class="text-uppercase entity-extra-title">Showtime</div>
                    <div class="entity-showtime">
                        <div class="showtime-wrap">
                            <div class="showtime-item">
                                <span class="disabled btn-time btn" aria-disabled="true">11 : 30</span>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">13 : 25</a>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">16 : 07</a>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">19 : 45</a>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">21 : 30</a>
                            </div>
                            <div class="showtime-item">
                                <a class="btn-time btn" aria-disabled="false" href="#">23 : 10</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>';





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