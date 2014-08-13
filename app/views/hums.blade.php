@include('includes.header')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">

                            <div class="text-center">
                                    <div class="span2" >
                                    <form name="viewProfile" method='post' action="/profile">
                                        <input type='hidden' name="user_id" id="user_id" value={{{$profile->user_id}}}>
                                       <a href="javascript:document.viewProfile.submit();"> <img src={{{$profile->avatar_path}}} id="imagenPerfil" height="150" width="150" > </a> 
                                    </form>
                                    </div>
                            </div>
                                    <div class="span8">
                                        <h3>{{{$profile->name}}} {{{$profile->last_name}}}</h3>
                                        <h6>Nickname: {{{$profile->nickname}}}</h6>
                                        <h6>Email: {{{$email}}}</h6>
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
                
                    
                        foreach ($requests as $request) {
                         echo "<div class='well'>";
                         echo "<div class='row'>";
                            echo "<div class='col-md-4'>";
                            echo"<form id='viewProfileRequest$request->user_send' method='post' action='/profile'>
                                        <input type='hidden' name='user_id' id='user_id' value=$request->user_send>
                                       <a href='javascript:;' onclick='document.getElementById(\"viewProfileRequest$request->user_send\").submit();'> ";
                            echo "<img src=$request->avatar_path height='75' width='75' >";
                            echo"</a></form>";
                            echo "</div>";
                            echo "<div class='col-md-6'>";
                            echo "<h6>$request->name $request->last_name</h6>";
                            echo "<h6>$request->nickname</h6>";
                            echo "</div>";
                            echo "</div>";
                            echo "<input type='hidden' value=$request->request_id>";
                            echo "<input type='hidden' value=$request->user_send>";
                            echo "<input type='hidden' value=$request->user_receive>";
                            echo "<input type='button' class='btn btn-info pull-right accept' value='Accept'>";
                            echo "<input type='button' class='btn btn-info pull-right reject' value='Reject'>";
                         echo "</div>";


                        }
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
                            echo "<div class='row'>";
                            echo "<div class='col-md-2'>";
                            echo"<form id='viewProfile$row->user_id' method='post' action='/profile'>
                                        <input type='hidden' name='user_id' id='user_id' value=$row->user_id>
                                       <a href='javascript:;' onclick='document.getElementById(\"viewProfile$row->user_id\").submit();'> ";
                            echo "<img src=$row->avatar_path height='75' width='75' >";
                            echo"</a></form>";
                            echo "</div>";
                            echo "<div class='col-md-10'>";
                            echo "<label>$row->name $row->last_name</label>"; 
                            echo "<p>$row->nickname</p>";
                            echo "</div>";
                            echo "</div>";
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