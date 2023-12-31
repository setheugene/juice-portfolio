// import domReady from '@roots/sage/client/dom-ready';
import Splide from '@splidejs/splide';
import { gsap } from "gsap";
import { ScrollTrigger } from 'gsap/ScrollTrigger.js';
gsap.registerPlugin(ScrollTrigger);
import { Flip } from 'gsap/Flip.js';
gsap.registerPlugin(Flip);
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';
import 'magnific-popup/dist/jquery.magnific-popup.js';
import Swup from 'swup';


const swup = new Swup({ containers: ["#main"] });
if (document.readyState === 'complete') {
  init();
  colorToggle();
} else {
  document.addEventListener('DOMContentLoaded', () => init());
  colorToggle();
}



function colorToggle() {
  $('#color-toggle').on('click', function () {
    $(this).toggleClass('color-mode');
    if (sessionStorage.getItem('color-mode') === 'dark') {
      sessionStorage.setItem('color-mode', 'light');
      $('body').removeClass('dark-mode');
    } else {
      sessionStorage.setItem('color-mode', 'dark');
      $('body').addClass('dark-mode');
    }
  });
}

swup.hooks.on('page:view', (visit) => init());
let count = 0;
function init() {



  if (sessionStorage.getItem('featured-project') === null) {
    const firstFilterButtonClass = $('.featured-projects .featured-project_cat-filter-trigger').first().data('target').replace('.', '');
    sessionStorage.setItem('featured-project', firstFilterButtonClass);
  }
  $('.featured-project_cat-filter-trigger').on('click', function () {
    const target = $(this).data('target');
    const className = target.replace('.', '');

    $('.featured-project_project').each(function () {
      if ($(this).hasClass(className)) {
        $(this).addClass('is-open');
      } else {
        $(this).removeClass('is-open');
      }

      sessionStorage.setItem('featured-project', className);
    });

    $('.featured-project_cat-filter-trigger').each(function () {
      $(this).removeClass('is-open');
    });

    $(this).addClass('is-open');
  });

  if (sessionStorage.getItem('featured-project') != '') {
    $('.featured-project_project').each(function () {
      if ($(this).hasClass(sessionStorage.getItem('featured-project'))) {
        $(this).addClass('is-open');
      } else {
        $(this).removeClass('is-open');
      }
    });

    $('.featured-project_cat-filter-trigger').each(function () {
      const target = $(this).data('target');
      const className = target.replace('.', '');
      if (className === sessionStorage.getItem('featured-project')) {
        $(this).addClass('is-open');
      } else {
        $(this).removeClass('is-open');
      }
    });



  }

  function switchColorMode() {
    if (sessionStorage.getItem('color-mode') === 'dark') {
      sessionStorage.setItem('color-mode', 'dark');
      $('body').addClass('dark-mode');
    } else {
      sessionStorage.setItem('color-mode', 'light');
      $('body').removeClass('dark-mode');
    }
  }

  switchColorMode();

  count++;
  function createAnimation(elements, startAnimationObj, animationFunction, start = 'top 90%') {
    if ((typeof elements === 'string' && document.querySelectorAll(elements).length > 0) || (typeof elements === 'object' && elements.length > 0)) {
      gsap.set(elements, startAnimationObj);

      const triggers = ScrollTrigger.batch(elements, {
        toggleClass: 'js-animated',
        once: true,
        start: 'top bottom-=230px',

        onEnter: (batch) => {
          animationFunction(batch);
        },
      });

      ScrollTrigger.addEventListener('refreshInit', () => {
        triggers.forEach((trigger) => {
          if (trigger.progress > 0) {
            animationFunction(trigger.trigger);
          }
        });
      });
    }
  }
  const fadeUpClasses = '.js-fade:not(.js-ignore), .js-fade-group > *:not(.js-ignore)';
  function fadeUpTimeline(elements) {
    const tl = gsap.timeline();
    /*
      * The following .to functions are the equivalent of
      * transition: opacity 0.35s ease 0.1s, transform 1s ease-out 0.1s;
      */

    /* Opacity style and transitions */
    tl.to(elements, {
      opacity: 1, // property/value
      duration: 0.35, // duration e.g. 0.35s
      ease: '0.25,0.1,0.25,1', // timing function e.g. ease
      stagger: 0.1, // delay e.g 0.1s
    }, 0);

    /* Transform style and transitions */
    tl.to(elements, {
      y: 0, // property/value
      duration: 1, // duration e.g. 1s
      ease: '0, 0, 0.58, 1.0', // timing function eg. ease-out
      stagger: 0.1, // delay e.g 0.1s
    }, 0);
  }
  createAnimation(fadeUpClasses, { opacity: 0, y: 25 }, fadeUpTimeline);

  /*
   * Reveal on scroll
   */
  function reveal(elements) {
    gsap.to(elements,
      {
        clipPath: 'inset(0% 0% 0% 0%)',
        duration: 1.5,
        ease: '0, 0, 0.58, 1.0',
        stagger: 0.2, // delay e.g 0.2s
      },
    );
  }

  const revealRightClasses = '.js-reveal-right:not(.js-ignore)';
  createAnimation(revealRightClasses, { clipPath: 'inset(0 100% 0 0)' }, reveal);

  const revealLeftClasses = '.js-reveal-left:not(.js-ignore)';
  createAnimation(revealLeftClasses, { clipPath: 'inset(0 0 0 100%)' }, reveal);

  const revealTopClasses = '.js-reveal-top:not(.js-ignore)';
  createAnimation(revealTopClasses, { clipPath: 'inset(100% 0 0 0)' }, reveal);

  const revealBottomClasses = '.js-reveal-bottom:not(.js-ignore)';
  createAnimation(revealBottomClasses, { clipPath: 'inset(0 0 100% 0)' }, reveal);
  // add active class to entire sections for css animations
  $('.activate').each(function () {
    ScrollTrigger.create({
      trigger: this,
      start: 'top 50%',
      scrub: 0.15,
      onRefresh: (self) => {
        if (self.progress > 0) {
          $(this).addClass('active');
        }
      },
      onEnter: ({ progress, direction, isActive }) => $(this).addClass('active'),
    });
  });

  $('.video-popup-trigger').magnificPopup({
    type: 'iframe',
    mainClass: 'mfp-fade',
    preloader: false,
    fixedContentPos: false,
    removalDelay: 160,
    callbacks: {
      open: function () {
        $('video').trigger('pause');
      },
      close: function () {
        $('video').trigger('play');
      },
    },
  });

  if ($('.appearing-text').length > 0) {

    $(".appearing-text").each(function () {
      const item = $(this).find('.appearing-text__item');
      item.each(function () {
        const tl = gsap.timeline({
          scrollTrigger: {
            trigger: this,
            start: "top bottom",
            end: "center center",
            pin: false,
            // markers: true,
            scrub: true,
            stagger: 0.25
          }
        });
        tl.from($(this), { x: '55vw' });
        // tl.fromTo(
        //   $(this),
        //   { filter: "blur(10px)", opacity: "0", ease: "linear" },
        //   { filter: "blur(0px)", opacity: "1", ease: "linear" }
        // );
        // tl.fromTo(
        //   $(this),
        //   { filter: "blur(0px)", opacity: "1", ease: "linear" },
        //   { filter: "blur(10px)", opacity: "0", ease: "linear" }
        // );
      });
      // const itemsHeight = $(this).find('.appearing-text_column').height() / 2;

      // ScrollTrigger.create({
      //   trigger: $(this).find(".appearing-text_title"),
      //   pin: true,
      //   start: "center center",
      //   end: `bottom top-=${itemsHeight}`,
      //   markers: true,
      // });
    });
  }

  if ($('.content-accordion').length > 0) {
    //SET THE HEIGHT OF THE COMPONENT TO THE TALLEST ACCORDION CONTENT SO THE PAGE DOESN'T MOVE UP AND DOWN WHEN NAVIGATING
    let totalAccHeight = 0;
    let accCount = 0;

    $('.content-accordion_content').each(function () {
      accCount++;
      if ($(this).height() > totalAccHeight) {
        totalAccHeight = $(this).height();
      }
      $(this).height(0);
    });
    const totalHeight = (accCount * 72) + totalAccHeight;
    $('.content-accordion_wrapper').height(totalHeight);
  }

  //OPEN AND CLOSE ACCORDIONS ON CLICK
  $('.content-accordion_button').on('click', function () {
    const outerPanel = $(this).next();
    const innerPanel = outerPanel.find('.content-accordion_content-inner');
    const panelHeight = innerPanel.height();

    if (!$(this).hasClass('is-open')) {

      //REMOVE CLASS FROM BUTTONS
      $('.content-accordion_button').each(function () {
        $(this).removeClass('is-open');
      });

      //REMOVE CLASS FROM CONTENT
      $('.content-accordion_content').each(function () {
        $(this).removeClass('is-open');
        $(this).height(0);
      });

      //ADD CLASSES
      $(this).addClass('is-open');
      outerPanel.height(panelHeight);
      outerPanel.addClass('is-open');

    } else {
      $(this).removeClass('is-open');
      outerPanel.height(0);
      outerPanel.removeClass('is-open');
    }
  });



  window.toggleGridOverlay = function () {
    const template = `<div id="gridOverlay" class="fixed inset-0 opacity-25 pointer-events-none" style="z-index:9999">
        <div class="container grid grid-cols-6 h-full md:grid-cols-12 gap-gutter-full">
          <div class="h-full" style="background-color: #fc8181;"></div>
          <div class="h-full" style="background-color: #fc8181;"></div>
          <div class="h-full" style="background-color: #fc8181;"></div>
          <div class="h-full" style="background-color: #fc8181;"></div>
          <div class="h-full" style="background-color: #fc8181;"></div>
          <div class="h-full" style="background-color: #fc8181;"></div>
          <div class="hidden h-full md:block" style="background-color: #fc8181;"></div>
          <div class="hidden h-full md:block" style="background-color: #fc8181;"></div>
          <div class="hidden h-full md:block" style="background-color: #fc8181;"></div>
          <div class="hidden h-full md:block" style="background-color: #fc8181;"></div>
          <div class="hidden h-full md:block" style="background-color: #fc8181;"></div>
          <div class="hidden h-full md:block" style="background-color: #fc8181;"></div>
        </div>
      </div>`;
    if (document.getElementById('gridOverlay')) {
      document.getElementById('gridOverlay').remove();
    } else {
      document.body.insertAdjacentHTML('beforeend', template);
    }
  };

  if ($('.homepage-hero_splide').length > 0) {
    const splide = new Splide('.homepage-hero_splide.splide', {
      type: 'loop',
      drag: 'free',
      focus: 'center',
      arrows: false,
      pagination: false,
      perPage: 1,
      autoWidth: true,
      autoScroll: {
        speed: 1,
        pauseOnHover: false,
        pauseOnFocus: false,
      },
    });

    splide.mount({ AutoScroll });
  }

  if ($('.references_splide').length > 0) {
    const splide = new Splide('.references_splide.splide', {
      type: 'loop',
      drag: 'free',
      focus: 'center',
      arrows: false,
      pagination: false,
      perPage: 1,
      autoWidth: true,
      autoScroll: {
        speed: 1,
        pauseOnHover: false,
        pauseOnFocus: false,
      },
    });

    splide.mount({ AutoScroll });
  }


  // Magnetic Button Reference Code GreenSock Official CopePen
  // https://codepen.io/GreenSock/pen/XWdvmoq

  var mWrap = document.querySelectorAll(".magnetic-wrap");

  function parallaxIt(e, wrap, movement = 0.5) {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    var boundingRect = wrap.mArea.getBoundingClientRect();
    var relX = e.pageX - boundingRect.left;
    var relY = e.pageY - boundingRect.top;

    gsap.to(wrap.mContent, {
      x: (relX - boundingRect.width / 2) * movement,
      y: (relY - boundingRect.height / 2 - scrollTop) * movement,
      ease: "power1",
      duration: 0.6
    });
  }

  mWrap.forEach(function (wrap) {

    wrap.mContent = wrap.querySelector(".js-magnetic-content");
    wrap.mArea = wrap.querySelector(".js-magnetic-area");

    wrap.mArea.addEventListener("mousemove", function (e) {
      parallaxIt(e, wrap);
    });

    wrap.mArea.addEventListener("mouseleave", function (e) {
      gsap.to(wrap.mContent, {
        scale: 1,
        x: 0,
        y: 0,
        ease: "power3",
        duration: 0.6
      });
    });
  });

  // const navHeight = 76;
  // if ($('.featured-projects_grid').length > 0) {
  //   console.log('featured found');
  //   const featuredProjectsHeight = $('.featured-projects_grid').height();
  //   const tl = ScrollTrigger.create({
  //     trigger: '.featured-projects_pinned',
  //     start: 'top top+=108px',
  //     end: `top top-=${featuredProjectsHeight}px`,
  //     pin: true,
  //     // markers: true,
  //     scrub: true,
  //     pinSpacing: false,
  //   });
  // }


  parallax();

  $(window).on('resize', function () {
    parallax();
  });
  function parallax() {
    $('.js-parallax').each(function () {
      const tl = gsap.timeline({
        scrollTrigger: {
          trigger: this,
          start: 'top bottom-=135px',
          end: 'bottom top+=77px',
          pin: false,
          // markers: true,
          scrub: 1.5,
          delay: 0.25,
        },
      });
      tl.fromTo($(this), { yPercent: 10 }, { yPercent: -10 });
    });
  }

  parallaxReverse();

  $(window).on('resize', function () {
    parallaxReverse();
  });
  function parallaxReverse() {
    $('.js-parallax-reverse').each(function () {
      const tl = gsap.timeline({
        scrollTrigger: {
          trigger: this,
          start: 'top bottom-=135px',
          end: 'bottom top+=77px',
          pin: false,
          // markers: true,
          scrub: 1.5,
          delay: 0.25,
        },
      });
      tl.fromTo($(this), { yPercent: -10 }, { yPercent: 10 });
    });
  }

  projectHeroImage();

  $(window).on('resize', function () {
    projectHeroImage();
  });

  function projectHeroImage() {
    $('.project-hero_image-container').each(function () {
      const tl = gsap.timeline({
        scrollTrigger: {
          trigger: this,
          start: 'top top+=290px',
          end: 'top top+=190px',
          pin: false,
          // markers: true,
          scrub: 2,
        },
      });
      tl.from($(this), { padding: 0 });
    });
  }

  // const items = gsap.utils.toArray('.featured-project_project');
  // const filters = $('.featured-project_category-pill');
  // function updateFilters() {
  //   const state = Flip.getState(items);

  //   Flip.from(state, {
  //     duration: 0.7,
  //     scale: true,
  //     ease: "power1.inOut",
  //     stagger: 0.08,
  //     absolute: true,
  //     onEnter: elements => gsap.fromTo(elements, { opacity: 0, scale: 0 }, { opacity: 1, scale: 1, duration: 1 }),
  //     onLeave: elements => gsap.to(elements, { opacity: 0, scale: 0, duration: 1 })
  //   });
  // }
  // filters.on('click', function () {
  //   updateFilters();
  // });
};
// });
/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);
