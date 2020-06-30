//Gsap

//Animate the left-side
var tl1 = gsap.timeline();

tl1.from(".presentation",{x: -500, duration: 1, opacity: 0})
  .addLabel("article", "+=1")
  .from("h1", {y: 30, duration: .5, opacity: 0})
  .from("h2", {y: 30, duration: .5, opacity: 0}, "-=0.3")
  .from(".presentation__icons--item", {y: 30, duration: .5, opacity: 0}, "-=0.3")
  .from(".presentation__resume", {y: 30, duration: .5, opacity: 0, stagger: 1}, "-=0.3")
  .from(".presentation__email", {y: 30, duration: .5, opacity: 0, stagger: 1}, "-=0.3");


//Animate the right-side
  gsap.registerPlugin(ScrollTrigger);
  
  gsap.utils.toArray("article").forEach(box => {
    var tl2 = gsap.timeline({
      scrollTrigger: {
        trigger: box,
        toggleActions: "play reverse play reverse",
        start: "-100px 80%",
        end: "80% 100px",
        markers: false
      }
    });
  
    tl2.from(box, {
      y: 100,
      duration: .5,
      opacity: 0
    });
  });

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