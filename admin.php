<?php
    include("header.php");
  ?>   
  <div class="row my-4">
    <div class="col-12 col-md-12">
        <div class="card">
            <h5 class="card-header mb-2">Daily Entries</h5>
            <div class="card-body">
            <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Employees Details</h2>
                    </div>
                    <?php
                    // Include config file
                    require_once "database.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM employee";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Emp Id</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td></td>";
                                        echo "<td>" . $row['empname'] . "</td>";
                                        echo "<td>" . $row['empid'] . "</td>";
                                        echo "<td>" . $row['empmob'] . "</td>";
                                        echo "<td>";
                                        echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="empedit.php?empid='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        echo '<a href="empdelete.php?empid='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>        
        </div>
    </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showCustomer(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }
        xhttp.open("GET", "getemp.php?empid=" + str);
        xhttp.send();
    }
    function showCustomer1(str) {
        if (str == "") {
            document.getElementById("txtHint1").innerHTML = "";
            return;
        }
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            document.getElementById("txtHint1").innerHTML = this.responseText;
        }
        xhttp.open("GET", "getjob.php?jobid=" + str);
        xhttp.send();
    }

</script>
<?php

    if(isset($_POST['btn']))
        {
        $date=$_POST['date'];
        $empid=$_POST['empid'];
        $empname=$_POST['empname'];
        $jobid=$_POST['jobid'];
        $customername=$_POST['customername'];
        $jobdesc=$_POST['jobdesc'];
        $starttime=$_POST['starttime'];
        $endtime=$_POST['endtime'];
        $lunch=$_POST['lunch'];
        $hollyday=$_POST['hollyday'];
        $sql="INSERT INTO entry(date,empid,empname,jobid,customername,jobdesc,starttime,endtime,lunch,hollyday) VALUES ('$date','$empid','$empname','$jobid','$customername','$jobdesc','$starttime','$endtime','$lunch','$hollyday')";
        if(mysqli_query($conn,$sql))
        {
            echo "$date Saved Success";
        }
}
    ?>
    </div>
  </main>
  <?php
    include("footer.php");
  ?>