<?php

class Hum extends Eloquent
{
    protected $table      = 'hum';
    protected $fillable   = array('text','privacy','user_id');
    protected $guarded    = array('id');
    public    $timestamps = false;
}