(function(){var e,t,a,n,i,c;if(e=document.getElementById("site-header"),!e||(t=e.getElementsByTagName("button")[0],typeof t>"u"))return;if(a=e.getElementsByTagName("ul")[0],typeof a>"u"){t.style.display="none";return}for(a.setAttribute("aria-expanded","false"),a.className.indexOf("nav-menu")===-1&&(a.className+=" nav-menu"),t.onclick=function(){e.className.indexOf("toggled")!==-1?(e.className=e.className.replace(" toggled",""),t.setAttribute("aria-expanded","false"),a.setAttribute("aria-expanded","false")):(e.className+=" toggled",t.setAttribute("aria-expanded","true"),a.setAttribute("aria-expanded","true"))},n=a.getElementsByTagName("a"),i=0,c=n.length;i<c;i++)n[i].addEventListener("focus",d,!0),n[i].addEventListener("blur",d,!0);function d(){for(var r=this;r.className.indexOf("nav-menu")===-1;)r.tagName.toLowerCase()==="li"&&(r.className.indexOf("focus")!==-1?r.className=r.className.replace(" focus",""):r.className+=" focus"),r=r.parentElement}(function(r){var u,l,f=r.querySelectorAll(".menu-item-has-children > a, .page_item_has_children > a");if("ontouchstart"in window)for(u=function(m){var s=this.parentNode,o;if(s.classList.contains("focus"))s.classList.remove("focus");else{for(m.preventDefault(),o=0;o<s.parentNode.children.length;++o)s!==s.parentNode.children[o]&&s.parentNode.children[o].classList.remove("focus");s.classList.add("focus")}},l=0;l<f.length;++l)f[l].addEventListener("touchstart",u,!1)})(e)})();window.addEventListener("scroll",function(){let e=window.pageYOffset||document.documentElement.scrollTop,t=document.querySelector(".site-header"),a=window.innerHeight,n=document.documentElement.scrollHeight;window.innerWidth<992&&(e+a>=n?t.classList.remove("header-down"):e>100?t.classList.add("header-down"):t.classList.remove("header-down"))});var g=gsap.timeline();g.from(".site-header",{y:-100,duration:.5,opacity:0,ease:"power2.out"},"+=0.1").from(".presentation__central",{x:-100,duration:.5,opacity:0,ease:"power2.out"},"-=0.15").from(".presentation__resume",{y:100,duration:.5,opacity:0,ease:"power2.out",stagger:.1},"-=0.15");gsap.utils.toArray("body.home article, body.archive article, body.blog article").forEach((e,t)=>{gsap.from(e,{y:100,duration:.6,opacity:0,ease:"power2.out",scrollTrigger:{trigger:e,start:"-100px 80%",end:"80% 100px",toggleActions:"play reverse play reverse",markers:!1}})});gsap.utils.toArray(".home article .project__section").forEach(e=>{gsap.from(e,{x:-100,duration:.6,opacity:0,ease:"power2.out",scrollTrigger:{trigger:e,start:"-100px 80%",end:"85% 5%",toggleActions:"play reverse play reverse",markers:!1}})});
//# sourceMappingURL=main.js.map
