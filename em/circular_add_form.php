<?php

    require_once('../class_library/related_data_class.php');
    $related_data= new Related_Data_Table;
    $job_category_all=$related_data->job_category_data_table();
    $job_location_all=$related_data->job_location_data_table();

?>

 <div class="card wizard-card" data-color="blue">
<!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
	<form id="circular_add_form" class="form" method="post" action="">
		<div class="form-body">

            <div class="card-text">
                <p class="text-info text-bold-700 text-center text-xs-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>
            </div>
            <input type="hidden" name="oparation" value="Add">
            <div class="row">
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1 pt-1">
					<div class="form-group label-floating">
						<label for="job_title" class="control-label">Job Title<strong class="text-danger">*</strong></label>
                        <input type="text" id="job_title" name="job_title" class="form-control form-control-success form-control-danger" required>
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
                    <div class="form-group label-floating">
					   <label for="job_category" class="control-label">Job Category<strong class="text-danger">*</strong></label>
                        <select id="job_category" name="job_category" class="form-control form-control-success form-control-danger" required>
                            <option value=""></option>
                            <?Php
                            if($job_category_all->num_rows >0)
                            {
                                while($catg_data = $job_category_all->fetch_assoc())
                                {
                                    echo '<option value="'.$catg_data['category_name'].'">'.$catg_data['category_name'].'';
                                }
                            }
                            else
                            {
                                echo ' <option value="">Something went wrong! Data not available right now</option>';
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
			        <div class="form-group label-floating ">
				       <label for="vacancies_no" class="control-label">No of Vacancies<strong class="text-danger">*</strong></label>
				       <input type="number" id="vacancies_no" class="form-control form-control-success form-control-danger" name="vacancies_no" min="1" max="1000" required>
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
			        <div class="form-group label-floating">
				        <label class="control-label">Job Level<strong class="text-danger">*</strong></label>
                        <div class="input-group">
                            <label class="display-inline-block custom-control custom-checkbox">
                                <input type="checkbox" value="Entry" name="job_level[]" class="custom-control-input" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0">Entry</span>
                            </label>
                            <label class="display-inline-block custom-control custom-checkbox">
                                <input type="checkbox" value="Mid" name="job_level[]"  class="custom-control-input" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0">Mid</span>
                            </label>
                            <label class="display-inline-block custom-control custom-checkbox">
                                <input type="checkbox" value="Top" name="job_level[]"  class="custom-control-input" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0">Top</span>
                            </label>
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

            <div class="row">
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
					<div class=" form-group label-floating">
						<label class="control-label">Job Nature<strong class="text-danger">*</strong></label>
                        <div class="input-group">
                            <label class="display-inline-block custom-control custom-checkbox">
                                <input type="checkbox" value="Full Time" name="job_nature[]" class="custom-control-input" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0">Full Time</span>
                            </label>
                            <label class="display-inline-block custom-control custom-checkbox">
                                <input type="checkbox" value="Part Time" name="job_nature[]"  class="custom-control-input" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0">Part Time</span>
                            </label>
                            <label class="display-inline-block custom-control custom-checkbox">
                                <input type="checkbox" value="Contractual" name="job_nature[]"  class="custom-control-input" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0">Contractual</span>
                            </label>
                            <label class="display-inline-block custom-control custom-checkbox">
                                <input type="checkbox" value="Internship" name="job_nature[]"  class="custom-control-input" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0">Internship</span>
                            </label>
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

            <div class="row">
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
                    <div class="form-group label-floating">
                        <label class="control-label">Gender Requirements<strong class="text-danger">*</strong></label>
                        <div class="input-group">
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" value="Any" name="gender_requirements" class="custom-control-input" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0">Any</span>
                            </label>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" value="Male" name="gender_requirements"  class="custom-control-input" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0">Male</span>
                            </label>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" value="Female" name="gender_requirements"  class="custom-control-input" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0">Female</span>
                            </label>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" value="Others" name="gender_requirements"  class="custom-control-input" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0">Others</span>
                            </label>
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

            <div class="row">
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
                    <div class="form-group label-floating">
                        <label class="control-label">Age Requirements<strong class="text-danger">*</strong></label>
                        <div class="pl-1 pr-1 pb-3">
                            <div class="col-md-6">
                                <label for="input5">Min (<span id="age_fromValue"></span>) Years's</label>
                                <div class="slidecontainer">
                                    <input type="range" min="18" max="50" value="18" class="slider" id="ageFrom" name="age_requirementsFrom" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="input6">Max (<span id="age_toValue"></span>) Year's</label>
                                <div class="slidecontainer">
                                    <input type="range" name="age_requirementsTo" min="18" max="50" value="24" class="slider" id="ageTo" required>
                                </div>
                            </div>
                        </div>
                        <span class="before check mt-1">
                          <i class="material-icons">done</i>
                        </span>
                        <span class="before cross">
                          <i class="material-icons">clear</i>
                        </span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1 mt-1">
                    <div class="form-group label-floating">
                        <label class="control-label">Year's of Experience<strong class="text-danger">*</strong></label>
                        <div class="input-group">
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" value="N/A" name="experience_years" class="custom-control-input" id="exp_range_close" onclick="No_Exp_Range()"  required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0">No Experience Required</span>
                            </label>
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" value="Experience Required" name="experience_years"  class="custom-control-input" id="exp_range_open" onclick="Show_Exp_Range()" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description ml-0"> Experience Required</span>
                            </label>
                            <span class="before check">
                              <i class="material-icons">done</i>
                            </span>
                            <span class="before cross">
                              <i class="material-icons">clear</i>
                            </span>
                        </div>

                        <div class="pl-1 pr-1 pb-3" id="exp_rangeArea" style="display:none">
                            <div class="col-md-6">
                                <label for="input5">Min (<span id="exp_fromValue"></span>) Years's</label>

                                <div class="slidecontainer">
                                    <input type="range" name="experience_yearsFrom"  min="1" max="15" value="2" class="slider" id="expFrom" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="input6">Max (<span id="exp_toValue"></span>) Year's</label>
                                <div class="slidecontainer">
                                    <input type="range" name="experience_yearsTo" min="1" max="15" value="3" class="slider" id="expTo" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
                    <div class="form-group label-floating">
                        <label class="control-label">Salary Range<strong class="text-danger">*</strong></label>
                        <div class="input-group">
                            <label class="display-inline-block custom-control custom-radio">
                                <input type="radio" value="Negotiable" name="salary_range" class="custom-control-input" id="salary_range_hide" onclick="Noo_Salary_Range()"  required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Negotiable</span>
                            </label>

                            <label class="display-inline-block custom-control custom-radio ml-1">
                                <input type="radio" value="Not Mentioned" name="salary_range" class="custom-control-input" id="salary_range_close" onclick="No_Salary_Range()" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Don't want to mention</span>
                            </label>

                            <label class="display-inline-block custom-control custom-radio ml-1">
                                <input class="custom-control-input" type="radio" value="Want to provide salary range" name="salary_range" id="salary_range_open"  onclick="Show_Salary_Range()" required>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Want to provide salary range</span>
                            </label>
                            <span class="before check">
                              <i class="material-icons">done</i>
                            </span>
                            <span class="before cross">
                              <i class="material-icons">clear</i>
                            </span>
                        </div>

                        <div class=" pl-1 pr-1 pb-3" id="salary_rangeArea" style="display:none">
                            <div class="col-md-6">
                                <label for="input5">From (<span id="salary_fromValue"></span>) TK</label>
                                <div class="slidecontainer">
                                    <input type="range" min="5000" max="50000" step="500" value="5000" class="slider" id="salaryFrom" name="salary_rangeFrom" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="input6">To (<span id="salary_toValue"></span>) TK</label>
                                <div class="slidecontainer">
                                    <input type="range" min="5000" max="50000" step="500" value="10000" class="slider" id="salaryTo" name="salary_rangeTo" required>
                                </div>
                            </div>
                        </div>
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
                    <div class="form-group label-floating ">
                        <label for="salary_details" class="control-label">Salary Details</label>
                        <input type="text" id="salary_details" class="form-control form-control-success form-control-danger" name="salary_details">
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
					<div class="form-group label-floating ">
						<label for="job_location" class="control-label">Job Location<strong class="text-danger">*</strong></label>
                        <select id="job_location" name="job_location" class="form-control form-control-success form-control-danger " required>
                            <option value=""></option>
                            <?Php
                            if($job_location_all->num_rows >0)
                            {
                                while($location_data = $job_location_all->fetch_assoc())
                                {
                                    echo '<option value="'.$location_data['location_name'].'">'.$location_data['location_name'].'';
                                }
                            }
                            else
                            {
                                echo ' <option value="">Something went wrong! Data not available right now</option>';
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
					<div class="form-group label-floating ">
						<label for="details_location" class="control-label">Job Location Details</label>
                        <textarea id="details_location" s="3" class="form-control form-control-success form-control-danger " name="details_location"></textarea>
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
                    <div class="form-group label-floating ">
                       <label for="job_description" class="control-label">Job Description<strong class="text-danger">*</strong></label>
                        <textarea id="job_description" s="3" class="form-control form-control-success form-control-danger " name="job_description" required></textarea>
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
					<div class="form-group label-floating ">
						<label for="skills_requirements" class="control-label">Skills Requirements<strong class="text-danger">*</strong></label>
                        <textarea id="skills_requirements" s="3" class="form-control form-control-success form-control-danger " name="skills_requirements" required></textarea>
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
					<div class="form-group label-floating">
						<label for="educational_requirements" class="control-label">Educational Requirements<strong class="text-danger">*</strong></label>
                        <textarea id="educational_requirements" s="3" class="form-control form-control-success form-control-danger " name="educational_requirements" required></textarea>
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
					<div class="form-group label-floating">
						<label for="additional_requirements" class="control-label">Additional Job Requirements</label>
                        <textarea id="additional_requirements" s="3" class="form-control form-control-success form-control-danger " name="additional_requirements"></textarea>
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
					<div class="form-group label-floating ">
						<label for="extra_facilities" class="control-label">Extra Facilities</label>
                        <textarea id="extra_facilities" s="3" class="form-control form-control-success form-control-danger " name="extra_facilities"></textarea>
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
					<div class="form-group label-floating">
						<label for="apply_instructions" class="control-label">Apply Instructions</label>
                        <textarea id="apply_instructions" s="3" class="form-control form-control-success form-control-danger " name="apply_instructions"></textarea>
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
                <div class="col-md-12 col-sm-12 pl-2 pr-2 pb-1">
                    <div class="form-group label-floating ">
                        <label for="application_deadline" class="control-label">Application Deadline<strong class="text-danger">*</strong></label>
                        <input type="date" id="application_deadline" class="form-control form-control-success form-control-danger " name="application_deadline" required>
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

        <div class="form-actions center">
            <button type="reset" class="btn btn-outline-warning mr-1" onclick="$('#circular_add_content').slideUp(400);$('#circular_view_content').slideDown(400);$('#circular_add').show();$('#circular').show();$('#circular_with_add_icon').hide();$('#circular_edit_add_cancel').hide();">
                <i class="icon-cross2"></i> Cancel
            </button>
            <button type="submit" name="post_submit" class="btn btn-outline-primary">
                <i class="icon-check2"></i> Post
            </button>
        </div>
	</form>
</div>

<script type="text/javascript">
    //################################# BEGIN INSERT ################################//
    $('button[name="post_submit"]').click(function (e){

        $.ajax({
            type: 'post',
            url: 'c_op',   // here your php file to do something with postdata
            data: $('#circular_add_form').serialize(), // here you set the data to send to php file
            beforeSend: function() {
                $('#circular_notification_content').show().fadeOut(6100).html('<div class="text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
              $('#circular_notification_content').show().fadeOut(6100).html(data);
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
    //################################## END INSERT #################################//

    $(document).ready(function() {

        $('#circular_add_form').bootstrapValidator({
     
            fields:
            {
                job_title: 
                {
                    message: 'The job title is not valid',
                    validators: {
                        notEmpty: {
                            message: 'The job title is required and cannot be empty'
                        },
                        stringLength: {
                            min: 10,
                            max: 150,
                            message: 'The job title must be more than 10 and less than 150 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9_() \.]+$/,
                            message: 'The job title can only consist of alphabetical, space, number, hash, dot, underscore and parenthesis'
                        },
                        remote: {
                            type: 'POST',
                            url: 'rmt',
                            message: 'You entered a vulgar word'
                        },
                    }
                },

                job_category:
                {
                    message: 'Job Category is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Job Category is required and cannot be empty'
                        },
                        stringLength: {
                            min: 10,
                            max: 150,
                            message: 'Job Category must be more than 10 and less than 150 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9&()/ .,\-]+$/,
                            message: 'Job Category can only consist of alphabetical, number, ampersand, dot, comma, hyphen, backslash, space And pranthasis'
                        }
                    }
                },

                job_description: 
                {
                    message: 'Job description is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Job description is required and cannot be empty'
                        },
                        stringLength: {
                            min: 20,
                            max: 1000,
                            message: 'Job description must be more than 20 and less than 1000 characters long and less than 250 words'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9/#&_() .,:;+ \r\n \-]+$/,
                            message: 'Job description can only consist of alphabetical, number, hash, ampersand, dot, comma, colon, semi-colon, plus, hyphen, underscore, backslash, space, pranthasis and new line'
                        },
                        remote: {
                            type: 'POST',
                            url: 'rmt',
                            message: 'You entered a vulgar word'
                        },
                    }
                },

                vacancies_no: 
                {
                    message: 'Vacancies no is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Vacancies no is required and cannot be empty'
                        },
                        stringLength: {
                            min: 1,
                            max: 1000,
                            message: 'Vacancies no will be less than or equal to 1000'
                        },
                        regexp: {
                            regexp: /^[0-9 ]+$/,
                            message: 'Vacancies no can only consist of number'
                        },
                    }
                },

                 'job_level[]': 
                {
                    validators: {
                        notEmpty: {
                            message: 'Job level is required, please specify at least one option'
                        }
                    }
                },

                 'job_nature[]': 
                {
                    validators: {
                        notEmpty: {
                            message: 'Job nature is required, please specify at least one option'
                        }
                    }
                },
                
                job_location: 
                {
                    message: 'Job location is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Job location is required and cannot be empty'
                        },
                        stringLength: {
                            min: 3,
                            max: 100,
                            message: 'Job location must be more than 3 and less than 100 characters long and in a word'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+$/,
                            message: 'Job location can only consist of alphabetical'
                        },
                    }
                },

                details_location: 
                {
                    validators: {
                        stringLength: {
                            min: 3,
                            max: 120,
                            message: 'Details location must be more than 3 and less than 120 characters long and less than 20 words'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9/#_() ;:, .\-]+$/,
                            message: 'Details location can only consist of alphabetical, space, number, hash, comma, dot, underscore, colon, semi-colon, hyphen and backslash'
                        },
                        remote: {
                            type: 'POST',
                            url: 'rmt',
                            message: 'You entered a vulgar word'
                        },
                    }
                },

                skills_requirements: 
                {
                    message: 'Skills requirements are not valid',
                    validators: {
                        notEmpty: {
                            message: 'Skills requirements are required and cannot be empty'
                        },
                        stringLength: {
                            min: 3,
                            max: 500,
                            message: 'Skills requirements must be more than 3 and less than 500 characters long and less than 100 words'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9/#&_() .,:;+ \r\n \-]+$/,
                            message: 'Skills requirements can only consist of alphabetical, number, hash, ampersand, dot, comma, colon, semi-colon, plus, hyphen, underscore, backslash, space, pranthasis and new line'
                        },
                        remote: {
                            type: 'POST',
                            url: 'rmt',
                            message: 'You entered a vulgar word'
                        },
                    }
                },

                gender_requirements: 
                {
                    validators: {
                        notEmpty: {
                            message: 'Gender requirements are required, please specify an option'
                        }
                    }
                },


                experience_years: 
                {
                    validators: {
                        notEmpty: {
                            message: 'Years of experience is required, please specify an option'
                        }
                    }
                },

                educational_requirements: 
                {
                    message: 'Educational requirements are not valid',
                    validators: {
                        notEmpty: {
                            message: 'Educational requirements are required and cannot be empty'
                        },
                        stringLength: {
                            min: 3,
                            max: 200,
                            message: 'Educational requirements must be more than 3 and less than 200 characters long and less than 40 words'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9/#_() ;:, .\-]+$/,
                            message: 'Educational requirements can only consist of alphabetical, space, number, hash, comma, dot, underscore, colon, semi-colon, hyphen and backslash'
                        },
                        remote: {
                            type: 'POST',
                            url: 'rmt',
                            message: 'You entered a vulgar word'
                        },
                    }
                },

                additional_requirements: 
                {
                    validators: {
                        stringLength: {
                            min: 3,
                            max: 1000,
                            message: 'Additional requirements must be more than 3 and less than 1000 characters long and less than 250 words'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9/#&_() .,:;+ \r\n \-]+$/,
                            message: 'Additional requirements can only consist of alphabetical, number, hash, ampersand, dot, comma, colon, semi-colon, plus, hyphen, underscore, backslash, space, pranthasis and new line'
                        },
                        remote: {
                            type: 'POST',
                            url: 'rmt',
                            message: 'You entered a vulgar word'
                        },
                    }
                },

                salary_range: 
                {
                    validators: {
                        notEmpty: {
                            message: 'Salary range is required, please specify an option'
                        }
                    }
                },

                salary_details: 
                {
                    validators: {
                        stringLength: {
                            min: 3,
                            max: 120,
                            message: 'Salary details must be more than 3 and less than 120 characters long and less than 20 words'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9/#_() \.]+$/,
                            message: 'Salary details can only consist of alphabetical, space, number, hash, dot, underscore, backslash and parenthesis'
                        },
                        remote: {
                            type: 'POST',
                            url: 'rmt',
                            message: 'You entered a vulgar word'
                        },
                    }
                },

                extra_facilities: 
                {
                    validators: {
                        stringLength: {
                            min: 3,
                            max: 250,
                            message: 'Extra facilities must be more than 3 and less than 250 characters long and less than 50 words'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9/#_() \.]+$/,
                            message: 'Extra facilities can only consist of alphabetical, space, number, hash, dot, underscore, backslash and parenthesis'
                        },
                        remote: {
                            type: 'POST',
                            url: 'rmt',
                            message: 'You entered a vulgar word'
                        },
                    }
                },

                apply_instructions: 
                {
                    validators: {
                        stringLength: {
                            min: 3,
                            max: 250,
                            message: 'Apply instructions must be more than 3 and less than 250 characters long and less than 50 words'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9/#_() \.]+$/,
                            message: 'Apply instructions can only consist of alphabetical, space, number, hash, dot, underscore, backslash and parenthesis'
                        },
                        remote: {
                            type: 'POST',
                            url: 'rmt',
                            message: 'You entered a vulgar word'
                        },
                    }
                },

                application_deadline:
                {
                    validators: {
                        notEmpty: {
                            message: 'Application deadline is required and cannot be empty'
                        },
                        date: {
                            format: 'YYYY/MM/DD',
                            message: 'Application deadline is not valid'
                        }

                    }
                }
            }
        });
        //######## END form validation ########//

    });
</script>

<!-- BEGIN Custom JS-->
<script src="../assets/js/circular_post.js" type="text/javascript"></script>
<!--/ END Custom JS-->

<script src="../assets/js/material-bootstrap-wizard/jquery.bootstrap.js" type="text/javascript"></script>
<!--  Plugin for the Wizard -->
<script src="../assets/js/material-bootstrap-wizard/material-bootstrap-wizard.js"></script>
<!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
<script src="../assets/js/material-bootstrap-wizard/jquery.validate.min.js"></script>