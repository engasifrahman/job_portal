<?php
	session_start();
	require_once('../dbconfig.php');
	global $con;

	$em_id = $_SESSION['em_info']['id'];

	$js_id = $_POST['js_id'];
	$post_id = $_POST['post_id'];

    if (!empty($_POST['keywords']))
    {
        $keywords=$_POST['keywords'];
    }
    else
    {
        $keywords=NULL;
    }


    if (!empty($_POST['skills']))
    {
        $skills=$_POST['skills'];
    }
    else
    {
        $skills=NULL;
    }


    if (!empty($_POST['experience']))
    {
        $experience=$_POST['experience'];
    }
    else
    {
        $experience=NULL;
    }


    if (!empty($_POST['degree3']))
    {
        $degree3=$_POST['degree3'];
    }
    else
    {
        $degree3=NULL;
    }


    if (!empty($_POST['degree4']))
    {
        $degree4=$_POST['degree4'];
    }
    else
    {
        $degree4=NULL;
    }


    if (!empty($_POST['degree5']))
    {
        $degree5=$_POST['degree5'];
    }
    else
    {
        $degree5=NULL;
    }


    if (!empty($_POST['degree6']))
    {
        $degree6=$_POST['degree6'];
    }
    else
    {
        $degree6=NULL;
    }


    if (!empty($_POST['degree7']))
    {
        $degree7=$_POST['degree7'];
    }
    else
    {
        $degree7=NULL;
    }
		
	if(!empty($em_id) && !empty($post_id) && !empty($js_id))
	{

		$query = "DELETE FROM selected_applied_applicants where em_id='$em_id' AND post_id='$post_id' AND js_id='$js_id'";

		if (!$result = mysqli_query($con, $query)) {
		        exit(mysqli_error($con));
		}

		else
		{
			?>

			<script type="text/javascript">
				var post_id='<?php echo $post_id;?>';
				var js_id='<?php echo $js_id;?>'

			    var keywords='<?php echo $keywords;?>';
			    var skills='<?php echo $skills;?>';
			    var experience='<?php echo $experience;?>';
			    var degree3='<?php echo $degree3;?>';
			    var degree4='<?php echo $degree4;?>';
			    var degree5='<?php echo $degree5;?>';
			    var degree6='<?php echo $degree6;?>';
			    var degree7='<?php echo $degree7;?>';

			    $.post("aapppv",{ post_id:post_id }, function(data) {
			        $("#applied_applicants_per_post_view_content").html(data);
			    });
			    
			    $.post("vjv",{ js_id:js_id, post_id:post_id }, function(data) {
			        $("#visit_js_view_content").html(data);
			    });

		      	$.post("search_result",{ post_id:post_id, keywords:keywords, skills:skills, experience:experience, degree3:degree3, degree4:degree4, degree5:degree5, degree6:degree6, degree7:degree7 }, function(data) {
			        $("#applied_applicants_search_view_content").html(data);
			   	});

                $.post("sapppv",{ post_id:post_id }, function(data) {
                    $("#selected_applicants_per_post_view_content").html(data);
                });
			</script>

			<?php
	    }
	}

	else
	{
        ?>
        <script type="text/javascript">
            $.notify({
                // where to append the toast notification
                wrapper: 'body',

                // toast message
                message: 'Something went wrong please try again later',

                // success, info, error, warn
                type: 'warn',

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
	}