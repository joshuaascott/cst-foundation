<?php
  if(isset($_GET['resume'])) {
    $resume = $_GET['resume'];
    $tmp=explode('.',$resume);
    $file_ext=strtolower(end($tmp));
    $file_type="text/plain";
    switch($file_ext) {
      case "rtf": $file_type="application/rtf"; break;
      case "doc": $file_type="application/msword"; break;
      case "docx": $file_type="application/vnd.openxmlformats-officedocument.wordprocessingml.document"; break;
      case "pdf": $file_type="application/pdf"; break;
      case "txt": $file_type="text/plain"; break;
      default: $file_type="unknown";
    }
    $content_type="Content-Type: " . $file_type;
    $filepath="../../uploads/" . $resume;
    if(($file_type!=="unknown") && (file_exists($filepath))) {
      header($content_type);
      readfile($filepath);
    } else {
      if(empty($resume)) {
        echo "You must specify a resume to read it from the server.";
      } elseif($file_type==="unknown") {
        echo "Unknown file type " . $file_ext;
      } elseif(!file_exists($filepath)) {
        echo "The file your looking for " . $resume . " does not exists";
      } else {
        echo "There was an error with your link.";
      }
    }
  } else {
    echo "There was no file specified.";
  }
?>
