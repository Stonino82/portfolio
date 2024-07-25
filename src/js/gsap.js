//Gsap

//Animate the left-side
var tl1 = gsap.timeline();

tl1.from(".presentation__header", {y: -100, duration: .5, opacity: 0, ease: "power2.out"}, "+=0.1")
    .from(".menu-container", {y: -100, duration: .5, opacity: 0, ease: "power2.out"}, "")
    .from(".presentation__central", {x: -100, duration: .5, opacity: 0, ease: "power2.out"}, "-=0.15")
    .from(".presentation__resume", {y: 100, duration: .5, opacity: 0, ease: "power2.out", stagger: .1}, "-=0.15")
    // .from(".presentation__icons li", {y: 20, duration: .4, opacity: 0, ease: "back.out(2)", stagger: .1}, "-=0.3")






//Animate the right-side
gsap.utils.toArray('body.home article, body.archive article, body.blog article').forEach((el, i) => {
  gsap.from(el, {
    y: 100,
    duration: .6,
    opacity: 0,
    ease: "power2.out",
    // scale: .85,
    // delay: i * 0.15,
    scrollTrigger: {
      trigger: el,
      start: "-100px 80%",
      end: "80% 100px",
      toggleActions: "play reverse play reverse",
      // immediateRender: true,
      markers: false
    },
  });
});


// var containers = gsap.utils.toArray(".showcase");

// containers.forEach(function (article) {
//   gsap.fromTo(
//     article.querySelectorAll("article"),
//     { 
//       x: -40,
//       opacity: 0
//     },
//     {
//       x: 0,
//       opacity: 1,
//       ease: "power2.out",
//       stagger: 0.6,
//       scrollTrigger: {
//         trigger: article,
//         // scrub: true,
//         start: "-100px 80%",
//         end: "80% 100px",
//         immediateRender: true,
//         markers: true,
//         toggleActions: "play reverse play reverse"
//       }
//     }
//   );
// });













gsap.utils.toArray('.home article .project__section').forEach((el) => {
  gsap.from(el, {
      x: -100,
      duration: .6,
      opacity: 0,
      ease: "power2.out",
      scrollTrigger: {
        trigger: el,
        start: "-100px 80%",
        end: "85% 5%",
        toggleActions: "play reverse play reverse",
        markers: false
      },
  });
});

// gsap.utils.toArray('.home article .project__tags').forEach((el) => {
//   gsap.from(el, {
//       scrollTrigger: {
//         trigger: el,
//         start: "-50px 90%",
//         end: "85% 20%",
//         toggleActions: "play reverse play reverse",
//         markers: false
//       },
//       x: -100,
//       duration: .6,
//       opacity: 0,
//       ease: "power2.out"
//   });
// });

// gsap.utils.toArray('.home article .project__kit li').forEach((el) => {
//   gsap.from(el, {
//       scrollTrigger: {
//         trigger: el,
//         start: "-50px 90%",
//         end: "85% 20%",
//         toggleActions: "play reverse play reverse",
//         markers: false
//       },
//       x: 100,
//       duration: .6,
//       opacity: 0,
//       ease: "power2.out"
//   });
// });
          
          

/*
  Determines how the linked animation is controlled at the 4 distinct toggle places:
  onEnter, onLeave, onEnterBack, and onLeaveBack, in that order.
  The default is play none none none. So toggleActions: "play pause resume reset" will 
  1. play the animation when entering
  2. pause it when leaving,
  3. resume it when entering again backwards,
  4. and reset (rewind back to the beginning) when scrolling all the way back past the beginning.
  You can use any of the following keywords for each action:
  "play", "pause", "resume", "reset", "restart", "complete", "reverse", and "none".
*/



// gsap.registerPlugin(ScrollTrigger);
  
//   gsap.utils.toArray(".home article").forEach(box => {
//     var tl2 = gsap.timeline({
//       scrollTrigger: {
//         trigger: box,
//         start: "-100px 80%",
//         end: "80% 100px",
//         toggleActions: "play reverse play reverse",
//         markers: false
//       }
//     });
  
//     tl2.from(box, {
//       y: 100,
//       duration: .6,
//       opacity: 0,
//       ease: "power2.out",
//       scale: .95
//     });
//   });