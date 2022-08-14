<?php
	require 'header.php';
    require_once('../dbconfig.php');
    global $con;

    $post_id=NULL;
    $keywords=NULL;
    $skills=NULL;
    $experience=NULL;
    $degree3=NULL;
    $degree4=NULL;
    $degree5=NULL;
    $degree6=NULL;
    $degree7=NULL;

    if(isset($_GET['search_applicants']) && !empty($_GET['post_id']) && empty($_GET['keywords']) && empty($_GET['skills']) && empty($_GET['experience']) && empty($_GET['degree3']) && empty($_GET['degree4']) && empty($_GET['degree5']) && empty($_GET['degree6']) && empty($_GET['degree7']))
    {
        $post_id=$_GET['post_id'];
        echo '<script>window.location.href = "aappp?post_id='.$post_id.'";</script>';

    }
    elseif(isset($_GET['search_applicants']) && !empty($_GET['post_id']) && (!empty($_GET['keywords']) || !empty($_GET['skills']) || !empty($_GET['experience']) || !empty($_GET['degree3']) || !empty($_GET['degree4']) || !empty($_GET['degree5']) || !!empty($_GET['degree6']) || !empty($_GET['degree7'])))
    {
        $post_id=$_GET['post_id'];

        if (!empty($_GET['keywords']))
        {
            $keywords=$_GET['keywords'];
        }
        else
        {
            $keywords=NULL;
        }


        if (!empty($_GET['skills']))
        {
            $skills=$_GET['skills'];
        }
        else
        {
            $skills=NULL;
        }


        if (!empty($_GET['experience']))
        {
            $experience=$_GET['experience'];
        }
        else
        {
            $experience=NULL;
        }


        if (!empty($_GET['degree3']))
        {
            $degree3=$_GET['degree3'];
        }
        else
        {
            $degree3=NULL;
        }


        if (!empty($_GET['degree4']))
        {
            $degree4=$_GET['degree4'];
        }
        else
        {
            $degree4=NULL;
        }


        if (!empty($_GET['degree5']))
        {
            $degree5=$_GET['degree5'];
        }
        else
        {
            $degree5=NULL;
        }


        if (!empty($_GET['degree6']))
        {
            $degree6=$_GET['degree6'];
        }
        else
        {
            $degree6=NULL;
        }


        if (!empty($_GET['degree7']))
        {
            $degree7=$_GET['degree7'];
        }
        else
        {
            $degree7=NULL;
        }
    }
?>
<!--############################# BEGIN Content Area ###########################-->
<div class="app-content content">
    <div class="content-wrapper"">
        <div class="content-body">

            <!--########################### BEGIN Applied Applicatns Fitering ###########################-->
            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				    <div class="card">
				        <div class="card-header text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
				            <h4 class="card-title info">
				            	<i class="fa fa-paper-plane-o"></i> Search result for this circular
				            </h4>
				        </div>
				        <div class="card-body collapse in">
				            <div class="card-block custom-card-block">

                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="applied_applicants_search_notification_content" style="display:none"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12 table_content" id="applied_applicants_search_view_content"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--################################ END Applied Applicatns Fitering ################################-->
            
        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->

<script type="text/javascript">

    //##################### BEGIN Applied Applicatns Fitering List Content Control #####################//
    $('#applied_applicants_search_notification_content').hide();
    var post_id='<?php echo $post_id;?>';
    var keywords='<?php echo $keywords;?>';
    var skills='<?php echo $skills;?>';
    var experience='<?php echo $experience;?>';
    var degree3='<?php echo $degree3;?>';
    var degree4='<?php echo $degree4;?>';
    var degree5='<?php echo $degree5;?>';
    var degree6='<?php echo $degree6;?>';
    var degree7='<?php echo $degree7;?>';

    $.post("search_result",{ post_id:post_id, keywords:keywords, skills:skills, experience:experience, degree3:degree3, degree4:degree4, degree5:degree5, degree6:degree6, degree7:degree7 }, function(data) {
        $("#applied_applicants_search_view_content").html(data);
    });
    //###################### END Applied Applicatns Fitering List Content Control ######################//
</script>


<?php 
	//include 'footer.php';
	require 'footer.php';
?>