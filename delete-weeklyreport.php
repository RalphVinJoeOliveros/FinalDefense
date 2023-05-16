<?php
session_start();
if(isset($_SESSION['email'])) {
  echo "<script>alert('ACCESS DENIED! Only logged in Grade 12 Intern Students can access this page.'); window.location='studentslist.php'; </script>";
  die();
}elseif(isset($_SESSION['department'])) {
  echo "<script>alert('ACCESS DENIED! Only logged in Grade 12 Intern Students can access this page.'); window.location='department-studentslist.php'; </script>";
  die();
} elseif(!isset($_SESSION['lrn'])) {
    echo "<script>alert('ACCESS DENIED! Only logged in Grade 12 Intern Students can access this page.'); window.location='index.php'; </script>";
    die();
}
    $id = $_POST['userid'];
?>
<div id="confirm-delete-modal">
  <p style="padding: 10px;">Are you sure you want to delete this data?</p>
  <form id="delete-form" method="post">
    <input type="hidden" name="id" value='<?php echo $id; ?>'>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      <input type="submit" class="btn btn-primary" value='Delete' name='delete'>
    </div>
  </form>
</div>