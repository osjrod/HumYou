<?php

class Block extends Eloquent
{
    protected $table      = 'block';
    protected $fillable   = array('user_following_id','user_follower_id');
    protected $guarded    = array('id');
    public    $timestamps = false;

    public static function myBlocks($id)
    { 
		return DB::select("select user_following_id from block  where user_follower_id = $id");
    }

    public static function deleteBlock($follower, $following)
    { 
		return DB::select("DELETE FROM block
							WHERE user_follower_id = $follower and user_following_id = $following;");
    }

}