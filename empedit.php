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
                    $sql = "SELECT *from employee where id='$uempid'";
                    $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result))
                {
                 
            ?>
           
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group  w-50">
                        <label for="usr">Employee ID:</label>
                        <input type="text" value='<?php echo "".$row["empid"];?>' class="form-control" id="usr" name="empid" placeholder="Enter Employee Id" required >
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Employee Name:</label>
                        <input type="text" value='<?php echo "".$row["empname"];?>' class="form-control" id="usr" name="empname" placeholder="Enter Employee Name" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Mobile No :</label>
                        <input type="text" value='<?php echo "".$row["empmob"];?>' class="form-control" id="usr" name="empmob" placeholder="Enter Mobile No">
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">ID Number:</label>
                        <input type="text" value='<?php echo "".$row["idnumber"]; }}?>' class="form-control" id="usr" name="idnumber" placeholder="ID Number">
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Select Image</label>
                        <input type="file" class="form-control" id="usr" name="photo">
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
                $empid=$_POST['empid'];
                $empname=$_POST['empname'];
                $empmob=$_POST['empmob'];
                $idnumber=$_POST['idnumber'];
                $sql="UPDATE employee SET empid='$empid',empname='$empname',empmob='$empmob',idnumber='$idnumber' WHERE id='$uempid'";
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