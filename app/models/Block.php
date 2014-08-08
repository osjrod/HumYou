<?php

class Block extends Eloquent
{
    protected $table      = 'block';
    protected $fillable   = array('user_following_id','user_follower_id');
    protected $guarded    = array('id');
    public    $timestamps = false;
}