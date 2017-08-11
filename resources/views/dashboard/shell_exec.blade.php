@extends('dashboard.master')
@section('script')
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '1812749958752149',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.10'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script>
document.getElementById('liveFacebook').onclick = function() {
  FB.ui({
    display: 'popup',
    method: 'live_broadcast',
    phase: 'create',
}, function(response) {
    if (!response.id) {
      alert('dialog canceled');
      return;
    }
    //rtmp://rtmp-api.facebook.com:80/rtmp/111111111111111?ds=1&a=XXXXXXXXXXXXXXXXX
    $.ajax({
      url: window.location.origin + "/dashboard/shell/fb_exec",
      method:'POST',
      data:{
        _token:"<?php echo(csrf_token()); ?>",
        file_url: $('textarea[name="file_path"]').val(),
        stream_url:response.stream_url
      },     
      success:function(response){
        if(response==='success'){
          FB.ui({
            display: 'popup',
            method: 'live_broadcast',
            phase: 'publish',
            broadcast_data: response,
          }, function(response) {
          //alert("video status: \n" + response.status);
          });
        }      
      }
    });
    //alert('stream url:' + response.stream_url);
  });
};
</script>
@stop
@section('content')
<div class="right_col" rold"main">
  <div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Nhập đường dẫn file</h2>
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
            <form method="POST" action="/dashboard/shell/exec">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <textarea class="form-control" name="file_path"></textarea>

              </br>

              <input class="form-control" type="text" name="output_page">

              <br/>
              <button class="btn btn-primary">Submit</button>

            </form>
            <!-- end form for validations -->

            <button type="button" id="liveFacebook" class="btn btn-primary" name="button">Live facebook</button>

            <div class="">
              <h5>Giá trị mặc định</h5>
              <h6>Input: http://vndatagarenatv-a.akamaihd.net/hls/198168/1810682.m3u8</h6>
              <h6>Output-Phamnhuy11@gmail.com: rtmp://a.rtmp.youtube.com/live2/m3fx-ecab-tu54-1t6d</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
