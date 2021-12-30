jQuery(window).on("elementor/frontend/init", function () {
  //hook name is 'frontend/element_ready/{widget-name}.{skin} - i dont know how skins work yet, so for now presume it will
  //always be 'default', so for example 'frontend/element_ready/slick-slider.default'
  //$scope is a jquery wrapped parent element
  elementorFrontend.hooks.addAction(
    "frontend/element_ready/Hotels.default",
    function ($scope, $) {
      const swiper = new Swiper(".obpress-hotels-swiper .swiper-container", {
        // Optional parameters
        direction: "horizontal",
        slidesPerView: 2,
        slidesPerColumn: 3,
        slidesPerColumnFill: "column",
        // slidesPerGroup: 3,
        spaceBetween: 9,

        // If we need pagination
        pagination: {
          el: ".obpress-hotel-widget-gallery .swiper-pagination",
        },
    
        // Navigation arrows
        navigation: {
          nextEl: ".obpress-hotel-widget-gallery .swiper-button-next",
          prevEl: ".obpress-hotel-widget-gallery .swiper-button-prev",
        },
      });
    
      jQuery('.obpress-swiper-overlay').first().addClass('obpress-overlay-selected');
    
      jQuery(document).on("click", ".obpress-hotels-swiper-slide", function () {
        var hotelName = jQuery(this).attr("data-hotel-name");
        var hotelDesc = jQuery(this).attr("data-hotel-description");
        var hotelId = jQuery(this).attr("data-hotel-id");
    
        hotelDesc = hotelDesc.substring(0, 230) + "...";

        jQuery(".obpress-hotels-widget-info").find("h3").text(hotelName);
        jQuery(".obpress-hotels-widget-info").find("p").text(hotelDesc);
        jQuery(".obpress-hotels-widget-info").find(".obpress-hotels-widget-button").attr("href", "/hotel-results?q=" + hotelId );
    
        jQuery(this).find('.obpress-swiper-overlay').addClass('obpress-overlay-selected');
    
        jQuery('.obpress-hotels-swiper-slide').not(this).each(function(){
            jQuery(this).find('.obpress-swiper-overlay').removeClass('obpress-overlay-selected');
        });
    
      });
    
      jQuery(".obpress-hotels-swiper-slide")
        .on("mouseenter", function () {
    
            jQuery(this).find('.obpress-swiper-overlay').css('opacity', '0');
    
            jQuery('.obpress-hotels-swiper-slide').not(this).each(function(){
                jQuery(this).find('.obpress-swiper-overlay').css('opacity', '1');
            });
    
            if(jQuery(this).find('.obpress-swiper-overlay').hasClass('obpress-overlay-selected') == false) {
                jQuery('.obpress-overlay-selected').css('opacity', '1');
            }
        })
        .on("mouseleave", function () {
    
            jQuery(this).find('.obpress-swiper-overlay').css('opacity', '1');
    
            jQuery('.obpress-overlay-selected').css('opacity', '0');
        });
    }
  );
});