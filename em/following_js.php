<?php 
	//include 'header.php';
	require 'header.php';
?>

<!--############################# BEGIN Content Area ###########################-->
<style type="text/css">
    .form-group {
        padding-bottom: 0px;
        margin: 0;
    }
    .form-group .form-control {
        margin-bottom: 0px;
    }
    .form-group input[type=search] {
        height: 24px;
    }
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            <!--################################ BEGIN Follow List Content ################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                            <h4 class="card-title info" id="personal_info">
                            	<i class="icon-ios-people"></i> Following Job Seeker
                            </h4>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block custom-card-block">

                            	<div class="col-md-12 col-sm-12 col-xs-12 table_content" id="following_js_notification_content" style="display:none"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="following_js_view_content"></div>

                        	</div>
                    	</div>
                	</div>
            	</div>
            </div>
            <!--################################ END Follow List Content ################################-->

        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->

<script type="text/javascript">
	//##################### BEGIN Job Follow List Content Control #####################//
	$('#following_em_notification_content').hide();

    $.post("fjsv", function(data) {
        $("#following_js_view_content").html(data);
    });
	//###################### END Job Follow List Content Control ######################//
</script>
<?php 
	//include 'footer.php';
	require 'footer.php';
?>