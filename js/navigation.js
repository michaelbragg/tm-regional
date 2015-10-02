/*
 *
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens and enables tab
 * support for dropdown menus.
 */

/* ---------------------------------------------
 Height 100%
 --------------------------------------------- */

js_height_init();


jQuery(window).resize(function() {
    js_height_init();
});

function js_height_init() {
    (function(jQuery) {
        jQuery('.js-height-full').height(jQuery(window).height());
    })(jQuery);
}

/* ---------------------------------------------
 Main Navigation 
 --------------------------------------------- */
(function(jQuery) {

    jQuery('.mobile-toggle').click(function() {
        if (jQuery('.main-nav').hasClass('open-nav')) {
            jQuery('.main-nav').removeClass('open-nav');
            jQuery('.masthead').removeClass('revealed');
            jQuery('.menu-panel').removeClass('menu-panel-open');
            jQuery('.quote-panel').removeClass('quote-panel-open');
            jQuery(".search-bar").removeClass("search-open");
            jQuery(".search-icon").removeClass("search-icon-open");

        } else {
            //jQuery('.mobile-toggle span').addClass('white-color');
            jQuery('.main-nav').addClass('open-nav');
            jQuery('.masthead').addClass('revealed');
            jQuery('.menu-panel').addClass('menu-panel-open');
            jQuery('.quote-panel').addClass('quote-panel-open');
            jQuery(".search-bar").removeClass("search-open");
            jQuery(".search-icon").removeClass("search-icon-open");
        }
    })

    jQuery('.search-icon').click(function() {
        jQuery(".site-header").toggleClass("resize-header");
        jQuery(".site-branding").toggleClass("branding-resize");
        jQuery(".search-bar").toggleClass("search-open");
        jQuery(".search-icon").toggleClass("search-icon-open");
 })


    jQuery('.scroll-arrow').click(function() {

        jQuery.fn.pagepiling.moveSectionDown();
    });

    /* ---------------------------------------------
 Hotspots
 --------------------------------------------- */

    var image = {
        width: 1440,
        height: 1000
    };
    var targetOne = {
        x: 704,
        y: 185
    };
    var targetTwo = {
        x: 1090,
        y: 390
    };
    var targetThree = {
        x: 1010,
        y: 600
    };
    var targetFour = {
        x: 810,
        y: 760
    };

    var hotspotOne = jQuery('#hotspotOne');
    var hotspotTwo = jQuery('#hotspotTwo');
    var hotspotThree = jQuery('#hotspotThree');
    var hotspotFour = jQuery('#hotspotFour');

    jQuery(document).ready(updatePointer);
    jQuery(window).resize(updatePointer);

    function updatePointer() {
        var windowWidth = jQuery(window).width();
        var windowHeight = jQuery(window).height();

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

    jQuery('.hotspot').click(function(e) {
        e.stopPropagation();

        if (jQuery(this).children('.hotspot-info').hasClass('desktop__visible')) { //check if hidden or not
            jQuery(this).children('.hotspot-info').removeClass('desktop__visible'); //if yes hide
            jQuery('.hotspot-icon').removeClass('opened');
            jQuery(this).removeClass('opened');
            jQuery(this).delay(500).queue(function() {
                jQuery(this).addClass('pulse').clearQueue();
            });


        } else {
            jQuery('.hotspot').removeClass('opened');
            jQuery('.hotspot-icon').removeClass('opened');
            jQuery(this).removeClass('opened');
            jQuery('.hotspot').addClass('pulse');
            jQuery('.hotspot').children('.hotspot-info').removeClass('desktop__visible');
            jQuery(this).children('.hotspot-info').addClass('desktop__visible'); // else show
            jQuery(this).addClass('opened');
            jQuery(this).find('.hotspot-icon').addClass('opened');
            jQuery(this).removeClass('pulse');
        }
    });

/* ---------------------------------------------
 Brand Tab Selector
 --------------------------------------------- */

    jQuery('.posts-menu .tab a').click(function(event) {
        event.preventDefault()
          jQuery("[id^=-visualizer]").width() +600;
        jQuery('html, body').animate({
            scrollTop: jQuery(this).offset().top - 180
        }, 2000);
    });

    jQuery('.tab_expand').on('click', function(event) {
        event.preventDefault();
        jQuery(this).find('.tabs-menu').toggleClass('tabs-menu-expand');
        jQuery(this).find('.tabs-arrow-down').toggleClass('tabs-arrow-up');
    });

/* ---------------------------------------------
 Regional Tab Selector
 --------------------------------------------- */

    jQuery('.region-tab-container .tabs-menu .tab a').click(function(event) {
        event.preventDefault();
        var DivLink = jQuery(this).attr('href');
        jQuery('html, body').animate({
            scrollTop: jQuery(DivLink).offset().top - 130
        }, 2000);
    });

    jQuery(window).scroll(function(event) {
        var scroll = jQuery(window).scrollTop();
        if (scroll > 640) {
            jQuery('.region-selector').addClass('region__fixed');
        }
        if (scroll < 640) {
            jQuery('.region-selector').removeClass('region__fixed');
        }
    });
})(jQuery);



