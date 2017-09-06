@extends('front_master')
@section('style')
<link rel="stylesheet" href="/css/starter.css">
<style>  
  .ribbon{
    background-color: red;
    color: #fff;
    line-height: 20px;
    padding: 5px 20px;
    position: absolute;
    font-weight: bold;
    top: 5px;
    left: 5px;
    animation: twinkling 0.4s linear 2s infinite alternate;
    padding-left: 10px;
    z-index: 20;
  }
  @-webkit-keyframes twinkling{ /*Transparency from 0 to 1*/
    0%{
      opacity:0.6; /*The opacity to 0*/
    }
    100%{
      opacity:1; /*The opacity to 1*/
    }
  }
</style>
@stop
@section('content')
<!--xNrw8exNLBA-->
<div class="video-background">
  <div class="video-foreground">
    <iframe src="https://www.youtube.com/embed/tO01J-M3g0U?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=tO01J-M3g0U" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
</div>
<div id="b-c-facebook" class="chat_f_vt">
  <div id="chat-f-b" class="chat-f-b">
    <span>Chat với bongdatv.online</span>
    <div id="t_f_chat">
      <a title="Close Chat" href="#" id="chat_f_close" class="chat-left-5">
        <img src="http://bongdaf.tv/images/close.png" alt="x" title="Đóng cửa sổ chat">
      </a>
    </div>
  </div>
  <div id="f-chat-content"  class="f-chat-content">
    <div class="fb-page" data-href="https://www.facebook.com/bongdatv.online/" data-tabs="messages" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/bongdatv.online/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bongdatv.online/">Bongdatv Online</a></blockquote></div>
  </div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=496223437090509";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</div>
<div style="width:100%;background:rgba(0,0,0,0)">
  <div id="main" class="container">
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
          @if($m->status ==1)
          <div class="ribbon">
            Đang trực tiếp
          </div>
          @endif
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
@stop
