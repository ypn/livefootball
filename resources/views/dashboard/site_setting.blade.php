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
        <strong>Congratulations! </strong> Dậy thì thành cmn công.
      </div>
    </div>
    @endif
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Cài đặt</h2>
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
            <form method="POST" action="/dashboard/settings/add_id_live_video">
              <input type="hidden" name="_token" value="{{csrf_token()}}">

              <label for="name">Youtube video live ID</label>
              <input type="text" class="form-control" name="ytb_live_id" required value="{{$video_id}}"/>

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
