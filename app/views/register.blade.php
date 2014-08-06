{{ Form::open(array('url' => 'register', 'class' => 'form form-signup'))}}
  {{Form::label('email', 'Email');}}
  {{Form::email('email', '', array('required' => true));}}
  <br>
  {{Form::label('password', 'Password');}}
  {{Form::password('password', array('required' => 'true')) }}
  <br>
  {{Form::label('password_confirmation', 'Password Confirmation');}}
  {{Form::password('password_confirmation', array('required' => 'true'))}}
  {{ Form::submit('Login')}}
{{ Form::close() }}
@if ($errors->has())
    <div class="alert-danger text-center" role="alert">
        <small>{{ $errors->first('email') }}</small>
        <small>{{ $errors->first('password') }}</small>
    </div>
@endif