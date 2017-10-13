<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Sentinel,Redirect;
use Users;
use App\Entities\ChatMessages;
use App\Entities\Matchs;
use App\Entities\Leaguages;
use App\Entities\Clubs;
use App\Entities\Settings;
use App\Entities\Servers;
use Carbon\Carbon as Carbon;
use App\Entities\DebtUsers;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function starter(){

      if (!session_id()) {
          session_start();
      }


      $fb = new \Facebook\Facebook([
        'app_id' => '1812749958752149',
        'app_secret' => '32a370b14d3b6140736ce7eaa13c962c',
        'default_graph_version' => 'v2.8',
      ]);
      $helper = $fb->getRedirectLoginHelper();

      $permissions = ['email']; // Optional permissions
      $loginUrl = $helper->getLoginUrl(url('/') . '/fb-callback', $permissions);

      $matchs = Matchs::select('alias','team_1','team_2','leaguage_id','date_start','status','is_pay')->where('status','<>',2)->orderBy('date_start')->get();

      foreach($matchs as $m){
        $leaguage = Leaguages::where('id',$m->leaguage_id)->select('image_cover','name')->first();
        $m->leaguage_name = isset($leaguage->name)?$leaguage->name:null;

        $team_1 = Clubs::where('id',$m->team_1)->select('name','logo_url')->first();
        $team_2 = Clubs::where('id',$m->team_2)->select('name','logo_url')->first();
        $m->team_1_name = isset($team_1->name)?$team_1->name:'Chưa xác định clb';
        $m->team_1_logo = isset($team_1->logo_url)?$team_1->logo_url:null;
        $m->team_2_name = isset($team_2->name)?$team_2->name:'Chưa xác định clb';
        $m->team_2_logo = isset($team_2->logo_url)?$team_2->logo_url:null;

        $m->time_start = date('h:i A',strtotime($m->date_start));
        $m->day_start = date('d/m',strtotime($m->date_start));


      }

      return view ('starter',['matchs'=>$matchs,'fb_url'=>$loginUrl]);
    }

    public function showMatch($alias){
      if (!session_id()) {
          session_start();
      }

      $fb = new \Facebook\Facebook([
        'app_id' => '1812749958752149',
        'app_secret' => '32a370b14d3b6140736ce7eaa13c962c',
        'default_graph_version' => 'v2.8',
      ]);
      $helper = $fb->getRedirectLoginHelper();

      $permissions = ['email']; // Optional permissions
      $loginUrl = $helper->getLoginUrl(url('/') . '/fb-callback', $permissions);


      $match = Matchs::where('alias',$alias)->select('name','id','team_1','team_2','leaguage_id','date_start','status','fb_share_image','server','review_url','is_pay')->first();

      if(!empty($match)){
        if($match->status != 2){
          $leaguage = Leaguages::where('id',$match->leaguage_id)->select('name')->first();
          $match->leaguage_name = isset($leaguage->name)?$leaguage->name:'Giải đấu chưa xác định';
          $team_1 = Clubs::where('id',$match->team_1)->select('name','logo_url')->first();
          $team_2 = Clubs::where('id',$match->team_2)->select('name','logo_url')->first();
          $match->team_1_name = isset($team_1->name)?$team_1->name:'Đội nhà chưa xác định';
          $match->team_1_logo = isset($team_1->logo_url)?$team_1->logo_url:null;
          $match->team_2_name = isset($team_2->name)?$team_2->name:'Đội khách chưa xác định';
          $match->team_2_logo = isset($team_2->logo_url)?$team_2->logo_url:null;
          $match->time_count = (new Carbon($match->date_start))->diffInSeconds(Carbon::now());
          $match->fee = $this->getMatchFee($match);
          $_SESSION['lastpage'] = $_SERVER['REQUEST_URI'];
          return view ('home',array('match'=>$match,'fb_url'=>$loginUrl));
        } else{
           return view  ('review',array('match'=>$match));
        }
      }
      else{
        abort(404);
      }
    }

    //Kiểm tra quyền của người xem đối với trận đấu.
    public function getMatchFee(Matchs $match){


      if(empty($match->is_pay ) || !$match->is_pay){
        return  'MATCH_AVAILABLE';
      }

      $user = Sentinel::getUser();
      if(empty($user)){
        return 'USER_NOT_EXISTED';
      }

      if(DebtUsers::isDebted($user->id,$match->id)){
        return 'MATCH_AVAILABLE';
      }

      if(DebtUsers::isBuy($user->id,$match->id)){
        return 'MATCH_AVAILABLE';
      }



      if(empty($user->expired_day)){
        //Người dùng chưa mua gói tháng.
        return 'EXPIRED_DAY_NULL';
      }

      $expired_day = new Carbon($user->expired_day);

      if($expired_day < Carbon::now()){
        //Hết hạn gói tháng.
        return 'OUT_OF_DATE';
      }
      return 'MATCH_AVAILABLE';

    }

    public function fbCallback(){
      if (!session_id()) {
          session_start();
      }

      $fb = new \Facebook\Facebook([
        'app_id' => '1812749958752149',
        'app_secret' => '32a370b14d3b6140736ce7eaa13c962c',
        'default_graph_version' => 'v2.8',
      ]);

      $helper = $fb->getRedirectLoginHelper();
      $_SESSION['FBRLH_state']=$_GET['state'];

      try {
        $accessToken = $helper->getAccessToken();
      } catch(\Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(\Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }

      if (! isset($accessToken)) {
        if ($helper->getError()) {
          header('HTTP/1.0 401 Unauthorized');
          echo "Error: " . $helper->getError() . "\n";
          echo "Error Code: " . $helper->getErrorCode() . "\n";
          echo "Error Reason: " . $helper->getErrorReason() . "\n";
          echo "Error Description: " . $helper->getErrorDescription() . "\n";
        } else {
          header('HTTP/1.0 400 Bad Request');
          echo 'Bad request';
        }
        exit;
      }

      // Logged in
      // echo '<h3>Access Token</h3>';
      // var_dump($accessToken->getValue());

      // The OAuth 2.0 client handler helps us manage access tokens
      $oAuth2Client = $fb->getOAuth2Client();

      // Get the access token metadata from /debug_token
      $tokenMetadata = $oAuth2Client->debugToken($accessToken);
      // echo '<h3>Metadata</h3>';
      // var_dump($tokenMetadata);

      // Validation (these will throw FacebookSDKException's when they fail)
      $tokenMetadata->validateAppId('1812749958752149'); // Replace {app-id} with your app id
      // If you know the user ID this access token belongs to, you can validate it here
      //$tokenMetadata->validateUserId('123');
      $tokenMetadata->validateExpiration();

      if (! $accessToken->isLongLived()) {
        // Exchanges a short-lived access token for a long-lived one
        try {
          $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
          echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
          exit;
        }

        echo '<h3>Long-lived</h3>';
        var_dump($accessToken->getValue());
      }

      $_SESSION['fb_access_token'] = (string) $accessToken;

      try {
      // Returns a `Facebook\FacebookResponse` object
        $response = $fb->get('/me?fields=id,first_name,last_name,email,locale,education,cover,birthday,picture', $accessToken);
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
      }
      $fbuser = $response->getGraphUser()->asArray();

      $user = Users::where('email',$fbuser['email'])->first();

      if(empty($user)){
        try{
          $user = Sentinel::registerAndActivate([
           'email'=>$fbuser['email'],
           'fb_id'=>$fbuser['id'],
           'fb_token'=>(string)$accessToken,
           'password'=>'123',
           'first_name'=>$fbuser['first_name'],
           'last_name'=>$fbuser['last_name'],

          ]);

          $auth = Sentinel::authenticateAndRemember([
             'email'=>$user->email,
             'password'=>'123'
           ]);
           if($auth){
             return redirect('/');
           }
        }
        catch (\Illuminate\Database\QueryException $e){
          echo $e->getMessage();
        }
      }else{
        Sentinel::login($user);
        if(isset($_SESSION['lastpage'])) {
          $lastpage = $_SESSION['lastpage'];
          unset($_SESSION['lastpage']);
          return redirect($lastpage);
        }else{
          return redirect('/');
        }
      }

    }

    public function logout(){
      Sentinel::logout();
      return Redirect::back();
    }


    public function listChat(){
      $messages = ChatMessages::select('id','fb_id','first_name','last_name','message','user_id')->orderBy('id','desc')->take(100)->get()->toArray();
      return array_reverse($messages);
    }


    public function listVideos(){
      return view ('list_videos');
    }

    // public function login(){
    //   if (!session_id()) {
    //       session_start();
    //   }
    //   $fb = new \Facebook\Facebook([
    //     'app_id' => '1812749958752149',
    //     'app_secret' => '32a370b14d3b6140736ce7eaa13c962c',
    //     'default_graph_version' => 'v2.8',
    //   ]);
    //
    //   $helper = $fb->getRedirectLoginHelper();
    //
    //   $permissions = ['email']; // Optional permissions
    //   $loginUrl = $helper->getLoginUrl(url('/') . '/fb-login', $permissions);
    // }

    //Send notification to Facebook
    public function postFb(){
      $fb = new \Facebook\Facebook([
        'app_id' => '1812749958752149',
        'app_secret' => '32a370b14d3b6140736ce7eaa13c962c',
        'default_graph_version' => 'v2.8',
        'grant_type' => 'client_credentials'
        //'default_access_token' => '{access-token}', // optional
      ]);

      //print_r($fb->getApp()->getAccessToken());die;

       try{
           $post = $fb->post('/396057174078674/notifications/',  array(
            'access_token' => '1812749958752149|32a370b14d3b6140736ce7eaa13c962c',
            'href' => 'https://dualnown.net/',  //this does link to the app's root, don't think this actually works, seems to link to the app's canvas page
            'template' => 'bongdatv đang phát trực tiếp trận MU - MC',
            'ref' => 'Notification sent ' //this is for Facebook's insight
          ));
       }catch(Facebook\Exceptions\FacebookResponseException $ex){
          echo 'Có lỗi: '. $ex.getMessage();
       }

    }


    public function getServer($server_id){
      $server = Servers::where('id',$server_id)->first();
      return json_encode(['server_url'=>$server->value]);
    }

    public function userUnJoin(){
        $match_id = Input::get('match_id');
        $count = Input::get('count');
        if( empty($match_id) || empty($count) ){return;}
        if (!Cache::has('count-'.$match_id)) {
            Cache::store('file')->put('count-'.$match_id,'0',120);
            //echo'khong co cache';
        }
        $c = Cache::get('count-'.$match_id);
        $c+= $count;
        event(new \App\Events\CountViewEvent($match_id,$c));
        Cache::store('file')->put('count-'.$match_id, $c, 120); 

    }
}
