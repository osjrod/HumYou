@include('includes.header')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"> 
                </div>
                <div class="panel-body">

                            <div class="text-center">
                                    <div class="span2" >
                                        <img src="data:image/jpeg;base64,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" class="img-circle" height="170" width="170" >
                                    </div>
                            </div>
                                    <div class="span8">
                                        <h3>{{{$profile->name}}} {{{$profile->last_name}}}</h3>
                                        <h6>Nickname: {{{$profile->nickname}}}</h6>
                                        <h6>Email: {{{$email}}}</h6>
                                        <h6>Phone: {{{$profile->phone}}}</h6>
                                    </div>
                            <hr>

                        <textarea name="text" id="text" class="form-control counted" placeholder="Post a new HUM!" rows="8" style="margin-bottom:10px;"></textarea>
                        <h6 class="pull-right" id="counter">140 characters remaining</h6>
                        <button class="btn btn-info" id="postear" >Post</button>

                </div>
                <hr>
                <div class="panel-body">
                <?php

                if($requests){
                    echo "<h3>Follow Requests<h3>";
                }
                    
                        foreach ($requests as $request) {
                         echo "<div class='well'>";
                            echo "<h6>$request->name</h6>";
                            echo "<h6>$request->nickname</h6>";
                            echo "<input type='hidden' value=$request->request_id>";
                            echo "<input type='hidden' value=$request->user_send>";
                            echo "<input type='hidden' value=$request->user_receive>";
                            echo "<input type='button' class='btn btn-info pull-right accept' value='Accept'>";
                            echo "<input type='button' class='btn btn-info pull-right reject' value='Reject'>";
                         echo "</div>";


                        }
                    ?>
                </div>
            
        </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>HUMS</h4> 
                    </div>
                <div class="panel-body">
                    <?php
                        foreach (array_reverse($hums) as $row) {
                            echo "<div class='well'>";
                            echo "<div class='panel-heading'>";
                            echo "<label>$row->name $row->last_name</label>"; 
                            echo "<p>$row->nickname</p>";
                            echo "<hr>"; 
                            echo "</div>";
                                echo "$row->text";
                            echo "</div>";
                        }
                    ?>
                </div>

                <div class="panel-footer"></div>
            
        </div>
        </div>
    </div>
</div>
{{HTML::style('css/humyou.css');}}