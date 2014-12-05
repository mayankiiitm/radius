<?php
class Account
{
	function __construct() {
/*if(!Auth::authorized()){
$data['success']='0';
$data['message']='not authorized';
$data['data']=array();
Json::response($data,401);
exit;
}*/
}

	function login(){
		$user=new Users;
		$details['email']=Input::get('email');
		$details['fb_id']=Input::get('fb_id');
		$details['gender']=Input::get('gender');
		$details['dob']=Input::get('dob');
		$users=$user->first("SELECT *,DATEDIFF(curdate(),at_time) AS at FROM users WHERE fb_id=:fb_id",array('fb_id'=>$details['fb_id']));
		if (!$users) {
			$rules=array(
				'email'=>'email|required|max:50',
				'fb_id'=>'required|maxl:50',
				'gender'=>'required|maxl:1',
				'dob'=>'required|date'
				);
			if ($validate=Validator::validate($details,$rules)) {
				$details['access_token']=md5(mcrypt_create_iv(64));
				$details['at_time']=date('Y-m-d H:i:s');
				if($user->insert($details)){
					return Json::make('1','login successfull',array('access_token'=>$details['access_token']))->response();
				}
				return Json::make('0','server error',array())->response(503);
			}
			return Json::make('0',Validator::error(),array())->response();
		}
		if ($users->at>=ACCESS_TOKEN_EXPIRY) {
			$at=md5(mcrypt_create_iv(64));
			$at_t=date('Y-m-d H:i:s');
			$user->update("UPDATE users SET access_token=:at,at_time=:at_t WHERE fb_id=:fb_id",array('fb_id'=>$details['fb_id'],'at'=>$at,'at_t'=>$at_t));
			return Json::make('1','login successfull',array('access_token'=>$at))->response();
		}
		return Json::make('1','login successfull',array('access_token'=>$users->access_token))->response();
	}
}
?>