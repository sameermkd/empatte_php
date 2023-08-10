  <?php
    include("header.php");
  ?>
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
  <?php
    include("footer.php");
  ?>