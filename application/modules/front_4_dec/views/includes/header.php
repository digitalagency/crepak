<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>scriptscss/theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>scriptscss/theme/css/bootstrap-submenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>scriptscss/theme/css/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>scriptscss/theme/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>scriptscss/theme/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>scriptscss/theme/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>scriptscss/theme/css/custom.css" rel="stylesheet">
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
                        <a id="brand" class="navbar-brand" href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>scriptscss/theme/images/logo.png" alt="Brand Logo"></a>
                    </div>
                </div>
                <div class="col-sm-9 col-md-10">
                    <div class="head-menu">
                        <div class="navbar-header">
                            <ul class="language mobile-language visible-xs pull-right">
                                <li class="dropdown"><a href="<?php echo base_url(); ?>" class="dropdown-toggle"
                                                        data-toggle="dropdown" role="button" aria-haspopup="true"
                                                        aria-expanded="false"><i class="fa fa-language"></i><span><i
                                                        class="fa fa-angle-down"></i></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)" onclick="switchlang('en');">En</a></li>
                                        <li><a href="javascript:void(0)" onclick="switchlang('cn');">Cn</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <div class="header-search mobile-search visible-xs pull-right">
                                <i class="fa fa-search"></i>
                                <div class="header-form">
                                    <form action="<?php echo base_url('search')?>" method="post">
                                        <input type="text" placeholder="search" name="searchvalue">
                                        <button><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
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
                                <?php $language; ?>
                                <?php
                                foreach ($menus as $menu) {
                                    $menu['id'];
                                    $submenucount = $this->mymodel->getcount('*', 'tbl_menu', 'parent_id =' . $menu['id']);
                                    $submenus = $this->mymodel->get('tbl_menu', '*', 'status = 1 and parent_id ="' . $menu['id'] .'" order by menu_order asc');
                                    ?>
                                    <?php if ($submenucount > 0) { ?>
                                        <li class="dropdown"><a
                                                href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-submenu="" role="button" aria-haspopup="true" aria-expanded="false">
                                                <?php
                                                if ($language == 'cn') {
                                                    echo $menu['title_cn'];
                                                } else {
                                                    echo $menu['title'];
                                                }
                                                // echo $menu['title']?>

                                                <span class="caret dropdown-toggle"></span></a>
                                            <ul class="dropdown-menu">
                                                <?php foreach ($submenus as $submenu):
                                                    $submenu['id'];
                                                    $secondmenucount = $this->mymodel->getcount('*', 'tbl_menu', 'parent_id =' . $submenu['id']);
                                                    $secondmenu = $this->mymodel->get('tbl_menu', '*', ' status = 1 and  parent_id ="' . $submenu['id'].'" order by menu_order asc');

                                                    if($secondmenucount>0){?>
                                                        <li class="dropdown-submenu">
                                                            <a href="<?php echo ($submenu['page_link']!='')?base_url().$submenu['page_link']:'javascript:void(0)';?>">
                                                            <?php
                                                            if ($language == 'cn') {
                                                                echo trim($submenu['title_cn']);
                                                            } else {
                                                                echo trim($submenu['title']);
                                                            }
                                                            ?>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <?php
                                                                foreach($secondmenu as $secmenu){?>
                                                                    <li><a href="<?php echo ($secmenu['page_link']!='')?base_url().$secmenu['page_link']:'javascript:void(0)';?>">
                                                                    <?php
                                                                    if ($language == 'cn') {
                                                                        echo trim($secmenu['title_cn']);
                                                                    } else {
                                                                        echo trim($secmenu['title']);
                                                                    }
                                                                    ?>
                                                                        </a></li>
                                                                <?php }
                                                                ?>
                                                            </ul>
                                                        </li>
                                                    <?php }else{
                                                    ?>
                                                    <li><a href="<?php echo ($submenu['page_link']!='')?base_url() . $submenu['page_link']:'javascript:void(0)'; ?>">
                                                    <?php
                                                            if ($language == 'cn') {
                                                                echo trim($submenu['title_cn']);
                                                            } else {
                                                                echo trim($submenu['title']);
                                                            }
                                                            ?>
                                                    </a></li>
                                                <?php }
                                                endforeach; ?>
                                            </ul>
                                        </li>
                                    <?php } else { ?>
                                        <li><a href="<?php echo ($menu['page_link'] != '')?base_url() . $menu['page_link']:'javascript:void(0)'; ?>">
                                        <?php
                                        if ($language == 'cn') {
                                            echo trim($menu['title_cn']);
                                        } else {
                                            echo trim($menu['title']);
                                        }
                                        ?>
                                        </a></li>
                                    <?php } ?>
                                <?php }
                                ?>
                            </ul>
                            <div class="header-search hidden-xs">
                                <i class="fa fa-search"></i>
                                <div class="header-form">
                                    <form action="<?php echo base_url('search')?>" method="post">
                                        <input type="text" placeholder="search" name="searchvalue">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <ul class="language navbar-right hidden-xs">
                                <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle"
                                                        data-toggle="dropdown"
                                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-language"></i><span><i class="fa fa-angle-down"></i></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)" onclick="switchlang('en');">English</a></li>
                                        <li><a href="javascript:void(0)" onclick="switchlang('cn');">Chinese</a></li>
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
<?php
//echo $language;
//echo $this->lang->line('account_creation_successful');
//echo $this->lang->line('download_file');
?>
<!-- Header end -->