<?php
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
function weeklyreport(){

    if(isset($_SESSION['lrn'])){         
         global $mysqli;
         $mysequel = "SELECT * FROM students where lrn = '" . $_SESSION['lrn'] . "'";
         $query = mysqli_query($mysqli, $mysequel);

             while($students = mysqli_fetch_array($query)){
                 echo "<tr>";
                 echo "<td> <strong>Trainee's Name:</strong>";
                 echo "<td colspan = '3'>" . $students['fname'] . " " . $students["mname"] . " " . $students['lname'] . "</td>";
                 echo "</tr>";
                 echo "<tr>";
                 echo "<td><strong>Block:</strong></td>";
                 echo "<td>" . $students['block'] . " </td>";
                 echo "</tr>";
         }
 }   
}

 function weeklyreportdata(){
    function lrn(){
        if(isset($_SESSION['lrn'])){         
            global $mysqli;
            $mysequel = "SELECT * FROM students where lrn = '" . $_SESSION['lrn'] . "'";
            $query = mysqli_query($mysqli, $mysequel);

            while ($students = mysqli_fetch_array($query)) {
                $lrn = $students['lrn'];
                return $lrn;
            }
        }
    }

    $lrn = lrn();

    GLOBAL $mysqli;
            $mysequel = "SELECT * FROM weeklyreport WHERE lrn = $lrn ORDER BY date_ ASC";
    $query = mysqli_query($mysqli, $mysequel);

    function progress($progress){
        if ($progress == "DONE") {
            return '<div style="color: #189E12; padding: 8px; width: 80px; font-size: 16px; font-weight: bold;">'.$progress.'</div>';
        } else if ($progress == "IN PROGRESS") {
            return '<div style="color: #2287D6; padding: 8px; width: 100px; font-size: 16px; font-weight: bold;">'.$progress.'</div>';
        } else if ($progress == "NOT DONE") {
            return '<div style="color: #DE2828; padding: 8px; width: 120px; font-size: 16px; font-weight: bold;">'.$progress.'</div>';
        }
    }
    
    function dateofcom($dateofcom){
        if ($dateofcom != "0000-00-00" && $dateofcom != null) {
            echo "<td>" . date_format(date_create($dateofcom), 'F d, Y') . "<br>" . date_format(date_create($dateofcom), 'l') . "</td>";

        } else {
            echo "<td></td>"; // if date is null, display an empty cell
        }
    }

    while($weeklyreport = mysqli_fetch_array($query)){
        echo "<tr align='center'>";
        echo "<td align='center'>" . $weeklyreport['weeknum'] . "</td>";
        echo "<td style='width: 100px;'>" . nl2br(date_format(date_create($weeklyreport['date_']), 'F d, Y' . " " . 'l')) . "</td>";
        echo "<td>" . $weeklyreport['hrs'] . " Hour/s</td>";  
        echo "<td>" . $weeklyreport['descript_of_task'] . "</td>";
        echo "<td>" . progress($weeklyreport['Progress']) . "</td>";
        echo dateofcom($weeklyreport['dateofcom']);
        echo "<td>" . $weeklyreport['remarks'] . "</td>";
        echo "<td>";
            if($weeklyreport['remarks'] == "Approved" || $weeklyreport['remarks'] == "Disapproved"){
                echo "";
            } else {
                echo "<button type='button' class='btn btn-primary edit-btn' data-toggle='modal' data-target='#updateModal' data-id='" . $weeklyreport['id'] . "'>Edit</button>";
                echo "&nbsp;<button type='button' class='btn btn-secondary dlte-btn' data-toggle='modal' data-target='#delModal' data-id='" . $weeklyreport['id'] . "'>Delete</button>";
            }
        echo "</td>";
        echo "</tr>";
    }
}
?>