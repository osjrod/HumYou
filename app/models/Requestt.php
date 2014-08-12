<?php

class Requestt extends Eloquent
{
    protected $table      = 'request';
    protected $fillable   = array('status','user_send','user_receive');
    protected $guarded    = array('id');
    public    $timestamps = false;

    public static function myRequestsSend($id)
    {
		return DB::select("select user_receive from request where user_send = $id");
    }

    public static function myRequestsReceive($id)
    {
		return DB::select("select r.id as request_id, r.user_send, r.user_receive, p.* from request r inner join profile p on r.user_send = p.user_id where r.user_receive = $id");
    }
}