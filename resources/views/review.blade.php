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
         <div style="height:100px;margin-bottom:15px;">
           <img src="http://4.bp.blogspot.com/-bEzR6cBoC7M/VKjBG3D7yjI/AAAAAAAAAQU/U9ZMQTxsmGM/s1600/BANNER-ngang-cam---xanh-duong.jpg" style="width:100%;height:100%;object-fit:cover;" alt="">
         </div>
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
       <div class="col-md-4">
         <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQABYNnBG0Cm7umUii9FHjXTpTaRNbtZPNj_HUpKvJ9RT3sHf52ww" style="width:100%;">
         <div class="related-video">
           <h4 style="color:black;font-weight:bold;">Hot game</h4>
           <div class="video-item" style="display:flex;margin:15px 0;">
             <div class="">
               <img src="https://i.ytimg.com/an_webp/N386J4j4oCU/mqdefault_6s.webp?du=3000&sqp=CLSqtM0F&rs=AOn4CLDyEGnelGRmqZYd1VKof2oyqmrPlg" style="width:200px;height:100px;" alt="">
             </div>

             <div style="padding:0 15px;color:black;">
               <label for="">Manchester United 4-0 Swansea</label>
               <p>10.452 lượt xem</p>
             </div>
           </div>

           <div class="video-item" style="display:flex;margin:15px 0;">
             <img src="https://i.ytimg.com/an_webp/ALDZLJYZgdc/mqdefault_6s.webp?du=3000&sqp=CO3KtM0F&rs=AOn4CLD1ev_ko8VlStKySx7aVk_sgx4X1g" style="width:200px;height:100px;" alt="">
             <div style="padding:0 15px;color:black;">
               <label for="">Chelsea 2-1 Tottenham hotspur</label>
               <p>8.316 lượt xem</p>
             </div>
           </div>

           <div class="video-item" style="display:flex;margin:15px 0;">
             <img src="https://i.ytimg.com/an_webp/fY-7JJPkPXc/mqdefault_6s.webp?du=3000&sqp=CPiptM0F&rs=AOn4CLAl69tVebduQSoOKZZXTUpM5VE9qg" style="width:200px;height:100px;" alt="">
             <div style="padding:0 15px;color:black;">
               <label for="">Liverpool 4-0 Arsenal</label>
               <p>20.986 lượt xem</p>
             </div>
           </div>

           <div class="video-item" style="display:flex;margin:15px 0;">
             <img src="https://i.ytimg.com/an_webp/tTyTKbMmTzg/mqdefault_6s.webp?du=3000&sqp=COiAtM0F&rs=AOn4CLBUqA2FaoMAUlf_pIbszucRrbohlQ" style="width:200px;height:100px;" alt="">
             <div style="padding:0 15px;color:black;">
               <label for="">Manchester City 0-2 Manchester United</label>
               <p>20.986 lượt xem</p>
             </div>
           </div>

         </div>
       </div>
     </div>
   </div>
</section>
@stop
