<?php
    include('database.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>ZOOM</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <!-- Bootstrap core CSS -->
<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/sidebars.css" rel="stylesheet">
  </head>
  <body>
<main>
  <div class="b-example-divider"></div>

  <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <a href="index.php" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-5 fw-semibold">ZOOM</span>
    </a>
    <ul class="list-unstyled ps-0">
      <a href="index.php"><li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Home
        </button>
      </a>
        <!-- <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Overview</a></li>
            <li><a href="#" class="link-dark rounded">Updates</a></li>
            <li><a href="#" class="link-dark rounded">Reports</a></li>
          </ul>
        </div> -->
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          Employee Details
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="employee.php" class="link-dark rounded">Register</a></li>
            <!-- <li><a href="#" class="link-dark rounded">Weekly</a></li>
            <li><a href="#" class="link-dark rounded">Monthly</a></li>
            <li><a href="#" class="link-dark rounded">Annually</a></li> -->
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          Jobs Details
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="job.php" class="link-dark rounded">Job Register</a></li>
            <!-- <li><a href="#" class="link-dark rounded">Processed</a></li>
            <li><a href="#" class="link-dark rounded">Shipped</a></li>
            <li><a href="#" class="link-dark rounded">Returned</a></li> -->
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse1" aria-expanded="false">
          Generate Report
        </button>
        <div class="collapse" id="orders-collapse1">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="jobwise.php" class="link-dark rounded">Job wise</a></li>
            <li><a href="empwise.php" class="link-dark rounded">Employee Wise</a></li>
            <!-- <li><a href="#" class="link-dark rounded">Shipped</a></li>
            <li><a href="#" class="link-dark rounded">Returned</a></li> -->
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Account
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li><a href="admin.php" class="link-dark rounded">Admin Page</a></li>
            <li><a href="#" class="link-dark rounded">Profile</a></li>
            <li><a href="#" class="link-dark rounded">Settings</a></li>
            <li><a href="#" class="link-dark rounded">Sign out</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
  <div class="b-example-divider"></div>
  <div class="d-flex flex-column align-items-stretch flex-shrink- bg-white" style="width: 60%; margin-left: 30px; height: 100%;">
   
  <div class="row my-4">
    <div class="col-12 col-md-12">
        <div class="card">
            <h5 class="card-header">Employee Register</h5>
             <div class="card-body">
             <?php 
                    $uempid=$_GET['empid'];
                    $sql = "SELECT *from entry where empid='$uempid'";
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
                $empid=$_POST['empid'];
                $empname=$_POST['empname'];
                $empmob=$_POST['empmob'];
                $idnumber=$_POST['idnumber'];
                $sql="UPDATE employee SET empid='$empid',empname='$empname',empmob='$empmob',idnumber='$idnumber' WHERE empid='$uempid'";
                if(mysqli_query($conn,$sql))
                    {
                        echo "$empname Updated Success";
                    }
            }
    ?>
</div>
  </main>
  
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>

      <script src="./bootstrap/js/sidebars.js"></script>
  </body>
</html>