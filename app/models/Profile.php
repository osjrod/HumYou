<?php

class Profile extends Eloquent
{
    protected $table      = 'profile';
    protected $fillable   = array('name','last_name','biography','phone','birthday','nickname','avatar_path','user_id');
    protected $guarded    = array('id');
    public    $timestamps = false;
}