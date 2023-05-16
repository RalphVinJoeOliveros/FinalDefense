<?php 
session_start();
if(isset($_SESSION['email'])) {
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
$id = $_POST['userid'];
?>
<div id="confirm-delete-modal">
  <p style="padding: 10px; color: gray;">Are you sure you want to delete this data?</p>
  <form id="delete-form" method="post">
    <input type="hidden" name="id" value='<?php echo $id; ?>'>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      <input type="submit" class="btn btn-primary" value='Delete' name='delete'>
    </div>
  </form>
</div>
