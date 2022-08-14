<?php
	require 'header.php';
?>


<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            <!--################################ BEGIN Saved Job Information ################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                            <h4 class="card-title info" id="personal_info">
                            	<i class="icon-pushpin"></i> Saved Jobs
                            </h4>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block custom-card-block">

                            	<div class="col-md-12 col-sm-12 col-xs-12 table_content" id="saved_job_notification_content" style="display: none;"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="saved_job_view_content"></div>

                        	</div>
                    	</div>
                	</div>
            	</div>
            </div>
            <!--################################ END Saved Job Information ################################-->

        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->


<script type="text/javascript">
	//############################### BEGIN Page Control ##############################/

	$('#saved_job_notification_content').hide();

	$.post("sjv", function(data)
	{	
		$("#saved_job_view_content").html(data);
	});

	//############################### END Page Control ##############################//
</script>


<?php 
	//include 'footer.php';
	require 'footer.php';
?>