@extends('front_master')
@section('title')
<title>Nạp coin xem gói tháng</title>
@stop
@section('style')
<style media="screen">  
  .charge-rate span{
    color: #f00808;
  }
  .text-red{
    color:#d60000!important;
  }
  .btn-warning{
    border: none;
    color: #fff!important;
    background-color: #f9c42c!important;
  }
</style>
@stop

@section('content')
<section class="main">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 col-xs-12">
            <h1 class="page-title" style="color:#fff;text-align:center;">Nạp Coins</h1>
            <div class="row">
               <div class="col-sm-12 col-xs-12">
                  <form class="well text-center" action="/coins/member" method="post">
                     <h3>Mua gói tháng</h3>
                     <br>
                     <p>
                        Chỉ với <strong>30.000 coins/tháng</strong> bạn có thể xem tất cả các trận đấu trong 30 ngày <strong>(kể từ ngày đăng ký)</strong>
                     </p>
                     <hr>
                     <p>Bạn đang có 0 coins.</p>
                     <p>
                        <button type="button" class="btn btn-default" disabled>Mua gói tháng</button>
                     </p>
                     <p>
                        Không đủ 30.000 coins trong tài khoản
                     </p>
                  </form>
               </div>
            </div>
            <div class="row row-flex">
               <div class="col-sm-4 col-xs-12">
                  <div class="well">
                     <h3><strong>Cách 1 -</strong> Nạp bằng thẻ điện thoại</h3>
                     <hr>
                     <div class="charge-rate">
                        <div class="row">
                           <div class="col-sm-6">
                              <p><span>10.000đ</span> = 10k coins</p>
                              <p><span>20.000đ</span> = 20k coins</p>
                           </div>
                           <div class="col-sm-6">
                              <p><span>50.000đ</span> = 50k coins</p>
                              <p><span>100.000đ</span> = 100k coins</p>
                           </div>
                        </div>
                     </div>
                     <form action="/coins/card" method="post">
                        <fieldset>
                           <div class="form-group">
                              <label for>Nhà mạng</label>
                              <div style="overflow: hidden;">
                                 <div class="pull-left">
                                    <div class="checkbox">
                                       <label for="viettel">
                                       <input type="radio" name="type" value="0" required id="viettel"> Viettel
                                       </label>
                                    </div>
                                 </div>
                                 <div class="pull-left">
                                    <div class="checkbox">
                                       <label for="mobifone">
                                       <input type="radio" name="type" value="1" id="mobifone"> Mobifone
                                       </label>
                                    </div>
                                 </div>
                                 <div class="pull-left">
                                    <div class="checkbox">
                                       <label for="vinaphone">
                                       <input type="radio" name="type" value="2" id="vinaphone"> Vinaphone
                                       </label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-6">
                                 <div class="form-group">
                                    <label for>Seri thẻ</label>
                                    <input type="text" name="serial" class="form-control">
                                 </div>
                                 <div class="form-group">
                                    <label for>Mã số thẻ</label>
                                    <input type="text" name="pin" class="form-control" required>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <br>
                                 <img src="/images/card.png" style="width: 100%;">
                              </div>
                           </div>
                           <div class="form-group text-center">
                              <button type="submit" class="btn btn-warning">Nạp coins</button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
               <div class="col-sm-4 col-xs-12">
                  <div class="well">
                     <h3><strong>Cách 2 -</strong> Nhắn tin theo cú pháp</h3>
                     <hr>
                     <div class="charge-rate">
                        <p><span>10.000đ</span> = 5k coins</p>
                     </div>
                     <table class="table table-bordered table-striped">
                        <tbody>
                           <tr>
                              <th>Mạng</th>
                              <th>Cú pháp</th>
                           </tr>
                           <tr>
                              <td>Viettel</td>
                              <td>MW XTT NAP10 483162</td>
                           </tr>
                           <tr>
                              <td>Mobifone</td>
                              <td>MW XTT NAP10 483162</td>
                           </tr>
                           <tr>
                              <td>Vinaphone</td>
                              <td>MW XTT NAP10 483162</td>
                           </tr>
                        </tbody>
                     </table>
                     <h4>Gửi <strong class="text-red">9029</strong></h4>
                  </div>
               </div>
               <div class="col-sm-4 col-xs-12">
                  <div class="well">
                     <h3><strong>Cách 3 -</strong> Nhắn tin nhận mã OTP</h3>
                     <hr>
                     <div class="charge-rate">
                        <p><span>10.000đ</span> = 5k coins</p>
                     </div>
                     <form class="form-horizontal" action="/coins/otp" method="post">
                        <fieldset>
                           <div class="form-group">
                              <div class="col-sm-12">
                                 <div class="help-block">Nhập số điện thoại vào ô dưới đây, Hệ thống sẽ gửi cho bạn một MÃ SỐ qua tin nhắn. Sau đó, bạn nhập MÃ SỐ vào website để hoàn tất thanh toán</div>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for class="control-label col-sm-4 col-xs-12">Nhập số ĐT</label>
                              <div class="col-sm-8">
                                 <input type="text" name="phone" class="form-control" required>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="col-sm-8 col-sm-offset-4">
                                 <button type="submit" class="btn btn-warning">Nhận SMS OTP</button>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@stop
