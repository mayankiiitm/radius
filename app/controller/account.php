<?php
class Account
{
	function __construct() {
		/*if(!Auth::authorized()){
			Json::make('0','not authorized',array())->response(401);
			exit;
		}*/
	}
	function login(){
		$user=new Users;
		$details=Input::get(array('name','email','fb_id','gender','dob','place'));
		$access_token=md5(mcrypt_create_iv(64));
		$at_time=date('Y-m-d H:i:s');
		$rules=array(
			'email'=>'email|required|max:50',
			'fb_id'=>'required|maxl:50',
			'gender'=>'required|maxl:1',
			'dob'=>'required|date',
			'name'=>'required|maxl:50',
			'place'=>'required|maxl:50'
			);
		$validate=Validator::validate($details,$rules);
		if (!$validate=Validator::validate($details,$rules)) {
			return Json::make('0',Validator::error(),array())->response();
		}
		$fb_id=$user->fb_id($details['fb_id']);
		if(!$fb_id){
			$details['access_token']=$access_token;
			$details['at_time']=$at_time;	
			if($user->insert($details)){
				return Json::make('1','login successfull',array('access_token'=>$details['access_token']))->response();
			}
			return Json::make('0','server error',array())->response(503);
		}
		if ($fb_id->at>=ACCESS_TOKEN_EXPIRY) {
			$details['access_token']=$access_token;
			$details['at_time']=$at_time;
			unset($details['email']);
			unset($details['gender']);	
			$user->update("UPDATE users SET access_token=:access_token, at_time=:at_time, name=:name,place=:place,dob=:dob WHERE fb_id=:fb_id",$details);
			return Json::make('1','login successfull',array('access_token'=>$access_token))->response();
		}
		return Json::make('1','login successfull',array('access_token'=>$fb_id->access_token))->response();
	}
}
?>