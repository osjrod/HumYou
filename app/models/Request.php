<?php

class Request extends Eloquent
{
    protected $table      = 'request';
    protected $fillable   = array('status','user_send','user_receive');
    protected $guarded    = array('id');
    public    $timestamps = false;
}