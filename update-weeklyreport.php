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
    include('capstone_database.php');
    $result = mysqli_query($mysqli, "SELECT * FROM weeklyreport WHERE id = '" . $_POST['userid'] . "'");
    $row = mysqli_fetch_array($result);
?>
<style>
    textarea{
    padding: 10px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    align: center;
    font-size: 15px;
}   
input[type=text]{
    padding: 10px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    align: center;
    font-size: 15px;
    width: 450px;
    height: 35px;
}
select{
    padding: 10px;
    text-decoration: none;
    margin: 10px;
    cursor: pointer;
    align: center;
    font-size: 15px;
    height: 40px;
    margin-bottom: 20px;
}
label{
    margin-bottom: 0;
    font-size: 17px;  
    margin-left: 26px;
}
</style>
    <form action="" method="POST"><br>
        <label for="weeknum">Week Number:</label><br>
            <center><input type="text" name="weeknum" value="<?php echo $row['weeknum']; ?>" class="form-control" disabled></center><br>
        <label for="date_">Date:</label><br>
        <center><input type="date" name="date_" value="<?php echo date_format(date_create($row['date_']), 'Y-m-d') ?>" class="form-control"></center><br><br>
        <label for="hrs">Hours:</label><br>
        <center><input type="number" name="hrs" value="<?php echo $row['hrs']; ?>" class="form-control"></center><br>
        <label for="descript_of_task">Description of Task:</label><br>
        <center><textarea style='width: 450px;' id="descript_of_task" name="descript_of_task" rows="4" cols="35" class="form-control"><?php echo $row['descript_of_task']; ?></textarea></center><br>
        <label for="dateofcom">Date Of Completion:</label><br>
        <center><input type="date" name="dateofcom" id="" value="<?php echo date_format(date_create($row['dateofcom']), 'Y-m-d')?>" class="form-control"></center><br>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"> 
        <label for="Progress">Progress:</label>
        <center><select style='width: 450px;' name="Progress" id="Progress" class="form-control" required>
                <?php
                $newsequel =  "SELECT * FROM weeklyreport WHERE id = '" . $row['id'] . "'";
                $result = mysqli_query($mysqli, $newsequel);
                $existingValue = mysqli_fetch_assoc($result)['Progress'];

                ?>
                        <option value=""></option>
                        <option value="DONE" <?php if($existingValue == "DONE") echo "selected"; ?>>DONE</option>
                        <option value="NOT DONE" <?php if($existingValue == "NOT DONE") echo "selected"; ?>>NOT DONE</option>
                        <option value="IN PROGRESS" <?php if($existingValue == "IN PROGRESS") echo "selected"; ?>>IN PROGRESS</option>
            </select></center><br><br>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="update" value="Update" class="btn btn-primary">
            </div>
    </form>
