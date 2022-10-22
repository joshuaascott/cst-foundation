<?php
  include('../../private/functions.php');
  include('../../private/db_connection.php');

  $requrl = $_SERVER['REQUEST_URI'];
  $requrl = explode("/", $requrl);
  $jobid = array_pop($requrl);
  $job = find_job_by_id($jobid);
  $jobid = $job['ID'];
  if((isset($jobid)) && (is_numeric($jobid))) {
    $title = $job['TITLE'];
    $description = $job['DESCRIPTION'];
    $jobtype = $job['JOB_TYPE'];
    $location = $job['LOCATION'];
    $responsibility = explode("\n", $job['RESPONSIBILITY']);
    $education = explode("\n", $job['EDUCATION']);
    $experience = explode("\n", $job['EXPERIENCE']);
    $htmlsafe_jobid = htmlentities($jobid ?? '');
    $htmlsafe_title = htmlentities($title ?? '');
    $htmlsafe_description = htmlentities($description ?? '');
    $htmlsafe_jobtype = htmlentities($jobtype ?? '');
    $htmlsafe_location = htmlentities($location ?? '');
    define("PAGETITLE", $title." - ".$jobid);
    define("PAGEAREA", 'careers');
  } else {
    $jobid = -1;
    define("PAGETITLE", "Career Description Error");
    define("PAGEAREA", 'careers');
  }
  include('../../private/header.php');
?>
<!--
          <div class="hero careers">

          </div>
-->
          <?php if($jobid !== -1) {?>
          <main>
            <div class="wrap">
              <div class="row">
                <div class="small-12 columns">
                  <h1><?php echo $htmlsafe_title; ?><br><span><small ><?php echo $htmlsafe_location; ?></small></span></h1>
                  <hr>
                </div>
              </div>
              <div class="row">
                <div class="large-8 columns">
                  <p><?php echo $htmlsafe_description; ?></p>
                <h2>Responsibilities</h2>
                  <ul>
                   <?php
                    $resCount = count($responsibility);
                    for($x = 0; $x < $resCount; $x++) {
                      echo "<li>" . htmlentities($responsibility[$x] ?? '') . "</li>";
                    }
                   ?>
                  </ul>
                <h2>Job Type: </h2>
                  <p><?php echo $htmlsafe_jobtype; ?></p>

                <h2>Required Experience: </h2>
                  <ul>
                   <?php
                    $expCount = count($experience);
                    for($x = 0; $x < $expCount; $x++) {
                      echo "<li>" . htmlentities($experience[$x] ?? '') . "</li>";
                    }
                   ?>
                  </ul>

                <h2>Required Education: </h2>
                  <ul>
                   <?php
                    $eduCount = count($education);
                    for($x = 0; $x < $eduCount; $x++) {
                      echo "<li>" . htmlentities($education[$x] ?? '') . "</li>";
                    }
                   ?>
                  </ul>
                  <div class="row">
                    <div class="large-6 columns">
                      <a class="show-for-large primary large expanded button"  onclick="applyPopUp('<?php echo $htmlsafe_jobid; ?>');"><i class="fi-widget large"></i> Apply</a>
                    </div>
                  </div>
                </div>
                <div class="large-4 columns">
                  <div class="row">
                    <div class="expanded medium-8 large-12 columns">
                      <a class="primary large expanded button" onclick="applyPopUp('<?php echo $htmlsafe_jobid; ?>');"><i class="fi-widget large"></i> Apply</a>
                    </div>
                    <div class="small-12 medium-pull-12 columns">
                      <h2>Benefits</h2>
                        <ul>
                          <li>Medical, Dental and Vision Insurance</li>
                          <li>Basic Life Insurance</li>
                          <li>Accidental Death &amp; Dismemberment Insurance (AD&amp;D)</li>
                          <li>Paid Holidays</li>
                          <li>Paid Time Off</li>
                          <li>401(k) plan with company match</li>
                        </ul>
                        <h2>Employment Info</h2>
                        <p>For additional information on openings and employment with Choisys Technology contact <a href="/contact-us?category=careers">careers@choisystechnology.com</a></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </main>
        <?php } else { ?>
          <main>
            <div class="wrap">
              <div class="callout warning"><i class="fi-info"></i> The Job ID specified is not valid for an open position. Please check your link and try again.</div>
            </div>
          </main>
        <?php } ?>
<?php include('../../private/footer.php'); ?>
