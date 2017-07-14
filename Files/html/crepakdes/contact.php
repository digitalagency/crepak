<?php
$menuSelected = 'contact';
?>


    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Crepak / Contact Page</title>

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
                    <div class="contact-wrap">
                        <div class="page-title text-center">
                        <h2>Contact Us</h2>
                    </div>
                        <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.760681304124!2d114.14958771441334!3d22.287053585330437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3404007db6b3eeaf%3A0x9548eb9985675274!2sSan+Toi+Building%2C+137-139+Connaught+Rd+Central%2C+Sheung+Wan%2C+Hong+Kong!5e0!3m2!1sen!2snp!4v1496917752276" width="600" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                        <div class="inquery-form">
                        <h4 class="text-center">Inquiry Form</h4>
                        <form method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><em>Company Name</em></label>
                                        <input type="text" class="form-control" placeholder="Your Company Name ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><em>Country</em></label>
                                        <select class="select small form-control">
                                            <option value="0">United States ...</option>
                                            <option value="1">Nepal</option>
                                            <option value="2">Australia</option>
                                            <option value="3">Japan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><em>First Name</em></label>
                                        <input type="text" class="form-control" placeholder="Your First Name ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label><em>Last Name</em></label>
                                        <input type="text" class="form-control" placeholder="Your Last Name ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><em>Email Address</em></label>
                                        <input type="text" class="form-control" placeholder="Your Email Address ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><em>Phone</em></label>
                                        <input type="text" class="form-control" placeholder="Your Phone Number ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label><em>Country</em></label>
                                        <select class="select small form-control">
                                            <option value="0">Distributor</option>
                                            <option value="1">Nepal</option>
                                            <option value="2">Australia</option>
                                            <option value="3">Japan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label><em>Subject</em></label>
                                        <input type="text" class="form-control" placeholder="Your Subject ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label><em>Message</em></label>
                                        <textarea class="form-control" rows="3" placeholder="Your Message ..."></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button class="btn btn-default">Submit <i class="fa fa-angle-right"></i></button>
                                </div>
                            </div>
                        </form>
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