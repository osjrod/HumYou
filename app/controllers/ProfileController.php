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
		$this->layout->nest('content', 'profile.profile', array('email' => Auth::user()->email)); 
	}


	

}
