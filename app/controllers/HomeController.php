<?php

class HomeController extends BaseController {

	public function index()
  	{
        $this->layout->nest('content', 'home');
    }

    public function login()
    {
    	$this->layout->nest('content', 'home');
    }

    public function register()
    {
    	$this->layout->nest('content', 'home');
    }

    public function restricted()
    {
    	$this->layout->nest('content', 'restricted');
    }

    public function hums()
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
}
