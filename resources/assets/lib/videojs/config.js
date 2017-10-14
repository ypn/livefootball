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

  var _sv = $('#_sv').val();

  var player = videojs('livehd-video-player');

  player.watermark({
    file: '/logo.png',
    xpos: 100,
    ypos: 0,
    xrepeat: 0,
    opacity: 0.8
    });

  player.errors({
    errors: {
      2: {
        headline: 'Stream offline.',
        message: 'Cảm ơn đã các bạn đã xem trận đấu. Chúng sẽ quay lại với các bạn trong trận đấu tới. Yêu bạn <3.'
      },
      4:{
        headline: 'Stream offline.',
        message: 'Cảm ơn đã các bạn đã xem trận đấu. Chúng sẽ quay lại với các bạn trong trận đấu tới. Yêu bạn <3.'
      }
    }
  });

  $.ajax({
    url: window.location.origin + '/servers/' + _sv,
    method:'GET',
    success:function(data){
      data = $.parseJSON(data);
      player.src({
        src: data.server_url,
        type:'application/x-mpegURL'
      });
      player.play();

       var Button = videojs.getComponent('Button');
       var toggleFullScreen = videojs.extend(Button, {
          constructor: function() {
            Button.apply(this, arguments);
            this.addClass('vjs-mute-control');
            this.addClass('vjs-vol-0');
            this.addClass('custom-toggle-sound');
            this.controlText('Turn on sound');
          },
          handleClick:function(){
            var isVolumeMuted = player.muted();
            if (isVolumeMuted) {
                player.muted(false);
                $('.custom-toggle-sound').css('display','none');
            }
          }
       });
       videojs.registerComponent('toggleFullScreen', toggleFullScreen);


       player.addChild('toggleFullScreen', {});


       $('.vjs-mute-control').on('click',function(){
         var isVolumeMuted = player.muted();
         if (isVolumeMuted) {
            $('.custom-toggle-sound').css('display','none');
         }else{
            $('.custom-toggle-sound').css('display','block');
         }
       });

       $('._cl').on('click',function(){
         var isVolumeMuted = player.muted();
         if (isVolumeMuted) {
            player.muted(false);
            $('.custom-toggle-sound').css('display','none');
            $(this).parents('.alert.alert-danger').remove();
         }
       });
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

  $(function() {
    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(200);

        e.preventDefault();
    });
  });

});
