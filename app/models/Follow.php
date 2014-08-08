<?php

class Follow extends Eloquent
{
    protected $table      = 'follow';
    protected $fillable   = array('user_following_id','user_follower_id');
    protected $guarded    = array('id');
    public    $timestamps = false;
}