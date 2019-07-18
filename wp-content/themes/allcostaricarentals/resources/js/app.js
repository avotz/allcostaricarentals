
require('./config');
const $ = require('jquery');
require('slick-carousel');
const hoverintent = require('hoverintent');

AOS.init({
    once: true,
});

$menu = document.querySelectorAll('.menu .menu-item-has-children'),
$btnMenu = $('.btn-menu'),
$fullMenu = $('.sticky-header .full-menu-nav');

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

  resizes();
  $(window).resize(resizes);
  
  function resizes() {
      console.log('disparo resize');
      responsive();
  
     
  }
  function responsive() {
  
      var isResponsive = $('body').hasClass('mobile');
      if (getWindowWidth() < 768) {
          if (!isResponsive) {
             
              $('body').addClass('mobile');
          }
      } else if (isResponsive) {

          $('body').removeClass('mobile');
        
      }
  
  
  }
  
  console.log('cargado');
  
  function getScrollerWidth() {
      var scr = null;
      var inn = null;
      var wNoScroll = 0;
      var wScroll = 0;
  
      // Outer scrolling div
      scr = document.createElement('div');
      scr.style.position = 'absolute';
      scr.style.top = '-1000px';
      scr.style.left = '-1000px';
      scr.style.width = '100px';
      scr.style.height = '50px';
      // Start with no scrollbar
      scr.style.overflow = 'hidden';
  
      // Inner content div
      inn = document.createElement('div');
      inn.style.width = '100%';
      inn.style.height = '200px';
  
      // Put the inner div in the scrolling div
      scr.appendChild(inn);
      // Append the scrolling div to the doc
      document.body.appendChild(scr);
  
      // Width of the inner div sans scrollbar
      wNoScroll = inn.offsetWidth;
      // Add the scrollbar
      scr.style.overflow = 'auto';
      // Width of the inner div width scrollbar
      wScroll = inn.offsetWidth;
  
      // Remove the scrolling div from the doc
      document.body.removeChild(
          document.body.lastChild);
  
      // Pixel width of the scroller
      return (wNoScroll - wScroll);
  }
  
  function getWindowHeight() {
      var windowHeight = 0;
      if (typeof (window.innerHeight) == 'number') {
          windowHeight = window.innerHeight;
      } else {
          if (document.documentElement && document.documentElement.clientHeight) {
              windowHeight = document.documentElement.clientHeight;
          } else {
              if (document.body && document.body.clientHeight) {
                  windowHeight = document.body.clientHeight;
              }
          }
      }
      return windowHeight;
  }
  
  function getWindowWidth() {
      var windowWidth = 0;
      if (typeof (window.innerWidth) == 'number') {
          windowWidth = window.innerWidth;
      } else {
          if (document.documentElement && document.documentElement.clientWidth) {
              windowWidth = document.documentElement.clientWidth;
          } else {
              if (document.body && document.body.clientWidth) {
                  windowWidth = document.body.clientWidth;
              }
          }
      }
      return windowWidth;
  }
  




