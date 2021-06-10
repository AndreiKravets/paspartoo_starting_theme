jQuery(document).ready(function ($) {

    if ($('div').hasClass('gform_confirmation_wrapper')) {
        $('.submit_perent').css('display', 'block');
        $(".submit_popup_form").animate({top: "30vh"}, 100);
        setTimeout(function () {
            $(".submit_popup_form").animate({top: "-100vh"}, 100);
            $('.submit_perent').css('display', 'none');
        }, 4000);
    };

    $('.submit_popup_con').click(function () {
        $(".submit_popup_form").animate({top: "-100vh"}, 500, function () {
            $('.submit_perent').css('display', 'none')
        });
    });
    $('.submit_popup_form button').click(function () {
        $(".submit_popup_form").animate({top: "-100vh"}, 500, function () {
            $('.submit_perent').css('display', 'none')
        });
    });
    $(window).on("click keydown", function (e) {
        if (e.key === "Escape") {
            $(".submit_popup_form").animate({top: "-100vh"}, 500, function () {
                $('.submit_perent').css('display', 'none')
            });

        }
    });



    function scrollNav(){


            if ($(window).scrollTop() >= 500){
                $('.fixed-bar').removeClass('fadeOutUp').show().addClass('fadeInDown')

            } else {
                $('.fixed-bar').removeClass('fadeInDown').addClass('fadeOutUp')
            }





        if ($(window).scrollTop() <= 50){
            $('.fixed-bar').css('z-index','-1');
        } else {
            $('.fixed-bar').css('z-index','9999');
        }
    }

    $(window).scroll(function() {
        scrollNav()
    })



    $("html").on("click",".anchor_link", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1000);
    });


$('#hamb_button').click(function(){
    if ( $(this).hasClass('is-active'))
     {
        $('.bg').removeClass('active')
		$('.mobile_menu').removeClass('active')
        $('#hamb_button').removeClass('is-active')
    } else {
		$('.bg').addClass('active')
		$('.mobile_menu').addClass('active')
        $('#hamb_button').addClass('is-active')
	}
})


$(window).resize(function () {

  if ($(window).width() >= 768) {
      $('.bg').removeClass('active')
      $('.mobile_menu').removeClass('active')
      $('#hamb_button').removeClass('is-active')
  }
  else {
      $('#menu-header-menu .parent span').html('<i class="fal fa-angle-left"></i>')
  }
})



 $('.bg').click(function(){
	if ($(this).hasClass('active'))
	{
		$(this).removeClass('active')
		$('.mobile_menu').removeClass('active')
		$('#hamb_button').removeClass('is-active')
	}

 })

 $('li.has-child span').click(function(){
        if (
            $(this).closest("li.has-child").hasClass("active")){
            $(this).closest("li.has-child").removeClass("active");
            $(this).closest("li.has-child").find(".sub-menu").slideUp();}
        else {
            $('li.has-child').removeClass("active");
            $(this).closest("li.has-child").toggleClass("active");
            $('li.has-child span').closest("li.has-child").find(".sub-menu").slideUp();
            $(this).closest("li.has-child").find(".sub-menu").slideDown();
        }
    })







    $(".tabs_caption").click(function(){
        $(this).toggleClass("active");
    });

    (function($) {
        $(function() {
            $("ul.tabs_caption").on("click", "li:not(.active)", function() {
                $(this)
                    .addClass("active")
                    .siblings()
                    .removeClass("active")
                    .closest("div.tabs")
                    .find("div.tabs_content")
                    .removeClass("active")
                    .eq($(this).index())
                    .addClass("active");
            });
        });
    })(jQuery);

    (function($) {
        $(function() {
            $("ul.tabs_caption_fag").on("click", "li:not(.active)", function() {
                $(this)
                    .addClass("active")
                    .siblings()
                    .removeClass("active")
                    .closest("div.fag_tabs_section")
                    .find("div.faq_tabs")
                    .removeClass("active")
                    .eq($(this).index())
                    .addClass("active");
            });
        });
    })(jQuery);


    $('.rewiews_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        swipeToSlide: true,
        arrows: true,
        nextArrow: '<span class="prev"><i class="fal fa-angle-right"></i></span>',
        prevArrow: '<span class="next"><i class="fal fa-angle-left"></i></span>',
        dots: false
    });

    $('.work_slider_section').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        swipeToSlide: true,
        centerMode:true,
        arrows: false,
        nextArrow: '<span class="prev"><i class="fal fa-caret-right"></i></span>',
        prevArrow: '<span class="next"><i class="fal fa-caret-left"></i></span>',
        dots: false,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 675,
                settings: {
                    slidesToShow: 3,
                    centerMode:false
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 2,
                    centerMode:false
                }
            }
        ]
    });
    $('.agency_slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        swipeToSlide: true,
        centerMode:true,
        arrows: false,
        nextArrow: '<span class="prev"><i class="fal fa-caret-right"></i></span>',
        prevArrow: '<span class="next"><i class="fal fa-caret-left"></i></span>',
        dots: false,
        responsive: [
            {
                breakpoint: 1500,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 1300,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 975,
                settings: {
                    slidesToShow: 3,
                    centerMode:false
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    centerMode:true
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
    $('.home_services_slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        swipeToSlide: true,
        arrows: true,
        nextArrow: '<span class="prev"><i class="fal fa-caret-right"></i></span>',
        prevArrow: '<span class="next"><i class="fal fa-caret-left"></i></span>',
        dots: false,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 675,
                settings: 'unslick'
            }
            // {
            //     breakpoint: 500,
            //     settings: {
            //         slidesToShow: 1,
            //     }
            // }
        ]
    });
    $('.work_slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        swipeToSlide: true,
        arrows: true,
        nextArrow: '<span class="prev"><i class="fal fa-caret-right"></i></span>',
        prevArrow: '<span class="next"><i class="fal fa-caret-left"></i></span>',
        dots: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 675,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });


    $('.services_slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        swipeToSlide: true,
        arrows: true,
        nextArrow: '<span class="prev"><i class="fal fa-caret-right"></i></span>',
        prevArrow: '<span class="next"><i class="fal fa-caret-left"></i></span>',
        dots: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });




    $(window).scroll(function() {
        var scroll_height = $(window).scrollTop();
        $('.services_bg_image').css("bottom", scroll_height/20)
    });

    $(".header_scedule").click(function(e){
        e.preventDefault()
        $("#header_scedule").addClass("active")
    });



    $(document).mouseup(function (e){
        var div = $(".meetings-iframe-container");
        if (!div.is(e.target)
            && div.has(e.target).length === 0) {
            $("#header_scedule").removeClass("active")
        }
    });

//Scroll tabs
    var sections = $('.work_content_item')
    var nav = $('nav')
    var bar = $('.fixed-bar')
    var nav_height = bar.outerHeight();

    $(window).on('scroll', function () {
        var cur_pos = $(this).scrollTop();

        sections.each(function() {
            var top = $(this).offset().top - nav_height,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                nav.find('a').removeClass('active');
                sections.removeClass('active');

                $(this).addClass('active');
                nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
            }
        });
    });

    nav.find('a').on('click', function () {
        var $el = $(this)
            var id = $el.attr('href');

        $('html, body').animate({
            scrollTop: $(id).offset().top - nav_height
        }, 500);

        return false;
    });

    //Reviews slider output
    $('.rewiews_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: true,
        nextArrow: '<span class="prev"><i class="fal fa-angle-right"></i></span>',
        prevArrow: '<span class="next"><i class="fal fa-angle-left"></i></span>',
        dots: false
    });



    //Full screen slider
    $('.fullscreen_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        nextArrow: '<span class="prev"><i class="fal fa-angle-right"></i></span>',
        prevArrow: '<span class="next"><i class="fal fa-angle-left"></i></span>',
        dots: false
    })


    // Faq scripts
    $('.line').click(function () {

        if ($(this).hasClass('active')) {
            $(this).find('.answer').slideUp();
            $(this).removeClass('active');
        }
        else {
            $('.answer').slideUp();
            $('.line').removeClass('active');
            $(this).find('.answer').slideDown();
            $(this).addClass('active');
        }

    });



});


//Ajax load
jQuery(function ($) {

    $(".btn-loadmore").click(function () {

        var button = $(this),
            data = {
                action: 'load_posts',
                current_page: current_page
            };

        $.ajax({
            // you can also use $.post here
            url: ajax_web_url, // AJAX handler
            data: data,
            type: "POST",
            beforeSend: function (xhr) {

            },
            success: function (data) {
                if (data) {
                    $("#" + toins).append(data);
                    current_page++;

                    if (current_page == count_page) button.remove();
                } else {
                    button.remove();
                }
            },
        });
        var evs= $.Event("click");evs.stopPropagation();evs.preventDefault();return false;
    });
});


//Scrip for Snazzy Map
function new_map( $el , snazzystyles) {
    var $markers = $el.find('.marker');
    var args = {
        zoom		: zooms,
        center		: new google.maps.LatLng(0, 0),
        mapTypeId	: google.maps.MapTypeId.ROADMAP,
        styles: snazzystyles
    };
    var map = new google.maps.Map( $el[0], args);
    map.markers = [];
    $markers.each(function(){
        add_marker( jQuery(this), map );
    });
    center_map( map );
    return map;
}

function add_marker( $marker, map ) {
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
    var infowindow = new google.maps.InfoWindow({
        content		: $marker.html()
    });
    var pinColor = "176883";
    var marker = new google.maps.Marker({
        position	: latlng,
        map			: map,
    });
    marker.setIcon(pinImage);
    // add to array
    map.markers.push( marker );
    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
        // create info window
        var infowindow = new google.maps.InfoWindow({
            content		: $marker.html()
        });

        // show info window when marker is clicked
        google.maps.event.addListener(marker, 'click', function() {

            infowindow.open( map, marker );

        });
    }

}

function center_map( map ) {
    var bounds = new google.maps.LatLngBounds();
    jQuery.each( map.markers, function( i, marker ){
        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
        bounds.extend( latlng );
    });
    if( map.markers.length == 1 )
    {
        map.setCenter( bounds.getCenter() );
        map.setZoom(zooms);
    }
    else
    {
        map.fitBounds( bounds );
    }
}
//end script for Snazzy map



