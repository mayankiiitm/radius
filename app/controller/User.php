<?php
class User
{	

	private $user;
	function __construct() {
		$this->user=Users::auth();
		if (!$this->user) {
			Json::make('0','access denied',array())->response(403);
			exit;
		}
	}

	public function location(){
		$details=Input::get(array('longitude','latitude'));
		$rules=array('longitude'=>'required','latitude'=>'required');
		if (Validator::validate($details,$rules)) {
			if(Locations::update_location($details['longitude'],$details['latitude'])){
				return Json::make('1','location data updated',array())->response();
			}
			return Json::make('0','server error',array())->response(503);
		}
		return Json::make('0',Validator::error(),array())->response();
	}

	public function radius(){
		$location=Locations::get_location($this->user->fb_id);
		$zip=Locations::radius($location->longitude,$location->latitude,$location->radius);
		Json::make('1','le chutiye',$zip)->response();
	}
}
?>