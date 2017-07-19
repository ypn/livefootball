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
    <link rel="stylesheet" href="js/lib/ainokishi.css">
    <link rel="stylesheet" href="css/master.css">
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
    <script src="js/app.js"></script>
    <img  data-canvas-image src="{{File::get('background.txt')}}">
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
              poster="https://i.ytimg.com/vi/rVj5xe-Kxrc/maxresdefault.jpg"
              src=""
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
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=1812749958752149";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <script src="js/lib/ainokishi.js"></script>
    <script src="js/plugins/chat-master.js"></script>
    <script src='js/plugins/videojs.thumbnails.js'></script>
  </body>
</html>
