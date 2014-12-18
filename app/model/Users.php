<?php

class Users extends Model{
	protected $table='users';
	protected static $auth=false;
	public function fb_id($fb_id){
		return $this->first("SELECT *,DATEDIFF(curdate(),at_time) AS at FROM users WHERE fb_id=:fb_id",array('fb_id'=>$fb_id));
	}
	public static function auth(){
		if(!self::$auth){
		$access_token=Input::get('access_token')?Input::get('access_token'):(Input::post('access_token')?Input::post('access_token'):null);
		$sql="SELECT * FROM users WHERE access_token=:access_token AND DATEDIFF(curdate(),at_time)<".ACCESS_TOKEN_EXPIRY;
		$user=new self;
		self::$auth=$user->first($sql,array('access_token'=>$access_token));
		}
		return self::$auth;
	}
}
