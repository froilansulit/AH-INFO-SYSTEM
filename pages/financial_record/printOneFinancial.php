<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
include '../session.php';
include '../connect.php';

if(isset($_GET['print'])) {
    $detail = $_GET['print'];
    $sql = "SELECT * FROM financial_record WHERE id='$detail'"; // select all the data in DB

    $result = mysqli_query($conn, $sql); // query to get the data
}

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
        <a href="/AH-S-KIOSK-master/pages/financial_record/" class="btn btn-primary hide_me"> Back</a>
        <button class="btn btn-dark hide_me float-right" onclick="window.print()"><i class="ti-printer btn-icon-prepend"></i> Print</button>
        <div class="card mt-5">
            <div class="card-body">
                <h2 class="text-center">AH ARAULLO & SONS SLIPWAYS INC.</h2>
                <h3 class="text-center text-muted">940 M. Naval St. San Jose Navotas City</h3>
                <h4 class="text-center text-muted">Tel No. 282-8940 | 463-1460</h4>
                <hr>
                <div class="mt-5">
                    <?php 
                    
                    
                    while ($row = mysqli_fetch_assoc($result)) { ?>



                        <h5>O.R Number: <?= $row['or_number'] ?></h5><br>
                        <h5 class="float-right">Date: <?= $row['date_set'] ?></h5><br>

                        <h5>Transaction Name: </h5><br>
                        <h5><?= $row['cname'] ?></h5>
                        <br>
                        <h5>Amount: <?= '₱ ' . number_format($row['amount']); ?></h5><br><br><br><br>

                        <h5>Encoded by: <?= $row['encoded_by']; ?></h5>
                        <h5 class="float-right">______________________</h5><br><br>
                        <h5 class="float-right">Customer Signature</h5><br><br>
                        
                        <h4 class="text-muted text-center">Note: Not Valid Without Dry Seal</h4>
                    <?php
                        
                    }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>

  <?php include '../scripts.php'; ?>
  <script src="../app.js"></script>
</body>

</html>