<div class="d-flex align-items-center justify-content-center min-vh-100">
    <!-- Card -->
    <div class="card border-gray w-35">
        <!-- Card Header -->
        <div class="card-header text-bg-gray p-4 text-center fs-2"> Sign Up</div>
        <!-- Card body -->
        <?= form_open('Register/register_validation');?>
            <div class="card-body">
                <!-- Card Form -->            
                <div class="text-center">
                    <i class="fa-solid fa-user-circle fa-5x mt-3 mb-3"></i>
                    <h5 class="fs-5 mt-2">Please fill in the required forms to register</span></h5>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label">Firstname</label>
                        <input type="text" name="firstname" class="form-control" placeholder="First Name">
                        <small class="text-danger fw-bold fst-italic"><?php echo form_error('firstname') ?></small>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Lastname</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                        <small class="text-danger fw-bold fst-italic"><?php echo form_error('lastname') ?></small>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Username</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></i></span>
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <small class="text-danger fw-bold fst-italic"><?php echo form_error('username') ?></small>
                        </div>

                        <div class="col">
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-sharp fa-solid fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control" placeholder=" Email Address">
                            </div>
                            <small class="text-danger fw-bold fst-italic"><?php echo form_error('email') ?></small>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <small class="text-danger fw-bold fst-italic"><?php echo form_error('password') ?></small>
                        </div>
                    
                        <div class="col">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-sharp fa-solid fa-key"></i></span>
                                <input type="password" name="rePass" class="form-control" placeholder="Re-enter Password">
                            </div>
                            <small class="text-danger fw-bold fst-italic"><?php echo form_error('rePass') ?></small>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark w-100">Register</button>            
                <div class="text-center mt-4 mb-2">
                    Already have an account? <span><a href="<?= site_url('Login'); ?>">Login Here!</a></span>
                </div>
            </div>
        <?= form_close();?>
    </div>
</div>