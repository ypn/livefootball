$(document).ready(function(){
  // var player = videojs('livehd-video-player',{
  //   controlBar:{
  //     fullscreenToggle  :false
  //   }
  // });

  var player = videojs('livehd-video-player');

  player.src({
    //src:"http://45.76.215.91:4000/live/09691a48a044312108120fcb55d0b321/index.m3u8",//thuckhuya.tv
    //src:"http://bongdatv.online:8095/hls/stream.m3u8",
    //src:'http://localhost:8092/hls/stream.m3u8',
    src:" https://vtbd.vn.data.garena.tv/hls/198245/1296813.m3u8",
    type:'application/x-mpegURL'
  });

  player.play();

  player.errors({
    errors: {
      2: {
        headline: 'Trận đấu chưa sẵn sàng.',
        message: 'Có vẻ như bạn tới hơi sớm, vui lòng làm ly trà đá và quay lại với chúng tôi khi trận đấu bắt đầu. Hoặc có thể do lỗi tải trang, hãy nhấn F5 để  tải lại stream. Yêu bạn <3.'
      },
      4:{
        headline: 'Trận đấu chưa sẵn sàng.',
        message: 'Có vẻ như bạn tới hơi sớm, vui lòng làm ly trà đá và quay lại với chúng tôi khi trận đấu bắt đầu. Hoặc có thể do lỗi tải trang, hãy nhấn F5 để  tải lại stream. Yêu bạn <3.'
      }
    }
  });

  // player.dvrseekbar();



 //  var Button = videojs.getComponent('Button');
 //  var toggleFullScreen = videojs.extend(Button, {
 //     constructor: function() {
 //       Button.apply(this, arguments);
 //       this.addClass('vjs-icon-fullscreen-enter');
 //       this.addClass('custom-alert-fullscreen');
 //       this.controlText('FullScreen');
 //     },
 //     handleClick: function() {
 //      $('.popup').fadeIn(200);//this pop up is render in footer component of chat div.
 //      $('[data-popup-close]').on('click', function(e)  {
 //          var targeted_popup_class = jQuery(this).attr('data-popup-close');
 //          $('[data-popup="' + targeted_popup_class + '"]').fadeOut(200);
 //          e.preventDefault();
 //      });
 //     }
 //  });
 //  videojs.registerComponent('toggleFullScreen', toggleFullScreen);
 //
 // player.getChild('controlBar').addChild('toggleFullScreen', {});

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
