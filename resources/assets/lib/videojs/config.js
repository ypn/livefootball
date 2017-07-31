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
    //src:"https://vtbd.vn.data.garena.tv/hls/198245/1296813.m3u8",
    // src:'http://222.255.27.138/hls/4545780bfa790819/13/5/87f3504530d7b75ea9e3fe746b4a6588ef720243da517adc6ba813f456026f07/dnR2Ng==.m3u8',
    src:'http://vndatagarenatv-a.akamaihd.net/hls/198167/1413383.m3u8',
    type:'application/x-mpegURL'
  });
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

  //Collapse left side bar
  (function($){
      $('#nav-icon4').click(function(){
        $('.content-wrapper').toggleClass('collapse-left-bar');
        $(this).toggleClass('open');

      });
  })(jQuery);



  $(function() {
    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(200);

        e.preventDefault();
    });
  });

});
