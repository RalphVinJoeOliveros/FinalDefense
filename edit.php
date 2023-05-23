<?php
session_start();
    if(isset($_SESSION['ID'])) {
        echo "<script>window.location='studentslist.php'; </script>";
        die();
      } elseif(isset($_SESSION['lrn'])) {
          echo "<script>window.location='student-landing-page.php'; </script>";
          die();
      } elseif (!isset($_SESSION['department'])) {
        echo "<script>window.location='index.php'; </script>";
        die();
      }
?>
<br><br>
<style>
    table{
        width: 600px;
    }
    th{
        padding: 10px;
        height: 50px;
        color: black;
        text-align: left;
    }
    td{
        padding: 10px;
        height: 50px;
        color: black;
    }
</style>
<?php
include 'capstone_database.php';
$id = $_POST['userid'];

$sequel = "SELECT * FROM dtr WHERE `id` = '$id'";
$query = mysqli_query($mysqli, $sequel);
$row = mysqli_fetch_array($query);
?>

<form method="POST">
  <table border='1' align='center'>
    <tr>
      <th>Date:</th>
      <th>Time In:</th>
      <th>Time Out:</th>
      <th>Total Hours:</th>
      <th>Remarks:</th>
    </tr>
    <tr>
      <td><?php echo date_format(date_create($row['date_']), 'F d, Y l'); ?></td>
      <td><?php echo date_format(date_create($row['time_in']), 'h:i A'); ?></td>
      <td><?php echo date_format(date_create($row['time_out']), 'h:i A'); ?></td>
      <td><?php echo $row['numofhrs'] . " Hours"; ?></td>
      <td>
        <input type="hidden" name="lrn" value="<?php echo $row['lrn']; ?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <select name="remarks">
          <option value="" <?php if($row['remarks'] == "") echo "selected"; ?>></option>
          <option value="Approved" <?php if($row['remarks'] == "Approved") echo "selected"; ?>>Approved</option>
          <option value="Disapproved" <?php if($row['remarks'] == "Disapproved") echo "selected"; ?>>Disapproved</option>
        </select>
      </td>
    </tr>
  </table>

  <br><br>

  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
  </div>
</form>
