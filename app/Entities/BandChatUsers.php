<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class BandChatUsers extends Model
{
    protected $guarded = ['id'];
    protected $table = 'band_chat_users';


    protected function bandUser($uid,$type){
        $user_band = $this->where('user_id',$uid)->first();
        if(empty($user_band)){
          $user_band = new BandChatUsers();
        }

        try{
          $user_band->user_id = $uid;
          $user_band->type = $type;
          $user_band->save();
          switch ($type) {
            case 'chat.block_lv1':
              return 'Đã biến thành súc vật!';
            case 'chat.block_lv2':
              return 'Khóa mõm thành cmn công!';
            case 'chat.delete':
              return 'Đã xóa bình luận!';
            default:
              break;
          }

        }catch(\Illuminate\Database\QueryException $ex){
          return $ex->getMessage();
        }
    }

    protected function checkBandedUser($user){
      $banded = $this->where('user_id',$user->id)->first();
      if(!empty($banded)){
        return $banded->type;
      }
    }

    protected function unBandUser($user_id){
    
    }
}
