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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:url"                content="http://bongdatv.online/" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Trực tiếp Barca - Real ICC cup 2017" />
    <meta property="og:description"        content="Trực tiếp bóng đá HD, K+ online. Thưởng thức các trận cậu đỉnh cao dễ dàng với chất lượng hình ảnh tốt nhất." />
    <meta property="og:video" content="http://bongdatv.online:8095/hls/stream.m3u8" />
    <meta property="og:video:type" content="application/x-mpegURL" />
    <meta property="width" content="300" />
    <meta property="height" content="200" />
    <meta property="og:image" content="{{URL::to('/images/real-barca.jpg')}}">
    <meta property ="fb:app_id" content="1812749958752149"/>
    <title>Trực tiếp bóng đá HD</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="js/lib/ainokishi.css">
    <link rel="stylesheet" href="css/master.css">
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript">
    var FB_URL ='<?php echo $fb_url; ?>';
    </script>
    <img  data-canvas-image src="{{File::get('background.txt')}}">
  </head>
  <body>
    <canvas class="hero__background" data-canvas id="heroCanvas" style="width:100%;height:100vh;"></canvas>
    <div class="row no-gutters content-wrapper" style="position:relative;z-index:2">
      <div class="row col-lg-9 col-md-9  col-sm-12 col-xs-12 no-gutters jj">
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
              <nav></nav>
              <video
              style="border:1px solid #000;"
              id="livehd-video-player"
              class="video-js vjs-big-play-centered vjs-16-9 custom-player"
              poster="{{URL::to('/images/vs')}}"
              controls preload="auto"></video>
            </div>
          </div>

      </div>

      <div class="col-lg 3 col-md-3 hidden-sm hidden-xs" id="content-right">
        <div class="box red"  style="color:#fff;">
          <div id="wechat"/>
        </div>
      </div>
      <div id="desktopTest" class="hiden-sm hidden-xs"></div>
    </div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=1812749958752149";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-102881492-1', 'auto');
    ga('send', 'pageview');
    </script>
    <script src="js/lib/ainokishi.js"></script>
    <script src="js/plugins/chat-master.js"></script>
    <script type="text/javascript">
      if($('#desktopTest').is(':hidden')){
        $('#content-right').remove();
        $('#content-center .box').append($('<div>').attr('id','wechat'));
      }
    </script>
  </body>
</html>
