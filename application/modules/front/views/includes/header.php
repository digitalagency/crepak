<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Crepak</title>


    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>scriptscss/theme/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>scriptscss/theme/css/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>scriptscss/theme/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>scriptscss/theme/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>scriptscss/theme/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>scriptscss/theme/css/responsive.css" rel="stylesheet" media="all">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>scriptscss/theme/images/fav-icon.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!--header start-->

<header>
    <!-- Fixed navbar -->
    <nav id="header" class="navbar navbar-fixed-top">
        <div id="header-container" class="container navbar-container">
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    <div class="brand-logo">
                        <a id="brand" class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>scriptscss/theme/images/logo.png" alt="Brand Logo"></a>
                    </div>
                </div>
                <div class="col-sm-9 col-md-10">
                    <div class="head-menu">
                        <div class="navbar-header">
                            <ul class="language mobile-language visible-xs pull-right">
                                <li class="dropdown"><a href="<?php echo base_url(); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-language"></i><span><i class="fa fa-angle-down"></i></span></a>
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
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li class="dropdown <?php if(@$menuSelected=='product') echo 'active '; ?>"><a href="" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product<span class="caret dropdown-toggle"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>product/details">Tumbler Tags</a></li>
                                        <li><a href="<?php echo base_url(); ?>product/details">Saber Tags</a></li>
                                        <li><a href="<?php echo base_url(); ?>product/details">Terminator Tags</a></li>
                                        <li><a href="<?php echo base_url(); ?>product/details">E-Bolt</a></li>
                                        <li><a href="<?php echo base_url(); ?>product/details">E-Plate</a></li>
                                    </ul>
                                </li>
                                <li ><a href="">Application</a></li>
                                <li ><a href="<?php echo base_url(); ?>news">News</a></li>
                                <li ><a href="">Company</a></li>
                                <li ><a href="<?php echo base_url(); ?>contact">Contact</a></li>
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