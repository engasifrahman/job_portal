<?php
        session_start();
        require_once('../dbconfig.php');
        global $con;

        $em_id = $_SESSION['em_info']['id'];
        $post_id=9;
        $js_id_str='2';

    if(!empty($em_id) && !empty($post_id) && !empty($js_id_str))
    {

        $query2 = "SELECT js_id FROM filtered_applied_applicants where em_id='$em_id' AND post_id='$post_id' ORDER BY id ASC";
        if (!$result2 = mysqli_query($con, $query2)) {
            exit(mysqli_error($con));
        }
        if (mysqli_num_rows($result2) > 0)
        {
            while($row = mysqli_fetch_assoc($result2))
            {
                $applied_js[]=$row['js_id'];
            }
        }
        else
        {
            $applied_js=NULL;
        }

        $all_js_id=explode(',', $js_id_str);
        $id_check=0;
        foreach ($all_js_id as $js_id)
        {
            if (!empty($applied_js))
            {
                if (!in_array($js_id, $applied_js))
                {
                    $id_check=1;
                    $last_js_id=$js_id;
                    $final_js_id[]=$js_id.'),';
                }
            }
            else
            {
                $id_check=1;
                $last_js_id=$js_id;
                $final_js_id[]=$js_id.'),';
            }
        }
        

        if (!empty($final_js_id))
        {
            $size=sizeof($final_js_id);
            $final_js_id[$size-1]=$last_js_id.')';

            $query = "INSERT INTO filtered_applied_applicants (em_id,post_id,js_id) 
            ".($id_check == 1 ? 'VALUES ('.$em_id.','.$post_id.','.implode(' ('.$em_id.','.$post_id.',', $final_js_id):'')." ";

            echo $query;
        }
    }
?>