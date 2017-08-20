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
    <meta property="og:url"                content="{{Request::url()}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="[Trực tiếp] {{$match->name}}" />
    <meta property="og:description"        content="Livestream bóng đá HD, K+ online. Thưởng thức các trận cậu đỉnh cao dễ dàng bằng công nghệ livestream hàng đầu Việt Nam với chất lượng hình ảnh tốt nhất, tương tác trực tiếp với bình luận viên và hàng ngàn khán giả khác. Duy nhất tại bongdatv.online" />
    <meta property="og:image" content="{{ $match->fb_share_image!=null ? $match->fb_share_image : (URL::to('/images/fb_share.jpg'))}}" />
    <meta property ="fb:app_id" content="1812749958752149"/>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @if($match->status==1)
    <link rel="stylesheet" href="/js/lib/ainokishi.css">
    @else
    <link rel="stylesheet" href="/js/lib/flipclock/flipclock.css">
    @endif
    <link rel="stylesheet" href="/css/master.css">
    <style media="screen">
      .show-match{
        width:100%;
        min-height:60vh;
        background:-webkit-radial-gradient(rgba(80,0,0,0.1) 0%,
    					rgba(80,0,0,0.2) 30%, rgba(21,11,1,0.9) 100% ),
    		    		url('https://subtlepatterns.com/patterns/wood_pattern.png');
        text-align:center;
      }

      .show-match-info{
        margin-top:25px;
      }
      .show-match-info .club{
        width:50%;
        float:left;
      }

      .show-match-info .club img{
        width:8em;
        height:8em;
      }

      @import url(https://fonts.googleapis.com/css?family=Patua+One);

    #ribbon {
    		padding: .34em .5em;
    		margin: 0;
    		margin-top: 2%;
    		position:relative;
    		color: #ffffff;
    		font: 32px 'Patua One', sans-serif;
    		text-align: center;
    		letter-spacing:0.1em;
    		text-shadow: 0px -1px 0px rgba(0,0,0,0.3);
    		box-shadow: inset 0px 1px 0px rgba(255,255,255,.3),
    		inset   0px 0px 20px rgba(0,0,0,0.1),
    			      0px 1px 1px rgba(0,0,0,0.4);
    		background: -webkit-linear-gradient(top,#1eb2df, #17a7d2);
        display: inline-block;
    	}

    #ribbon:before, #ribbon:after {
    		content: "";
    		width:.2em;
    		bottom:-.5em;
    		position:absolute;
    		display:block;
    		border: .9em solid #1eb2df;
    		box-shadow:0px 1px 0px rgba(0,0,0,0.4);
    		z-index:0;
    	}

    #ribbon:before {
    		left:-1.19em;
    		border-right-width: .75em;
    		border-left-color:transparent;
    	}

    #ribbon:after {
    		right:-1.19em;
    		border-left-width: .75em;
    		border-right-color:transparent;
    	}
    #content{
      z-index:3;
    }

    #content:before, #content:after {
    		content:"";
    		bottom:-.5em;
    		position:absolute;
    		display:block;
    		border-style:solid;
    		border-color: #0675b3 transparent transparent transparent;
    		z-index:1;
    	}

    #content:before {
    	  left: 0;
    	  border-width: .5em 0 0 .5em;
    	}

    #content:after {
    	  right: 0;
    	  border-width: .5em .5em 0 0;
  	}

    @media(min-width:1200px){
    }
    @media(min-width:768px){}
    @media(min-width:992px){
      #wrapper.toggle .m-nav-bar .left-bar-link span{
        display: none;
      }

      #wrapper .m-nav-bar .left-bar-link span{
        transition: all 0.3s ease;
      }

      #wrapper.toggle .m-nav-bar .left-bar-link li{
        padding: 10px 7px;
      }

      #wrapper.toggle .m-nav-bar .left-bar-link .fa{
        font-size: 24px;
      }

      #wrapper.toggle .m-nav-bar .left-bar-link a:hover{
        padding: 10px 0px;
      }
      #chat-frame{
        height:100vh;
      }
      #chat-frame iframe{
        height:99%;
      }
    }

    @media(max-width:992px){
      #chat-frame{
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 9;
        height:60px;
        transition: all 0.3s ease;
        border-top: 2px solid red;
      }

      ._fftx{
        margin-bottom: 60px;
      }

      #chat-frame iframe{
        height:100%;
      }

      #chat-frame.change-height{
        height: 450px;
        max-height: 100vh;
      }

        #chat-frame #tg{
          transition: all 0.3s ease;
        }

      #chat-frame.change-height #tg{
        -ms-transform: rotate(180deg); /* IE 9 */
        -webkit-transform: rotate(180deg); /* Chrome, Safari, Opera */
        transform: rotate(180deg);
      }

      #primary-content{
        margin-left: 50px;
      }
    }

    .m-nav-bar .left-bar-link{
      margin: 0;padding: 0;
      list-style: none;
    }

    .m-nav-bar .left-bar-link li {
      padding: 10px 15px;
      transition: all 0.3s ease;
    }

    .m-nav-bar .left-bar-link a{
      color: #fff;
    }

    .m-nav-bar .left-bar-link a:hover{
      transition: all 0.3s ease;
      text-decoration: none;
      padding-left: 10px;
    }


    .m-nav-bar .left-bar-link .fa{
      font-size: 20px;
      margin-right: 10px;
      transition: all 0.3s ease;
    }

    </style>
  </head>
  <body>
    <div class="col-md-12 no-gutters" id="wrapper">
    	<div class="col-md-2 m-nav-bar">
    		<div class="col-md-12">
    			<div class="box red">
            <div id="nav-icon4" class="humburger-button open">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <span class="clearfix"></span>
            <ul class="left-bar-link">
              <li><a href="/"><i class="fa fa-home" aria-hidden="true"></i> <span>Trang chủ</span></a></li>
              <li><a href="/starter"><i class="fa fa-calendar-check-o" aria-hidden="true"></i><span>Lịch trực tiếp</span></a></li>
            </ul>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-10 m-content">
    		<div class="col-md-12">
    			<div class="col-md-9">
            <div class="green" style="background:#e9ebee;">
      				<div class="g-content">
                <div>
                  @if($match->status==1)
                  <video
                  style="border:1px solid #000;"
                  id="livehd-video-player"
                  class="video-js vjs-big-play-centered vjs-16-9 custom-player"
                  poster="{{URL::to('/images/poster.jpg')}}"
                  controls preload="auto"
                  ></video>
                  @else
                  <div class="show-match">
                    <div id="ribbon">
                  		<span id="content">{{$match->leaguage_name}}</span>
                  	</div>

                    <div class="show-match-info">
                      <div class="club home">
                        <img src="{{$match->team_1_logo}}" alt="">
                        <h4>{{$match->team_1_name}}</h4>
                      </div>
                      <div class="club guest">
                          <img src="{{$match->team_2_logo}}" alt="">
                          <h4>{{$match->team_2_name}}</h4>
                      </div>
                    </div>

                    <div class="count-down">
                      <div class="clock" style="margin:2em;"></div>
                    </div>
                  </div>
                  @endif
                  <div style="margin-right:15px;">
                    <div style="border-bottom:1px solid #ccc;margin-right:-15px;padding-left:15px;">
                      <div>
                        <h4>{{$match->name}}</h4>
                        <script src="https://apis.google.com/js/platform.js"></script>
                        <div class="g-ytsubscribe" data-channelid="UCgPI5EQUOhWHd54b7lZTCsg" data-layout="full" data-count="default"></div>
                      </div>
                      <div style="margin-top:-30px;">
                        <div style="padding:5px;text-align:right;margin-right:30px;">
                          <div class="fb-like" data-href="{{Request::url() }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                          <div class="fb-share-button" data-href="{{Request::url() }}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="<?php echo ('https://www.facebook.com/sharer/sharer.php?u=' . urlencode(Request::url()) . '&amp;src=sdkpreparse'); ?>">Chia sẻ</a></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="_fftx" style="padding:15px;">
                        <div class="col-md-6 col-sm-6 col-xs-12" style="padding-right:15px;">
                          <div class="fb-page" data-href="https://www.facebook.com/bongdatv.online/" data-tabs="timeline" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/bongdatv.online/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bongdatv.online/">Bongdatv Online</a></blockquote></div>
                        </div>
                        <div class="col-md-6 col-sm-6  col-xs-12">
                          <!-- <p style="font-size:0.8em;padding-l">
                            Hãy <b><u> đăng kí kênh Youtube</u> </b> và <b> <u>like fanpage</u> </b> để nhận được thông báo nhanh chóng về thời gian phát tất cả các trận bóng đỉnh cao tại <a href="/">http://bongdatv.online</a>
                          </p> -->
                          <div class="fb-page" data-href="https://www.facebook.com/DongChayTV/" data-tabs="timeline" data-height="70" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/DongChayTV/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/DongChayTV/">Dòng Chảy TV</a></blockquote></div>
                        </div>
                        <span class="clearfix"></span>
                      </div>
                    </div>
                  </div>
                </div>
      				</div>
            </div>
    			</div>
    			<div id="chat-frame" class="col-md-3">
              <a id="tg" href="javascript:void(0);" class="hidden-md hidden-lg" style="position:absolute;font-size7px; top:-20px;left:25px;"><i class="glyphicon glyphicon-chevron-up" style="padding:10px;border-radius:50%;background:#3097D1;color:#fff;"></i></a>
    				  <!-- <iframe src="https://www.youtube.com/live_chat?v={{$video_id}}&embed_domain=bongdatv.online" width="100%" frameBorder="0"></iframe> -->
              <div id="wechat"></div>
    			</div>
    		</div>
    	</div>
    </div>
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/plugins/chat-master.js"></script>
    @if($match->status == 1)
    <script src="/js/lib/ainokishi.js?v=1"></script>
    @else
    <script src="/js/lib/flipclock/flipclock.js"></script>
    <script type="text/javascript">
    var clock;

    $(document).ready(function() {
      var clock;
      clock = $('.clock').FlipClock({
            clockFace: 'DailyCounter',
            autoStart: false,
            language:'vn',
            callbacks: {
              stop: function() {
                $('.message').html('The clock has stopped!')
              }
            }
        });

        clock.setTime(<?php echo $match->time_count; ?>);
        clock.setCountdown(true);
        clock.start();
    });
    </script>
    @endif
    <script type="text/javascript">
      $('#nav-icon4').click(function(){
        $('#wrapper').toggleClass('toggle');
        $(this).toggleClass('open');
      });

      $('#tg').on('click',function(){
        $('#chat-frame').toggleClass('change-height');
      });

      (function($) {
          var $window = $(window),
              $html = $('#wrapper');

          function resize() {
              if ($window.width() < 992) {
                $html.removeClass('toggle');
                $('#nav-icon4').removeClass('open');
              }else{
                  $('#nav-icon4').addClass('open');
              }

          }

          $window
              .resize(resize)
              .trigger('resize');
      })(jQuery);

        // setInterval(function() {
        //   console.clear();
        //   console.log("%cPlease leave me alone!", "font: 5em roboto; color: yellow; background-color: red;");
        //   console.log('If you want to get something from my website, feel free to contact me via:');
        //   console.log('Email:ypnwebdev@gmail.com');
        //   console.log('Skype:ypn_skype');
        //   console.log('Thank for you consideration! Love you <3');
        //   console.log('-----------------------------------------');
        //
        //
        //   console.log("/$$   /$$  /$$$$$$  /$$$$$$$ ");
        //   console.log("| $$  | $$ /$$__  $$| $$__  $$");
        //   console.log("| $$  | $$| $$  \ $$| $$  \ $$");
        //   console.log("| $$  | $$| $$  | $$| $$  | $$")
        //   console.log("|  $$$$$$$| $$$$$$$/| $$  | $$");
        //   console.log("\____  $$| $$____/ |__/  |__/");
        //   console.log("/$$  | $$| $$");
        //   console.log("|  $$$$$$/| $$");
        //   console.log("\______/ |__/");
        //
        //   debugger;
        // }, 10);

    </script>
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
    <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>
