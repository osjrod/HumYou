@include('includes.header')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"> 
                </div>
                <div class="panel-body">

                        <textarea name="text" id="text" class="form-control counted" placeholder="Post a new HUM!" rows="8" style="margin-bottom:10px;"></textarea>
                        <h6 class="pull-right" id="counter">140 characters remaining</h6>
                        <button class="btn btn-info" id="postear" >Post</button>

                </div>

                <div class="panel-footer"></div>
            
        </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>HUMS</h4> 
                    </div>
                <div class="panel-body">
                    
                </div>

                <div class="panel-footer"></div>
            
        </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    
                </div>

                <div class="panel-footer"></div>
            
        </div>
        </div>
    </div>
</div>