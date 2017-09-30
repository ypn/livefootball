@extends('front_master')
@section('title')
Nạp thẻ mua gói tháng.
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
@section('script')
<script src="BaoKim_napthe_PHP11111/js/jsmin.js"></script>
<script src="BaoKim_napthe_PHP11111/js/bootstrap.js"></script>
<script>
	$(document).ready(function(){
    $(".form-control").tooltip({ placement: 'right'});
});
</script>
@stop
@section('content')
<div class="container">
  @if(Session::has('error'))
  <div class="page-title">
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Giao dịch thất bại! </strong> {{Session::get('error')}}
    </div>
  </div>
  @elseif(Session::has('success'))
  <div class="page-title">
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Giao dịch thành công! </strong> {!! Session::get('success') !!}
    </div>
  </div>
  @endif
	<div class="col-md-6 well text-center">
		 <h3>Mua gói tháng</h3>
		 <br>
		 <p>
				Chỉ với <strong>30.000 coins/tháng</strong> bạn có thể xem tất cả các trận đấu trong 30 ngày <strong>(kể từ ngày đăng ký)</strong>
		 </p>
     @if($user->remain_coin < 30000)
		 <p style="color:red">
				Bạn đang có <b>{{number_format($user->remain_coin,0,'','.')}} coin</b>, không có đủ <b>30.000 coins</b> trong tài khoản hãy nạp thêm coin trước bằng thẻ cào điện thoại hoặc thẻ gate theo form bên phải.
        <img style="width:100;height:40px;object-fit:cover;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCHdngGeM3Dtrrio0yDrOTTbq5gYaF4JedSFTCppl0Bswb5g-D" alt="">
		 </p>
     @else
     <form class="" action="/transition/expire-month-ticket" method="post">
       {{csrf_field()}}
       <p>Bạn đang có <b>{{number_format($user->remain_coin,0,'','.')}} coins</b>. Click vào nút bên dưới để hoàn thành mua gói tháng</p>
       <button type="submit" class="btn btn-primary" name="button">Mua gói tháng ngay</button>
     </form>
     @endif
	</div>
	<div class="col-md-6 well">
		<form class="form-horizontal" role="form" method="post" action="{{ route('napthe') }}" enctype="multipart/form-data">
	    {{ csrf_field() }}
			<h3 class="form-control-heading">NẠP COIN</h3>

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
			<div class="form-group">
			    <label for="txtpin" class="col-md-2 control-label">Loại thẻ</label>
			    <div class="col-md-10">
			      <select class="form-control" name="chonmang">
						  <option value="VIETEL">Viettel</option>
						  <option value="MOBI">Mobifone</option>
						  <option value="VINA">Vinaphone</option>
						  <option value="GATE">Gate</option>
						  <option value="VNM">Vietnam mobile</option>
						</select>
			    </div>
		  </div>

		  <div class="form-group">
		    <label for="txtpin" class="col-md-2 control-label">Tài khoản</label>
		    <div class="col-md-10">
		      <input type="text" class="form-control" id="txtuser" name="txtuser" />
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="txtpin" class="col-md-2 control-label">Mã thẻ</label>
		    <div class="col-md-10">
		      <input type="text" class="form-control" id="txtpin" name="txtpin" placeholder="Mã thẻ" data-toggle="tooltip" data-title="Mã số sau lớp bạc mỏng"/>
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="txtseri" class="col-md-2 control-label">Số seri</label>
		    <div class="col-md-10">
		      <input type="text" class="form-control" id="txtseri" name="txtseri" placeholder="Số seri" data-toggle="tooltip" data-title="Mã seri nằm sau thẻ">
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-lg-offset-2 col-md-10">
		      <button type="submit" class="btn btn-primary" name="napthe">Nạp thẻ</button>
		    </div>
		  </div>
		</form>
	</div>
</div>
@stop
