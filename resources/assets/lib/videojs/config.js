$(document).ready(function(){
  // var player = videojs('livehd-video-player',{
  //   controlBar:{
  //     fullscreenToggle  :false
  //   }
  // });

  // videojs.Hls.xhr.beforeRequest = function(options) {
  //
  //   options.headers = {
  //     'Origin':'https://fptplay.net',
  //     'Referer':'https://fptplay.net/livetv'
  //   }
  //       return options;
  // };


  var player = videojs('livehd-video-player');

  player.src({
    src:'http://35.198.242.165:8080/hls/stream.m3u8',
    type:'application/x-mpegURL'
  });
  player.errors({
    errors: {
      2: {
        headline: 'Stream offline.',
        message: 'Super Long đã đi giải cứu thế giới rồi, cảm ơn đã các bạn đã xem trận đấu. Super Long sẽ quay lại với các bạn trong trận đấu tới. Yêu bạn <3.'
      },
      4:{
        headline: 'Stream offline.',
        message: 'Super Long đã đi giải cứu thế giới rồi, cảm ơn đã các bạn đã xem trận đấu. Super Long sẽ quay lại với các bạn trong trận đấu tới. Yêu bạn <3.'
      }
    }
  });

  player.play();


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

  $(function() {
    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(200);

        e.preventDefault();
    });
  });

});
