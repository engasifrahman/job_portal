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
  .cv_heading h4{
    color:#FF8150 !important;
    font-weight: bold;
    padding-bottom: 4px;
    padding-top: 14px;
    border-bottom: 5px solid;
  }
</style>
<div class="col-md-12 col-xs-12">

  <div id="resume_basic_2" class="col-md-12 col-xs-12 mobile-device">
    <div class="col-md-12 col-xs-12 mobile-device">
      <?php
      while($per_data = mysqli_fetch_assoc($per))
      {
        $picture          =$per_data['pic_dir'];
        $full_name        =$per_data['full_name'];
        $father_name      =$per_data['father_name'];
        $mother_name      =$per_data['mother_name'];
        $gender           =$per_data['gender'];
        $marital_status   =$per_data['marital_status'];
        $nationality      =$per_data['nationality'];
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
      <div class="col-md-8 col-xs-8 mobile-device text-left pull-left mt-1">
        <h3 class="text-uppercase" style="color:#FF8150 !important;"><?php echo $full_name; ?></h3>
          <?php 
          if (!empty($present_address))
          {
            ?>
            <div><strong>Address:</strong> <?php echo $present_address; ?></div>
            <?php
          }
          elseif (!empty($permanent_address))
          {
            ?>
             <div><strong>Address:</strong> <?php echo $permanent_address; ?></div>
            <?php
          }
          ?>
        <div><strong>Mobile:</strong> <?php echo $mobile_number; ?></div>
        <div><strong>Email:</strong> <?php echo $email; ?></div>
      </div>

      <div class="col-md-2 col-xs-4 mobile-device pull-right text-right" style="float:right; text-align:right; margin-top: 5px">
        <span>
        <?php
        if ($picture=='not_defined_yet' && $gender=='Male')
        {
          echo
          '
            <img src="../images/demo/male.png" alt="'.$full_name.'" style="width:100px;height:120px;float:right; border: 1px solid grey;" />
          ';
        }

        elseif ($picture=='not_defined_yet' && $gender=='Female')
        {
          echo
          '
            <img src="../images/demo/female.png" alt="'.$full_name.'" style="width:100px;height:120px;float:right; border: 1px solid grey;" />
          ';
        }

        elseif ($picture=='not_defined_yet' && $gender=='Others')
        {
          echo
          '
            <img src="../images/demo/others.png" alt="'.$full_name.'" style="width:100px;height:120px;float:right; border: 1px solid grey;" />
          ';
        }

        else
        {
          echo
          '
          <img src="'.$picture.'" alt="'.$full_name.'" style="width:100px;height:120px;float:right;" />
          ';
        }
        ?>
        </span>  
      </div>
    </div>
  
    
    <?php
    while($career_data = mysqli_fetch_assoc($career))
    {
      if (!empty($career_data['objective']))
      {
        ?>
        <div class="cv_heading col-md-12 col-xs-12 mobile-device">
          <h4> Professional Statement </h4>
          
          <div class="text-justify">
            <?php echo $career_data['objective']; ?>
          </div>
        </div>
        <?php
      }
    }

    if (mysqli_num_rows($edu) > 0)
    {
      ?>
      <div class="cv_heading col-md-12 col-xs-12 mobile-device">
        <h4>Academic Qualification</h4>
        <table class="table table-condensed table-bordered custom-bordered">
          <thead>
            <tr>
              <th class="text-bold-600" style="width: 25%">Exam Title</th>
              <th class="text-bold-600" style="width: 10%">Major</th>
              <th class="text-bold-600" style="width: 30%">Institute</th>
              <th class="text-bold-600" style="width: 12%">Result</th>
              <th class="text-bold-600" style="width: 10%">Passing Year</th>
              <th class="text-bold-600" style="width: 13%">Duration (Year's)</th>
            </tr>
          </thead>
          <tbody>
          <?php
          while($edu_data = mysqli_fetch_assoc($edu))
          {
            ?>    
            <tr>
              <td><?php echo $edu_data['degree_title']; ?></td>
              <td><?php echo $edu_data['major_subject']; ?></td>
              <td><?php echo $edu_data['institution']; ?></td>
              <td><?php echo $edu_data['result_achieved']; ?></td>
              <td><?php echo $edu_data['passing_year']; ?></td>
              <td><?php echo $edu_data['duration']; ?></td>
            </tr>  
            <?php
          }
          ?>
          </tbody>
        </table>
      </div>
      <?php
    }

    if (mysqli_num_rows($training) > 0)
    {
      ?>
      <div class="cv_heading col-md-12 col-xs-12 mobile-device">
        <h4>Training/Workshop Summary</h4>
        
        <table  class="table table-condensed table-bordered custom-bordered">
          <thead>
            <tr>
              <th class="text-bold-600">Title</th>
              <th class="text-bold-600">Institution</th>
              <th class="text-bold-600">Duration (Hours)</th>
              <th class="text-bold-600">Start Date</th>
              <th class="text-bold-600">End date</th>
              <th class="text-bold-600">Certification</th>
            </tr>
          </thead>
          <tbody>
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
            <tr>
              <td><?php echo $training_data['training_title']; ?></td>
              <td><?php echo $training_data['institution']; ?></td>
              <td><?php echo $training_data['training_duration']; ?></td>
              <td><?php echo $start_date; ?></td>
              <td><?php echo $end_date; ?></td>
              <td><?php echo $training_data['certification']; ?></td>
            </tr>
          <?php
          }
          ?>
          </tbody>
        </table>
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
        <div class="cv_heading col-md-12 col-xs-12 mobile-device">
          <h4>Technical skills</h4>
          <ul>
            <?php
            for($i=0; $i < sizeof($skills); $i++)
            {
              ?>
              <li><div><?php echo $skills[$i]; ?></div></li>
              <?php
            }
            ?>
          </ul>
        </div>
      <?php
      }
    }

    if (!empty($extr_activities))
    {
      ?>
      <div class="cv_heading col-md-12 col-xs-12 mobile-device">
        <h4> Extracurricular Activities </h4>
        
        <div class="text-justify">
          <?php echo $extr_activities; ?>
        </div>
      </div>
      <?php
    }

    if (mysqli_num_rows($exp) > 0)
    {
    ?>
      <div class="cv_heading col-md-12 col-xs-12 mobile-device">
        <h4>Work Experience</h4>
        <?php
        $exp_i=0;
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

          $exp_i++;
          ?>
            <div style="margin-bottom: 4px">
              <b><?php echo $exp_i.'. '.$exp_data['position_title']; ?></b> <i>(<?php echo $join_date.' to '.$resign_date; ?>)</i>
            </div>
            <ul style="list-style-type:none;">
              <li><strong>Organization:</strong> <?php echo $exp_data['organization_name']; ?></li>
              <li><strong>Job Nature:</strong> <?php echo $exp_data['type_of_employment']; ?></li>
              <li><strong>Job Level:</strong> <?php echo $exp_data['position_level']; ?></li>
              <?php
              if (!empty($exp_data['responsibility_and_achivement']))
              {
                ?>
                <li><strong>Responsibility:</strong> <?php echo $exp_data['responsibility_and_achivement']; ?></li>
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
      <div class="cv_heading col-md-12 col-xs-12 mobile-device">
      <h4>Certifications</h4>
      <?php
      $exp_i=0;
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

        $exp_i++;
        ?>
        <div style="margin-bottom: 4px">
          <b><?php echo $exp_i.'. '.$certi_data['certificate_name']; ?></b>
        </div>
        <ul style="list-style-type:none;">
          <li><strong>Exam Date:</strong> <?php echo $exam_date; ?></li>
          <?php
          if ($expire_date!='00-00-0000')
          {
            ?>
            <li><strong>Expire Date:</strong> <?php echo $expire_date; ?></li>
            <?php
          }

          if (!empty($certi_data['score']))
          {
            ?>
             <div><strong>Score:</strong> <?php echo $certi_data['score']; ?></div>
            <?php
          }

          if (!empty($certi_data['score_scale']))
          {
            ?>
            <li><strong>Score Scale:</strong> <?php echo $certi_data['score_scale']; ?></li>
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

    if (mysqli_num_rows($lan) > 0)
    {
      ?>
      <div class="cv_heading col-md-12 col-xs-12 mobile-device"> 
        <h4>Language Proficiency</h4>
        <table  class="table table-condensed table-bordered custom-bordered">
          <thead>
            <tr>
              <th class="text-bold-600">Language</th>
              <th class="text-bold-600">Reading</th>
              <th class="text-bold-600">Writing</th>
              <th class="text-bold-600">Speaking</th>
            </tr>
          </thead>
          <tbody>
          <?php
          while($lan_data = mysqli_fetch_assoc($lan))
          {
            ?>    
            <tr>
              <td><?php echo $lan_data['language']; ?></td>
              <td><?php echo $lan_data['reading']; ?></td>
              <td><?php echo $lan_data['writing']; ?></td>
              <td><?php echo $lan_data['speaking']; ?></td>
            </tr>
            <?php
          }
          ?>
          </tbody>
        </table>
        </div>
      <?php
      }
    ?>

    <div class="cv_heading col-md-12 col-xs-12 mobile-device">
      <h4>Personal Details</h4>

      <div class="col-xs-5 col-sm-4 col-md-3 text-xs-left text-sm-left text-md-left text-lg-left text-xl-left mobile-device">Name</div>
      <div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">:&nbsp&nbsp <?php echo $full_name; ?></div>
      <div class="clearfix"></div>

      <?php
      if (!empty($father_name))
      {
        ?>
        <div class="col-xs-5 col-sm-4 col-md-3 text-xs-left text-sm-left text-md-left text-lg-left text-xl-left mobile-device">Father's Name</div>
        <div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">:&nbsp&nbsp <?php echo $father_name; ?></div>
        <div class="clearfix"></div>
        <?php
      }

      if (!empty($mother_name))
      {
        ?>
        <div class="col-xs-5 col-sm-4 col-md-3 text-xs-left text-sm-left text-md-left text-lg-left text-xl-left mobile-device">Mother's Name</div>
        <div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">:&nbsp&nbsp <?php echo $mother_name; ?></div>
        <div class="clearfix"></div>
        <?php
      }
      ?>

      <div class="col-xs-5 col-sm-4 col-md-3 text-xs-left text-sm-left text-md-left text-lg-left text-xl-left mobile-device">Date of Birth</div>
      <div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">:&nbsp&nbsp <?php echo $dob; ?></div>
      <div class="clearfix"></div>

      <div class="col-xs-5 col-sm-4 col-md-3 text-xs-left text-sm-left text-md-left text-lg-left text-xl-left mobile-device">Gender</div>
      <div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">:&nbsp&nbsp <?php echo $gender; ?></div>
      <div class="clearfix"></div>

      <?php
      if (!empty($marital_status))
      {
        ?>        
        <div class="col-xs-5 col-sm-4 col-md-3 text-xs-left text-sm-left text-md-left text-lg-left text-xl-left mobile-device">Marital Status</div>
        <div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">:&nbsp&nbsp <?php echo $marital_status; ?></div>
        <div class="clearfix"></div>
        <?php
      }
      ?>

      <div class="col-xs-5 col-sm-4 col-md-3 text-xs-left text-sm-left text-md-left text-lg-left text-xl-left mobile-device">Nationality</div>
      <div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">:&nbsp&nbsp <?php echo $nationality; ?></div>
      <div class="clearfix"></div>

      <?php
      if (!empty($permanent_address))
      {
        ?>        
        <div class="col-xs-5 col-sm-4 col-md-3 text-xs-left text-sm-left text-md-left text-lg-left text-xl-left mobile-device">Permanent Address</div>
        <div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">:&nbsp&nbsp <?php echo $permanent_address; ?></div>
        <div class="clearfix"></div>
        <?php
      }

      if (!empty($present_address))
      {
        ?>        
        <div class="col-xs-5 col-sm-4 col-md-3 text-xs-left text-sm-left text-md-left text-lg-left text-xl-left mobile-device">Present Address</div>
        <div class="col-xs-7 col-sm-7 col-md-8 text-justify mobile-device">:&nbsp&nbsp <?php echo $present_address; ?></div>
        <div class="clearfix"></div>
        <?php
      }
      ?>
    </div>

    
    <?php
    if (mysqli_num_rows($ref) > 0)
    {
      ?>
      <div class="cv_heading col-md-12 col-xs-12 mobile-device">
        <h4 class="text-xs-left text-sm-left text-md-left text-lg-left text-xl-left">References</h4>
        <?php
        $i=1;
        while($ref_data = mysqli_fetch_assoc($ref))
        {
          if ($i==1 || $i==2)
          {
            ?>  
            <div <?php if(mysqli_num_rows($ref)==1){ echo'class="col-md-12 col-xs-12 mobile-device mobile-device"';} else{echo'class="col-md-6 col-xs-6 mobile-device"';} if($i==2){echo 'style="padding-left:10px !important;"';} ?> >
              <table class="table table-condensed table-bordered custom-bordered">
                <?php 
                if(mysqli_num_rows($ref)>1)
                { 
                  ?>
                  <tr>
                    <th style="text-align: center;">
                      <?php if($i==1){echo '<span class="text-bold-600">Reference 1</span>';} else{echo '<span class="text-bold-600">Reference 2</span>';} ?> 
                    </th>
                  </tr>
                  <?php
                }
                ?>
                <tr><td><?php echo $ref_data['ref_person_name']; ?></td></tr>
                <tr><td><?php echo $ref_data['designation']; ?></td></tr>
                <tr><td><?php echo $ref_data['organization_name']; ?></td></tr>
                <tr><td><?php echo $ref_data['mobile']; ?></td></tr>
                <tr><td><?php echo $ref_data['ref_email']; ?></td></tr>
              </table>
            </div>
            <?php
          }
          $i++;
        }
        ?>
      </div>
      <?php
    }
    ?>

    <div class="cv_heading col-md-12 col-xs-12 mobile-device">
      <h4>Declaration</h4>
      
      <div class="text-justify">
        I hereby declare that the above particulars are true and correct to the best of my knowledge and belief and in the event of any information being found false or incorrect, my candidature will be liable to be canceled.
      </div>

      <div class="text-right">
        <span  style="border-bottom: 1px dotted black";><strong>Signature</strong></span>
      </div>

      <br><br>
    </div>

  </div>
</div>

  <!--/############################# END Content Area ###########################-->

<script type="text/javascript">

    $(function(){
      $('#resume_basic_2').froalaEditor({
          toolbarButtons: ['undo', 'redo', '|', 'bold', 'italic', 'underline', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'lineHeight', 'paragraphFormat', 'color', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '|', 'insertHR', 'insertImage', 'insertTable', '|','print', 'getPDF']
        })
    });

</script>

<?php 
  //include 'temp_js.php';
  require 'temp_js.php';
?>