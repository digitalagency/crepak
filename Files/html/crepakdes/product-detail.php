<?php
$menuSelected = 'product';
?>


    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Crepak / Product Details Page</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">


        <!-- Custom CSS -->
        <link href="css/jquery.fancybox.css" rel="stylesheet">
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet" media="all">
        <link rel="shortcut icon" href="images/fav-icon.png">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    </head>

    <body>


        <!-- Header part start -->

        <?php include('inc/header.php') ?>

        <!-- Header part end -->
        
        <section class="body-bg">
            <div class="container">
                <div class="product-details">
                    <div class="top-details">
                        <div class="row">
                        <div class="col-md-5">
                            <div class="product-img">
                                <figure><img src="images/products/p-detail.jpg" alt="product-details"></figure>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-info">
                                <h3>1166 UHF handheld reader</h3>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="product-info-left">
                                            <dl class="dl-horizontal">
                                                <dt>Type &nbsp &nbsp -</dt>
                                                <dd>Handheld Reader</dd>
                                                
                                                <dt>Size &nbsp &nbsp -</dt>
                                                <dd>177 x 94 x170 mm</dd>
                                                
                                                <dt>Color &nbsp &nbsp -</dt>
                                                <dd>White</dd>
                                                
                                                <dt>Brand &nbsp &nbsp -</dt>
                                                <dd>TSL</dd>
                                                
                                                <dt>Model &nbsp &nbsp -</dt>
                                                <dd>1166</dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="download-pdf">
                                            <button class="btn- btn-default"> Download PDF </button>
                                            <div class="pdf-share">
                                                <h4>Share On:</h4>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="product-details-tab">
                        <div class="tab-wrap">
                            <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#home">Description</a></li>
                          <li><a data-toggle="tab" href="#menu1">Additional Information</a></li>
                          <li><a data-toggle="tab" href="#menu2">Review</a></li>
                        </ul>

                        <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                <h3>Product Description</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras feugiat nec est ac gravida. Morbi porttitor mauris ac molestie ultrices. Quisque placerat massa volutpat est interdum pretium. Fusce cursus eleifend nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean venenatis hendrerit tellus sit amet pellentesque. Nullam sit amet magna luctus, porttitor est id, ultricies erat. Phasellus id fermentum augue. Curabitur dictum mattis neque, sed pharetra lacus mollis ac.</p>
                                <p>Quisque viverra quis ante vel elementum. Donec dictum ultrices ullamcorper. Mauris et lorem placerat, porttitor odio quis, egestas nunc. Nunc sollicitudin, neque id lobortis dapibus, tellus purus tincidunt enim, nec fringilla lacus nibh porta purus. Donec lobortis ullamcorper eros ut finibus. Mauris nisi quam, vulputate sit amet purus a, convallis vulputate nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent magna eros, sagittis in neque volutpat, sagittis venenatis ipsum.</p>
                              </div>
                              <div id="menu1" class="tab-pane fade">
                                <h3>Additional Information </h3>
                                <p>Some content in menu 1.</p>
                              </div>
                              <div id="menu2" class="tab-pane fade">
                                <h3>Review</h3>
                                <p>Some content in menu 2.</p>
                              </div>
                        </div>
                        </div>
                    </div>
                    <div class="related-products text-center">
                        <div class="page-title">
                            <h2>Related Products</h2>
                        </div>    
                            <div class="row">
                                <div class="col-sm-4 col-xs-6">
                                    <div class="related-produt-item">
                                        <figure><img src="images/products/1.jpg" alt="1"></figure>
                                        <div class="figcaption">
                                            <h3>Terminator 50</h3>
                                            <p><span>Size:</span> 79x20x3</p>
                                            <a class="btn btn-default" href="product-detail.php">View Detail <i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-6">
                                    <div class="related-produt-item">
                                        <figure><img src="images/products/2.jpg" alt="2"></figure>
                                        <div class="figcaption">
                                            <h3>Terminator 20</h3>
                                            <p><span>Size:</span> 79x20x3</p>
                                            <a class="btn btn-default" href="product-detail.php">View Detail <i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-6">
                                    <div class="related-produt-item">
                                        <figure><img src="images/products/1.jpg" alt="1"></figure>
                                        <div class="figcaption">
                                            <h3>Terminator 30</h3>
                                            <p><span>Size:</span> 79x20x3</p>
                                            <a class="btn btn-default" href="product-detail.php">View Detail <i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>

        <!-- Footer start -->

        <?php include('inc/footer.php') ?>

        <!-- Footer section end -->


    </body>

    </html>