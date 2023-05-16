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
    include('weeklyreport_function.php');
    include('capstone_database.php');
    include('navigation_bar.php');    
    include('weeklyreport_modal.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Report</title>
    <style>
.table2 table{
    width: 95%;
    height: 30px;
    border-collapse: collapse;
}
.table2 table th{
    color: black;
    background: lightgray;
}
.table2 table td{
    height: 50px;
    padding: 5px;
    width: 0;
}
h1{
    font-size: 2.5em;
    color: #000;
}
header{
    position: sticky;
    top: 0;
    height:70px;
    width: 100%;
    background: #205E61;
}
.weeklyreport table{
    border-collapse: collapse;
    width: 95%;
}
.weeklyreport table td{
    width: 400px;
    padding: 20px;
    line-height: 1;
    text-align: center;  
    font-size: 18px;
    background-color: #f2f2f2;
    border: 1px solid #ddd;
}
p{
    color: gray;
}
.highlight2{
        color: #25B8B4;
        font-weight: 500;
    }
   .highlight1, .highlight3, .highlight5{
      color: black;
      font-weight: 500;
    }
    h7{
        font-size: 15px;
    }
    td{
        font-size: 13px;
    }
    .table2 tr:nth-child(odd) {
        background-color: #f2f2f2;
    }
    .dataTables_wrapper .dt-buttons {
    text-align: center !important;
    margin-top: 5px;
}
.dataTables_wrapper .dt-buttons button {
background-color: #ccc;
border: none;
color: #000;
padding: 5px 10px;
margin-right: 5px;
border-radius: 3px;
font-size: 14px;
margin-bottom: 7px;
}

.dataTables_wrapper .dt-buttons button:hover {
background-color: #aaa;
color: #fff;
cursor: pointer;
}
#table thead th:nth-child(1),
#table tbody td:nth-child(1),
#table thead th:nth-child(2),
#table tbody td:nth-child(2) {
position: sticky;
left: 0;
background-color: white;
z-index: 1;
}
</style>
</head>

<body>
    
<br><br>
    <center>
<h1>Weekly Reports</h1><br>
<div class="weeklyreport">
    <table>
        <?php
            weeklyreport();
        ?>
    </table>
</div>
    <br><br><br>


<div class="table2">
    <table id="weekly">
        <h2 style='margin-bottom: 20px;'>Task Progress Reports</h2>
        <thead>
        <tr align="center">
            <th>
            <h7>Week #:</h7> 
            </th>
            <th>
            <h7>Date:</h7>
            </th>
            <th>
            <h7>Hours:</h7>
            </th>
            <th>
            <h7>Description of Tasks:</h7>
            </th>
            <th>
            <h7>Progress:</h7>
            </th>
            <th>
            <h7>Date of Completion:</h7>
            </th>
            <th>
            <h7>Remarks:</h7>
            </th>
            <th>
               <h7>Operation:</h7>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
            weeklyreportdata();
        ?>
        </tbody>
        <tfoot>
            <tr style="background-color:white;">  
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>  
                <td align="center">
                <?php
                    $sequel = "SELECT * FROM students WHERE lrn = $_SESSION[lrn]";
                    $result = mysqli_query($mysqli, $sequel);
                    $row = mysqli_fetch_array($result);

                    if ($row['department'] == "") {
                        echo "<button type=\"button\" class=\"btn btn-success\" onClick=\"alert('Your coordinator has not yet assigned you to a department.')\">Add</button>";
                    } else {
                        echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">Add</button>';
                    }
                ?>
                </td>        
            </tr>
        </tfoot>
    </table>
    <br><br>
 <hr><p>All your data will be checked by the Supervisor and OJT Coordinator.</p>
    </div>
    </center>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>  
<script type="text/javascript">
    $(document).ready(function() {
    $('#weekly').DataTable({
        dom: 'B',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        columnDefs: [
            {
                targets: '_all',
                orderable: false
            }
        ],
        order: [[0, 'asc']]
    });
});
    </script>
