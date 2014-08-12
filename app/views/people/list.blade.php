@include('includes.header')

<div class="container">
    <div class="row">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">



                      <?php
                      $counter = 0;
                        foreach ($people as $row) {
                        	if ($counter%2 == 0){
                        		echo "<div class='row'>";
                        	}

                        	echo "<div class='well col-md-5 tumb'>";
	                            echo "<label>$row->name $row->last_name</label>"; 
	                            echo "<p>$row->nickname</p>"; 
	                            echo "<input type='hidden' value=$row->id>";
	                            	
	                            $allRequests = array();
	                            	
	                            foreach ($requests as $re) {
	                            	array_push($allRequests, $re->user_receive);
	                            }


	                            if (in_array($row->id, $allRequests))
								  {
								  echo "<input type='button' class='btn btn-info pull-right' disabled='true' value='Request Sent'>"; ;
								  }
								else
								  {
								  echo "<input type='button' class='btn btn-info pull-right seguir' value='Follow'>"; 
								  }
                             	 echo "<input type='button' class='btn btn-info pull-right perfil' value='View Profile'>";
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