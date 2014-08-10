<?php

class ProfileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function edit()
	{
		$id = Auth::id();
		
		$profiles = Profile::all();

		$userProfile = "";

		foreach ($profiles as $profile) {
			if ($profile->user_id == $id){
				$userProfile = $profile;
			}
		}
		$this->layout->nest('content', 'profile.profile', array('email' => Auth::user()->email,'profile'=>$userProfile)); 
	}

	public function update()
	{
		$id = Input::get('id');		

		$name = Input::get('name');
		$last_name = Input::get('last_name');
		$email = Input::get('email');
		$avatar_path = Input::get('avatar_path');
		$phone = Input::get('phone');
		$birthday = Input::get('birthday');
		$biography = Input::get('biography');

		$profile = Profile::findOrFail($id);

		$profile->name = $name;
		$profile->last_name = $last_name;
		$profile->avatar_path = $avatar_path;
		$profile->phone = $phone;
		$profile->birthday = $birthday;
		$profile->biography = $biography;

		$profile->save();

		return Response::json($profile);
	}

	

}
