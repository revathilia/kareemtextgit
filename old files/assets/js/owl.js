jQuery(document).ready(function() {
   var res=document.getElementById('dirId').value;
    if (res=='true') 
{
    jQuery('#client_carou').owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop:true,
        margin:15,
        nav:true,
        dots:false,
        autoplayTimeout: 2000,
        smartSpeed: 800,
        rtl:true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:4
            },
            1000:{
                items:6
            }
        },
        navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>"
  ],
    });
  }else{
    jQuery('#client_carou').owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop:true,
        margin:15,
        nav:true,
        dots:false,
        autoplayTimeout: 2000,
        smartSpeed: 800,
        rtl:false,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:4
            },
            1000:{
                items:6
            }
        },
        navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>"
  ],
    });
}
});

jQuery(document).ready(function() {
   var res=document.getElementById('dirId').value;
    if (res=='true') 
{
    jQuery('#acc_carou').owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop:true,
        margin:15,
        nav:true,
        dots:false,
        autoplayTimeout: 2000,
        smartSpeed: 800,
        rtl:true,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:4
            },
            1000:{
                items:6
            }
        },
        navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>"
  ],
    });
  }else{
    jQuery('#acc_carou').owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop:true,
        margin:15,
        nav:true,
        dots:false,
        autoplayTimeout: 2000,
        smartSpeed: 800,
        rtl:false,
        responsive:{
            0:{
                items:2
            },
            600:{
                items:4
            },
            1000:{
                items:6
            }
        },
        navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>"
  ],
    });
}
});

jQuery(document).ready(function() {
    var res=document.getElementById('dirId').value;
    if (res=='true') 
{
    jQuery("#carousel").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  loop: true,
  margin: 10,
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: true,
   rtl:true,
  navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>"
  ],
  dots:false,
  responsive: {
    0: {
      items:1
    },

    600: {
      items: 2
    },

    1024: {
      items: 4,
      nav:true  
    },

    1366: {
      items: 4,
      nav:true
    }
  }
});
  }else{
jQuery("#carousel").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  loop: true,
  margin: 10,
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: true,
   rtl:false,
  navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>"
  ],
  dots:false,
  responsive: {
    0: {
      items:1
    },

    600: {
      items: 2
    },

    1024: {
      items: 4,
      nav:true  
    },

    1366: {
      items: 4,
      nav:true
    }
  }
});
}
});

jQuery(document).ready(function() {
 var res=document.getElementById('dirId').value;
    if (res=='true') 
{
    jQuery(".owl-carousel ").owlCarousel({
  
   rtl:true,

});
  }else{
jQuery(".owl-carousel ").owlCarousel({
 
   rtl: false,
  
  
});
}
});

