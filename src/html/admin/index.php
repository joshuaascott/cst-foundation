<?php
  session_start();
  include('../../private/functions.php');
  include('../../private/db_connection.php');
  if(isset($_GET['sort'])) {
    $sort = $_GET['sort'];
  } else {
    $sort = "title";
  }
  if(isset($_GET['all'])) {
    if($_GET['all'] === "false") {
      $all = "false";
      $ALL = FALSE;
    } else {
      $all = "true";
      $ALL = TRUE;
    }
  } else {
    $all = "true";
    $ALL = TRUE;
  }
  $jobs = find_all_jobs($ALL, $sort);

  $totalAll = mysqli_num_rows($jobs);

  define("PAGETITLE", "Admin Home");
  define("PAGEAREA", "admin");
  $admin = true;
  include('../../private/header.php');
?>
  <main>
    <div class="wrap">
     <h1>Jobs</h1>
      <p><?php echo $totalAll; ?> jobs found.</p>
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
      <p><a href="index.php?all=<?php if($all === "true") { echo "false"; } else { echo "true"; } ?>&sort=<?php echo $sort; ?>" class="button primary large">View <?php if($all === "true") { echo "Open"; } else { echo "All"; } ?></a>
      <a href="add-job.php" class="button primary large float-right"><i class="fi-plus"></i> Add New</a></p>
       <table>
        <tr>
         <th><a href="index.php?all=<?php echo $all;?>&sort=id">Job ID<?php if(isset($_GET['sort']) and ($_GET['sort'] === 'id')) { echo " <i class=\"fi-arrow-down\"></i>"; } ?></a></th>
          <th><a href="index.php?all=<?php echo $all;?>&sort=title">Title<?php if(isset($_GET['sort']) and ($_GET['sort'] === 'title')) { echo " <i class=\"fi-arrow-down\"></i>"; } ?></a></th>
          <th><a href="index.php?all=<?php echo $all;?>&sort=loc">Location<?php if(isset($_GET['sort']) and ($_GET['sort'] === 'loc')) { echo " <i class=\"fi-arrow-down\"></i>"; } ?></a></th>
          <th><a href="index.php?all=<?php echo $all;?>&sort=status">Status<?php if(isset($_GET['sort']) and ($_GET['sort'] === 'status')) { echo " <i class=\"fi-arrow-down\"></i>"; } ?></a></th>
          <th class="text-center"><a href="index.php?all=<?php echo $all;?>&sort=total">Applicants<?php if(isset($_GET['sort']) and ($_GET['sort'] === 'total')) { echo " <i class=\"fi-arrow-down\"></i>"; } ?></a></th>
         <th class="text-center">Actions</th>
        </tr>
        <?php
        while ($row = $jobs->fetch_assoc())
        {
          $htmlsafe_jobid = htmlentities($row['ID']);
          $htmlsafe_title = htmlentities($row['TITLE']);
          $htmlsafe_location = htmlentities($row['LOCATION']);
          $htmlsafe_filled = htmlentities($row['DATE_FILLED'] ?? '');
          if($htmlsafe_filled === "") { $htmlsafe_filled = "Open"; } else { $htmlsafe_filled = "Closed"; }
          $htmlsafe_total = htmlentities($row['TOTAL']);
         ?>
        <tr>
          <td><?php echo $htmlsafe_jobid; ?></td>
          <td><?php echo "<a href=\"details-job.php?jobid=" . $htmlsafe_jobid . "\">" . $htmlsafe_title . "</a>"; ?></td>
          <td><?php echo $htmlsafe_location; ?></td>
          <td><?php echo $htmlsafe_filled; ?></td>
          <td class="text-center"><a href="details-job.php?jobid=<?php echo $htmlsafe_jobid; ?>#applications"><?php echo $htmlsafe_total; ?></a></td>
          <td class="text-center"><a href="copy-job.php?jobid=<?php echo $htmlsafe_jobid; ?>"><i class="fi-page-copy" style="font-size: 2.0rem;"></i> </a>  &nbsp;
              <a href="edit-job.php?jobid=<?php echo $htmlsafe_jobid; ?>"><i class="fi-widget" style="font-size: 2.0rem;"></i> </a> &nbsp;

              <a href="delete-job.php?jobid=<?php echo $htmlsafe_jobid; ?>"><i class="fi-trash" style="font-size: 2.0rem;"></i> </a> </td>
        </tr>
        <?php } ?>
        </table>
       </div>
    </main>
<?php
    $ignore_analytics = true;
    include('../../private/footer.php');
?>
