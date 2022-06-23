<?php 

include '../connect.php';

$sql = "select * from financial_record"; // select all the data in DB

$result = mysqli_query($conn, $sql); // query to get the data

?>

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