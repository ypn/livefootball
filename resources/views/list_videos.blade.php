@extends('front_master')
@section('title')
<title>Xem lại trận đấu</title>
@stop
@section('style')
<style media="screen">
  .card {
      /* Add shadows to create the "card" effect */
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
  }

  /* On mouse-over, add a deeper shadow */
  .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  }

  .link-item:hover{
    text-decoration: none;
  }

  .video-items {
    margin:15px 0;
  }
  .video-items img{
    width:100%;
  }

  .video-items .match-info{
    padding:15px;
  }

  h4,h5{
    color:#352f2f;
    font-weight:bold;
  }
</style>
@stop

@section('content')
<div class="container">
    <h4>Trận đấu tâm điểm</h4>
    <div class="row">
      @for($i=0;$i<20;$i++)
      <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="#" class="link-item">
          <div class="card video-items">
            <img src="http://placehold.it/300x200" alt="">
            <div class="match-info">
              <h5>Manchester United 3 - 0 Swansea City</h5>
              <h6>1.5 Tr lượt xem . 2 ngày trước</h6>
            </div>
          </div>
        </a>
      </div>
      @endfor
    </div>
</div>
@stop
