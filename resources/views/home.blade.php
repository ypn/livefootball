<!--
$$$$$$$\  $$\                                           $$\   $$\ $$\                             $$\     $$\
$$  __$$\ $$ |                                          $$$\  $$ |$$ |                            \$$\   $$  |
$$ |  $$ |$$$$$$$\   $$$$$$\  $$$$$$\$$$$\              $$$$\ $$ |$$$$$$$\  $$\   $$\              \$$\ $$  /
$$$$$$$  |$$  __$$\  \____$$\ $$  _$$  _$$\             $$ $$\$$ |$$  __$$\ $$ |  $$ |              \$$$$  /
$$  ____/ $$ |  $$ | $$$$$$$ |$$ / $$ / $$ |            $$ \$$$$ |$$ |  $$ |$$ |  $$ |               \$$  /
$$ |      $$ |  $$ |$$  __$$ |$$ | $$ | $$ |            $$ |\$$$ |$$ |  $$ |$$ |  $$ |                $$ |
$$ |      $$ |  $$ |\$$$$$$$ |$$ | $$ | $$ |            $$ | \$$ |$$ |  $$ |\$$$$$$  |                $$ |
\__|      \__|  \__| \_______|\__| \__| \__|            \__|  \__|\__|  \__| \______/                 \__|

What are you looking for? Feel free to contact me directly.
❤ email: nhuyphambkhn@gmail.com
❤ faebook:https://www.facebook.com/menh.thien.1
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Trực tiếp bóng đá HD</title>
    <link rel="stylesheet" href="css/app.css">
    <link href="http://vjs.zencdn.net/6.2.0/video-js.css" rel="stylesheet">
    <link rel="stylesheet" href="http://blogphim.com/cdn/assets/video-js/skins/custom.css">
    <!-- <link href="js/plugins/videojs.thumbnails.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="http://ypn.tv/modules/user/videojs/videojs-dvrseekbar.css">
    <link rel="stylesheet" href="css/master.css">
    <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
    <script src="js/app.js"></script>
    <img  data-canvas-image src="{{File::get('background.txt')}}">

    <style media="screen">
      .video-js .vjs-big-play-button{
        display: block;
        opacity: 0;
        transform: scale(0, 0);
        -webkit-transition: .2s ease-in-out;
        -moz-transition: .2s ease-in-out;
        -o-transition: .2s ease-in-out;
        transition: .2s ease-in-out;
        border: none;
        background: rgba(0,0,0,0.0);
        font-size:7em;
      }

      .video-js:hover .vjs-big-play-button, .video-js .vjs-big-play-button:focus{
        border:none;
        background: rgba(0,0,0,0.0);
      }

      .vjs-paused.vjs-has-started .vjs-big-play-button {
        opacity: 0.7;
        transform:scale(1.2, 1.2);
        -webkit-transition: .2s ease-in-out;
        -moz-transition: .2s ease-in-out;
        -o-transition: .2s ease-in-out;
        transition: .2s ease-in-out;
      }


      /* Outer */
.popup {
    width:100%;
    height:100%;
    display:none;
    position:fixed;
    top:0px;
    left:0px;
    background:rgba(0,0,0,0.75);
}

/* Inner */
.popup-inner {
    max-width:700px;
    width:90%;
    padding:15px;
    position:absolute;
    top:50%;
    left:50%;
    -webkit-transform:translate(-50%, -50%);
    transform:translate(-50%, -50%);
    box-shadow:0px 2px 6px rgba(0,0,0,1);
    border-radius:3px;
    background:#fff;
}

/* Close Button */
.popup-close {
    width:30px;
    height:30px;
    padding-top:4px;
    display:inline-block;
    position:absolute;
    top:0px;
    right:0px;
    transition:ease 0.25s all;
    -webkit-transform:translate(50%, -50%);
    transform:translate(50%, -50%);
    border-radius:1000px;
    background:rgba(0,0,0,0.8);
    font-family:Arial, Sans-Serif;
    font-size:20px;
    text-align:center;
    line-height:100%;
    color:#fff;
}

.popup-close:hover {
    -webkit-transform:translate(50%, -50%) rotate(180deg);
    transform:translate(50%, -50%) rotate(180deg);
    background:rgba(0,0,0,1);
    text-decoration:none;
}


/* Outer */
.popup {
    background:rgba(0,0,0,0.75);
}

/* Inner */
.popup-inner {
    position:absolute;
    top:30%;
    left:50%;
    -webkit-transform:translate(-50%, -50%);
    transform:translate(-50%, -50%);
}

/* Close Button */
.popup-close {
    transition:ease 0.25s all;
    -webkit-transform:translate(-50%, -50%);
    transform:translate(50%, -50%);
}

.popup-close:hover {
    -webkit-transform:translate(50%, -50%) rotate(180deg);
    transform:translate(50%, -50%) rotate(180deg);
    background:rgba(0,0,0,1);
}




    </style>

  </head>
  <body>
    <canvas class="hero__background" data-canvas id="heroCanvas" style="width:100%;height:100vh;"></canvas>
    <div class="row no-gutters content-wrapper" style="position:relative;z-index:2">
      <div class="row col-lg-9 col-md-9  col-sm-12 col-xs-9 no-gutters jj">
          <div id="left-side-bar" class="content-left">
            <div class="box">
              <div id="nav-icon4" class="humburger-button">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
          </div>

          <div id="content-center" class="content-center">
            <div class="box disable-scrollbar" style="overflow-y:auto; color:#fff;">
              <nav>

              </nav>
              <video
              style="border:1px solid #000;"
              id="livehd-video-player"
              class="video-js vjs-big-play-centered vjs-16-9 custom-player"
              controls preload="auto"/>

            </div>
          </div>

      </div>

      <div class="col-lg 3 col-md-3 col-sm-3 col-xs-3" id="content-right">
        <div class="box red"  style="color:#fff;">
          <div id="wechat"/>
        </div>
      </div>

    </div>



    <!-- <div class="popup" data-popup="popup-1">
        <div class="popup-inner">
            <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
        </div>
        42y0-ck21-j1gr-7v19
    </div> -->

    <script src='https://zurb.com/playground/uploads/upload/upload/330/stackblur.min.js'></script>
    <script src="js/plugins/chat-master.js"></script>
    <script src="http://vjs.zencdn.net/6.2.0/video.js"></script>
    <script src="https://unpkg.com/videojs-contrib-hls/dist/videojs-contrib-hls.js"></script>
    <script src="http://ypn.tv/modules/user/videojs/videojs-dvrseekbar.min.js"></script>
    <script src='js/plugins/videojs.thumbnails.js'></script>
    <script>
      $(document).ready(function(){
        var player = videojs('livehd-video-player',{
          controlBar:{
            fullscreenToggle  :false
          }
        });
        player.src({
          src:"http://localhost:8092/hls/stream.m3u8",
          type:'application/x-mpegURL'
        })

        player.on('error', function(e) {
          e.stopImmediatePropagation();
          var error = this.player().error();
          console.log('hahah error!', error.code, error.type , error.message);
        });


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
    </script>
  </body>
</html>
