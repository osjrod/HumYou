<?php

class Profile extends Eloquent
{
    protected $table      = 'profile';
    protected $fillable   = array('name','last_name','biography','phone','birthday','nickname','avatar_path','user_id');
    protected $guarded    = array('id');
    public    $timestamps = false;


    public static function getProfile($id)
    {
		return DB::select("select p.*, u.email 
		from profile p
		inner join users u
		on p.user_id = u.id
		where 
		p.user_id = $id");
    }

    public static function listPeople($id)
    {
		return DB::select("select p.*, u.* 
		from profile p
		inner join users u
		on p.user_id = u.id
		where u.id <> $id
		and u.id not in 
		(select f.user_following_id from follow f where f.user_follower_id = $id)
		and u.id not in 
		(select b.user_follower_id from block b where b.user_following_id = $id);");
    }

    public static function updatePicture($id,$picture)
    {
        $profile = Profile::findOrFail($id);
        $profile->avatar_path  = $picture;
        $profile->save();
        return $picture;
    }
}