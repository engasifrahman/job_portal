<?php 
    //include 'header.php';
    require 'header.php';
    $em_id=$_SESSION['em_info']['id'];
?>

<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            <!--################################ BEGIN Profile Content ################################-->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header info text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                            <h4 class="card-title">  <i class="icon-android-person" style="font-size: 1.5rem;"></i> Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-block">

                                <ul class="nav nav-tabs">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true"> Company Profile</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false"> Your Profile</a>
                                    </li>

                                </ul>

                                <div class="tab-content px-1 pt-1">
                                    <!--############################ BEGIN Company Profile #####################-->
                                    <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">

                                        <!--####################### BEGIN Company Logo ###################-->
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 mobile-device text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                
                                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="company_logo_edit_content" style="display:none;"></div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="company_logo_view_content"></div>

                                            </div>
                                        </div>
                                        <!--####################### END Company Logo #######################-->
                                        
                                        <!--####################### BEGIN Company info ################-->
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                                                <div id="company_info_notification_content" class="center" style="display:none;"></div>
                                                
                                                <br>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="card">
                                                        <div class="card-header update_resume_card_header">
                                                            <h4 class="card-title" id="company_info">Company Information</h4>
                                                            <h4 class="card-title" id="company_info_with_edit_icon" style="display:none;">
                                                                <i class="fa fa-pencil-square-o fa-lg"></i> Company Information
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
                                                                        <a id="<?php echo $em_id; ?>" class="company_info_edit" title="Edit"> 
                                                                            <i class="fa fa-pencil-square-o fa-lg"></i>
                                                                        </a>
                                                                        <a id="company_info_edit_cancel" onclick="$('#company_info_edit_content').slideUp(400);$('#company_info_view_content').slideDown(400);$('.company_info_edit').show();$('#company_info').show();$('#company_info_with_edit_icon').hide();$('#company_info_edit_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                                            <i class="icon-cross2"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block custom-card-block">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="company_info_edit_content" style="display:none;"></div>
                                                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="company_info_view_content"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--########################## END Company Info ##########################-->

                                    </div>
                                    <!--########################## END Company Profile ##########################-->



                                    <!--########################## BEGIN Contact Person Profile ##########################-->
                                    <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">

                                        <!--#################### BEGIN Contact Person Profile Picture ################-->
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 mobile-device text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                
                                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="cp_profile_pic_edit_content" style="display:none;"></div>
                                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="cp_profile_pic_view_content"></div>

                                            </div>
                                        </div>
                                        <!--#################### END Contact Person Profile Picture ####################-->
                                        
                                        <!--############################ BEGIN Contact Person info #####################-->
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 mobile-device">

                                                <div id="cp_info_notification_content" class="center" style="display:none;"></div>
                                                
                                                <br>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="card">
                                                        <div class="card-header update_resume_card_header">
                                                            <h4 class="card-title" id="cp_info">Your Information</h4>
                                                            <h4 class="card-title" id="cp_info_with_edit_icon" style="display:none;">
                                                                <i class="fa fa-pencil-square-o fa-lg"></i> Your Information
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
                                                                        <a id="<?php echo $em_id; ?>" class="cp_info_edit" title="Edit"> 
                                                                            <i class="fa fa-pencil-square-o fa-lg"></i>
                                                                        </a>
                                                                        <a id="cp_info_edit_cancel" onclick="$('#cp_info_edit_content').slideUp(400);$('#cp_info_view_content').slideDown(400);$('.cp_info_edit').show();$('#cp_info').show();$('#cp_info_with_edit_icon').hide();$('#cp_info_edit_cancel').hide();" title="Cancel Editing" style="display:none;">
                                                                            <i class="icon-cross2"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-body collapse in">
                                                            <div class="card-block custom-card-block">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="cp_info_edit_content" style="display:none;"></div>
                                                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="cp_info_view_content"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--########################## END Contact Person Info ##########################-->
                                    </div>
                                    <!--########################## END Contact Person Profile ##########################-->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--################################ END Profile Content ################################-->

        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->

<script type="text/javascript">

    //##################### BEGIN Company Logo ################//
    $.post("vcl", function(data) {
        $("#company_logo_view_content").html(data);
    });
    $('#company_logo_edit_content').hide();
    $('#company_logo_notification_content').hide();
    //###################### END Company Logo #################//

    //##################### BEGIN Company Profile #####################//
    $.post("vci", function(data) {
        $("#company_info_view_content").html(data);
    });

    $('#company_info_with_edit_icon').hide();
    $('#company_info_edit_cancel').hide();
    $('#company_info_edit_content').hide();
    $('#company_info_notification_content').hide();
    //###################### END Company Profile ######################//


    //##################### BEGIN Top Navrbar Information #####################//
    $('#userinfo_after_edit').hide();
    //###################### END Top Navrbar Information ######################//

    //##################### BEGIN Contact Person Profile Picture ################//
    $.post("vcppp", function(data) {
        $("#cp_profile_pic_view_content").html(data);
    });
    $('#cp_profile_pic_edit_content').hide();
    $('#cp_profile_pic_notification_content').hide();
    //###################### END Contact Person Profile Picture #################//

    //##################### BEGIN Contact Person Profile #####################//
    $.post("vcpi", function(data) {
        $("#cp_info_view_content").html(data);
    });

    $('#cp_info_with_edit_icon').hide();
    $('#cp_info_edit_cancel').hide();
    $('#cp_info_edit_content').hide();
    $('#cp_info_notification_content').hide();
    //###################### END Contact Person Profile ######################//

</script>

<?php 
    //include 'footer.php';
    require 'footer.php';
?>