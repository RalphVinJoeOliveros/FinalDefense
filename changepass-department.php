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
include 'capstone_database.php';
$id = $_POST['userid'];
$query = "SELECT * FROM departments WHERE id = '$id'";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_array($result);
?>
<p class="p-3">Are you sure you want to change <?php echo $row['department'] ?>'s password?</p>
<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="Change" class="btn btn-sm btn-primary">Change</button>
    </div>
</form>