@extends('front_master')
@section('title')
<title>{{$match->name}}</title>
<meta property="og:url"                content="{{Request::url()}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="[Trực tiếp] {{$match->name}}" />
<meta property="og:description"        content="Livestream bóng đá HD, K+ online. Thưởng thức các trận cậu đỉnh cao dễ dàng bằng công nghệ livestream hàng đầu Việt Nam với chất lượng hình ảnh tốt nhất, tương tác trực tiếp với bình luận viên và hàng ngàn khán giả khác. Duy nhất tại bongdatv.online" />
<meta property="og:image" content="{{ $match->fb_share_image!=null ? $match->fb_share_image : (URL::to('/images/fb_share.jpg'))}}" />
<meta property ="fb:app_id" content="1812749958752149"/>
@stop
@section('style')
<link href="http://vjs.zencdn.net/6.2.5/video-js.css" rel="stylesheet">
@stop
@section('script')
<div id="fb-root"></div>
<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="http://vjs.zencdn.net/6.2.5/video.js"></script>
<script src="/vendors/youtube-videojs/youtube-videojs.js"></script>
@stop
@section('content')
<section class="main">
   <div class="container">
     <div class="row">
       <div class="col-md-8">
         <video
           id="video"
           class="video-js vjs-default-skin video  vjs-big-play-centered vjs-16-9"
           controls
           autoplay
           data-setup='{ "techOrder": ["youtube"]}'
         >
          <source src="{{isset($match->review_url) ? $match->review_url : ''}}" type="video/youtube" />
         </video>
         <h4>{{$match->name}}</h4>
         <div>
           <script src="https://apis.google.com/js/platform.js"></script>

           <div class="g-ytsubscribe" data-channelid="UCyXNsvzIxJjPzqN_Xl3-BDw" data-layout="full" data-count="default"></div>
         </div>
         <div style="float:right">
           <div class="fb-like" data-href="{{Request::url() }}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
           <div class="fb-share-button" data-href="{{Request::url() }}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="<?php echo ('https://www.facebook.com/sharer/sharer.php?u=' . urlencode(Request::url()) . '&amp;src=sdkpreparse'); ?>">Chia sẻ</a></div>
         </div>
         <span class="clearfix"></span>
         <script>(function(d, s, id) {
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) return;
           js = d.createElement(s); js.id = id;
           js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=1812749958752149";
           fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));</script>
         <div class="fb-comments" data-width="100%"  data-href="{{Request::url()}}" data-numposts="10"></div>
       </div>
     </div>
   </div>
</section>
@stop
