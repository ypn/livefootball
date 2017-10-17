@extends('front_master')
@section('content')
<div class="container">
    <div class="col-md-3">
      <img src="https://i.giphy.com/media/ZDoJ0Rj05zqBG/giphy.webp" width="100%" height="auto" frameBorder="0" class="giphy-embed" allowFullScreen/>
    </div>
    <div class="col-md-8">
      <h3 style="margin-top:0;color:#000;">Đăng nhập để tiếp tục</h3>
      <p>
        Để tiện lợi cho chính bạn và dễ dàng cho việc quản lý thành viên  của chúng tôi. Chúng tôi sẽ liên kết trực tiếp đến facebook cá nhân của bạn. <strong>Bạn cần cung cấp địa chỉ email</strong> để quá trình đăng kí được hoàn tất.
      </p>
      Hãy liên kết với facebook của bạn để xem trận đấu này.
      Click vào <a href="{{$loginUrl}}" class="loginBtn loginBtn--facebook">Liên kết với facebook</a> để hoàn thành đăng kí.
    </div>
</div>
@stop
