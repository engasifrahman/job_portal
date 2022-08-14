<?php

	require_once('../dbconfig.php');
	global $con;
	$em_id = $_POST['em_id'];

	if(empty($em_id))
	{
		?>
			<div class="center">No records found under this selection <a href="#" onclick="$('#company_info_edit_content').hide();$('.company_info_edit').show();">Hide this</a>
			</div>
		<?php
		die();
	}

	$query1 = "SELECT * FROM employer WHERE id='$em_id'";

    if (!$result1 = mysqli_query($con, $query1)) {
            exit(mysqli_error($con));
    }

    $query2 = "SELECT * FROM data_organization_type ORDER BY id ASC";
    if (!$result2 = mysqli_query($con, $query2))
    {
        exit(mysqli_error($con));
    }

    $query3 = "SELECT * FROM data_business_category ORDER BY id ASC";
    if (!$result3 = mysqli_query($con, $query3))
    {
        exit(mysqli_error($con));
    }

    $query4 = "SELECT * FROM data_job_location ORDER BY id ASC";
    if (!$result4 = mysqli_query($con, $query4))
    {
        exit(mysqli_error($con));
    }

    if (mysqli_num_rows($result1) > 0)
    {

        while($row = mysqli_fetch_assoc($result1))
        {

    		?>
            <div class="card wizard-card" data-color="blue">
            <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
                <form id="company_info_edit_form" class="form" method="post" action="" >
                    <div class="form-body">

                        <div class="row">
                            <p class="pb-1 text-info text-bold-700 text-xs-center text-sm-center text-md-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Company Name<strong class="text-danger">*</strong></label>
                                    <input type="text" id="company_name_edit" name="company_name_edit" value="<?php echo $row['company_name']; ?>" class="form-control form-control-success form-control-danger" required>
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Company Type<strong class="text-danger">*</strong></label>         
                                    <select id="company_type" name="company_type" class="form-control form-control-success form-control-danger" required>
                                        <option value=""></option>
                                        <?php
                                        while ($c_type_data=mysqli_fetch_assoc($result2))
                                        {
                                            echo
                                            '
                                                <option value="'.$c_type_data['organization_type'].'">'.$c_type_data['organization_type'].'</option>
                                            ';
                                        }   
                                        ?>
                                    </select>
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Company Category<strong class="text-danger">*</strong></label>
                                    <select id="company_category" name="company_category" class="form-control form-control-success form-control-danger" required>
                                        <option value=""></option>
                                        <?php
                                        while ($c_catg_data=mysqli_fetch_assoc($result3))
                                        {
                                            echo
                                            '
                                                <option value="'.$c_catg_data['category_name'].'">'.$c_catg_data['category_name'].'</option>
                                            ';
                                        }     
                                        ?>
                                    </select>
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Company Size<strong class="text-danger">*</strong></label>
                                    <select id="company_size" name="company_size" class="form-control form-control-success form-control-danger" required>
                                        <option value=""></option>
                                        <option value="1-9 Employees">1-9 Employees</option>
                                        <option value="10-49 Employees">10-49 Employees</option>
                                        <option value="50-99 Employees">50-99 Employees</option>
                                        <option value="100-499 Employees">100-499 Employees</option>
                                        <option value="500 Employees or More">500 Employees or More</option>
                                    </select>
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">City<strong class="text-danger">*</strong></label>
                                    <select id="city" name="city" class="form-control form-control-success form-control-danger" required>
                                        <option value=""></option>
                                        <?php
                                        while ($city_data=mysqli_fetch_assoc($result4))
                                        {
                                            echo
                                            '
                                                <option value="'.$city_data['location_name'].'">'.$city_data['location_name'].'</option>
                                            ';
                                        }      
                                        ?>
                                    </select>
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">ZIP Code<strong class="text-danger">*</strong></label>
                                    <input type="number" id="zip_code" name="zip_code" value="<?php echo $row['zip_code']; ?>" class="form-control form-control-success form-control-danger" require>
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Location<strong class="text-danger">*</strong></label>
                                    <input type="text" id="location" name="location" value="<?php echo $row['location']; ?>" class="form-control form-control-success form-control-danger" required>
                                    <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Web Site</label>
                                    <input type="url" id="web_url" name="web_url" value="<?php echo $row['web_url']; ?>" class="form-control form-control-success form-control-danger" ">
                                </div>
                                <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Mobile No<strong class="text-danger">*</strong></label>
                                    <input type="text" id="mobile_number" name="mobile_number" value="<?php echo $row['mobile_number']; ?>"class="form-control form-control-success form-control-danger" required>
                                </div>
                                <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                            </div>
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Phone No</label>
                                    <input type="text" id="phone_number" name="phone_number" value="<?php echo $row['phone_number']; ?>" class="form-control form-control-success form-control-danger">
                                </div>
                                <span class="before check">
                                      <i class="material-icons">done</i>
                                    </span>
                                    <span class="before cross">
                                      <i class="material-icons">clear</i>
                                    </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <label class="control-label">Employer Type<strong class="text-danger">*</strong></label>
                                <div class="form-group label-floating">
                                    <label class="display-inline-block custom-control custom-radio">
                                        <input type="radio" name="employer_type" value="Employer" class="custom-control-input" <?php if($row['employer_type']==="Employer"){echo "checked";} ?> required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description ml-0">Employer</span>
                                    </label>
                                    
                                    <label class="display-inline-block custom-control custom-radio">
                                        <input type="radio" name="employer_type" value="Recruiter" class="custom-control-input" <?php if($row['employer_type']==="Recruiter"){echo "checked";} ?> required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description ml-0">Recruiter</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 pl-2 pr-2">
                                <label class="control-label">Profile Privacy<strong class="text-danger">*</strong> <small class="font-small-2"><b>(If you select public, Anyone able to see  your company profile )</b></small> </label>
                                <div class="form-group label-floating">
                                    <label class="display-inline-block custom-control custom-radio">
                                        <input type="radio" name="profile_privacy" value="Public" class="custom-control-input" <?php if($row['profile_privacy']==="Public"){echo "checked";} ?> required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description ml-0">Public</span>
                                    </label>
                                    
                                    <label class="display-inline-block custom-control custom-radio">
                                        <input type="radio" name="profile_privacy" value="Private" class="custom-control-input" <?php if($row['profile_privacy']==="Private"){echo "checked";} ?> required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description ml-0">Private</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 pl-2 pr-2">
                                <div class="form-group label-floating">
                                    <label><small>Portfolio</small></label>
                                    <textarea rows="6" id="portfolio" name="portfolio" class="form-control form-control-success form-control-danger"><?php echo $row['portfolio']; ?></textarea>
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

                    <div class="form-actions custom-form-action center">
                        <button type="button" class="btn btn-outline-warning mr-1" onclick="$('#company_info_edit_content').slideUp(400);$('#company_info_view_content').slideDown(400);$('.company_info_edit').show();$('#company_info').show();$('#company_info_with_edit_icon').hide();$('#company_info_edit_cancel').hide();">
                            <i class="icon-cross2"></i> Cancel
                        </button>
                       
                        <button type="submit" class="btn btn-outline-primary" name="company_info_update">
                            <i class="icon-check2"></i> Save
                        </button>
                    </div>

                </form>
            </div>
    	<?php
        $company_type=$row['company_type'];
        $company_category=$row['company_category'];
        $company_size=$row['company_size'];
        $city=$row['city'];
    	}
    }
    else
    {
        echo
        '
            <div class="text-sm-center text-md-center text-lg-center text-xl-center">Somthing is wrong no data available</div>
        ';
    }
?>

<script type="text/javascript">

    $(function(){
      $('#portfolio').froalaEditor({
          toolbarButtons: ['undo', 'redo', '|', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'lineHeight', 'paragraphFormat', 'clearFormatting', '|', 'color', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', 'selectAll', 'fullscreen', 'insertHR','insertLink', 'insertTable', '|', 'emoticons', 'fontAwesome', 'specialCharacters', '|', 'print', 'getPDF', 'help']
        })
    });

    $("#company_type").val('<?php echo $company_type; ?>');
    $("#company_category").val('<?php echo $company_category; ?>');
    $("#company_size").val('<?php echo $company_size; ?>');
    $("#city").val('<?php echo $city; ?>');

    //############################### BEGIN UPDATE ##############################//
    $('button[name="company_info_update"]').click(function(e){
        
        $.ajax({
            type: 'post',
            url: 'uci',   // here your php file to do something with postdata
            data: $('#company_info_edit_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#company_info_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT...</div>');
            },
            success: function (data) {
              $('#company_info_notification_content').show().fadeOut(6100).html(data);
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
    $('#company_info_edit_form').bootstrapValidator({

        fields:
        {

            company_name_edit: 
            {
                message: 'Company name is not valid',
                validators: {
                    notEmpty: {
                        message: 'Company name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 250,
                        message: 'Company name must be more then one word and 5 letters'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/.& ()\-]+$/,
                        message: 'Company name can only consist of alphabetical, number, space, dot, hyphen, ampersand and parenthesis'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            },

            company_type: 
            {
                message: 'Company type is not valid',
                validators: {
                    notEmpty: {
                        message: 'Company type is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 50,
                        message: 'Don\'t try to be smart!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z/() &.\-]+$/,
                        message: 'Don\'t try to be smart!'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Don\'t try to be smart! You can choose maximum 1 option'
                    }
                }
            },

            company_category: 
            {
                message: 'Company category is not valid',
                validators: {
                    notEmpty: {
                        message: 'Company category is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 50,
                        message: 'Don\'t try to be smart!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/() &.\-]+$/,
                        message: 'Don\'t try to be smart!'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Don\'t try to be smart! You can choose maximum 1 option'
                    }
                }
            },

            company_size: 
            {
                message: 'Company size is not valid',
                validators: {
                    notEmpty: {
                        message: 'Company size is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 50,
                        message: 'Don\'t try to be smart!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/() & .\-]+$/,
                        message: 'Don\'t try to be smart!'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Don\'t try to be smart! You can choose maximum 1 option'
                    }
                }
            },

             city: 
             {
                validators: {
                    notEmpty: {
                        message: 'City is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 20,
                        message: 'Don\'t try to be smart!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Don\'t try to be smart!'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Don\'t try to be smart! You can choose maximum 1 option'
                    }
                }
            },

            zip_code: 
            {
                validators: {
                    notEmpty: {
                        message: 'ZIP code is required and cannot be empty'
                    },
                    digits: {
                        message: 'ZIP code can only consist of digits'
                    }
                }
            },

            location: 
            {
                message: 'Location is not valid',
                validators: {
                    notEmpty: {
                        message: 'Location is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 500,
                        message: 'Location can be between 6 to 500 characters'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9/#_() ;:,&+.\-]+$/,
                        message: 'Location can only consist of alphabetical, space, number, hash, comma, dot, underscore, colon, semi-colon, hyphen, plus sign, ampersand(&), backslash & paranthesis'
                    },
                    remote: {
                        type: 'POST',
                        url: 'rmt',
                        message: 'You entered a vulgar word'
                    }
                }
            },

            web_url: 
            {
                message: 'Web URL is not valid',
                validators: {
                   uri: {
                        allowLocal: true,
                        message: 'The input is not a valid URL'
                    }
                }
            },

            mobile_number: 
            {
                message: 'Mobile Number is not valid',
                validators: {
                    notEmpty: {
                        message: 'Mbile Number is required and cannot be empty'
                    },
                    stringLength: {
                        min: 11,
                        max: 15,
                        message: 'Mobile Number must be between 11 to 15 characters'
                    },
                    regexp: {
                        regexp: /^[0-9+ -]+$/,
                        message: 'Mobile Number can only consist of digit, space, hyphen & plus(+) sign'
                    }
                }
            },

            phone_number: 
            {
                message: 'Phone Number is not valid',
                validators: {
                    stringLength: {
                        min: 11,
                        max: 15,
                        message: 'Phone Number must be between 11 to 15 characters'
                    },
                    regexp: {
                        regexp: /^[0-9+ -]+$/,
                        message: 'Phone Number can only consist of digit, space, hyphen & plus(+) sign'
                    }
                }
            },

            employer_type: 
            {
                message: 'Employer Type is not valid',
                validators: {
                    notEmpty: {
                        message: 'Employer Type is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 20,
                        message: 'Don\'t try to be smart!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z-]+$/,
                        message: 'Don\'t try to be smart!'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Don\'t try to be smart! You can choose maximum 1 option'
                    }
                }
            },

            profile_privacy: 
            {
                message: 'Profile privacy is not valid',
                validators: {
                    notEmpty: {
                        message: 'Profile privacy is required and cannot be empty'
                    },
                    stringLength: {
                        min: 0,
                        max: 20,
                        message: 'Don\'t try to be smart!'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z-]+$/,
                        message: 'Don\'t try to be smart!'
                    },
                    choice: {
                        min: 1,
                        max: 1,
                        message: 'Don\'t try to be smart! You can choose maximum 1 option'
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