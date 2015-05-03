$(function () {
      // Makes the demo video appear/disappear 
      var $demo = $("#demo");
      $('#demo').on('hidden.bs.modal', function () {
      $demo.find("iframe").remove();
      })
      $('#demo').on('show.bs.modal', function () {
        if (!$demo.find("iframe").length) {
          $demo.find(".modal-body").append("<iframe src='http://player.vimeo.com/video/22439234' width='650' height='370' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>")
        }     
      });

      // triggers the off-canvas panel
      $(".sidebar-toggle").click(function (e) {
        e.stopPropagation();
        $(".st-container").toggleClass("nav-effect");
      });
      $(".st-pusher").click(function () {
        $(".st-container").removeClass("nav-effect");
      });

       // parallax header
       $('#cover-image').css("background-position", "50% 50%");
      $(window).scroll(function() {
        var scroll = $(window).scrollTop(), 
          slowScroll = scroll/4,
          slowBg = 50 - slowScroll;
          
        $('#cover-image').css("background-position", "50% " + slowBg + "%");
      });
    });