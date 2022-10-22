<?php

	function redirect_to($new_location) {
	  header("Location: " . $new_location);
	  exit;
	}

	function moved_to($new_location) {
    header('HTTP/1.1 301 Moved Permanently');
	  header("Location: " . $new_location);
	  exit;
	}

	function mysql_prep($string) {
		global $connection;

		$escaped_string = mysqli_real_escape_string($connection, $string);
		return $escaped_string;
	}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

	function find_all_jobs($open=false, $sort="title") {
		global $connection;

        $query = "SELECT j.*, COUNT(a.email) AS TOTAL ";
        $query .= "FROM jobreqs AS j ";
        $query .= "LEFT JOIN applications AS a ";
        $query .= "ON j.id=a.jobreq_id ";
        if ($open===false) {
          $query .= "WHERE date_filled IS NULL ";
        }
        $query .= "GROUP BY j.id ";
        if ($sort==="title") { $query .= "ORDER BY j.title"; }
        else if ($sort==="loc") { $query .= "ORDER BY j.location"; }
        else if ($sort==="status") { $query .= "ORDER BY j.date_filled, j.title"; }
        else if ($sort==="total") { $query .= "ORDER BY TOTAL DESC"; }
        else if ($sort==="id") { $query .= "ORDER BY j.id"; }
        else { $query .= "ORDER BY j.title"; }
        $job_set = mysqli_query($connection, $query);
		confirm_query($job_set);
		return $job_set;
        return $query;
	}

	function find_job_by_id($job_id) {
		global $connection;

		$safe_job_id = mysqli_real_escape_string($connection, $job_id);

		$query  = "SELECT * ";
		$query .= "FROM jobreqs ";
		$query .= "WHERE id = {$safe_job_id} ";
		$job_set = mysqli_query($connection, $query);
		confirm_query($job_set);
		if($job = mysqli_fetch_assoc($job_set)) {
			return $job;
		} else {
			return null;
		}
	}

	function find_all_apps_by_id($job_id) {
		global $connection;

		$safe_job_id = mysqli_real_escape_string($connection, $job_id);

		$query  = "SELECT * ";
		$query .= "FROM applications ";
		$query .= "WHERE jobreq_id = {$safe_job_id} ";
		$apps_set = mysqli_query($connection, $query);
        confirm_query($apps_set);
		return $apps_set;
	}


	function find_all_applicants() {
		global $connection;

		$query  = "SELECT * ";
		$query .= "FROM applications ";

		$applicants_set = mysqli_query($connection, $query);
		confirm_query($applicants_set);
		return $applicants_set;
	}

	function find_applicant_by_id_and_email($job_id, $email) {
		global $connection;

		$safe_job_id = mysqli_real_escape_string($connection, $job_id);
		$safe_email = mysqli_real_escape_string($connection, $email);

		$query  = "SELECT * ";
		$query .= "FROM applications ";
		$query .= "WHERE jobreq_id = {$safe_job_id} and email = '{$safe_email}'";

		$applicant_set = mysqli_query($connection, $query);
		confirm_query($applicant_set);
		return $applicant_set;
	}

	function create_new_application($job_id, $email, $resume) {
		global $connection;

		$safe_job_id = mysqli_real_escape_string($connection, $job_id);
        $safe_email = mysqli_real_escape_string($connection, $email);
        $safe_resume = mysqli_real_escape_string($connection, $resume);

		$query  = "INSERT INTO applications(jobreq_id, email, resume) ";
		$query .= "VALUES({$safe_job_id}, '{$safe_email}', '{$safe_resume}')";

		$applicant_set = mysqli_query($connection, $query);
		confirm_query($applicant_set);
	}

    function create_new_job($title, $description, $location, $job_status, $job_type, $clearance, $responsibility, $education, $experience) {
      global $connection;

      $safe_title = str_replace("'","’", $title);
      $safe_description = str_replace("'","’", $description);
      $safe_location = str_replace("'","’", $location);
      $safe_job_status = str_replace("'","’", $job_status);
      $safe_job_type = str_replace("'","’", $job_type);
      $safe_clearance = str_replace("'","’", $clearance);
      $safe_responsibility = str_replace("'","’", $responsibility);
      $safe_experience = str_replace("'","’", $experience);
      $safe_education = str_replace("'","’", $education);

      $safe_title = mysqli_real_escape_string($connection, $safe_title);
      $safe_description = mysqli_real_escape_string($connection, $safe_description);
      $safe_location = mysqli_real_escape_string($connection, $safe_location);
      $safe_job_status = mysqli_real_escape_string($connection, $safe_job_status);
      $safe_job_type = mysqli_real_escape_string($connection, $safe_job_type);
      $safe_clearance = mysqli_real_escape_string($connection, $safe_clearance);
      $safe_responsibility = mysqli_real_escape_string($connection, $safe_responsibility);
      $safe_education = mysqli_real_escape_string($connection, $safe_education);
      $safe_experience = mysqli_real_escape_string($connection, $safe_experience);

      $query = "INSERT INTO jobreqs(title, description, location, job_status, job_type, ";
      $query .= "clearance, responsibility, education, experience)";
      $query .= " VALUES('{$safe_title}','{$safe_description}','{$safe_location}',";
      $query .= "'{$safe_job_status}','{$safe_job_type}','{$safe_clearance}',";
      $query .= "'{$safe_responsibility}','{$safe_education}','{$safe_experience}')";

      $job_set = mysqli_query($connection, $query);
      confirm_query($job_set);
      return $connection->insert_id;
    }

    function update_job_by_id($jobid, $title, $description, $location, $job_status, $job_type, $clearance, $responsibility, $education, $experience, $date_filled=null) {
      global $connection;

      $safe_title = str_replace("'","’", $title);
      $safe_description = str_replace("'","’", $description);
      $safe_location = str_replace("'","’", $location);
      $safe_job_status = str_replace("'","’", $job_status);
      $safe_job_type = str_replace("'","’", $job_type);
      $safe_clearance = str_replace("'","’", $clearance);
      $safe_responsibility = str_replace("'","’", $responsibility);
      $safe_experience = str_replace("'","’", $experience);
      $safe_education = str_replace("'","’", $education);

      $safe_jobid = mysqli_real_escape_string($connection, $jobid);
      $safe_title = mysqli_real_escape_string($connection, $safe_title);
      $safe_description = mysqli_real_escape_string($connection, $safe_description);
      $safe_location = mysqli_real_escape_string($connection, $safe_location);
      $safe_job_status = mysqli_real_escape_string($connection, $safe_job_status);
      $safe_job_type = mysqli_real_escape_string($connection, $safe_job_type);
      $safe_clearance = mysqli_real_escape_string($connection, $safe_clearance);
      $safe_responsibility = mysqli_real_escape_string($connection, $safe_responsibility);
      $safe_education = mysqli_real_escape_string($connection, $safe_education);
      $safe_experience = mysqli_real_escape_string($connection, $safe_experience);
      $safe_date_filled = mysqli_real_escape_string($connection, $date_filled);
      if($safe_date_filled==="") { $safe_date_filled = "NULL"; } else { $safe_date_filled = "'{$safe_date_filled}'"; }

      $query = "UPDATE jobreqs set title='{$safe_title}', description='{$safe_description}',";
      $query .= " location='{$safe_location}', job_status='{$safe_job_status}', job_type=";
      $query .= "'{$safe_job_type}',clearance='{$safe_clearance}', responsibility=";
      $query .= "'{$safe_responsibility}', education='{$safe_education}', experience=";
      $query .= "'{$safe_experience}', date_filled={$safe_date_filled}";
      $query .= " WHERE id={$safe_jobid}";

      $job_set = mysqli_query($connection, $query);
      confirm_query($job_set);

      $safe_date_filled = str_replace("'","",$safe_date_filled);

      if($safe_date_filled !== "NULL") {
        fill_job_by_id($jobid, "close", $safe_date_filled,);
      }
    }

    function fill_job_by_id($jobid, $action, $timedate="") {
      global $connection;

      $safe_jobid = mysqli_real_escape_string($connection, $jobid);
      $safe_timedate = mysqli_real_escape_string($connection, $timedate);

      if($action === "open") {
        $safe_date_filled = "NULL";
      } else if ($action === "close") {
        $safe_date_filled = "'{$safe_timedate}'";
      } else {
        return "Not a valid action.";
      }

      $query1 = "UPDATE jobreqs set date_filled={$safe_date_filled} ";
      $query1 .= "WHERE id={$safe_jobid}";
      $job_set = mysqli_query($connection, $query1);
      confirm_query($job_set);

      if($action === "close") {
        $query2 = "UPDATE applications set archive=1 ";
        $query2 .= "WHERE jobreq_id={$safe_jobid}";
        $app_set = mysqli_query($connection, $query2);
        confirm_query($app_set);
      }
    }

    function copy_job_by_id($jobid) {
      global $connection;

      $safe_job_id = mysqli_real_escape_string($connection, $jobid);

      $query = "INSERT INTO jobreqs(title, description, location, job_status, job_type, ";
      $query .= "clearance, responsibility, education, experience) ";
      $query .= "SELECT title, description, location, job_status, job_type, clearance, ";
      $query .= "responsibility, education, experience FROM jobreqs WHERE id={$safe_job_id}";

      $job_set = mysqli_query($connection, $query);
      confirm_query($job_set);
      return $connection->insert_id;
    }

    function delete_job_by_id($jobid) {
      global $connection;

      $safe_job_id = mysqli_real_escape_string($connection, $jobid);

      $query = "DELETE from jobreqs WHERE id={$safe_job_id}";

      $job_set = mysqli_query($connection, $query);
      confirm_query($job_set);

    }

    function create_new_message($name, $email, $category, $message) {
      global $connection;

      $safe_name = str_replace("'","’", $name);
      $safe_email = str_replace("'","’", $email);
      $safe_category = str_replace("'","’", $category);
      $safe_message = str_replace("'","’", $message);

      $safe_name = mysqli_real_escape_string($connection, $safe_name);
      $safe_email = mysqli_real_escape_string($connection, $safe_email);
      $safe_category = mysqli_real_escape_string($connection, $safe_category);
      $safe_message = mysqli_real_escape_string($connection, $safe_message);

      $query = "INSERT INTO messages(name, email, category, message)";
      $query .= " VALUES('{$safe_name}','{$safe_email}','{$safe_category}',";
      $query .= "'{$safe_message}')";

      $message_set = mysqli_query($connection, $query);
      confirm_query($message_set);
      return $connection->insert_id;
    }
?>
