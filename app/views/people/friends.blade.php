@include('includes.header')

<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">

                      <?php
                      $counter = 0;
                        foreach ($follow as $row) {

                            $allBlocks = array();
                                    
                                foreach ($blocks as $block) {
                                    array_push($allBlocks, $block->user_following_id);
                                }


                        	if ($counter%2 == 0){
                        		echo "<div class='row'>";
                        	}

                        	echo "<div class='well col-md-5 tumb'>";
                            echo "<div class='row'>";
                            echo "<div class='col-md-3'>";
                            echo "<img src=$row->avatar_path height='75' width='75' >";
                            echo "<br>";
                            if (in_array($row->user_following_id,$allBlocks)){
                                echo "<input type='button' class='btn btn-info center-block desbloquear' value='Unblock'>";
                            }
                            else{
                                echo "<input type='button' class='btn btn-info center-block bloquear' value='Block'>";
                            }
                            
                            
                            echo "</div>";
                            echo "<div class='col-md-9'>";
	                            echo "<label>$row->name $row->last_name</label>"; 
	                            echo "<p>$row->nickname</p>"; 
                                echo "<input type='hidden'>";
	                            echo "<input type='hidden' value=$row->user_following_id>";

	                       echo "</div>";
								  echo "<input type='button' class='btn btn-info pull-right dejar' value='Stop Following'>";
                                  echo "<form action='profile' method='post'>";
                                  echo "<input type='hidden' name='user_id' value=$row->user_following_id>";
                             	 echo "<input type='submit' class='btn btn-info pull-right perfil' value='View Profile'>";
                                 echo "</form>";
                                echo "</div>";
                                echo "</div>";
                            if ($counter%2 == 1){
                        		echo "</div>";
                        	}

                        	$counter++;
                        }
                    ?>

            
        </div>
        </div>

    </div>
</div>
{{HTML::style('css/humyou.css');}}