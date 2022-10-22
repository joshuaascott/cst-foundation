<?php
session_start();
if(isset($_GET['jobid']) && is_numeric($_GET['jobid'])) {
    require '../../private/functions.php';
    require '../../private/db_connection.php';
    $jobid = $_GET['jobid'];
    $job = find_job_by_id($jobid);
    $jobExists = is_numeric($job['ID']);

    if(!$jobExists) {
      $jobid = -1;
      $_SESSION['message'] = "Link Invalid. Please check and try again.";
    } else {
      $title = $job['TITLE'];
      $location = $job['LOCATION'];
      $htmlsafe_jobid = htmlentities($job['ID']);
      $htmlsafe_title = htmlentities($title);
      $htmlsafe_location = htmlentities($location);
    }

?>
<!doctype html>
<html lang="en">
  <head>
  <meta name="robots" content="noindex,nofollow"/>
   <title><?php echo "Application Complete for " . $htmlsafe_title . " - " . $htmlsafe_jobid; ?></title>
    <link rel="stylesheet" href="/assets/css/app.css">
  </head>
  <body>
    <div class="wrap">
      <h1>Job Application</h1>
      <p class="callout warning"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="/assets/js/app.js"></script>
  </body>
</html>
<?php
} else {
  echo "There was a problem applying for the position";
}
if(isset($connection)) mysqli_close($connection);
?>
