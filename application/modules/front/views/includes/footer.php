<!-- Footer start -->

<footer>
    <section  class="foot-location">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-5 col-sm-6">
                    <div class="foot-location-left">
                        <h4>Crepak HongKong</h4>
                        <p><i class="fa fa-map-marker"></i>12th floor,San Toi Building,137-139,<br> Connaught Road, Central, HongKong</p>
                        <ul>
                            <li><i class="fa fa-envelope-o"></i><a class="email" href="emailto:sales@crepak.com">sales@crepak.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="foot-location-right">
                        <h4>Crepak China</h4>
                        <p><i class="fa fa-map-marker"></i>204, West building,No. 800,East Guoshun road, <br> Yangpu, Shanghai, China</p>
                        <ul>
                            <li><i class="fa fa-phone"></i><a class="call" href="callto:+86 131 2288 5540">+86 131 2288 5540</a></li>
                            <li><i class="fa fa-envelope-o"></i><a class="email" href="emailto:sales@crepak.com">sales@crepak.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-crepak">
        <div class="container">
            <div class="c-crepak-wrap">
                <div class="fc-info">
                    <p>Contact us to know how our RFID tags would help you to optimize your operation</p>
                </div>
                <div class="creat-btn">
                    <a class="btn btn-default" href="#"><?php echo $this->lang->line('contact_crepak');?> </a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="footer-bottom">
            <div class="container">
                <p><?php echo $this->lang->line('copyright');?></p>
            </div>
        </div>
    </section>
</footer>

<a href="#" class="scrollToTop" title="click here for top"><i class="fa fa-angle-up"></i></a>

<!-- Footer en -->


<!--numerical section-->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>scriptscss/theme/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>scriptscss/theme/js/bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>scriptscss/theme/js/jquery.fancybox.js"></script>
<script src="<?php echo base_url(); ?>scriptscss/theme/js/owl.carousel.min.js"></script>

<script src="<?php echo base_url(); ?>scriptscss/theme/js/main.js"></script>

<!-- Scrolling Nav JavaScript -->
<script src="<?php echo base_url(); ?>scriptscss/theme/js/scrolling-nav.js"></script>
<script>

    function switchlang(lang)
    {
        var language = lang
        $.ajax({
            url: "<?php echo base_url('front/switchlang')?>",
            data: {language: language},
            type: 'POST',
            success: function (data) {

                location.reload();

            }
        });
    }

    //add class to home page if url doesnot contain index
    var currentLocation = window.location.href;
    var base_url = '<?php echo base_url();?>';
    var home_url = '<?php echo base_url();?>index';
    if(currentLocation == base_url){
        $('a[href="'+home_url+'"]').parent().addClass("active")
    }

</script>

</body>
</html>