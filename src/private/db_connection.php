<?php
  # Use for Local Development
  define("DB_HOST", getenv("MYSQL_HOST"));
  define("DB_USER", getenv("MYSQL_USER"));
  define("DB_PASS", getenv("MYSQL_PASSWORD"));
  define("DB_NAME", getenv("MYSQL_DATABASE"));

  # Use for Production Development
	// define("DB_SERVER", "localhost");
	// define("DB_USER", "cst");
	// define("DB_PASS", "password");
	// define("DB_NAME", "cst");

  // Create a database connection
  $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " .  mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
  }
?>
