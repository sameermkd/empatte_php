<?php
    include('database.php');
    $empid=$_GET['empid'];
    $sql = "SELECT *from employee WHERE empid='$empid'";
    $result = mysqli_query($conn, $sql);
?>
<?php
    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

    echo '<div class="form-group  w-50">';
    echo '<label for="usr">Employee Name:</label>';
    echo '<input type="text" class="form-control" id="usr" name="empname" value="'. $row["empname"].'">';
    echo '</div>';
    }
}
?>
