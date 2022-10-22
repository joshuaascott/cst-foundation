<?php
  session_start();
  date_default_timezone_set("America/New_York");

  if(isset($_GET['jobid']) && is_numeric($_GET['jobid'])) {
    require '../../private/functions.php';
    require '../../private/db_connection.php';
    $jobid = $_GET['jobid'];
    $job = find_job_by_id($jobid);
    $jobExists = is_numeric($job['ID']);

    if(!$jobExists) {
      $jobid = -1;
      $page_msg = "Link Invalid. Please check and try again.";
    } else {
      $title = $job['TITLE'];
      $location = $job['LOCATION'];
      $htmlsafe_jobid = htmlentities($job['ID'] ?? '');
      $htmlsafe_title = htmlentities($title ?? '');
      $htmlsafe_location = htmlentities($location ?? '');

      if(isset($_FILES['resume'])){
        $errors= array();
        $email = $_POST['email'];
        $file_name = $_FILES['resume']['name'];
        $file_size =$_FILES['resume']['size'];
        $file_tmp =$_FILES['resume']['tmp_name'];
        $file_type=$_FILES['resume']['type'];
        $tmp=explode('.',$_FILES['resume']['name']);
        $file_ext=strtolower(end($tmp));
        $new_file_name = $jobid . "-" . date("YmdHis") . "." . $file_ext;

        $extensions= array("doc","docx","rtf", "txt","pdf");

        if(in_array($file_ext,$extensions)=== false){
           $errors[]="Extension not allowed, please choose a doc, docx, txt, rtf, or pdf file.";
        }

        if($file_size > 4194304){
           $errors[]='File size must not exceed 4 MB.';
        }

        if(empty($errors)==true){
          move_uploaded_file($file_tmp,"../../uploads/".$new_file_name);
          $page_msg = "Application successful.";

          # Careers Message
          $filelink = "http://cst.joshux.website/admin/view-resume.php?resume=" . $new_file_name;
          $message = "There is a new submission for the following req:\r\n\r\n";
          $message .= "Job ID:    " . $jobid . "\r\n\r\n";
          $message .= "Job REQ:   " . $title . "\r\n\r\n";
          $message .= "Applicant: " . $email . "\r\n\r\n";
          $message .= "Resume: " . $filelink;
          $subject = "Application for " . $title . " (" . $jobid . ")";
          $toaddress = "careers@cst.joshux.website";
          mail($toaddress, $subject, $message);

          # Applicant Message
          $app_message = $email . ",\r\n\r\n";
          $app_message .= "Thanks for taking the time to apply for our position. ";
          $app_message .= "We appreciate your interest in Choisys Technology.\r\n\r\n";
          $app_message .= "Job ID:    " . $jobid . "\r\n\r\n";
          $app_message .= "Job REQ:   " . $title . "\r\n\r\n";
          $app_message .= "Applicant: " . $email . "\r\n\r\n";
          $app_message .= "UNFORTUNATELY, THIS IS ONLY A DEMO OF MY EARLIER DESIGN\r\n\r\n";
          $app_message .= "Thank you,\r\n";
          $app_message .= "Joshua Scott";
          mail($email, $subject, $app_message);

          create_new_application($jobid, $email, $new_file_name);
          $_SESSION['message'] = "You have successfully applied for the position <br><strong>";
          $_SESSION['message'] .= $htmlsafe_title . "</strong> in <strong>" . $htmlsafe_location . "</strong>.";
          if(isset($connection)) mysqli_close($connection);
          echo "<script>window.location=\"/careers/{$jobid}/apply/thanks\"</script>";
        } else{
          $page_msg = print_r($errors);
        }
      }
    }
  } else {
    $jobid = -1;
    $page_msg = "Link invalid. Please check and try again.";
  }
?>
<!doctype html>
<html lang="en">
  <head>
  <meta name="robots" content="noindex,nofollow"/>
   <title><?php echo $htmlsafe_title; ?> Application</title>
    <link rel="stylesheet" href="/assets/css/app.css">
    <script>
      function FormVerification() {
        var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        var email = document.getElementById("email").value;
        var emailValid = pattern.test(email);
        var jobid = <?php echo $jobid; ?>;
        var resume = document.getElementById("resume").files.length;
        if((jobid !== 0) && (emailValid) && (resume === 1)) {
          $("#submit").removeClass("disabled").removeClass("hide");
        } else {
          $("#submit").addClass("disabled").addClass("hide");
        }
      }
    </script>
  </head>
  <body>
    <div class="wrap">
    <h1>Job Application</h1>
    <?php
      if(!empty($page_msg)) {
        echo "<p class=\"callout warning\"><i class=\"fi-info\"></i> $page_msg</p>";
      }

      if($jobid !== -1) {
    ?>
    <p><span>Job ID:</span> <?php echo $jobid; ?></p>
    <p><span>Job Title:</span> <?php echo $htmlsafe_title; ?></p>
    <p><span>Location:</span> <?php echo $htmlsafe_location; ?></p>
    <form method="POST" enctype="multipart/form-data" id="applyForm" onchange="FormVerification();">
      <input type="hidden" name="jobid" value="<?php echo $htmlsafe_jobid; ?>" id="jobid">
      <label>Email: <input type="email" name="email" id="email" required autofocus></label>
      <label>Resume: <input type="file" name="resume" id="resume" required></label>
      <button class="primary large button disabled hide" type="submit" name="submit" id="submit">
      <span aria-hidden="true"><i class="fi-check"></i></span>Apply</button>
    </form>
    <button class="close-button" aria-label="Close modal" type="button" onclick="window.close();">
    <span aria-hidden="true">&times;</span></button>
    </div>
    <?php } ?>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="/assets/js/app.js"></script>
  </body>
</html>
<?php if(isset($connection)) mysqli_close($connection); ?>
