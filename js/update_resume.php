<?php
    //include 'header.php';
    require 'header.php';
    $js_id=$_SESSION['js_info']['id'];
?>
<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            <div class="row">
                <div class="success text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                    <h3 id="basic-layout-square-controls"><i class="fa fa-pencil-square-o fa-lg"></i> Update Resume</h3>
                </div>
            </div>

            <!--################################ BEGIN Profile Picture ################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                    
                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="profile_pic_edit_content" style="display:none;"></div>
                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="profile_pic_view_content"></div>

                </div>
            </div>
            <!--################################ END Profile Picture ################################-->
            
            <!--################################ BEGIN Personal Information ################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="personal_info_notification_content" class="center" style="display:none;"></div>
                    
                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <h4 class="card-title" id="personal_info">Personal Information</h4>
                                <h4 class="card-title" id="personal_info_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> Personal Information
                                </h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse" title="Minimize">
                                                <i class="icon-minus4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="<?php echo $js_id; ?>" class="personal_info_edit" title="Edit"> 
                                                <i class="fa fa-pencil-square-o fa-lg"></i>
                                            </a>
                                            <a id="personal_info_edit_cancel" onclick="$('#personal_info_edit_content').slideUp(400);$('#personal_info_view_content').slideDown(400);$('.personal_info_edit').show();$('#personal_info').show();$('#personal_info_with_edit_icon').hide();$('#personal_info_edit_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="personal_info_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="personal_info_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--################################ END Personal Information ################################-->

            <!--################################ BEGIN Contact Information ################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="contact_info_notification_content" class="center" style="display:none;"></div>

                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <h4 class="card-title" id="contact_info">Contact Information</h4>
                                <h4 class="card-title" id="contact_info_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> Contact Information
                                </h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse" title="Minimize">
                                                <i class="icon-minus4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="<?php echo $js_id; ?>" class="contact_info_edit" title="Edit"> 
                                                <i class="fa fa-pencil-square-o fa-lg"></i>
                                            </a>
                                            <a id="contact_info_edit_cancel" onclick="$('#contact_info_edit_content').slideUp(400);$('#contact_info_view_content').slideDown(400);$('.contact_info_edit').show();$('#contact_info').show();$('#contact_info_with_edit_icon').hide();$('#contact_info_edit_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="contact_info_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="contact_info_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--################################ END Contact Information ################################-->

            <!--################################ BEGIN Career Information ################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="career_info_notification_content" class="center" style="display:none;"></div>

                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <h4 class="card-title" id="career_info">Career Information</h4>
                                <h4 class="card-title" id="career_info_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> Career Information
                                </h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse" title="Minimize">
                                                <i class="icon-minus4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="<?php echo $js_id; ?>" class="career_info_edit" title="Edit"> 
                                                <i class="fa fa-pencil-square-o fa-lg"></i>
                                            </a>
                                            <a id="career_info_edit_cancel" onclick="$('#career_info_edit_content').slideUp(400);$('#career_info_view_content').slideDown(400);$('.career_info_edit').show();$('#career_info').show();$('#career_info_with_edit_icon').hide();$('#career_info_edit_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="career_info_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="career_info_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--################################ END Career Information ################################-->

            <!--################################## BEGIN Targeted Job ##################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="targeted_job_notification_content" class="center" style="display:none;"></div>

                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <h4 class="card-title" id="targeted_job">Targeted Job</h4>
                                <h4 class="card-title" id="targeted_job_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> Targeted Job
                                </h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse" title="Minimize">
                                                <i class="icon-minus4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="<?php echo $js_id; ?>" class="targeted_job_edit" title="Edit"> 
                                                <i class="fa fa-pencil-square-o fa-lg"></i>
                                            </a>
                                            <a id="targeted_job_edit_cancel" onclick="$('#targeted_job_edit_content').slideUp(400);$('#targeted_job_view_content').slideDown(400);$('.targeted_job_edit').show();$('#targeted_job').show();$('#targeted_job_with_edit_icon').hide();$('#targeted_job_edit_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="targeted_job_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="targeted_job_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--################################## END Targeted Job ##################################-->

            <!--################################## BEGIN Specialization Job ##################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="specialization_notification_content" class="center" style="display:none;"></div>

                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <h4 class="card-title" id="specialization">Specialization</h4>
                                <h4 class="card-title" id="specialization_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> Specialization
                                </h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse" title="Minimize">
                                                <i class="icon-minus4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="<?php echo $js_id; ?>" class="specialization_edit" title="Edit"> 
                                                <i class="fa fa-pencil-square-o fa-lg"></i>
                                            </a>
                                            <a id="specialization_edit_cancel" onclick="$('#specialization_edit_content').slideUp(400);$('#specialization_view_content').slideDown(400);$('.specialization_edit').show();$('#specialization').show();$('#specialization_with_edit_icon').hide();$('#specialization_edit_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="specialization_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="specialization_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--################################## END Specialization Job ##################################-->

            <!--########################### BEGIN Educational Information ###########################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="education_notification_content" class="center" style="display:none;"></div>

                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <h4 class="card-title" id="education">Education</h4>
                                <h4 class="card-title" id="education_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> Education
                                </h4>
                                <h4 class="card-title" id="education_with_add_icon" style="display:none;">
                                    <i class="fa fa-plus-square-o fa-lg"></i> Education
                                </h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse" title="Minimize">
                                                <i class="icon-minus4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="education_add" id="education_add" title="Add New"> 
                                                <i class="fa fa-plus-square-o fa-lg"></i>
                                            </a>
                                            <a id="education_edit_add_cancel" 
                                            onclick="
                                            $('#education_edit_content').slideUp(400);
                                            $('#education_add_content').slideUp(400);
                                            $('#education_view_content').slideDown(400);
                                            $('#education_add').show();
                                            $('#education').show();
                                            $('#education_with_edit_icon').hide();
                                            $('#education_with_add_icon').hide();
                                            $('#education_edit_add_cancel').hide();"
                                             title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="education_add_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="education_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="education_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--########################### END Educational Information ###########################-->

            <!--############################## BEGIN Work Experience ##############################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="work_exp_notification_content" class="center" style="display:none;"></div>

                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <h4 class="card-title" id="work_exp">Work Experience</h4>
                                <h4 class="card-title" id="work_exp_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> Work Experience
                                </h4>
                                <h4 class="card-title" id="work_exp_with_add_icon" style="display:none;">
                                    <i class="fa fa-plus-square-o fa-lg"></i> Work Experience
                                </h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse" title="Minimize">
                                                <i class="icon-minus4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="work_exp_add" id="work_exp_add" title="Add New"> 
                                                <i class="fa fa-plus-square-o fa-lg"></i>
                                            </a>
                                            <a id="work_exp_edit_add_cancel" onclick="$('#work_exp_edit_content').slideUp(400);$('#work_exp_add_content').slideUp(400);$('#work_exp_view_content').slideDown(400);$('#work_exp_add').show();$('#work_exp').show();$('#work_exp_with_edit_icon').hide();$('#work_exp_with_add_icon').hide();$('#work_exp_edit_add_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="work_exp_add_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="work_exp_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="work_exp_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--############################## END Work Experience ##############################-->

            <!--############################## BEGIN Training/Workshop ##############################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="training_notification_content" class="center" style="display:none;"></div>

                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <h4 class="card-title" id="training">Training/Workshop</h4>
                                <h4 class="card-title" id="training_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> Training/Workshop
                                </h4>
                                <h4 class="card-title" id="training_with_add_icon" style="display:none;">
                                    <i class="fa fa-plus-square-o fa-lg"></i> Training/Workshop
                                </h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse" title="Minimize">
                                                <i class="icon-minus4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="training_add" id="training_add" title="Add New"> 
                                                <i class="fa fa-plus-square-o fa-lg"></i>
                                            </a>
                                            <a id="training_edit_add_cancel" onclick="$('#training_edit_content').slideUp(400);$('#training_add_content').slideUp(400);$('#training_view_content').slideDown(400);$('#training_add').show();$('#training').show();$('#training_with_edit_icon').hide();$('#training_with_add_icon').hide();$('#training_edit_add_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="training_add_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="training_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="training_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--############################## END Training/Workshop ##############################-->


            <!--############################## BEGIN Certifications ##############################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="certifications_notification_content" class="center" style="display:none;"></div>

                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <h4 class="card-title" id="certifications">Certifications</h4>
                                <h4 class="card-title" id="certifications_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> Certifications
                                </h4>
                                <h4 class="card-title" id="certifications_with_add_icon" style="display:none;">
                                    <i class="fa fa-plus-square-o fa-lg"></i> Certifications
                                </h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse" title="Minimize">
                                                <i class="icon-minus4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="certifications_add" id="certifications_add" title="Add New"> 
                                                <i class="fa fa-plus-square-o fa-lg"></i>
                                            </a>
                                            <a id="certifications_edit_add_cancel" onclick="$('#certifications_edit_content').slideUp(400);$('#certifications_add_content').slideUp(400);$('#certifications_view_content').slideDown(400);$('#certifications_add').show();$('#certifications').show();$('#certifications_with_edit_icon').hide();$('#certifications_with_add_icon').hide();$('#certifications_edit_add_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="certifications_add_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="certifications_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="certifications_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--############################## END Certifications ##############################-->

            <!--############################## BEGIN Language ##############################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="language_notification_content" class="center" style="display:none;"></div>

                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <h4 class="card-title" id="language">Language</h4>
                                <h4 class="card-title" id="language_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> Language
                                </h4>
                                <h4 class="card-title" id="language_with_add_icon" style="display:none;">
                                    <i class="fa fa-plus-square-o fa-lg"></i> Language
                                </h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse" title="Minimize">
                                                <i class="icon-minus4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="language_add" id="language_add" title="Add New"> 
                                                <i class="fa fa-plus-square-o fa-lg"></i>
                                            </a>
                                            <a id="language_edit_add_cancel" onclick="$('#language_edit_content').slideUp(400);$('#language_add_content').slideUp(400);$('#language_view_content').slideDown(400);$('#language_add').show();$('#language').show();$('#language_with_edit_icon').hide();$('#language_with_add_icon').hide();$('#language_edit_add_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="language_add_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="language_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="language_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--############################## END Language ##############################-->

            <!--############################## BEGIN Reference ##############################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                    <div id="reference_notification_content" class="center" style="display:none;"></div>

                    <br>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header update_resume_card_header">
                                <h4 class="card-title" id="reference">Reference</h4>
                                <h4 class="card-title" id="reference_with_edit_icon" style="display:none;">
                                    <i class="fa fa-pencil-square-o fa-lg"></i> Reference
                                </h4>
                                <h4 class="card-title" id="reference_with_add_icon" style="display:none;">
                                    <i class="fa fa-plus-square-o fa-lg"></i> Reference
                                </h4>
                                <a class="heading-elements-toggle">
                                    <i class="icon-ellipsis font-medium-3"></i>
                                </a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse" title="Minimize">
                                                <i class="icon-minus4"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="reference_add" id="reference_add" title="Add New"> 
                                                <i class="fa fa-plus-square-o fa-lg"></i>
                                            </a>
                                            <a id="reference_edit_add_cancel" onclick="$('#reference_edit_content').slideUp(400);$('#reference_add_content').slideUp(400);$('#reference_view_content').slideDown(400);$('#reference_add').show();$('#reference').show();$('#reference_with_edit_icon').hide();$('#reference_with_add_icon').hide();$('#reference_edit_add_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                <i class="icon-cross2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block custom-card-block">
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="reference_add_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="reference_edit_content" style="display:none;"></div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="reference_view_content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--############################## END Reference ##############################-->
        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->

<!--############################ BEGIN Page Control ##########################-->
<script src="../assets/js/update_resume.js" type="text/javascript" ></script>
<!--############################# END Page Control ###########################-->

<?php 
    //include 'footer.php';
    require 'footer.php';
?>