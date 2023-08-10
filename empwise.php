<?php
    include("header.php");
  ?>    
<div class="row my-4">
    <div class="col-12 col-md-12">
        <div class="card">
            <h5 class="card-header">Employee Wise Report Table</h5>

            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group  w-50">
                        <label for="usr">Job ID:</label>
                        <input type="text" class="form-control" id="usr" name="empid" placeholder="Enter Job Id" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Starting Date:</label>
                        <input type="date" class="form-control" id="usr" name="startdate" placeholder="Enter Job Id" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Ending Date:</label>
                        <input type="date" class="form-control" id="usr" name="enddate" placeholder="Enter Job Id" required>
                    </div>
                    <div class="form-group  w-75">
                        <button type="submit" class="btn btn-success mt-2" name="table">Generate Table</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row my-4">
    <div class="col-12 col-md-12">
        <div class="card">
            <h5 class="card-header">Employee Wise Report Table</h5>

            <div class="card-body">
                <form action="empwisepdf.php" method="post" enctype="multipart/form-data">
                    <div class="form-group  w-50">
                        <label for="usr">Job ID:</label>
                        <input type="text" class="form-control" id="usr" name="empid" placeholder="Enter Job Id" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Starting Date:</label>
                        <input type="date" class="form-control" id="usr" name="startdate" placeholder="Enter Job Id" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Ending Date:</label>
                        <input type="date" class="form-control" id="usr" name="enddate" placeholder="Enter Job Id" required>
                    </div>
                    <div class="form-group  w-75">
                        <button type="submit" class="btn btn-success mt-2" name="pdf">Generate PDF</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['table']))
      {
        $empid=$_POST['empid'];
        $startdate=$_POST['startdate'];
        $enddate=$_POST['enddate'];
        
        ?>
    <div class="col-12 col-md-12 my-3">
        <div class="card">
            <h5 class="card-header">Employee Details</h5>
            <div class="card-body">
                <table>
                    <tr>
                        <th width="30%">Employee ID :{{empid}}</th>
                        <th width="40%">Start Date :{{startdate}}</th>
                        <th width="40%">End Date :{{enddate}}</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 my-3">
        <div class="card">
            <h5 class="card-header">Work Deatails</h5>
            <div class="card-body">
                <?php
                    $sql = "SELECT *from entry WHERE date between '$startdate' and '$enddate' and empid='$empid'";
                    $result = mysqli_query($conn, $sql);
                    function differenceInHours($startdate,$enddate){
                        $starttimestamp = strtotime($startdate);
                        $endtimestamp = strtotime($enddate);
                        $difference = abs($endtimestamp - $starttimestamp)/3600;
                        return $difference;
                        }
                ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Job Id</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Job Description</th>
                            <th scope="col">Starting Time</th>
                            <th scope="col">Ending Time</th>
                            <th scope="col">Total Time</th>
                            <th scope="col">Over Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $totaltime=0;
                            $ot=0;
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo '<th scope="row"></th>';
                            echo "<td>".$row['date']."</td>";
                            echo "<td>".$row['jobid']."</td>";
                            echo "<td>".$row['customername']."</td>";
                            echo "<td>".$row['jobdesc']."</td>";
                            echo "<td>".$row['starttime']."</td>";
                            echo "<td>".$row['endtime']."</td>";
                            echo "<td>";
                                $totalwork=differenceInHours($row['endtime'],$row['starttime']);
                                if($row['lunch']=="Yes")
                                    {
                                    $totalwork=$totalwork-1;
                                    echo round($totalwork,2);
                                    $totaltime=$totaltime+$totalwork;
                                    }
                                else
                                    {
                                    echo round($totalwork,2);
                                    $totaltime=$totaltime+$totalwork;
                                    }
                echo "</td>";
                            echo "<td>";
                            $working=differenceInHours($row['endtime'],$row['starttime']);
                            $break=$row['lunch'];
                            $off=$row['hollyday'];
                            if($working>9 && $break=='Yes' && $off=='No')
                                {
                                    echo round($overtime=($working-9)-1,2);
                                    $ot=$ot+$overtime;
                                }
                            if($working>9 && $break=='No' && $off=='No')
                                {
                                    echo round($overtime=($working-9),2);
                                    $ot=$ot+$overtime;
                                }
                            if($off=='Yes' && $break=='Yes')
                                {
                                    echo round($overtime=$working-1,2);
                                    $ot=$ot+$overtime;
                                }
                            if($off=='Yes' && $break=='No')
                                {
                                    $overtime1=$working;
                                    echo $overtime1;
                                    $ot=$ot+$overtime;
                                }
                            }}
                            echo "</td></tr>";
                            echo "<tr>";
                            echo "<td colspan='4'> <b>Total Working Hours :".round($totaltime,2)."<b></td>";
                            echo "<td colspan='5'> <b>Total Over Time :".round($ot,2)."</b></td>";
                            echo "</tr>";
                        ?>

                    </tbody>
                </table>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
  </main>
  <?php
    include("footer.php");
  ?>