<!--header start-->

<header>
    <!-- Fixed navbar -->
    <nav id="header" class="navbar navbar-fixed-top">
        <div id="header-container" class="container navbar-container">
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    <div class="brand-logo">
                        <a id="brand" class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Brand Logo"></a>
                    </div>
                </div>
                <div class="col-sm-9 col-md-10">
                    <div class="head-menu">
                        <div class="navbar-header">
                            <ul class="language mobile-language visible-xs pull-right">
                                <li class="dropdown"><a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-language"></i><span><i class="fa fa-angle-down"></i></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="header-search mobile-search visible-xs pull-right">
                                <i class="fa fa-search"></i>
                                <div class="header-form">
                                    <form action="#">
                                        <input type="text" placeholder="search">
                                        <button><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <div id="navbar" class="collapse navbar-collapse">
                            <ul class="head-social hidden-xs">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li <?php if(@$menuSelected=='home' ) echo 'class="active"'; ?>><a href="index.php">Home</a></li>
                                <!--<li class="dropdown <?php if(@$menuSelected=='home') echo 'active '; ?>"><a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Tumbler Tags</a></li>
                                        <li><a href="#">Saber Tags</a></li>
                                        <li><a href="#">Terminator Tags</a></li>
                                        <li><a href="#">E-Bolt</a></li>
                                        <li><a href="#">E-Plate</a></li>
                                    </ul>
                                </li>-->
                                <li class="dropdown <?php if(@$menuSelected=='product') echo 'active '; ?>"><a href="product.php" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product<span class="caret dropdown-toggle"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="product-detail.php">Tumbler Tags</a></li>
                                        <li><a href="product-detail.php">Saber Tags</a></li>
                                        <li><a href="product-detail.php">Terminator Tags</a></li>
                                        <li><a href="product-detail.php">E-Bolt</a></li>
                                        <li><a href="product-detail.php">E-Plate</a></li>
                                    </ul>
                                </li>
                                <li <?php if(@$menuSelected=='#' ) echo 'class="active"'; ?>><a href="index.php">Application</a></li>
                                <li <?php if(@$menuSelected=='#' ) echo 'class="active"'; ?>><a href="index.php">Company</a></li>
                                <li <?php if(@$menuSelected=='contact' ) echo 'class="active"'; ?>><a href="contact.php">Contact</a></li>
                            </ul>
                            <div class="header-search hidden-xs">
                                <i class="fa fa-search"></i>
                                <div class="header-form">
                                    <form action="#">
                                        <input type="text" placeholder="search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <ul class="language navbar-right hidden-xs">
                                <li class="dropdown"><a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-language"></i><span><i class="fa fa-angle-down"></i></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="head-social visible-xs">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <!-- /.nav-collapse -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->
</header>

<!-- Header end -->