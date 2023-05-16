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
    include('dtr_function.php');
    include('capstone_database.php');
    include('navigation_bar.php');  
    include('dtr_modal.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTR</title>
    <style>
.table2 table{
    width: 85%;
    height: 30px;
    border-collapse: collapse;
}
.table2 table th{
    color: black;
    background: lightgray;
}
.table2 table td{
    height: 50px;
    padding: 10px;

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
.dtrtable table{
    border-collapse: collapse;
    width: 85%;
}
.dtrtable table td{
    width: 400px;
    padding: 20px;
    line-height: 1;
    text-align: center;  
    font-size: 18px;
    background-color: #f2f2f2;
    border: 1px solid #ddd;
}
p{
    color: black;
}
.highlight3{
        color: #25B8B4;
        font-weight: 500;
    }
   .highlight2, .highlight1, .highlight5{
      color: black;
      font-weight: 500;
    }
    .table2 tr:nth-child(odd){
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


<center>   
    
    <br><br>
     <h1>OJT DAILY TIME RECORD</h1><br>
    <div class="dtrtable">
 <table> 
    <?php dtr(); ?>
</table>    
</div>
 <br><br>

 <div class="table2">
 <table class="text-center" id="dtrprint">
    <thead>
    <tr>
        <th style='width: 190px;'>DATE</th>
        <th>TIME IN</th>
        <th>TIME OUT</th>
        <th>TOTAL HOURS</th>
        <th>Remarks</th>
    </tr> 
    </thead>
    <tbody>
           <?php
                records();
            ?>  
    </tbody>
    <tfoot>
    <tr style="background-color: white;">
        <td align="left">
        <div>
        <?php
            $lrn = $_SESSION['lrn'];
            $dtrseq = "SELECT * FROM dtr WHERE lrn = '$lrn' AND (time_out LIKE '%00:00:00%' OR numofhrs LIKE '%00:00:00%')";
            $dtrres = mysqli_query($mysqli, $dtrseq);
            $dtrrow = mysqli_fetch_array($dtrres);

            if ($dtrres->num_rows > 0) {
                echo "";
            } else {
                $sequel = "SELECT * FROM students WHERE lrn = '" .  $_SESSION['lrn'] . "'";
                $result = mysqli_query($mysqli, $sequel);
                $row = mysqli_fetch_array($result);
                
                if ($row['department'] == "") {
                    echo "<button type=\"button\" class=\"btn btn-success\" onClick=\"alert('Your coordinator has not yet assigned you to a department.')\">Punch In</button>";
                } else {
                    echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#selectModal">Punch In</button>';
                }
            }
        ?>
        </div>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
        <td>
        </td>
    </tr>
    </tfoot>
 </table><br><br>
 <hr><p style='color: gray;'>All your data will be checked by the Supervisor and OJT Coordinator.</p>
 </center>
</div>
</body>
</html>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>  

    <script type="text/javascript">
    $(document).ready(function() {
        $('#dtrprint').DataTable({
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