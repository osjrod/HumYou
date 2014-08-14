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
		$this->layout->nest('content', 'profile.edit', array('email' => Auth::user()->email,'profile'=>$userProfile)); 
	}

	public function show()
	{
		$id = Input::get('user_id');
		$email = Auth::user()->email;

		$profile = Profile::getProfile($id);

		$this->layout->nest('content', 'profile.profile', array('email' => Auth::user()->email, 'profile'=>$profile)); 
	}

	public function update()
	{
		$id = Input::get('id');		

		$name = Input::get('name');
		$last_name = Input::get('last_name');
		$email = Input::get('email');
		$phone = Input::get('phone');
		$birthday = Input::get('birthday');
		$biography = Input::get('biography');

		$profile = Profile::findOrFail($id);

		$profile->name = $name;
		$profile->last_name = $last_name;
		$profile->phone = $phone;
		$profile->birthday = $birthday;
		$profile->biography = $biography;

		$profile->save();

		return Response::json($profile);
	}

	public function listPeople()
	{
		$id = Auth::id();

		$people = Profile::listPeople($id);
		$requests = Requestt::myRequestsSend($id); 
		$blocks = Block::myBlocks($id);

        $this->layout->nest('content', 'people.list', array('email' => Auth::user()->email,'people' => $people,'requests' => $requests,'blocks' => $blocks)); 
		
	}

	public function uploadPicture()
	 {
	   $id  = Input::get('id');
	   $picture  = Input::file('picture');

	   $filename = $picture->getClientOriginalName();
	   $path     = "public/Pictures/$id/";
	   
	  $file_parts = pathinfo($filename);//getting file
	  $extension  = $file_parts['extension'];//getting extension
	     if ( ! preg_match("/jpeg|jpg|png/i", $extension)) {
	      return Response::json('extension');
	  }
	   $insert = Profile::updatePicture($id,"Pictures/$id/$filename");
	   $uploadSuccess = $picture->move($path, $filename);
	   if($uploadSuccess)
	  {
	   return Response::json($insert);
	  }
	  else
	  {
	   return Response::json("");
	  }
 	}

 	  public $validationChangePassword = array(
            'password'          => 'required|alphaNum|min:3|Confirmed', 
            'password_confirmation'   => 'required|alphaNum|min:3'
        );

 	public function changePassword(){

        $this->layout->nest('content', 'profile.changePassword', array('email' => Auth::user()->email));   
    }

    public function passwordUpdate(){

        $validator  = Validator::make(Input::all(), $this->validationChangePassword);
        if ($validator->fails()) {
            return Redirect::to('/changePassword')
                ->withErrors($validator)
                ->withInput();
        } else {
            $password = Input::get('password');
            $id       = Auth::user()->id;
            
            $user = User::findOrFail($id);

            $user->password  = Hash::make($password);
            $user->save();

            return Redirect::to('/');
        }
    }
	

}
