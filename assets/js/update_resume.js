//################################# BEGIN Document Ready #################################//
$(document).ready(function() {

    //######################################### BEGIN Update Resume #######################################//
    
    //##################### BEGIN Top Navrbar Information #####################//
    $('#userinfo_after_edit').hide();
    //###################### END Top Navrbar Information ######################//

    //##################### BEGIN Profile Picture #####################//
    $.post("vpp", function(data) {
        $("#profile_pic_view_content").html(data);
    });
    $('#profile_pic_edit_content').hide();
    $('#profile_pic_notification_content').hide();
    //###################### END Profile Picture ######################//

	//##################### BEGIN Personal Information #####################//
    $.post("vpi", function(data) {
        $("#personal_info_view_content").html(data);
    });

    $('#personal_info_with_edit_icon').hide();
    $('#personal_info_edit_cancel').hide();
    $('#personal_info_edit_content').hide();
    $('#personal_info_notification_content').hide();
    //###################### END Personal Information ######################//

    //##################### BEGIN Contact Information #####################//
    $.post("vci", function(data) {
        $("#contact_info_view_content").html(data);
    });

    $('#contact_info_with_edit_icon').hide();
    $('#contact_info_edit_cancel').hide();
    $('#contact_info_edit_content').hide();
    $('#contact_info_notification_content').hide();
    //###################### END Contact Information ######################//

    //##################### BEGIN Coareer Information #####################//
    $.post("vcri", function(data) {
        $("#career_info_view_content").html(data);
    });

    $('#career_info_with_edit_icon').hide();
    $('#career_info_edit_cancel').hide();
    $('#career_info_edit_content').hide();
    $('#career_info_notification_content').hide();
    //##################### END Coareer Information #####################//

    //######################## BEGIN Targeted Job ########################//
    $.post("vtj", function(data) {
        $("#targeted_job_view_content").html(data);
    });

    $('#targeted_job_with_edit_icon').hide();
    $('#targeted_job_edit_cancel').hide();
    $('#targeted_job_edit_content').hide();
    $('#targeted_job_notification_content').hide();
    //######################## END Targeted Job ########################//

    //######################## BEGIN Specialization Job ########################//
    $.post("vsp", function(data) {
        $("#specialization_view_content").html(data);
    });

    $('#specialization_with_edit_icon').hide();
    $('#specialization_edit_cancel').hide();
    $('#specialization_edit_content').hide();
    $('#specialization_notification_content').hide();
    //######################## END Specialization Job ########################//

    //################# BEGIN Educational Information #################//
    $.post("vedu", function(data) {
        $("#education_view_content").html(data);
    });

    $('#education_with_add_icon').hide();
    $('#education_with_edit_icon').hide();
    $('#education_edit_add_cancel').hide();
    $('#education_add_content').hide();
    $('#education_edit_content').hide();
    $('#education_notification_content').hide();
    //################## END Educational Information ##################//

    //################# BEGIN Work Experience #################//
    $.post("vwe", function(data) {
        $("#work_exp_view_content").html(data);
    });

    $('#work_exp_with_add_icon').hide();
    $('#work_exp_with_edit_icon').hide();
    $('#work_exp_edit_add_cancel').hide();
    $('#work_exp_add_content').hide();
    $('#work_exp_edit_content').hide();
    $('#work_exp_notification_content').hide();
    //################## END Work Experience ##################//

    //################# BEGIN Training/Workshop #################//
    $.post("vtrain", function(data) {
        $("#training_view_content").html(data);
    });

    $('#training_with_add_icon').hide();
    $('#training_with_edit_icon').hide();
    $('#training_edit_add_cancel').hide();
    $('#training_add_content').hide();
    $('#training_edit_content').hide();
    $('#training_notification_content').hide();
    //################## END Training/Workshop ##################//

   //################# BEGIN Certifications #################//
    $.post("vcerti", function(data) {
        $("#certifications_view_content").html(data);
    });

    $('#certifications_with_add_icon').hide();
    $('#certifications_with_edit_icon').hide();
    $('#certifications_edit_add_cancel').hide();
    $('#certifications_add_content').hide();
    $('#certifications_edit_content').hide();
    $('#certifications_notification_content').hide();
    //################## END Certifications ##################//

    //################# BEGIN Language #################//
    $.post("vlang", function(data) {
        $("#language_view_content").html(data);
    });

    $('#language_with_add_icon').hide();
    $('#language_with_edit_icon').hide();
    $('#language_edit_add_cancel').hide();
    $('#language_add_content').hide();
    $('#language_edit_content').hide();
    $('#language_notification_content').hide();
    //################## END Language ##################//

    //################# BEGIN Reference #################//
    $.post("vref", function(data) {
        $("#reference_view_content").html(data);
    });

    $('#reference_with_add_icon').hide();
    $('#reference_with_edit_icon').hide();
    $('#reference_edit_add_cancel').hide();
    $('#reference_add_content').hide();
    $('#reference_edit_content').hide();
    $('#reference_notification_content').hide();
    //################## END Reference ##################//
    //########################################### END Update Resume #########################################//

}); 
//################################# END Document Ready #################################//