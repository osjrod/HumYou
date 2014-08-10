<?php

class Hum extends Eloquent
{
    protected $table      = 'hum';
    protected $fillable   = array('text','privacy','user_id');
    protected $guarded    = array('id');
    public    $timestamps = false;


    public static function get_hums($id)
    {
		return DB::select("SELECT h.*, p.name, p.last_name, p.nickname 
							FROM hum h 
							INNER JOIN profile p
							ON h.user_id = p.user_id
						   	WHERE h.user_id = $id 
						   	OR h.user_id IN (select f.user_following_id from follow f where f.user_follower_id = $id) 
						   	OR h.id IN (select m.hum_id from mention m where m.user_id = $id);");
    }


}