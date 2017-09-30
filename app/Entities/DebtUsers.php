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
        return $this->where('user_id',$user_id)->first();
      }
      return $this->where(['user_id'=>$user_id,'match_id'=>$match_id])->first();
    }

    protected function destroyDebt($user_id){
      try{
        $this->where('user_id',$user_id)->delete();
        return 1;
      }catch(\Illuminate\Database\QueryException $ex){
        return 0;
      }
    }
}
