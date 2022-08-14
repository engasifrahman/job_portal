<?php
	//include 'header.php';
	require 'header.php';
?>

<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            <!--################################ BEGIN Following Information ################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                            <h4 class="card-title info" id="personal_info">
                            	<i class="icon-ios-people"></i> Following Employer
                            </h4>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block custom-card-block">

                            	<div class="col-md-12 col-sm-12 col-xs-12 table_content" id="following_em_notification_content" style="display:none"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="following_em_view_content"></div>

                        	</div>
                    	</div>
                	</div>
            	</div>
            </div>
            <!--################################ END Following Information ################################-->

        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->

<script type="text/javascript">
	//##################### BEGIN Following page control #####################//
	$('#following_em_notification_content').hide();

    $.post("fev", function(data) {
        $("#following_em_view_content").html(data);
    });
	//###################### END Following page control ######################//
</script>
<?php 
	//include 'footer.php';
	require 'footer.php';
?>