jQuery(document).ready(function ($) {
    !function(e){"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof module&&module.exports?module.exports=function(i,n){return void 0===n&&(n="undefined"!=typeof window?require("jquery"):require("jquery")(i)),e(n),n}:e(jQuery)}(function(e){"use strict";e.iMissYou=function(i){function n(){d.attr("href",u.favicon.src)}function t(){d.attr("href",f)}function o(){e("<img/>")[0].src=u.favicon.src}var u=e.extend({},e.iMissYou.defaults,i),c=document.title,d=e("head").find('link[rel$="icon"]'),f=d.attr("href");u.favicon.enabled&&o(),e(document).bind("visibilitychange",function(){e(document).prop("title",document.hidden?u.title:c),u.favicon.enabled&&(e(document).prop("hidden")?n():t())})},e.iMissYou.defaults={title:"I Miss you !",favicon:{enabled:!0,src:"iMissYouFavicon.ico"}}});

            $.iMissYou({
                title: "I Miss you !",
                favicon: {
                    enabled: true,
                    // src:'iMissYouFavicon.ico'
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
            // top = top - 40;
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


    $(document).mouseup(function (e){
        var div = $(".meetings-iframe-container");
        if (!div.is(e.target)
            && div.has(e.target).length === 0) {
            $("#header_scedule").removeClass("active")
        }
    });





});
