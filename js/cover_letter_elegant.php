<?php
  //include 'temp_style.php';
  require 'temp_style.php';
  require_once('../dbconfig.php');
  global $con;

  $js_id=$_SESSION['js_info']['id'];
  $js_name=$_SESSION['js_info']['name'];

  $current_date=date('Y-m-d');

  $query1 = "SELECT * FROM job_seeker WHERE id='$js_id'";

  if (!$per = mysqli_query($con, $query1)) {
    exit(mysqli_error($con));
  }

  $query2 = "SELECT * FROM education WHERE js_id='$js_id' AND degree_level='Bachelors Degree'";

  if (!$edu_bachelors = mysqli_query($con, $query2)) {
    exit(mysqli_error($con));
  }

  $query3 = "SELECT * FROM education WHERE js_id='$js_id' AND degree_level='Post Graduate Degree'";

  if (!$edu_post_graduate = mysqli_query($con, $query3)) {
    exit(mysqli_error($con));
  }

  $query4 = "SELECT * FROM work_experience WHERE js_id='$js_id' order by id ASC";

  if (!$exp = mysqli_query($con, $query4)) {
    exit(mysqli_error($con));
  }

  $query4 = "SELECT * FROM cover_letter_info WHERE js_id='$js_id'";

  if (!$org = mysqli_query($con, $query4)) {
    exit(mysqli_error($con));
  }

?>

  <!--############################# BEGIN Content Area ###########################-->
<style type="text/css">
  body {
    line-height: 1.25 !important;
  }
  .alignment{
    text-align:left;
    margin-top:15px;  
  }
</style>

<div class="col-md-12 col-xs-12">

  <div id="cover_letter_elegant" style="width:100%;">

    <div class="col-md-12 mobile-device text-left" style="margin-bottom: 5px;">
      <?php
      while($per_data = mysqli_fetch_assoc($per))
      {
        $full_name        =$per_data['full_name'];
        $present_address  =$per_data['present_address'];
        $permanent_address=$per_data['permanent_address'];
        $mobile_number    =$per_data['mobile_number'];
        $email            =$per_data['email'];
      }
      ?>
      <div class="col-md-12">
        <div style=" color:#FF8150; font-size: 2rem; margin-bottom: 5px"><?php echo $full_name; ?></div>

        <?php 
        if (!empty($present_address))
        {
          ?>
          <div><small style="font-size: 12px; "><?php echo $present_address.'  &nbsp; '.$mobile_number.'  &nbsp; '.$email; ?></small></div>
          <?php
        }
        elseif (!empty($permanent_address))
        {
          ?>
          <div><small style="font-size: 12px; "><?php echo $permanent_address.'  &nbsp; '.$mobile_number.'  &nbsp; '.$email;; ?></small></div>
          <?php
        }
        ?>
      </div>
    </div>

    <div class="col-md-12 mobile-device" style="border-top: 2px solid grey;">
      <?php
      while($org_data = mysqli_fetch_assoc($org))
      {
        $position      =$org_data['position'];
        $published_on  =$org_data['published_on'];
        $to_director   =$org_data['to_director'];
        $institution   =$org_data['institution'];
        $contact_no    =$org_data['contact_no'];
        $email         =$org_data['email'];
        $address       =$org_data['address'];

        ?>
        <div class="alignment" style="padding-top: 35px;">
          <div><?php echo $to_director; ?></div>
          <div><?php echo $institution; ?></div>
          <div><?php echo $address; ?></div>
          <div><?php echo $contact_no; ?></div>
          <div><?php echo $email; ?></div>
        </div>
        <?php
      }
      ?>
    </div>

    <div class="col-md-12 mobile-device" style="padding-top: 20px !important;">
      <div class="alignment">

        <div>Dear <?php echo $to_director; ?>,</div>
        <div class="mt-2">
          I have a great interest with your advertisement for <?php echo $position; ?> that published in <?php echo $published_on; ?>. I would like to apply for the position of <?php echo $position; ?>. 
        </div>

      </div>
    </div>

    <?php
    if (mysqli_num_rows($exp) > 0) 
    {
      while($exp_data = mysqli_fetch_assoc($exp))
      {
        $organization_name  =$exp_data['organization_name'];
        $position_title     =$exp_data['position_title'];
        $department         =$exp_data['department'];
      }
      ?>
      <div class="col-md-12 mobile-device">
        <div  class="alignment">
          I have experienced in <?php echo $department; ?> department. I have worked as <?php echo $position_title; ?> in <?php echo $organization_name; ?>.In that institution I worked. All the colleague praised me highly. I have a huge experience in <?php echo $position_title; ?> because when I started my higher study from then I am practicing about this. So I am sure that I am the perfect person for this job.
        </div>
      </div>
      <?php
    }

    if (mysqli_num_rows($edu_bachelors) > 0) 
    {
      while($edu_bachelors_data = mysqli_fetch_assoc($edu_bachelors))
      {
        $degree_title_bachelors  =$edu_bachelors_data['degree_title'];
        $institution_bachelors   =$edu_bachelors_data['institution'];
      }

      while($edu_post_graduate_data = mysqli_fetch_assoc($edu_post_graduate))
      {
        $degree_title_post_graduate  =$edu_post_graduate_data['degree_title'];
        $institution_post_graduate   =$edu_post_graduate_data['institution'];
      }

      ?>
      <div class="col-md-12 mobile-device">
        <div  class="alignment">
          <?php 
            if (mysqli_num_rows($edu_bachelors) > 0) 
            { 
              echo 'I completed '.$degree_title_bachelors.' from '.$institution_bachelors.'';
            } 
            if (mysqli_num_rows($edu_post_graduate) > 0) 
            { 
              echo ' and '.$degree_title_post_graduate.' from '.$institution_post_graduate.'';
            } 
          ?>
          .I had excellent performance there. I have also creative and innovative idea for this sector. I am capable for working with under pressure. I am able to worn in a team.

        </div>
      </div>
      <?php
    }
    ?>


    <div class="col-md-12 mobile-device">

      <div class="alignment">
      I am aware that you will receive a large number of applications for this job, but I would very much appreciate the opportunity to demonstrate my capabilities to you in person.
      </div>

      <div class="alignment">
      I believe that I have a lot to offer your organisation. I am keen to develop my professional skills and look forward to discussing my application with you at an interview. I have enclosed a copy of my resume for your consideration. I can be contacted at all times on the details provided above.
      </div>

      <div class="alignment">
      Thank You for your consideration and I look forward to hearing from you.
      </div>

    </div>

    <div class="col-md-12 mobile-device" style="padding-top: 20px !important">
      <div  class="alignment">

        <div>Sincerely,</div>
        <div class="mt-3"><?php echo $full_name; ?></div>

      </div>
    </div>

  </div>
</div>

<!--/############################# END Content Area ###########################-->

<script type="text/javascript">

    $(function(){
      $('#cover_letter_elegant').froalaEditor({
          toolbarButtons: ['undo', 'redo', '|', 'bold', 'italic', 'underline', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'lineHeight', 'paragraphFormat', 'color', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '|', 'insertHR', 'insertImage', 'insertTable', '|','print', 'getPDF']
        })
    });

</script>

<?php 
  //include 'temp_js.php';
  require 'temp_js.php';
?>