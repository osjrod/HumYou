<?php

class RequestController extends \BaseController {

	public function create(){

		$user_send = Auth::id();
		$user_receive = Input::get('id');

		$request = new Requestt;

		$request->user_send = $user_send;
		$request->user_receive = $user_receive;
		$request->status = false;
		$request->save();
	
		return Response::json($request);
	}

	public function delete()
	{
		$id = Input::get('id');

		$request = Requestt::findOrFail($id);
		$request->delete();

		return Response::json($id);
	}

}
