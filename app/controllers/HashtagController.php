<?php

class HashtagController extends \BaseController {


	public function create()
	{

		$tag = Input::get('tag');
		$hum_id = Input::get('hum_id');


		$hashtag = new Hashtag;
		$hashtag->tag = $tag;
		$hashtag->hum_id = $hum_id;
		$hashtag->save();

		return Response::json($hashtag);
	}




}
