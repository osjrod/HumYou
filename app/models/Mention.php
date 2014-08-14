<?php

class Mention extends Eloquent
{
    protected $table      = 'mention';
    protected $fillable   = array('user_id','hum_id','mentioner');
    protected $guarded    = array('id');
    public    $timestamps = false;
}