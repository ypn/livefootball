<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Events\Event;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(){



      if (!session_id()) {
          session_start();
      }

      $fb = new \Facebook\Facebook([
        'app_id' => '1812749958752149',
        'app_secret' => '32a370b14d3b6140736ce7eaa13c962c',
        'default_graph_version' => 'v2.8',
      ]);

      // try {
      //     // Returns a `Facebook\FacebookResponse` object
      //     $response = $fb->get('/me?fields=id,name',$_SESSION['fb_access_token']);
      //   } catch(Facebook\Exceptions\FacebookResponseException $e) {
      //     echo 'Graph returned an error: ' . $e->getMessage();
      //     exit;
      //   } catch(Facebook\Exceptions\FacebookSDKException $e) {
      //     echo 'Facebook SDK returned an error: ' . $e->getMessage();
      //     exit;
      //   }
      //
      //   $user = $response->getGraphUser();

        // OR
        // echo 'Name: ' . $user->getName();

      $helper = $fb->getRedirectLoginHelper();

      $permissions = ['email']; // Optional permissions
      $loginUrl = $helper->getLoginUrl(url('/') . '/fb-callback', $permissions);

      return view ('home',array('fb_url'=>$loginUrl));
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

      try {
        $accessToken = $helper->getAccessToken();
      } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
      } catch(Facebook\Exceptions\FacebookSDKException $e) {
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
      echo '<h3>Access Token</h3>';
      var_dump($accessToken->getValue());

      // The OAuth 2.0 client handler helps us manage access tokens
      $oAuth2Client = $fb->getOAuth2Client();

      // Get the access token metadata from /debug_token
      $tokenMetadata = $oAuth2Client->debugToken($accessToken);
      echo '<h3>Metadata</h3>';
      var_dump($tokenMetadata);

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

    }

    public function event(Request $request){
      $value = Crypt::decrypt('eyJpdiI6ImhYZlBidVArNXZZRHZEb1VpVTYyNVE9PSIsInZhbHVlIjoiTnBoWG91YzNEZFYyV2p5NGZXWWFJUT09IiwibWFjIjoiMjhmY2JiMjM4NDdhODBlYjY0M2Y0NjAzYzQ4NWFmMjg5NjYzYWE1ZDE2ODY2ZTQ2NDk1ZjhiZTMzNTkwNDgwZSJ9');
      echo $value;
    }

    public function listChat(){
      //CO the luu lich su chat
      return array();
    }

    public function login(){

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
      $loginUrl = $helper->getLoginUrl(url('/') . '/fb-login', $permissions);
    }
}
