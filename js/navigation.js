/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */
// Mobile Navigation
(function($) {

$('.tab a').click(function(){

 $('html, body').animate({
                        scrollTop: $(this).offset().top -130
                    }, 2000);

});


    $('.mobile-toggle').click(function() {
        if ($('.main-nav').hasClass('open-nav')) {
            $('.main-nav').removeClass('open-nav');
            $('.masthead').removeClass('revealed');
            $('.menu-panel').removeClass('menu-panel-open');
            $('.quote-panel').removeClass('quote-panel-open');
            $(".search-bar").removeClass("search-open");
            $(".search-icon").removeClass("search-icon-open");

        } else {
            //$('.mobile-toggle span').addClass('white-color');
            $('.main-nav').addClass('open-nav');
            $('.masthead').addClass('revealed');
            $('.menu-panel').addClass('menu-panel-open');
            $('.quote-panel').addClass('quote-panel-open');
            $(".search-bar").removeClass("search-open");
            $(".search-icon").removeClass("search-icon-open");
        }
    })



    $('.search-icon').click(function() {
        $(".site-header").toggleClass("resize-header");
        $(".site-branding").toggleClass("branding-resize");
        $(".search-bar").toggleClass("search-open");
        $(".search-icon").toggleClass("search-icon-open");

    });

    $('.scroll-arrow').click(function() {

        $.fn.pagepiling.moveSectionDown();
    });

    /* ---------------------------------------------
 Height 100%
 --------------------------------------------- */

    $(document).ready(function() {
        js_height_init();
    });

    $(window).resize(function() {
        js_height_init();
    });

    function js_height_init() {
        (function($) {
            $('.js-height-full').height($(window).height());

        })(jQuery);

    }


    var image = {
        width: 1440,
        height: 1000
    };
    var targetOne = {
        x: 705,
        y: 170
    };
    var targetTwo = {
        x: 1075,
        y: 360
    };
    var targetThree = {
        x: 1080,
        y: 510
    };
    var targetFour = {
        x: 790,
        y: 750
    };

    var hotspotOne = $('#hotspotOne');
    var hotspotTwo = $('#hotspotTwo');
    var hotspotThree = $('#hotspotThree');
    var hotspotFour = $('#hotspotFour');

    $(document).ready(updatePointer);
    $(window).resize(updatePointer);

    function updatePointer() {
        var windowWidth = $(window).width();
        var windowHeight = $(window).height();

        // Get largest dimension increase
        var xScale = windowWidth / image.width;
        var yScale = windowHeight / image.height;
        var scale;
        var yOffset = 0;
        var xOffset = 0;

        if (xScale > yScale) {
            // The image fits perfectly in x axis, stretched in y
            scale = xScale;
            yOffset = (windowHeight - (image.height * scale)) / 2;
        } else {
            // The image fits perfectly in y axis, stretched in x
            scale = yScale;
            xOffset = (windowWidth - (image.width * scale)) / 2;
        }

        hotspotOne.css('top', (targetOne.y) * scale + yOffset);
        hotspotOne.css('left', (targetOne.x) * scale + xOffset);

        hotspotTwo.css('top', (targetTwo.y) * scale + yOffset);
        hotspotTwo.css('left', (targetTwo.x) * scale + xOffset);

        hotspotThree.css('top', (targetThree.y) * scale + yOffset);
        hotspotThree.css('left', (targetThree.x) * scale + xOffset);

        hotspotFour.css('top', (targetFour.y) * scale + yOffset);
        hotspotFour.css('left', (targetFour.x) * scale + xOffset);
    }

    $('.hotspot').click(function(e) {
        e.stopPropagation();

        if ($(this).children('.hotspot-info').hasClass('desktop__visible')) { //check if hidden or not
            $(this).children('.hotspot-info').removeClass('desktop__visible');  //if yes hide
            $('.hotspot-icon').removeClass('opened');
            $(this).removeClass('opened');
            $(this).delay(500).queue(function(){
        $(this).addClass('pulse').clearQueue();
    });
           

        } else {
            $('.hotspot').removeClass('opened');
            $('.hotspot-icon').removeClass('opened');
            $(this).removeClass('opened');
           $('.hotspot').addClass('pulse');
            $('.hotspot').children('.hotspot-info').removeClass('desktop__visible'); 
            $(this).children('.hotspot-info').addClass('desktop__visible'); // else show
            $(this).addClass('opened');
              $(this).find('.hotspot-icon').addClass('opened');
             $(this).removeClass('pulse');
        }
    });



})(jQuery);