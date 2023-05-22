<?php
session_start();
if(isset($_SESSION['lrn'])) {
    echo "<script>window.location='student-landing-page.php'; </script>";
    die();
  }elseif(isset($_SESSION['department'])) {
    echo "<script>window.location='department-studentslist.php'; </script>";
    die();
  } elseif(!isset($_SESSION['ID'])) {
      echo "<script>window.location='index.php'; </script>";
      die();
  }
include "capstone_database.php";
    $id = $_POST['userid'];
    $sql = "SELECT * FROM student_block WHERE student_block = '$id'";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p class="p-3">Are you sure you want to delete Block <?php echo $row['student_block'] ?>?</p>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $_POST['userid']; ?>">
<div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      <input type="submit" class="btn btn-primary" value='Delete' name='delete'>
    </div>
</form>