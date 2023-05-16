<?php
    session_start();
    if(isset($_SESSION['lrn'])) {
		echo "<script>window.location='student-landing-page.php'; </script>";
		die();
	  }elseif(isset($_SESSION['department'])) {
		echo "<script>window.location='department-studentslist.php'; </script>";
		die();
	  } elseif(!isset($_SESSION['email'])) {
		  echo "<script>window.location='index.php'; </script>";
		  die();
	  }
    unset($_SESSION['email']);
    unset($_SESSION['pass']);

    session_destroy();
    
    echo "<script>alert('Logout completed'); window.location='landing_page.php'; </script>";

?>