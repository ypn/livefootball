<?php
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon as Carbon;
use Sentinel;

class DebtUsers extends Model
{
    protected $guarded = ['id'];
    protected $table = 'debt_users';


    protected function add($match_id,$match_title){
      $user = Sentinel::getUser();
      try{
        $this->user_id = $user->id;
        $this->match_id = $match_id;
        $this->match_title = $match_title;
        $user->expired_day = Carbon::yesterday();
        $user->save();
        $this->save();
        return array(
          'state'=>'SUCCESS',
          'message'=>'Ghi nợ thành công.'
        );
      }catch(\Illuminate\Database\QueryException $ex  ){
        return array(
          'state'=>'FAILURED',
          'message'=>'Ghi nợ thất bại: ' . $ex->getMessage()
        );
      }
    }

    protected function isDebted($user_id,$match_id = null){
      if($match_id===null){
        return $this->where('user_id',$user_id)->where('type','debt')->first();
      }
      return $this->where(['user_id'=>$user_id,'match_id'=>$match_id,'type'=>'debt'])->first();
    }

    protected function isBuy($user_id,$match_id){
      return $this->where(['user_id'=>$user_id,'match_id'=>$match_id,'type'=>'buy'])->first();
    }

    protected function destroyDebt($id){
      try{
        $this->where('id',$id)->first()->update(['type'=>'buy']);      

        return 1;
      }catch(\Illuminate\Database\QueryException $ex){
        return 0;
      }
    }

    protected function buyMatch($match_id,$match_title){
      $user = Sentinel::getUser();
      try{
        $this->user_id = $user->id;
        $this->match_id = $match_id;
        $this->match_title = $match_title;
        $this->type='buy';
        $user->remain_coin -= 5000;
        $user->save();
        $this->save();
        return 'BUY_SUCCESS';

      }catch(\Illuminate\Database\QueryException $ex){
        return 'BUY_FAILURE';
      }
    }
}
