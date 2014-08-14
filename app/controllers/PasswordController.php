<?php
class PasswordController extends BaseController {
 
  public function remind()
  {
    return View::make('password.remind');
  }

  public function request()
	{
	  $credentials = array('email' => Input::get('email'));
	 
	  Password::remind($credentials,function($message, $user)
		{
		$message->subject('Password Reset');
		});
	  return Redirect::to('/');
	}

	public function reset($token)
	{
	  return View::make('password.reset')->with('token', $token);
	}

	public function update()
	{
	  $credentials = array('email' => Input::get('email'),'password' => Input::get('password'),'password_confirmation' => Input::get('password_confirmation'),'token' => Input::get('token'));
	 
		Password::validator(function($credentials)
		{
		    return strlen($credentials['password']) >= 3;
		});

	  $resultado = Password::reset($credentials, function($user, $password)
	  {
	    $user->password = Hash::make($password);
	 
	    $user->save();
	    
	  });

	  if ($resultado == 'reminders.reset'){
	    	return "Now you can login.";
	    }
	    else if ($resultado == 'reminders.password'){
	    	return "Password is too short or does not match.";
	    }
	    else if ($resultado == 'reminders.token'){
	    	return "This link has already expired.";
	    }
	 	else{
	    	return "You can't change your password.";
	    }
	}
}