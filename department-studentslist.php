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
    include "capstone_database.php";  
    include "navigation_bar_department.php";
    include "dep_modal.php";
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.1.2/css/searchPanes.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.6.2/css/select.dataTables.min.css"/>
    <title>Students List</title>
    <style>
        .dataTables_wrapper .dt-buttons {
            text-align: center;
            margin-top:5px;
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

        #table thead th {
        position: sticky;
        top: 0;
        background-color: white;
        z-index: 1;
        }
        .highlight1{
        color: #25B8B4;
        font-weight: 500;
    }
    </style>
</head>
<body>
    <br>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-sm-12">
            <div class="card mb-5">
                <div class="card-body table-sm small" style="max-width: 1200px">
                    <h5 class="card-title">Students List</h5>
                    <table id="table" class="display nowrap" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>LRN</th>
                                <th>Full Name</th>
                                <th>Block</th>
                                <th>School Year</th>
                                <th>Start Date</th>
                                <th>Schedule</th>
                                <th>Remarks</th>
                                <th>Info</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                         function remarks($remarks){
                            if ($remarks == "Completed") {
                                    return '<div style="background-color: green;  color: white; padding: 2px;">'.$remarks.'</div>';
                            } else if ($remarks == "On Going") {
                                    return '<div style="background-color: skyblue; color: black; padding: 2px;">'.$remarks.'</div>';
                            } else if ($remarks == "Declined") {
                                    return '<div style="background-color: red;  color: white; padding: 2px;">'.$remarks.'</div>';
                            } else if ($remarks == "Not Yet Started") {
                                return '<div style="background-color: gray;  color: white; padding: 2px;">'.$remarks.'</div>';
                            }
                        }                       
                            $dep = $_SESSION['department'];
                            $sql = "SELECT * FROM students WHERE `department` = '$dep'";
                            $query1 = mysqli_query($mysqli, $sql);
                            
                            while ($students = mysqli_fetch_array($query1)) {
                                $sequel = "SELECT * FROM departments WHERE `ID` = '$dep'";
                                $department = mysqli_fetch_array(mysqli_query($mysqli, $sequel));
                                echo "<tr>";
                                echo "<td>". $students['lrn'] ."</td>";
                                echo "<td>";
                                echo "<a href='' class='name-btn' data-toggle='modal' data-target='#nameModal' data-id='" . $students['lrn'] . "'>" . $students['fname'] . " " . $students['mname'] . " " . $students['lname'] . "</a>";
                                echo "</td>";
                                echo "<td align='left'>";
                                echo $students['block'];
                                echo "</td>";
                                echo "<td>";
                                echo $students['schoolyear'];
                                echo "</td>";
                                echo "<td>";
                                if($students['startdate'] == "0000-00-00"){
                                    echo "";
                                } else {
                                    echo date('F d, Y' . " " . 'l', strtotime($students['startdate']));
                                }
                                echo "</td>";
                                echo "<td>";
                                echo $students['schedule'];
                                echo "</td>";
                                echo "<td align='center'>";
                                echo remarks($students['remarks']);
                                echo "</td>";
                                echo "<td align='center'>";
                                echo "<a class='btn btn-sm btn-success' href='dep-view.php?lrn=" . $students['lrn'] . "'>view</a>";
                                echo "</td>";
                                echo "<td align='center'>";
                                echo "<button class='btn btn-sm btn-primary edit-btn' data-toggle='modal' data-target='#editModal' data-id='" . $students['lrn'] . "'>edit</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                        </tbody>
                        <tfoot>
                                <th>LRN</th>
                                <th>Full Name</th>
                                <th>Block</th>
                                <th>School Year</th>
                                <th>Remarks</th>
                                <th>Start Date</th>
                                <th>Schedule</th>
                                <th></th>
                                <th></th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/2.1.2/js/dataTables.searchPanes.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.6.2/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script>
$(document).ready(function() {
    $('#table tfoot th').each(function(i) {
        if (i < 5) {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        }
    });

    var table = $('#table').DataTable({
        searchPanes: {
            viewTotal: true,
            columns: [2, 3, 4]
        },
        dom: 'PlfrtipB', // Add 'B' for buttons
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        scrollY: '1000px',
        scrollX: true,
        scrollCollapse: true,

        columnDefs: [
                {
                    target: 2,
                    visible: false,
                    searchable: true,
                },
                {
                    target: 3,
                    visible: false,
                },
            ],
    });

    table.columns().every(function() {
        var that = this;

        $('input', this.footer()).on('keyup change', function() {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });
});
</script>
</body>
</html>
