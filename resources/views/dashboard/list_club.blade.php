@extends('dashboard.master')
@section('content')
<div class="right_col" rold"main">
  <div>
    <div class="page-title">
      <div class="title_left">
        <h3>Danh sách câu lạc bộ </h3>
      </div>
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Bảng danh sách câu lạc bộ</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a href="/dashboard/club/create"><i class="fa fa-plus"></i></a></li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>

            <div class="x_content">

              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">
                      <th>
                        <input type="checkbox" id="check-all" class="flat">
                      </th>
                      <th class="column-title">
                        Logo
                      </th>
                      <th class="column-title">Tên câu lạc bộ </th>
                      <th class="column-title no-link last"><span class="nobr">Action</span>
                      </th>
                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($clubs as $c)
                    <tr class="even pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <th class="a-center">
                        <img style="width:30px;height:30px;object-fit:cover;" src="{{$c->logo_url}}" alt="">
                      </th>
                      <td style="font-weight:bold">{{$c->name}}</td>
                      <td class=" last">
                        <a href="#">View</a>
                        <a href="javascript:void(0);" class="link-form-delete">Delete
                          <form action="#" method="post"><input type="hidden" name="_token" value="{{csrf_token()}}"></form>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div style="display: none;" id="dialog-confirm" title="Delete role!"><!--Start confirm dialog-->
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this role?</p>
</div><!--End confirm dialog-->

@stop
