<?php

class Follow extends Eloquent
{
    protected $table      = 'follow';
    protected $fillable   = array('user_following_id','user_follower_id');
    protected $guarded    = array('id');
    public    $timestamps = false;


	public static function myFollows($id)
    { 
		return DB::select(" select f.id as follow_id, f.user_following_id, p.* from follow f 
			inner join profile p on f.user_following_id = p.user_id 
			where f.user_follower_id = $id;");
    }


}