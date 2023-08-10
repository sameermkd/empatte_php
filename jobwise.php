<?php
    include("header.php");
  ?>    
<div class="row my-4">
    <div class="col-12 col-md-12">
        <div class="card">
            <h5 class="card-header">Job Wise Report</h5>

            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group  w-50">
                        <label for="usr">Job ID:</label>
                        <input type="text" class="form-control" id="usr" name="jobid" placeholder="Enter Job Id" required>
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
            <h5 class="card-header">Job Wise Report</h5>

            <div class="card-body">
                <form action="jobwisepdf.php" method="post" enctype="multipart/form-data">
                    <div class="form-group  w-50">
                        <label for="usr">Job ID:</label>
                        <input type="text" class="form-control" id="usr" name="jobid" placeholder="Enter Job Id" required>
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
        $jobid=$_POST['jobid'];
        $startdate=$_POST['startdate'];
        $enddate=$_POST['enddate'];
        ?>
    <div class="col-12 col-md-12 my-3">
        <div class="card">
            <h5 class="card-header">Job Deatails</h5>
            <div class="card-body">
                <table>
                    <tr>
                        <th width="30%">Job ID :<?php echo "$jobid";?></th>
                        <th width="40%">Start Date :<?php echo "$startdate";?></th>
                        <th width="40%">End Date ::<?php echo "$enddate";?></th>
                    </tr>
                    <tr>
                        <th width="30%">Customer Name :{{emp.customername}}</th>
                        <th></th>
                        <th width="40%">Job Description :{{emp.jobdesc}}</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 my-3">
        <div class="card">
            <h5 class="card-header">Job Wise Work Deatails</h5>
            <div class="card-body">
                <?php
                    $totaltime=0;
                    $sql = "SELECT *from entry WHERE date between '$startdate' and '$enddate' and jobid='$jobid'";
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
                            <th scope="col">Employee Name</th>
                            <th scope="col">Work Time Start</th>
                            <th scope="col">Work Time End</th>
                            <th scope="col">Total Work Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo '<th scope="row"></th>';
                            echo "<td>".$row['date']."</td>";
                            echo "<td>".$row['empname']."</td>";
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
                            echo "</td></tr>";
                                }} 
                              
                        ?>
                      <tr>
                          <td colspan=5><b>Total Working Hours</b></td>
                          <td colspan=5><b><?php echo round($totaltime,2); }?></b></td>
                      </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

  </main>
  <?php
    include("footer.php");
  ?>