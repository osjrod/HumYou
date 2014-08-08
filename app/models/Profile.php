<?php

class Profile extends Eloquent
{
    protected $table      = 'profile';
    protected $fillable   = array('name','last_name','biography','phone','birthday','nickname','avatar_path');
    protected $guarded    = array('id');
    public    $timestamps = false;
}