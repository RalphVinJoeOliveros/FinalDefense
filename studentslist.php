<?php
    session_start();
    if(isset($_SESSION['lrn'])) {
		echo "<script>window.location='student-landing-page.php'; </script>";
		die();
	  }elseif(isset($_SESSION['department'])) {
		echo "<script>window.location='department-studentslist.php'; </script>";
		die();
	  } elseif(!isset($_SESSION['ID'])) {
		  echo "<script>window.location='index.php'; </script>";
		  die();
	  }
    include "capstone_database.php";
    include 'navigation_bar_coordinator.php';
    include 'studentslist_modal.php';
?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.1.2/css/searchPanes.dataTables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.6.2/css/select.dataTables.min.css"/>
    <title>Students List</title>
    <style>
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
        <div class="col-sm-13">
            <div class="card mb-5">
                <div class="card-body table-sm small" style="max-width: 1300px">
                    <h5 class="card-title">List of Students</h5>
                    <table id="table" class="display nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>LRN</th>
                            <th>Full Name</th>
                            <th>School Year</th>
                            <th>Block</th>
                            <th>Industry</th>
                            <th>Start Date</th>
                            <th>Schedule of OJT</th>
                            <th>Remarks</th>
                            <th>Info</th>
                            <th>Assign</th>
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
                
                        $mysequel = "SELECT * FROM students WHERE `status` = 'approved'";
                        $query = mysqli_query($mysqli, $mysequel);

                            while ($students = mysqli_fetch_array($query)) {
                                $newsequel = "SELECT * FROM `departments` WHERE `ID` = '" . $students['department'] . "'";
                                $newcheck = mysqli_query($mysqli, $newsequel);
                                echo "<tr>";
                                echo "<td>";
                                echo $students['lrn'];
                                echo "</td>";
                                echo "<td>";
                                echo $students['lname'] . ", " . $students['fname'] . " " . strtoupper(substr($students['mname'], 0, 1)) . ".";
                                echo "</td>";
                                echo "<td>";
                                echo $students['schoolyear'];
                                echo "</td>";
                                echo "<td>";
                                echo $students['block'];
                                echo "</td>";
                                echo "<td>";
                                if(mysqli_num_rows($newcheck) > 0) {
                                    $newrow = mysqli_fetch_array($newcheck);
                                    if(strlen($newrow['department']) >= 15){ echo substr(strtoupper($newrow['department']), 0, 15) . "..."; } else { echo $newrow['department']; }
                                }
                                echo "</td>";
                                echo "<td>";
                                if($students['startdate'] == "0000-00-00"){ null; }else{ echo nl2br(date_format(date_create($students['startdate']), 'F d, Y' . " " . 'l')); }
                                echo "</td>";
                                echo "<td>";
                                echo $students['schedule'];
                                echo "</td>";
                                echo "<td align='center'>";
                                echo remarks($students['remarks']);
                                echo "</td>";
                                echo "<td align='center'>";
                                echo "<button type='button' class='btn btn-sm btn-success prof-btn' data-toggle='modal' data-target='#profileModal' data-id='" . $students['lrn'] . "'>view</button</a>";
                                echo "</td>";
                                echo "<td align='center'>";
                                echo "<button type='button' class='btn btn-sm btn-primary edit-btn' data-toggle='modal' data-target='#editModal' data-id='" . $students['lrn'] . "'>Assign</button</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                            <th>LRN</th>
                            <th>Full Name</th>
                            <th>School Year</th>
                            <th>Block</th>
                            <th>Industry</th>
                            <th>Start Date</th>
                            <th>Schedule of OJT</th>
                            <th>Remarks</th>
                            <th></th>
                            <th></th>
                        </tr>
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
            if (i < 8) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            }
        });

        var table = $('#table').DataTable({
            searchPanes: {
                viewTotal: true,
                columns: [2, 3, 4, 7]
            },
            dom: 'PlfrtipB',
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
