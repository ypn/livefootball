@extends('dashboard.master')
@section('content')
<div class="right_col" rold"main">
  <div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Nhập đường dẫn file</h2>
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
            <form method="POST" action="/dashboard/shell/exec">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <textarea class="form-control" name="file_path"></textarea>

              </br>

              <input class="form-control" type="text" name="output_page">

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
