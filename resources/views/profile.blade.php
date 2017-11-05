@extends('front_master')
@section('title')
Thông tin tài khoản
@stop
@section('content')
<div class="container">
<div class="col-md-3">
  <img src="https://graph.facebook.com/{{Sentinel::getUser()->fb_id}}/picture?type=large" alt="">
</div>
<div class="col-md-9">
<h4>Thông tin tài khoản</h4>
<label for="">Họ tên: </label>{{Sentinel::getUser()->first_name}} {{Sentinel::getUser()->last_name}}
<br>
<label for="">Tổng số coin đã nạp: </label> {{number_format(Sentinel::getUser()->total_coin,0,'','.')}} coins
<br>
<label for="">Số coin còn lại: </label> {{number_format(Sentinel::getUser()->remain_coin,0,'','.')}} coins
<br>
@if(Sentinel::getUser()->expired_day != null && new Carbon\Carbon(Sentinel::getUser()->expired_day) >= Carbon\Carbon::now())
<p style="color:green">
Gói tháng của bạn còn giá trị đến ngày {{date('d/m/Y',strtotime(Sentinel::getUser()->expired_day))}} (còn {{(new Carbon\Carbon(Sentinel::getUser()->expired_day))->diffInDays(Carbon\Carbon::now())}} ngày)
</p>
@else
<p style="color:red">
Bạn chưa mua gói tháng hoặc gói tháng của bạn đã hết hạn click <a href="/napthe" class="btn btn-primary">Mua gói tháng</a> để có thể xem tất cả các trận đấu trong 30 ngày (kể từ ngày đăng kí).
</p>
@endif
</div>
</div>
@stop
