<?php
  session_start();
  date_default_timezone_set("America/New_York");
  include('../../private/functions.php');
  include('../../private/db_connection.php');
  $jobid = $_GET['jobid'];

  if(isset($jobid) && is_numeric($jobid) && ($_SERVER['REQUEST_METHOD'] === 'GET')) {
    $job = find_job_by_id($jobid);
    $message = "Are you sure you want to delete <strong>" . $job['TITLE'] . "</strong>? ";
    $message .= "It will also remove <strong>all</strong> job applications for this job.";
  }

  if(isset($_POST['submit'])) {
    // get info from db
    $job = find_job_by_id($jobid);
    $htmlsafe_title = htmlentities(utf8_encode($job['TITLE']));

    // delete the job from db
    delete_job_by_id($_POST['jobid']);

    // set the message text
    $_SESSION['message'] = "The job <strong>" . $htmlsafe_title . " - " . $jobid . "</strong> was deleted.";

    // redirect the page back to the list
    echo "<script>window.location=\"/admin/\"</script>";
  }

  define("PAGETITLE", "Edit Job");
  define("PAGEAREA", "admin");
  $admin = true;
  include('../../private/header.php');
?>
    <main>
      <div class="wrap">
        <h1>Delete Job</h1>
        <?php if(isset($message)) echo "<div class=\"callout warning\">" . $message . "</div>"; ?>
        <form method="post">
         <table>
           <tr>
             <td>Job Title:</td>
             <td><?php echo $job['TITLE']; ?></td>
           </tr>
           <tr>
             <td>Location:</td>
             <td><?php echo $job['LOCATION']; ?></td>
           </tr>
           <tr>
             <td>Date Created:</td>
             <td><?php echo $job['DATE_CREATED']; ?></td>
           </tr>
          </table>
          <input type="hidden" name="jobid" id="jobid" value="<?php echo $jobid; ?>">
          <button class="primary large button" type="submit" name="submit" id="submit"><i class="fi-trash"></i> Delete Job</button>
          <button class="primary large button" type="button" name="back" onclick="window.history.back();"><i class="fi-rewind"></i> Go Back</button>
        </form>
      </div>
    </main>
<?php
     $ignore_analytics = true;
     include('../../private/footer.php');
?>
