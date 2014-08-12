<?php

class Profile extends Eloquent
{
    protected $table      = 'profile';
    protected $fillable   = array('name','last_name','biography','phone','birthday','nickname','avatar_path','user_id');
    protected $guarded    = array('id');
    public    $timestamps = false;


    public static function actualProfile($id)
    {
		return DB::select("select * 
		from profile
		where 
		user_id = $id");
    }

    public static function listPeople($id)
    {
		return DB::select("select p.*, u.* 
		from profile p
		inner join users u
		on p.user_id = u.id
		where u.id <> $id
		and u.id not in 
		(select f.user_following_id from follow f where f.user_follower_id = $id);");
    }
}