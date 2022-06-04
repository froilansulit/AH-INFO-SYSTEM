<div class="modal fade" id="add-Incoming">
    <!-- <div class="modal-dialog modal-lg"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Incoming</h4>
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
                            <label for="FRI_name">Remarks:</label> 
                            <label for="" id="lblFRI_name" class="text-danger"></label>
                            <input type="text" class="form-control" id="FRI_name" placeholder="Remarks" autocomplete="off">
                            
                        </div>
                        <!-- <div class="form-group col-md-4">
                                <label for="FRI_purpose">Purpose:</label>
                                <input type="text" class="form-control" id="FRI_purpose" placeholder="Purpose" value="<?php #echo 'Incoming' 
                                                                                                                        ?>" disabled>
                            </div> -->
                        <div class="form-group col-md-12">
                            <label for="FRI_OR">OR Number:</label>
                            <label for="" id="lblFRI_OR" class="text-danger"></label>
                            <input type="text" class="form-control" id="FRI_OR" placeholder="OR Number" autocomplete="off">
                           
                        </div>
                        <div class="form-group col-md-12">
                            <label>Amount:</label>
                            <label for="" id="lblFRI_amount" class="text-danger"></label>
                            <input type="number" class="form-control FRI_amount" id="txtNumeric" placeholder="P 0.00" autocomplete="off">
                            <!-- <input class="form-control FRI_amount" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00" autocomplete="off"> -->
                        </div>





                        <!-- <div class="form-group col-md-4">
                                <label for="FRI_month">Month: </label>
                                <input type="text" class="form-control" id="FRI_month" placeholder="month" value="<?php #echo date('F') 
                                                                                                                    ?>" disabled>
                            </div> -->

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
                                <label for="Sales Price">Sales Price</label>
                                <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Reorder Level">Reorder Level</label>
                                <input type="text" class="form-control" id="Reorder Level" placeholder="Reorder Level">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Stock Quantity">Stock Quantity</label>
                                <input type="text" class="form-control" id="Stock Quantity" placeholder="Stock Quantity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Expiry Date">Expiry Date</label>
                                <input type="text" class="form-control" id="Expiry Date" placeholder="Expiry Date">
                            </div> -->
                    </div>
                    <!-- <button type="submit" class="btn btn-primary btn-rounded" >Save</button> -->

                    <!-- <button type="submit" class="btn btn-primary btn-rounded" name="submit">Save</button> -->


                    <button type="button" class="btn btn-primary btn-rounded" id="addIncoming">Save</button>

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
                <h4 class="modal-title">Add Outgoing</h4>
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
                            <label for="FRO_name">Remarks:</label>
                            <label for="" id="lblFRO_name" class="text-danger"></label>

                            <input type="text" class="form-control" id="FRO_name" placeholder="Remarks" autocomplete="off">
                        </div>
                        <!-- <div class="form-group col-md-4">
                                <label for="FRI_purpose">Purpose:</label>
                                <input type="text" class="form-control" id="FRI_purpose" placeholder="Purpose" value="<?php #echo 'Incoming' 
                                                                                                                        ?>" disabled>
                            </div> -->
                        <div class="form-group col-md-12">
                            <label for="FRO_OR">OR Number:</label>
                            <label for="" id="lblFRO_OR" class="text-danger"></label>

                            <input type="text" class="form-control" id="FRO_OR" placeholder="OR Number" autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Amount:</label>
                            <label for="" id="lblFRO_amount" class="text-danger"></label>

                            <input type="number" class="form-control FRO_amount" id="txtNumeric2" placeholder="P 0.00" autocomplete="off">
                            <!-- <input class="form-control FRI_amount" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00" autocomplete="off"> -->
                        </div>


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
                        
                        <!-- <div class="form-group col-md-4">
                                <label for="Discount Price">Discount Price</label>
                                <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Sales Price">Sales Price</label>
                                <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Reorder Level">Reorder Level</label>
                                <input type="text" class="form-control" id="Reorder Level" placeholder="Reorder Level">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Stock Quantity">Stock Quantity</label>
                                <input type="text" class="form-control" id="Stock Quantity" placeholder="Stock Quantity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Expiry Date">Expiry Date</label>
                                <input type="text" class="form-control" id="Expiry Date" placeholder="Expiry Date">
                            </div> -->
                    </div>
                    <!-- <button type="submit" class="btn btn-primary btn-rounded" >Save</button> -->

                    <!-- <button type="submit" class="btn btn-primary btn-rounded" name="submit">Save</button> -->


                    <button type="button" class="btn btn-primary btn-rounded" id="addOutgoing">Save</button>

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
                            <input type="number" class="form-control U_amount" id="txtNumeric2" placeholder="P 0.00" autocomplete="off">

                            <label for="" id="lblU_amount" class="text-danger"></label>
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
                            <input class="form-control FRI_amount" type="text"  pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" data-type="currency" id="viewfr_Amount" readonly>
        
                            <label for="" class="text-danger">Note: Click the text box to view in currency format</label>
                            
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

    <!-- /.modal add-Product -->
    <div class="modal fade" id="edit-Product">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="Item Code">Item Code</label>
                                    <input type="text" class="form-control" id="Item Code" placeholder="Item Code">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="Name" placeholder="Name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Variant">Variant</label>
                                    <input type="text" class="form-control" id="Variant" placeholder="Variant">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Unit Value">Unit Value</label>
                                    <input type="text" class="form-control" id="Unit Value" placeholder="Unit Value">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Unit Name">Unit Name</label>
                                    <select class="form-control">
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Category">Category</label>
                                    <select class="form-control">
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Net Price">Net Price</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Production Cost">Production Cost</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Markup %">Markup %</label>
                                    <input type="text" class="form-control" id="Markup %" placeholder="%">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Markup Price">Markup Price</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Discount">Discount</label>
                                    <input type="number" class="form-control" id="Discount" placeholder="%">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Discount Price">Discount Price</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Sales Price">Sales Price</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Reorder Level">Reorder Level</label>
                                    <input type="text" class="form-control" id="Reorder Level" placeholder="Reorder Level">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Stock Quantity">Stock Quantity</label>
                                    <input type="text" class="form-control" id="Stock Quantity" placeholder="Stock Quantity">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Expiry Date">Expiry Date</label>
                                    <input type="text" class="form-control" id="Expiry Date" placeholder="Expiry Date">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit-Product -->
    <div class="modal fade" id="add-Unit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Unit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="Name" placeholder="Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Description">Description</label>
                                    <textarea type="text" class="form-control" id="Description" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal add-Unit -->
    <div class="modal fade" id="edit-Unit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Unit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="Name" placeholder="Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Description">Description</label>
                                    <textarea type="text" class="form-control" id="Description" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit-Unit -->
    <div class="modal fade" id="add-Category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="Name" placeholder="Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Description">Description</label>
                                    <textarea type="text" class="form-control" id="Description" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal add-Category -->
    <div class="modal fade" id="edit-Category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="Name" placeholder="Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Description">Description</label>
                                    <textarea type="text" class="form-control" id="Description" placeholder="Description"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit-Category -->
    <div class="modal fade" id="add-ItemRawMaterial">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Item Raw Material</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Product Name">Product Name</label>
                                    <select class="form-control">
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Material Name">Material Name</label>
                                    <input type="text" class="form-control" id="Material Name" placeholder="Material Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Amount">Amount</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal add-ItemRawMaterial -->
    <div class="modal fade" id="edit-ItemRawMaterial">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Item Raw Material</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Product Name">Product Name</label>
                                    <select class="form-control">
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Material Name">Material Name</label>
                                    <input type="text" class="form-control" id="Material Name" placeholder="Material Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Amount">Amount</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit-ItemRawMaterial -->
    <div class="modal fade" id="add-Invoice">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Invoice</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Total Amount">Total Amount</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Discount Price">Discount Price</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Tendered">Tendered</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Change">Change</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal add-Invoice -->
    <div class="modal fade" id="edit-Invoice">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Invoice</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Total Amount">Total Amount</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Discount Price">Discount Price</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Tendered">Tendered</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Change">Change</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit-Invoice -->
    <div class="modal fade" id="add-Sales">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Sales</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Item">Item</label>
                                    <select class="form-control">
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Sale Quantity">Sale Quantity</label>
                                    <input type="number" class="form-control" id="Sale Quantity" placeholder="Sale Quantity">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Total">Total</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal add-Sales -->
    <div class="modal fade" id="edit-Sales">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Sales</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Item">Item</label>
                                    <select class="form-control">
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Sale Quantity">Sale Quantity</label>
                                    <input type="number" class="form-control" id="Sale Quantity" placeholder="Sale Quantity">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Total">Total</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit-Sales -->
    <div class="modal fade" id="add-Users">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Users</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Full Name">Full Name</label>
                                    <input type="text" class="form-control" id="Full Name" placeholder="First Name      -       Middle Name         -       Last Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Username">Username</label>
                                    <input type="text" class="form-control" id="Username" placeholder="Username">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Password">Password</label>
                                    <input type="text" class="form-control" id="Password" placeholder="Password">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="User Type">User Type</label>
                                    <select class="form-control">
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Contact Number">Contact Number</label>
                                    <input type="text" class="form-control" id="Contact Number" placeholder="Contact Number">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Address">Address</label>
                                    <input type="text" class="form-control" id="Address" placeholder="Address">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal add-Users -->
    <div class="modal fade" id="edit-Users">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Users</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Full Name">Full Name</label>
                                    <input type="text" class="form-control" id="Full Name" placeholder="First Name      -       Middle Name         -       Last Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Username">Username</label>
                                    <input type="text" class="form-control" id="Username" placeholder="Username">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Password">Password</label>
                                    <input type="text" class="form-control" id="Password" placeholder="Password">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="User Type">User Type</label>
                                    <select class="form-control">
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Contact Number">Contact Number</label>
                                    <input type="text" class="form-control" id="Contact Number" placeholder="Contact Number">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Address">Address</label>
                                    <input type="text" class="form-control" id="Address" placeholder="Address">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->

                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit-Users -->
    <div class="modal fade" id="add-ProductSet">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product Set</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Set Code">Set Code</label>
                                    <input type="text" class="form-control" id="Set Code" placeholder="Set Code">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Set Name">Set Name</label>
                                    <input type="text" class="form-control" id="Set Name" placeholder="Set Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Total Amount">Total Amount</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Set on Hand">Set on Hand</label>
                                    <input type="text" class="form-control" id="Set on Hand" placeholder="Set on Hand">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal add-ProductSet -->
    <div class="modal fade" id="edit-ProductSet">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product Set</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Set Code">Set Code</label>
                                    <input type="text" class="form-control" id="Set Code" placeholder="Set Code">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Set Name">Set Name</label>
                                    <input type="text" class="form-control" id="Set Name" placeholder="Set Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Total Amount">Total Amount</label>
                                    <input class="form-control" type="text" name="currency-field" id="currency-field" pattern="^\P\d{1,3}(,\d{3})*(\.\d+)?P" value="" data-type="currency" placeholder="P 0.00">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Set on Hand">Set on Hand</label>
                                    <input type="text" class="form-control" id="Set on Hand" placeholder="Set on Hand">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit-ProductSet -->
    <div class="modal fade" id="add-CompanySetup">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Company Setup</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Company Name">Company Name</label>
                                    <input type="text" class="form-control" id="Company Name" placeholder="Company Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Address">Address</label>
                                    <input type="text" class="form-control" id="Address" placeholder="Address">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Contact No.">Contact No.</label>
                                    <input type="text" class="form-control" id="Contact No." placeholder="Contact No.">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="TIN No.">TIN No.</label>
                                    <input type="text" class="form-control" id="TIN No." placeholder="TIN No.">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal add-CompanySetup -->
    <div class="modal fade" id="edit-CompanySetup">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Company Setup</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Company Name">Company Name</label>
                                    <input type="text" class="form-control" id="Company Name" placeholder="Company Name">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Address">Address</label>
                                    <input type="text" class="form-control" id="Address" placeholder="Address">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="Contact No.">Contact No.</label>
                                    <input type="text" class="form-control" id="Contact No." placeholder="Contact No.">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="TIN No.">TIN No.</label>
                                    <input type="text" class="form-control" id="TIN No." placeholder="TIN No.">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal edit-CompanySetup -->
    <div class="modal fade" id="set-days">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Set Predictive Days</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="Days">Days</label>
                                    <input type="number" class="form-control" id="Days" placeholder="Days">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
                            <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Cancel</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal set-days -->