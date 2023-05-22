<?php
	    if(isset($_SESSION['lrn'])) {
			echo "<script>window.location='student-landing-page.php'; </script>";
			die();
		  } elseif(isset($_SESSION['ID'])) {
			  echo "<script>window.location='studentslist.php'; </script>";
			  die();
		  } elseif (!isset($_SESSION['department'])) {
			echo "<script>window.location='index.php'; </script>";
			die();
		  }
?>
    <style>
    .edittable{
        width: 600px;
    }
    .weekth{
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
    $sequel = "SELECT * FROM weeklyreport WHERE `id` = '$id'";
    $query = mysqli_query($mysqli, $sequel);
    $row = mysqli_fetch_array($query);
?>
<br>
<form action="" method="POST">
<table border='1' align='center' class="edittable">
    <tr>
        <th class="weekth">Week #:</th>
        <th class="weekth">Date:</th>
        <th class="weekth">Hours:</th>
        <th class="weekth">Description of Tasks:</th>
        <th class="weekth">Progres:</th>
        <th class="weekth">Remarks:</th>
    </tr>
    <tr>
        <td><?php echo $row['weeknum']; ?></td>
        <td><?php echo date_format(date_create($row['date_']), 'F d, Y l'); ?></td>
        <td><?php echo $row['hrs']. " Hours"; ?></td>
        <td><?php echo $row['descript_of_task']; ?></td>
        <td><?php echo $row['Progress']; ?></td>
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
<br>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <input type="submit" name="updateweekly" value="Update" class="btn btn-primary">
    </form>
</div>
