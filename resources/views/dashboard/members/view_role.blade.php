@extends('dashboard.master_v2')

@section('style')
<style>
  .result-item{
    display:inline-flex;border:1px solid #ccc;
  }
  .r_margin{
      margin:0 10px;
  }
  .u-name{
    font-size:16px;color:#555;
  }
</style>
@stop

@section('table_name')
{{isset($r->name) ? $r->name :''}}
@stop

@section('list_actions')
  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
  </li>
  <li><a href="/dashboard/group_member/list"><i class="fa fa-list-alt"></i></a>
  <li><a class="close-link"><i class="fa fa-close"></i></a>
  </li>
@stop

@section('error')
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
    <a href="javascript:void(0)" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Congratulations! </strong> Dậy thì thành cmn công :)
  </div>
</div>
@endif
@stop

@section('content')
<br>
<div class="input-group">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <input type="hidden" name="role-id" value="{{isset($r->id) ? $r->id : 0}}">
  <input  id="input-search" type="text" name="param" class="form-control" placeholder="Nhập tên, email hoặc id facebook">
  <span type="button" class="input-group-btn" name="button">
    <button type="button" class="btn btn-primary" id="search_member" name="button">Tìm</button>
  </span>
</div>

<div id="result-search"></div>

<div class="table-responsive">
  <table class="table table-striped jambo_table bulk_action">
    <thead>
      <tr class="headings">
        <th>
          <input type="checkbox" id="check-all" class="flat">
        </th>
        <th class="column-title">Ảnh</th>
        <th class="column-title">Tên thành viên</th>
        <th class="column-title no-link last"><span class="nobr">Actions</span>
        </th>
        <th class="bulk-actions" colspan="7">
          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
        </th>
      </tr>
    </thead>

    <tbody>
      @foreach($users as $u)
      <tr class="even pointer">
        <td class="a-center ">
          <input type="checkbox" class="flat" name="table_records">
        </td>
        <td style="font-weight:bold"><img style="width:30px;height:30px;object-fit:cover;" src="{{isset($u->fb_id) ? 'http://graph.facebook.com/' . $u->fb_id . '/picture' : ''}}" alt=""></td>
        <td style="font-weight:bold">{{isset($u->first_name) ? $u->first_name :''}}&nbsp;{{isset($u->last_name) ? $u->last_name :''}}</td>
        <td class=" last">
          <a target="_blank" href="http://facebook.com/{{$u->fb_id}}">View</a>
          	&nbsp;	&nbsp;|	&nbsp;	&nbsp;
          <a href="javascript:void(0);" class="delete-user-role">Delete
            <form action="/dashboard/user-role/delete" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="user-id" value="{{isset($u->id) ? $u->id :0}}">
              <input type="hidden" name="role-id" value="{{isset($r->id) ? $r->id:0 }}">
            </form>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop

@section('script')
<script type="text/javascript">
  function search_member(_self){
    let param = $(_self).parents('.input-group').find("input[name='param']").val();
    let _token = $(_self).parents('.input-group').find("input[name='_token']").val();
    let _roleId = $(_self).parents('.input-group').find("input[name='role-id']").val();
    if(param.trim().length===0){
      return;
    }

    $.ajax({
      method:'POST',
      url:window.location.origin + '/dashboard/member/search',
      data:{
        _token,
        param
      },
      success:function(response){
        if(response!==0){
          data = $.parseJSON(response);
          if(data.length == 0){
            $('#result-search').html('<h5>Không có bản ghi nào!</h5>');
            return;
          }
          $('#result-search').empty();

          for(let i=0 ; i < data.length ; i++){
            let _item = $('<div>').addClass('result-item');
            let img = $('<img>').attr('src','http://graph.facebook.com/' + data[i].fb_id + '/picture');
            let r_margin = $('<div>').addClass('r_margin')
              .append(
                $('<strong>').addClass('u-name').text(data[i].first_name + ' ' + data[i].last_name)
              ).append(
                $('<div>').html($('<button>').attr('data-user-id',data[i].id).addClass('add-member btn btn-warning btn-xs').text('Thêm vào nhóm').on('click',function(){
                  let _userId = $(this).attr('data-user-id');
                  $.ajax({
                    method:'POST',
                    url : window.location.origin + '/dashboard/permissions/add-user-role',
                    data:{
                      _token,
                      _userId,
                      _roleId
                    },
                    success:function(response){
                      if(response==0){
                        return;
                      }

                      if(response==-1){
                        alert('Thành viên đã thuộc nhóm quản trị!');
                        return;
                      }
                        alert(response);
                      location.reload();
                    }
                  })
                }))
              );

            _item.append(img).append(r_margin);
            $('#result-search').append(_item);
          }
        }
      }
    });
  }
  $('#search_member').on('click',function(){
    search_member(this);
  });

  $("#input-search").on('keyup', function (e) {
      if (e.keyCode == 13) {
          search_member(this);
      }
  });

  $('.delete-user-role').on('click',function(){
    $(this).find('form').submit();
  });

</script>
@stop
