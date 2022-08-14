<!-- Modal -->
<div class="modal fade text-xs-left" id="profile_pic_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title info text-xs-center text-sm-center text-md-center text-lg-center text-xl-center" id="myModalLabel1"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Change Profile Picture</h4>
            </div>
            <div class="modal-body">

                <div class="col-md-12" id="profile_pic_notification_content" style="display:none;"></div>
                <form id="profile_pic_change_form" class="form" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label"><i class="fa fa-user-o" aria-hidden="true"></i></label>
                        <input type="file" class="form-control-file form-control-success form-control-danger" id="profile_pic" name="profile_pic" required>
                        <small id="fileHelp" class="form-text text-muted">Choose a JPEG / JPG / PNG image & image size can not be more than 2MB</small>
                    </div>
                    <hr>
                    <div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                        <button type="reset" class="btn btn-outline-warning" data-dismiss="modal"><i class="icon-cross2"></i> Cancel</button>
                        <button type="submit" class="btn btn-outline-primary" name="picture_update"><i class="icon-check2"></i> Upload</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- /Modal -->

<script type="text/javascript">

    $( document ).ready(function() {
        $('#profile_pic_modal').modal('show');
    });

    //############################### BEGIN UPDATE ##############################//
    $('#profile_pic_change_form').submit(function(e){
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'post',
            url: 'upp',   // here your php file to do something with postdata
            data: formData, // here you set the data to send to php file
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#profile_pic_notification_content').show().fadeOut(6100).html('<div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">OPERATION IS RUNNING PLEASE WAIT..</div>');
            },
            success: function (data) {
                $('#profile_pic_notification_content').show().fadeOut(6100).html(data);
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
    $('#profile_pic_change_form').bootstrapValidator({
        fields:
        {

            profile_pic: 
            {
                message: 'Imgae is not valid',
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Imgae is required and cannot be empty'
                    }
                }
            }
        }

    });
    //############################# END Form Validation ###########################*/
    
</script>
