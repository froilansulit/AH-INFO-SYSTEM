<!DOCTYPE html>
<html lang="en">
<?php

    include '../head.php';
    include '../session.php';
    include '../connect.php';

    $month_now = date('F');
    $year_now = date('Y');
    $inc_rec = 0;
    $out_rec = 0;

    $sql = "SELECT * FROM financial_record WHERE purpose='Incoming' AND month_date='$month_now' AND year_date='$year_now'"; // select all the data in DB

    $result = mysqli_query($conn, $sql); // query to get the data

    while ($row = mysqli_fetch_assoc($result)) {
        $inc_rec += $row['amount'];
    }

    $sql = "SELECT * FROM financial_record WHERE purpose='Outgoing' AND month_date='$month_now' AND year_date='$year_now'"; // select all the data in DB

    $result = mysqli_query($conn, $sql); // query to get the data

    while ($row = mysqli_fetch_assoc($result)) {
        $out_rec += $row['amount'];
    }

    $total = $inc_rec - $out_rec;

    $sql = "SELECT * FROM financial_record WHERE month_date='$month_now'AND year_date='$year_now'"; // select all the data in DB

    $result = mysqli_query($conn, $sql); // query to get the data
?>
<body>
  <div class="container-scroller">
<?php include '../navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
<?php include '../sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper" style="background-color:#bddcff;">
          <div class="row">
          <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Total Financial</p>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= '₱ ' . number_format($total); ?></h3>
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
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= '₱ ' . number_format($inc_rec); ?></h3>
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
                    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0"><?= '₱ ' . number_format($out_rec); ?></h3>
                    <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                  </div>  
                  <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small>This Month</small></span></p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left font-weight-bold" style="">Monthly Tally <span class="text-danger ">(Month of <?= date('F'); ?>)</span></p>
                  <a href="../financial_record/pdfDownload.php" class="btn btn-dark btn-sm float-right btn-icon-text ml-3" ><i class="ti-printer btn-icon-prepend"></i>Print</a>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <table id="example1" class="table table-hover" style="width:100%">
                      <thead style="font-size:10px" class="text-center">
                        <tr>
                          <th>ID</th>
                          <th>Remarks</th>
                          <th>Date</th>
                          <th>Purpose</th>
                          <th>OR Number</th>
                          <th>Amount</th>
                          <th>Encoded by</th>                        
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
                            <td><?= $row['cname']; ?></td>
                            <td><?= $row['date_set']; ?></td>

                            <td><span class=" 
<?php                       if ($row['purpose'] == "Outgoing") {
                              echo 'badge badge-pill badge-danger';
                            } 
                            else {
                              echo 'badge badge-pill badge-primary';
                            }
?>
                            ">
                            <?= $row['purpose']; ?>
                            </span></td>
                            <td><?= $row['or_number']; ?></td>
                            <td><?= '₱ ' . number_format($row['amount']); ?></td>
                            <td><?= $row['encoded_by']; ?></td>
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
<?php 
include '../footer.php';
include '../modals.php';
?>
      </div>
    </div>
  </div>
<?php include '../scripts.php'; ?> 
</body>
</html>