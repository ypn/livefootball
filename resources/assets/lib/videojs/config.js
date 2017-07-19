$(document).ready(function(){
  var player = videojs('livehd-video-player',{
    controlBar:{
      fullscreenToggle  :false
    }
  });
  player.src({
    src:"http://localhost:8092/hls/stream.m3u8",
    type:'application/x-mpegURL'
  });

  player.on('error', function(e) {
    e.stopImmediatePropagation();
    var error = this.player().error();
    console.log('hahah error!', error.code, error.type , error.message);
  });

  player.errors();


  player.play();
  player.dvrseekbar();



  var Button = videojs.getComponent('Button');
  var toggleFullScreen = videojs.extend(Button, {
     constructor: function() {
       Button.apply(this, arguments);
       this.addClass('vjs-icon-fullscreen-enter');
       this.addClass('custom-alert-fullscreen');
       this.controlText('FullScreen');
     },
     handleClick: function() {

      if(!$('.content-wrapper').find('.popup').length){


        var popup_content = $('<div>')
        .append($('<p>').text('Tính năng này chỉ dành cho thành viên, hãy đăng nhập để có trải nghiệm tốt nhất về dịch vụ của chúng tôi!'))
        .append(
          $('<a>')
          .addClass('loginBtn loginBtn--facebook').text('Login with facebook')
          .attr('href','<?php echo $fb_url; ?>')
          .css('display','inline-block')
        );

        var popup = $('<div>').addClass('popup').attr('data-popup','popup-1').html(
          $('<div>').addClass('popup-inner').append(
            $('<a>').addClass('popup-close').attr('data-popup-close','popup-1').attr('href','javascript:void(0);').text('x')
          ).append(popup_content)
        );

        $('.content-wrapper').append(popup);

        $('.popup').fadeIn(200);

        $('[data-popup-close]').on('click', function(e)  {
            var targeted_popup_class = jQuery(this).attr('data-popup-close');
            $('[data-popup="' + targeted_popup_class + '"]').fadeOut(200);
            $('.popup').remove();
            e.preventDefault();
        });
      }

     }
  });
  videojs.registerComponent('toggleFullScreen', toggleFullScreen);

 player.getChild('controlBar').addChild('toggleFullScreen', {});

  //Collapse left side bar
  (function($){
      $('#nav-icon4').click(function(){
        $('.content-wrapper').toggleClass('collapse-left-bar');
        $(this).toggleClass('open');

      });
    })(jQuery);

    //Blur background
    $(function() {
    // Change this value to adjust the amount of blur
    var BLUR_RADIUS = 100;

    var canvas = document.querySelector('[data-canvas]');
    var canvasContext = canvas.getContext('2d');

    var image = new Image();
    image.src = document.querySelector('[data-canvas-image]').src;

    var drawBlur = function() {
      var w = canvas.width;
      var h = canvas.height;
      canvasContext.drawImage(image, 0, 0, w, h);
      stackBlurCanvasRGBA('heroCanvas', 0, 0, w, h, BLUR_RADIUS);
    };

    image.onload = function() {
      drawBlur();
    }
  });


  $(function() {
    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(200);

        e.preventDefault();
    });
  });

});
