<?php
session_start();
date_default_timezone_set("America/New_York");
include('../private/functions.php');
include('../private/db_connection.php');

if($_SERVER['REQUEST_METHOD'] === 'GET') {
  unset($_SESSION['last-add']);

  // set empty variables for the get
  $htmlsafe_name = "";
  $htmlsafe_email = "";
  $htmlsafe_category = htmlentities($_GET['category'] ?? '');
  $htmlsafe_message = "";

} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(isset($_SESSION['last-add'])) {
    // check for double submissions/post
    echo "STOP ???";
    // echo "<script>window.location=\"/admin/details-job.php?jobid={$urlsafe_jobid}\"</script>";
  } else {
    $errors = array();
    $category = array(
      "info"=>"General Information",
      "careers"=>"Careers",
      "contracts"=>"Contracts",
      "partner"=>"Partnering with us",
      "website"=>"Website/Technical Issues"
    );

    // set posted variables
    $htmlsafe_name = htmlentities(utf8_encode($_POST['name']) ?? '');
    $htmlsafe_email = htmlentities(utf8_encode($_POST['email']) ?? '');
    $htmlsafe_category = htmlentities(utf8_encode($_POST['category']) ?? '');
    $htmlsafe_message = htmlentities(utf8_encode($_POST['message']) ?? '');

    // check for errors on each field
    if ($htmlsafe_name === "") {
      $errors['errNameEmpty'] = "Name must not be blank";
    } else if (strlen($htmlsafe_name) < 5) {
      $errors['errNameShort'] = "Name must be at least 5 characters";
    } else if (strlen($htmlsafe_name) > 50) {
      $errors['errNameLong'] = "Name must be less than 50 characters"; }

    $email_pattern = "/^[a-zA-Z0-9_.]+@[a-zA-Z0-9_.]+?\.[a-zA-Z]{2,30}$/";
    if ($htmlsafe_email === "") {
      $errors['errEmailEmpty'] = "Email must not be blank";
    } else if (preg_match($email_pattern, $htmlsafe_email) == 0) {
      $errors['errEmailInvalid'] = "Email must be valid format"; }

    if ($htmlsafe_category === "") {
        $errors['errCategoryEmpty'] = "Category must not be blank"; }

    if ($htmlsafe_message === "") {
      $errors['errMessageEmpty'] = "Message must not be blank";
    } else if (strlen($htmlsafe_message) < 10) {
      $errors['errMessageShort'] = "Name must be at least 10 characters";
    } else if (strlen($htmlsafe_message) > 2000) {
      $errors['errMessageLong'] = "Message must be less than 2000 characters"; }

    // if any errors
    if(count($errors) !== 0) {

      // process for each field
      if(isset($errors['errNameEmpty']) or isset($errors['errNameShort']) or isset($errors['errNameLong'])) { $errName = "error";}
      if(isset($errors['errEmailEmpty']) or isset($errors['errEmailInvalid'])) { $errEmail = "error";}
      if(isset($errors['errCategoryEmpty'])) { $errCategory = "error";}
      if(isset($errors['errMessageEmpty']) or isset($errors['errMessageShort']) or isset($errors['errMessageLong'])) { $errMessage = "error";}

      // set the message to show their are errors
      $_SESSION['message'] = "There are errors on the form: <br>";

    } else {

      // update the database
    $newmsgid = create_new_message($htmlsafe_name, $htmlsafe_email, $htmlsafe_category, $htmlsafe_message);

      if(is_numeric($newmsgid)) {
        $_SESSION['message'] = "Thank you <strong>" . $htmlsafe_name . "</strong> your message was sent to <strong>" . $category[$htmlsafe_category] . "</strong>";

        // set the token before updating the database
        $string = uniqid();
        $_SESSION['last-add'] = md5($string);

        # Response Message
        $mail_message = "The following message was sent:\r\n\r\n";
        $mail_message .= "Name:      " . $htmlsafe_name . "\r\n\r\n";
        $mail_message .= "Email:     " . $htmlsafe_email . "\r\n\r\n";
        $mail_message .= "Category:  " . $category[$htmlsafe_category] . "\r\n\r\n";
        $mail_message .= "Message: \r\n" . $htmlsafe_message . "\r\n\r\n";
        $mail_message .= "UNFORTUNATELY, THIS IS ONLY A DEMO OF MY EARLIER DESIGN\r\n\r\n";
        $subject = "Message sent to " . $category[$htmlsafe_category];
        mail($htmlsafe_email, $subject, $mail_message);

        # Clear the Form Values
        $htmlsafe_name = "";
        $htmlsafe_email = "";
        $htmlsafe_category = htmlentities($_GET['category'] ?? '');
        $htmlsafe_message = "";
      } else {
        $_SESSION['message'] = "The message could not be sent. Correct errors and resubmit.";
      }
    }
  }
}

  // Start of Page

  if($_SERVER['REQUEST_URI'] === '/contact-us.php') { moved_to('/contact-us'); }
  define("PAGETITLE", "Contact us");
  define("PAGEAREA", "contact-us");
  include('../private/header.php');

?>
  <main>
    <div class="wrap">
      <div class="row columns">
        <h1>Contact us</h1>
        <hr>
        <div class="row">
          <div class="small-12 columns">
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
              <label for="title">Name</label>
              <input type="text" name="name" id="name" value="<?php echo $htmlsafe_name; ?>"<?php if(isset($errName)) { echo " class=\"is-invalid-input\"";}?>>
              <label for="email">Email</label>
              <input type="email" name="email" id="email" value="<?php echo $htmlsafe_email; ?>"<?php if(isset($errEmail)) { echo " class=\"is-invalid-input\"";}?>>
              <label for="category">Subject</label>
              <select name="category" id="category"<?php if(isset($errCategory)) { echo " class=\"is-invalid-input\"";}?>>
                <option value="">--- Select Category ---</option>
                <option value="info"<?php if($htmlsafe_category === "info") { echo " selected"; }?>>General Information</option>
                <option value="careers"<?php if($htmlsafe_category === "careers") { echo " selected"; }?>>Careers</option>
                <option value="contracts"<?php if($htmlsafe_category === "contracts") { echo " selected"; }?>>Contracts</option>
                <option value="partner"<?php if($htmlsafe_category === "partner") { echo " selected"; }?>>Partnering with us</option>
                <option value="website"<?php if($htmlsafe_category === "website") { echo " selected"; }?>>Website/Technical Issue</option>
              </select>
              <label for="message">Message</label>
              <textarea name="message" id="message" rows="5" maxlength="2000"<?php if(isset($errMessage)) { echo " class=\"is-invalid-input\"";}?>><?php echo $htmlsafe_message; ?></textarea>
              <button class="primary large button" type="submit" name="submit" id="submit"><i class="fi-mail"></i> Send Message</button> &nbsp;
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
<?php include('../private/footer.php'); ?>
