<div class="container rounded bg-light mt-5 mb-5">
    <!-- Edit profile text -->
    <div class="d-flex mt-5">
        <h4 class="text-left mt-5 ms-5">Edit Profile</h4>
    </div>
    <?php if(isset($success)):?>
        <div class="form-group">
            <div class="alert alert-success text-dark text-center">
                <h4><?= $success; ?></h4>
            </div>
        </div>
    <?php endif;?>
    <?php if(isset($failed)):?>
        <div class="form-group">
            <div class="alert alert-danger text-dark text-center">
                <h4><?= $failed; ?></h4>
            </div>
        </div>
    <?php endif;?>

    <?= form_open('Edit/edit_validation/'.$users->user_id);?> 
        <div class="row">
            <div class="col-md-6 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img src='https://abs.twimg.com/sticky/default_profile_images/default_profile_400x400.png'class="rounded-circle mt-5" width="150px" src="">
                    <span class="font-weight-bold"><?= $users->user_username; ?></span>
                    <span class="text-black-50"><?= $users->user_email; ?></span><span> </span>
                </div>
                <!-- Upload User Avatar -->

                <div class="ms-5 col-md-10 mt-2">
                    <h6>Upload Your Avatar Here:</h6>
                <!-- FILE UPLOAD -->
                    <input type="file" name="avatar" class="form-control">
                        <small class="text-danger fw-bold fst-italic"></small>
                </div>
            </div>  
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-left mb-3">
                        <h4 class="text-left">Profile Details</h4>
                    </div>
                    <!-- user edit details -->
                    <div class="row mt-2">
                        <div class="col-md-6 mb-4">
                            <label class="labels">First Name:</label>
                            <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?= $users->user_firstname; ?>">
                            <small class="text-danger fw-bold fst-italic"><?php echo form_error('firstname') ?></small>
                        </div>     
                        <div class="col-md-6 mb-4">
                            <label class="labels">Middle Name:</label>
                            <input type="text" class="form-control" name="middlename" placeholder="Middle Name" value="<?= $users->user_middlename; ?>">
                        </div>               
                        <div class="col-md-6 mb-4">
                            <label class="labels">Last Name:</label>
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?= $users->user_lastname; ?>">
                            <small class="text-danger fw-bold fst-italic"><?php echo form_error('lastname') ?></small>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="labels">Birthday:</label>
                            <input type="date" class="form-control" name="birthday" placeholder="Age" value="<?= $users->user_birthday; ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Mobile Number:</label>
                            <input type="text" class="form-control" name="mobile" placeholder="e.g 0111-222-3333" value="<?= $users->user_mobile; ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 mb-2"><label class="labels">Address:</div>
                        <div class="col-md-6 mb-4"><label class="labels">Line 1 Address</label><input type="text" class="form-control" name="address1" placeholder="Line 1 Address" value="<?= $users->user_address1; ?>"></div>
                        <div class="col-md-6 mb-4"><label class="labels">Line 2 Address:</label><input type="text" class="form-control" name="address2" placeholder="Line 2 Address" value="<?= $users->user_address2; ?>"></div>
                        <div class="col-md-6 mb-2"><label class="labels">City </label><input type="text" class="form-control" name="city" placeholder="City" value="<?= $users->user_city; ?>"></div>
                        <div class="col-md-6 mb-2"><label class="labels">Postal/Zipcode</label><input type="number" class="form-control" name="zipcode" placeholder="e.g 4024" maxlength="4" min="0" value="<?= $users->user_zipcode; ?>"></div>
                    </div>
                </div>
            </div>
            <div class="mb-5 text-center">
                <!-- Save changes -->                
                <button class="btn btn-success profile-button me-5" ><span class="fa fa-refresh"></span>&nbsp;Save Changes</button>
                <!-- Discard changes -->
                <button class="btn btn-danger profile-button me-5"> <a class="text-white" style="text-decoration: none" href="<?= site_url('Profile'); ?>">Discard Changes</a></button>
            </div>         
        </div>
    <?= form_close();?>
</div>