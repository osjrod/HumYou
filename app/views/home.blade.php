<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Login</div>
                <div class="panel-body">
                    {{ Form::open(array('url' => 'login','class' => 'form-horizontal','role' => 'form')) }}
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">
                            Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success btn-sm">
                                Sign in</button>
                                 <button type="reset" class="btn btn-default btn-sm">
                                Reset</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                    @if ($errors->has())
                    	<br>
					    <div class="alert-danger text-center" role="alert">
					        <small>{{ $errors->first('email') }}</small>
					        <small>{{ $errors->first('password') }}</small>
					        <small>{{ $errors->first('invalid_credentials') }}</small>
					    </div>
					@endif
                </div>
                <div class="panel-footer">
                    <a href="http://www.jquery2dotnet.com">Forgot your password?</a>
                    </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-plus-sign"></span> Register</div>
                <div class="panel-body">
                    {{ Form::open(array('url' => 'register', 'class' => 'form form-signup form-horizontal','role' => 'form'))}}
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">
                            Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="col-sm-3 control-label">
                            Password Confirmation</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success btn-sm">
                                Register</button>
                                 <button type="reset" class="btn btn-default btn-sm">
                                Reset</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                    @if ($errors->has())
					    <div class="alert-danger text-center" role="alert">
					        <small>{{ $errors->first('email') }}</small>
					        <small>{{ $errors->first('password') }}</small>
					    </div>
					@endif
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
</div>

{{HTML::style('css/home.css');}}

@if (Auth::check())
  {{HTML::link('logout', 'Logout')}}
@else
  {{HTML::link('login', 'Login')}}
@endif

{{HTML::link('register', 'Registro');}}
{{HTML::link('restricted', 'Area Restringida');}}
