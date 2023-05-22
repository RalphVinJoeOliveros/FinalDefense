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
?>
<style>
input[type=date]{
    padding: 10px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    align: center;
    font-size: 15px;
    width: 450px;
    height: 35px;
}
input[type=time]{
    padding: 10px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    align: center;
    font-size: 15px;
    width: 450px;
    height: 35px;
}
label{
    margin-bottom: 0;
    font-size: 17px;  
    margin-left: 26px;
}
</style>

<?php
include('capstone_database.php');
    $id = $_POST['userid'];
                
    $result = mysqli_query($mysqli, "SELECT * FROM dtr WHERE id = '$id'");
    $row = mysqli_fetch_array($result);
?>
        <form id="updateForm" method="POST"><br>
            <label for="date_">Date:</label><br>
                <center><input type="date" name="date_" value="<?php echo date_format(date_create($row['date_']), 'Y-m-d') ?>" class="form-control" readonly></center><br>
            <label for="time_in">Time In:</label><br>
            <center><input type="time" name="time_in" id="time_in" value="<?php echo $row['time_in']; ?>" class="form-control" readonly></center><br>        
            <label for="time_out">Time Out:</label><br>
            <center><input type="time" name="time_out" id="time_out" value="<?php if($row['time_out'] == "00:00:00"){ echo "";} else {echo $row['time_out'];} ?>" class="form-control" required></center>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"><br>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <input type="submit" name="updatedtr" value="Submit" class="btn btn-primary">
        </div>
    </form>