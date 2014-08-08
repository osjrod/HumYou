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


}
