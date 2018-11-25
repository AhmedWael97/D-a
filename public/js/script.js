var swiper = new Swiper('.swiper-container');
	 new WOW().init();

 var swiper = new Swiper('.swiper-container2', {
      effect: 'cube',
      grabCursor: true,
      cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 20,
        shadowScale: 0.94,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });


var swiper = new Swiper('.swiper-container3', {
      effect: 'flip',
      grabCursor: true,
      pagination: {
        el: '.swiper-pagination3',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

var swiper = new Swiper('.swiper-container4', {
      pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
      },
    });
 var swiper = new Swiper('.swiper-container5', {
      slidesPerView: 4,
      centeredSlides: true,
      spaceBetween: 30,
      grabCursor: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  var swiper = new Swiper('.swiper-container6', {
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + (index + 1) + '</span>';
        },
      },
    });


  var swiper = new Swiper('.swiper-container7', {
        direction: 'vertical',
        slidesPerView: 1,
        spaceBetween: 30,
        mousewheel: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
    });





      var swiper = new Swiper('.swiper-container10', {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
$('.slider').slick({
  dots: false,
  infinite: true,
  autoplay:true,
  speed: 500,
  fade: true,
  arrows:false,
  cssEase: 'linear'
});
    
    var mixer = mixitup('.container123');