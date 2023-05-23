<?php
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
 function dtr(){
    if(isset($_SESSION['lrn'])){         
         global $mysqli;
         $mysequel = "SELECT * FROM students where lrn = '" . $_SESSION['lrn'] . "'";
         $query = mysqli_query($mysqli, $mysequel);

            function hrsRemaining(){
                global $mysqli;

                function ensure_positive($num) {
                    return max($num, 0);
                  }
                $lrn = $_SESSION['lrn'];
                $mysequel = "SELECT * FROM students where lrn = '$lrn'";
                $query = mysqli_query($mysqli, $mysequel);
                $students = mysqli_fetch_array($query);
                $hrs = $students['hrs'];
                $mysequel = "SELECT SUM(numofhrs) AS total FROM dtr WHERE lrn = '$lrn' AND (remarks = 'Approved' or remarks = '')";
                $query = mysqli_query($mysqli, $mysequel);
                $dtr = mysqli_fetch_array($query);
                $total = $dtr['total'];
                $remaining = ensure_positive($hrs - $total);

                
                return "<p>" . $remaining . " Hour/s</p>";
                
            }
             while($students = mysqli_fetch_array($query)){
                 echo "<tr>";
                 echo "<td> <strong>NAME:</strong><br><br>" . $students['fname'] . " " . $students["mname"] . " " . $students['lname'] . "</td>";
                 echo "<td><strong>SCHOOL:</strong><br><br>" . $students['nschool'] . " </td>";             
                 echo "<td><strong>BLOCK:</strong><br><br>" . $students['block'] . " </td>";                     
                 echo "</tr>";
                 echo "<tr>";
                 echo "<td> <strong>INDUSTRY:</strong><br><br><p>";
                 if($students['department'] == ""){
                    null;
                    } else {
                    $newsql = "SELECT * FROM departments WHERE ID = '" . $students['department'] . "'";
                    $newcheck = mysqli_query($mysqli, $newsql);
                    $newdepartment = mysqli_fetch_array($newcheck);
                        echo $newdepartment['department'];
                    }
                 echo "</p></td>";
                 echo "<td><strong>NO. OF HOURS REQUIRED:</strong><br><br><p>" . $students['hrs'] . " Hours</p></td>";
                 echo "<td><strong>NO. OF HOURS REMAINING:</strong><br><br>" . hrsRemaining() . " </td>";
                 echo "</tr>";
         }
 }   
}


function records(){   
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
            $mysequel = "SELECT * FROM dtr WHERE lrn = $lrn ORDER BY date_ ASC";
            $query = mysqli_query($mysqli, $mysequel);
                while($dtr = mysqli_fetch_array($query)){
                    echo "<tr>";
                    echo "<td>" . nl2br(date_format(date_create($dtr['date_']), 'F d, Y' . " " . 'l')) . "</td>";
                    echo "<td>" . date_format(date_create($dtr['time_in']), 'h:i A') . "</td>";
                    echo "<td>";
                        if($dtr['time_out'] == '00:00:00'){echo "";}else{echo date_format(date_create($dtr['time_out']), 'h:i A');} 
                    echo "</td>";
                    echo "<td>";
                        if($dtr['numofhrs'] == "0"){echo "";}else{echo $dtr['numofhrs'] . " Hour/s";}
                    echo "</td>";
                        if($dtr['time_out'] == '00:00:00' && $dtr['numofhrs'] == "0"){
                            echo "<td align='right'>";
                            if($dtr['remarks'] == 'Approved' || $dtr['remarks'] == 'Disapproved'){
                                echo "<button type='button' class='btn btn-primary' onclick=\"alert('You don\\'t have permission to edit!')\">Punch Out</button>";
                            }else{
                                // echo "<button type='button' class='btn btn-primary edit-btn' data-toggle='modal' data-target='#empModal' data-id='" . $dtr['id'] . "'>Punch Out</button>";
                                echo "<button type='button' class='btn btn-primary out-btn' data-toggle='modal' data-target='#outModal'data-id='" . $dtr['id'] . "'>Punch Out</button>";
                            }
                            echo "&nbsp;<button type='button' class='btn btn-secondary dlte-btn' data-toggle='modal' data-target='#delModal' data-id='" . $dtr['id'] . "'>Delete</button></td>";
                        }else{
                            echo "<td>" . $dtr['remarks'] . "</td>";
                        }
                    echo "</tr>";
                }
            }
           
?>