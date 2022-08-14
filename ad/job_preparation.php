<?php
    //include 'header.php';
    require 'header.php';
    $ad_id=$_SESSION['ad_info']['id'];
?>
<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            <div class="row">
                <div class="success text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                    <div class="h3" id="basic-layout-square-controls"><i class="icon-stack"></i>Job Preparation</div>
                </div>
            </div>
            
            <!--############################## BEGIN Subject Information ##############################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="subject_notification_content" class="center" style="display:none;"></div>

                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <div class=" h4 card-title" id="subject">subject</div>
                                <div class="h4 card-title" id="subject_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> subject
                                </div>
                                <div class="h4 card-title" id="subject_with_add_icon" style="display:none;">
                                    <i class="fa fa-plus-square-o fa-lg"></i> subject
                                </div>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse" title="Minimize">
                                                <i class="icon-minus4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="subject_add" id="subject_add" title="Add New"> 
                                                <i class="fa fa-plus-square-o fa-lg"></i>
                                            </a>
                                            <a id="subject_edit_add_cancel" onclick="$('#subject_edit_content').slideUp(400);$('#subject_add_content').slideUp(400);$('#subject_view_content').slideDown(400);$('#subject_add').show();$('#subject').show();$('#subject_with_edit_icon').hide();$('#subject_with_add_icon').hide();$('#subject_edit_add_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="subject_add_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="subject_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="subject_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--############################## END Subject Information #############################-->

            <!--########################### BEGIN Lesson Information ###########################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="lesson_notification_content" class="center" style="display:none;"></div>

                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <div class="h4 card-title" id="lesson">Lesson</div>
                                <div class="h4 card-title" id="lesson_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> Lesson
                                </div>
                                <div class="h4 card-title" id="lesson_with_add_icon" style="display:none;">
                                    <i class="fa fa-plus-square-o fa-lg"></i> Lesson
                                </div>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse" title="Minimize">
                                                <i class="icon-minus4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="lesson_add" id="lesson_add" title="Add New"> 
                                                <i class="fa fa-plus-square-o fa-lg"></i>
                                            </a>
                                            <a id="lesson_edit_add_cancel" onclick="$('#lesson_edit_content').slideUp(400);$('#lesson_add_content').slideUp(400);$('#lesson_view_content').slideDown(400);$('#lesson_add').show();$('#lesson').show();$('#lesson_with_edit_icon').hide();$('#lesson_with_add_icon').hide();$('#lesson_edit_add_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="lesson_add_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="lesson_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="lesson_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--########################### END Lesson Information ###########################-->
        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->

<!--############################ BEGIN Page Control ##########################-->
<script type="text/javascript">
    //################# BEGIN Subject Information #################//
    $.post("view_subject", function(data) {
        $("#subject_view_content").html(data);
    });

    $('#subject_with_add_icon').hide();
    $('#subject_with_edit_icon').hide();
    $('#subject_edit_add_cancel').hide();
    $('#subject_add_content').hide();
    $('#subject_edit_content').hide();
    $('#subject_notification_content').hide();
    //################## END Subject Information ##################//

    //################# BEGIN Lesson Information #################//
    $.post("view_lesson", function(data) {
        $("#lesson_view_content").html(data);
    });

    $('#lesson_with_add_icon').hide();
    $('#lesson_with_edit_icon').hide();
    $('#lesson_edit_add_cancel').hide();
    $('#lesson_add_content').hide();
    $('#lesson_edit_content').hide();
    $('#lesson_notification_content').hide();
    //################## END Lesson Information ##################//
</script>
<!--############################# END Page Control ###########################-->

<?php 
    //include 'footer.php';
    require 'footer.php';
?>