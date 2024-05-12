<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
include '../session.php';
include '../connect.php';


$month = date('F');
$year = date('Y');


$sql = "select * from drydock_record WHERE month='$month' AND year='$year'"; // select all the data in DB
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
        <a href="/AH-S-KIOSK-master/pages/drydock/" class="btn btn-primary hide_me"> Back</a>
        <button class="btn btn-dark hide_me float-right" onclick="window.print()"><i class="ti-printer btn-icon-prepend"></i> Print</button>
        <div class="card mt-5">
            <div class="card-body">
                <h2 class="text-center">AH ARAULLO & SONS SLIPWAYS INC.</h2>
                <h3 class="text-center text-muted">940 M. Naval St. San Jose Navotas City</h3>
                <h4 class="text-center text-muted">Tel No. 282-8940 | 463-1460</h4>
                <hr>
                <h4 class="text-center">Tugboat Renting for the of Month of <?= $month ?></h4>
                <hr>
                <div class="mt-5">
                <table class="table table-bordered table-hover" style="width:100%">
                                            <thead style="font-size:10px" class="text-center">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Company Name</th>
                                                    <th>Ship Name</th>
                                                    <th>Lot Number</th>
                                                    <th>Drydock Date</th>
                                                    <th>Expected Departure</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
<?php
$number = 1;
while ($row = mysqli_fetch_assoc($result)) 
{
$id = $row['id']; 
?>

                                                        <th scope="row"><?= $number; ?></th>
                                                        <td><?= $row['Company_Name']; ?></td>
                                                        <td><?= $row['Ship_Name']; ?></td>
                                                        <td><?= $row['Lot_Num']; ?></td>
                                                        <td><?= $row['Drydock_date']; ?></td>
                                                        <td><?= $row['Exp_Departure']; ?></td>
                                                        
                                                </tr>
<?php $number++;
}
?>
                                            </tbody>
                                        </table>
                </div>
            </div>
        </div>
    </div>

  <?php include '../scripts.php'; ?>
  <script src="../app.js"></script>
</body>

</html>