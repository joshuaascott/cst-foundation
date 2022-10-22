<?php
  session_start();
  include('../../private/functions.php');
  include('../../private/db_connection.php');
  $jobid = $_GET['jobid'];

  if(isset($jobid) && is_numeric($jobid)) {
    $job = find_job_by_id($jobid);
    $apps = find_all_apps_by_id($jobid);
    $appsOld = find_all_apps_by_id($jobid);
    $appsTotal = mysqli_num_rows($apps);

    $responsibility = explode("\n", $job['RESPONSIBILITY']);
    $education = explode("\n", $job['EDUCATION']);
    $experience = explode("\n", $job['EXPERIENCE']);

    $htmlsafe_title = htmlentities($job['TITLE'] ?? '');
    $htmlsafe_description = htmlentities($job['DESCRIPTION'] ?? '');
    $htmlsafe_location = htmlentities($job['LOCATION'] ?? '');
    $htmlsafe_jobtype = htmlentities($job['JOB_TYPE'] ?? '');
    $htmlsafe_jobstatus = htmlentities($job['JOB_STATUS'] ?? '');
    $htmlsafe_clearance = htmlentities($job['CLEARANCE'] ?? '');
    $htmlsafe_filled = htmlentities($job['DATE_FILLED'] ?? '');
  }

  if(isset($_POST['submit'])) $message = "You have submitted the form at least once.";

  define("PAGETITLE", "Job Details");
  define("PAGEAREA", "admin");
  $admin = true;
  include('../../private/header.php');
?>
    <main>
      <div class="wrap">
        <h1>Job Details</h1>
        <?php
          if(isset($_SESSION['message'])) {
            echo "<div class=\"callout warning\"><p>" . $_SESSION['message'] . "</p></div>";
            unset($_SESSION['message']);
          }
        ?>
         <table>
           <tr>
             <td>Job Title:</td>
             <td><?php echo $htmlsafe_title; ?></td>
           </tr>
           <tr>
             <td>Description:</td>
             <td><?php echo $htmlsafe_description; ?></td>
           </tr>
           <tr>
             <td>Location:</td>
             <td><?php echo $htmlsafe_location; ?></td>
           </tr>
           <tr>
             <td>Job Type:</td>
             <td><?php echo $htmlsafe_jobtype; ?></td>
           </tr>
           <tr>
             <td>Job Status:</td>
             <td><?php echo $htmlsafe_jobstatus; ?></td>
           </tr>
           <tr>
             <td>Clearance:</td>
             <td><?php echo $htmlsafe_clearance; ?></td>
           </tr>
           <tr>
             <td>Filled:</td>
             <td><?php echo $htmlsafe_filled; ?></td>
           </tr>
           <tr>
             <td>Responsibilities:</td>
             <td><?php
                    $resCount = count($responsibility);
                    for($x = 0; $x < $resCount; $x++) {
                      echo "<li>" . htmlentities($responsibility[$x]) . "</li>";
                    }
                   ?>
             </td>
           </tr>
           <tr>
             <td>Experience:</td>
             <td><?php
                    $expCount = count($experience);
                    for($x = 0; $x < $expCount; $x++) {
                      echo "<li>" . htmlentities($experience[$x]) . "</li>";
                    }
                  ?>
             </td>
           </tr>
           <tr>
             <td>Education:</td>
             <td><?php
                    $eduCount = count($education);
                    for($x = 0; $x < $eduCount; $x++) {
                      echo "<li>" . htmlentities($education[$x]) . "</li>";
                    }
                  ?>
             </td>
           </tr>
          </table>
          <a href="copy-job.php?jobid=<?php echo $jobid; ?>" class="primary large button"><i class="fi-page-copy"></i> Copy Job</a>  &nbsp;
          <a href="edit-job.php?jobid=<?php echo $jobid; ?>" class="primary large button"><i class="fi-widget"></i> Update Job</a> &nbsp;
          <a href="fill-job.php?jobid=<?php echo $jobid; ?>&action=<?php if($htmlsafe_filled === "") { echo "close"; } else { echo "open"; } ?>" class="primary large button"><i class="fi-x"></i> <?php if($htmlsafe_filled === "") { echo "Close"; } else { echo "Open"; }?> Job</a> &nbsp;
          <a href="delete-job.php?jobid=<?php echo $jobid; ?>" class="primary large button"><i class="fi-trash"></i> Delete Job</a> &nbsp;
          <a class="primary large button" href="/admin/" ><i class="fi-rewind"></i> Go Back</a>
        <hr>
        <div class="applicants">
          <h2 id="applications">Applicants - New</h2>
          <table>
            <tr>
              <th width="35%">Email</th>
              <th>Date Applied</th>
              <th>Resume</th>
            </tr>
            <?php
              $appCount = 0;
              if(is_numeric($appsTotal)) {
                  while ($row = $apps->fetch_assoc()) {
                    $archive = $row['ARCHIVE'];
                    if($archive !== '1') {
                      $urlsafe_email = urlencode($row['EMAIL'] ?? '');
                      $urlsafe_resume = urlencode($row['RESUME'] ?? '');
                      $htmlsafe_email = htmlentities($row['EMAIL'] ?? '');
                      $htmlsafe_resume = htmlentities($row['RESUME'] ?? '');
                      $htmlsafe_date_applied = htmlentities($row['DATE_APPLIED'] ?? '');
            ?>
            <tr>
              <td><?php echo "<a href=\"mailto:" . $urlsafe_email . "\">" . $htmlsafe_email . "</a>"; ?></td>
              <td><?php echo $htmlsafe_date_applied; ?></td>
              <td><?php echo "<a href=\"view-resume.php?resume=" . $urlsafe_resume . "\" target=\"_blank\">" . $htmlsafe_resume . "</a>"; ?></td>
            </tr>
            <?php   $appCount = $appCount + 1;
                  }
                }
              } else { ?>
              <tr>
                <td colspan="3">There are no new applicants for this position.</td>
              </tr>
            <?php } if($appCount === 0) { ?>
              <tr>
                <td colspan="3">There are no new applicants for this position.</td>
              </tr>
            <?php } ?>
          </table>
          <h2>Applicants - Archived</h2>
          <table>
            <tr>
              <th width="35%">Email</th>
              <th>Date Applied</th>
              <th>Resume</th>
            </tr>
            <?php
                $archCount = 0;
                if(is_numeric($appsTotal)) {
                  while ($row = $appsOld->fetch_assoc()) {
                    $archive = $row['ARCHIVE'];
                    if($archive === '1') {
                      $urlsafe_email = urlencode($row['EMAIL']);
                      $urlsafe_resume = urlencode($row['RESUME']);
                      $htmlsafe_email = htmlentities($row['EMAIL']);
                      $htmlsafe_resume = htmlentities($row['RESUME']);
                      $htmlsafe_date_applied = htmlentities($row['DATE_APPLIED']);
            ?>
            <tr>
              <td><?php echo "<a href=\"mailto:" . $urlsafe_email . "\">" . $htmlsafe_email . "</a>"; ?></td>
              <td><?php echo $htmlsafe_date_applied; ?></td>
              <td><?php echo "<a href=\"view-resume.php?resume=" . $urlsafe_resume . "\" target=\"_blank\">" . $htmlsafe_resume . "</a>"; ?></td>
            </tr>
            <?php   $archCount = $archCount + 1;
                    }
                  }
                } else { ?>
              <tr>
                <td colspan="3">There are no archived applicants for this position.</td>
              </tr>
            <?php }  if ($archCount === 0) { ?>
              <tr>
                <td colspan="3">There are no archived applicants for this position.</td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </main>
<?php
     $ignore_analytics = true;
     include('../../private/footer.php');
?>
