<?php
    session_start();
    if(isset($_SESSION['ID'])) {
      echo "<script>window.location='studentslist.php'; </script>";
      die();
    }elseif(isset($_SESSION['department'])) {
      echo "<script>window.location='department-studentslist.php'; </script>";
      die();
    } elseif(!isset($_SESSION['lrn'])) {
        echo "<script>window.location='index.php'; </script>";
        die();
    }
    unset($_SESSION['lrn']);
    unset($_SESSION['pass']);

    session_destroy();

    echo "<script>alert('Logout completed'); window.location='index.php'; </script>";

?>