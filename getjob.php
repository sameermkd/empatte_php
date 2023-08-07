<?php
    include('database.php');
    $jobid=$_GET['jobid'];
    $sql = "SELECT *from job WHERE jobid='$jobid'";
    $result = mysqli_query($conn, $sql);
?>
<?php
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

    echo '<div class="form-group  w-50">';
    echo '<label for="usr">Customer Name:</label>';
    echo '<input type="text" class="form-control" id="usr" name="customername" value="'. $row["customername"].'">';
    echo '</div>';
    echo '<div class="form-group  w-50">';
    echo '<label for="usr">Job Description:</label>';
    echo '<textarea class="form-control" id="usr" name="jobdesc">'. $row["jobdesc"].'</textarea>';
    echo '</div>';
    }
}
?>
