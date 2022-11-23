<!-- INSERT CODE  -->
<section class="bg-dark py-5 text-center text-white container-fluid">
    <h1>
        Cash-in
    </h1>
</section>
<div class="card container p-5 text-center my-5">
    <div class="row">
        <div class="col-md-5 p-5">
            <i class="fa fa-credit-card fa-10x"></i>
        </div>
        <div class="col-md-7 p-5 text-align-center">
            <div class="card">
                <div class="card-header">
                    Current Balance
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">PHP</span>
                        <input type="text" class="form-control bg-white" value="<?= number_format($current_balance, 2); ?>" readonly>
                    </div>
                </div>
                <div class="card-footer">
                    Last Updated: <span><?= $newdateformat = date("D, d M Y h:i:s A", strtotime($current_date));?></span>
                </div>
            </div>
        </div>
        <?= form_open('Profile/cash/');?>
            <label class="form-label text-start">Enter Desire Amount</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-credit-card"></i></span>
                <input type="number" name="cash" min="0" oninput="validity.valid||(value='');" class="form-control">
            </div>
            <small class="text-danger fw-bold fst-italic"><?php echo form_error('cash') ?></small>

            <div class="text-center">
                <!-- CHECKOUT -->
                <a class="btn btn-danger m-2" href="<?= site_url('Profile'); ?>">Go Back</a>
                <button class="btn btn-success m-2" type="submit">Confirm Purchase</button></a>
            </div>
        <?= form_close();?>
    </div>
</div>