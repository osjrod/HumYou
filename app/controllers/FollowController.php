<?php

class FollowController extends \BaseController {

	public function create(){

		$user_following_id = Input::get('following');
		$user_follower_id = Input::get('follower');

		$follow = new Follow;

		$follow->user_following_id = $user_following_id;
		$follow->user_follower_id = $user_follower_id;
		$follow->save();

		$id = Input::get('request_id');

		$request = Requestt::findOrFail($id);
		$request->delete();
	
		return Response::json($follow);
	}

	public function listFollows()
	{
		$id = Auth::id();

		$follow = Follow::myFollows($id); 

        $this->layout->nest('content', 'people.friends', array('email' => Auth::user()->email,'follow' => $follow)); 
		
	}

	public function delete()
	{
		$id = Input::get('id');

		$follow = Follow::findOrFail($id);
		$follow->delete();

		return Response::json($id);
	}



}
