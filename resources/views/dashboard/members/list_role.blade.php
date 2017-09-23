@extends('dashboard.master_v2')

@section('list_actions')
<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
</li>
<li><a href="/dashboard/group_member/add"><i class="fa fa-plus"></i></a></li>
<li><a class="close-link"><i class="fa fa-close"></i></a>
</li>
@stop

@section('table_name')
  Nhóm người dùng
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
<div class="table-responsive">
  <table class="table table-striped jambo_table bulk_action">
    <thead>
      <tr class="headings">
        <th>
          <input type="checkbox" id="check-all" class="flat">
        </th>
        <th class="column-title">Tên Nhóm</th>
        <th class="column-title">Quyền hạn</th>
        <th class="column-title no-link last"><span class="nobr">Actions</span>
        </th>
        <th class="bulk-actions" colspan="7">
          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
        </th>
      </tr>
    </thead>

    <tbody>
      @foreach($roles as $r)
      <tr class="even pointer">
        <td class="a-center ">
          <input type="checkbox" class="flat" name="table_records">
        </td>
        <td style="font-weight:bold">{{isset($r->name) ? $r->name :''}}</td>
        <td style="font-weight:bold">{{isset($r->slug) ? $r->slub :''}}</td>
        <td class=" last">
          <a href="/dashboard/group_member/view/{{isset($r->id) ? $r->id : 0}}">View</a>
          	&nbsp;	&nbsp;|	&nbsp;	&nbsp;
          <a href="/dashboard/group_member/add/{{isset($r->id) ? $r->id : 0}}">Edit</a>
          	&nbsp;	&nbsp;|	&nbsp;	&nbsp;
          <a href="javascript:void(0);" class="delete-role">Delete
            <form action="/dashboard/group_member/delete" method="post">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="id" value="{{isset($r->id) ? $r->id :0}}">
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
  $('.delete-role').on('click',function(){
    $(this).find('form').submit();
  });
</script>
@stop
