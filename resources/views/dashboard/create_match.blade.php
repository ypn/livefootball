@extends('dashboard.master')
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
        <strong>Congratulations! </strong> {{ isset($role) ? "Update group member $role->name successfull." : "Bạn vừa thêm một trận đấu mới." }}
      </div>
    </div>
    @endif
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tạo một trận đấu mới</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a href="/dashboard/match/list"><i class="fa fa-list-alt"></i></a>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>

          </div>

          <div class="x_content">
            <!-- start form for validation -->
            <form method="POST" action="/dashboard/match/add" data-parsley-validate>
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <label for="name">Tên trận đấu</label>
              <input type="text" id="name" class="form-control" name="name" required />
              <br/>

              <label>Đội nhà</label>
              <select class="form-control" name="id_team_a">
                @foreach($clubs as $c)
                <option value="{{$c->id}}"><img src="http://placehold.it/20x20" alt=""> {{$c->name}}</option>
                @endforeach
              </select>
              <br/>

              <label>Đội khách</label>
              <select class="form-control" name="id_team_b">
                @foreach($clubs as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
              </select>
              <br/>

              <label>Giải đấu</label>
              <select class="form-control" name="leaguage_id">
                @foreach($leaguages as $l)
                <option value="{{$l->id}}">{{$l->name}}</option>
                @endforeach
              </select>
              <br/>

              <label>Ngày bắt đầu</label>
              <div class="form-group">
                  <div class='input-group date' id='myDatepicker4'>
                      <input type='text' data-format="yyyy-MM-dd hh:mm:ss" class="form-control" name="date_start"  readonly="readonly" />
                      <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
              </div>
              <br/>
              
              <label>Facebook image</label>
              <input type="input" class="form-control" name="fb_image" />'

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

@section('script')
<script src="/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$('#myDatepicker4').datetimepicker({
    ignoreReadonly: true,
    allowInputToggle: true,
    format: 'DD-MM-YYYY hh:mm A',
});
</script>
@stop
