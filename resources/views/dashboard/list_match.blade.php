@extends('dashboard.master')
@section('script')
<script type="text/javascript">
  (function($){
    $('.change-status').on('change',function(){
      let _self = $(this);
      $.ajax({
        url:window.location.origin + '/dashboard/match/change-status',
        method:'POST',
        data:{
          _token:'<?php echo csrf_token(); ?>',
          match_id: $(this).attr('data-match-id'),
          status_val: $(this).val()
        },
        success:function(response){
          if(!response ==1){
            alert('Thay đổi trạng thái thất bại. Kiểm tra log để xem chi tiết');
            console.log(response);
          }
          else{
            location.reload();
          }
        },
        error: function(xhr, error){
            alert('Có lỗi xảy ra, check console log để xem chi tiết!');
            console.log('Lỗi gửi request:');
            console.log(xhr);
            console.log(error);
       },
     });
    });


    $('.form-delete-match').on('click',function(){
      $(this).find('form').submit();
    });
  })(jQuery)
</script>

@stop
@section('content')
<div class="right_col" rold"main">
  <div>
    <div class="page-title">
      <div class="title_left">
        <h3>Danh sách trận đấu </h3>
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
            <h2>Bảng danh sáchtrận đấu</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a href="/dashboard/match/create"><i class="fa fa-plus"></i></a></li>
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
                      <th class="column-title">Tên giải đấu </th>
                      <th class="column-title">Tên trận đấu </th>
                      <th class="column-title">Đội nhà</th>
                      <th class="column-title">Đội khách</th>
                      <th class="column-title">Thời gian </th>
                      <th class="column-title">Trạng thái </th>
                      <th class="column-title no-link last"><span class="nobr">Action</span>
                      </th>
                      <th class="bulk-actions" colspan="7">
                        <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                      </th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($matchs as $match)
                    <tr class="even pointer">
                      <td class="a-center ">
                        <input type="checkbox" class="flat" name="table_records">
                      </td>
                      <th class="a-center">
                        <img style="width:30px;height:30px;object-fit:cover;" src="{{$match->leaguage_logo}}" alt="">
                      </th>
                      <td>{{$match->leaguage_name}}</td>
                      <td style="font-weight:bold">{{$match->name}}</td>
                      <td>{{$match->team_1_name}}</td>
                      <td>{{$match->team_2_name}}</td>
                      <td>{{$match->date_start}}</td>
                      <td>
                        <select data-match-id = "{{$match->id}}" class="change-status" name="change-status">
                          <option {{($match->status==0)?'selected':''}} value="0">Sắp diễn ra</option>
                          <option {{($match->status==1)?'selected':''}} value="1">Đang trực tiếp</option>
                          <option {{($match->status==2)?'selected':''}} value="2">Đã kết thúc</option>
                        </select>
                      </td>
                      <td class="last">
                        <a class="edit-match" href="{{($match->status!==2) ? '/dashboard/match/create/' . $match->id : '/dashboard/match/review/' . $match->id}}">Edit</a>
                        <a href="javascript:void(0);" class="form-delete-match">Delete
                          <form action="/dashboard/match/delete/{{$match->id}}" method="post"><input type="hidden" name="_token" value="{{csrf_token()}}"></form>
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
