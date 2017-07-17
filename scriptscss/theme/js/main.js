$(document).ready(function() {
	//scrollTo top function
	// hide #back-top first
	$(".scrollToTop").hide();

    $("ul.navbar-nav>li").find("a[href='"+window.location.href+"']").each(function(){

        $(this).parent().addClass("active");        //add additional code here if needed
        $('.dropdown .dropdown-menu').children().removeClass('active');
    });
    $(".dropdown-menu>li").find("a[href='"+window.location.href+"']").each(function(){
        $(this).parent().parent().parent().addClass("active");        //add additional code here if needed
    });
    $(".dropdown-submenu .dropdown-menu>li").find("a[href='"+window.location.href+"']").each(function(){
        $(this).parent().parent().parent().parent().parent().addClass("active");        //add additional code here if needed
        $('.dropdown .dropdown-menu ').children().removeClass('active');
    });

	// fade in #back-top
	$(function() {
		$(window).scroll(function() {
			if ($(this).scrollTop() > 100) {
				$('.scrollToTop').fadeIn();
			} else {
				$('.scrollToTop').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('.scrollToTop').click(function() {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

    // searchbar toggle
    $(".header-search i").click(function(){
        $(".header-form").toggle();
    });


	//add class on image

	$("img").addClass("img-responsive");
    
    
     //owl-carousel

    $('#owl-demo').owlCarousel({
        navText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        rtl:false,
        loop:true,
        margin:30,
        nav:true,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive:{
            0:{
                items:1
            },
            480:{
                items:2
            },
            700:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
    
    
    // fancybox
    
    $('.fancybox').fancybox();
    $('.appgallery').fancybox();

    
    
    $('#leftTabs li a').click(function (e) {
        $(this).tab('show');
        $('.tab-content > .tab-pane.active').jScrollPane();
    });


    //multiple submenu droupdown
    $('[data-submenu]').submenupicker();
    


});
