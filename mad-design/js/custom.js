'use strict';

jQuery(document).ready(function () {
    jQuery('header .nav-link').bind("click", function(e){
        var anchor = jQuery(this);
        jQuery('.navbar-nav').find('LI').removeClass('current-menu-item');
        anchor.closest('LI').addClass('current-menu-item');
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(anchor.attr('href')).offset().top - 70
        }, 1000);
        e.preventDefault();
    });

    jQuery(".box1 a[href$='#services-and-prices']").bind("click", function(e){
        var anchor = jQuery(this);
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(anchor.attr('href')).offset().top - 70
        }, 1000);
        e.preventDefault();
    });

    jQuery('body').on('click', 'header .nav-link', function () {
        jQuery('.navbar-collapse').collapse('hide');
    });

    jQuery('.navbar-collapse').on('show.bs.collapse', function () {
        jQuery('.hamburger').addClass('is-active');
    });
    jQuery('.navbar-collapse').on('hidden.bs.collapse', function () {
        jQuery('.hamburger').removeClass('is-active');
    });

    changeSVG();
    // if (jQuery(window).width() < 768) {
    //     jQuery('body').on('click', '.static-inner', function(){
    //         jQuery(this).closest('.cms-banner-item ').find('.link-text').trigger( "click" );
    //     });
    // }


    // if (jQuery('#employees').length) {
    //     jQuery('.tab a').click(function(){
    //         return false;
    //     });
    //
    //     (function() {
    //
    //         function activateTab() {
    //             if(activeTab) {
    //                 resetTab.call(activeTab);
    //             }
    //             this.parentNode.className = 'tab tab-active';
    //             activeTab = this;
    //             activePanel = document.getElementById(activeTab.getAttribute('href').substring(1));
    //             activePanel.className = 'tabpanel show';
    //             activePanel.setAttribute('aria-expanded', true);
    //         }
    //
    //         function resetTab() {
    //             activeTab.parentNode.className = 'tab';
    //             if(activePanel) {
    //                 activePanel.className = 'tabpanel hide';
    //                 activePanel.setAttribute('aria-expanded', false);
    //             }
    //         }
    //
    //         var doc = document,
    //             tabs = doc.querySelectorAll('.tab a'),
    //             panels = doc.querySelectorAll('.tabpanel'),
    //             activeTab = tabs[0],
    //             activePanel;
    //
    //         activateTab.call(activeTab);
    //
    //         for(var i = tabs.length - 1; i >= 0; i--) {
    //             tabs[i].addEventListener('click', activateTab, false);
    //         }
    //
    //     })();
    // }

    jQuery(".data-picker").flatpickr({
        static: true,
        enableTime: true,
        time_24hr: true,
        allowInput: true,
        dateFormat: "Y-m-d H:i",
        locale: "ru",

    });

    jQuery('.wpcf7-form-control.wpcf7-file').change(function() {
        var filepath = this.value;
        var m = filepath.match(/([^\/\\]+)$/);
        var filename = m[1];
        jQuery('.upload-btn p').html(filename);

    });

});

jQuery(window).load(function() {
    jQuery('.owl-carousel').trigger('refresh.owl.carousel');
});


function changeSVG() {
    jQuery('img.changed-svg').each(function(){
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');
        var imgHeight = $img.attr('height');
        var imgWidth = $img.attr('width');

        jQuery.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Add replaced image's ID to the new SVG
            if(typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if(typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }
            // Add replaced image's height to the new SVG
            if(typeof imgHeight !== 'undefined') {
                $svg = $svg.attr('height', imgHeight);
            }
            // Add replaced image's width to the new SVG
            if(typeof imgWidth !== 'undefined') {
                $svg = $svg.attr('width', imgWidth);
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');

    });
}

// Get IE or Edge browser version
var version = detectIE();

if (version === false) {

} else if (version >= 12) {
    document.documentElement.className = 'ie';
} else {
    document.documentElement.className = 'ie';
}

/**
 * detect IE
 * returns version of IE or false, if browser is not Internet Explorer
 */
function detectIE() {
    var ua = window.navigator.userAgent;

    // Test values; Uncomment to check result …

    // IE 10
    // ua = 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)';

    // IE 11
    // ua = 'Mozilla/5.0 (Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko';

    // Edge 12 (Spartan)
    // ua = 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.71 Safari/537.36 Edge/12.0';

    // Edge 13
    // ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586';

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        // IE 10 or older => return version number
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        // IE 11 => return version number
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
        // Edge (IE 12+) => return version number
        return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
    }

    // other browser
    return false;
}