jQuery(function ($) {   // All scripts after this line (with this we can use jQuery symbol"$" inside Wordpress!!)


    $(document).ready(function() {
    
        
        
    });

    // Opacidad al hacer scroll (solo hasta viewport=600px)
    function myFunction(x) {
        $(document).ready(function() {
            if (x.matches) { // If media query matches
            $(window).scroll(function(){
                $('.opacityOnScroll').css({'opacity' : 1 - $(window).scrollTop() / 1000
                // , 'transform': 'scale(' + (1 - $(window).scrollTop() / 800) + ')'
                });

            })
            } else {
            $(window).scroll(function(){
                $('.opacityOnScroll').css({'opacity' : 1
                // , 'transform': 'scale(' + (1) + ')'
                });

            })
            }
        });
      }
      var x = window.matchMedia("(max-width: 991px)")
      myFunction(x) // Call listener function at run time
      x.addListener(myFunction) // Attach listener function on state changes


      // Initialize AOS.js plugin for animations
      AOS.init();



      //Send button
      (function () {
        var removeSuccess;
      
        removeSuccess = function () {
          return $('.button').removeClass('success');
        };
      
        $(document).ready(function () {
          return $('.button').click(function () {
            $(this).addClass('success');
            return setTimeout(removeSuccess, 3000);
          });
        });
      
      }).call(this);




      




}); // All scripts before this line