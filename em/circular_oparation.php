<?php
    session_start();

    if(isset($_POST['oparation']) && $_POST['oparation']=='Add')
    {
        require_once('../class_library/employer_job_post_class.php');
        
        $post_data= new Employer_Job_Post;
        $em_error = $post_data->em_post_data_insert($_POST);

        if(isset($em_error['success']))
        {
            ?>
                <script type="text/javascript">

                    $('#circular_add_content').slideUp(400); //this is actually hide
                    $('#circular_view_content').slideDown(400); //this is actually show
                    $('#circular_add').show();
                    $('#circular').show();
                    $('#circular_with_add_icon').hide();
                    $('#circular_edit_add_cancel').hide();
                    $('#circular_add_form').trigger("reset");

                    $.post("circular_list", function(data) {
                        $("#circular_view_content").html(data);
                    });
                    $.notify({
                        // where to append the toast notification
                        wrapper: 'body',

                        // toast message
                        message: 'Congratulations! <?php echo $em_error['success']; ?>',

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
            <?php
        }

        if(isset($em_error['db_error']))
        {
            ?>
            <script type="text/javascript">
                $.notify({
                    // where to append the toast notification
                    wrapper: 'body',

                    // toast message
                    message: 'DB Error: <?Php echo $em_error['db_error']; ?>',

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
        }

        if(isset($em_error['error']))
        {
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
        }

    }

    elseif(isset($_POST['oparation']) && $_POST['oparation']=='Edit')
    {
        require_once('../class_library/employer_job_post_class.php');
        
        $post_data= new Employer_Job_Post;
        $em_error = $post_data->em_post_data_update($_POST);

        if(isset($em_error['success']))
        {
            ?>
                <script type="text/javascript">

                    $('#circular_edit_content').slideUp(400); //this is actually hide
                    $('#circular_view_content').slideDown(400); //this is actually show
                    $('#circular_add').show();
                    $('#circular').show();
                    $('#circular_with_edit_icon').hide();
                    $('#circular_edit_add_cancel').hide();

                    $.post("circular_list", function(data) {
                        $("#circular_view_content").html(data);
                    });

                    $.notify({
                        // where to append the toast notification
                        wrapper: 'body',

                        // toast message
                        message: 'Congratulations! <?php echo $em_error['success']; ?>',

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
            <?php
        }

        if(isset($em_error['db_error']))
        {
            ?>
            <script type="text/javascript">
                $.notify({
                    // where to append the toast notification
                    wrapper: 'body',

                    // toast message
                    message: 'DB Error: <?Php echo $em_error['db_error']; ?>',

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
        }

        if(isset($em_error['error']))
        {
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
        }

    }

    elseif(isset($_POST['oparation']) && $_POST['oparation']=='Delete')
    {
        require_once('../class_library/employer_job_post_class.php');
        
        $post_data= new Employer_Job_Post;
        $em_error = $post_data->em_post_data_hide($_POST);

        if(isset($em_error['success']))
        {
            ?>
                <script type="text/javascript">

                    $('#circular_add_content').slideUp(400); //this is actually hide
                    $('#circular_view_content').slideDown(400); //this is actually show
                    $('#circular_add').show();
                    $('#circular').show();
                    $('#circular_with_add_icon').hide();
                    $('#circular_edit_add_cancel').hide();
                    $('#circular_add_form').trigger("reset");

                    $.post("circular_list", function(data) {
                        $("#circular_view_content").html(data);
                    });
                    $.notify({
                        // where to append the toast notification
                        wrapper: 'body',

                        // toast message
                        message: '<?php echo $em_error['success']; ?>',

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
            <?php
        }

        if(isset($em_error['db_error']))
        {
            ?>
            <script type="text/javascript">
                $.notify({
                    // where to append the toast notification
                    wrapper: 'body',

                    // toast message
                    message: 'DB Error: <?Php echo $em_error['db_error']; ?>',

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
        }

    }

    elseif(isset($_POST['oparation']) && $_POST['oparation']=='Active')
    {
        require_once('../class_library/employer_job_post_class.php');
        
        $post_data= new Employer_Job_Post;
        $em_error = $post_data->em_post_data_active($_POST);

        if(isset($em_error['success']))
        {
            ?>
                <script type="text/javascript">

                    $.post("circular_list", function(data) {
                        $("#circular_view_content").html(data);
                    });
                    
                    $.notify({
                        // where to append the toast notification
                        wrapper: 'body',

                        // toast message
                        message: '<?php echo $em_error['success']; ?>',

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
            <?php
        }

        if(isset($em_error['db_error']))
        {
            ?>
            <script type="text/javascript">
                $.notify({
                    // where to append the toast notification
                    wrapper: 'body',

                    // toast message
                    message: 'DB Error: <?Php echo $em_error['db_error']; ?>',

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
        }

    }

    elseif(isset($_POST['oparation']) && $_POST['oparation']=='Deactive')
    {
        require_once('../class_library/employer_job_post_class.php');
        
        $post_data= new Employer_Job_Post;
        $em_error = $post_data->em_post_data_deactive($_POST);

        if(isset($em_error['success']))
        {
            ?>
                <script type="text/javascript">

                    $.post("circular_list", function(data) {
                        $("#circular_view_content").html(data);
                    });

                    $.notify({
                        // where to append the toast notification
                        wrapper: 'body',

                        // toast message
                        message: '<?php echo $em_error['success']; ?>',

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
            <?php
        }

        if(isset($em_error['db_error']))
        {
            ?>
            <script type="text/javascript">
                $.notify({
                    // where to append the toast notification
                    wrapper: 'body',

                    // toast message
                    message: 'DB Error: <?Php echo $em_error['db_error']; ?>',

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
        }

    }
?>