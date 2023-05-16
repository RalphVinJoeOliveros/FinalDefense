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
    include('capstone_database.php');
?>
        <p class="p-3">Are you sure you want to approve this student?</p>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $_POST['userid']; ?>">
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="submit" value="Approve" class="btn btn-sm btn-primary">
    </div>
</form>