<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Sentinel,Redirect;
use Carbon\Carbon as Carbon;

use App\Entities\DebtUsers;

class CoinController extends Controller
{
    public function show(){
      return view ('coin');
    }

    public function addToDebt(){

      $user = Sentinel::getUser();
      //người dùng không tồn tại hoặc chưa  đăng nhập
      if(empty($user)){
        return array(
          'state'=>'USER_NOT_EXISTED',
          'message'=>'Người dùng không tồn tại hoặc chưa đăng nhập.'
        );
      }

      $input  = Input::all();
      $matchId = isset($input['match_id']) ? $input['match_id'] : 0;
      $matchName = isset($input['match_title']) ? $input['match_title'] : '';
      $t = $this->isDebted($user);
      if($t['state'] === 'ENABLED'){
        return(DebtUsers::add($matchId,$matchName));
      }
      return $t;
    }

    /*Kiểm tra xem người dùng còn khả năng ghi nợ hay không?
     *Người dung có thể  ghi nợ trận đấu trong các trường hợp:
     -Là người dùng mới => số ghi nợ = 0
     -Là người dùng đã nạp thẻ nhưng không thể mua gói tháng do không đủ 30.000 coins hoặc không thể mua trận đấu do không đủ 5.000 coins
     -Người dùng đã nạp thẻ nhưng đã dùng hết có thẻ ghi nợ khi nợ cũ đã được xóa hết.
    */
    protected function isDebted($user){
      //Kiểm tra xem người dùng còn gói tháng hay không.
      //Người dùng chưa bao giờ nạp gói tháng.
      if(empty($user->expired_day)){
        return array(
          'state'=>'ENABLED',
          'message'=>'Người dùng chưa bao giờ nạp mua gói tháng.'
        );
      }

      $expired = new Carbon($user->expired_day);
      //Tài khoản gói tháng vẫn còn giá trị
      if($expired >= Carbon::now()){
        return array(
          'state'=>'LONGER_USED',
          'message'=>'Tài khoản tháng vẫn còn giá trị'
        );
      }
      //Số dư hiện tại vẫn còn có thể mua trận đấu (>= 5000 coins);
      if($user->remain_coin >=30000){
        return array(
          'state'=>'CAN_EXPIRED',
          'message'=>'Số coin vẫn đủ để mua gói tháng'
        );
      }
      if($user->remain_coin >=5000){
        return array(
          'state'=>'CAN_BUY_MATCH',
          'message'=>'Số coin vẫn đủ để mua trận đấu'
        );
      }

      //Kiểm tra xem người dùng đã nợ hay chưa
      if(!empty(DebtUsers::isDebted($user->id))){
        return array(
          'state'=>'IS_DEBTED',
          'message'=>DebtUsers::isDebted($user->id)->match_title);
      }

      return array(
        'state'=>'ENABLED',
        'message'=>'Có thể ghi nợ.'
      );
    }

    //Giao dịch nạp coin
    protected function transition($amount){
      $card = 'vietel';
      $user = Sentinel::getUser();
      $data = array();
      if(empty($user)){
        return;
      }

      //Check xem user có nợ không?
      if(!empty(DebtUsers::isDebted($user->id))){
        $data['is_debted'] = DebtUsers::isDebted($user->id);
        if(DebtUsers::destroyDebt($user->id)){
          $amount -= 5000;
        }else{
          return;
        }
      }
      try{
        $user->total_coin += $amount;
        $user->remain_coin += $amount;
        $user->save();
        $data['status'] = 200;
        $data['amount'] = $amount;
        $data['remain_coin'] = $user->remain_coin;
        return $data;
      }catch(\Illuminate\Database\QueryException $ex){
        return 0;

      }

      return 0;
    }

    //Gia hạn gói tháng
    public function expireMonthTicket(){
      if(!Sentinel::check()){
        return;
      }

      $user = Sentinel::getUser();

      //Số coin hiện tài không đủ 30.000 coins
      if($user->remain_coin < 30000){
        return Redirect::back()->with('error','Bạn đang có ' . number_format($user->remain_coin,0,'','.') .'không đủ 30.000 coins để thực hiện giao dịch.');
      }

      //Gói tháng vẫn còn giá trị
      if(!empty($user->expired_day)){
        $expire = new Carbon($user->expired_day);
        if($expire >= Carbon::now()){
          return Redirect::back()->with('error','Gói tháng của bạn vẫn còn giá trị đến ngày: ' . date('d/m/Y ',strtotime($expire)));
        }
      }

      //Thục hiên mua gói tháng
      try{
        $user->remain_coin-=30000;
        $user->expired_day = Carbon::now()->addMonth(1);
        $user->save();
        return Redirect::back()->with('success','Gia hạn gói tháng thành công đến ngày: ' . date('d/m/Y',strtotime($user->expired_day)));
      }catch(\Illuminate\Database\QueryException $ex){
        return Redirect::back()->with('error','Lỗi chưa xác định, liên lạc với chúng tôi để được hỗ trợ!');
      }

    }

    public function napthe1(){
      $amount = 10000;
      $card = 'Vietel';
      $transition = $this->transition($amount);
      //print_r($transition);die;
      if($transition && $transition['status'] === 200){
        $extend = isset($transition['is_debted']) ? ' (Đã trừ 5.000 coins bạn ghi nợ cho trận đấu ' . $transition['is_debted']->match_title .' vào ngày ' .date('d/m/Y',strtotime($transition['is_debted']->created_at)). ')' :'';
        return Redirect::back()->with('success','Bạn vừa nạp thành công thẻ <b>' . $card . ' ' . number_format($amount,0,'','.') . ' VNĐ </b> vào tài khoản.'.' Số coins được cộng thêm: <b>' . number_format($transition['amount'],0,'','.') .' coins</b>.' . ' Số coins hiện tại của bạn là: <b>' . number_format($transition['remain_coin'],0,'','.').' coins </b>' . $extend);
      }else{
        return Redirect::back()->with('error','Nap the that bai');
      }

      header('Content-Type: text/html; charset=utf-8');
      define('CORE_API_HTTP_USR', 'merchant_19002');
      define('CORE_API_HTTP_PWD', '19002mQ2L8ifR11axUuCN9PMqJrlAHFS04o');

      $bk = 'https://www.baokim.vn/the-cao/restFul/send';
      $seri = isset($_POST['txtseri']) ? $_POST['txtseri'] : '';
      $sopin = isset($_POST['txtpin']) ? $_POST['txtpin'] : '';
      //Loai the cao (VINA, MOBI, VIETEL, VTC, GATE)
      $mang = isset($_POST['chonmang']) ? $_POST['chonmang'] : '';
      $user = isset($_POST['txtuser']) ? $_POST['txtuser'] : '';



      	if($mang=='MOBI'){
      			$ten = "Mobifone";
      		}
      	else if($mang=='VIETEL'){
      			$ten = "Vietel";
      		}
      	else if($mang=='GATE'){
      			$ten = "Gate";
      		}
      	else if($mang=='VNM'){
      			$ten = "VNM";
      		}
      	else $ten ="Vinaphone";

      //Mã MerchantID dang kí trên Bảo Kim
      $merchant_id = '30804';
      //Api username
      $api_username = 'bongdatv454online';
      //Api Pwd d
      $api_password = 'bongdatv454onlinerty43y367';
      //Mã TransactionId
      $transaction_id = time();
      //mat khau di kem ma website dang kí trên B?o Kim
      $secure_code = '19591a727e973180';
      // $email anhiuem208@gmail.com

      $arrayPost = array(
      	'merchant_id'=>$merchant_id,
      	'api_username'=>$api_username,
      	'api_password'=>$api_password,
      	'transaction_id'=>$transaction_id,
      	'card_id'=>$mang,
      	'pin_field'=>$sopin,
      	'seri_field'=>$seri,
      	'algo_mode'=>'hmac'
      );

      ksort($arrayPost);

      $data_sign = hash_hmac('SHA1',implode('',$arrayPost),$secure_code);

      $arrayPost['data_sign'] = $data_sign;

      $curl = curl_init($bk);

      curl_setopt_array($curl, array(
      	CURLOPT_POST=>true,
      	CURLOPT_HEADER=>false,
      	CURLINFO_HEADER_OUT=>true,
      	CURLOPT_TIMEOUT=>30,
      	CURLOPT_RETURNTRANSFER=>true,
      	CURLOPT_SSL_VERIFYPEER => false,
      	CURLOPT_HTTPAUTH=>CURLAUTH_DIGEST|CURLAUTH_BASIC,
      	CURLOPT_USERPWD=>CORE_API_HTTP_USR.':'.CORE_API_HTTP_PWD,
      	CURLOPT_POSTFIELDS=>http_build_query($arrayPost)
      ));

      $data = curl_exec($curl);

      $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

      $result = json_decode($data,true);
      date_default_timezone_set('Asia/Ho_Chi_Minh');
      $time = time();
      //$time = time();
      if($status==200){
          $amount = $result['amount'];
      	switch($amount) {
      		case 10000: $xu = 10000; break;
      		case 20000: $xu = 20000; break;
      		case 30000: $xu = 30000; break;
      		case 50000: $xu= 50000; break;
      		case 100000: $xu = 100000; break;
      		case 200000: $xu = 200000; break;
      		case 300000: $xu = 300000; break;
      		case 500000: $xu = 500000; break;
      		case 1000000: $xu = 1000000; break;
      	}
      	//$dbhost="localhost";
      	//$dbuser ="xemtruoc_ngaydep";
      	//$dbpass = "BL&v7Wd#hj07";
      	//$dbname = "xemtruoc_tuonglai";
      	//$db = mysql_connect($dbhost,$dbuser,$dbpass) or die("cant connect db");
      	//mysql_select_db($dbname,$db) or die("cant select db");


      	//mysql_query("UPDATE hqhpt_users SET tien = tien + $xu WHERE username  ='$user';");

          // Xu ly thong tin tai day

      	echo '<script>alert("Bạn đã thanh toán thành công thẻ '.$ten.' mệnh giá '.$amount.' ");

      	 window.location = "http://macintosh.vn"
      	</script>';

        //CHỗ này hả


      }
      else{
      	echo 'Status Code:' . $status . '<hr >';
          $error = $result['errorMessage'];
      	echo $error;
      	echo '<script>alert("Thong tin the cao khong hop le!");


      	 window.location = ""
      	</script>';
      }
      return view ('napthe');
    }
    public function napthe(){
      // if(!Sentinel::check()){
      //   return 'bạn cần đăng nhập trước.';
      // }
      // return view ('napthe',array('user'=>Sentinel::getUser()));
      return view ('coin');
    }
}

#dùng cái này đi bạn
