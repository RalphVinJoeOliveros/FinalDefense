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

         function hrsRemaining() {
            global $mysqli;
        
            function formatTime($hours, $minutes) {
                $formatted_hours = sprintf('%02d Hr(s)', $hours);
                $formatted_minutes = sprintf('%02d Min(s)', $minutes);
                return $formatted_hours . ' ' . $formatted_minutes;
            }
        
            $lrn = $_SESSION['lrn'];
            $mysequel = "SELECT * FROM students WHERE lrn = '$lrn'";
            $query = mysqli_query($mysqli, $mysequel);
            $students = mysqli_fetch_array($query);
            $required_hours = $students['hrs'];
        
            $mysequel = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIME(numofhrs)))) AS total_time FROM dtr WHERE lrn = '$lrn' AND (remarks = 'Approved' OR remarks = '')";
            $query = mysqli_query($mysqli, $mysequel);
            $dtr = mysqli_fetch_array($query);
            $total_time = $dtr['total_time'];
        
            // Extract total hours and minutes from the total time
            $time_parts = explode(':', $total_time);

            if (count($time_parts) >= 2) {
                $total_hours = (int) $time_parts[0];
                $total_minutes = (int) $time_parts[1];
            } else {
                // Handle the case when $time_parts doesn't have enough elements
                // You can assign default values or display an error message
                $total_hours = 0;
                $total_minutes = 0;
            }
            
        
            // Calculate remaining hours and minutes
            $remaining_hours = $required_hours - $total_hours - 1;
            $remaining_minutes = 60 - $total_minutes;
        
            // Adjust remaining hours and minutes if necessary
            if ($remaining_minutes >= 60) {
                $remaining_hours++;
                $remaining_minutes -= 60;
            }
        
            // Format the remaining hours and minutes
            $formatted_remaining_time = formatTime($remaining_hours, $remaining_minutes);
        
            if($formatted_remaining_time <= "00 Hr(s) 00 Min(s)"){
                return "00 Hr(s) 00 Min(s)";
            }else{
                return "<p>" . $formatted_remaining_time . "</p>";
            } 
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
                 echo "<td><strong>NO. OF HOURS REQUIRED:</strong><br><br><p>" . $students['hrs'] . " Hour/s</p></td>";
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
                        if($dtr['numofhrs'] == "00:00:00")
                        {echo "";}else{echo getTimeDifference($dtr['time_out'], $dtr['time_in']);}
                        
                    echo "</td>";
                        if($dtr['time_out'] == '00:00:00' && $dtr['numofhrs'] == "00:00:00"){
                            echo "<td align='right'>";
                            if($dtr['remarks'] == 'Approved' || $dtr['remarks'] == 'Disapproved'){
                                echo "<button type='button' class='btn btn-primary' onclick=\"alert('You don\\'t have permission to edit!')\">Punch Out</button>";
                            }else{
                                echo "<button type='button' class='btn btn-primary out-btn' data-toggle='modal' data-target='#outModal'data-id='" . $dtr['id'] . "'>Punch Out</button>";
                            }
                            echo "&nbsp;<button type='button' class='btn btn-secondary dlte-btn' data-toggle='modal' data-target='#delModal' data-id='" . $dtr['id'] . "'>Delete</button></td>";
                        }else{
                            echo "<td>" . $dtr['remarks'] . "</td>";
                        }
                    echo "</tr>";
                }
            }
    
            function getTimeDifference($time_in, $time_out) {
                $time_in = strtotime($time_in);
                $time_out = strtotime($time_out);
                $diff_secs = abs($time_out - $time_in);
                
                $hours = floor($diff_secs / 3600);
                $minutes = floor(($diff_secs % 3600) / 60);
                
                // Check if time difference is 7 hours or greater
                if ($hours >= 7) {
                    $hours -= 1;
                }
                
                $time_diff = sprintf('%02d hour(s) %02d minute(s)', $hours, $minutes);
                
                return $time_diff;
            }
            
?>