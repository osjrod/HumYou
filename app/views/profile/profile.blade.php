@include('includes.header')

<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    
                    <div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
      <li><a href="#changePassword" data-toggle="tab">Password</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="profile">
        
            <form>
                <br>
                <label>First Name</label>
                <input type="text" name="name" id="name" class="span3 form-control">
                <label>Last Name</label>
                <input type="text" name="lastname" id="lastname" class="span3 form-control">
                <label>Email Address</label>
                <input type="email" name="email" id="email" class="span3 form-control">
                <label>Nickname</label>
                <input type="text" name="nickname" id="nickname" class="span3 form-control">
                <label>Avatar</label>
                <input type="file" name="avatar_path" id="avatar_path" class="span3 form-control">
                 <label>Phone</label>
                <input type="text" name="phone" id="phone" class="span3 form-control">
                 <label>Birthday</label>
                <input type="text" name="birthday" id="birthday" class="span3 form-control">
                <label>Biography</label>
                <textarea name="biography" id="biography" class="span3 form-control" rows="8"></textarea>
                <br>
                
                <input id="cancel" value="Cancel" class="btn btn-primary pull-right" style="margin-left:10px;">
                <input id="edit" value="Save" class="btn btn-primary pull-right" style="margin-left:10px;">
                <div class="clearfix"></div>
            </form>

      </div>
      <div class="tab-pane fade" id="changePassword">
        
        </form>
      </div>
  </div>

                </div>

            
        </div>
        </div>

    </div>
</div>