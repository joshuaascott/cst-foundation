<?php
  header('Content-Type: application/json; charset=usf-8');
  if(is_numeric($_GET['jobid'])) {
    require '../../private/functions.php';
    require '../../private/db_connection.php';
    $job = find_job_by_id($_GET['jobid']);
    $jobExists = is_numeric($job['ID']);

    if($jobExists) {
      $location = explode(',',$job['LOCATION']);

      printf(
      '[{
        "jobid" : %s,
        "title" : %s,
        "location" : {
          "city": %s,
          "state" : %s,
          "combined" : %s
          },
        "clearance" : %s,
        "jobtype" : %s,
        "description" : %s,
        "responsibility" : %s,
        "experience" : %s,
        "education" : %s
        }]',
        json_encode($job['ID']),
        json_encode($job['TITLE']),
        json_encode(trim($location[0])),
        json_encode(trim($location[1])),
        json_encode($job['LOCATION']),
        json_encode(utf8_encode($job['CLEARANCE'])),
        json_encode(utf8_encode($job['JOB_TYPE'])),
        json_encode(utf8_encode($job['DESCRIPTION'])),
        json_encode(utf8_encode($job['RESPONSIBILITY'])),
        json_encode(utf8_encode($job['EXPERIENCE'])),
        json_encode(utf8_encode($job['EDUCATION'])));
    }
  }
  if(isset($connection)) mysqli_close($connection);
?>
