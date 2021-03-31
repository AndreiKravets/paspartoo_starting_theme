jQuery(document).ready(function ($) {

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
            // top = top - 40;
        $('body,html').animate({scrollTop: top}, 1000);
    });


$('#hamb_button').click(function(){
    if ( $(this).hasClass('is-active'))
     {
        $('.bg').removeClass('active')
		$('.mobile_menu').removeClass('active')
        $('#hamb_button').removeClass('is-active')
        // $("html,body").css("overflow","auto")
    } else {
		$('.bg').addClass('active')
		$('.mobile_menu').addClass('active')
        $('#hamb_button').addClass('is-active')
        // $("html,body").css("overflow","hidden")

	}
})


$(window).resize(function () {

  if ($(window).width() >= 768) {
      $('.bg').removeClass('active')
      $('.mobile_menu').removeClass('active')
      $('#hamb_button').removeClass('is-active')
      // $("html,body").css("overflow", "auto")


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
        // $("html,body").css("overflow","auto")
	}

 })

 $('li.has-child span').click(function(){
        if (
            $(this).closest("li.has-child").hasClass("active")){
            $(this).closest("li.has-child").removeClass("active");}
        else {
            $('li.has-child').removeClass("active");
            $(this).closest("li.has-child").toggleClass("active");
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








    ( function () {
        $.extend($.expr[':'], {
            'off-top': function (el) {
                return $(el).offset().top < $(window).scrollTop()+10;
            },
            'off-top--200': function (el) {
                return $(el).offset().top < $(window).scrollTop()+100;
            },
            'off-top-200': function (el) {
                return $(el).offset().top < $(window).scrollTop()+200;
            },
            'off-top-height': function (el) {
                return ($(el).offset().top + $(el).outerHeight()) < $(window).scrollTop()+200;
            }
        });
    })(jQuery);


    $(document).scroll(function () {

        if($('.services_container_content1').is(":off-top")){
            $('.anchor_link').removeClass('active')
            $('.service_link1').addClass('active')
            element = $('.services_container_content1')
            color = element.css('background-color')
            new_color = color.substr(4, 13)
            elcolor = "linear-gradient(180deg,rgba("+new_color+",1) 41%, rgba("+new_color+",0)100%)"
            $('header').css("background", elcolor)
        }
        else if($('.services_container_content1').is(":off-top--200")){
            element = $('.services_container_content1')
            color = element.css('background-color')
            $('header').css("background", "transparent")
        }
    // });
    // $(document).scroll(function () {
        if($('.services_container_content2').is(":off-top")){
            $('.anchor_link').removeClass('active')
            $('.service_link2').addClass('active')
            element = $('.services_container_content2')
            color = element.css('background-color')
            new_color = color.substr(4, 13)
            elcolor = "linear-gradient(180deg,rgba("+new_color+",1) 41%, rgba("+new_color+",0)100%)"
            $('header').css("background", elcolor)
        }
        else if($('.services_container_content2').is(":off-top--200")){
            element = $('.services_container_content2')
            color = element.css('background-color')
            $('header').css("background", "transparent")
        }

    // });
    // $(document).scroll(function () {
        if($('.services_container_content3').is(":off-top")){
            $('.anchor_link').removeClass('active')
            $('.service_link3').addClass('active')
            element = $('.services_container_content3')
            color = element.css('background-color')
            new_color = color.substr(4, 13)
            elcolor = "linear-gradient(180deg,rgba("+new_color+",1) 41%, rgba("+new_color+",0)100%)"
            $('header').css("background", elcolor)
        }
        else if($('.services_container_content3').is(":off-top--200")){
            element = $('.services_container_content3')
            color = element.css('background-color')
            $('header').css("background", "transparent")
        }

    // });
    // $(document).scroll(function () {
        if($('.services_container_content4').is(":off-top")){
            $('.anchor_link').removeClass('active')
            $('.service_link4').addClass('active')
            element = $('.services_container_content4')
            color = element.css('background-color')
            new_color = color.substr(4, 13)
            elcolor = "linear-gradient(180deg,rgba("+new_color+",1) 41%, rgba("+new_color+",0)100%)"
            $('header').css("background", elcolor)
        }
        else if($('.services_container_content4').is(":off-top--200")){
            element = $('.services_container_content4')
            color = element.css('background-color')
            $('header').css("background", "transparent")
        }

    // });
    // $(document).scroll(function () {
        if($('.services_container_content5').is(":off-top")){
            $('.anchor_link').removeClass('active')
            $('.service_link5').addClass('active')
            element = $('.services_container_content5')
            color = element.css('background-color')
            new_color = color.substr(4, 13)
            elcolor = "linear-gradient(180deg,rgba("+new_color+",1) 41%, rgba("+new_color+",0)100%)"
            $('header').css("background", elcolor)
        }
        else if($('.services_container_content5').is(":off-top--200")){
            element = $('.services_container_content5')
            color = element.css('background-color')
            $('header').css("background", "transparent")
        }

    // });
    // $(document).scroll(function () {
        if($('.services_container_content6').is(":off-top")){
            $('.anchor_link').removeClass('active')
            $('.service_link6').addClass('active')
            element = $('.services_container_content6')
            color = element.css('background-color')
            new_color = color.substr(4, 13)
            elcolor = "linear-gradient(180deg,rgba("+new_color+",1) 41%, rgba("+new_color+",0)100%)"
            $('header').css("background", elcolor)
        }
        else if($('.services_container_content6').is(":off-top--200")){
            element = $('.services_container_content6')
            color = element.css('background-color')
            $('header').css("background", "transparent")
        }

    // });
    //
    // $(document).scroll(function () {
        if($('.services_container_content7').is(":off-top")){
            $('.anchor_link').removeClass('active')
            $('.service_link7').addClass('active')
            element = $('.services_container_content7')
            color = element.css('background-color')
            new_color = color.substr(4, 13)
            elcolor = "linear-gradient(180deg,rgba("+new_color+",1) 41%, rgba("+new_color+",0)100%)"
            $('header').css("background", elcolor)
        }
        else if($('.services_container_content7').is(":off-top--200")){
            element = $('.services_container_content7')
            color = element.css('background-color')
            $('header').css("background-color", "transparent")
        }

    // });

    // $(document).scroll(function () {
        if($('.services_container_content8').is(":off-top")){
            $('.anchor_link').removeClass('active')
            $('.service_link8').addClass('active')
            element = $('.services_container_content8')
            color = element.css('background-color')
            new_color = color.substr(4, 13)
            elcolor = "linear-gradient(180deg,rgba("+new_color+",1) 41%, rgba("+new_color+",0)100%)"
            $('header').css("background-color", elcolor)
        }
        else if($('.services_container_content8').is(":off-top--200")){
            element = $('.services_container_content8')
            color = element.css('background-color')
            $('header').css("background-color", "transparent")
        }

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





});
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