<?php

class Hashtag extends Eloquent
{
    protected $table      = 'hashtag';
    protected $fillable   = array('tag','hum_id');
    protected $guarded    = array('id');
    public    $timestamps = false;
}