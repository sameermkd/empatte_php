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
          Update
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="admin.php" class="link-dark rounded">Employee Update</a></li>
            <li><a href="jobadmin.php" class="link-dark rounded">Job Update</a></li>
            <li><a href="dailyadmin.php" class="link-dark rounded">Daily Report Update</a></li>
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
            <h5 class="card-header mb-2">Daily Entries</h5>
            <div class="card-body">
                <form action="" method="post">
    
                    <div class="form-group  w-50">
                        <label for="usr">Date</label>
                        <input type="date" class="form-control" id="usr" name="date" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Select Employee ID</label>
                        <?php
                            $sql = "SELECT *from employee";
                            $result = mysqli_query($conn, $sql);
                        ?>
                        <select name="empid" class="form-control" onchange="showCustomer(this.value)" required>
                            <option value="">Select a Employee:</option>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=".$row['empid'].">".$row['empid']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div id="txtHint"></div>
                    <div class="form-group  w-50">
                        <?php
                            $sql = "SELECT *from job";
                            $result = mysqli_query($conn, $sql);
                        ?>
                        <label for="usr">Select Job ID:</label>
                        <select name="jobid" class="form-control" onchange="showCustomer1(this.value)" required>
                            <option value="">Select a Job:</option>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value=".$row['jobid'].">".$row['jobid']."</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div id="txtHint1"></div>
                    <div class="form-group  w-50">
                        <label for="usr">Starting Time:</label>
                        <input type="datetime-local" class="form-control" id="usr" name="starttime" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Ending Time :</label>
                        <input type="datetime-local" class="form-control" id="usr" name="endtime" required>
                    </div>
                    <div class="form-group  w-50">
                        <label for="usr">Lunch :</label>
                        <select class="form-control" name="lunch" id="">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group  w-50">
                        <label for="usr">Hollyday :</label>
                        <select class="form-control" name="hollyday" id="">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    <div class="form-group  w-50">
                        <button type="submit" name="btn" class="btn btn-success mt-2">Register</button>
                    </div>
                </form>
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
  
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>

      <script src="./bootstrap/js/sidebars.js"></script>
  </body>
</html>