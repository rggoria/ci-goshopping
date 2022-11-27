<div class="container rounded bg-light mt-5 mb-5">
    <!-- Edit profile text -->
    <section class="py-3 container-fluid">
        <span class="h1 text-center">Edit Profile</span>
        <span class="float-end"><button class="btn btn-danger mx-1"> <a class="text-white" style="text-decoration: none" href="<?= site_url('Profile'); ?>"><span class="fa fa-arrow-circle-o-left"></span>&nbsp;Return to profile</a></button></span>        
    </section>
    <?php if ($this->session->flashdata('success')): ?>
        <div class="card">
            <div class="p-3 d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card-header text-center"> 
                        <h1><?= $this->session->flashdata('success'); ?></h1> 
                    </div>
                    <div class="card-body border border-dark">
                        <div class="d-flex justify-content-center">                                                        
                            <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_liuaqrbl.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="card">
            <div class="p-3 d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card-header text-center"> 
                        <h1><?= $this->session->flashdata('error'); ?></h1> 
                    </div>
                    <div class="card-body border border-dark">                                     
                        <div class="d-flex justify-content-center">                                                        
                            <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_tl52xzvn.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-6 mb-1">
            <div class="card">
                <div class="card-header">
                    <h4>Profile Picture</h4>
                </div>
                <?= form_open_multipart('Edit/upload/'.$users->user_username); ?>
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center my-4">
                            <?php if($users->user_image): ?>
                                <img id="preview" src="<?= base_url('uploads/images/profile/'.$users->user_image);?>" class="rounded-circle border border-dark" height="250" width="250">
                            <?php else: ?>
                                <img id="preview" src="<?= base_url('uploads/private/profile.png');?>" class=" rounded-circle border border-dark" height="250" width="250">
                            <?php endif; ?>
                            <span class="font-weight-bold text-start"><?= $users->user_username; ?></span>
                            <span class="text-black-50"><?= $users->user_email; ?></span><span> </span>                            
                        </div>
                        <h6>Upload Your Avatar Here:</h6>
                        <input class="form-control form-control-lg my-3" name="userimage" type="file" accept="image/png, image/jpg, image/jpeg" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="card-footer">  
                        <div class="d-flex justify-content-center align-items-center">
                            <!-- Upload Picture -->
                            <button type="submit" class="btn btn-success mx-2"><span class="fa fa-upload"></span>&nbsp;Upload</button>
                        </div>
                    </div>
                <?= form_close(); ?>
            </div>
        </div>            
        <div class="col-md-6 mb-1">
            <div class="card">
                <div class="card-header">
                    <h4>Profile Details</h4>
                </div>
                <!-- user edit details -->
                <?= form_open('Edit/edit_validation/'.$users->user_id);?> 
                    <div class="card-body">
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
                    <div class="card-footer">
                        <div class="d-flex justify-content-center align-items-center">
                            <!-- Update changes -->                
                            <button class="btn btn-success mx-2" ><span class="fa fa-refresh"></span>&nbsp;Update Changes</button>                      
                        </div>
                    </div>
                <?= form_close();?>
            </div>
        </div>                  
    </div>
    <div class="card mb-2">
        <div class="card-header">
            Profile Password                            
        </div>
        <div class="card-body">
            <?= form_open('Edit/update_password/'.$users->user_id);?> 
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input 
                                    id="psw1"
                                    type="password"
                                    name="password" 
                                    class="form-control" 
                                    value="<?= $users->user_password; ?>">
                                <span class="input-group-text">
                                    <i
                                        id="eye1"
                                        class="fa-solid fa-eye-slash"
                                        style="cursor: pointer;"></i>
                                </span>
                            </div>
                        </div>                    
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input 
                                    id="psw2"
                                    type="password"
                                    name="newpassword" 
                                    class="form-control" 
                                    placeholder="Password">
                                <span class="input-group-text">
                                    <i
                                        id="eye2"
                                        class="fa-solid fa-eye-slash"
                                        style="cursor: pointer;"></i>
                                </span>
                            </div>
                            <small class="text-danger fw-bold fst-italic"><?= form_error('newpassword'); ?></small>
                        </div>
                    </div>
                    <div class="col-md-4  text-center">
                        <label class="form-label">Click here to update password</label>                      
                        <div class="d-flex justify-content-center align-items-center">
                            <button class="btn btn-success mx-1" ><span class="fa fa-refresh"></span>&nbsp;Update Password</button>  
                        </div>                  
                    </div>
                </div>
            <?= form_close(); ?>
        </div>       
    </div>             
</div>

<script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/edit_profile.js"></script>