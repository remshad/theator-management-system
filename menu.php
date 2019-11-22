<body class="body">
    <header class="header header-horizontal header-view-pannel">
        <div class="container">
            <nav class="navbar">
                <a class="navbar-brand" href="./">
                    <span class="logo-element">
                        <span class="logo-tape">
                            <span class="svg-content svg-fill-theme" data-svg="./images/svg/logo-part.svg"></span>
                        </span>
                        <span class="logo-text text-uppercase">
                            <span>M</span>emico</span>
                    </span>
                </a>
                <button class="navbar-toggler" type="button">
                    <span class="th-dots-active-close th-dots th-bars">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
                <div class="navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item nav-item-arrow-down nav-hover-show-sub">
                            <a class="nav-link" href="index.php">Homepage</a>
                            <div class="nav-arrow"><i class="fas fa-chevron-down"></i></div>

                        </li>


                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="search.php">Search</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.html">Contact us</a>
                        </li>
                    </ul>
                    <div class="navbar-extra" style="position:fixed; float:left; right:10px;">

                        <?php
                        if (!isset($_COOKIE['t_power'])) {
                            echo '   <a class="btn-theme btn" href="login.php"><i class="fas fa-ticket-alt"></i>&nbsp;Login</a>

<a class="btn-theme btn" href="signup.php"><i class="fas fa-ticket-alt"></i>&nbsp;Signup</a>';
                        } else {
                            echo '   <a class="btn-theme btn" href="profile.php"><i class="fas fa-ticket-alt"></i>&nbsp;Profile</a>';
                            echo '   <a class="btn-theme btn" href="logout.php"><i class="fas fa-ticket-alt"></i>&nbsp;Logout</a>';
                        }

                        ?>


                        <a class="btn-theme btn" href="#" onclick="{ $('#myModal').modal('show'); }"><i class="fas fa-ticket-alt"></i>&nbsp;Change Location</a>

                    </div>
                </div>
            </nav>
        </div>
    </header>