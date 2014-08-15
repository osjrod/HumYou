<?php

class Hashtag extends Eloquent
{
    protected $table      = 'hashtag';
    protected $fillable   = array('tag','hum_id','tagger');
    protected $guarded    = array('id');
    public    $timestamps = false;


    public static function get_hums($tag, $id)
    {
		return DB::select("SELECT h.*, p.name, p.last_name, p.nickname, p.avatar_path
							FROM hum h 
							INNER JOIN profile p
							ON h.user_id = p.user_id
						   	WHERE  h.id IN (select hs.hum_id from hashtag hs where hs.tag = '$tag')
                            and h.user_id not in 
                            (select b.user_follower_id from block b where b.user_following_id = $id);");
    }

}