<?php
  session_start();
  date_default_timezone_set("America/New_York");
  include('../../private/functions.php');
  include('../../private/db_connection.php');
  $jobid = $_GET['jobid'];

  if(isset($jobid) && is_numeric($jobid)) {
    $job = copy_job_by_id($jobid);
    $row = find_job_by_id($jobid);
    $_SESSION['message'] = "<strong>" . htmlentities(utf8_encode($row['TITLE'])) . "</strong> copied and ready to update.";
    echo "<script>window.location=\"/admin/edit-job.php?jobid={$job}\"</script>";
  }

?>
