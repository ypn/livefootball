@extends('front_master')
@section('style')
<link rel="stylesheet" href="/css/starter.css">
<style>
  #b-c-facebook{
    z-index: 99999;
    width: 350px;
    max-width: 100%;
    height: auto;
    overflow: hidden;
    position: fixed;
    right: 0;
    bottom: 0;
    padding: 0 10px;

  }

  #chat-f-b{
    float: left;
    padding: 0 25px;
    padding-left: 15px;
    width: 100%;
    color: #fff;
    height: 38px;
    line-height: 38px;
    background-color: #3a5897;
    border: 0;
    z-index: 9999999;
    margin-right: 12px;
    cursor: pointer;
    font-size: 16px;
    text-shadow: 0 1px 0 rgba(0,0,0,.1);
    background-repeat: repeat-x;
    background-size: auto;
    background-position: 0 0;
    text-decoration: none;
    cursor: pointer;
    border-top-left-radius: 2px;
    border-top-right-radius: 2px;
  }
  #t_f_chat{
    float: left;
    position: absolute;
    right: 25px;
    top: 0;
  }

  #chat_f_close{
    color: #fff;
    font-size: 17px;
    font-family: verdana;
    text-decoration: none;
    opacity: 0.5;
    outline: 0;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
  }

  #f-chat-content{
    float: left;
    width: 100%;
    overflow: hidden;
    display: none;
    background-color: #fff;
    position: relative;
  }

  #f-chat-content.show{
    display: block!important;
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
