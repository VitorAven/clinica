$(document).ready(function() {
  $(".ajax").colorbox();
  $("#banner_home").owlCarousel({
 
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      
      paginationSpeed : 400,
      singleItem:true,
      autoPlay:true,
      navigationText : ["<",">"],
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      itemsMobile : false
 
  });

  $("#noticias_home").owlCarousel({
      pagination : true,   
      autoPlay:true,
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      
      paginationSpeed : 400,
      singleItem:false,
      navigationText : ["<<",">>"],
 
      // "singleItem:true" is a shortcut for:
       items : 4
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      //itemsMobile : false
 
  });
 
});