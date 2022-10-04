<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
include '../session.php';
include '../connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['Add_OR_image'])) {

    $OR_Number = $_POST['OR_number_verify'];
    $image = $_FILES["or_image"]['name'];

    if (empty($OR_Number)) {

      $_SESSION['error'] = "All fields are required !";
    } else {

      $OR_query = "select * from financial_record where or_number='$OR_Number'";
      $OR_query_run = mysqli_query($conn, $OR_query);

      while ($row = mysqli_fetch_assoc($OR_query_run)) {

        $escape_cname = mysqli_real_escape_string($conn, $row['cname']);
        $escape_dateSet = mysqli_real_escape_string($conn, $row['date_set']);
        $escape_purpose = mysqli_real_escape_string($conn, $row['purpose']);

        $escape_amount = mysqli_real_escape_string($conn, $row['amount']);
        $escape_mdate = mysqli_real_escape_string($conn, $row['month_date']);
        $escape_ydate = mysqli_real_escape_string($conn, $row['year_date']);
        $escape_encoded = mysqli_real_escape_string($conn, $row['encoded_by']);



        if ($image == NULL) {
          // update with existing image
          $image_data = $row['images'];
        } else {
          # update with new image and delete the old
          if (file_exists("upload/" . $_FILES["or_image"]['name'])) {

            $store =  $_FILES["or_image"]['name'];
            $_SESSION['error'] = "Image already exist. <b>$store</b>, Try Another Image ";
            header('location: ../financial_record/');
            mysqli_close($conn);
          } else {
            if ($row['images'] == "NP") {
              if ($img_path = "upload/" . $row['images']) {

                // unlink($img_path);

                $image_data = $_FILES["or_image"]['name'];
              }
            } else {
              if ($img_path = "upload/" . $row['images']) {

                unlink($img_path);

                $image_data = $_FILES["or_image"]['name'];
              }
            }
          }
        }
      }



      $escape_OR = mysqli_real_escape_string($conn, $OR_Number);


      $sql = "update financial_record set cname='$escape_cname',date_set='$escape_dateSet', purpose='$escape_purpose', or_number='$escape_OR', images='$image_data' ,amount='$escape_amount', month_date='$escape_mdate', year_date='$escape_ydate',encoded_by='$escape_encoded' where or_number='$escape_OR'";
      $result = mysqli_query($conn, $sql);

      if ($result) {

        if ($image == NULL) {
          // update with existing image
          $_SESSION['status'] = "Updated Successfully with current data !";
          echo "
          <script>
          
          setTimeout (() => {
            location.href = '../financial_record/';
          }, 3000);
          </script>
          ";
        } else {
          # update with new image and delete the old
          move_uploaded_file($_FILES["or_image"]['tmp_name'], "upload/" . $_FILES["or_image"]['name']);
          $_SESSION['status'] = "Updated Successfully !";
          echo "
          <script>
          
          setTimeout (() => {
            location.href = '../financial_record/';
          }, 3000);
        
          </script>
          ";
        }
      }
    }
  }
}

$inc_rec = 0;
$out_rec = 0;
$total = 0;

if (isset($_POST['year_submit'])) {

  $year = $_POST['year_select'];

  $sql = "select * from financial_record where year_date='$year'"; // select all the data in DB

  $result = mysqli_query($conn, $sql); // query to get the data

  // $currentYear = date('Y');
    $inc_rec = 0;
    $out_rec = 0;


    $finacial_sql = "select * from financial_record where purpose='Incoming' AND year_date='$year'"; // select all the data in DB

    $financial_result = mysqli_query($conn, $finacial_sql); // query to get the data

    while ($row = mysqli_fetch_assoc($financial_result)) {
      $inc_rec += $row['amount'];
    }

    $financial_sql2 = "select * from financial_record where purpose='Outgoing' AND year_date='$year'"; // select all the data in DB

    $result2 = mysqli_query($conn, $financial_sql2); // query to get the data

    while ($row = mysqli_fetch_assoc($result2)) {
      $out_rec += $row['amount'];
    }

    $total = $inc_rec - $out_rec;

  // $custom_result = mysqli_query($conn, $sql); // query to get the data
  // $custom_row = mysqli_fetch_assoc($custom_result);

  // $remarks = $custom_row['cname'];
  // $dateSet = $custom_row['date_set'];
  // $purpose = $custom_row['purpose'];
}

if (isset($_POST['MY_submit'])) {


  $year = $_POST['year_select'];
  //date('F', mktime(0, 0, 0, $i_month))
  $month = $_POST['month'];


  $sql = "select * from financial_record where month_date='$month' AND year_date='$year'"; // select all the data in DB

  $result = mysqli_query($conn, $sql); // query to get the data

    $inc_rec = 0;
    $out_rec = 0;


    $finacial_sql = "select * from financial_record where purpose='Incoming' AND month_date='$month' AND year_date='$year'"; // select all the data in DB

    $financial_result = mysqli_query($conn, $finacial_sql); // query to get the data

    while ($row = mysqli_fetch_assoc($financial_result)) {
      $inc_rec += $row['amount'];
    }

    $financial_sql2 = "select * from financial_record where purpose='Outgoing' AND month_date='$month' AND year_date='$year'"; // select all the data in DB

    $result2 = mysqli_query($conn, $financial_sql2); // query to get the data

    while ($row = mysqli_fetch_assoc($result2)) {
      $out_rec += $row['amount'];
    }

    $total = $inc_rec - $out_rec;
}



// while($row=mysqli_fetch_assoc($result)) {
//   if ($id == $row['id']) {

//     $_SESSION['amount'] = $row['amount'];
//     $money = $_SESSION['amount'];

//     $total = $money + 500;
//     $dstotal = "P " .$total;

//   }
// }

?>

<!-- for session -->

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include '../navbar.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include '../sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" style="background-color:#bddcff;">
          <div class="row">
            <?php 
            
            if(isset($_POST['year_submit'])) {
              ?>

<div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Financial</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo '₱ ' . number_format($total); ?></h3>
                    
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>This Month</small></span></p>
                </div>
              </div>
            </div>
              <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total of Incoming</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo '₱ ' . number_format($inc_rec); ?></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>This Month</small></span></p>
                </div>
              </div>
            </div>
              <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total of Outgoing</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo '₱ ' . number_format($out_rec); ?></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>This Month</small></span></p>
                </div>
              </div>
            </div>
              
              <?php
            }

            ?>

            <?php 
            
            if(isset($_POST['MY_submit'])) {
              ?>

            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Financial</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo '₱ ' . number_format($total); ?></h3>
                    
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>Month of <?php echo $month .' ' .$year;   ?></small></span></p>
                </div>
              </div>
            </div>
              <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total of Incoming</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo '₱ ' . number_format($inc_rec); ?></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>Month of <?php echo $month .' ' .$year;   ?></small></span></p>
                </div>
              </div>
            </div>
              <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total of Outgoing</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?php echo '₱ ' . number_format($out_rec); ?></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>Month of <?php echo $month .' ' .$year;   ?></small></span></p>
                </div>
              </div>
            </div>
              
              <?php
            }

            ?>

            

            <div class="col-md-12 grid-margin stretch-card">
            <div class="form-group" id="view_year_only" style="display: none;">
                    <form method="post" class="form-inline">
                      <select name="year_select" class="custom-select">
                        <?php
                        for ($i = 2021; $i <= date('Y'); $i++) {
                          echo "<option>$i</option>";
                        }
                        ?>
                      </select>
                      <button class="btn btn-primary ml-3" type="submit" name="year_submit">Submit</button>
                    </form>
                  </div>

                  <div class="form-group" id="view_MY_only" style="display: none;">
                    <form method="post" class="form-inline">
                      <select name="year_select" class="custom-select">
                        <?php
                        for ($i = 2021; $i <= date('Y'); $i++) {
                          echo "<option>$i</option>";
                        }
                        ?>
                      </select>

                      <select placeholder="MM" name="month" class="custom-select ml-3">
                        <option name="" value="" style="display:none;">MM</option>
                        <option name="January" value="January">January</option>
                        <option name="February" value="February">February</option>
                        <option name="March" value="March">March</option>
                        <option name="April" value="April">April</option>
                        <option name="May" value="May">May</option>
                        <option name="June" value="June">June</option>
                        <option name="July" value="July">July</option>
                        <option name="August" value="August">August</option>
                        <option name="September" value="September">September</option>
                        <option name="October" value="October">October</option>
                        <option name="November" value="November">November</option>
                        <option name="December" value="December">December</option>
                      </select>

                      <button class="btn btn-dark ml-3" type="submit" name="MY_submit">Submit</button>
                    </form>
                  </div>
            </div>
          


            <!-- row end -->
          </div>

          

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Financial Record <span class="text-danger">(Custom)</span></p>
                  <button class="btn btn-primary mb-3" name="custom_year_submit" id="custom_year_submit">Year Only</button>
                  <button class="btn btn-dark mb-3" name="custom_MY_submit" id="custom_MY_submit">Month and Year</button>
                  <a href="../financial_record/custom_details.php" class="btn btn-outline-danger mb-3"><i class="ti-reload btn-icon-prepend"></i> Refresh</a>




                  <div class="dropdown">
                    <a class="btn btn-primary btn-sm float-right dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                      Display
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="../financial_record/">Home</a>
                      <a class="dropdown-item" href="year_details.php">This Year</a>
                      <a class="dropdown-item" href="all_details.php">All</a>
                      <!-- <a class="dropdown-item" href="#">All</a> -->
                    </div>
                  </div>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">

                    <?php
                    if (isset($_SESSION['status'])) {
                    ?>
                      <div class="alert alert-success border border-muted alert-dismissible fade show" role="alert">
                        <!-- <strong>Holy guacamole!</strong> -->
                        <?php echo $_SESSION['status']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                    <?php
                      unset($_SESSION['status']);
                    }


                    ?>

                    <?php
                    if (isset($_SESSION['error'])) {
                    ?>
                      <div class="alert alert-danger border border-muted alert-dismissible fade show" role="alert">
                        <!-- <strong>Holy guacamole!</strong> -->
                        <?php echo $_SESSION['error']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                    <?php
                      unset($_SESSION['error']);
                    }


                    ?>



                    <table id="example1" class="table table-hover" style="width:100%">
                      <thead style="font-size:10px" class="text-center">
                        <tr>
                          <th>ID</th>
                          <th>Remarks</th>
                          <th>Date</th>
                          <th>Purpose</th>
                          <th>OR Number</th>
                          <th>Image</th>
                          <th>Amount</th>
                          <th>Encoded by</th>
                          

                        </tr>
                      </thead>
                      <tbody class="text-center">
                        <tr>
                          <?php
                          if (isset($_POST['year_submit']) || isset($_POST['MY_submit'])) {

                          $count = mysqli_num_rows($result);
                          if ($count > 0) {
                            
                          } else {
                            $_SESSION['error'] = "No Data Found !";
                            // $no_result = "No Data Found !";
                          }
                        }
                          ?>
                          <?php if (isset($_SESSION['error'])) { ?>
                          <div class="alert alert-danger border border-muted alert-dismissible fade show" role="alert">
                            <!-- <strong>Holy guacamole!</strong> -->
                            <?php echo  $_SESSION['error']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <?php
                          unset($_SESSION['error']);
                          }
                         
                          ?>
                          <?php

                          if (isset($_POST['year_submit']) || isset($_POST['MY_submit'])) {



                            $number = 1;
                            while ($row = mysqli_fetch_assoc($result)) {

                              $id = $row['id'];
                          ?>

                              <td><b><?php echo $number; ?></b></td>
                              <td><?php echo $row['cname']; ?></td>
                              <td><?php echo $row['date_set']; ?></td>

                              <td><span class=" <?php if ($row['purpose'] == "Outgoing") {
                                                  echo 'badge badge-pill badge-danger';
                                                } else {
                                                  echo 'badge badge-pill badge-primary';
                                                } ?>"><?php echo $row['purpose']; ?></span></td>
                              <td><?php echo $row['or_number']; ?></td>

                              <td>
                                <?php if ($row['images'] == "NP") {
                                ?>
                                  <button type="button" class="btn btn-danger btn-icon-text btn-rounded btn-sm" data-toggle="modal" data-target="#Add_OR_Image" onclick="GetORNUMBER(<?php echo $id; ?>)">
                                    Add Image
                                  </button>


                                <?php

                                } else {
                                ?>

                                  <button id="viewOR_image" class="btn btn-sm btn-rounded btn-dark" data-id="<?php echo $id ?>">View</button>
                                <?php

                                }
                                ?>


                              </td>

                              <td><?php echo '₱ ' . number_format($row['amount']); ?></td>

                              <td><?php echo $row['encoded_by']; ?></td>

                              


                        </tr>

                    <?php
                              $number++;
                            }
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
        <?php include '../modals.php'; ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->



  <?php include '../scripts.php'; ?>
  <script src="../app.js"></script>

  
    


</body>

</html>