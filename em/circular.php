<?php
    //include 'header.php';
    require 'header.php';
    $js_id=$_SESSION['em_info']['id'];
?>
<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            <div class="row">
                <div class="success text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                    <h3 id="basic-layout-square-controls"><i class="icon-briefcase2" aria-hidden="true"></i> Circular's</h3>
                </div>
            </div>

            <!--############################## BEGIN circular ##############################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="circular_notification_content" class="center" style="display:none;"></div>

                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <h4 class="card-title" id="circular">Circular</h4>
                                <h4 class="card-title" id="circular_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> Circular
                                </h4>
                                <h4 class="card-title" id="circular_with_add_icon" style="display:none;">
                                    <i class="fa fa-plus-square-o fa-lg"></i> Circular
                                </h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a class="circular_add black" id="circular_add" title="Add New"> 
                                                <i class="fa fa-plus-circle fa-lg black"></i> <span><b>Add New Circular</b></span>
                                            </a>
                                            <a id="circular_edit_add_cancel" onclick="$('#circular_edit_content').slideUp(400);$('#circular_add_content').slideUp(400);$('#circular_view_content').slideDown(400);$('#circular_add').show();$('#circular').show();$('#circular_with_edit_icon').hide();$('#circular_with_add_icon').hide();$('#circular_edit_add_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="circular_add_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="circular_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="circular_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--############################## END circular ##############################-->

        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->

<script type="text/javascript">
    //################# BEGIN circular #################//
    $.post("circular_list", function(data) {
        $("#circular_view_content").html(data);
    });

    $('#circular_with_add_icon').hide();
    $('#circular_with_edit_icon').hide();
    $('#circular_edit_add_cancel').hide();
    $('#circular_add_content').hide();
    $('#circular_edit_content').hide();
    $('#circular_notification_content').hide();
    //################## END circular ##################//
</script>
<?php 
    //include 'footer.php';
    require 'footer.php';
?>