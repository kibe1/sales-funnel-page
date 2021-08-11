/* ---------------------------------------------
 common scripts
 --------------------------------------------- */

;(function () {

    "use strict"; // use strict to start

    /* ---------------------------------------------
     WOW init
     --------------------------------------------- */

    new WOW().init();

    $(document).ready(function () {

        /* ---------------------------------------------
          vl custom menu
        --------------------------------------------- */
        vlmenu.init({
            selector: ".vlmenu"
        });

        $('.js-hamburger').on('click', function () {
            $('.hamburger').toggleClass('is-active');
        });


        /* ---------------------------------------------
          nav sticky
        --------------------------------------------- */
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 200) {
                $('.app-header').addClass('sticky-nav');
            } else {
                $('.app-header').removeClass('sticky-nav');
            }
        });


        /* ---------------------------------------------
         overlay nav
         --------------------------------------------- */

        $('#nav_toggle').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('active');
            $('#nav_overlay').toggleClass('open');
            $('.extra_link, .overlay-nav-social-link').toggleClass('open');
        });

        /* ---------------------------------------------
         portfolio filtering
         --------------------------------------------- */

        var $portfolio = $('.portfolio-grid');
        if ($.fn.imagesLoaded && $portfolio.length > 0) {
            imagesLoaded($portfolio, function () {
                $portfolio.isotope({
                    itemSelector: '.portfolio-item',
                    filter: '*'
                });
                $(window).trigger("resize");
            });
        }

        $('.portfolio-filter').on('click', 'a', function (e) {
            e.preventDefault();
            $(this).parent().addClass('active').siblings().removeClass('active');
            var filterValue = $(this).attr('data-filter');
            $portfolio.isotope({filter: filterValue});
        });

        /*---------------------------------------------
         Portfolio popup
         ---------------------------------------------*/

        $(".portfolio-gallery").each(function () {
            $(this).find(".popup-gallery").magnificPopup({
                type: "image",
                gallery: {
                    enabled: true
                }
            });
        });

        $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
            disableOn: 300,
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        /* ---------------------------------------------
         Fun facts
         --------------------------------------------- */

        function animateFacts(fact) {
            if($.fn.visible && $(fact).visible() && ! $(fact).hasClass('animated') ) {
                $(fact).animateNumber({
                    number: parseInt($(fact).data('target'),10)
                }, 2000);
                $(fact).addClass('animated');
            }
        }

        function initFunFacts() {
                var funFacts = $('.fun-box').find('.value');
            funFacts.each(function() {
                animateFacts(this);
            });
        }

        initFunFacts();

        $(window).on("scroll", function () {
            initFunFacts();
        });


        /* ---------------------------------------------
         owl-carousel
         --------------------------------------------- */

        $('.owl-carousel').each(function() {
            var a = $(this),
                items = a.data('items') || [1,1,1],
                margin = a.data('margin'),
                loop = a.data('loop'),
                nav = a.data('nav'),
                dots = a.data('dots'),
                center = a.data('center'),
                autoplay = a.data('autoplay'),
                autoplaySpeed = a.data('autoplay-speed'),
                rtl = a.data('rtl'),
                autoheight = a.data('autoheight');

            var options = {
                nav: nav || false,
                loop: loop || false,
                dots: dots || false,
                center: center || false,
                autoplay: autoplay || false,
                autoHeight: autoheight || false,
                rtl: rtl || false,
                margin: margin || 0,
                autoplayTimeout: autoplaySpeed || 3000,
                autoplaySpeed: 400,
                autoplayHoverPause: true,
                navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                responsive: {
                    0: { items: items[2] || 1 },
                    576: { items: items[1] || 1 },
                    1200: { items: items[0] || 1}
                }
            };

            a.owlCarousel(options);
        });

        /* ---------------------------------------------
         Countdown
         --------------------------------------------- */

        $('.js_count-date').countdown('2021/2/20').on('update.countdown', function(event) {
            var $this = $(this).html(event.strftime(''
                + '<div class="count-block"><h2 class="u-FontSize50">%D</h2> <span>Days</span> </div>'
                + '<div class="count-block"><h2 class="u-FontSize50">%H</h2> <span>Hours</span> </div>'
                + '<div class="count-block"><h2 class="u-FontSize50">%M</h2> <span>Minutes</span> </div>'
                + '<div class="count-block"><h2 class="u-FontSize50">%S</h2> <span>Seconds</span></div>'));
        });

        /* ---------------------------------------------
         typist init
         --------------------------------------------- */
        if (typeof Typist == "function") {
            new Typist(document.querySelector(".typist-text"), {
                // letterInterval: 10,
                // speed: 100,
                // blinkSpeed: 5,
                // textInterval: 6000,
            });
        }


        /* ---------------------------------------------
         Configure tooltips globally
         --------------------------------------------- */

        $('[data-toggle="tooltip"]').tooltip();

        /* ---------------------------------------------
         Configure popover globally
         --------------------------------------------- */
        $('[data-toggle="popover"]').popover();


    });

})(jQuery);


