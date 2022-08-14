<?php
	require 'header.php';
    require_once('../dbconfig.php');
    global $con;

    $em_id=$_SESSION['em_info']['id'];

	if (isset($_GET['post_id']) && !empty($_GET['post_id']))
	{
        $check=1;
		$post_id=$_GET['post_id'];

        $query1 = "SELECT JS.id FROM circular_post AS CP, applied_job AS AJ, job_seeker AS JS WHERE CP.em_id='$em_id' AND CP.post_id='$post_id' AND AJ.post_id='$post_id' AND JS.id=AJ.js_id AND JS.action IN ('Active','Deactive') ORDER BY AJ.id ASC";

        if (!$result1 = mysqli_query($con, $query1))
        {
            exit(mysqli_error($con));
        }

        $query2 = "SELECT id,degree_level FROM data_degree_level WHERE id BETWEEN 3 AND 7 order by id ASC";
        if (!$result2=mysqli_query($con, $query2))
        {
            exit(mysqli_error($con));
        }

	}
    else
    {
        $check=0;
        $post_id=NULL;
    }
?>
<!--############################# BEGIN Content Area ###########################-->
<style type="text/css">
  .selectize-input {
      min-height: 28px !important;
      max-height: 28px !important;
  }
</style>
<div class="app-content content">
    <div class="content-wrapper"">
        <div class="content-body">

            <!--########################### BEGIN Applied Applicatns Information ###########################-->
            <div class="row">
                <?php
                $validity=0;
                if ($check==1 && (mysqli_num_rows($result1) > 0))
                {
                    $validity=1;
                ?>                 

                <div class="col-md-12 mt-2 mb-3">
                    <nav class=" p-1 col-md-12 navbar navbar-light bg-white mobile-device">
                        <div class="card wizard-card" data-color="green">
                          <form method="get" action="search" class="form" >
                            
                            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" style="display: none;">

                            <div class="col-md-3">
                                <div class="form-group label-floating mb-0">
                                    <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keywords</label>
                                    <div class="position-relative has-icon-left"> 
                                        <input type="text" id="keywords" name="keywords" class="form-control" multiple>
                                        <div class="form-control-position">
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                        </div>
                                     </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group label-floating mb-0">
                                    <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Skills</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" id="skills" name="skills" class="form-control " type="text">
                                        <div class="form-control-position">
                                            <i class="icon-cogs" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group label-floating mb-0">
                                    <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Experience</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" name="experience" class="form-control " type="text">
                                        <div class="form-control-position">
                                            <i class="fa fa-line-chart" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 col-xs-12 text-xs-center">
                                <div class="form-group label-floating mb-0">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle search-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                         <i class="fa fa-graduation-cap" aria-hidden="true"></i>Academic Result
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <?php
                                        while($data2 = mysqli_fetch_assoc($result2))
                                        {
                                            echo
                                            '
                                                <div class="col-md-12 col-sm-12 col-xs-12 text-bold-500">'.$data2['degree_level'].'</div>
                                                <div class="col-md-12 col-sm-12 col-xs-12"><input type="text" name="degree'.$data2['id'].'"placeholder="Expected Result (Min)"></div>
                                            ';
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 text-xs-center mobile-device">
                                <div class="form-group mb-0">
                                    <button name="search_applicants" class="search-btn btn btn-info " type="submit"><i class="icon-search5"></i>
                                        <b>Search</b>
                                    </button> 
                                </div>
                            </div>

                          </form>
                        </div>
                    </nav>
                </div>
                <?php
                }
                ?>

				<div class="col-md-12 col-sm-12 col-xs-12">
				    <div class="card">
				        <div class="card-header text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
				            <h4 class="card-title info" id="personal_info">
				            	<i class="fa fa-paper-plane-o"></i> Applied Applicants
				            </h4>
				        </div>
				        <div class="card-body collapse in">
				            <div class="card-block custom-card-block">

                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="applied_applicants_per_post_notification_content" style="display:none"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="applied_applicants_per_post_view_content"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--################################ END Applied Applicatns Information ################################-->
            
        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->

<script type="text/javascript">

    //##################### BEGIN Applied Applicatns List Content Control #####################//
    $('#applied_applicants_per_post_notification_content').hide();

    var  validity='<?php echo $validity;?>';
    var post_id='<?php echo $post_id;?>';

    if ( validity=='1')
    {
        $.post("aapppv",{ post_id:post_id }, function(data) {
            $("#applied_applicants_per_post_view_content").html(data);
        });
    }
    else
    {
        $("#applied_applicants_per_post_view_content").html("<div><strong>So far nobody has applied for this job</strong></div>");
        $("#applied_applicants_per_post_view_content").addClass("text-xs-center text-sm-center text-md-center text-lg-center text-xl-center p-1 text-warning");;
    }
    
    //###################### END Applied Applicatns List Content Control ######################//

    //############################# BEGIN Form Validation ###########################//
    var REG=/^[a-z\d\-_()/&*\s]+$/i;
    $('#keywords').selectize({
        plugins: ['remove_button','drag_drop'],
        maxItems:15,
        persist: false,
        create: true,
        createFilter:REG,
        render: {
            item: function(data, escape) {
                return '<div>' + escape(data.text) + '</div>';
            }
        }
    });

    $('#skills').selectize({
        plugins: ['remove_button','drag_drop'],
        maxItems:15,
        persist: false,
        create: true,
        createFilter:REG,
        render: {
            item: function(data, escape) {
                return '<div>' + escape(data.text) + '</div>';
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

<?php 
	//include 'footer.php';
	require 'footer.php';
?>