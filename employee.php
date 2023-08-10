<?php
    include("header.php");
  ?>
    <div class="row my-4">
    <div class="col-12 col-md-12">
        <div class="card">
            <h5 class="card-header">Employee Register</h5>
            
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group  w-50">
                        <label for="usr">Employee ID:</label>
                        <input type="text" class="form-control" id="usr" name="empid" placeholder="Enter Employee Id" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Employee Name:</label>
                        <input type="text" class="form-control" id="usr" name="empname" placeholder="Enter Employee Name" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Mobile No :</label>
                        <input type="text" class="form-control" id="usr" name="empmob" placeholder="Enter Mobile No">
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">ID Number:</label>
                        <input type="text" class="form-control" id="usr" name="idnumber" placeholder="ID Number">
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Select Image</label>
                        <input type="file" class="form-control" id="usr" name="photo">
                    </div>
                    <div class="form-group  w-50">
                        <button type="submit" name="btn" class="btn btn-success mt-2">Register</button>
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
                $sql="INSERT INTO employee(empid,empname,empmob,idnumber) VALUES ('$empid','$empname','$empmob','$idnumber')";
                if(mysqli_query($conn,$sql))
                    {
                        echo "$empname Saved Success";
                    }
            }
    ?>
</div>
  </main>
  <?php
    include("footer.php");
  ?>