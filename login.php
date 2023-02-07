<?php

    include_once('includes/functions.php');
	
	require_once 'test.php';
	$login_url=$client->createAuthUrl();
    //session_start();
    error_reporting(0);
	
include_once('conn.php');
	
	
	
 //setcookie ("passr", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
	if(isset($_SESSION['register_sucess']) && $_SESSION['register_sucess']==TRUE ){
		echo "<script LANGUAGE='JavaScript' >alert('Registration Sucessfull')</script>";
		unset($_SESSION['register_sucess']);
	}
	
	


	// after submit

if (isset($_POST['submit'])) {

	$_POST=stripcslashes_ankur($_POST);
	$_POST=mysqliescape_ankur($_POST);


	

// $loginDate=date();
// cookie uid+login date =current 
// login log api 
	

	$userName=$_POST['userName'];
	$userEmail=$_POST['userEmail'];
	$country_code=$_POST['country_code'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	
		
	
$email=$_POST['userEmails'];
if ($email=='')
{
	$country_code1=$_POST['country_code1'];
}else 
{
	$country_code1='';
}
	$phone1=$_POST['phones'];
	
	//echo $country_code1;exit;
	
$url_cat= app_url()."/api3/send_otp";
$myvars_cat=array(
			'operation'=>"send_otp",
			'country_code'=>$country_code1,
			'phone_number'=>$phone1,
			'email_id'=>$email,	
			'api_key'=>'cda11aoip2Ry07CGWmjEqYvPguMZTkBel1V8c3XKIxwA6zQt5s'
			
			);
			
 
			 // print_r($myvars_cat);exit;
			
			$phn=$myvars_cat['phone_number'];
			$email=$myvars_cat['email_id'];
			
			$ch = curl_init($url_cat); 			
		$data_string = json_encode($myvars_cat);    
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");    
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
		
			$res_cat = json_decode(curl_exec($ch),true);
			
			
			//print_r($myvars_cat);exit;
				
			$responce1 = $res_cat["responseStatus"];
                  if($responce1==200)
                  {
					  if($email=='')
					  {
						  $a=Phone;
					  }
					  else 
					  {
						  $a=Email;
					  }
			echo ("<script LANGUAGE='JavaScript'>
					
					window.location.href='otpLogin.php?phn=$phn&email=$email&country_code=$country_code1';
				</script>");
				  }
 

$url_cat= app_url()."/api3/user_login";
$myvars_cat=array(
			'operation'=>"user_login",
			'username'=>$userName,
			'email'=>$userEmail,
			'country_code'=>$country_code,	
			'phone'=>$phone,
			'password'=>$password,
			'otp'=>'',
			'api_key'=>'cda11aoip2Ry07CGWmjEqYvPguMZTkBel1V8c3XKIxwA6zQt5s'
			
			);
			// print_r($myvars_cat);
		
$ch = curl_init($url_cat); 			
		$data_string = json_encode($myvars_cat);    
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");    
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
		
			$res_cat = json_decode(curl_exec($ch),true);
			
 $userId= $res_cat['data']['0']['id']; 
$uName= $res_cat['data']['0']['username'];
$useremail= $res_cat['data']['0']['email'];
$usermobileno= $res_cat['data']['0']['phone'];
$passwordPost= $res_cat['data']['0']['password'];
$todayDate=date('Y-m-d');


	if(isset($_POST["remember"]))
 {
	 
	 
 setcookie("Unames", $uName, time() +10 * 365 * 24 * 60 * 60);
 setcookie("pswrd", $password, time() +10 * 365 * 24 * 60 * 60);
 setcookie("userEmail", $useremail, time() +10 * 365 * 24 * 60 * 60);
 setcookie("phone", $usermobileno, time() +10 * 365 * 24 * 60 * 60);
 setcookie("useid", $userId,time() +10 * 365 * 24 * 60 * 60);
 setcookie("times", $todayDate, time() +10 * 365 * 24 * 60 * 60);
 
}
 //echo $_COOKIE['times'];exit;
//2020-07-02
 
 $_SESSION['userId']=$userId; 

$_SESSION['uName']=$uName;

$_SESSION['useremail']=$useremail;
$_SESSION['usermobileno']=$usermobileno;
$_SESSION['userAddress']=$userAddress;
$_SESSION['pwd']=$passwordPost;

// print_r($_SESSION);
$responce = $res_cat["responseStatus"];
                  if($responce==200)
                  {

				
					$ip_server= $_SERVER['REMOTE_ADDR']; 
			function get_operating_system() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $operating_system = 'Unknown Operating System';

//Get the operating_system
		if (preg_match('/linux/i', $u_agent)) {
			$operating_system = 'Linux';
		} elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
		return  $operating_system = 'Mac';
		} elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
		return  $operating_system = 'Windows';
		} elseif (preg_match('/ubuntu/i', $u_agent)) {
		return  $operating_system = 'Ubuntu';
		} elseif (preg_match('/iphone/i', $u_agent)) {
		return  $operating_system = 'IPhone';
		} elseif (preg_match('/ipod/i', $u_agent)) {
		return  $operating_system = 'IPod';
		} elseif (preg_match('/ipad/i', $u_agent)) {
		return  $operating_system = 'IPad';
		} elseif (preg_match('/android/i', $u_agent)) {
		return  $operating_system = 'Android';
		} elseif (preg_match('/blackberry/i', $u_agent)) {
		return  $operating_system = 'Blackberry';
		} elseif (preg_match('/webos/i', $u_agent)) {
		return $operating_system = 'Mobile';
		}else{
			return $operating_system ;
		}
}
$os=get_operating_system();
date_default_timezone_set('Asia/Kolkata');
 $time= date("d-m-Y H:i:s") ; 
$_SESSION['time']=$time;
	//for information from profile
                  $user_id = $_SESSION['userId'];
                  $curl = curl_init();

                  curl_setopt_array($curl, array(
                    CURLOPT_URL =>  app_url()."/api3/user_profile_show",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\r\n\r\n\"operation\":\"user_profile_show\",\r\n\r\n\"userid\":\"$user_id\",\r\n\r\n\"api_key\":\"cda11aoip2Ry07CGWmjEqYvPguMZTkBel1V8c3XKIxwA6zQt5s\"\r\n\r\n}",
                    CURLOPT_HTTPHEADER => array(
                      "Content-Type: application/json",
                      "Postman-Token: 9f4c60f3-df44-40ac-9fb1-5f0514ed634d",
                      "cache-control: no-cache"
                    ),
                  ));

                  $response = curl_exec($curl);
                  curl_close($curl);

                
                    $jsondecode =  json_decode($response);
                
                    $user_info = $jsondecode->data;
					$state=$user_info->state;
					$city=$user_info->city;
					$country=$user_info->country;
					$SMC_college=$user_info->college_name;
					$SMC_College_id=$user_info->college_id;
					$pref_college=$user_info->preferred_college;
					
					// $cookie_name = "user";
					// $cookie_value = "SD";
					// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
					
					// setcookie('usertype', 'SchoolAdmin');

						if($SMC_college=='')
						{
							$college=$pref_college;
						}
						else 
						{
							$college=$SMC_college;
						}
			$url= app_url()."/api3/logs";
$data=array( 'operation'=>'logs',
'App_Name'=>'Campus Radio',
'UserID'=>$user_id,
'Action'=>'Login', //Login,Logout,Registration,Update
'PlaylistItemID'=>'',
'CategoryID'=>'',
'ChannelID'=>'',
'ChannelCategoryName'=>'',
'ActionTime'=>$time, //28-04-2020 15:35:59
'ActionDuration'=>'',//28-04-2020 15:45:59
'DeviceName'=>'Web',
'IPAddress'=>$ip_server,
'OSVersion'=>$os,
'CountryCode'=>91,
'PosLat'=>'',
'PosLong'=>'',
'college_id'=>$SMC_College_id,
'college_name'=>$college,
'city'=>$city,
'state'=>$state,
'country'=>$country,
'api_key'=>'cda11aoip2Ry07CGWmjEqYvPguMZTkBel1V8c3XKIxwA6zQt5s');
$res_cat = get_curl_result($url,$data);


 
			echo ("<script LANGUAGE='JavaScript'>
					
					window.location.href='index.php';
				</script>");
					
					
            }
			else 
			if($response1 !=200 && $responce==202)		
			
			{
               echo ("<script LANGUAGE='JavaScript'>
					window.alert('Please Enter Valid Credentials');
					
				</script>");
            }
			
			

		

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css" >
	<script src="scripts/bootstrap.min.js"></script>
	<script src="scripts/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <title>Log IN</title>

    <style>
        body,html 
      	{
			margin: 0;
			padding: 0;
			height: 100%;
			
			/*background: #8BC34A !important;*/
      	}
     
      	.user_card 
      	{
			height: 600px;
			width: 430px;
			margin-top: auto;
			margin-bottom: auto;
			background: white;
			position: relative;
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius: 5px;
      	}

        .brand_logo 
      	{
			width: 96px;
        	height: 96px;
        	margin: 0 auto 2px;
        	display: block;	
		}
       
        .login_container 
      	{
			padding: 0 2rem;
		}
		
      	.input-group-text 
      	{
			background: rgb(194, 192, 192) !important;
			color: black !important;
			border: 0 !important;
			border-radius: 0.25rem 0 0 0.25rem !important;
		}
    
      	.input_user,.input_pass:focus 
      	{
			box-shadow: none !important;
			outline: 0px !important;
		}
    </style>

	<script>
		$(document).ready(function(){
      		$('#pass').click(function(){
        		$('#login_pass').show();    
				$('#login_otp').hide();    		
      		});
		});
		$(document).ready(function(){
      		$('#otp').click(function(){
        		$('#login_pass').hide();    
				$('#login_otp').show();    		
      		});
		});
		
		$(document).ready(function(){
			$('#phone1').click(function(){
        		$('#email_textbox1').hide();
				$('#phone_textbox1').show();
				$('#username_textbox').hide();
				$('#pass_texbox').hide();
				$('#email_textbox').hide();
				$('#phone_textbox').hide();
      		});
    	});
		$(document).ready(function(){
			$('#email').click(function(){
				$('#email_textbox1').show();
				$('#phone_textbox1').hide();
				$('#username_textbox').hide();
				$('#pass_texbox').hide();
				$('#email_textbox').hide();
				$('#phone_textbox').hide();
      		});
    	});

		
		$(document).ready(function(){
			$('#user_rb').click(function(){
        		$('#username_textbox').show();
				$('#pass_texbox').show();
				$('#email_textbox').hide();
				$('#phone_textbox').hide();
				$('#email_textbox1').hide();
				$('#phone_textbox1').hide();
      		});
    	});

		$(document).ready(function(){
			$('#email_rb').click(function(){
				$('#email_textbox').show();
				$('#pass_texbox').show();
				$('#username_textbox').hide();
				$('#phone_textbox').hide();
				$('#email_textbox1').hide();
				$('#phone_textbox1').hide();
      		});
    	});
		
		$(document).ready(function(){
			$('#phone_rb').click(function(){
				$('#phone_textbox').show();
				$('#pass_texbox').show();
				$('#username_textbox').hide();
				$('#email_textbox').hide();
				$('#email_textbox1').hide();
				$('#phone_textbox1').hide();
      		});
    	});
	</script>
</head>
<body>
    <div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
        		<img src="logo.png" class="brand_logo" alt="Logo" style="margin-top:0px;" />
        		<center><h4 class="font-italic"> Campus Radio </h4></center>
				<br>
				<div id="error" class="input-group mb-12"></div>
				<div class="d-flex justify-content-center form_container">
				 
                    <form name="frmRegistration" method="post" action="">
						<h5 class="text-danger" style="text-align:center;"> Login Using </h5>
							
						<div class="row">
						
							<div class="col-sm-2"></div>
						
							<label class="radio-inline">
      							<input type="radio" name="optradio1" id="pass" value="Password" checked > Password
    						</label>
						
							<div class="col-sm-2"></div>
						
							<label class="radio-inline">
      							<input type="radio" name="optradio1" id="otp" value="OTP" > OTP
    						</label>
							
						</div>
								
						<div class="row" id="login_pass" >

							<label class="radio-inline">
      							<input type="radio" name="optradio" id="user_rb" value="username" checked> User Name
    						</label>

							<div class="col-sm-1"></div>

							<label class="radio-inline">
      							<input type="radio" name="optradio" id="email_rb" value="email"> Email ID
    						</label>

							<div class="col-sm-1"></div>

							<label class="radio-inline" id="phone" >
      							<input type="radio" name="optradio" id="phone_rb" value="phone"> Phone Number
    						</label>

						</div>
						<div class="row" id="login_otp" style="display:none;">

							<div class="col-sm-1"></div>

							<label class="radio-inline">
      							<input type="radio" name="optradio" id="email" value="email"> Email ID
    						</label>

							<div class="col-sm-1"></div>

							<label class="radio-inline" id="phone" >
      							<input type="radio" name="optradio" id="phone1" value="phone"> Phone Number
    						</label>

						</div>
						<div class="input-group mb-3" id="username_textbox">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-user"></i> </span>
							</div>
							<input type="text" name="userName" id="userName" value="<?php if(isset($_COOKIE["Unames"])) {echo $_COOKIE["Unames"];} ?>" class="form-control input_user" placeholder="User Name">
						</div>
						
						<div class="input-group mb-3" id="email_textbox" style="display:none;">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="email" name="userEmail" id="userEmail" value="<?php if(isset($_COOKIE["userEmail"])) {echo $_COOKIE["userEmail"];} ?>" class="form-control input_user" placeholder="Email ID">
						</div>
                       
            			<div class="input-group mb-3" id="phone_textbox" style="display:none">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-phone"></i></span>
								
								<select name="country_code" class="form-control" style="width:85px;">
									<option data-countryCode="IN" value="+91" Selected>India (+91)</option>
									<option data-countryCode="US" value="+1">USA (+1)</option>
									<optgroup label="Other countries">
										<option data-countryCode="DZ" value="+213">Algeria (+213)</option>
										<option data-countryCode="AD" value="+376">Andorra (+376)</option>
										<option data-countryCode="AO" value="+244">Angola (+244)</option>
										<option data-countryCode="AI" value="+1264">Anguilla (+1264)</option>
										<option data-countryCode="AG" value="+1268">Antigua &amp; Barbuda (+1268)</option>
										<option data-countryCode="AR" value="+54">Argentina (+54)</option>
										<option data-countryCode="AM" value="+374">Armenia (+374)</option>
										<option data-countryCode="AW" value="+297">Aruba (+297)</option>
										<option data-countryCode="AU" value="+61">Australia (+61)</option>
										<option data-countryCode="AT" value="+43">Austria (+43)</option>
										<option data-countryCode="AZ" value="+994">Azerbaijan (+994)</option>
										<option data-countryCode="BS" value="+1242">Bahamas (+1242)</option>
										<option data-countryCode="BH" value="+973">Bahrain (+973)</option>
										<option data-countryCode="BD" value="+880">Bangladesh (+880)</option>
										<option data-countryCode="BB" value="+1246">Barbados (+1246)</option>
										<option data-countryCode="BY" value="+375">Belarus (+375)</option>
										<option data-countryCode="BE" value="+32">Belgium (+32)</option>
										<option data-countryCode="BZ" value="+501">Belize (+501)</option>
										<option data-countryCode="BJ" value="+229">Benin (+229)</option>
										<option data-countryCode="BM" value="+1441">Bermuda (+1441)</option>
										<option data-countryCode="BT" value="+975">Bhutan (+975)</option>
										<option data-countryCode="BO" value="+591">Bolivia (+591)</option>
										<option data-countryCode="BA" value="+387">Bosnia Herzegovina (+387)</option>
										<option data-countryCode="BW" value="+267">Botswana (+267)</option>
										<option data-countryCode="BR" value="+55">Brazil (+55)</option>
										<option data-countryCode="BN" value="+673">Brunei (+673)</option>
										<option data-countryCode="BG" value="+359">Bulgaria (+359)</option>
										<option data-countryCode="BF" value="+226">Burkina Faso (+226)</option>
										<option data-countryCode="BI" value="+257">Burundi (+257)</option>
										<option data-countryCode="KH" value="+855">Cambodia (+855)</option>
										<option data-countryCode="CM" value="+237">Cameroon (+237)</option>
										<option data-countryCode="CA" value="+1">Canada (+1)</option>
										<option data-countryCode="CV" value="+238">Cape Verde Islands (+238)</option>
										<option data-countryCode="KY" value="+1345">Cayman Islands (+1345)</option>
										<option data-countryCode="CF" value="+236">Central African Republic (+236)</option>
										<option data-countryCode="CL" value="+56">Chile (+56)</option>
										<option data-countryCode="CN" value="+86">China (+86)</option>
										<option data-countryCode="CO" value="+57">Colombia (+57)</option>
										<option data-countryCode="KM" value="+269">Comoros (+269)</option>
										<option data-countryCode="CG" value="+242">Congo (+242)</option>
										<option data-countryCode="CK" value="+682">Cook Islands (+682)</option>
										<option data-countryCode="CR" value="+506">Costa Rica (+506)</option>
										<option data-countryCode="HR" value="+385">Croatia (+385)</option>
										<option data-countryCode="CU" value="+53">Cuba (+53)</option>
										<option data-countryCode="CY" value="+90392">Cyprus North (+90392)</option>
										<option data-countryCode="CY" value="+357">Cyprus South (+357)</option>
										<option data-countryCode="CZ" value="+42">Czech Republic (+42)</option>
										<option data-countryCode="DK" value="+45">Denmark (+45)</option>
										<option data-countryCode="DJ" value="+253">Djibouti (+253)</option>
										<option data-countryCode="DM" value="+1809">Dominica (+1809)</option>
										<option data-countryCode="DO" value="+1809">Dominican Republic (+1809)</option>
										<option data-countryCode="EC" value="+593">Ecuador (+593)</option>
										<option data-countryCode="EG" value="+20">Egypt (+20)</option>
										<option data-countryCode="SV" value="+503">El Salvador (+503)</option>
										<option data-countryCode="GQ" value="+240">Equatorial Guinea (+240)</option>
										<option data-countryCode="ER" value="+291">Eritrea (+291)</option>
										<option data-countryCode="EE" value="+372">Estonia (+372)</option>
										<option data-countryCode="ET" value="+251">Ethiopia (+251)</option>
										<option data-countryCode="FK" value="+500">Falkland Islands (+500)</option>
										<option data-countryCode="FO" value="+298">Faroe Islands (+298)</option>
										<option data-countryCode="FJ" value="+679">Fiji (+679)</option>
										<option data-countryCode="FI" value="+358">Finland (+358)</option>
										<option data-countryCode="FR" value="+33">France (+33)</option>
										<option data-countryCode="GF" value="+594">French Guiana (+594)</option>
										<option data-countryCode="PF" value="+689">French Polynesia (+689)</option>
										<option data-countryCode="GA" value="+241">Gabon (+241)</option>
										<option data-countryCode="GM" value="+220">Gambia (+220)</option>
										<option data-countryCode="GE" value="+7880">Georgia (+7880)</option>
										<option data-countryCode="DE" value="+49">Germany (+49)</option>
										<option data-countryCode="GH" value="+233">Ghana (+233)</option>
										<option data-countryCode="GI" value="+350">Gibraltar (+350)</option>
										<option data-countryCode="GR" value="+30">Greece (+30)</option>
										<option data-countryCode="GL" value="+299">Greenland (+299)</option>
										<option data-countryCode="GD" value="+1473">Grenada (+1473)</option>
										<option data-countryCode="GP" value="+590">Guadeloupe (+590)</option>
										<option data-countryCode="GU" value="+671">Guam (+671)</option>
										<option data-countryCode="GT" value="+502">Guatemala (+502)</option>
										<option data-countryCode="GN" value="+224">Guinea (+224)</option>
										<option data-countryCode="GW" value="+245">Guinea - Bissau (+245)</option>
										<option data-countryCode="GY" value="+592">Guyana (+592)</option>
										<option data-countryCode="HT" value="+509">Haiti (+509)</option>
										<option data-countryCode="HN" value="+504">Honduras (+504)</option>
										<option data-countryCode="HK" value="+852">Hong Kong (+852)</option>
										<option data-countryCode="HU" value="+36">Hungary (+36)</option>
										<option data-countryCode="IS" value="+354">Iceland (+354)</option>
										
										<option data-countryCode="ID" value="+62">Indonesia (+62)</option>
										<option data-countryCode="IR" value="+98">Iran (+98)</option>
										<option data-countryCode="IQ" value="+964">Iraq (+964)</option>
										<option data-countryCode="IE" value="+353">Ireland (+353)</option>
										<option data-countryCode="IL" value="+972">Israel (+972)</option>
										<option data-countryCode="IT" value="+39">Italy (+39)</option>
										<option data-countryCode="JM" value="+1876">Jamaica (+1876)</option>
										<option data-countryCode="JP" value="+81">Japan (+81)</option>
										<option data-countryCode="JO" value="+962">Jordan (+962)</option>
										<option data-countryCode="KZ" value="+7">Kazakhstan (+7)</option>
										<option data-countryCode="KE" value="+254">Kenya (+254)</option>
										<option data-countryCode="KI" value="+686">Kiribati (+686)</option>
										<option data-countryCode="KP" value="+850">Korea North (+850)</option>
										<option data-countryCode="KR" value="+82">Korea South (+82)</option>
										<option data-countryCode="KW" value="+965">Kuwait (+965)</option>
										<option data-countryCode="KG" value="+996">Kyrgyzstan (+996)</option>
										<option data-countryCode="LA" value="+856">Laos (+856)</option>
										<option data-countryCode="LV" value="+371">Latvia (+371)</option>
										<option data-countryCode="LB" value="+961">Lebanon (+961)</option>
										<option data-countryCode="LS" value="+266">Lesotho (+266)</option>
										<option data-countryCode="LR" value="+231">Liberia (+231)</option>
										<option data-countryCode="LY" value="+218">Libya (+218)</option>
										<option data-countryCode="LI" value="+417">Liechtenstein (+417)</option>
										<option data-countryCode="LT" value="+370">Lithuania (+370)</option>
										<option data-countryCode="LU" value="+352">Luxembourg (+352)</option>
										<option data-countryCode="MO" value="+853">Macao (+853)</option>
										<option data-countryCode="MK" value="+389">Macedonia (+389)</option>
										<option data-countryCode="MG" value="+261">Madagascar (+261)</option>
										<option data-countryCode="MW" value="+265">Malawi (+265)</option>
										<option data-countryCode="MY" value="+60">Malaysia (+60)</option>
										<option data-countryCode="MV" value="+960">Maldives (+960)</option>
										<option data-countryCode="ML" value="+223">Mali (+223)</option>
										<option data-countryCode="MT" value="+356">Malta (+356)</option>
										<option data-countryCode="MH" value="+692">Marshall Islands (+692)</option>
										<option data-countryCode="MQ" value="+596">Martinique (+596)</option>
										<option data-countryCode="MR" value="+222">Mauritania (+222)</option>
										<option data-countryCode="YT" value="+269">Mayotte (+269)</option>
										<option data-countryCode="MX" value="+52">Mexico (+52)</option>
										<option data-countryCode="FM" value="+691">Micronesia (+691)</option>
										<option data-countryCode="MD" value="+373">Moldova (+373)</option>
										<option data-countryCode="MC" value="+377">Monaco (+377)</option>
										<option data-countryCode="MN" value="+976">Mongolia (+976)</option>
										<option data-countryCode="MS" value="+1664">Montserrat (+1664)</option>
										<option data-countryCode="MA" value="+212">Morocco (+212)</option>
										<option data-countryCode="MZ" value="+258">Mozambique (+258)</option>
										<option data-countryCode="MN" value="+95">Myanmar (+95)</option>
										<option data-countryCode="NA" value="+264">Namibia (+264)</option>
										<option data-countryCode="NR" value="+674">Nauru (+674)</option>
										<option data-countryCode="NP" value="+977">Nepal (+977)</option>
										<option data-countryCode="NL" value="+31">Netherlands (+31)</option>
										<option data-countryCode="NC" value="+687">New Caledonia (+687)</option>
										<option data-countryCode="NZ" value="+64">New Zealand (+64)</option>
										<option data-countryCode="NI" value="+505">Nicaragua (+505)</option>
										<option data-countryCode="NE" value="+227">Niger (+227)</option>
										<option data-countryCode="NG" value="+234">Nigeria (+234)</option>
										<option data-countryCode="NU" value="+683">Niue (+683)</option>
										<option data-countryCode="NF" value="+672">Norfolk Islands (+672)</option>
										<option data-countryCode="NP" value="+670">Northern Marianas (+670)</option>
										<option data-countryCode="NO" value="+47">Norway (+47)</option>
										<option data-countryCode="OM" value="+968">Oman (+968)</option>
										<option data-countryCode="PW" value="+680">Palau (+680)</option>
										<option data-countryCode="PA" value="+507">Panama (+507)</option>
										<option data-countryCode="PG" value="+675">Papua New Guinea (+675)</option>
										<option data-countryCode="PY" value="+595">Paraguay (+595)</option>
										<option data-countryCode="PE" value="+51">Peru (+51)</option>
										<option data-countryCode="PH" value="+63">Philippines (+63)</option>
										<option data-countryCode="PL" value="+48">Poland (+48)</option>
										<option data-countryCode="PT" value="+351">Portugal (+351)</option>
										<option data-countryCode="PR" value="+1787">Puerto Rico (+1787)</option>
										<option data-countryCode="QA" value="+974">Qatar (+974)</option>
										<option data-countryCode="RE" value="+262">Reunion (+262)</option>
										<option data-countryCode="RO" value="+40">Romania (+40)</option>
										<option data-countryCode="RU" value="+7">Russia (+7)</option>
										<option data-countryCode="RW" value="+250">Rwanda (+250)</option>
										<option data-countryCode="SM" value="+378">San Marino (+378)</option>
										<option data-countryCode="ST" value="+239">Sao Tome &amp; Principe (+239)</option>
										<option data-countryCode="SA" value="+966">Saudi Arabia (+966)</option>
										<option data-countryCode="SN" value="+221">Senegal (+221)</option>
										<option data-countryCode="CS" value="+381">Serbia (+381)</option>
										<option data-countryCode="SC" value="+248">Seychelles (+248)</option>
										<option data-countryCode="SL" value="+232">Sierra Leone (+232)</option>
										<option data-countryCode="SG" value="+65">Singapore (+65)</option>
										<option data-countryCode="SK" value="+421">Slovak Republic (+421)</option>
										<option data-countryCode="SI" value="+386">Slovenia (+386)</option>
										<option data-countryCode="SB" value="+677">Solomon Islands (+677)</option>
										<option data-countryCode="SO" value="+252">Somalia (+252)</option>
										<option data-countryCode="ZA" value="+27">South Africa (+27)</option>
										<option data-countryCode="ES" value="+34">Spain (+34)</option>
										<option data-countryCode="LK" value="+94">Sri Lanka (+94)</option>
										<option data-countryCode="SH" value="+290">St. Helena (+290)</option>
										<option data-countryCode="KN" value="+1869">St. Kitts (+1869)</option>
										<option data-countryCode="SC" value="+1758">St. Lucia (+1758)</option>
										<option data-countryCode="SD" value="+249">Sudan (+249)</option>
										<option data-countryCode="SR" value="+597">Suriname (+597)</option>
										<option data-countryCode="SZ" value="+268">Swaziland (+268)</option>
										<option data-countryCode="SE" value="+46">Sweden (+46)</option>
										<option data-countryCode="CH" value="+41">Switzerland (+41)</option>
										<option data-countryCode="SI" value="+963">Syria (+963)</option>
										<option data-countryCode="TW" value="+886">Taiwan (+886)</option>
										<option data-countryCode="TJ" value="+7">Tajikstan (+7)</option>
										<option data-countryCode="TH" value="+66">Thailand (+66)</option>
										<option data-countryCode="TG" value="+228">Togo (+228)</option>
										<option data-countryCode="TO" value="+676">Tonga (+676)</option>
										<option data-countryCode="TT" value="+1868">Trinidad &amp; Tobago (+1868)</option>
										<option data-countryCode="TN" value="+216">Tunisia (+216)</option>
										<option data-countryCode="TR" value="+90">Turkey (+90)</option>
										<option data-countryCode="TM" value="+7">Turkmenistan (+7)</option>
										<option data-countryCode="TM" value="+993">Turkmenistan (+993)</option>
										<option data-countryCode="TC" value="+1649">Turks &amp; Caicos Islands (+1649)</option>
										<option data-countryCode="TV" value="+688">Tuvalu (+688)</option>
										<option data-countryCode="UG" value="+256">Uganda (+256)</option>
										<option data-countryCode="GB" value="+44">UK (+44)</option> 
										<option data-countryCode="UA" value="+380">Ukraine (+380)</option>
										<option data-countryCode="AE" value="+971">United Arab Emirates (+971)</option>
										<option data-countryCode="UY" value="+598">Uruguay (+598)</option>
										<!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
										<option data-countryCode="UZ" value="+7">Uzbekistan (+7)</option>
										<option data-countryCode="VU" value="+678">Vanuatu (+678)</option>
										<option data-countryCode="VA" value="+379">Vatican City (+379)</option>
										<option data-countryCode="VE" value="+58">Venezuela (+58)</option>
										<option data-countryCode="VN" value="+84">Vietnam (+84)</option>
										<option data-countryCode="VG" value="+84">Virgin Islands - British (+1284)</option>
										<option data-countryCode="VI" value="+84">Virgin Islands - US (+1340)</option>
										<option data-countryCode="WF" value="+681">Wallis &amp; Futuna (+681)</option>
										<option data-countryCode="YE" value="+969">Yemen (North)(+969)</option>
										<option data-countryCode="YE" value="+967">Yemen (South)(+967)</option>
										<option data-countryCode="ZM" value="+260">Zambia (+260)</option>
										<option data-countryCode="ZW" value="+263">Zimbabwe (+263)</option>
									</optgroup>
  								</select>
							</div>
							<input type="text" name="phone" id="phone" value="<?php if(isset($_COOKIE["phone"])) {echo $_COOKIE["phone"];} ?>" class="form-control input_user" placeholder="Mobile No.">
            			</div>
                         
                        <div class="input-group mb-3" id="pass_texbox" >
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-key"></i></span>
							</div>
							<input type="password" name="password" id="password" value="<?php if(isset($_COOKIE["pswrd"])) {echo $_COOKIE["pswrd"];}?>" class="form-control input_user" placeholder="Password">
						</div>
						<div class="input-group mb-3" id="email_textbox1" style="display:none;">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="email" name="userEmails" id="userEmails" value="<?php if(isset($_COOKIE["userEmailID"])) {echo $_COOKIE["userEmailID"];}?>"  class="form-control input_user" placeholder="Email ID">
						</div>
                       
            			<div class="input-group mb-3" id="phone_textbox1" style="display:none">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-phone"></i></span>
								
								<select name="country_code1" class="form-control" style="width:85px;">
									<option data-countryCode="IN" value="+91" Selected>India (+91)</option>
									<option data-countryCode="US" value="+1">USA (+1)</option>
									<optgroup label="Other countries">
										<option data-countryCode="DZ" value="+213">Algeria (+213)</option>
										<option data-countryCode="AD" value="+376">Andorra (+376)</option>
										<option data-countryCode="AO" value="+244">Angola (+244)</option>
										<option data-countryCode="AI" value="+1264">Anguilla (+1264)</option>
										<option data-countryCode="AG" value="+1268">Antigua &amp; Barbuda (+1268)</option>
										<option data-countryCode="AR" value="+54">Argentina (+54)</option>
										<option data-countryCode="AM" value="+374">Armenia (+374)</option>
										<option data-countryCode="AW" value="+297">Aruba (+297)</option>
										<option data-countryCode="AU" value="+61">Australia (+61)</option>
										<option data-countryCode="AT" value="+43">Austria (+43)</option>
										<option data-countryCode="AZ" value="+994">Azerbaijan (+994)</option>
										<option data-countryCode="BS" value="+1242">Bahamas (+1242)</option>
										<option data-countryCode="BH" value="+973">Bahrain (+973)</option>
										<option data-countryCode="BD" value="+880">Bangladesh (+880)</option>
										<option data-countryCode="BB" value="+1246">Barbados (+1246)</option>
										<option data-countryCode="BY" value="+375">Belarus (+375)</option>
										<option data-countryCode="BE" value="+32">Belgium (+32)</option>
										<option data-countryCode="BZ" value="+501">Belize (+501)</option>
										<option data-countryCode="BJ" value="+229">Benin (+229)</option>
										<option data-countryCode="BM" value="+1441">Bermuda (+1441)</option>
										<option data-countryCode="BT" value="+975">Bhutan (+975)</option>
										<option data-countryCode="BO" value="+591">Bolivia (+591)</option>
										<option data-countryCode="BA" value="+387">Bosnia Herzegovina (+387)</option>
										<option data-countryCode="BW" value="+267">Botswana (+267)</option>
										<option data-countryCode="BR" value="+55">Brazil (+55)</option>
										<option data-countryCode="BN" value="+673">Brunei (+673)</option>
										<option data-countryCode="BG" value="+359">Bulgaria (+359)</option>
										<option data-countryCode="BF" value="+226">Burkina Faso (+226)</option>
										<option data-countryCode="BI" value="+257">Burundi (+257)</option>
										<option data-countryCode="KH" value="+855">Cambodia (+855)</option>
										<option data-countryCode="CM" value="+237">Cameroon (+237)</option>
										<option data-countryCode="CA" value="+1">Canada (+1)</option>
										<option data-countryCode="CV" value="+238">Cape Verde Islands (+238)</option>
										<option data-countryCode="KY" value="+1345">Cayman Islands (+1345)</option>
										<option data-countryCode="CF" value="+236">Central African Republic (+236)</option>
										<option data-countryCode="CL" value="+56">Chile (+56)</option>
										<option data-countryCode="CN" value="+86">China (+86)</option>
										<option data-countryCode="CO" value="+57">Colombia (+57)</option>
										<option data-countryCode="KM" value="+269">Comoros (+269)</option>
										<option data-countryCode="CG" value="+242">Congo (+242)</option>
										<option data-countryCode="CK" value="+682">Cook Islands (+682)</option>
										<option data-countryCode="CR" value="+506">Costa Rica (+506)</option>
										<option data-countryCode="HR" value="+385">Croatia (+385)</option>
										<option data-countryCode="CU" value="+53">Cuba (+53)</option>
										<option data-countryCode="CY" value="+90392">Cyprus North (+90392)</option>
										<option data-countryCode="CY" value="+357">Cyprus South (+357)</option>
										<option data-countryCode="CZ" value="+42">Czech Republic (+42)</option>
										<option data-countryCode="DK" value="+45">Denmark (+45)</option>
										<option data-countryCode="DJ" value="+253">Djibouti (+253)</option>
										<option data-countryCode="DM" value="+1809">Dominica (+1809)</option>
										<option data-countryCode="DO" value="+1809">Dominican Republic (+1809)</option>
										<option data-countryCode="EC" value="+593">Ecuador (+593)</option>
										<option data-countryCode="EG" value="+20">Egypt (+20)</option>
										<option data-countryCode="SV" value="+503">El Salvador (+503)</option>
										<option data-countryCode="GQ" value="+240">Equatorial Guinea (+240)</option>
										<option data-countryCode="ER" value="+291">Eritrea (+291)</option>
										<option data-countryCode="EE" value="+372">Estonia (+372)</option>
										<option data-countryCode="ET" value="+251">Ethiopia (+251)</option>
										<option data-countryCode="FK" value="+500">Falkland Islands (+500)</option>
										<option data-countryCode="FO" value="+298">Faroe Islands (+298)</option>
										<option data-countryCode="FJ" value="+679">Fiji (+679)</option>
										<option data-countryCode="FI" value="+358">Finland (+358)</option>
										<option data-countryCode="FR" value="+33">France (+33)</option>
										<option data-countryCode="GF" value="+594">French Guiana (+594)</option>
										<option data-countryCode="PF" value="+689">French Polynesia (+689)</option>
										<option data-countryCode="GA" value="+241">Gabon (+241)</option>
										<option data-countryCode="GM" value="+220">Gambia (+220)</option>
										<option data-countryCode="GE" value="+7880">Georgia (+7880)</option>
										<option data-countryCode="DE" value="+49">Germany (+49)</option>
										<option data-countryCode="GH" value="+233">Ghana (+233)</option>
										<option data-countryCode="GI" value="+350">Gibraltar (+350)</option>
										<option data-countryCode="GR" value="+30">Greece (+30)</option>
										<option data-countryCode="GL" value="+299">Greenland (+299)</option>
										<option data-countryCode="GD" value="+1473">Grenada (+1473)</option>
										<option data-countryCode="GP" value="+590">Guadeloupe (+590)</option>
										<option data-countryCode="GU" value="+671">Guam (+671)</option>
										<option data-countryCode="GT" value="+502">Guatemala (+502)</option>
										<option data-countryCode="GN" value="+224">Guinea (+224)</option>
										<option data-countryCode="GW" value="+245">Guinea - Bissau (+245)</option>
										<option data-countryCode="GY" value="+592">Guyana (+592)</option>
										<option data-countryCode="HT" value="+509">Haiti (+509)</option>
										<option data-countryCode="HN" value="+504">Honduras (+504)</option>
										<option data-countryCode="HK" value="+852">Hong Kong (+852)</option>
										<option data-countryCode="HU" value="+36">Hungary (+36)</option>
										<option data-countryCode="IS" value="+354">Iceland (+354)</option>
										
										<option data-countryCode="ID" value="+62">Indonesia (+62)</option>
										<option data-countryCode="IR" value="+98">Iran (+98)</option>
										<option data-countryCode="IQ" value="+964">Iraq (+964)</option>
										<option data-countryCode="IE" value="+353">Ireland (+353)</option>
										<option data-countryCode="IL" value="+972">Israel (+972)</option>
										<option data-countryCode="IT" value="+39">Italy (+39)</option>
										<option data-countryCode="JM" value="+1876">Jamaica (+1876)</option>
										<option data-countryCode="JP" value="+81">Japan (+81)</option>
										<option data-countryCode="JO" value="+962">Jordan (+962)</option>
										<option data-countryCode="KZ" value="+7">Kazakhstan (+7)</option>
										<option data-countryCode="KE" value="+254">Kenya (+254)</option>
										<option data-countryCode="KI" value="+686">Kiribati (+686)</option>
										<option data-countryCode="KP" value="+850">Korea North (+850)</option>
										<option data-countryCode="KR" value="+82">Korea South (+82)</option>
										<option data-countryCode="KW" value="+965">Kuwait (+965)</option>
										<option data-countryCode="KG" value="+996">Kyrgyzstan (+996)</option>
										<option data-countryCode="LA" value="+856">Laos (+856)</option>
										<option data-countryCode="LV" value="+371">Latvia (+371)</option>
										<option data-countryCode="LB" value="+961">Lebanon (+961)</option>
										<option data-countryCode="LS" value="+266">Lesotho (+266)</option>
										<option data-countryCode="LR" value="+231">Liberia (+231)</option>
										<option data-countryCode="LY" value="+218">Libya (+218)</option>
										<option data-countryCode="LI" value="+417">Liechtenstein (+417)</option>
										<option data-countryCode="LT" value="+370">Lithuania (+370)</option>
										<option data-countryCode="LU" value="+352">Luxembourg (+352)</option>
										<option data-countryCode="MO" value="+853">Macao (+853)</option>
										<option data-countryCode="MK" value="+389">Macedonia (+389)</option>
										<option data-countryCode="MG" value="+261">Madagascar (+261)</option>
										<option data-countryCode="MW" value="+265">Malawi (+265)</option>
										<option data-countryCode="MY" value="+60">Malaysia (+60)</option>
										<option data-countryCode="MV" value="+960">Maldives (+960)</option>
										<option data-countryCode="ML" value="+223">Mali (+223)</option>
										<option data-countryCode="MT" value="+356">Malta (+356)</option>
										<option data-countryCode="MH" value="+692">Marshall Islands (+692)</option>
										<option data-countryCode="MQ" value="+596">Martinique (+596)</option>
										<option data-countryCode="MR" value="+222">Mauritania (+222)</option>
										<option data-countryCode="YT" value="+269">Mayotte (+269)</option>
										<option data-countryCode="MX" value="+52">Mexico (+52)</option>
										<option data-countryCode="FM" value="+691">Micronesia (+691)</option>
										<option data-countryCode="MD" value="+373">Moldova (+373)</option>
										<option data-countryCode="MC" value="+377">Monaco (+377)</option>
										<option data-countryCode="MN" value="+976">Mongolia (+976)</option>
										<option data-countryCode="MS" value="+1664">Montserrat (+1664)</option>
										<option data-countryCode="MA" value="+212">Morocco (+212)</option>
										<option data-countryCode="MZ" value="+258">Mozambique (+258)</option>
										<option data-countryCode="MN" value="+95">Myanmar (+95)</option>
										<option data-countryCode="NA" value="+264">Namibia (+264)</option>
										<option data-countryCode="NR" value="+674">Nauru (+674)</option>
										<option data-countryCode="NP" value="+977">Nepal (+977)</option>
										<option data-countryCode="NL" value="+31">Netherlands (+31)</option>
										<option data-countryCode="NC" value="+687">New Caledonia (+687)</option>
										<option data-countryCode="NZ" value="+64">New Zealand (+64)</option>
										<option data-countryCode="NI" value="+505">Nicaragua (+505)</option>
										<option data-countryCode="NE" value="+227">Niger (+227)</option>
										<option data-countryCode="NG" value="+234">Nigeria (+234)</option>
										<option data-countryCode="NU" value="+683">Niue (+683)</option>
										<option data-countryCode="NF" value="+672">Norfolk Islands (+672)</option>
										<option data-countryCode="NP" value="+670">Northern Marianas (+670)</option>
										<option data-countryCode="NO" value="+47">Norway (+47)</option>
										<option data-countryCode="OM" value="+968">Oman (+968)</option>
										<option data-countryCode="PW" value="+680">Palau (+680)</option>
										<option data-countryCode="PA" value="+507">Panama (+507)</option>
										<option data-countryCode="PG" value="+675">Papua New Guinea (+675)</option>
										<option data-countryCode="PY" value="+595">Paraguay (+595)</option>
										<option data-countryCode="PE" value="+51">Peru (+51)</option>
										<option data-countryCode="PH" value="+63">Philippines (+63)</option>
										<option data-countryCode="PL" value="+48">Poland (+48)</option>
										<option data-countryCode="PT" value="+351">Portugal (+351)</option>
										<option data-countryCode="PR" value="+1787">Puerto Rico (+1787)</option>
										<option data-countryCode="QA" value="+974">Qatar (+974)</option>
										<option data-countryCode="RE" value="+262">Reunion (+262)</option>
										<option data-countryCode="RO" value="+40">Romania (+40)</option>
										<option data-countryCode="RU" value="+7">Russia (+7)</option>
										<option data-countryCode="RW" value="+250">Rwanda (+250)</option>
										<option data-countryCode="SM" value="+378">San Marino (+378)</option>
										<option data-countryCode="ST" value="+239">Sao Tome &amp; Principe (+239)</option>
										<option data-countryCode="SA" value="+966">Saudi Arabia (+966)</option>
										<option data-countryCode="SN" value="+221">Senegal (+221)</option>
										<option data-countryCode="CS" value="+381">Serbia (+381)</option>
										<option data-countryCode="SC" value="+248">Seychelles (+248)</option>
										<option data-countryCode="SL" value="+232">Sierra Leone (+232)</option>
										<option data-countryCode="SG" value="+65">Singapore (+65)</option>
										<option data-countryCode="SK" value="+421">Slovak Republic (+421)</option>
										<option data-countryCode="SI" value="+386">Slovenia (+386)</option>
										<option data-countryCode="SB" value="+677">Solomon Islands (+677)</option>
										<option data-countryCode="SO" value="+252">Somalia (+252)</option>
										<option data-countryCode="ZA" value="+27">South Africa (+27)</option>
										<option data-countryCode="ES" value="+34">Spain (+34)</option>
										<option data-countryCode="LK" value="+94">Sri Lanka (+94)</option>
										<option data-countryCode="SH" value="+290">St. Helena (+290)</option>
										<option data-countryCode="KN" value="+1869">St. Kitts (+1869)</option>
										<option data-countryCode="SC" value="+1758">St. Lucia (+1758)</option>
										<option data-countryCode="SD" value="+249">Sudan (+249)</option>
										<option data-countryCode="SR" value="+597">Suriname (+597)</option>
										<option data-countryCode="SZ" value="+268">Swaziland (+268)</option>
										<option data-countryCode="SE" value="+46">Sweden (+46)</option>
										<option data-countryCode="CH" value="+41">Switzerland (+41)</option>
										<option data-countryCode="SI" value="+963">Syria (+963)</option>
										<option data-countryCode="TW" value="+886">Taiwan (+886)</option>
										<option data-countryCode="TJ" value="+7">Tajikstan (+7)</option>
										<option data-countryCode="TH" value="+66">Thailand (+66)</option>
										<option data-countryCode="TG" value="+228">Togo (+228)</option>
										<option data-countryCode="TO" value="+676">Tonga (+676)</option>
										<option data-countryCode="TT" value="+1868">Trinidad &amp; Tobago (+1868)</option>
										<option data-countryCode="TN" value="+216">Tunisia (+216)</option>
										<option data-countryCode="TR" value="+90">Turkey (+90)</option>
										<option data-countryCode="TM" value="+7">Turkmenistan (+7)</option>
										<option data-countryCode="TM" value="+993">Turkmenistan (+993)</option>
										<option data-countryCode="TC" value="+1649">Turks &amp; Caicos Islands (+1649)</option>
										<option data-countryCode="TV" value="+688">Tuvalu (+688)</option>
										<option data-countryCode="UG" value="+256">Uganda (+256)</option>
										<option data-countryCode="GB" value="+44">UK (+44)</option> 
										<option data-countryCode="UA" value="+380">Ukraine (+380)</option>
										<option data-countryCode="AE" value="+971">United Arab Emirates (+971)</option>
										<option data-countryCode="UY" value="+598">Uruguay (+598)</option>
										<!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
										<option data-countryCode="UZ" value="+7">Uzbekistan (+7)</option>
										<option data-countryCode="VU" value="+678">Vanuatu (+678)</option>
										<option data-countryCode="VA" value="+379">Vatican City (+379)</option>
										<option data-countryCode="VE" value="+58">Venezuela (+58)</option>
										<option data-countryCode="VN" value="+84">Vietnam (+84)</option>
										<option data-countryCode="VG" value="+84">Virgin Islands - British (+1284)</option>
										<option data-countryCode="VI" value="+84">Virgin Islands - US (+1340)</option>
										<option data-countryCode="WF" value="+681">Wallis &amp; Futuna (+681)</option>
										<option data-countryCode="YE" value="+969">Yemen (North)(+969)</option>
										<option data-countryCode="YE" value="+967">Yemen (South)(+967)</option>
										<option data-countryCode="ZM" value="+260">Zambia (+260)</option>
										<option data-countryCode="ZW" value="+263">Zimbabwe (+263)</option>
									</optgroup>
  								</select>
							</div>
							<input type="text" name="phones" id="phones" value="<?php if(isset($_COOKIE["phoneNo"])) {echo $_COOKIE["phoneNo"];} ?>" class="form-control input_user" placeholder="Mobile No.">
            			</div>
						<input type="checkbox" name="remember" <?php if(isset($_COOKIE["Unames"])) { ?> checked <?php }?>/>
<label>Remember me</label><br/><br/>

<div class="row">

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $login_url;?>" class="google btn">
		<i class="fa fa-google fa-fw"></i> Login with Google
        </a>
      </div>



						&nbsp;<div class="row">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="otpForm.php">SmartCookie Details</a>
                        	<!--<a href="send_otp_form.php">Login With OTP</a>-->
							<div class="col-sm-1"></div>
                        	<a href="forgot_password.php" style="float:right;">Forgot Password</a>
                       </div>
						
						
						<div class="d-flex justify-content-center mt-3 login_container">
                        
							<input type="submit" name="submit" id="submit" value="Login" class="btn btn-success" style="margin-right:10px;">
								
							<button class="btn btn-primary"><a href="registration_form.php" style="text-decoration:none; color:white;">Register</a></button>
				    	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
   
   
 
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

/* style inputs and link buttons */
input,
.btn {

  opacity: 0.85;
  
  text-decoration: none; /* remove underline from anchors */
}


/* add appropriate colors to fb and google buttons */
.fb {
  background-color: #3B5998;
  color: white;
}

.google {
  background-color: #dd4b39;
  color: white;
}

}
</style>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '320764505770051',
      cookie     : true,
      xfbml      : true,
      version    : 'v6.0'
    });
      
    FB.AppEvents.logPageView();      
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
   function fbLogin(){
	   FB.Login(function(response) {
		   if(response.authResponse){
			   fbAfterLogin();
		   }
	   });
   }
   function fbAfterLogin(){
	FB.getLoginStatus(function(response) {
	if (response.status === 'connected') {  
			FB.api('/me', function(response) {
				console.log(response);
				});
			}
		});
	}
</script>

<a href="javascript:void(0)" onclick="fbLogin()">Login With Facebook</a>
</head>

</html>
 
   
   
   
   
</body>
</html>

