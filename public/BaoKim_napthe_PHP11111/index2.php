<?php
var_dump(1111111);
  /**
   * Account Profile
   *
   * @DAT-CMS - GTA Online Manager
   * @author Trong_Dat - 0163.889.0009
   * @copyright 2016
   * @version $Id: account.php, Phien ban thuong mai
   */
  define("_VALID_PHP", true);
  // require_once("init.php");
  
  if (!$user->logged_in)
      redirect_to("index.php");
	  
  $row = $user->getUserData();
?>
<?php include("header.php");?>
    <script type="text/javascript">
	function napthe(){
		frm = document.formNapthe;
		if(txtpin.value.length == 0){
			alert('Vui lòng nhập mã thẻ');
			return false;
		} else if(txtseri.value.length == 0){
			alert('Vui lòng nhập số seri');
			return false;
		}
		return true;
	}
	</script>
<div id="wrap">
  <div class="wojo-grid">
    <div class="columns">
      <div class="screen-60 tablet-90 phone-100 push-center">
        <div class="wojo form">

		
		
		
              <h4><?php echo Core::$word->NAP_THE;?></h4>

<?php
// Trèn thẳng trong napthe.php 
define('CORE_API_HTTP_USR', 'merchant_cxzc'); // lấy lúc đăng ký xong web trên bảo kim
define('CORE_API_HTTP_PWD', 'xczcxzpGZVYaLt16zUP8kMeOiSQAm47KNCuR'); // pm nó gửi cho cho

$bk = 'https://www.baokim.vn/the-cao/restFul/send';
$seri = isset($_POST['txtseri']) ? $_POST['txtseri'] : '';
$sopin = isset($_POST['txtpin']) ? $_POST['txtpin'] : '';
$username = $row->Username;
$ip = $_SERVER['REMOTE_ADDR'];
//Loai the cao (VINA, MOBI, VIETEL, VTC, GATE)
$mang = isset($_POST['chonmang']) ? $_POST['chonmang'] : '';
	if($mang=='MOBI'){
			$ten = "Mobifone";
		}
	else if($mang=='VIETEL'){
			$ten = "Viettel";
		}
	else if($mang=='GATE'){
			$ten = "Gate";
		}
	else if($mang=='VTC'){
			$ten = "VTC";
		}
	else $ten ="Vinaphone";

//Mã MerchantID dang kí trên Bảo Kim
$merchant_id = '30693';
//Api username 
$api_username = 'rog76456rpcom';
//Api Pwd d
$api_password = 'rogrpcom346sdadatr45763eru6utr';
//Mã TransactionId 
$transaction_id = time();
//mat khau di kem ma website dang kí trên B?o Kim
$secure_code = '1c1a6385e2e9c5a6';

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
//var_dump($result);die;
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = date("Y-m-d H:i:s",time());
//$time = time();roi
if(isset($_POST['btnCard'])){
	echo '<script>alert(999999)</script>';
									if($status==200){
								$amount = $result['amount'];
								switch($amount) {
									case 10000 :$xu = 100;break;
									case 20000 :$xu = 200;break;
									case 50000 :$xu = 500;break;
									case 100000 :$xu = 1000;break;
									case 200000 :$xu = 2000;break;
									case 300000 :$xu = 3000;break;
									case 500000 :$xu = 5000;break; 
								}
								$dbhost="localhost";
								$dbuser="root";
								$dbpass="";
								$dbname="rog-rp";						
								$db = mysql_connect($dbhost,$dbuser,$dbpass) or die("cant connect db");
								mysql_select_db($dbname,$db) or die("cant select db");
								mysql_query("UPDATE accounts SET Credits=Credits + $xu WHERE Username ='$username';");
								mysql_query("INSERT INTO `lichsunap` (`username`,`ip`,`type`,`status`,`amount`,`date`) VALUES ('$username','$ip','$ten','1','$amount',NOW())");
								echo'<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Bạn đã nạp thành công thẻ cào '.$ten.' mệnh giá '.$amount.'</div>';
								}
								else{
								mysql_query("INSERT INTO `lichsunap` (`username`,`ip`,`type`,`status`,`amount`,`date`) VALUES ('$username','$ip','$ten','0','Error',NOW())");
								echo'<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Thông tin thẻ cào không hợp lệ hoặc thẻ đã được sử dụng</div>';
								}
									}
?>
			   
              <form method="POST" action="nap-the.php" name="formNapthe">
                 
                <div class="field">
                  <input type="text" placeholder="<?php echo Core::$word->SO_SERI;?>" name="txtseri">
                </div>
                <div class="field">
                  <input type="text" placeholder="<?php echo Core::$word->MA_THE;?>" name="txtpin">
                </div>
                  <div class="field">
                    <label><?php echo Core::$word->LOAI_THE;?></label>
                    <div class="inline-group">
                      <label class="radio" name="chonmang">
                        <input type="radio" name="newsletter" value="VIETEL">
                        <i></i><?php echo Core::$word->VIETEO;?></label>
						<label class="radio" name="chonmang">
                        <input type="radio" name="newsletter" value="VINA">
                        <i></i><?php echo Core::$word->VINAPORN;?></label>
						<label class="radio" name="chonmang">
                        <input type="radio" name="newsletter" value="GATE">
                        <i></i><?php echo Core::$word->GATE;?></label>
						<label class="radio" name="chonmang">
                        <input type="radio" name="newsletter" value="MOBI">
                        <i></i><?php echo Core::$word->MOBIPHONE;?></label>
                    </div>
                  </div>
               
                <div class="clearfix content-center">
                  <button type="button" name="btnCard" class="wojo button"><?php echo Core::$word->NAP_THE;?></button>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php");?>