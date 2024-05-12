<div class="modal fade" id="add-Incoming">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Revenue</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                    <!-- <div class="form-group col-md-12">
                            <label for="FRI_OR">OR Number:</label>
                            <label id="lblFRI_OR" class="text-danger"></label>
                            <input type="text" class="form-control" id="FRI_OR" name="FRI_OR" placeholder="OR Number" autocomplete="off" minlength="9" onInput="checkValidationFinancial()">
                        </div> -->
                    <div class="form-group col-md-12">
                            <label>Amount:</label>
                            <label for="" id="lblFRI_amount" class="text-danger"></label>
                            <input type="number" class="form-control FRI_amount" id="txtNumeric" placeholder="P 0.00" autocomplete="off" onInput="checkValidationFinancial()">
                            <br>
                            <label for="" class="text-dark font-weight-bold">Currency Format: </label>
                            <label for="" id="lblFRI_currency" class="text-muted font-weight-bold"></label>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="FRI_name">Remarks:</label> 
                            <label for="" id="lblFRI_name" class="text-danger"></label>
                            <input type="text" class="form-control" id="FRI_name" placeholder="Remarks" autocomplete="off" onInput="checkValidationFinancial()">
                        </div>
                        <div class="form-group col-md-4">
                            <!-- <label for="FRI_encoded">Encoded by:</label> -->
                            <input type="hidden" class="form-control" id="FRI_date" value="<?php echo date('F d, Y') ?>" disabled hidden>
                            <input type="hidden" class="form-control" id="FRI_purpose" value="<?php echo 'Incoming' ?>" disabled hidden>
                            <input type="hidden" class="form-control" id="FRI_month" value="<?php echo date('F') ?>" disabled hidden>
                            <input type="hidden" class="form-control" id="FRI_year" value="<?php echo date('Y') ?>" disabled hidden>
                            <input type="hidden" class="form-control" id="FRI_encoded" placeholder="Encoded By" value="<?php echo $acc_name; ?>" disabled hidden>
                        </div>
                        <!-- <div class="form-group col-md-4">
                                <label for="Discount Price">Discount Price</label>
                                <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Expiry Date">Expiry Date</label>
                                <input type="text" class="form-control" id="Expiry Date" placeholder="Expiry Date">
                            </div> -->
                    </div>
                    <!-- <button type="submit" class="btn btn-primary btn-rounded" >Save</button> -->

                    <!-- <button type="submit" class="btn btn-primary btn-rounded" name="submit">Save</button> -->
                    <button type="button" class="btn btn-primary btn-rounded" id="addIncoming" disabled>Save</button>

                    <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                </div>
                <!-- /.card-body -->

                <!-- </form> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- outgoing modal start here -->

<div class="modal fade" id="add-Outgoing">
    <!-- <div class="modal-dialog modal-lg"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Reimbursement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form method="post"> -->
                <div class="card-body">
                    <div class="row">
                        <!-- <div class="form-group col-md-12">
                                <label for="FRI_date">Date: </label>
                                <input type="text" class="form-control" id="FRI_date" placeholder="Name" value="<?php #echo date('F d, Y'); 
                                                                                                                ?>" disabled>
                            </div> -->
                            <div class="form-group col-md-12">
                            <label for="FRO_OR">OR Number:</label>
                            <label for="" id="lblFRO_OR" class="text-danger"></label>

                            <input type="text" class="form-control" name="FRO_OR" id="FRO_OR" placeholder="OR Number" autocomplete="off" onInput="checkValidationFinancial2()">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Amount:</label>
                            <label for="" id="lblFRO_amount" class="text-danger"></label>

                            <input type="number" class="form-control FRO_amount" id="txtNumeric2" placeholder="P 0.00" autocomplete="off" onInput="checkValidationFinancial2()">
                           
                            <br>
                            <label for="" class="text-dark font-weight-bold">Currency Format: </label>
                            <label for="" id="lblFRI_currency2" class="text-muted font-weight-bold"></label>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="FRO_name">Remarks:</label>
                            <label for="" id="lblFRO_name" class="text-danger"></label>

                            <input type="text" class="form-control" id="FRO_name" placeholder="Remarks" autocomplete="off" onInput="checkValidationFinancial2()">
                        </div>
                        <!-- <div class="form-group col-md-4">
                                <label for="FRI_purpose">Purpose:</label>
                                <input type="text" class="form-control" id="FRI_purpose" placeholder="Purpose" value="<?php #echo 'Incoming' 
                                                                                                                        ?>" disabled>
                            </div> -->
                        


                        <!-- <div class="form-group col-md-4">
                                <label for="FRI_month">Month: </label>
                                <input type="text" class="form-control" id="FRI_month" placeholder="month" value="<?php #echo date('F') 
                                                                                                                    ?>" disabled>
                            </div> -->

                        <div class="form-group col-md-4">
                            <!-- <label for="FRI_encoded">Encoded by:</label> -->
                            <input type="hidden" class="form-control" id="FRO_date" value="<?php echo date('F d, Y') ?>" disabled hidden>

                            <input type="hidden" class="form-control" id="FRO_purpose" value="<?php echo 'Outgoing' ?>" disabled hidden>

                            <input type="hidden" class="form-control" id="FRO_month" value="<?php echo date('F') ?>" disabled hidden>

                            <input type="hidden" class="form-control" id="FRO_year" value="<?php echo date('Y') ?>" disabled hidden>

                            <input type="hidden" class="form-control" id="FRO_encoded" placeholder="Encoded By" value="<?php echo $acc_name; ?>" disabled hidden>
                        </div>
                        
                        
                    </div>
                    <!-- <button type="submit" class="btn btn-primary btn-rounded" >Save</button> -->

                    <!-- <button type="submit" class="btn btn-primary btn-rounded" name="submit">Save</button> -->


                    <button type="button" class="btn btn-primary btn-rounded" id="addOutgoing" disabled>Save</button>
                    
                    <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                </div>
                <!-- /.card-body -->

                <!-- </form> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- outgoing modal end here -->

<!-- update financial record start here -->


<div class="modal fade" id="UpdateFinancial">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Financial</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-12">
                            <label for="U_name">Remarks:</label>
                            <input type="text" class="form-control" id="U_name" placeholder="Remarks" autocomplete="off">
                            <label for="" id="lblU_name" class="text-danger"></label>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="U_OR">OR Number:</label>
                            <input type="text" class="form-control" id="U_OR" placeholder="OR Number" autocomplete="off">
                            <label for="" id="lblU_OR" class="text-danger"></label>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Amount:</label>
                            <input type="number" class="form-control U_amount" id="txtNumeric2" placeholder="P 0.00" autocomplete="off" onInput="checkValidationFinancial()">

                            <label for="" id="lblU_amount" class="text-danger"></label>

                            <br>
                            <label for="" class="text-dark font-weight-bold">Currency Format: </label>
                            <label for="" id="lblFRI_currency3" class="text-muted font-weight-bold"></label>
                        </div>

                        <div class="form-group col-md-4">

                            <input type="hidden" class="form-control" id="U_date" value="<?php echo date('F d, Y') ?>" disabled hidden>

                            <input type="hidden" class="form-control" id="U_purpose" disabled hidden>

                            <input type="hidden" class="form-control" id="U_month" value="<?php echo date('F') ?>" disabled hidden>

                            <input type="hidden" class="form-control" id="U_year" value="<?php echo date('Y') ?>" disabled hidden>

                            <input type="hidden" class="form-control" id="U_encoded" placeholder="Encoded By" value="<?php echo $acc_name; ?>" disabled hidden>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-rounded" id="Up_Financial">Update</button>

                    <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>

                    <input type="hidden" id="hiddenData">
                </div>
                <!-- /.card-body -->

                <!-- </form> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- update financial record END here -->

<!-- view finacial record start here -->

<div class="modal fade" id="ViewFinancial">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Financial Record</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-12">
                            <label for="U_name">Remarks:</label>
                            <h4 class="font-weight-bold" id="viewfr_Name"></h4>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="U_OR">OR Number:</label>
                            <h4 class="font-weight-bold" id="viewfr_OR"></h4>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label>Amount:</label>
                            <!-- <input class="form-control FRI_amount" type="text"  pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" data-type="currency" id="viewfr_Amount" readonly> -->
                            
                            <h4 class="font-weight-bold" id="viewfr_Amount"></h4>
                            
                            
                        </div>

                        <div class="form-group col-md-6">
                            <label>Purpose:</label>
                            <h4 class="font-weight-bold" id="viewfr_purpose"></h4>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Date:</label>
                            <h4 class="font-weight-bold" id="viewfr_date"></h4>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Encoded by:</label>
                            <h4 class="font-weight-bold text-muted" id="viewfr_encoded"></h4>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Close</button>

                        <input type="hidden" id="hiddenViewData">
                        
                    </div>
                    <!-- <button type="button" class="btn btn-primary btn-rounded" id="Up_Financial">Update</button> -->

                    <!-- <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button> -->
                </div>
                <!-- /.card-body -->

                <!-- </form> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- view finacial record end here -->


<!-- add new drydock start here -->

<div class="modal fade" id="AddDryDock">
    <!-- <div class="modal-dialog modal-lg"> -->
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Dry Dock</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="name">Company Name:</label>
                  <input type="text" name="company_name" class="form-control" autocomplete="off" required>
                </div>

                
                <div class="form-group col-md-12">
                  <label for="name">Ship Name:</label>
                  <input type="text" name="ship_name" class="form-control" autocomplete="off" required>
                </div>

                <div class="form-group col-md-12">
                  <label for="name">Lot Number:</label>
                  <input type="num" name="lot_number" class="form-control" autocomplete="off" required>
                </div>

                <div class="form-group col-md-6">
                  <label for="dob">Drydock Date: </label>
                  <input type="date" name="dryDDate" min="<?php echo $PDT; ?>" max="<?php echo $FDT; ?>" class="form-control" value="<?php echo $CDT ?>" required>
                </div>

                <div class="form-group col-md-6">
                  <label for="dob">Expected Departure: </label>
                  <input type="date" name="Exp_Depar" min="<?php echo $PDT; ?>" max="<?php echo $FDT; ?>" class="form-control" value="" required>
                </div>
                
                <div class="form-group col-md-12">
                  <label for="name">Upload Image:</label>
                  <label for="name" class="text-muted">(Only JPG, PNG, JPEG allowed)</label>
                  <input type="file" name="drydock_image" id="drydock_image" class="form-control" accept="image/png, image/jpg, image/jpeg" onchange="validateFileType()" required>
                </div>

              </div>

              <button type="button" class="btn btn-default btn-rounded float-right" data-dismiss="modal">Cancel</button>
              <button type="submit" name="save_drydock" class="btn btn-primary btn-rounded float-right mb-3">Save</button>

            </div>
            <!-- /.card-body -->
          </form>
          <!-- </form> -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<!-- add new drydock end here -->

<!-- drydock image preview modal start here  -->

<div class="modal fade" id="drydock_image_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title ">View DryDock Image</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-auto my-3" id="drydock_image_preview">
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<!-- drydock image preview modal end here  -->

<!--  -->
<div class="modal fade" id="ViewDryDockDetails">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Dry Dock Record</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="U_name">Company Name:</label>
                            <h4 class="font-weight-bold" id="view_CompanyName"></h4>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="U_OR">Ship Name:</label>
                            <h4 class="font-weight-bold" id="view_ShipName"></h4>
                        </div>
   
                        <div class="form-group col-md-12">
                            <label>Lot Number:</label>
                            <h4 class="font-weight-bold" id="view_LotNumber"></h4>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Drydock Date:</label>
                            <h4 class="font-weight-bold" id="view_DrydockDate"></h4>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Expected Departure:</label>
                            <h4 class="font-weight-bold" id="view_ExpectedDeparture"></h4>
                        </div>

                        <!-- <div class="form-group col-md-12">
                            <label>Encoded by:</label>
                            <h4 class="font-weight-bold text-muted" id="viewfr_encoded"></h4>
                        </div> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Close</button>

                        <input type="hidden" id="hiddenDryDockID">
                        
                    </div>
                    <!-- <button type="button" class="btn btn-primary btn-rounded" id="Up_Financial">Update</button> -->

                    <!-- <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button> -->
                </div>
                <!-- /.card-body -->

                <!-- </form> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="Add_OR_Image">
    <!-- <div class="modal-dialog modal-lg"> -->
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add OR Image</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">

                <div class="form-group col-md-12">
                  <label for="name">Upload Image:</label>
                  <label for="name" class="text-muted">(Only JPG, PNG, JPEG allowed)</label>
                  <input type="file" name="or_image" id="or_image" class="form-control" accept="image/png, image/jpg, image/jpeg" onchange="validateFileType2()" >
                </div>

                <div class="form-group col-md-12">
                  <label for="name">OR Number:</label>
                  
                  <label for="" id="OR_status" class="text-danger"></label>
                  <input type="text" name="OR_number_verify" id="OR_number" class="form-control" placeholder="Enter OR Number" autocomplete="off" onInput="validateOR_Upload()" required>
                </div>

              </div>
              <button type="button" class="btn btn-default btn-rounded float-right" data-dismiss="modal">Cancel</button>
              <button type="submit" name="Add_OR_image" id="Add_OR_image" class="btn btn-primary btn-rounded float-right mb-3">Save</button>
            </div>
            <!-- /.card-body -->
          </form>
          <!-- </form> -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="OR_image_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title ">View DryDock Image</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-auto my-3" id="OR_image_preview">
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>