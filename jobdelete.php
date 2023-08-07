<?php
    include('database.php');
    $jobid=$_GET['jobid'];
?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete Record</h2>
                    <form action="" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="jobid" value="<?php echo $jobid; ?>"/>
                            <p>Are you sure you want to delete this job record?</p>
                            <p>
                                <input type="submit" value="Yes" name="yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-secondary ml-2">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    <?php
        if(isset($_POST['yes']))
            {
                $jobid=$_POST['jobid'];
                $sql = "DELETE FROM job WHERE jobid = '$jobid'";
                if(mysqli_query($conn, $sql)){
                     echo '<div class="alert alert-danger">
                            <p>Deleted Success</p>
                            <p>
                                <a href="jobadmin.php" class="btn btn-secondary ml-2">Go Back</a>
                            </p>
                        </div>';
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                }
            }
    ?>