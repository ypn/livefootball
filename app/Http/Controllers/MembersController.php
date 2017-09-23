<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect,Validator;
use App\Entities\Permissions;
use App\Entities\Roles;
use DB,Sentinel;

class MembersController extends Controller
{
    public function listRole(){
      $roles = Roles::select('id','name','slug')->get();
      return view('dashboard.members.list_role',[
        'roles'=>$roles
      ]);
    }

    public function addRole($id = null){
      $data=array();
      $ps = Permissions::select('id','alias')->get();
      $data['ps'] = $ps;
      if($id!=null){
        $role = Sentinel::findRoleById($id);
        $data['role'] = $role;
      }
      return view ('dashboard.members.add_role',$data);
    }

    public function createRole($id= null){
      $input = Input::all();
      $rules  = [
        'name'=>'required',
        'alias'=>'required'
      ];

      $validator = Validator::make($input,$rules);

      if($validator->fails()){
        return Redirect::back()->with('error',$validator->messages());
      }

      if($id !== null){
        $role = Sentinel::findRoleById($id);
      }

      if(!isset($role) || empty($role)){
        $role = Sentinel::getRoleRepository()->createModel();
      }

      try{
        $role->name = $input['name'];
        $role->slug = $input['alias'];
        $role->permissions = array();
        foreach($input['roles'] as $r){
          $role->addPermission($r);
        }
        $role->save();

        return Redirect::back()->with('status','handle_success');

      }catch(\Illuminate\Database\QueryException $ex){
        return Redirect::back()->with('error',$ex->getMessage());
      }

    }

    public function viewRole($id){
      $role = Sentinel::findRoleById($id);
      if(!empty($role)){
          $users = $role->users()->with('roles')->get();
          return view ('dashboard.members.view_role',['r'=>$role,'users'=>$users]);
      }
        return view ('dashboard.members.view_role');
    }

    public function deleteRole(){
      $id = Input::get('id');
      if(!empty($id)){
        try{
          Roles::where('id',$id)->delete();
          return Redirect::back()->with('status','handle_success');
        }catch(\Illuminate\Database\QueryException $ex){
          return Redirect::back()->with('error',$ex->getMessage());
        }
      }
      return Redirect::back()->with('error','Không tìm thấy bản ghi!');
    }


    public function listPermissions(){
      $permissions = Permissions::select('id','name','descriptions')->get();
      return view ('dashboard.members.list_permissions',['permissions'=>$permissions]);
    }

    public function addPermission($id = null){
      if($id !=null){
        $permission = Permissions::where('id',$id)->first();
        if(!empty($permission)){
          return view ('dashboard.members.add_permissions',['p'=>$permission]);
        }
        return view ('dashboard.members.add_permissions');
      }
      return view ('dashboard.members.add_permissions');
    }

    public function createPermission($id = null){
      $input = Input::all();
      $rules  = [
        'name'=>'required',
        'slugs'=>'required'
      ];
      $messages = [
          'slugs.required'=>'Slugs is required',
      ];
      $validator = Validator::make($input,$rules,$messages);
      if($validator->fails()){
        return Redirect::back()->with('error', $validator->messages());
      }

      if($id!==null){
        $permission = Permissions::where('id',$id)->first();
      }

      if(!isset($permission) || empty($permission)){
        $permission = new Permissions();
      }
      try{
        $permission->name = $input['name'];
        $permission->alias = $input['slugs'];
        $permission->descriptions = isset($input['description']) && trim($input['description'])!='' ? $input['description'] : 'No description yet!';
        $permission->save();
      }  catch(\Illuminate\Database\QueryException $ex)  {
        return Redirect::back()->with('error',$ex->getMessage());
      }
        return Redirect::back()->with('status','handle_success');
    }

    public function deletePermission(){
      $id = Input::get('id');
      if(!empty($id))  {
        try{
          Permissions::where('id',$id)->delete();
          return Redirect::back()->with('status','handle_success');
        }catch(\Illuminate\Database\QueryException $ex){
          return Redirect::back()->with('error',$ex->getMessage());
        }
      }

      return Redirect::back()->with('error','Không tìm thấy bản ghi!');
    }

    public function search(){
      $param = Input::get('param');
      if(!empty($param)){
          $users = DB::table('users')->select('id','first_name','last_name','fb_id')->whereRaw("MATCH(first_name,last_name,fb_id,email) AGAINST('$param')")->get();
          return json_encode($users);
      }
      return 0;
    }

    public function addUserRole(){

      $role_id = Input::get('_roleId');
      $user_id = Input::get('_userId');
      if(empty($role_id) || empty($user_id)){
        return 0;
      }
      try{
        $user = Sentinel::findById($user_id);
        Sentinel::findRoleById($role_id)->users()->attach($user);
        return 1;
      }catch(\Illuminate\Database\QueryException $ex){
        if($ex->getCode() == 23000){
          return -1;
        }
        return 0;
      }
    }

    public function deleteUserRole(){
      $role_id = Input::get('role-id');
      $user_id = Input::get('user-id');

      if(empty($role_id) || empty ($user_id)){
        return Redirect::back()->with('error','Không tìm thấy bản ghi!');
      }

      try{
        $role = Sentinel::findRoleById($role_id);
        $user = Sentinel::findById($user_id);
        $role->users()->detach($user);
        return Redirect::back()->with('status','handle_success');
      }catch(\Illuminate\Database\QueryException $ex){
        return Redirect::back()->with('error',$ex->getMessage());
      }

    }
}
