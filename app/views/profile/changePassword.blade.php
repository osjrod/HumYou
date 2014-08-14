@include('includes.header')

<div id="errors">
  @if ($errors->has())
      <div class="alert-danger text-center" role="alert">
          <small>{{ $errors->first('password') }}</small><br>  
          <small>{{ $errors->first('repeat_password') }}</small><br>
      </div>
  @endif
</div>


<div class="container">
  <div class="panel panel-default col-md-6 col-md-offset-3">
<div class="panel-body well">
    <h3>Change Password</h3>
  </div>
    <div class="panel-body">
      <div class="row">    
        <br>
        <div class="col-md-6 col-md-offset-3"> 
        <div class="page-container text-center">  
           
            {{ Form::open(array('method' => 'POST','url' => 'updatePassword','id' => 'form_login' ))}}
              {{ Form::password('password', array('class'=> 'form-control','Placeholder' => 'Password')) }}
              <br>
              {{ Form::password('password_confirmation', array('class'=> 'form-control','Placeholder' => 'Password Confirmation')) }}
              <br>
              {{ Form::button('Change Password', array('type' => 'submit', 'class' => 'btn btn-success')) }}
            {{ Form::close() }} 
            </div>
        </div>
      </div>                                              
    </div>
  </div>
</div>
{{HTML::style('css/humyou.css');}}