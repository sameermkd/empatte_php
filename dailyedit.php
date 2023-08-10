<?php
    include("header.php");
  ?>
    <div class="row my-4">
    <div class="col-12 col-md-12">
        <div class="card">
            <h5 class="card-header">Employee Register</h5>
             <div class="card-body">
             <?php 
                    $uempid=$_GET['empid'];
                    $sql = "SELECT *from entry where id='$uempid'";
                    $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result))
                {
                 
            ?>
           
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group  w-50">
                        <label for="usr">Date</label>
                        <input type="date" class="form-control" value='<?php echo "".$row["date"];?>' id="usr" name="date" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Employee ID:</label>
                        <input type="text" value='<?php echo "".$row["empid"];?>' class="form-control" id="usr" name="empid" placeholder="Enter Employee Id" required >
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Employee Name:</label>
                        <input type="text" value='<?php echo "".$row["empname"];?>' class="form-control" id="usr" name="empname" placeholder="Enter Employee Name" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Job ID:</label>
                        <input type="text" class="form-control" value='<?php echo "".$row["jobid"];?>' id="usr" name="jobid" placeholder="Enter Job ID" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Customer Name :</label>
                        <input type="text" class="form-control" id="usr" value='<?php echo "".$row["customername"];?>' name="customername" placeholder="Enter Customer Name">
                    </div>
                    <div class="form-group">
                        <label for="usr">Job Description:</label>
                        <textarea class="form-control" id="usr" name="jobdesc" placeholder="Enter Job Description"><?php echo "".$row["jobdesc"];?></textarea>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Starting Time:</label>
                        <input type="datetime-local" class="form-control"  value='<?php echo "".$row["starttime"];?>' id="usr" name="starttime" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Ending Time :</label>
                        <input type="datetime-local" class="form-control" value='<?php echo "".$row["endtime"];?>' id="usr" name="endtime" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Lunch :</label>
                        <select class="form-control" name="lunch" id="" value='<?php echo "".$row["lunch"];?>'>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group  w-50">
                        <label for="usr">Hollyday :</label>
                        <select class="form-control" name="hollyday" id="" value='<?php echo "".$row["hollyday"];}}?>'>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    <div class="form-group  w-50">
                        <button type="submit" name="btn" class="btn btn-success mt-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
                $sql="UPDATE entry SET date='$date',empid='$empid',empname='$empname',jobid='$jobid',customername='$customername',jobdesc='$jobdesc',starttime='$starttime',endtime='$endtime',lunch='$lunch',hollyday='$hollyday' WHERE id='$uempid'";
                if(mysqli_query($conn,$sql))
                    {
                        echo "$empname Updated Success";
                    }
            }
    ?>
</div>
  </main>
  <?php
    include("footer.php");
  ?>