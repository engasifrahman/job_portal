<?php
  //include 'temp_style.php';
  require 'temp_style.php';
  require_once('../dbconfig.php');
  global $con;

  $js_id=$_SESSION['js_info']['id'];
  $js_name=$_SESSION['js_info']['name'];

  $query1 = "SELECT * FROM job_seeker WHERE id='$js_id'";

  if (!$per = mysqli_query($con, $query1)) {
    exit(mysqli_error($con));
  }

  $query2 = "SELECT * FROM career_info WHERE js_id='$js_id'";

  if (!$career = mysqli_query($con, $query2)) {
    exit(mysqli_error($con));
  }

  $query3 = "SELECT specialized_skills,extracurricular_activities FROM specialization WHERE js_id='$js_id'";

  if (!$specialization = mysqli_query($con, $query3)) {
    exit(mysqli_error($con));
  }

  $query4 = "SELECT * FROM education WHERE js_id='$js_id' AND status='user_data'  order by id DESC";

  if (!$edu = mysqli_query($con, $query4)) {
    exit(mysqli_error($con));
  }

  $query5 = "SELECT * FROM work_experience WHERE js_id='$js_id' AND status='user_data'  order by id ASC";

  if (!$exp = mysqli_query($con, $query5)) {
    exit(mysqli_error($con));
  }

  $query6 = "SELECT * FROM training_workshop WHERE js_id='$js_id' AND status='user_data'  order by id ASC";

  if (!$training = mysqli_query($con, $query6)) {
    exit(mysqli_error($con));
  }

  $query7 = "SELECT * FROM certifications WHERE js_id='$js_id' AND status='user_data'  order by id ASC";

  if (!$certi = mysqli_query($con, $query7)) {
    exit(mysqli_error($con));
  }

  $query8 = "SELECT * FROM language WHERE js_id='$js_id' AND status='user_data'  order by id ASC";

  if (!$lan = mysqli_query($con, $query8)) {
    exit(mysqli_error($con));
  }

  $query9= "SELECT * FROM reference WHERE js_id='$js_id' AND status='user_data'  order by id ASC";

  if (!$ref = mysqli_query($con, $query9)) {
    exit(mysqli_error($con));
  }
?>

  <!--############################# BEGIN Content Area ###########################-->
<style type="text/css">
  .cv_photo{
    width: 100px;
    height: 100px;
    border-radius:1000px;
  }
  .cv_heading{
    padding-top: 14px;
  }
  .cv_heading h4{
    padding-bottom: 4px;
    border-bottom: 1px solid #ddd !important;
  }
</style>

<div id="resume_academic" class="col-md-12">
  <div class="col-md-12 mobile-device">
    <div id="resume_sidebar" class="col-md-4 col-xs-4 mobile-device pt-1"> <!--here for inline css define the style in script section bellow --> 
      <?php
      while($per_data = mysqli_fetch_assoc($per))
      {
        $picture          =$per_data['pic_dir'];
        $full_name        =$per_data['full_name'];
        $gender           =$per_data['gender'];
        $permanent_address=$per_data['permanent_address'];
        $present_address  =$per_data['present_address'];
        $mobile_number    =$per_data['mobile_number'];
        $email            =$per_data['email'];

        list($y, $m, $d)  = explode('-', $per_data['dob']);
        $dob=$d;
        $dob.='-'.$m;
        $dob.='-'.$y;
      }
      ?>
      <div class="col-md-12 p-0 text-center pl-0">
        <span>
          <?php
          if ($picture=='not_defined_yet' && $gender=='Male')
          {
            echo
            '
              <img src="../images/demo/male.png" class="avatar-bg cv_photo" alt="avatar">
            ';
          }

          elseif ($picture=='not_defined_yet' && $gender=='Female')
          {
            echo
            '
              <img src="../images/demo/female.png" class="avatar-bg cv_photo" alt="avatar">
            ';
          }

          elseif ($picture=='not_defined_yet' && $gender=='Others')
          {
            echo
            '
              <img src="../images/demo/others.png" class="avatar-bg cv_photo" alt="avatar">
            ';
          }

          else
          {
            echo
            '
              <img src="'.$picture.'" class="avatar-bg cv_photo" alt="avatar">
            ';
          }
          ?>
        </span>
      </div>

      <div class="col-md-12 col-xs-12 text-uppercase text-center mt-1">
        <h4 class="text-bold-600"><?php echo $full_name; ?></h4>
      </div>
  
      <div class="clearfix"></div>

      <?php 
      if (!empty($present_address) || !empty($permanent_address) || !empty($mobile_number) || !empty($email))
      {
        ?>
        <div class="cv_heading col-md-12 pl-0">
          <h4 class="text-bold-500"><span class="bg-grey white" style="padding: 0px 6px; border-radius: 1000px"><i class="fa fa-user-o" aria-hidden="true"></i></span> Personal Info</h4>
          <?php

          if (!empty($present_address))
          {
            ?>
            <div class="text-bold-400">Address</div>
            <div style="margin-bottom: 5px"><?php echo $present_address; ?></div>
            <?php
          }
          elseif (!empty($permanent_address))
          {
            ?>
            <div class="text-bold-400">Address</div>
            <div style="margin-bottom: 5px"><?php echo $permanent_address; ?></div>
            <?php
          }

          if (!empty($mobile_number))
          {
            ?>
            <div class="text-bold-400">Phone</div>
            <div style="margin-bottom: 5px"><?php echo $mobile_number; ?></div>
            <?php
          }

          if (!empty($email))
          {
            ?>
            <div class="text-bold-400">Email</div>
            <div><?php echo $email; ?></div>
            <?php
          }
          ?>
          </div>
        <?php
      }

      if (mysqli_num_rows($specialization)>0)
      {
        while($specialization_data = mysqli_fetch_assoc($specialization))
        {
          if (!empty($specialization_data['specialized_skills']))
          {
            $skills=explode(',', $specialization_data['specialized_skills']);
            $extr_activities=$specialization_data['extracurricular_activities'];
          }
          else
          {
            $skills=NULL;
          }
        }
        
        if(!empty($skills))
        {
          ?>
          <div class="cv_heading col-md-12 pl-0">
            <h4 class="text-bold-500"><span class="bg-grey white" style="padding: 0px 4px; border-radius: 1000px"><i class="fa fa-cogs" aria-hidden="true"></i></span> Skills</h4>

            <?php
            for($i=0; $i < sizeof($skills); $i++)
            {
              ?>
              <div><?php echo $skills[$i]; ?></div>
              <?php
            }
            ?>
          </div>
          <?php
        }
      }

      if (mysqli_num_rows($lan)>0)
      {
        $t=mysqli_num_rows($lan);
        ?>
        <div class="cv_heading col-md-12 pl-0">
          <h4 class="text-bold-500"><span class="bg-grey white" style="padding: 0px 6px; border-radius: 1000px"><i class="fa fa-language" aria-hidden="true"></i></span> Language</h4>
          <?php
          $i=0;
          while($lan_data = mysqli_fetch_assoc($lan))
          {
            $i++;
            ?>
            <div><?php echo $lan_data['language']; ?></div>
            <div class="col-md-12 mobile-device">
              <div class="progress" <?php if($t==$i){ echo ' ';} else{ echo ' style="margin-bottom: 5px !important"';}?>>
                <div class="progress-bar bg-grey mt-0" role="progressbar" style=" width: <?php if($lan_data['speaking']=='High'){ echo'100%';} elseif($lan_data['speaking']=='Medium'){ echo'65%';} else{echo'33%';} ?>;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php if($lan_data['speaking']=='High'){ echo'High';} elseif($lan_data['speaking']=='Medium'){ echo'Medium';} else{echo'Low';} ?>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
        <?php
      }

      if (mysqli_num_rows($ref) > 0)
      {
        ?>
        <div>&nbsp;</div>
        <div class="cv_heading col-md-12 pl-0 pt-0">
          <h4 class="text-bold-500"><span class="bg-grey white" style="padding: 0px 3px; border-radius: 1000px"><i class="fa fa-handshake-o" aria-hidden="true"></i></span> References</h4>
          <?php
          $i=1;
          while($ref_data = mysqli_fetch_assoc($ref))
          {
            if ($i==1 || $i==2)
            {
              ?>  
                <?php 
                if(mysqli_num_rows($ref)>1)
                { 
                  ?>
                  <div>
                    <?php if($i==1){echo '<span class="text-bold-400">Reference 1 </span>';} else{echo '<span class="text-bold-400">Reference 2 </span>';} ?> 
                  </div>
                  <?php
                }
                ?>
                <div><?php echo $ref_data['ref_person_name']; ?></div>
                <div><?php echo $ref_data['designation']; ?></div>
                <div><?php echo $ref_data['organization_name']; ?></div>
                <div><?php echo $ref_data['mobile']; ?></div>
                <div style="margin-bottom: 5px"><?php echo $ref_data['ref_email']; ?></div>

              <?php
            }
            $i++;
          }
          ?>
        </div>
        <?php
      }
      ?> 
    </div>
    

    <div class="col-md-8 col-xs-8 pr-0">

      <?php
      while($career_data = mysqli_fetch_assoc($career))
      {
        if (!empty($career_data['summary']))
        {
          ?>  
          <div class="col-md-12 mobile-device mt-1">
            <div class="text-justify">
              <?php echo $career_data['summary']; ?>
            </div>
          </div>
          <?php
        }
      }

      if (mysqli_num_rows($edu) > 0)
      {
        ?>
        <div class="cv_heading col-md-12 pl-0 col-xs-12 mobile-device">
          <h4 class="text-bold-500"><span class="bg-grey white" style="padding: 0px 3px; border-radius: 1000px"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span> Education</h4>
          <?php
          while($edu_data = mysqli_fetch_assoc($edu))
          {
            ?> 
            <ul style="padding-inline-start: 20px;">
              <li style="margin-bottom: 4px">
                <span class="text-bold-400">
                  <?php echo $edu_data['degree_title']; ?>
                </span>
              </li>
            </ul>
            <ul style="list-style-type:none;">
              <li>Institute: <?php echo $edu_data['institution']; ?></li>
              <li>Major: <?php echo $edu_data['major_subject']; ?></li>
              <li>Result: <?php if($edu_data['result_system']=='Grade'){ echo $edu_data['result_achieved'].' out of '.$edu_data['grade_scale'];} elseif($edu_data['result_system']=='Class'){echo $edu_data['result_achieved'].' Class';} else{echo $edu_data['result_achieved'].' Division';} ?></li>
              <li>Passing Year: <?php echo $edu_data['passing_year']; ?></li>
              <li>Duration: <?php echo $edu_data['duration'].' Year\'s'; ?></li>
            </ul>
            <?php
          }
          ?>
        </div>
        <?php
      }

      if (mysqli_num_rows($exp) > 0)
      {
      ?>
      <div class="cv_heading col-md-12 pl-0 col-xs-12 mobile-device">
        <h4 class="text-bold-500"><span class="bg-grey white" style="padding: 0px 5px; border-radius: 1000px"><i class="fa fa-briefcase" aria-hidden="true"></i></span> Experience</h4>
          <?php
          while($exp_data = mysqli_fetch_assoc($exp))
          {
            list($y, $m, $d)  = explode('-', $exp_data['join_date']);
            $join_date=$d;
            $join_date.='-'.$m;
            $join_date.='-'.$y;

            if($exp_data['resign_date']!='continue')
            {
              list($y, $m, $d)  = explode('-', $exp_data['resign_date']);
              $resign_date=$d;
              $resign_date.='-'.$m;
              $resign_date.='-'.$y;
            }
            else
            {
              $resign_date=$exp_data['resign_date'];
            }
            
            ?>
            <ul style="padding-inline-start: 20px;">
              <li style="margin-bottom: 4px">
                <span class="text-bold-400">
                  <?php echo $exp_data['position_title']; ?> <i>(<?php echo $join_date.' to '.$resign_date; ?>)</i>
                </span>
              </li>
            </ul>
            <ul style="list-style-type:none;">
              <li>Organization: <?php echo $exp_data['organization_name']; ?></li>
              <li>Job Nature: <?php echo $exp_data['type_of_employment']; ?></li>
              <li>Job Level: <?php echo $exp_data['position_level']; ?></li>
              <?php
              if (!empty($exp_data['responsibility_and_achivement']))
              {
                ?>
                <li>Responsibility: <?php echo $exp_data['responsibility_and_achivement']; ?></li>
                <?php
              }
              ?>
            </ul>
          <?php
          }
          ?>
        </div>
        <?php
      }

      if (mysqli_num_rows($certi) > 0)
      {
        ?>
        <div class="cv_heading col-md-12 pl-0 col-xs-12 mobile-device">
          <h4 class="text-bold-500"><span class="bg-grey white" style="padding: 0px 6px; border-radius: 1000px"><i class="fa fa-certificate" aria-hidden="true"></i></span> Certifications</h4>
          <?php
          while($certi_data = mysqli_fetch_assoc($certi))
          {
            list($y, $m, $d)  = explode('-', $certi_data['exam_date']);
            $exam_date=$d;
            $exam_date.='-'.$m;
            $exam_date.='-'.$y;

            list($y, $m, $d)  = explode('-', $certi_data['expire_date']);
            $expire_date=$d;
            $expire_date.='-'.$m;
            $expire_date.='-'.$y;
            ?>
            <ul style="padding-inline-start: 20px;">
              <li style="margin-bottom: 4px">
                <span class="text-bold-400">
                  <?php echo $certi_data['certificate_name']; ?>
                </span>
              </li>
            </ul>
            <ul style="list-style-type:none;">
              <li>Exam Date: <?php echo $exam_date; ?></li>
              <?php
              if ($expire_date!='00-00-0000')
              {
                ?>
                <li>Expire Date: <?php echo $expire_date; ?></li>
                <?php
              }
              ?>
              <?php
              if (!empty($certi_data['score']))
              {
                ?>
                <li>Score: <?php echo $certi_data['score']; ?></li>
                <?php
              }
              ?>
              <?php
              if (!empty($certi_data['score_scale']))
              {
                ?>
                <li>Score Scale: <?php echo $certi_data['score_scale']; ?></li>
                <?php
              }
              ?>
            </ul>
          <?php
          }
          ?>
        </div>
      <?php
      }

      if (mysqli_num_rows($training) > 0)
      {
        ?>
        <div class="cv_heading col-md-12 pl-0 col-xs-12 mobile-device">
          <h4 class="text-bold-500"><span class="bg-grey white" style="padding: 0px 6px; border-radius: 1000px"><i class="fa fa-pencil" aria-hidden="true"></i></span> Training/Workshop Summary</h4>
          <?php
          while($training_data = mysqli_fetch_assoc($training))
          {
            list($y, $m, $d)  = explode('-', $training_data['start_date']);
            $start_date=$d;
            $start_date.='-'.$m;
            $start_date.='-'.$y;

            list($y, $m, $d)  = explode('-', $training_data['end_date']);
            $end_date=$d;
            $end_date.='-'.$m;
            $end_date.='-'.$y;
            ?> 
            <ul style="padding-inline-start: 20px;">
              <li style="margin-bottom: 4px">
                <span class="text-bold-400">
                  <?php echo $training_data['training_title']; ?> <i>(<?php echo $start_date.' to '.$end_date; ?>)</i>
                </span>
              </li>
            </ul>
            <ul style="list-style-type:none;">
              <li>Institute: <?php echo $training_data['institution']; ?></li>
              <li>Training Type: <?php echo $training_data['training_type']; ?></li>
              <li>Duration: <?php echo $training_data['training_duration'].' Hours'; ?></li>
              <li>Certification: <?php echo $training_data['certification']; ?></li>
            </ul>
            <?php
          }
          ?>
        </div> 
        <?php
      }

      if (!empty($extr_activities))
      {
        ?>
        <div class="cv_heading col-md-12 pl-0 col-xs-12 mobile-device">
          <h4 class="text-bold-500"><span class="bg-grey white" style="padding: 0px 6px; border-radius: 1000px"><i class="fa fa-gift" aria-hidden="true"></i></span> Extracurricular Activities</h4>
          
          <div class="text-justify">
            <?php echo $extr_activities; ?>
          </div>
        </div>
        <?php
      }
      ?>
      
      <div class="cv_heading col-md-12 col-xs-12 mobile-device">
        <h4 class="text-bold-500"><span class="bg-grey white" style="padding: 0px 5px; border-radius: 1000px"><i class="fa fa-gavel" aria-hidden="true"></i></span> Declaration</h4>
        
        <div class="text-justify">
          I hereby declare that the above particulars are true and correct to the best of my knowledge and belief and in the event of any information being found false or incorrect, my candidature will be liable to be canceled.
        </div>

        <div class="text-right">
          <span class="text-bold-400" style="border-bottom: 1px dotted black";>Signature</span>
        </div>
        <br><br>
      </div>

    </div>
  </div>
</div>

<!--/############################# END Content Area ###########################-->

<script type="text/javascript">

  $(function(){
    $('#resume_academic').froalaEditor({
        toolbarButtons: ['undo', 'redo', '|', 'bold', 'italic', 'underline', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'lineHeight', 'paragraphFormat', 'color', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '|', 'insertHR', 'fontAwesome', 'insertImage', 'insertTable', '|','print', 'getPDF']
      })
  });

</script>

<?php 
  //include 'temp_js.php';
  require 'temp_js.php';
?>