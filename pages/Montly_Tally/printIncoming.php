<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
include '../session.php';
include '../connect.php';

// if(isset($_GET['print'])) {
//     $detail = $_GET['print'];
//     $sql = "SELECT * FROM financial_record WHERE id='$detail'"; // select all the data in DB

//     $result = mysqli_query($conn, $sql); // query to get the data
// }

$currentMonth = date('F');
$currentYear = date('Y');
$inc_rec = 0;
$out_rec = 0;

$sql = "SELECT * FROM financial_record WHERE purpose='Incoming' AND month_date='$currentMonth' AND year_date='$currentYear'"; // select all the data in DB

$result = mysqli_query($conn, $sql); // query to get the data

while ($row = mysqli_fetch_assoc($result)) {
    $inc_rec += $row['amount'];
}


$sql = "SELECT * FROM financial_record WHERE month_date='$currentMonth' AND year_date='$currentYear' AND purpose='Incoming'"; // select all the data in DB

$result = mysqli_query($conn, $sql); // query to get the data
?>
<style>
	hr {
		border-top: 3px double #8c8b8b;
		top: 20px;
	}
</style>
<!-- for session -->
<body>
    <div class="container mt-5">
        <a href="/AH-S-KIOSK-master/pages/Montly_Tally/" class="btn btn-primary hide_me"> Back</a>
        <button class="btn btn-dark hide_me float-right" onclick="window.print()"><i class="ti-printer btn-icon-prepend"></i> Print</button>
        <div class="card mt-5">
            <div class="card-body">
                <h2 class="text-center">AH ARAULLO & SONS SLIPWAYS INC.</h2>
                <h3 class="text-center text-muted">940 M. Naval St. San Jose Navotas City</h3>
                <h4 class="text-center text-muted">Tel No. 282-8940 | 463-1460</h4>
                <hr>
                <h4 class="text-center">Revenue for the of Month of <?= $currentMonth ?></h4>
                <hr>
                <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <table class="table table-bordered table-hover" style="width:100%">
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
                            <td><span class=" <?php if ($row['purpose'] == "Outgoing") {
                                                echo 'badge badge-pill badge-danger';
                                              } else {
                                                echo 'badge badge-pill badge-primary';
                                              } ?>">
                                              <?php
                                              if ($row['purpose'] == "Outgoing") {
                                                echo 'Reimbursement';
                                                
                                              } else {
                                                echo 'Revenue';
                                              }
                                              ?>
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
                  <hr>
                  <h4 class="float-right">Total: <?= '₱ ' . number_format($inc_rec); ?></h4>
            </div>
        </div>
    </div>

  <?php include '../scripts.php'; ?>
  <script src="../app.js"></script>
</body>

</html>