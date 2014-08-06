<?php

class HomeController extends BaseController {

	public function index()
  	{
        $this->layout->nest('content', 'home');
    }

    public function login()
    {
    	$this->layout->nest('content', 'login');
    }

    public function register()
    {
    	$this->layout->nest('content', 'register');
    }

    public function restricted()
    {
    	$this->layout->nest('content', 'restricted');
    }
}
