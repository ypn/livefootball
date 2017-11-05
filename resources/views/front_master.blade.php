<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <style media="screen">
    @import url('https://fonts.googleapis.com/css?family=Roboto');
    .nav-custom{
      border-radius:0;
      border:0;
      box-shadow: 0 0 4px rgba(0,0,0,0.5);
    }
    .loginBtn {
      box-sizing: border-box;
      position: relative;
      /* width: 13em;  - apply for fixed size */
      margin: 0.2em;
      padding: 0 15px 0 46px;
      border: none;
      text-align: left;
      line-height: 34px;
      white-space: nowrap;
      border-radius: 0.2em;
      font-size: 16px;
      color: #FFF;
      display: inline-block;
    }
    .loginBtn:before {
      content: "";
      box-sizing: border-box;
      position: absolute;
      top: 0;
      left: 0;
      width: 34px;
      height: 100%;
    }
    .loginBtn:focus {
      outline: none;
      text-decoration: none;
    }
    .loginBtn:active {
      box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
      text-decoration: none;
    }

    .loginBtn:hover{
      text-decoration: none;
    }


    /* Facebook */
    .loginBtn--facebook {
      background-color: #4C69BA;
      background-image: linear-gradient(#4C69BA, #3B55A0);
      /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
      text-shadow: 0 -1px 0 #354C8C;
    }
    .loginBtn--facebook:before {
      border-right: #364e92 1px solid;
      background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
    }
    .loginBtn--facebook:hover,
    .loginBtn--facebook:focus {
      background-color: #5B7BD5;
      background-image: linear-gradient(#5B7BD5, #4864B1);
    }

    .btn-coin:hover,.btn-coin:focus{
      background:#9b8a30!important;
    }

    #b-c-facebook{
      z-index: 99999;
      width: 350px;
      max-width: 100%;
      height: auto;
      max-height:100%;
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

    @media(min-width:992px){
      .dropdown-toggle{
        padding:0!important;
      }
    }
    </style>
    @yield('style')
  </head>
  <body>
    <nav class="navbar navbar-default nav-custom">
       <div class="container-fluid">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="/">BongdaTV</a>
         </div>
         <div class="collapse navbar-collapse" id="myNavbar">
           <ul class="nav navbar-nav">
             <li class="active"><a href="/">Trang chủ</a></li>
             <li><a href="/lich-truc-tiep">Lịch trực tiếp</a></li>
             <li><a href="/">Lịch thi đấu</a></li>
             <li><a href="#">Bản tin</a></li>
             <li><a href="#">Videos</a></li>
           </ul>
            <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="/napthe" class="btn btn-danger btn-coin" style="color:#fff;padding:10px 40px;margin:2px;">Mua gói tháng</a>
            </li>
            @if(Sentinel::check())
             <li class="dropdown">
                <a  class="dropdown-toggle" data-toggle="dropdown" href="#">
                  <span>{{Sentinel::getUser()->first_name . ' ' . Sentinel::getUser()->last_name}}</span>
                  <img style="border-radius: 50%; width: 35px; height: 35px; margin-top: 5px" src="http://graph.facebook.com/{{Sentinel::getUser()->fb_id}}/picture?type=square" alt="">
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="/profile">Thông tin tài khoản</a></li>
                  <li><a href="/logout">Đăng xuất</a></li>
                </ul>
            </li>
            @else
            <li><a href="{{$loginUrl}}" class="loginBtn loginBtn--facebook" style="color:#fff;padding:10px 40px;">Liên kết với facebook</a></li>
            @endif
           </ul>
         </div>
       </div>
     </nav>
     @yield('content')
    <script src="/js/app.js"></script>
    <script type="text/javascript">
      $('#chat-f-b').on('click',function(){
        $('#f-chat-content').toggleClass('show');
      });
    </script>
     @yield('script')
  </body>
</html>
