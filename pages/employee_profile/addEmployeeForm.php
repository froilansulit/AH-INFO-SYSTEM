<!DOCTYPE html>
<html lang="en">
<style>
    /* Change disabled Button color  */
    #addUser:disabled {
        background-color: black;
        opacity: 0.2;
    }
</style>
<?php
include '../head.php';
include '../session.php';
include '../connect.php';
require_once 'f_employeeprofile.php';
if ($user_type == "user") {
    header('location: ../dashboard/');
}

$sql = "SELECT * FROM employee_profile"; // select all the data in DB
$result = mysqli_query($conn, $sql); // query to get the data
?>
<body>

<div class="container-scroller">
    <?php include '../navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
        <?php include '../sidebar.php'; ?>
        <div class="main-panel">
            <div class="content-wrapper" style="background-color:background: rgb(9,41,66);
background: linear-gradient(61deg, rgba(9,41,66,1) 23%, rgba(118,168,208,1) 92%);background-position: center;background-size: cover; background-attachment: fixed;">
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Employee Profile</p>
                                <form action="f_employeeprofile.php" method="post" enctype="multipart/form-data" >
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="form-group">
                                        <label for="">Name:</label>
                                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Title:</label>
                                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Department:</label>
                                        <input type="text" name="department" value="<?php echo $department; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hire Date:</label>
                                        <input type="text" name="hire_date" value="<?php echo $hire_date; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Daily Rate:</label>
                                        <input type="text" name="daily_rate" value="<?php echo $daily_rate; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Schedule:</label>
                                        <input type="text" name="schedule" value="<?php echo $schedule; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
							            <label>Image:</label>	  
							            <input type="file" name="image" id="image" class="form-control" style="max-width:500px;">
					                </div>
                                
                                
                                <br>

					<center>
					<div class="form-group">
					<?php 
					
					if($update==true):
					?>
					
					<button class="btn btn-primary" id="insert" name="update" type="submit" value="Upload Image"> UPDATE
					 </button> 
					 
					<?php else: ?>
							   <button class="btn btn-primary" id="insert" name="submit" type="submit" value="Upload Image"> SUBMIT
							   </button>
					<?php endif; ?>
                            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include '../footer.php'; ?>
        </div>
    </div>
</div>
<?php
include '../scripts.php';

?>
<script type="text/javascript" src="../app.js"></script>
</body>
</html>