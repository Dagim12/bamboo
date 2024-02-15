/**
 * Exoplanet Custom JS
 *
 * @package Exoplanet
 *
 * Distributed under the MIT license - http://opensource.org/licenses/MIT
 */
menu_width='';
jQuery(function($){
  "use strict";
    jQuery('.menu > ul').superfish({
      delay:       500,                            
      animation:   {opacity:'show',height:'show'},  
      speed:       'fast'                         
    });
});

function showVWSearch()
{
  jQuery(".serach_outer").slideDown(700);
}
function closeVWSearch()
{
  jQuery(".serach_outer").slideUp(700);
}

/* Mobile responsive Menu*/

jQuery(function($){
  menu_width=parseInt(jQuery("#menu-width").text().trim());
  document.getElementById("open_nav").addEventListener("click", open);
        function open() {
            document.getElementById("sidebar1").style.width = menu_width + "px";
            document.getElementById("sidebar1").style.display = "block";
    }
    document.getElementById("close_nav").addEventListener("click", close);
        function close() {
             document.getElementById("sidebar1").style.width = "0";
            document.getElementById("sidebar1").style.display = "none";
    }
});

// For FAQ section
jQuery(".toggle-accordion").on("click", function() {
  var accordionId = jQuery(this).attr("accordion-id"),
  numPanelOpen = jQuery(accordionId + ' .collapse.in').length;

  jQuery(this).toggleClass("active");

  if (numPanelOpen == 0) {
    openAllPanels(accordionId);
  } else {
    closeAllPanels(accordionId);
  }
})

openAllPanels = function(aId) {
  console.log("setAllPanelOpen");
  jQuery(aId + ' .panel-collapse:not(".in")').collapse('show');
}
closeAllPanels = function(aId) {
  console.log("setAllPanelclose");
  jQuery(aId + ' .panel-collapse.in').collapse('hide');
}

jQuery(function() {
  //----- OPEN
  jQuery('[data-popup-open]').on('click', function(e) {
    var targeted_popup_class = jQuery(this).attr('data-popup-open');
    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

    e.preventDefault();
  });

  //----- CLOSE
  jQuery('[data-popup-close]').on('click', function(e) {
    var targeted_popup_class = jQuery(this).attr('data-popup-close');
    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

    e.preventDefault();
  });
});

jQuery('document').ready(function(){

    var owl = jQuery('#our-services .owl-carousel');
      owl.owlCarousel({
      margin:20,
      nav: false,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 3000,
      loop: true,
      dots:true,
      navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        },
        1100: {
          items: 1
        },
        1201: {
          items: 2
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    });
    var owl = jQuery('#pricing-plans .owl-carousel');
      owl.owlCarousel({
      margin: 30,
      nav:false,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 3000,
      loop: true,
      dots: true,
      navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        700: {
          items: 1
        },
        800: {
          items: 2
        },
        1000: {
          items: 2
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    });

    var owl = jQuery('#our-products .owl-carousel');
      owl.owlCarousel({
      margin: 30,
      nav:false,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 3000,
      loop: true,
      dots: true,
      navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        700: {
          items: 2
        },
        1000: {
          items: 4
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    });

    var owl = jQuery('#testimonials .owl-carousel');
      owl.owlCarousel({
      margin: 25,
      nav: false,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 8000,
      loop: true,
      dots: true,
      navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        650: {
          items: 1
        },
        1000: {
          items: 1
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    }); 

    var owl = jQuery('#our-team .owl-carousel');
      owl.owlCarousel({
      margin: 30,
      nav:false,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 3000,
      loop: true,
      dots: true,
      navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        700: {
          items: 2
        },
        1000: {
          items: 4
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    });


    var owl = jQuery('#our-blog .owl-carousel');
      owl.owlCarousel({
      margin:30,
      nav: false,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 3000,
      loop: true,
      dots:true,
      navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        800: {
          items: 1
        },
        1000: {
          items: 1
        },
        1100: {
          items: 1
        },
        1201: {
          items: 2
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    });

    var owl = jQuery('#our-partners .owl-carousel');
      owl.owlCarousel({
      margin: 10,
      nav:false,
      autoplay : true,
      lazyLoad: true,
      autoplayTimeout: 3000,
      loop: true,
      dots: true,
      navText : ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },
        400: {
          items: 2
        },
        600: {
          items: 3
        },
        700: {
          items: 3
        },
        1000: {
          items: 4
        }
      },
      autoplayHoverPause : true,
      mouseDrag: true
    });

    new WOW().init();

    jQuery('body').on('added_to_cart', function(e, fragments, cart_hash, button) {
      var product = '';
      var img = '';
      var title = '';
      var url = '';

      var home_url = vw_custom_script_obj.home_url;

      if ( vw_custom_script_obj.is_home == "1" ) {
        var product = jQuery(button).closest('.inner_product');
        var img = product.find('img').attr('src');
        var title = product.find('a.product-title').text();
        var url = product.find('.woocommerce-loop-product__link').attr('href');
      } else {
        var product = jQuery(button).closest('.product');
        var img = product.find('img').attr('src');
        var title = product.find('.woocommerce-loop-product__title').text();
        var url = product.find('.product_head a').attr('href');
      }

      if ( product != '' ) {
        jQuery.notify({
          icon: img,
          title: title,
          message: "Product has been added to your <a href=" + home_url + "/cart>cart</a>.",
          url: url
        }, {
          type: 'minimalist',
          delay: "3000",
          icon_type: 'image',
          template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<img data-notify="icon" class="img-circle pull-left">' +
            '<span class="prod-title" data-notify="title">{1}</span>' +
            '<div class="prod-messg" data-notify="message">{2}</div>' +
            '</div>'
        });
      }

    }); 
});

// custom Animation
jQuery(window).scroll(function() {
  jQuery('.work_inner').each(function(){
  var imagePos = jQuery(this).offset().top;

  var topOfWindow = jQuery(window).scrollTop();
    if (imagePos < topOfWindow+400) {
      jQuery(this).addClass("fadeInRight");
    }
  });

  jQuery('#about .container').each(function(){
  var imagePos = jQuery(this).offset().top;

  var topOfWindow = jQuery(window).scrollTop();
    if (imagePos < topOfWindow+400) {
      jQuery(this).addClass("fadeInLeft");
    }
  });

});
jQuery('document').ready(function(){

  jQuery('.vw_count').each(function () {
      jQuery(this).prop('Counter',0).animate({
          Counter: jQuery(this).text()
      }, {
          duration: 8000,
          easing: 'swing',
          step: function (now) {
             jQuery(this).text(Math.ceil(now));
          }
      });
  });     

// ------------Record Counter------------
jQuery(document).ready(function(){
  var count_no="yes";
  jQuery('#our-records').on('appear',function(){
    if(count_no=="yes")
    {
      count_no="no";
      jQuery('.count').each(function () {
        jQuery(this).prop('Counter',0).animate({
            Counter: jQuery(this).text()
        }, {
            duration: 8000,
            easing: 'swing',
            step: function (now) {
               jQuery(this).text(Math.ceil(now));
            }
        });
      });
    }
  });     
  jQuery('#our-records').appear(); 
});

jQuery(document).ready(function(){
 var stickyon=jQuery('#vw-sticky-onoff').text().trim();
  var a1=stickyon.length;
  window.onscroll = function() {
    if(a1==3){
      myScrollNav();
    }
    
  }

  var navbar = document.getElementById("vw-sticky-menu");
  var sticky = navbar.offsetTop;
  function myScrollNav() {
    // alert("Hii");
    if (window.pageYOffset > sticky) {
      //alert(window.pageYOffset);
      navbar.classList.add("sticky");
      navbar.classList.add("stickynavbar");
    } else {
      navbar.classList.remove("sticky");
      navbar.classList.remove("stickynavbar");
    }
  }
});

var interval=null;
function show_loading_box()
{
  jQuery(".spinner-loading-box").css("display","none");
  clearInterval(interval);
}
jQuery('document').ready(function(){   

  interval = setInterval(show_loading_box,2000);

  // ------------ Scroll Top ---------------

  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
      jQuery('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
      jQuery('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
  });
  jQuery('#return-to-top').click(function() {      // When arrow is clicked
    jQuery('body,html').animate({
      scrollTop : 0                       // Scroll to top of body
    }, 2000);
  });

  jQuery('.package-content').hover(function()
  {
    jQuery(this).find('.package-features').slideDown();
  },function()
  {
    jQuery(this).find('.package-features').slideUp();
  });

  // ------------ Video Popup ----------
  jQuery('#myBtn').click(function()
  {
    jQuery("#myNewModal").css("display","block");

  });
  jQuery('.close-one').click(function()
  {
    jQuery("#myNewModal").css("display","none");

  });

});

jQuery(document).ready(function(){
  // Tesitimonial
  jQuery('#testimonials').on('appear',function(){
       jQuery('#testimonials').each(function () {
        jQuery(this).addClass("demo");
       });
  
  });     
  jQuery('#testimonials').appear(); 
});

jQuery(document).ready(function(){
  // Expertise
  jQuery('#our-expertise').on('appear',function(){
       jQuery('#our-expertise').each(function () {
        jQuery(this).addClass("demo");
       });
  
  });     
  jQuery('#our-expertise').appear(); 
});

jQuery(document).ready(function(){
  // Services
  jQuery('#our-services').on('appear',function(){
       jQuery('#our-services').each(function () {
        jQuery(this).addClass("demo");
       });
  
  });     
  jQuery('#our-services').appear(); 
});

jQuery(document).ready(function(){
  // Project
  jQuery('#our-project').on('appear',function(){
       jQuery('#our-project').each(function () {
        jQuery(this).addClass("demo");
       });
  
  });     
  jQuery('#our-project').appear(); 
});

jQuery(document).ready(function(){
  // Product Records
  jQuery('#product-records').on('appear',function(){
       jQuery('#product-records').each(function () {
        jQuery(this).addClass("demo");
       });
  
  });     
  jQuery('#product-records').appear(); 
});

jQuery(document).ready(function(){
  // Why Choose Us
  jQuery('#why-choose-us').on('appear',function(){
       jQuery('#why-choose-us').each(function () {
        jQuery(this).addClass("demo");
       });
  
  });     
  jQuery('#why-choose-us').appear(); 
});

jQuery(document).ready(function(){
  // Our Partners
  jQuery('#our-partners').on('appear',function(){
       jQuery('#our-partners').each(function () {
        jQuery(this).addClass("demo");
       });
  
  });     
  jQuery('#our-partners').appear();

jQuery('#our-partners .owl-nav .owl-prev').append('<span class="our-partners-dots">nav</span>');
jQuery('#our-partners .owl-nav .owl-next').append('<span class="our-partners-dots">nav</span>');

jQuery('#our-blog .owl-nav .owl-prev').append('<span class="our-blog">nav</span>');
jQuery('#our-blog .owl-nav .owl-next').append('<span class="our-blog">nav</span>');

jQuery('#our-team .owl-nav .owl-prev').append('<span class="our-team">nav</span>');
jQuery('#our-team .owl-nav .owl-next').append('<span class="our-team">nav</span>');
jQuery('#testimonials .owl-nav .owl-prev').append('<span class="testimonials">nav</span>');
jQuery('#testimonials .owl-nav .owl-next').append('<span class="testimonials">nav</span>');

jQuery('#our-products .owl-nav .owl-prev').append('<span class="products">nav</span>');
jQuery('#our-products .owl-nav .owl-next').append('<span class="products">nav</span>');

jQuery('#our-services .owl-nav .owl-prev').append('<span class="services">nav</span>');
jQuery('#our-services .owl-nav .owl-next').append('<span class="services">nav</span>');
jQuery('#testimonials .owl-dots .owl-dot').append('<span class="testimonials-dots">dots</span>');

jQuery('#vw_gardening_slider .owl-nav .owl-next').append('<span class="vw_gardening_slider">nav</span>');
jQuery('#vw_gardening_slider .owl-nav .owl-prev').append('<span class="vw_gardening_slider">nav</span>');

jQuery('#pricing-plans .owl-nav .owl-next').append('<span class="pricing-plans">nav</span>');
jQuery('#pricing-plans .owl-nav .owl-prev').append('<span class="pricing-plans">nav</span>');

jQuery('#menu-primary-menu .home.menu-item').append('<span class="new-icons">New</span>');

});
jQuery("li.product .ajax_add_to_cart").each(function(i,value){
  jQuery(this).wrap( "<div class='cart-button'></div>" );
})
jQuery("li.product a.button.product_type_variable.add_to_cart_button").each(function(i,value){
  jQuery(this).wrap( "<div class='cart-button'></div>" );
})
jQuery('#wp-block-search__input-1').attr('placeholder',"Search...");
jQuery('th.product-remove').text('Remove');
jQuery('th.product-thumbnail').text('Image');

//  share icons

jQuery('.socialBox').on('click', function() {

  var self = jQuery(this);
  var element = jQuery(this).find("#socialGallery a");
  var c = 0;

  if (self.hasClass('animate')) {
    return;
  }

  if (!self.hasClass('open')) {

    self.addClass('open');

    TweenMax.staggerTo(element, 0.3, {
        opacity: 1,
        visibility: 'visible'
      },
      0.075);
    TweenMax.staggerTo(element, 0.3, {
        top: -12,
        ease: Cubic.easeOut
      },
      0.075);

    TweenMax.staggerTo(element, 0.2, {
        top: 0,
        delay: 0.1,
        ease: Cubic.easeOut,
        onComplete: function() {
          c++;
          if (c >= element.length) {
            self.removeClass('animate');
          }
        }
      },
      0.075);

    self.addClass('animate');

  } else {

    TweenMax.staggerTo(element, 0.3, {
        opacity: 0,
        onComplete: function() {
          c++;
          if (c >= element.length) {
            self.removeClass('open animate');
            element.css('visibility', 'hidden');
          };
        }
      },
      0.075);
  }
});

});