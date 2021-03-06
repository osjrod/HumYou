@include('includes.header')

<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    
                    <div class="well">
    
            <form>
                <br>
                <div class="row">
                   <div class="col-md-2">
                       <img id="image" src={{{$profile->avatar_path}}} height="100" width="100" >
                   </div> 
                   <div class="col-md-10">
                        <label>Avatar</label>
                        <input type="file" name="avatar_path" id="avatar_path" class="span3 form-control" value={{{$profile->avatar_path}}}>
                        <br>
                        <input type="button" id="upload" value="Set Photo" class="btn btn-primary pull-right" style="margin-left:10px;">
                        <input type="button" id="deletePhoto" value="Delete" class="btn btn-primary pull-right" style="margin-left:10px;">
                   </div>
                </div>
                <hr>
                <input type="hidden" name="id" id="id" value={{{$profile->id}}}>
                <label>First Name</label>
                <input type="text" name="name" id="name" class="span3 form-control" value={{{$profile->name}}}>
                <label>Last Name</label>
                <input type="text" name="las_tname" id="last_name" class="span3 form-control" value={{{$profile->last_name}}}>
                <label>Email Address</label>
                <input type="email" name="email" id="email" class="span3 form-control" value={{{$email}}}>
                <label>Nickname</label>
                <input type="text" name="nickname" id="nickname" class="span3 form-control" value={{{$profile->nickname}}}>
                
                 <label>Phone</label>
                <input type="text" name="phone" id="phone" class="span3 form-control" value={{{$profile->phone}}}>
                 <label>Birthday</label>

                 <?php
                 if ($profile->birthday == null){
                echo"<input type='date' name='birthday' id='birthday' class='span3 form-control' value='1753-01-01'>";
                 }
                 else{
                echo"<input type='date' name='birthday' id='birthday' class='span3 form-control' value=$profile->birthday>"; 
                 }
                ?>

                <label>Biography</label>
                <textarea name="biography" id="biography" class="span3 form-control" rows="8">{{{$profile->biography}}}</textarea>
                <br>
                
                <input type="button" id="cancel" value="Cancel" class="btn btn-primary pull-right" style="margin-left:10px;">
                <input type="button" id="edit" value="Save" class="btn btn-primary pull-right" style="margin-left:10px;">
                <div class="clearfix"></div>
            </form>

      
  </div>

                </div>

            
        </div>
        </div>

    </div>
</div>

{{HTML::style('css/humyou.css');}}