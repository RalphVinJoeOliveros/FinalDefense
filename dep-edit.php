<?php
session_start();
if(isset($_SESSION['lrn'])) {
    echo "<script>window.location='student-landing-page.php'; </script>";
    die();
  } elseif(isset($_SESSION['email'])) {
      echo "<script>window.location='studentslist.php'; </script>";
      die();
  } elseif (!isset($_SESSION['department'])) {
    echo "<script>window.location='index.php'; </script>";
    die();
  }
include 'capstone_database.php';
$lrn = $_POST['userid'];
$sql = "SELECT * FROM students WHERE lrn = '$lrn'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
?>
<style>
    .deptable {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 98%;
        border: 1px solid #ddd;
    }
</style>
<br>
<form action="" method="POST">
<table class="deptable" align="center">
    <thead>
        <tr>
            <th>LRN</th>
            <th>Full Name</th>
            <th>Block</th>
            <th>School Year</th>
            <th>Remarks</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <?php echo $row['lrn']; ?>
            </td>
            <td>
                <?php echo $row['fname'] . " " . $row['mname'] . " " . $row['lname']; ?>
            </td>
            <td>
                <?php echo $row['block']; ?>
            </td>
            <td>
                <?php echo $row['schoolyear']; ?>
            </td>
            <td>
                <select name="remarks" id="remarks" class="form-control" required>
                    <?php
                        $remarks = "SELECT * FROM students WHERE lrn = '$lrn'";
                        $existingValue = mysqli_fetch_array(mysqli_query($mysqli, $remarks))['remarks'];
                    ?>
                    <option value="">Select Remarks</option>
                    <option value="Completed" <?php if($existingValue == 'Completed') echo 'selected'; ?>>Completed</option>
                    <option value="On Going" <?php if($existingValue == 'On Going') echo 'selected'; ?>>On Going</option>
                    <option value="Not Yet Started" <?php if($existingValue == 'Not Yet Started') echo 'selected'; ?>>Not Yet Started</option>
                    <option value="Declined" <?php if($existingValue == 'Declined') echo 'selected'; ?>>Declined</option>
            </select>
            </td>
            <input type="hidden" name="lrn" value="<?php echo $lrn; ?>">
        </tr>
    </tbody>
</table>
<br>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <input type="submit" name="update" class="btn btn-primary" value="Update">
</div>