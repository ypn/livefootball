<!--

$$$$$$$\                                      $$\        $$$$$$$$\ $$\    $$\        $$$$$$\            $$\ $$\
$$  __$$\                                     $$ |       \__$$  __|$$ |   $$ |      $$  __$$\           $$ |\__|
$$ |  $$ | $$$$$$\  $$$$$$$\   $$$$$$\   $$$$$$$ | $$$$$$\  $$ |   $$ |   $$ |      $$ /  $$ |$$$$$$$\  $$ |$$\ $$$$$$$\   $$$$$$\
$$$$$$$\ |$$  __$$\ $$  __$$\ $$  __$$\ $$  __$$ | \____$$\ $$ |   \$$\  $$  |      $$ |  $$ |$$  __$$\ $$ |$$ |$$  __$$\ $$  __$$\
$$  __$$\ $$ /  $$ |$$ |  $$ |$$ /  $$ |$$ /  $$ | $$$$$$$ |$$ |    \$$\$$  /       $$ |  $$ |$$ |  $$ |$$ |$$ |$$ |  $$ |$$$$$$$$ |
$$ |  $$ |$$ |  $$ |$$ |  $$ |$$ |  $$ |$$ |  $$ |$$  __$$ |$$ |     \$$$  /        $$ |  $$ |$$ |  $$ |$$ |$$ |$$ |  $$ |$$   ____|
$$$$$$$  |\$$$$$$  |$$ |  $$ |\$$$$$$$ |\$$$$$$$ |\$$$$$$$ |$$ |      \$  /          $$$$$$  |$$ |  $$ |$$ |$$ |$$ |  $$ |\$$$$$$$\
\_______/  \______/ \__|  \__| \____$$ | \_______| \_______|\__|       \_/           \______/ \__|  \__|\__|\__|\__|  \__| \_______|
                              $$\   $$ |
                              \$$$$$$  |
                               \______/

What are you looking for? Feel free to contact me directly.
❤ email: nhuyphambkhn@gmail.com
❤ faebook:https://www.facebook.com/menh.thien.1
-->

<!DOCTYPE html>
<html>
  <head>
    <title>Trực tiếp bóng đá HD ICC Cup 2017</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:url"                content="http://bongdatv.online/" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="[Trực tiếp] Manchester United vs Barcelona - ICC Cup 2017" />
    <meta property="og:description"        content="Livestream bóng đá HD, K+ online. Thưởng thức các trận cậu đỉnh cao dễ dàng bằng công nghệ livestream hàng đầu Việt Nam với chất lượng hình ảnh tốt nhất, tương tác trực tiếp với bình luận viên và hàng ngàn khán giả khác. Duy nhất tại bongdatv.online" />
    <meta property="og:image" content="{{URL::to('/images/fb_share.jpg')}}" />
    <meta property ="fb:app_id" content="1812749958752149"/>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="js/lib/ainokishi.css">
    <link rel="stylesheet" href="css/master.css">
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
    <script src="js/app.js"></script>
    <input type="hidden" id="fb_url_redirect" value="<?php echo $fb_url; ?>">
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
              poster="{{URL::to('/images/poster.jpg')}}"
              controls preload="auto"></video>
              <div style="padding:5px;text-align:right;">
                <div class="fb-like" data-href="http://bongdatv.online/" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
                <div class="fb-share-button" data-href="http://bongdatv.online/" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fbongdatv.online%2F&amp;src=sdkpreparse">Chia sẻ</a></div>
              </div>
              <div>
                <h4>✔ Like fanpage để cập nhật lịch tường thuật trực tiếp các trận cầu đỉnh cao tại bongdatv.online</h4>
                <h6>✔ Cảm ơn các bạn đã theo đã sử dụng dịch vụ phiên bản thử nghiệm của bongdatv.online. Bản chính thức sẽ có trong tuần tới.</h6>
              </div>
            </div>
          </div>

      </div>

      <div class="col-lg 3 col-md-3 hidden-sm hidden-xs" id="content-right">
        <div class="box red"  style="color:#fff;">
          <div id="wechat" data-authentication = {{Sentinel::check()?"true":"false"}} ></div>
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
