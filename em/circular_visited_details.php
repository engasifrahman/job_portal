<?php
    require 'header.php';
    require_once('../dbconfig.php');
    global $con;

    if (isset($_GET['post_id']) && !empty($_GET['post_id']))
    {
        $post_id=$_GET['post_id'];
        $em_id=$_SESSION['em_info']['id'];

        $query = "SELECT JS.id, pic_dir, full_name, email, mobile_number, gender, visit_count, last_visited_at FROM circular_post AS CP, circular_visited AS CV, job_seeker AS jS WHERE em_id='$em_id' AND CP.post_id='$post_id' AND CV.post_id='$post_id' AND JS.id=CV.js_id ORDER BY CV.id DESC";

        if (!$result = mysqli_query($con, $query))
        {
            exit(mysqli_error($con));
        }

        $query2 = "SELECT js_id FROM applied_job WHERE post_id='$post_id' ORDER BY id DESC";
        if (!$result2 = mysqli_query($con, $query2))
        {
            exit(mysqli_error($con));
        }
        if (mysqli_num_rows($result2) > 0)
        {
            while($applied_data = mysqli_fetch_assoc($result2))
            {
                $applied_js_id[]=$applied_data['js_id'];
            }
        }
        else
        {
            $applied_js_id=NULL;
        }
    }
?>
<!--############################# BEGIN Content Area ###########################-->
<style type="text/css">
    .form-group {
        padding-bottom: 0px;
        margin: 0;
    }
    .form-group .form-control {
        margin-bottom: 0px;
    }
    .form-group input[type=search] {
        height: 24px;
    }
</style>
<div class="app-content content">
    <div class="content-wrapper"">
        <div class="content-body">

            <!--########################### BEGIN Circular Visited Information ###########################-->
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                            <h4 class="card-title info" id="personal_info">
                                <i class="fa fa-th-list" aria-hidden="true"></i> Circular Visited Job Seeker's List
                            </h4>
                        </div>
                        <div class="card-body collapse in">
                            <div class="card-block custom-card-block">

                                <div class="col-md-12 col-sm-12 col-xs-12 table_content">
                                    <?php
                                    if (!empty($_GET['post_id']) && mysqli_num_rows($result) > 0)
                                    {
                                        $total_visitor=mysqli_num_rows($result);
                                        ?>
                                            <div class="table-responsive card wizard-card" data-color="green">
                                                <div class="col-md-12">
                                                    <table id="dtBasicExample" class="table table-bordered mt-1 col-md-12 col-xs-12" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr class="info">
                                                                <th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    # &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
                                                                </th>
                                                                <th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Picture
                                                                </th>
                                                                <th class="w25 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Name &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
                                                                </th>
                                                                <th class="w20 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Email &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
                                                                </th>
                                                                <th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Mobile No &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
                                                                </th>
                                                                <th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Last Visit &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
                                                                </th>
                                                                <th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Hits &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
                                                                </th>
                                                                <th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Status &nbsp; <i class="fa fa-sort grey" aria-hidden="true"></i>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                    <?php

                                                    $i=1;
                                                    $total_visit_count=0;
                                                    $total_applied=0;
                                                    while($visit_data = mysqli_fetch_assoc($result))
                                                    {   
                                                        $js_id=$visit_data['id'];
                                                        $picture=$visit_data['pic_dir'];
                                                        $name=$visit_data['full_name'];
                                                        $gender=$visit_data['gender'];  
                                                        $email=$visit_data['email'];
                                                        $mobile=$visit_data['mobile_number']; 
                                                        $last_visited_at=$visit_data['last_visited_at'];
                                                        $visit_count=$visit_data['visit_count'];
                                                        $total_visit_count+=$visit_count;
                                                        ?>
                                                            <tr>
                                                                <td class="w5 text-xs-centertext-sm-center text-md-center text-lg-center text-xl-center"><?php echo $i++; ?>
                                                                </td>

                                                                <td class="w5 text-xs-centertext-sm-center text-md-center text-lg-center text-xl-center">
                                                                     
                                                                        <span class="avatar avatar-online">
                                                                    <?php
                                                                      if ($picture=='not_defined_yet' && $gender=='Male')
                                                                      {
                                                                        echo
                                                                        '
                                                                          <img src="../images/demo/male.png" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
                                                                        ';
                                                                      }

                                                                      elseif ($picture=='not_defined_yet' && $gender=='Female')
                                                                      {
                                                                        echo
                                                                        '
                                                                          <img src="../images/demo/female.png" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
                                                                        ';
                                                                      }

                                                                      elseif ($picture=='not_defined_yet' && $gender=='Others')
                                                                      {
                                                                        echo
                                                                        '
                                                                          <img src="../images/demo/others.png" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
                                                                        ';
                                                                      }

                                                                      else
                                                                      {
                                                                        echo
                                                                        '
                                                                          <img src="'.$picture.'" style="width:60px;height:30px;float:right;" class="avatar-bg" alt="avatar">
                                                                        ';
                                                                      }
                                                                    ?>
                                                                    </span>

                                                                </td>

                                                                <td class="w25 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    <a href="vj?js_id=<?php echo $js_id; ?>" title="View Resume"><?php echo $name;?> <i class="fa fa-external-link" aria-hidden="true"></i>
                                                                    </a>
                                                                </td>

                                                                <td class="w20 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $email; ?>
                                                                </td>

                                                                <td class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    <?php echo $mobile; ?>    
                                                                </td>

                                                                <td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center"><?php echo $last_visited_at; ?>
                                                                </td>

                                                                <td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    <span class="round tag tag-success pl-1 pr-1" style="margin-top:10px;">
                                                                        <?php echo $visit_count; ?>
                                                                    </span>
                                                                </td>


                                                                <td class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                <?php 
                                                                    if (empty($applied_js_id))
                                                                    {
                                                                        echo
                                                                        '
                                                                            <span class="round tag tag-default" style="margin-top:10px;">
                                                                                Not Applied
                                                                            </span>
                                                                        ';
                                                                    }
                                                                    elseif (in_array($js_id, $applied_js_id))
                                                                    {
                                                                        $total_applied++;
                                                                        echo
                                                                        '
                                                                            <span class="round tag tag-info" style="margin-top:10px;">
                                                                                Applied
                                                                            </span>
                                                                        ';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo
                                                                        '
                                                                            <span class="round tag tag-default"  style="margin-top:10px;">
                                                                                Not Applied
                                                                            </span>
                                                                        ';
                                                                    }
                                                                ?>
                                                                </td>

                                                            </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                        <div class="mt-1 success col-md-12 col-sm-12 col-xs-12 text-sm-center text-md-center text-lg-center text-xl-center">
                                                            <strong>Here..</strong>
                                                        </div>
                                                        
                                                        <div class="mt-1 p-1 no-border-right col-md-3 col-sm-3 col-xs-3 text-sm-center text-md-center text-lg-center text-xl-center" style="border:2px solid #E3EBF3;">
                                                            <strong class="success">Total Visitors: </strong><?php echo $total_visitor;?>
                                                        </div>

                                                        <div class="mt-1 p-1 no-border-right col-md-3 col-sm-3 col-xs-3 text-sm-center text-md-center text-lg-center text-xl-center" style="border:2px solid #E3EBF3;">
                                                            <strong class="success">Total Hits: </strong><?php echo $total_visit_count;?>
                                                        </div> 

                                                        <div class="mt-1 p-1 no-border-right col-md-3 col-sm-3 col-xs-3 text-sm-center text-md-center text-lg-center text-xl-center" style="border:2px solid #E3EBF3;">
                                                            <strong class="success">Total Applied: </strong><?php echo $total_applied;?>
                                                        </div> 

                                                        <div class="mt-1 p-1 col-md-3 col-sm-3 col-xs-3 text-sm-center text-md-center text-lg-center text-xl-center" style="border:2px solid #E3EBF3;">
                                                            <strong class="success">Total Not Applied: </strong><?php echo ($total_visitor-$total_applied);?>
                                                        </div> 
                                                        <tfoot>
                                                            <tr class="info">
                                                                <th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    #
                                                                </th>
                                                                <th class="w5 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Picture
                                                                </th>
                                                                <th class="w25 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Name
                                                                </th>
                                                                <th class="w20 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Email
                                                                </th>
                                                                <th class="w15 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Mobile No
                                                                </th>
                                                                <th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Last Visit
                                                                </th>
                                                                <th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Hits
                                                                </th>
                                                                <th class="w10 text-xs-center text-sm-center text-md-center text-lg-center text-xl-center">
                                                                    Status
                                                                </th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }

                                    else
                                    {
                                        ?>
                                            <div class="text-xs-center text-sm-center text-md-center text-lg-center text-xl-center p-1 text-warning"><strong>So far no one has visited this job</strong></div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--################################ END Circular Visited Information ################################-->
            
        </div>
    </div>
</div>
<!--############################# END Content Area ###########################-->
<script type="text/javascript">
    
    $(document).ready(function () {

        $('#dtBasicExample').DataTable({
            //"searching": false // false to disable search (or any other option)
            //"ordering": false // false to disable sorting (or any other option)
            "paging": false // false to disable pagination (or any other option)
         });
        $('.dataTables_length').addClass('bs-select');
    });

</script>
<?php 
    //include 'footer.php';
    require 'footer.php';
?>