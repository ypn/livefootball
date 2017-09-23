@extends('dashboard.master_v2')

@section('table_name')
Thêm quyền người dùng mới
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

@section('list_actions')
  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
  </li>
  <li><a href="/dashboard/permissions/list"><i class="fa fa-list-alt"></i></a>
  <li><a class="close-link"><i class="fa fa-close"></i></a>
  </li>
@stop
@section('content')
<form id="form-add-permission" method="POST" action="/dashboard/permissions/create{{isset($p->id) ? '/' . $p->id :''}}" data-parsley-validate>
  <br>
  <input type="hidden" name="_token" value="{{csrf_token()}}">

  <label for="name">Tên quyền</label>
  <input type="text" class="form-control" name="name" required value="{{isset($p->name) ? $p->name :''}}" />
  <br>
  <label for="slugs">Slug</label>
  <input type="text" class="form-control" name="slugs" required value="{{isset($p->alias) ? $p->alias :''}}"/>
  <br>
  <label for="logo">Mô tả</label>
  <textarea type="text" class="form-control" name="description">{{isset($p->descriptions) ? $p->descriptions :''}}</textarea>

  <br/>
  <button class="btn btn-primary">Submit</button>
</form>
@stop
