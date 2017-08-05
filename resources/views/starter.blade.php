<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/starter.css">
  </head>
  <body>
    <div class="float-nav" style="z-index:9;">
      <a href="#" class="menu-btn">
        <ul>
          <li class="line"></li>
          <li class="line"></li>
          <li class="line"></li>
        </ul>
        <div class="menu-txt"></div>
      </a>
    </div>

    <div class="main-nav">
      <ul>
        <li><a href="#">Degree Programs</a></li>
        <li><a href="#">Admissions</a></li>
        <li><a href="#">Alumni & Friends</a></li>
        <li><a href="#">Campus Community</a></li>
        <li><a href="#">Parents</a></li>
        <li><a href="#">Account Login</a></li>
      </ul>
    </div>

    <!--xNrw8exNLBA-->
    <div class="video-background">
      <div class="video-foreground">
        <iframe src="https://www.youtube.com/embed/pRpeEdMmmQ0?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=pRpeEdMmmQ0" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>

    <div style="width:100%;min-height:100vh;background:rgba(0,0,0,0.3);">
      <div id="main" class="container">
        <div class="col-md-12">
            <h3 class="h-title">Lịch tường thuật trực tiếp</h3>
        </div>
        @foreach($matchs as $m)
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a class="link" href="/tructiep/{{$m->alias}}">
            <div class="live-item <?php
              switch($m->leaguage_id){
                case 1:
                  echo 'champion-leaguage';
                  break;
                case 2:
                  echo 'premier-leaguage';
                  break;
                case 3:
                  echo 'laliga';
                  break;
                case 4:
                  echo 'uafa-super-cup';
                  break;
                case 5:
                  echo 'supercup-england';
                  break;
                default:
                  echo 'default';
              }
            ?>">
              <div class="logo">
                <img src="{{$m->team_1_logo}}" class="first-logo"/>
                <img src="{{$m->team_2_logo}}" class="second-logo"/>
              </div>
              <div class="info">
                <div class="time">
                  <span class="day">{{$m->day_start}}</span>
                  <span class="hour">{{$m->time_start}}</span>
                </div>
                <div class="team">
                  {{$m->team_1_name}} - {{$m->team_2_name}}
                </div>
                <div class="leage">
                  {{$m->leaguage_name}}
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
    <script src="js/app.js"></script>
    <script type="text/javascript">
    $('.float-nav').click(function() {
      $('.main-nav, .menu-btn').toggleClass('active');
    });
    </script>
  </body>
</html>
