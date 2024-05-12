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
                    <div class="col-md-12 grid-margin">
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="addEmployeeForm.php" class="btn btn-primary btn-rounded btn-md"><i class="ti-plus btn-icon-prepend"></i>Add New Employee</a>
                            <div>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title text-md-center text-xl-left">Employee Profile</p>
                                <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                <div align="right"><a href="view_data.php" data-toggle="tooltip" title="View">
                                        <button type="button" class="btn btn-outline-dark btn-sm btn-rounded"><i class="ti-info btn-icon-prepend">EMPLOYEES INFORMATIONS</i></button>
                                        </a></div><br>
                                    <?php
                                    if (isset($_SESSION['status']))
                                    {
                                        ?>
                                        <div class="alert alert-success border border-muted alert-dismissible fade show" role="alert">
                                            <?= $_SESSION['status']; ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?php
                                        unset($_SESSION['status']);
                                    }
                                    ?>
                                    <table id="example1" class="table table-hover" style="width:100%">
                                        <thead style="font-size:10px" class="text-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Operation</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <tr>
                                            <?php
                                            $number = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            ?>
                                            <td><b><?= $number; ?></b></td>
                                            <td><?= htmlspecialchars($row['name']); ?></td>
                                       
                                            <td>
                                                
                                                <a href="addEmployeeForm.php?edit=<?php echo $row['id']; ?>" title="Edit">
                                                    <button class="btn btn-outline-primary btn-sm btn-rounded" ><i class="ti-pencil-alt btn-icon-prepend"></i></button>
                                                </a>
                                    
                                               <a href="f_employeeprofile.php?delete=<?php echo $row['id']; ?>"><button type="button" class="btn btn-outline-danger btn-sm btn-rounded">
                                                <i class="ti-trash btn-icon-prepend"></a></i></button>

                                            </td>
                                        </tr>
                                        <?php
                                        $number++;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
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