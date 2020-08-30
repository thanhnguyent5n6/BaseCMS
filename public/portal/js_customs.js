// Action category products left menu
$(document).ready(function(){
    $('.v2_bnc_category_heading').on('click', function(){
        $('.v2_bnc_category_menu_list').slideToggle(300);
    });
    $('.v2_bnc_icon_filter').on('click', function(){
        $('.v2_bnc_products_filter_page').slideToggle(300);
    });
    $('.v2_bnc_cat_block_title.hide').on('click', function(){
        $('.v2_bnc_category_products').slideToggle(300);
    });
    
});
// End Action category products left menu

// Menu mobile
$(document).ready(function() {
    var removeClass = true;
    $menuLeft = $('.pushmenu-left');
    $nav_list = $('.button_menu_mobile');
    
    $nav_list.click(function(e) {
        $(this).toggleClass('active');
        $('body').toggleClass('pushmenu-push-toright');
        $menuLeft.toggleClass('pushmenu-open');
        removeClass = false;
    });
    $('html').click(function () {
        if (removeClass) {
            $('body').removeClass('pushmenu-push-toright');
            $('.pushmenu-left').removeClass('pushmenu-open');
        }
        removeClass = true;
    });

    $('.navbar-nav').find('.parent').append('<span></span>');

    $('.navbar-nav .parent span').on("click", function() {
        if ($(this).attr('class') == 'opened') {
            $(this).removeClass().parent('.parent').find('ul').slideToggle();
        } else {
            $(this).addClass('opened').parent('.parent').find('ul').slideToggle();
        }
        removeClass = false;
    });
});

// Owl Slideshow
// code tạo biến chống trùng lặp biến bị xung đột với thư viện khác
$(document).ready(function(){
    "use strict";
    $(".owl_news_main").owlCarousel({
        navigation: true,
        items:3,
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,
        //Autoplay
        autoPlay : true,
        itemsCustom:[[480,2],[320,1],[768,2],[767,2],[991,3],[1200,3]],
        responsive:true,
        navigationText: [
            "<a class='flex-prev-slideshow'><i class='fa fa-chevron-left'></i></a>",
            "<a class='flex-next-slideshow'><i class='fa fa-chevron-right'></i></a>"
        ]
    });

    $(".owl_news_new_main").owlCarousel({
        navigation: false,
        items:3,
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,
        //Autoplay
        autoPlay : true,
        itemsCustom:[[480,2],[320,1],[768,2],[767,2],[991,3],[1200,3]],
        responsive:true,
        navigationText: false
    });
    $(".news_new_next").click(function(){
        $(".owl_news_new_main").trigger('owl.next');
    });
    $(".news_new_prev").click(function(){
        $(".owl_news_new_main").trigger('owl.prev');
    });

    $(".owl_video_main").owlCarousel({
        navigation: true,
        items:4,
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,
        //Autoplay
        autoPlay : true,
        itemsCustom:[[480,2],[320,1],[768,2],[767,2],[991,3],[1200,4]],
        responsive:true,
        navigationText: [
            "<a class='flex-prev-slideshow'><i class='fa fa-chevron-left'></i></a>",
            "<a class='flex-next-slideshow'><i class='fa fa-chevron-right'></i></a>"
        ]
    });
    $(".owl_img_product_details").owlCarousel({
        navigation: true,
        items:3,
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,
        //Autoplay
        autoPlay : true,
        itemsCustom:[[480,2],[320,2],[768,4],[767,4],[991,4],[1024,2],[1200,3]],
        responsive:true,
        navigationText: [
            "<a class='flex-prev-slideshow'><i class='fa fa-chevron-left'></i></a>",
            "<a class='flex-next-slideshow'><i class='fa fa-chevron-right'></i></a>"
        ]

    });
    $(".owl-carousel-products").owlCarousel({
        navigation: true,
        items:4,
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,
        pagination:false,
        //Autoplay
        autoPlay : true,
        itemsCustom:[[480,2],[320,1],[768,2],[767,2],[991,2],[1024,3],[1200,4]],
        responsive:true,
    });
    $(".product_next").click(function(){
        $(".owl-carousel-products").trigger('owl.next');
    });
    $(".product_prev").click(function(){
        $(".owl-carousel-products").trigger('owl.prev');
    });

    $(".owl-carousel-products-cate").owlCarousel({
        navigation: true,
        items:3,
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,
        pagination:false,
        //Autoplay
        autoPlay : true,
        itemsCustom:[[480,2],[320,1],[768,2],[767,2],[991,2],[1024,3],[1200,3]],
        responsive:true,
        navigationText: [
            "<a class='flex-prev-slideshow'><i class='fa fa-chevron-left'></i></a>",
            "<a class='flex-next-slideshow'><i class='fa fa-chevron-right'></i></a>"
        ]
    });

    $(".owl-carousel-products-tab-new").owlCarousel({
        navigation: true,
        items:4,
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,
        pagination:false,
        //Autoplay
        autoPlay : true,
        itemsCustom:[[480,2],[320,1],[768,2],[767,2],[991,2],[1024,3],[1200,4]],
        responsive:true,
    });
    $(".product_tab_new_next").click(function(){
        $(".owl-carousel-products-tab-new").trigger('owl.next');
    });
    $(".product_tab_new_prev").click(function(){
        $(".owl-carousel-products-tab-new").trigger('owl.prev');
    });

    $(".owl-carousel-brands").owlCarousel({
        navigation: false,
        items:6,
        slideSpeed : 200,
        paginationSpeed : 200,
        rewindSpeed : 1000,
        //Autoplay
        autoPlay : true,
        itemsCustom:[[480,2],[320,1],[768,3],[767,3],[991,4],[1200,6]],
        responsive:true,
        navigationText: false

    });
    $(".owl_customer_feedback").owlCarousel({
        navigation: true,
        items:3,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [991,2],
        itemsTablet: [767,2],
        itemsMobile : [480,1],
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,
        //Autoplay
        autoPlay : true,
        responsive:true,
        navigationText: [
            "<a class='flex-prev-slideshow'><i class='fa fa-chevron-left'></i></a>",
            "<a class='flex-next-slideshow'><i class='fa fa-chevron-right'></i></a>"
        ]
    });     
    $(".owl_sidebar_slideshow").owlCarousel({
        navigation: true,
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,
        singleItem:true,
        transitionStyle : "goDown",
        //Autoplay
        autoPlay : true,
        responsive:true,
        navigationText:false
    });

    $(".owl_carousel_1_item").owlCarousel({
        navigation: false,
        slideSpeed : 200,
        paginationSpeed : 800,
        rewindSpeed : 1000,
        singleItem:true,
        //Autoplay
        autoPlay : true,
        responsive:true,
        navigationText: false
    });
    $(".owl_carousel_1_item_next").click(function(){
        $(".owl_carousel_1_item").trigger('owl.next');
    });
    $(".owl_carousel_1_item_prev").click(function(){
        $(".owl_carousel_1_item").trigger('owl.prev');
    });
});
// End Owl Slideshow

// Scroll To Top
$(document).ready(function(){
  $(".v2_bnc_icon_scrolltop").click(function(event){
   $('html, body').animate({ scrollTop: 0 }, 1000);
  });
  // Hide,Show ScrollToTop
  var num = 100;  
  $(window).bind('scroll', function () {
      if ($(window).scrollTop() > num) {   
          $('.v2_bnc_scrolltop').addClass('fixed');
      }
      else
      {
          $('.v2_bnc_scrolltop').removeClass('fixed');
      }
  });
  var num = 150;  
  $(window).bind('scroll', function () {
      if ($(window).scrollTop() > num) {   
          $('.v2_bnc_header_under_bottom').addClass('vfixed');
      }
      else
      {
          $('.v2_bnc_header_under_bottom').removeClass('vfixed');
      }
  });
  var num = 300;  
  $(window).bind('scroll', function () {
      if ($(window).scrollTop() > num) {   
          $('.v2_bnc_search_main').addClass('opacity');
      }
      else
      {
          $('.v2_bnc_search_main').removeClass('opacity');
      }
  });
}); 
// End Scroll To Top  

// Accordion
$(document).ready(function(){
    (function($) {
      
        var allPanels = $('.v2_bnc_footer_item > ul').hide();
          
        $('.v2_bnc_footer_item > h4 > a').click(function() {
          allPanels.slideUp();
          $(this).parent().next().slideToggle();
          return false;
        });

    })(jQuery);
});
// End Accordion