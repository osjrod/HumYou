<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');
	protected $fillable   = array('email', 'password');
  	protected $guarded    = array('id');
  	public    $timestamps = false;

  	public static function deleteAccount($id)
    {
		DB::delete("delete from users where id = $id;");
		DB::delete("	   delete from profile where user_id = $id;");
		DB::delete("	   delete from request where user_send = $id;");
		DB::delete("	   delete from request where user_receive = $id;");
		DB::delete("	   delete from follow where user_following_id = $id;");
		DB::delete("	   delete from follow where user_follower_id = $id;");
		DB::delete("	   delete from block where user_following_id = $id;");
		DB::delete("	   delete from block where user_follower_id = $id;");
		DB::delete("	   delete from mention where user_id = $id;");
		DB::delete("	   delete from hum where user_id = $id;");
		DB::delete("	   delete from mention where mentioner = $id;");
		DB::delete("	   delete from hashtag where tagger = $id;");
    }


}
