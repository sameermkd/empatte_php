<?php
    include("header.php");
  ?>
    <div class="row my-4">
    <div class="col-12 col-md-12">
        <div class="card">
            <h5 class="card-header mb-2">Job Register</h5>
            <div class="card-body">
                <form action="" method="post">
    
                    <div class="form-group  w-50">
                        <label for="usr">Job ID:</label>
                        <input type="text" class="form-control" id="usr" name="jobid" placeholder="Enter Job ID" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Customer Name :</label>
                        <input type="text" class="form-control" id="usr" name="customername" placeholder="Enter Customer Name">
                    </div>
                    <div class="form-group">
                        <label for="usr">Job Description:</label>
                        <textarea class="form-control" id="usr" name="jobdesc" placeholder="Enter Job Description"></textarea>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Starting Date:</label>
                        <input type="date" class="form-control" id="usr" name="startdate" required>
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
                $sql="INSERT INTO job(jobid,customername,jobdesc,startdate) VALUES ('$jobid','$customername','$jobdesc','$startdate')";
                if(mysqli_query($conn,$sql))
                    {
                        echo "$customername Saved Success";
                    }
            }
    ?>
    </div>
  </main>
  <?php
    include("footer.php");
  ?>