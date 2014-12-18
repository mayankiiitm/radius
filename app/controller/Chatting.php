<?php
/**
* 
*/
class Chatting
{
	function views($id){
		View::make('home',$id);
	}

	function chat(){
		$user=Input::get('user');
		$event=Input::get('event');
		$message=Input::get('message');
		$with=Input::get('with');
		if ($event=='send') {
			if(Chats::save($message,$user,$with)){
				Json::make('1','Message Sent',array())->response();
				return false;
			}
			Json::make('0','Error',array())->response();
			return false;
		}elseif ($event=='recive') {
			$message=Chats::get($user,$with);
			if ($message) {
				Json::make('1','Message Found',$message)->response();
				return false;
			}
			Json::make('1','No New Message',$message)->response();
		}
	}
}
?>