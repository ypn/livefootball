@extends('dashboard.master')
@section('style')
<link href="http://vjs.zencdn.net/6.2.5/video-js.css" rel="stylesheet">
@stop
@section('script')
<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="http://vjs.zencdn.net/6.2.5/video.js"></script>
<script src="/vendors/youtube-videojs/youtube-videojs.js"></script>
<script type="text/javascript">
var player = videojs('video');
$('#youtube_url').on('paste', function(e) {
  var pasteData = e.originalEvent.clipboardData.getData('text')
  player.src({type: 'video/youtube', src: pasteData});
  player.load();

  player.play();

});
</script>
@stop
@section('content')
<div class="right_col" rold"main">
  <div>
    @if(Session::has('error'))
    <div class="page-title">
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Danger - check out some error! </strong> {{Session::get('error')}}
      </div>
    </div>
    @elseif(Session::has('status') && Session::get('status') ==='handle_success')
    <div class="page-title">
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Congratulations! </strong>  Cập nhật trận đấu thành cmn công.
      </div>
    </div>
    @endif
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Thêm review trận đấu</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a href="/dashboard/club/list"><i class="fa fa-list-alt"></i></a>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>

          </div>

          <div class="x_content">
            <!-- start form for validation -->
            <form method="POST" action="/dashboard/match/review/add">
              <input type="hidden" name="_token" value="{{csrf_token()}}" />
              <input type="hidden" name="match_id" value="{{ isset($match->id) ? $match->id : 0}}" />
              <label for="name">Url video hightl light</label>
              <input type="text" class="form-control" name="youtube_url" id="youtube_url" required  value = "{{isset($match->review_url) ? $match->review_url : ''}}"/>

              <label for="logo">Hiển thị</label>
              <div>
                <video
                  id="video"
                  class="video-js vjs-default-skin video  vjs-big-play-centered vjs-16-9"
                  controls
                  autoplay
                  data-setup='{ "techOrder": ["youtube"]}'
                >
                <source src="{{isset($match->review_url) ? $match->review_url : ''}}" type="video/youtube" />
                </video>

              </div>
              <br/>
              <button class="btn btn-primary">Submit</button>
            </form>
            <!-- end form for validations -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
