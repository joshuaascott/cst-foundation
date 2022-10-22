<?php
  session_start();
  date_default_timezone_set("America/New_York");
  include('../../private/functions.php');
  include('../../private/db_connection.php');
  $jobid = $_GET['jobid'];
  $urlsafe_jobid = urlencode($jobid);

  if($_SERVER['REQUEST_METHOD'] === 'GET') {
    unset($_SESSION['last-edit']);

      if(isset($jobid) && is_numeric($jobid)) {
        $job = find_job_by_id($jobid);
        $urlsafe_jobid = urlencode($job['ID']);
        $htmlsafe_jobid = htmlentities($job['ID']);
        $htmlsafe_title = htmlentities($job['TITLE']);
        $htmlsafe_description = htmlentities($job['DESCRIPTION']);
        $htmlsafe_location = htmlentities($job['LOCATION']);
        $htmlsafe_jobstatus = htmlentities($job['JOB_STATUS']);
        $htmlsafe_jobtype = htmlentities($job['JOB_TYPE']);
        $htmlsafe_filled = htmlentities($job['DATE_FILLED']);
        $htmlsafe_clearance = htmlentities($job['CLEARANCE']);
        $htmlsafe_responsibility = htmlentities($job['RESPONSIBILITY']);
        $htmlsafe_education = htmlentities($job['EDUCATION']);
        $htmlsafe_experience = htmlentities($job['EXPERIENCE']);
      } else {
        $_SESSION['message'] = "The job you attempted to update has an invalid job id";
        echo "<script>window.location=\"/admin/\"</script>";
      }
  } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_SESSION['last-edit'])) {
      // check for double submissions/post
      echo "<script>window.location=\"/admin/details-job.php?jobid={$urlsafe_jobid}\"</script>";
    } else {
      $errors = array();

      // set posted variables

      $htmlsafe_filled = $_POST['filled'];
      if($htmlsafe_filled === 'true') {
        $htmlsafe_filled = date("Y-m-d h:i:s");
      } else {
        $htmlsafe_filled = NULL;
      }

      $urlsafe_jobid = urlencode($_POST['jobid']);
      $htmlsafe_jobid = $_POST['jobid'];
      $htmlsafe_title = $_POST['title'];
      $htmlsafe_description = $_POST['description'];
      $htmlsafe_location = $_POST['location'];
      $htmlsafe_jobstatus = $_POST['jobstatus'];
      $htmlsafe_jobtype = $_POST['jobtype'];
      $htmlsafe_clearance = $_POST['clearance'];
      $htmlsafe_responsibility = $_POST['responsibility'];
      $htmlsafe_education = $_POST['education'];
      $htmlsafe_experience = $_POST['experience'];

      // check for errors on each field

      if ($htmlsafe_title === "") {
        $errors['errTitleEmpty'] = "Title must not be blank";
      } else if (strlen($htmlsafe_title) < 5) {
        $errors['errTitleShort'] = "Title must be at least 5 characters";
      } else if (strlen($htmlsafe_title) > 50) {
        $errors['errTitleLong'] = "Title must be less than 50 characters"; }

      if ($htmlsafe_description === "") {
        $errors['errDescEmpty'] = "Description must not be blank";
      } else if (strlen($htmlsafe_description) < 50) {
        $errors['errDescShort'] = "Description must be at least 50 characters";
      } else if (strlen($htmlsafe_description) > 2000) {
        $errors['errDescLong'] = "Description must be less than 2000 characters"; }

      if ($htmlsafe_location === "") {
        $errors['errLocEmpty'] = "Location must not be blank";
      } else if (strlen($htmlsafe_location) < 10) {
        $errors['errLocShort'] = "Location must be at least 10 characters";
      } else if (strlen($htmlsafe_location) > 50) {
        $errors['errLocLong'] = "Location must be less than 50 characters"; }

      if ($htmlsafe_responsibility === "") {
        $errors['errResEmpty'] = "Responsibilities must not be blank";
      } else if (strlen($htmlsafe_responsibility) < 50) {
        $errors['errResShort'] = "Responsibilities must be at least 50 characters";
      } else if (strlen($htmlsafe_responsibility) > 2000) {
        $errors['errResLong'] = "Responsibilities must be less than 2000 characters"; }

      if ($htmlsafe_experience === "") {
        $errors['errExpEmpty'] = "Experience must not be blank";
      } else if (strlen($htmlsafe_experience) < 50) {
        $errors['errExpShort'] = "Experience must be at least 50 characters";
      } else if (strlen($htmlsafe_education) > 2000) {
        $errors['errEduLong'] = "Education must be less than 2000 characters"; }

      if ($htmlsafe_education === "") {
        $errors['errEduEmpty'] = "Education must not be blank";
      } else if (strlen($htmlsafe_education) < 50) {
        $errors['errEduShort'] = "Education must be at least 50 characters";
      } else if (strlen($htmlsafe_experience) > 2000) {
        $errors['errExpLong'] = "Experience must be less than 2000 characters"; }

      // if any errors
      if(count($errors) !== 0) {

        // process for each field
        if(isset($errors['errTitleEmpty']) or isset($errors['errTitleShort']) or isset($errors['errTitleLong'])) { $errTitle = "error";}
        if(isset($errors['errDescEmpty']) or isset($errors['errDescShort']) or isset($errors['errDescLong'])) { $errDesc = "error";}
        if(isset($errors['errLocEmpty']) or isset($errors['errLocShort']) or isset($errors['errLocLong'])) { $errLoc = "error";}
        if(isset($errors['errResEmpty']) or isset($errors['errResShort']) or isset($errors['errResLong'])) { $errRes = "error";}
        if(isset($errors['errExpEmpty']) or isset($errors['errExpShort']) or isset($errors['errExpLong'])) { $errExp = "error";}
        if(isset($errors['errEduEmpty']) or isset($errors['errEduShort']) or isset($errors['errEduLong'])) { $errEdu = "error";}

        // set the message to show their are errors
        $_SESSION['message'] = "There are errors on the form: <br>";

      } else {
        // set the token before updating the database
        $string = uniqid();
        $_SESSION['last-edit'] = md5($string);

        // update the database
        update_job_by_id($htmlsafe_jobid, $htmlsafe_title, $htmlsafe_description, $htmlsafe_location, $htmlsafe_jobstatus,
            $htmlsafe_jobtype, $htmlsafe_clearance, $htmlsafe_responsibility, $htmlsafe_education, $htmlsafe_experience, $htmlsafe_filled);

        // send the user back to the main admin page
        $_SESSION['message'] = "Successfully updated record<br>";
        echo "<script>window.location=\"/admin/details-job.php?jobid={$urlsafe_jobid}\"</script>";
      }
    }

  } else {
    echo "<script>window.location=\"/admin/\"</script>";
  }

  define("PAGETITLE", "Edit Job");
  define("PAGEAREA", "admin");
  $admin = true;
  include('../../private/header.php');
?>
    <main>
      <div class="wrap">
        <h1>Edit Job</h1>
        <?php
          if(isset($_SESSION['message'])) {
            echo "<div class=\"callout warning\">";
            echo "<p>" . $_SESSION['message'] . "</p>";
            if(isset($errors)) {
              if(count($errors) !== 0 ) {
                echo "<p><ul style=\"color: red;\">";
                foreach ($errors as $key => $value) {
                  echo "<li>" . $value . "</li>";
                }
                echo "</ul></p>";
              }
            }
            echo "</div>";
            unset($_SESSION['message']);
          }
        ?>
        <form method="post">
          <label for="title">Job Title</label>
          <input type="text" name="title" id="title" value="<?php echo $htmlsafe_title; ?>"<?php if(isset($errTitle)) { echo " class=\"is-invalid-input\"";}?>>
          <label for="location">Location</label>
          <input type="text" name="location" id="location" value="<?php echo $htmlsafe_location; ?>"<?php if(isset($errLoc)) { echo " class=\"is-invalid-input\"";}?>>
          <label for="description">Description</label>
          <textarea name="description" id="description" rows="8" maxlength="2000"<?php if(isset($errDesc)) { echo " class=\"is-invalid-input\"";}?>><?php echo $htmlsafe_description; ?></textarea>
          <label for="jobtype">Job Type</label>
          <select name="jobtype" id="jobtype">
            <option value="Full Time"<?php if($htmlsafe_jobtype === "Full Time") { echo " selected"; }?>>Full Time</option>
            <option value="Part Time"<?php if($htmlsafe_jobtype === "Part Time") { echo " selected"; }?>>Part Time</option>
          </select>
          <label for="jobstatus">Job Status</label>
          <select name="jobstatus" id="jobstatus">
            <option value="Funded"<?php if($htmlsafe_jobstatus === "Funded") { echo " selected"; }?>>Funded</option>
            <option value="Contingent"<?php if($htmlsafe_jobstatus === "Contingent") { echo " selected"; }?>>Contingent</option>
          </select>
          <label for="clearance">Clearance</label>
          <select name="clearance" id="clearance">
            <option value="None"<?php if($htmlsafe_clearance === "None") { echo " selected"; }?>>None</option>
            <option value="Public Trust"<?php if($htmlsafe_clearance === "Public Trust") { echo " selected"; }?>>Public Trust</option>
            <option value="Secret"<?php if($htmlsafe_clearance === "Secret") { echo " selected"; }?>>Secret</option>
            <option value="Top Secret"<?php if($htmlsafe_clearance === "Top Secret") { echo " selected"; }?>>Top Secret</option>
          </select>
          <fieldset>
            <input type="radio" id="notfilled" name="filled" value="false"<?php if($htmlsafe_filled === "") { echo " checked"; } ?>><label for="notfilled">Open</label>
            <input type="radio" id="filled" name="filled" value="true"<?php if($htmlsafe_filled !== "") { echo " checked"; } ?>><label for="filled">Closed </label>
          </fieldset>
          <div class="callout secondary">Enter one line per bullet. <strong>Shift + Enter</strong> for new line.</div>
          <label for="responsibility">Responsibilities</label>
          <textarea name="responsibility" id="responsibility" rows="8" maxlength="2000"<?php if(isset($errRes)) { echo " class=\"is-invalid-input\"";}?>><?php echo $htmlsafe_responsibility; ?></textarea>
          <label for="experience">Experience</label>
          <textarea name="experience" id="experience" rows="8" maxlength="2000"<?php if(isset($errExp)) { echo " class=\"is-invalid-input\"";}?>><?php echo $htmlsafe_experience; ?></textarea>
          <label for="education">Education</label>
          <textarea name="education" id="education" rows="5" maxlength="2000"<?php if(isset($errEdu)) { echo " class=\"is-invalid-input\"";}?>><?php echo $htmlsafe_education; ?></textarea>
          <input type="hidden" name="jobid" id="jobid" value="<?php echo $htmlsafe_jobid; ?>">
          <button class="primary large button" type="submit" name="submit" id="submit"><i class="fi-widget"></i> Update Job</button> &nbsp;
          <a class="primary large button" href="/admin/"><i class="fi-rewind"></i> Go Back</a>
        </form>
      </div>
    </main>
<?php
     $ignore_analytics = true;
     include('../../private/footer.php');
?>
