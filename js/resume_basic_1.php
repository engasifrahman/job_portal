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
  body {
    width: 100% !important;
    font-size: 14px !important;
    background-color: white !important;
  }
  ol, ul, dl {
    margin-top: 0;
    margin-bottom: 0rem !important;
  }
</style>

<div class="col-md-12 col-xs-12">

  <div id="resume_basic" class="col-md-12 col-xs-12 mobile-device">
    <div class="col-md-12 col-xs-12 mobile-device mb-1">
      <?php
      while($per_data = mysqli_fetch_assoc($per))
      {
        $picture            =$per_data['pic_dir'];
        $full_name          =$per_data['full_name'];
        $father_name        =$per_data['father_name'];
        $mother_name        =$per_data['mother_name'];
        $gender             =$per_data['gender'];
        $marital_status     =$per_data['marital_status'];
        $nationality        =$per_data['nationality'];
        $permanent_address  =$per_data['permanent_address'];
        $present_address    =$per_data['present_address'];
        $mobile_number      =$per_data['mobile_number'];
        $email              =$per_data['email'];

        list($y, $m, $d)  = explode('-', $per_data['dob']);
        $dob=$d;
        $dob.='-'.$m;
        $dob.='-'.$y;
      }
      ?>
      
      <div style="float:left; width:60%; text-align:left; margin-top:15px;">
        <h3 style="color:#3BAFDA !important; text-transform: uppercase;"><?php echo $full_name; ?></h3>

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

        <div><b>Mobile:</b> <?php echo $mobile_number; ?></div>
        <div><strong>Email:</strong> <?php echo $email; ?></div>
      </div>

      <div style="float:right; width:40%; text-align:right; margin-top: 5px">
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
      </div> 
    </div>
    
    <?php
    while($career_data = mysqli_fetch_assoc($career))
    {
      if (!empty($career_data['objective']))
      {
        ?>
        <div style="width:100%; text-align:left; margin-top:15px; clear: both;">
          <h4 style="color:black; font-weight: bold; padding: 2px; background-color:#E6E6E6;"> Professional Statement </h4>
          
          <p style="text-align:justify;">
            <?php echo $career_data['objective']; ?>
          </p>
        </div>
        <?php
      }
    }

    if (mysqli_num_rows($edu) > 0)
    {
      ?>
      <div style="width:100%; text-align:left; margin-top:15px; clear: both;">
        <h4 style="color:black; font-weight: bold; padding: 2px; background-color:#E6E6E6;">Academic Qualification</h4>
        <table style="border-collapse: collapse; width: 100%; margin:20px 0px 0px 0px;">
          <thead>
            <tr>
              <th class="text-bold-600 bg-white" style="width:25%; border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Exam Title</th>
              <th class="text-bold-600 bg-white" style="width:10%; border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Major</th>
              <th class="text-bold-600 bg-white" style="width:30%; border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Institute</th>
              <th class="text-bold-600 bg-white" style="width:12%; border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Result</th>
              <th class="text-bold-600 bg-white" style="width:10%; border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Passing Year</th>
              <th class="text-bold-600 bg-white" style="width:13%; border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Duration (Year's)</th>
            </tr>
          </thead>
          <tbody>
          <?php
          while($edu_data = mysqli_fetch_assoc($edu))
          {
          ?>    
            <tr>
              <td style=" border: 1px solid #ddd; padding: 8px; width:"><?php echo $edu_data['degree_title']; ?></td>
              <td style=" border: 1px solid #ddd; padding: 8px;"><?php echo $edu_data['major_subject']; ?></td>
              <td style=" border: 1px solid #ddd; padding: 8px;"><?php echo $edu_data['institution']; ?></td>
              <td style=" border: 1px solid #ddd; padding: 8px;"><?php if($edu_data['result_system']=='Grade'){ echo $edu_data['result_achieved'].' out of '.$edu_data['grade_scale'];} elseif($edu_data['result_system']=='Class'){echo $edu_data['result_achieved'].' Class';} else{echo $edu_data['result_achieved'].' Division';} ?></td>
              <td style=" border: 1px solid #ddd; padding: 8px;"><?php echo $edu_data['passing_year']; ?></td>
              <td style=" border: 1px solid #ddd; padding: 8px;"><?php echo $edu_data['duration']; ?></td>
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
      <div style="width:100%; text-align:left; margin-top:15px; clear: both; box-sizing: border-box;">
        <h4 style="color:black; font-weight: bold; padding: 2px; background-color:#E6E6E6;">Training/Workshop Summary</h4>
        
        <table style="border-collapse: collapse; width: 100%; margin:20px 0px 0px 0px;">
          <thead>
            <tr>
              <th class="text-bold-600 bg-white" style=" border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Title</th>
              <th class="text-bold-600 bg-white" style=" border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Institution</th>
              <th class="text-bold-600 bg-white" style=" border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Duration (Hours)</th>
              <th class="text-bold-600 bg-white" style=" border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Start Date</th>
              <th class="text-bold-600 bg-white" style=" border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">End date</th>
              <th class="text-bold-600 bg-white" style=" border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Certification</th>
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
            <td style=" border: 1px solid #ddd; padding: 8px;"><?php echo $training_data['training_title']; ?></td>
            <td style=" border: 1px solid #ddd; padding: 8px;"><?php echo $training_data['institution']; ?></td>
            <td style=" border: 1px solid #ddd; padding: 8px;"><?php echo $training_data['training_duration']; ?></td>
            <td style=" border: 1px solid #ddd; padding: 8px; padding-right: 2px;"><?php echo $start_date; ?></td>
            <td style=" border: 1px solid #ddd; padding: 8px; padding-right: 2px;"><?php echo $end_date; ?></td>
            <td style=" border: 1px solid #ddd; padding: 8px;"><?php echo $training_data['certification']; ?></td>
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
        <div style="width:100%; text-align:left; margin-top:15px; clear: both;">
          <h4 style="color:black; font-weight: bold; padding: 2px; background-color:#E6E6E6;">Technical skills</h4>
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
      <div style="width:100%; text-align:left; margin-top:15px; clear: both;">
        <h4 style="color:black; font-weight: bold; padding: 2px; background-color:#E6E6E6;"> Extracurricular Activities </h4>
        
        <p style="text-align:justify;">
          <?php echo $extr_activities; ?>
        </p>
      </div>
      <?php
    }

    if (mysqli_num_rows($exp) > 0)
    {
      ?>
      <div  style="width:100%; text-align:left; margin-top:15px; clear: both;">
        <h4 style="color:black; font-weight: bold; padding: 2px; background-color:#E6E6E6;">Work Experience</h4>
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
          <div style="margin-top: 10px;">
            <div>
                <b><?php echo $exp_i.'. '.$exp_data['position_title']; ?></b>
                <i>(<?php echo $join_date.' to '.$resign_date; ?>)</i>
            </div>
            <div style="text-indent: 20px;"><strong>Organization:</strong> <?php echo $exp_data['organization_name']; ?></div>
            <div style="text-indent: 20px;"><strong>Job Nature:</strong> <?php echo $exp_data['type_of_employment']; ?></div>
            <div style="text-indent: 20px;"><strong>Job Level:</strong> <?php echo $exp_data['position_level']; ?></div>
            <?php
            if (!empty($exp_data['responsibility_and_achivement']))
            {
              ?>
              <div style="text-indent: 20px;"><strong>Responsibility:</strong> <?php echo $exp_data['responsibility_and_achivement']; ?></div>
              <?php
            }
            ?>
          </div>
          <?php
 
        }
        ?>
      </div>
      <?php
    }

    if (mysqli_num_rows($certi) > 0)
    {
      ?>
      <div style="width:100%; text-align:left; margin-top:15px; clear: both;">
        <h4 style="color:black; font-weight: bold; padding: 2px; background-color:#E6E6E6;">Certifications</h4>
        <?php
        $certi_i=0;
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

          $certi_i++;
          ?>
          <div style="margin-top: 10px;">
            <div>
              <b><?php echo $certi_i.'. '.$certi_data['certificate_name']; ?></b>
            </div>
            <div style="text-indent: 20px;"><strong>Exam Date:</strong> <?php echo $exam_date; ?></div>
            <?php
            if ($expire_date!='00-00-0000')
            {
              ?>
              <div style="text-indent: 20px;"><strong>Expire Date:</strong> <?php echo $expire_date; ?></div>
              <?php
            }

            if (!empty($certi_data['score']))
            {
              ?>
               <div style="text-indent: 20px;"><strong>Score:</strong> <?php echo $certi_data['score']; ?></div>
              <?php
            }

            if (!empty($certi_data['score_scale']))
            {
              ?>
              <div style="text-indent: 20px;"><strong>Score Scale:</strong> <?php echo $certi_data['score_scale']; ?></div>
              <?php
            }
            ?>
          </div>
          <?php
        }
        ?>
      </div>
      <?php
    }

    if (mysqli_num_rows($lan) > 0)
    {
      ?>
      <div style="width:100%; text-align:left; margin-top:15px; clear: both;">
        <h4 style="color:black; font-weight: bold; padding: 2px; background-color:#E6E6E6;">Language Proficiency</h4>
        <table   style=" border-collapse: collapse; width: 100%; margin:20px 0px 0px 0px;">
          <thead>
            <tr>
              <th class="text-bold-600 bg-white" style=" border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Language</th>
              <th class="text-bold-600 bg-white" style=" border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Reading</th>
              <th class="text-bold-600 bg-white" style=" border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Writing</th>
              <th class="text-bold-600 bg-white" style=" border: 1px solid #ddd; padding: 8px;padding-top: 12px; padding-bottom: 12px; text-align: left;">Speaking</th>
            </tr>
          </thead>
          <tbody>
          <?php
          while($lan_data = mysqli_fetch_assoc($lan))
          {
          ?>    
            <tr>
              <td style=" border: 1px solid #ddd; padding: 8px;"><?php echo $lan_data['language']; ?></td>
              <td style=" border: 1px solid #ddd; padding: 8px;"><?php echo $lan_data['reading']; ?></td>
              <td style=" border: 1px solid #ddd; padding: 8px;"><?php echo $lan_data['writing']; ?></td>
              <td style=" border: 1px solid #ddd; padding: 8px;"><?php echo $lan_data['speaking']; ?></td>
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

    <div  style="width:100%; text-align:left; margin-top:15px; margin-bottom:-20px; padding-bottom:-20px; clear: both;">
      <h4 style="color:black; font-weight: bold; padding: 2px; background-color:#E6E6E6;">Personal Details</h4>

        <div style="width:20%; float: left">Name</div>
        <div style="width:5%; float: left">:</div>
        <div style="width:75%; float: left"><?php echo $full_name; ?></div>
        <?php
        if (!empty($father_name))
        {
          ?>        
          <div style="width:20%; float: left">Father's Name</div>
          <div style="width:5%; float: left">:</div>
          <div style="width:75%; float: left"><?php echo $father_name; ?></div>
          <?php
        }
        ?>

        <?php
        if (!empty($mother_name))
        {
          ?>        
          <div style="width:20%; float: left">Mother's Name</div>
          <div style="width:5%; float: left">:</div>
          <div  style="width:75%; float: left"><?php echo $mother_name; ?></div>
          <?php
        }
        ?>

        <div style="width:20%; float: left">Date of Birth</div>
        <div style="width:5%; float: left">:</div>
        <div style="width:75%; float: left"><?php echo $dob; ?></div>

        <div  style="width:20%; float: left">Gender</div>
        <div style="width:5%; float: left">:</div>
        <div style="width:75%; float: left"><?php echo $gender; ?></div>
        <?php
        if (!empty($marital_status))
        {
          ?>        
          <div style="width:20%; float: left">Marital Status</div>
          <div style="width:5%; float: left">:</div>
          <div style="width:75%; float: left"><?php echo $marital_status; ?></div>
          <?php
        }
        ?>

        <div style="width:20%; float: left">Nationality</div>
        <div style="width:5%; float: left">:</div>
        <div style="width:75%; float: left"><?php echo $nationality; ?></div>
        <?php
        if (!empty($permanent_address))
        {
          ?>        
          <div style="width:20%; float: left">Permanent Address</div>
          <div style="width:5%; float: left">:</div>
          <div style="width:75%; float: left"><?php echo $permanent_address; ?></div>
          <?php
        }
        ?>

        <?php
        if (!empty($present_address))
        {
          ?>        
          <div style="width:20%; float: left">Present Address</div>
          <div style="width:5%; float: left">:</div>
          <div style="width:75%; float: left"><?php echo $present_address; ?></div>
          <?php
        }
        ?>
        <div style="clear: both"></div>
        <?php
        ?>
    </div> 
    
    <?php
    if (mysqli_num_rows($ref) > 0)
    {
      ?>
      <div style="width:100%; text-align:left; margin-top:15px; margin-bottom:-20px; padding-bottom:-20px; clear: both;">
        <h4 style="color:black; font-weight: bold; padding: 2px; background-color:#E6E6E6;">References</h4>

        <div  style="width:100%; margin-bottom: 10px">

          <div class="text-bold-600 bg-white" style="width: 20%; float: left;">#</div>
          <div style="width: 5%; float: left;"></div>
          <div style="width: 70%; float: left;">
            <div class="text-bold-600 bg-white" style="width: 50%; float: left; border-bottom: 1px solid #ddd;">Reference 1</div>
            <div class="text-bold-600 bg-white" style="width: 46%; float: right; border-bottom: 1px solid #ddd;">Reference 2</div>
          </div>
          
        </div>

        <div style="width:100%;">

          <div style="width: 20%; float: left;">
            <div>Name</div>
            <div>Designation</div>
            <div>Organization</div>
            <div>Mobile</div>
            <div>Email</div>
          </div>

          <div style="width: 5%; float: left;">
            <div>:</div>
            <div>:</div>
            <div>:</div>
            <div>:</div>
            <div>:</div>
          </div>

          <div style="width: 75%; float: left;">
            <?php
            $ref_i=1;
            while($ref_data = mysqli_fetch_assoc($ref))
            {
              if ($ref_i==1)
              {
                ?>
                <div style="width: 50%; float: left;">
                  <div><?php echo $ref_data['ref_person_name']; ?></div>
                  <div><?php echo $ref_data['designation']; ?></div>
                  <div><?php echo $ref_data['organization_name']; ?></div>
                  <div><?php echo $ref_data['mobile']; ?></div>
                  <div><?php echo $ref_data['ref_email']; ?></div>
                </div>
                <?php
              }
              if ($ref_i == 2)
              {
                ?>

                  <div style="width: 50%; float: right;">
                    <div style="border-right: 1px solid #ddd; height: 100px; float: left"></div>
                    <div><?php echo '&nbsp;'.$ref_data['ref_person_name']; ?></div>
                    <div><?php echo '&nbsp;'.$ref_data['designation']; ?></div>
                    <div><?php echo '&nbsp;'.$ref_data['organization_name']; ?></div>
                    <div><?php echo '&nbsp;'.$ref_data['mobile']; ?></div>
                    <div><?php echo '&nbsp;'.$ref_data['ref_email']; ?></div>
                  </div>
                <?php
              }
              $ref_i++;
            }
            ?>
          </div>
          <div style="clear: both"></div>
        </div>
      </div>
      <?php
    }
    ?>

    <div style="width:100%; text-align:left; margin-top:15px; clear: both;">
      <h4 style="color:black; font-weight: bold; padding: 2px; background-color:#E6E6E6;">Declaration</h4>
      
      <div style="text-align: justify;">
        I hereby declare that the above particulars are true and correct to the best of my knowledge and belief and in the event of any information being found false or incorrect, my candidature will be liable to be canceled.
      </div>

      <div style="float: right;">
        <span  style="border-bottom: 1px dotted black";><strong>Signature</strong></span>
      </div>

      <br><br>
    </div>
    
  </div>
</div>

<!--/############################# END Content Area ###########################-->

<script type="text/javascript">

    $(function(){
      $('#resume_basic').froalaEditor({
          toolbarButtons: ['undo', 'redo', '|', 'bold', 'italic', 'underline', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'lineHeight', 'paragraphFormat', 'color', '|', 'align', 'formatOL', 'formatUL', 'outdent', 'indent', '|', 'insertHR', 'insertImage', 'insertTable', '|','print', 'getPDF']
        })
    });

</script>

<?php 
  //include 'temp_js.php';
  require 'temp_js.php';
?>