<?php 
    //include 'header.php';
    require 'header.php';
?>

<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            <!--################################ BEGIN Resume Visited Information ################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                            <h4 class="card-title info" id="personal_info">
                                <i class="fa fa-eye" aria-hidden="true"></i> Who Visited Your Resume
                            </h4>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block custom-card-block">

                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="resume_visited_notification_content" style="display:none"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="resume_visited_view_content"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--################################ END Resume Visited Information ################################-->

        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->

<script type="text/javascript">
    //##################### BEGIN Resume Visited Page Control #####################//
    $('#resume_visited_notification_content').hide();

    $.post("rvv", function(data) {
        $("#resume_visited_view_content").html(data);
    });
    //###################### END Resume Visited Page Control ######################//
</script>
<?php 
    //include 'footer.php';
    require 'footer.php';
?>