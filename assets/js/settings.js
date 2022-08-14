//################################# BEGIN Document Ready #################################//
$(document).ready(function() {

	//##################### BEGIN Settings Oparation #####################//
	$('#settings_notification_content').hide();

	$.post("stngv", function(data) {
	    $("#settings_view_content").html(data);
	});

	$('#uname_feadback').hide();
	$('#email_feadback').hide();
	$('#pass_feadback').hide();

	$('#old_uname_feadback').hide();
	$('#old_email_feadback').hide();
	$('#old_npass_feadback').hide();
	$('#old_cpass_feadback').hide();
	 //###################### END Settings Oparation ######################//
	 
 }); 
//################################# END Document Ready #################################//