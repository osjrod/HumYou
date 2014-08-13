@include('includes.header')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="well">


                   <div class="pull-right">
                       <img id="image" src={{{$profile[0]->avatar_path}}} height="150" width="150" >
                   </div> 

                   <h2>{{{$profile[0]->name}}} {{{$profile[0]->last_name}}}</h2>
                   <h3>{{{$profile[0]->nickname}}}</h3>

                   <h4>{{{$profile[0]->email}}}</h4>
                   <br>
                   <hr>

                   <h5>Phone: {{{$profile[0]->phone}}}</h5>
                   <h5>Birthday: {{{$profile[0]->birthday}}}</h5>
                   <h5>Biography: {{{$profile[0]->biography}}}</h5>

      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{HTML::style('css/humyou.css');}}