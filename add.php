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
?>
<form action="" method="POST"><br>
            <label for="date_">Date:</label><br>
            <center><input type="date" name="date_" class="form-control" required></center><br>
            <label for="time_in">Time In:</label><br>
            <center><input type="time" name="time_in" class="form-control" required></center><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="add" value="Submit" class="btn btn-primary">
      </div>
</form>