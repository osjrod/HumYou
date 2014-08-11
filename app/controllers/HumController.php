<?php

class HumController extends \BaseController {


	public function index()
	{
		//
	}


	public function post()
	{
		$id = Auth::id();

		$text = Input::get('text');

		$hum = new Hum;
		$hum->text = $text;
		$hum->user_id = $id;
		$hum->privacy = false;
		$hum->save();

		return Response::json($hum);
	}

	public function humsTimeline()
    {
        $id = Auth::id();
        
        $profiles = Profile::all();

        $userProfile = "";

        foreach ($profiles as $profile) {
            if ($profile->user_id == $id){
                $userProfile = $profile;
            }
        }

        $hums = Hum::get_hums($id);

        $this->layout->nest('content', 'hums', array('email' => Auth::user()->email, 'profile' => $userProfile, 'hums' => $hums)); 
    }


    public function humsSearch()
    {
        $id = Auth::id();
        $tag = Input::get('tag');
        
        $profiles = Profile::all();

        $userProfile = "";

        foreach ($profiles as $profile) {
            if ($profile->user_id == $id){
                $userProfile = $profile;
            }
        }

        $hums = Hashtag::get_hums($tag);

        $this->layout->nest('content', 'hums', array('email' => Auth::user()->email, 'profile' => $userProfile, 'hums' => $hums)); 
    }

}
