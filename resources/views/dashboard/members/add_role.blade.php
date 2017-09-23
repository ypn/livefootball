@extends('dashboard.master_v2')

@section('table_name')
Thêm nhóm người dùng mới
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
<form id="form-add-team" method="POST" action="/dashboard/group_member/create{{isset($role->id) ? '/'.$role->id :''}}" data-parsley-validate>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <br>
  <label for="name">Name</label>
  <input type="text" class="form-control" name="name" required value="{{isset($role->name)?$role->name  :''}}"/>

  <br>
  <label for="alias">Alias</label>
  <input type="text" class="form-control" name="alias" required value="{{isset($role->slug)?$role->slug:''}}"/>

  <br>
  <label for="logo">Permissions</label>
  <div class="panel panel-default" style="max-height:500px;overflow-y:auto;">
    @foreach($ps as $p)
    <div class="checkbox">
      <label>
        <input type="checkbox" class="flat" name="roles[]" <?php if(isset($p->alias) && (isset($role) && $role->hasAccess(["$p->alias"]))) echo 'checked'; ?> value="{{isset($p->alias) ? $p->alias : '' }}"> {{isset($p->alias) ? $p->alias : 'not_determine'}}
      </label>
    </div>
    @endforeach
  </div>
  <br/>
  <button class="btn btn-primary">Submit</button>
</form>
@stop
