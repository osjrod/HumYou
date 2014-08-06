{{ Form::open(array('url' => 'login')) }}
  {{Form::label('email', 'Email');}}
  {{Form::email('email', '', array('required' => true));}}
  <br>
  {{Form::label('password', 'Password');}}
  {{ Form::password('password', array('placeholder' => 'Contraseña', 'required' => 'true')) }}
  {{ Form::submit('Login')}}
{{ Form::close() }}
@if ($errors->has())
    <div class="alert-danger text-center" role="alert">
        <small>{{ $errors->first('email') }}</small>
        <small>{{ $errors->first('password') }}</small>
        <small>{{ $errors->first('invalid_credentials') }}</small>
    </div>
@endif