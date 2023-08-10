<?php
    include("header.php");
  ?>   
  <div class="row my-4">
    <div class="col-12 col-md-12">
        <div class="card">
            <h5 class="card-header">Employee Register</h5>
             <div class="card-body">
             <?php 
                    $ujobid=$_GET['jobid'];
                    $sql = "SELECT *from job where id='$ujobid'";
                    $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result))
                {
                 
            ?>
           
           <form action="" method="post">
    
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
        <label for="usr">Starting Date:</label>
        <input type="date" class="form-control" value='<?php echo "".$row["startdate"];?>' id="usr" name="startdate" required>
    </div>
    <div class="form-group  w-50">
        <label for="usr">End Date:</label>
        <input type="date" class="form-control" value='<?php echo "".$row["enddate"]; }}?>' id="usr" name="enddate" required>
    </div>
    <div class="form-group  w-50">
        <button type="submit" name="btn" class="btn btn-success mt-2">Submit</button>
    </div>
</form>
            </div>
        </div>
    </div>
</div>
    <?php
        if(isset($_POST['btn']))
            {
                $jobid=$_POST['jobid'];
                $customername=$_POST['customername'];
                $jobdesc=$_POST['jobdesc'];
                $startdate=$_POST['startdate'];
                $enddate=$_POST['enddate'];
                $sql="UPDATE job SET jobid='$jobid',customername='$customername',jobdesc='$jobdesc',startdate='$startdate', enddate='$enddate' WHERE id='$ujobid'";
                if(mysqli_query($conn,$sql))
                    {
                        echo "$customername Updated Success";
                    }
            }
    ?>
</div>
  </main>
  <?php
    include("footer.php");
  ?>