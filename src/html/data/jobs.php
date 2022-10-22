<?php
  header('Content-Type: application/json; charset=utf-8');
  require '../../private/functions.php';
  require '../../private/db_connection.php';
  $jobs = find_all_jobs();
  $totalCount = mysqli_num_rows($jobs);
  echo '[';
  $count = 0;
  while ($row = $jobs->fetch_assoc())
  {
    $location = explode(',',$row['LOCATION']);

    printf(
    '{
      "jobid" : %s,
      "title" : %s,
      "location" : {
        "city": %s,
        "state" : %s,
        "combined" : %s
        },
      "clearance" : %s
      }',
      json_encode($row['ID']),
      json_encode($row['TITLE']),
      json_encode(trim($location[0])),
      json_encode(trim($location[1])),
      json_encode($row['LOCATION']),
      json_encode($row['CLEARANCE']));

      if($count < ($totalCount-1)) echo ', ';
      $count += 1;
  }
  echo ']';
  if(isset($connection)) mysqli_close($connection);
?>
