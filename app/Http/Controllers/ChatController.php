<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Sentinel;
use App\Entities\BandChatUsers;
use App\Events\Event;

use Illuminate\Http\Request;

class ChatController extends Controller
{
  public function checkRole(){
    if(!Sentinel::check()){return 'no-role';}

    $role_chat = Sentinel::findRoleBySlug('chat_room_manager');

    if(empty($role_chat)){return 'no-role';}
    $user = Sentinel::getUser();
    if(Sentinel::inRole('admin')){
      return 'admin';
    }
    if(Sentinel::inRole($role_chat)){
      return 'mod_chat';
    }
    return 'no-role';
  }

  public function newChat(Request $request){
    if(!Sentinel::check()){
      return;
    }

    $check = BandChatUsers::checkBandedUser(Sentinel::getUser());

    if($check==='chat.block_lv2'){
      return $check;
    }

    $text = $request->text;
    if($check==='chat.block_lv1'){    
      $text = 'Xin chaò! Tớ là con súc vật dễ thương. Gâu Gâu!';
    }


    event(new Event($text));
  }

  public function halderViolate(){
    $action = Input::get('_action');
    $user_band_id = Input::get('user_id');
    $user = Sentinel::getUser();
    if(empty($action) || empty($user_band_id) || empty($user)){
        return 'Lỗi empty object';
    }

    if(!$user->hasAccess($action)){
        return 'Hành động chưa được cấp quyền!';
    }
    return BandChatUsers::bandUser($user_band_id,$action);
  }


  public function checkBandedUser(){
    $userId = Input::get('userId');
    if(empty($userId)){
      return;
    }
    $user = Sentinel::findUserById($userId);

    if(empty($user)){
      return;
    }

    return BandChatUsers::checkBandedUser($user);

  }
}
