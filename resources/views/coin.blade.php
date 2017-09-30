@extends('front_master')
@section('title')
Nạp coin mua gói tháng
@stop
@section('style')
<style media="screen">
  body{
    font-family: 'Roboto', sans-serif;
    color: #333;
    background:url('https://cdn.elegantthemes.com/blog/wp-content/uploads/2013/09/bg-2-full.jpg');
  }
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
                  <form class="well text-center" action="#" method="post">
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
                     <form action="#" method="post">
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
                           <p style="color:red;">
                             Tính năng này chưa sẵn sàng. Hệ thống sẽ mở tính năng này trong thời gian tới. Cảm ơn bạn đã ủng hộ!
                           </p>
                           <div class="form-group text-center">
                              <button type="submit" class="btn btn-warning" disabled>Nạp coins</button>
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
