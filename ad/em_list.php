<?php 
    //include 'header.php';
    require 'header.php';
?>

<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content">
    <div class="content-wrapper" style="padding-top: 13px;padding-bottom: 0px">
        <div class="content-body">

            <!--################################ BEGIN Job Seeker List Content ################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">
                    <div class="card">
                        <div class="card-header text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                            <h4 class="card-title info" id="personal_info">
                                <i class="icon-android-person"></i> Employer List
                            </h4>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block custom-card-block">

                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="em_list_notification_content" style="display:none"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="em_list_view_content"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--################################ END Job Seeker List Content ################################-->

        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->

<script type="text/javascript">
    //##################### BEGIN Job Seeker List Content Control #####################//
    $('#em_list_notification_content').hide();

    $.post("lemv", function(data) {
        $("#em_list_view_content").html(data);
    });
    //###################### END Job Seeker List Content Control ######################//
</script>
<?php 
    //include 'footer.php';
    require 'footer.php';
?>