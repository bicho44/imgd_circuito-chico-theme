// @codekit-prepend "transition.js", "carousel.js", "collapse.js", "dropdown.js",
//"modal.js", "vendor/owl.carousel.min.js"

//(function(){
  //  $(".video-programa").fitVids();
//}());

(function(){
    //caches a jQuery object containing the header element
    var navbar = $(".navbar-default");

    $(window).scroll(function() {

        var scroll = $(window).scrollTop();

        if (scroll >= navbar.outerHeight(true)+15) {
            navbar.addClass("slideInDown navbar-fixed-top");
        } else {
            navbar.removeClass("slideInDown navbar-fixed-top");
        }
        
    });
}());


(function(){
  $(window).scroll(function () {
      if ( $(this).scrollTop() > 300 )
          $("#totop").fadeIn();
      else
          $("#totop").fadeOut();
  });

  $("#totop").click(function () {
      $("body,html").animate({ scrollTop: 0 }, 800 );
      return false;
  });
}());
