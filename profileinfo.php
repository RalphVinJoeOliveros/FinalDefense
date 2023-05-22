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
    include "capstone_database.php";
    include('navigation_bar.php');
    include('resume.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
    .highlight1, .highlight2, .highlight3, .highlight5{
      color: black;
      font-weight: 500;
    }
    </style>
</head>
<body>
    
</body>
</html>