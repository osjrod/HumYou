<?php

class UserController extends BaseController
{

	private function validationRules()
    {
        // validate the info, create rules for the inputs
        return array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );
    }

    public function login()
    {
    	$rules = $this->validationRules();
    	$validator = Validator::make(Input::all(), $rules);

    	if ($validator->fails()) {
            return Redirect::to('home')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }

        $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        );

		if (Auth::attempt($userdata)) {
                return Redirect::to('hums');
        }

        return Redirect::to('home')->withErrors(array('invalid_credentials' => 'Acceso Denegado'));
    }

    public function register()
    {
        $rules = $this->validationRules();
        $rules['password'] = 'required|alphaNum|min:3|Confirmed';
        $rules['password_confirmation'] = 'required|alphaNum|min:3';

        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('register')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }

        $email = Input::get('email');
        $password = Input::get('password');
        $user = new User;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();
        Auth::attempt(array('email' => $email, 'password' => $password));
        return Redirect::to('hums');
    }

    public function isLogged()
    {
        if (Auth::guest()) {
            return Redirect::to('home');
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('home');
    }
}