<?php

class MentionController extends \BaseController {

	public function create(){

		$nickname = Input::get('nickname');
		$hum_id = Input::get('hum_id');
		$mentioner = Auth::id();

		$profiles = Profile::all();

		foreach ($profiles as $profile) {
			$mention = new Mention;
			if ($profile->nickname == $nickname){
				$mention->user_id = $profile->user_id;
				$mention->hum_id = $hum_id;
				$mention->mentioner = $mentioner;
				$mention->save();
			}
		}

		return Response::json($mention);
	}

}
