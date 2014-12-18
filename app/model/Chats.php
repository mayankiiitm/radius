<?php
/**
* 
*/
class Chats extends Model
{	protected $table='chats';
	public static function save($message,$user,$with){
		$chats=new self;
		return $chats->insert(array('message'=>$message,'sender'=>$user,'reciver'=>$with));
	}
	public static function get($user,$with){
		$chats=new self;
		$params=array('sender'=>$with,'reciver'=>$user);
		$chat= $chats->select("SELECT message FROM chats WHERE sender=:sender AND reciver=:reciver AND `read`=false",$params);
		$chats->update("UPDATE chats SET `read`=true WHERE sender=:sender AND reciver=:reciver",$params);
		return $chat;
	}
}
?>