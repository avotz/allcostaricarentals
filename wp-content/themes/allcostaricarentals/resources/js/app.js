
require('./config');
const $ = require('jquery');
require('slick-carousel');
const hoverintent = require('hoverintent');

AOS.init({
    once: true,
});

$menu = document.querySelectorAll('.menu .menu-item-has-children'),
$btnMenu = $('.btn-menu'),
$fullMenu = $('.full-menu');

$menu.forEach(element => {
    hoverintent(element,
        function () {
            $(element).find('>.sub-menu').slideDown(200);
        }, function () {
            $(element).find('>.sub-menu').slideUp(200);
        }).options({
            timeout: 200,
            interval: 50
        });
});

$btnMenu.on('click', function (e) {

    $fullMenu.toggleClass('open');

});

$('.banner-slider').slick({
    dots: false,
    autoplay:true,
    autoplaySpeed:5000,
    speed: 500,
    arrows: false,
    cssEase: 'linear',
    fade: true,
    pauseOnHover: false
});

$('.slider-experiences').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    asNavFor: '.slider-experiences-nav',
    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><i class="fas fa-angle-left"></i></button>',
    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"><i class="fas fa-angle-right"></i></button>',
});
$('.slider-experiences-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-experiences',
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><i class="fas fa-angle-left"></i></button>',
                nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"><i class="fas fa-angle-right"></i></button>',
            }
        }
    ]


});

$('.slick-slide').mouseover(function () {
    $(this).click();
});



 $(window).scroll(function () {

          if ($(this).scrollTop() > 100) {
              $('.sticky-header').addClass("open");
          } else {
              $('.sticky-header').removeClass("open");
          }

  });


console.log('cargado');

