@extends('front_master')
@section('style')
<link rel="stylesheet" href="/css/starter.css">
@stop
@section('content')
<!--xNrw8exNLBA-->
<div class="video-background">
  <div class="video-foreground">
    <iframe src="https://www.youtube.com/embed/tO01J-M3g0U?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=tO01J-M3g0U" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
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
