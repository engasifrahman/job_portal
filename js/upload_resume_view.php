<?php
session_start();
$resume=$_SESSION['js_info']['resume'];
$name=$_SESSION['js_info']['name'];

header('Content-disposition: inline');
header('Content-type: application/msword'); // not sure if this is the correct MIME type


?>
	<div class="col-md-10 offset-md-1 bg-white">

		<h4 class="info mt-1 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
			<i class="icon-upload3 font-medium-3"></i>  Upload a New Resume
		</h4>
		<hr>

		<div class="col-md-8 offset-md-2">
			<form id="resume_upload_form" class="form" method="post" action="" enctype="multipart/form-data">
			  	<div class="form-group">
			    	<label><i class="fa fa-file-text-o" aria-hidden="true"></i></label>
			    	<input type="file" class="form-control-file" id="resume_upload" name="resume_upload" aria-describedby="fileHelp" required>

			    	<?php
			   		if ($resume!='not_defined_yet')
			   		{
			   			?>
			   			<div class="mt-1 mb-1">
							<a href="<?php echo $resume; ?>" class="success" download> 
			                   <i class="icon-download font-medium-3"></i> Download Resume
			                </a>
		                </div>
					    <?php
					}
					?>

			    	<small id="fileHelp" class="text-warning">
			    		Uploading the new resume will replace the existing one, you can upload Max: 1MB (pdf, doc, docx)
			    	</small>
			  	</div>
				<hr>
				<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
		            <button type="reset" class="btn btn-outline-warning" data-dismiss="modal"><i class="icon-cross2"></i> Cancel</button>
		            <button type="submit" class="btn btn-outline-primary" name="submit_resume_upload"><i class="icon-check2"></i> Upload</button>
		        </div>
			</form>
		</div>
	</div>

	<div class="col-md-10 offset-md-1 bg-white">
 	<?php

		?>
			<hr>
			<h4 class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center" style="color:#00838F;"><i class="fa fa-eye" aria-hidden="true"></i> Preview</h4>
			<hr>
		<?php

		if ($resume!='not_defined_yet')
		{
			$file_ext=strtolower(pathinfo($resume,PATHINFO_EXTENSION));

			if ($file_ext=='pdf')
			{
				?>
				<embed src="<?php echo $resume;?>" style="width: 100%; height: 500px">
				<?php
			}

			elseif ($file_ext=='doc')
			{

		 		header('Content-disposition: inline');
				header('Content-type: application/msword'); // not sure if this is the correct MIME type
				readfile($resume);
	
			}

			elseif ($file_ext=='docx')
			{
				?>

				<div class="alert alert-warning text-sm-center text-md-center text-lg-center text-xl-center " style="margin: 75px 0px;">No preview available (Preview available only for pdf or doc file)
				</div>

				<?php
			}

		}

		else
		{
			?>

			<div class="alert alert-warning text-sm-center text-md-center text-lg-center text-xl-center " style="margin: 90px 0px;">File Not Defiend Yet
			</div>

			<?php
		}
	?>
	</div>

<script type="text/javascript">

    //############################### BEGIN UPDATE ##############################//
    $('#resume_upload_form').submit(function(e){
        e.preventDefault();    
        
        var formData = new FormData(this);

        $.ajax({
            type: 'post',
            url: 'uplru',   // here your php file to do something with postdata
            data: formData, // here you set the data to send to php file
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#resume_upload_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
                $('#resume_upload_notification_content').show().fadeOut(6100).html(data);
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

    });
    //############################### END UPDATE ##############################//
    
    /*############################# BEGIN Form Validation ###########################//
    $('#resume_upload_form').bootstrapValidator({
        fields:
        {

            resume_upload: 
            {
                message: 'File is not valid',
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'File is required and cannot be empty'
                    }
                }
            }
        }

    });
    //############################# END Form Validation ###########################*/
    
</script>
