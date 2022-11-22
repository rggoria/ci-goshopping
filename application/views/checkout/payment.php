<div class="container rounded bg-light mt-5 mb-5 p-5">
        <!-- Edit profile text -->
        <div class="d-flex">
            <h1 class="text-left ms-5">Payment details</h1>
        </div>
        <div class="row">
                <div class="col-md-6 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-left mb-3">
                            <!-- GET THE PRODUCT OF THE USER -->
                            <h4 class="text-left">Your Products:</h4>
                        </div>
                    <!-- PRODUCT PRICES -->
                    <!-- USUALLY IT SHOULD LIST ALL THE PRODUCTS THE USERS HAS CHECKED OUT -->
                        <div class="w-100">
                            <div class="col-md-6 mb-4"><label class="labels">Total price of Chicken:</label><input type="text" disabled="disabled" class="form-control" placeholder="" value="1"></div>
                        </div>
                        <div class="w-100">
                            <div class="col-md-6 mb-4"><label class="labels">Total price of Coca Cola:</label><input type="text" disabled="disabled" class="form-control" placeholder="" value="1"></div>
                        </div>
                        <div class="w-100">
                            <div class="col-md-6 mb-4"><label class="labels">Total price of Turkey:</label><input type="text" disabled="disabled" class="form-control" placeholder="" value="1"></div>
                        </div>
                    </div>
                </div>


                <!-- OTHER SIDE -->
                <div class="col-md-6 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-left mb-3">
                            <!-- PAYMENT METHOD -->
                            <h4 class="text-left">Payment Method:</h4>
                        </div>
                        <div class="w-100">
                            <div class="col-md-6 mb-4"><label class="labels">Your Card:</label><input type="text" class="form-control" placeholder="1234-5678-9012-3456" value=""></div>
                        </div>
                        <div class="w-100">
                            <div class="col-md-6 mb-4"><label class="labels">Enter Amount:</label><input type="text" class="form-control" placeholder="Enter amount..." value=""></div>
                        </div>
                    </div>
                </div>
            <div class="mb-5 p-4 text-center">
                <!-- CHECKOUT -->
                <h4 class="text-left">Grand Total: 9385.33 PHP
            </div>
            </div>
            <div class="mb-5 text-center">
                <!-- CHECKOUT -->
                <button class="btn btn-danger profile-button me-5" type="button"> <a class="text-white" style="text-decoration: none" href="<?= site_url('Homepage/payment'); ?>">Cancel Purchase</button></a>
                <button class="btn btn-success profile-button me-5" type="button"> <a class="text-white" style="text-decoration: none" href="<?= site_url('Homepage/payment'); ?>">Confirm Purchase</button></a>
            </div>
        </div>
        
    </div>
    </div>
    </div>
