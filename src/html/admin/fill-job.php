<?php
  session_start();
  date_default_timezone_set("America/New_York");
  include('../../private/functions.php');
  include('../../private/db_connection.php');
  if(isset($_GET['jobid'])) { $htmlsafe_jobid = $_GET['jobid']; }
  if(isset($_GET['action'])) { $htmlsafe_action = $_GET['action']; }

  if(isset($htmlsafe_jobid) && is_numeric($htmlsafe_jobid)) {
    $timedate = date("Y-m-d h:i:s");
    $row = find_job_by_id($htmlsafe_jobid);
    fill_job_by_id($htmlsafe_jobid, $htmlsafe_action, $timedate);

    if($htmlsafe_action === 'close'){
      $_SESSION['message'] = "<strong>" . htmlentities(utf8_encode($row['TITLE'])) . "</strong> was filled and all applications archived.";
    } else if ($htmlsafe_action === 'open') {
      $_SESSION['message'] = "<strong>" . htmlentities(utf8_encode($row['TITLE'])) . "</strong> was re-opened and ready to start collecting resumes.";
    }
    echo "<script>window.location=\"/admin/\"</script>";
  } else {
    echo "Job ID not a valid number";
  }

?>
