<?php

class BlockController extends \BaseController {

	public function create(){

		$user_follower_id = Auth::id();
		$user_following_id = Input::get('id');

		$block = new Block;

		$block->user_follower_id = $user_follower_id;
		$block->user_following_id = $user_following_id;
		$block->save();
	
		return Response::json($block);
	}

	public function delete()
	{
		$follower = Auth::id();
		$following = Input::get('id');

		$block = Block::deleteBlock($follower, $following);

		return Response::json($following);
	}


}
