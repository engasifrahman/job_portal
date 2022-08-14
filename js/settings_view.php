<div class="col-md-12 bg-white">
    <div class="info pt-1 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
        <h4 class="card-title" id="basic-layout-colored-form-control"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</h4>
    </div>

    <div>
        <hr>
        <div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
            <small class="warning text-bold-700">
                You can change username or email or password separately or all fields at a time
            </small>
            <br>
            <small class="font-small-2 grey text-bold-500">
                If you do not want to change any specific field, leave blank its related input fields
            </small>
        </div>
        <div class="card wizard-card" data-color="orange">
        <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
            <form id="settings_form" class="form" method="post" action="">
                <div class="form-body">
                    <h4 class="border-bottom mb-2"><i class="fa fa-shield" aria-hidden="true"></i> Change Username</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="old_uname">Old Username</label>
                                    <input type="text" id="old_uname" name="old_uname" class="form-control form-control-success form-control-danger">
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="new_uname">New Username</label>
                                    <input type="text" id="new_uname" name="new_uname" class="form-control form-control-success form-control-danger">
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                    <small class="warning" id="uname_feadback" style="display: none;">
                                        Please enter old username first
                                    </small>
                                    <small class="warning" id="old_uname_feadback" style="display: none;">
                                        New username is required & cannot be empty
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="border-bottom mb-2"><i class="fa fa-envelope-o" aria-hidden="true"></i> Change Email</h4>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="old_email">Old Email</label>
                                    <input type="email" id="old_email" name="old_email" class="form-control form-control-success form-control-danger">
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="new_email">New Email</label>
                                    <input type="email" id="new_email" name="new_email" class="form-control form-control-success form-control-danger">
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                    <small class="warning"  id="email_feadback" style="display: none;">
                                        Please enter old email first
                                    </small>
                                    <small class="warning"  id="old_email_feadback" style="display: none;">
                                        New email is required & cannot be empty
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="border-bottom mb-2"><i class="fa fa-key" aria-hidden="true"></i> Change Password</h4>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="old_pass">Old Password</label>
                                    <input type="password" id="old_pass" name="old_pass" class="form-control form-control-success form-control-danger">
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="pass_checking">
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="new_pass">New Password</label>
                                    <input type="password" id="new_pass" name="new_pass" class="form-control form-control-success form-control-danger">
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                    <small class="warning pass_feadback" style="display: none;">
                                        Please enter old password first
                                    </small>
                                    <small class="warning" id="old_npass_feadback" style="display: none;">
                                        New password is required & cannot be empty
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="confirm_pass">Confirm Password</label>
                                    <input type="password" id="confirm_pass" name="confirm_pass" class="form-control form-control-success form-control-danger">
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                    <small class="warning pass_feadback" style="display: none;">
                                        Please enter old password first
                                    </small>
                                    <small class="warning" id="old_cpass_feadback" style="display: none;">
                                        Confirm password is required & cannot be empty
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions center">
                    <button type="reset" class="btn btn-outline-warning waves-effect mr-1">
                        <i class="icon-cross2"></i> Reset
                    </button>
                    <button type="submit" id="settings_update" name="settings_update" class="btn btn-outline-info waves-effect">
                        <i class="icon-check2"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

 
<script type="text/javascript">

	//############################### BEGIN UPDATE ##############################//
    $('button[name="settings_update"]').click(function(e){

        $.ajax({
            type: 'post',
            url: 'stngu',   // here your php file to do something with postdata
            data: $('#settings_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#settings_notification_content').show().fadeOut(6100).html('<div class="text-sm-center text-md-center text-lg-center text-xl-center m-1">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
                $('#settings_notification_content').show().fadeOut(6100).html(data);
            },
            error: function() {
                $.notify({

                    // where to append the toast notification
                    wrapper: 'body',

                    // toast message
                    message: 'Error here',

                    // success, info, error, warn
                    type: 'error',

                    // 1: top-left, 2: top-center, 3: top-right
                    // 4: mid-left, 5: mid-right
                    // 6: bottom-left, 7: bottom-center, 8: bottom-right
                    position: 3,

                    // or 'rtl'
                    dir: 'ltr',

                    // enable/disable auto close
                    autoClose: true,

                    // timeout in milliseconds
                    duration: 4000
                  
                });
            }
      });

      e.stopImmediatePropagation();

    });
    //############################### END UPDATE ##############################//
    
    //############################# BEGIN Form Validation ###########################//
    $('#settings_form').mouseover(function(){

        var old_uname= $('#old_uname').val();
        var new_uname= $('#new_uname').val();
        if(old_uname)
        {
            if(!new_uname)
            {
                $('#new_uname').prop('required', true);
                $('#old_uname_feadback').show();
            }
        }
        else
        {
            $('#new_uname').prop('required', false);
            $('#old_uname_feadback').hide();
        }


        var old_email= $('#old_email').val();
        var new_email= $('#new_email').val();
        if(old_email)
        {
            if(!new_email)
            {
                $('#new_email').prop('required', true);
                $('#old_email_feadback').show();
            }
        }
        else
        {
            $('#new_email').prop('required', false);
            $('#old_email_feadback').hide();
        }


        var old_pass= $('#old_pass').val();
        var new_pass= $('#new_pass').val();
        var confirm_pass= $('#confirm_pass').val();
        if(old_pass)
        {
            if(!new_pass)
            {
                $('#new_pass').prop('required', true);
                $('#old_npass_feadback').show();
            }
            if(!confirm_pass)
            {
                $('#confirm_pass').prop('required', true);
                $('#old_cpass_feadback').show();
            }
        }
        else
        {
            $('#new_pass').prop('required', false);
            $('#confirm_pass').prop('required', false);
            $('#old_npass_feadback').hide();
            $('#old_cpass_feadback').hide();
        }
    });

    $('#new_uname').on('keypress change',function(){

        var new_uname= $('#new_uname').val();
        if(new_uname)
        {
            $('#old_uname_feadback').hide();
        }
    });

    $('#new_email').on('keypress change',function(){

        var new_email= $('#new_email').val();
        if(new_email)
        {
            $('#old_email_feadback').hide();
        }
    });

    $('#new_pass').on('keypress change',function(){

        var new_uname= $('#new_pass').val();
        if(new_pass)
        {
            $('#old_npass_feadback').hide();
        }
    });

    $('#confirm_pass').on('keypress change',function(){

        var confirm_uname= $('#confirm_pass').val();
        if(confirm_pass)
        {
            $('#old_cpass_feadback').hide();
        }
    });




	$('#settings_form').on('keypress change',function(){

        var old_uname = $('#old_uname').val();

        if(old_uname)
        {
            $('#new_uname').prop('disabled', false);
            $('#uname_feadback').hide();
        }

		var old_email = $('#old_email').val();

		if(old_email)
		{
			$('#new_email').prop('disabled', false);
			$('#email_feadback').hide();
		}

		var old_pass = $('#old_pass').val();
		
		if(old_pass)
		{
			$('#new_pass').prop('disabled', false);
			$('#confirm_pass').prop('disabled', false);
			$('.pass_feadback').hide();
		}

	});

    $('#new_uname').on('keypress change',function(){

        var old_email = $('#old_uname').val();
        
        if(!old_email)
        {
            $('#new_uname').val('');
            $('#new_uname').prop('disabled', true);
            $('#uname_feadback').show();
        }
        else
        {
            $('#new_uname').prop('disabled', false);
            $('#uname_feadback').hide();
        }

    });

	$('#new_email').on('keypress change',function(){

		var old_email = $('#old_email').val();
		
		if(!old_email)
		{
            $('#new_email').val('');
			$('#new_email').prop('disabled', true);
			$('#email_feadback').show();
		}
		else
		{
			$('#new_email').prop('disabled', false);
			$('#email_feadback').hide();
		}

	});

	$('#pass_checking').on('keypress change',function(){

		var old_pass = $('#old_pass').val();
		
		if(!old_pass)
		{
            $('#new_pass').val('');
			$('#new_pass').prop('disabled', true);
			$('#confirm_pass').prop('disabled', true);
			$('.pass_feadback').show();
		}
		else
		{
			$('#new_pass').prop('disabled', false);
			$('#confirm_pass').prop('disabled', false);
			$('.pass_feadback').hide();
		}

	});


    $('#settings_form').bootstrapValidator({

        fields:
        {

            old_uname: 
            {
                message: 'Old username is not valid',
                validators:{
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        delay: 1500
                    }
                }
            },

            new_uname: 
            {
                message: 'New username is not valid',
                validators: {
                    stringLength: {
                        min: 3,
                        max: 50,
                        message: 'New username must be 3 to 50 characters long'
                    },
                    regexp: {
                        regexp: /^[a-z0-9._-]+$/,
                        message: 'New username can only consist of small letters, digits, dot, underscore or hyphen'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        delay: 1500
                    }
                }
            },

            old_email: 
            {
                message: 'Old email is not valid',
                validators:{
                	emailAddress: {
                        message: 'The input is not a valid email address'
                    },
                    remote: {
	                    type: 'POST',
	                    url: 'rmt',
	                    delay: 1500
                	}
                }
            },

            new_email: 
            {
                message: 'New email is not valid',
                validators: {
                	emailAddress: {
                        message: 'The input is not a valid email address'
                    },
                    remote: {
	                    type: 'POST',
	                    url: 'rmt',
                        delay: 1500
                	}
                }
            },

            old_pass: 
            {
                message: 'Old password is not valid',
                validators: {
                    remote: {
	                    type: 'POST',
	                    url: 'rmt',
	                    delay: 1500
                	}
                }
            },

            new_pass: 
            {
                message: 'New password is not valid',
                validators: {
                    stringLength: {
                        min: 6,
                        max: 50,
                        message: 'New password must be more than 5 and less than 50 characters long'
                    },
                    different: {
                        field: 'old_uname,new_uname,old_email,new_email,old_pass',
                        message: 'New password cannot be the same as old username or old username or old email or new email or old password'
                    }
                }
            },

            confirm_pass: 
            {
                message: 'Confirm password is not valid',
                validators: {
                    stringLength: {
                        min: 6,
                        max: 50,
                        message: 'Confirm password must be more than 5 and less than 50 characters long'
                    },
                    identical: {
                        field: 'new_pass',
                        message: 'Confirm password is not the same as new password'
                    }
                }
            }

        }
    });
    //############################# END Form Validation ###########################//

</script>
<script src="../assets/js/material-bootstrap-wizard/jquery.bootstrap.js" type="text/javascript"></script>
<!--  Plugin for the Wizard -->
<script src="../assets/js/material-bootstrap-wizard/material-bootstrap-wizard.js"></script>
<!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
<script src="../assets/js/material-bootstrap-wizard/jquery.validate.min.js"></script>