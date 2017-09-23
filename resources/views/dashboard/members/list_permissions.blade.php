@extends('dashboard.master_v2')

@section('table_name')
Quyền thành viên
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
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Congratulations! </strong> Xóa quyền người dùng thành cmn công :(
  </div>
</div>
@endif
@stop

@section('list_actions')
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a href="/dashboard/permissions/add"><i class="fa fa-plus"></i></a></li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
@stop

@section('content')
<div class="table-responsive">
  <table class="table table-striped jambo_table bulk_action">
    <thead>
      <tr class="headings">
        <th>
          <input type="checkbox" id="check-all" class="flat">
        </th>
        <th class="column-title">Tiêu đê</th>
        <th class="column-title">Mô tả</th>
        <th class="column-title no-link last"><span class="nobr">Actions</span>
        </th>
        <th class="bulk-actions" colspan="7">
          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
        </th>
      </tr>
    </thead>

    <tbody>
      @foreach($permissions as $p)
      <tr class="even pointer">
        <td class="a-center ">
          <input type="checkbox" class="flat" name="table_records">
        </td>
        <td style="font-weight:bold">{{isset($p->name) ? $p->name : ''}}</td>
        <td style="font-weight:bold">{{isset($p->descriptions) ? $p->descriptions : ''}}</td>
        <td class=" last">
          <a href="/dashboard/permissions/add/{{isset($p->id) ? $p->id : 0 }}">View</a>
          &nbsp;	&nbsp;|	&nbsp;	&nbsp;
          <a href="javascript:void(0);" class="delete-permission">Delete
            <form action="/dashboard/permissions/delete" method="post">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="id" value="{{isset($p->id) ? $p->id :0}}">
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
    $('.delete-permission').on('click',function(){
      $(this).find('form').submit();
    });
</script>
@stop
