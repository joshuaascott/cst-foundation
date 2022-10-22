<?php
  header('Content-Type: application/json; charset=utf-8');
  if(isset($_GET['jobid']) && is_numeric($_GET['jobid'])
     && isset($_GET['email']) && filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
    require '../../private/functions.php';
    require '../../private/db_connection.php';
    $applicants = find_applicant_by_id_and_email($_GET['jobid'], $_GET['email']);
    $totalCount = mysqli_num_rows($applicants) + 0;
    printf('{ "count" : "%d" }', $totalCount);
  }
  if(isset($connection)) mysqli_close($connection);
?>
