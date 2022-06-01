<!DOCTYPE html>
<html lang="en">

<?php
include '../head.php';
include '../session.php';
include '../connect.php';



$sql = "select * from financial_record"; // select all the data in DB

$result = mysqli_query($conn, $sql); // query to get the data

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
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <button type="button" class="btn btn-primary btn-icon-text btn-rounded btn-md" data-toggle="modal" data-target="#add-Incoming">
                    <i class="ti-plus btn-icon-prepend"></i>Add Incoming
                  </button>
                  <button type="button" class="btn btn-danger btn-icon-text btn-rounded btn-md" data-toggle="modal" data-target="#add-Outgoing">
                    <i class="ti-plus btn-icon-prepend"></i>Add Outgoing
                  </button>
                </div>
                <div>


                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Financial Record</p>
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

                            <td><b><?php echo $number; ?></b></td>
                            <td><?php echo $row['cname']; ?></td>
                            <td><?php echo $row['date_set']; ?></td>

                            <td><span class=" <?php if ($row['purpose'] == "Outgoing") {
                                                echo 'badge badge-pill badge-danger';
                                              } else {
                                                echo 'badge badge-pill badge-primary';
                                              } ?>"><?php echo $row['purpose']; ?></span></td>
                            <td><?php echo $row['or_number']; ?></td>
                            <td><?php echo '₱ ' . number_format($row['amount']); ?></td>
                            
                            <td><?php echo $row['encoded_by']; ?></td>

                            <td>

                            <a href="#" data-toggle="tooltip" title="Edit">
                              <button class="btn btn-outline-primary btn-sm btn-rounded" data-toggle="modal" data-target="#UpdateFinancial" onclick="GetData(<?php echo $id; ?>)"><i class="ti-pencil-alt btn-icon-prepend"></i></button>
                            </a>
                              <a href="#" data-toggle="tooltip" title="Remove">
                                <button type="button" class="btn btn-outline-danger btn-sm btn-rounded" onclick="DeleteRecord(<?php echo $id; ?>)"><i class="ti-trash btn-icon-prepend"></i></button>
                              </a>
                              <a href="#" data-toggle="tooltip" title="View">
                                <button type="button" class="btn btn-outline-dark btn-sm btn-rounded" data-toggle="modal" data-target="#ViewFinancial" onclick="ViewData(<?php echo $id; ?>)"><i class="ti-info btn-icon-prepend"></i></button>
                              </a>
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

  <script>
    $(document).ready(function() {
      $("#txtNumeric").keydown(function(e) {
        if ((e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
          (e.keyCode >= 35 && e.keyCode <= 40) ||
          $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
          return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &&
          (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
        }
      });
    });

    $(document).ready(function() {
      $("#txtNumeric2").keydown(function(e) {
        if ((e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
          (e.keyCode >= 35 && e.keyCode <= 40) ||
          $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1) {
          return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) &&
          (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
        }
      });
    });


    $(document).ready(function() {
      $(document).on('click', '#addIncoming', function() {
        var FRI_name = $('#FRI_name').val();
        var FRI_date = $('#FRI_date').val();
        var FRI_purpose = $('#FRI_purpose').val();
        var FRI_OR = $('#FRI_OR').val();
        var FRI_amount = $('.FRI_amount').val();
        var FRI_month = $('#FRI_month').val();
        var FRI_encoded = $('#FRI_encoded').val();




        $("#lblFRI_name").html("");
        $("#lblFRI_OR").html("");
        $("#lblFRI_amount").html("");

        if (FRI_name == "") {
          $("#lblFRI_name").html("Enter Remarks");
        } else if (FRI_OR == "") {
          $("#lblFRI_OR").html("Enter OR Number");
        } else if (FRI_amount == "") {
          $("#lblFRI_amount").html("Enter Amount");
        } else {
          $("#lblFRI_name").html("");
          $("#lblFRI_OR").html("");
          $("#lblFRI_amount").html("");



          $.ajax({
            url: "add_incoming.php",
            type: 'post',
            data: {
              FRI_nameSend: FRI_name,
              FRI_dateSend: FRI_date,
              FRI_purposeSend: FRI_purpose,
              FRI_ORSend: FRI_OR,
              FRI_amountSend: FRI_amount,
              FRI_monthSend: FRI_month,
              FRI_encodedSend: FRI_encoded
            },
            
            success: function(data) {
              //alert("Success");
              // $('#add-Product').modal('hide');
              // location.reload();
              Swal.fire(
                'Congratulations!',
                'Successfully Added!',
                'success'
              )
              location.reload();
            }
          });
        }
      })
    });

    $(document).ready(function() {
      $(document).on('click', '#addOutgoing', function() {

        var FRO_name = $('#FRO_name').val();
        var FRO_date = $('#FRO_date').val();
        var FRO_purpose = $('#FRO_purpose').val();
        var FRO_OR = $('#FRO_OR').val();
        var FRO_amount = $('.FRO_amount').val();
        var FRO_month = $('#FRO_month').val();
        var FRO_encoded = $('#FRO_encoded').val();




        $("#lblFRO_name").html("");
        $("#lblFRO_OR").html("");
        $("#lblFRO_amount").html("");

        if (FRO_name == "") {
          $("#lblFRO_name").html("Enter Remarks");
        } else if (FRO_OR == "") {
          $("#lblFRO_OR").html("Enter OR Number");
        } else if (FRO_amount == "") {
          $("#lblFRO_amount").html("Enter Amount");
        } else {
          $("#lblFRO_name").html("");
          $("#lblFRO_OR").html("");
          $("#lblFRO_amount").html("");

          // alert("Hello");


          $.ajax({
            url: "add_outgoing.php",
            type: 'post',
            data: {
              FRO_nameSend: FRO_name,
              FRO_dateSend: FRO_date,
              FRO_purposeSend: FRO_purpose,
              FRO_ORSend: FRO_OR,
              FRO_amountSend: FRO_amount,
              FRO_monthSend: FRO_month,
              FRO_encodedSend: FRO_encoded
            },

            success: function(data) {
              //alert("Success");
              // $('#add-Product').modal('hide');
              // location.reload();
              Swal.fire(
                'Congratulations!',
                'Successfully Added!',
                'success'
              )
              location.reload();
            }
          });
        }
      })
    });


    // for deleting record 

    function DeleteRecord(deleteID) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "delete.php",
            type: 'post',
            data: {
              deleteSend: deleteID
            },
            success: function(data, status) {
              Swal.fire(
                'Deleted!',
                'Record has been deleted.',
                'success'
              )
              location.reload();
            }
          });
        }
      })
    }


    function GetData(updateID) {
      // alert(updateID);


      $('#hiddenData').val(updateID);

      $.post("update.php", {
        updateID: updateID
      }, function(data, status) {
        var userID = JSON.parse(data);

        $('#U_name').val(userID.cname);
        // $('#U_date').val(userID.date_set);
        $('#U_purpose').val(userID.purpose);
        $('#U_OR').val(userID.or_number);
        $('.U_amount').val(userID.amount);
        // $('#U_month').val(userID.month_date);
        // $('#U_encoded').val(userID.encoded_by);

      });

    }

    $(document).ready(function() {
      $(document).on('click', '#Up_Financial', function() {
        // alert("hello");
        var U_name = $('#U_name').val();
        var U_date = $('#U_date').val();
        var U_purpose = $('#U_purpose').val();
        var U_OR = $('#U_OR').val();
        var U_amount = $('.U_amount').val();
        var U_month = $('#U_month').val();
        var U_encoded = $('#U_encoded').val();
        var hiddenData = $('#hiddenData').val();




        $("#lblU_name").html("");
        $("#lblU_OR").html("");
        $("#lblU_amount").html("");

        if (U_name == "") {
          $("#lblU_name").html("Enter Remarks");
        } else if (U_OR == "") {
          $("#lblU_OR").html("Enter OR Number");
        } else if (U_amount == "") {
          $("#lblU_amount").html("Enter Amount");
        } else {
          $("#lblU_name").html("");
          $("#lblU_OR").html("");
          $("#lblU_amount").html("");


          $.post("update.php", {
            //  var for Send:Var from declare

            U_name: U_name,
            U_date: U_date,
            U_purpose: U_purpose,
            U_OR: U_OR,
            U_amount: U_amount,
            U_month: U_month,
            U_encoded: U_encoded,
            hiddenData: hiddenData


          }, function(data, status) {
            Swal.fire(
                'Congratulations!',
                'Updated Successfully!',
                'success'
              )
              location.reload();
          });
        }
      })
    });

    

    function ViewData(viewID) {

      // alert(viewID);

      $('#hiddenViewData').val(viewID);

      $.post("view_data.php", {
        viewID: viewID
      }, function(data, status) {
        var userID = JSON.parse(data);
        var vamount = $('#viewfr_Amount');

        $('#viewfr_Name').html(userID.cname);
        $('#viewfr_date').html(userID.date_set);
        $('#viewfr_purpose').html(userID.purpose);
        $('#viewfr_OR').html(userID.or_number);
        $('#viewfr_Amount').val(userID.amount);
        // $('#U_month').val(userID.month_date);
        $('#viewfr_encoded').html(userID.encoded_by);
      }); 
    }
    
    
  </script>
</body>

</html>