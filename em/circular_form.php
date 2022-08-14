<?php
	//include 'header.php';
	require 'header.php';
    if(isset($_POST['post_submit']))
    {
        require_once('../class_library/employer_job_post_class.php');
        
        $post_data_insert= new Employer_Job_Post;
        $em_error = $post_data_insert->em_post_data_insert($_POST);

        //echo "<pre>";
        //var_export($error);
        //echo "</pre>";
    }
?>
	<!--############################# BEGIN Content Area ###########################-->
    <div class="app-content content ">
      <div class="content-wrapper">
        <div class="content-body">

        	<div class="row">
        		<div class="col-md-12">
                    <?php
                    if(isset($em_error['post_success']))
                    {
                        ?>
                        <div class="container-fulid">

                            <script type="text/javascript">
                                $.notify({
                                    // where to append the toast notification
                                    wrapper: 'body',

                                    // toast message
                                    message: 'Congratulations!</strong> <?php echo $em_error['post_success']; ?>',

                                    // success, info, error, warn
                                    type: 'success',

                                    // 1: top-left, 2: top-center, 3: top-right
                                    // 4: mid-left, 5: mid-right
                                    // 6: bottom-left, 7: bottom-center, 8: bottom-right
                                    position: 3,

                                    // or 'rtl'
                                    dir: 'ltr',

                                    // enable/disable auto close
                                    autoClose: true,

                                    // timeout in milliseconds
                                    duration: 3000
                                  
                                });
                            </script>
                        </div>
                        <?php
                    }

                    if(isset($em_error['db_error']))
                    {
                        ?>
                        <div class="container-fulid">
                            <div class="alert alert-warning text-center alert-block alert-dismissible fade in" data-auto-dismiss="20000"  role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                <strong><?php echo 'DB Error! '.$em_error['db_error']; ?>
                                </strong>
                            </div>
                        </div>
                        <?php
                    }

                    if(isset($em_error['error']))
                    {
                        ?>
                        <div class="container-fulid">
                            <div class="alert alert-warning text-center alert-block alert-dismissible fade in" data-auto-dismiss="20000"  role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                <strong>
                                    ?>
                                    <script type="text/javascript">
                                        $.notify({
                                            // where to append the toast notification
                                            wrapper: 'body',

                                            // toast message
                                            message: 'Error Found, try again with valid data',

                                            // success, info, error, warn
                                            type: 'error',

                                            // 1: top-left, 2: top-center, 3: top-right
                                            // 4: mid-left, 5: mid-right
                                            // 6: bottom-left, 7: bottom-center, 8: bottom-right
                                            position: 3,

                                            // or 'rtl'
                                            dir: 'ltr',

                                            // enable/disable auto close
                                            autoClose: false,

                                            // timeout in milliseconds
                                            duration: 4000
                                          
                                        });
                                    </script>
                                    <?php 
                                    /*echo "<pre>";
                                    var_export($em_error);
                                    echo "</pre>";*/
                                    ?>
                                </strong>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
        			<div class="card">
        				<div class="card-header text-success text-sm-center">
        					<h4 class="card-title"  >Job Post Form</h4>
        				</div>
        				<div class="card-body collapse in">
        					<div class="card-block">

                                <div class="card wizard-card" data-color="blue">
                                <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->
            						<form id="defaultForm" class="form" method="post" action="">
            							<div class="form-body">

                                            <div class="card-text">
                                                <p class="text-info text-bold-700 text-sm-center">Please fill out the <strong class="text-danger">*required</strong> fields</p>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2 pt-1">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
                                                    <div class="form-group label-floating">
                									   <label for="job_category" class="control-label">Job Category<strong class="text-danger">*</strong></label>
                                                        <select id="job_category" name="job_category" class="form-control form-control-success form-control-danger" required>
                                                            <option value=""></option>
                                                            <option value="NGO/Development">NGO/Development</option>
                                                            <option value="Software Development">Software Development</option>
                                                            <option value="Web Development">Web Development</option>
                                                            <option value="Web Development">Graphics Design</option>
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
                    								<div class="form-group label-floating ">
                    									<label for="job_location" class="control-label">Job Location<strong class="text-danger">*</strong></label>
                                                        <select id="job_location" name="job_location" class="form-control form-control-success form-control-danger " required>
                                                            <option value=""></option>
                                                            <optgroup label="Dhaka Division">
                                                                <option value="Dhaka">Dhaka</option>
                                                                <option value="Dhanmondi">Dhanmondi</option>
                                                                <option value="Mirpur">Mirpur</option>
                                                                <option value="Uttara">Uttara</option>
                                                                <option value="Bonani">Bonani</option>
                                                            </optgroup>
                                                            <optgroup label="Rajshahi Division">
                                                                <option value="Rajshahi">Rajshahi</option>
                                                                <option value="Joypurhat">Joypurhat</option>
                                                                <option value="Borga">Borga</option>
                                                                <option value="Sirajgonj">Sirajgonj</option>
                                                                <option value="Pabna">Pabna</option>
                                                            </optgroup>
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2 mt-1">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
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

                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 pl-2 pr-2">
            										<div class="form-group label-floating ">
            											<label class="control-label" id="captchaOperation"></label>
            											<input type="text" class="form-control form-control-success form-control-danger " name="captcha" required>
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
                                            <button type="reset" class="btn btn-outline-warning mr-1">
                                                <i class="icon-cross2"></i> Cancel
                                            </button>
                                            <button type="submit" name="post_submit" class="btn btn-outline-primary">
                                                <i class="icon-check2"></i> Post
                                            </button>
                                        </div>
            						</form>
                                </div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
			
        </div>
      </div>
    </div>
	<!--/############################# END Content Area ###########################-->

	<!--############################# BEGIN Form Validation ###########################-->
<script type="text/javascript">
    $(document).ready(function() {
        // Generate a simple captcha
        function randomNumber(min, max) {
            return Math.floor(Math.random() * (max - min + 1) + min);
        };
        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

        $('#defaultForm').bootstrapValidator({
        //   live: 'disabled',
     
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
                            regexp: /^[a-zA-Z/ \.]+$/,
                            message: 'Job Category can only consist of alphabetical, space, dot and backslash'
                        },
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
                },

				captcha: 
				{
					validators: {
                        notEmpty: {
                            message: 'Captcha is required and cannot be empty'
                        },
						callback: {
							message: 'Wrong answer (Enter the right sum)',
							callback: function(value, validator) {
								var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
								return value == sum;
							}
						}
					}
				}
			}
		});
		//#### END form validation

	});
	</script>
	<!--/############################# END Form Validation ###########################-->
	
<?php 
	//include 'footer.php';
	require 'footer.php';
?>