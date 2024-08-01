  /*********    Fixed header    *********/
  window.addEventListener('scroll', function () {
    let scroll = window.pageYOffset || document.documentElement.scrollTop;
    let headerFixed = document.querySelector('.site-header');
    let windowHeight = window.innerHeight;
    let documentHeight = document.documentElement.scrollHeight;

    // if (scroll >= 100) {
    //   headerFixed.classList.add('header-down');
    // } else {
    //   headerFixed.classList.remove('header-down');
    // }

    if (window.innerWidth < 992) {
      if (scroll + windowHeight >= documentHeight) {
        headerFixed.classList.remove('header-down');
      } else if (scroll > 100) {
        headerFixed.classList.add('header-down');
      } else {
        headerFixed.classList.remove('header-down');
      }
    }
  });



// jQuery(function ($) {   // All scripts after this line (with this we can use jQuery symbol"$" inside Wordpress!!)
  

//     $(document).ready(function() {
        
        
//     });

//     // Opacidad al hacer scroll (solo hasta viewport=600px)
//     function myFunction(x) {
//         $(document).ready(function() {
//             if (x.matches) { // If media query matches
//             $(window).scroll(function(){
//                 $('.opacityOnScroll').css({'opacity' : 1 - $(window).scrollTop() / 1000
//                 // , 'transform': 'scale(' + (1 - $(window).scrollTop() / 800) + ')'
//                 });

//             })
//             } else {
//             $(window).scroll(function(){
//                 $('.opacityOnScroll').css({'opacity' : 1
//                 // , 'transform': 'scale(' + (1) + ')'
//                 });

//             })
//             }
//         });
//       }
//       var x = window.matchMedia("(max-width: 991px)")
//       myFunction(x) // Call listener function at run time
//       x.addListener(myFunction) // Attach listener function on state changes


//       // Initialize AOS.js plugin for animations
//       AOS.init();



//       //Send button
//       (function () {
//         var removeSuccess;
      
//         removeSuccess = function () {
//           return $('.btn--home').removeClass('success');
//         };
      
//         $(document).ready(function () {
//           return $('.btn--home').click(function () {
//             $(this).addClass('success');
//             return setTimeout(removeSuccess, 3000);
//           });
//         });
      
//       }).call(this);


//       // Tiny-slider
//       // if ( $('.slider').length > 0 ) { Si la clase .slider existe..
//         var slider = tns({
//           container: '.slider',
//           slideBy: 'page',
//           speed: 700,
//           // nav: true,
//           // navPosition: 'bottom',
//           autoplay: true,
//           autoPlayTimeout: 3000,
//           autoplayButtonOutput: false,
//           controls: false,
//           // controlsContainer: '#slider-controls',
//           // prevButton: '.previous',
//           // nextButton: '.next',
//           items: 1,
//           navContainer: '.slider-nav',
//           navAsThumbnails: true
//         });
//       //}

// }); // All scripts before this line