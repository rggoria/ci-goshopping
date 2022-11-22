<br>
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <!-- Card -->
    <div class="card border-gray w-50">
        <!-- Card Header -->
        <div class="card-header text-bg-gray p-4 text-center fs-2"> Sign Up</div>
        <!-- Card body -->
        <?= form_open('Auth/auth_validation');?>
            <div class="card-body">
                <!-- Card Form -->            
                <div class="text-center">
                    <i class="fa-solid fa-user-circle fa-5x mt-3 mb-3"></i>
                    <h5 class="fs-5 mt-2">Please fill in the required forms to register</span></h5>
                </div>

                <hr>

                <div class="text-center">
                    <h6>STEP 3 OF 3</h4>
                    <h3>Enter your profile credential</h3>
                </div>

                <div class="mb-3">
                    <label class="form-label">Firstname</label>
                    <input type="text" name="firstname" class="form-control" placeholder="First Name">
                    <small class="text-danger fw-bold fst-italic"><?php echo form_error('firstname') ?></small>   
                </div>

                <div class="mb-3">
                    <label class="form-label">Lastname</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                    <small class="text-danger fw-bold fst-italic"><?php echo form_error('lastname') ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <small class="text-danger fw-bold fst-italic"><?php echo form_error('username') ?></small>
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input
                            id="psw1"
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Password"
                            maxlength="20">
                        <span class="input-group-text">
                            <i
                                id="eye1"
                                class="fa-solid fa-eye-slash"
                                style="cursor: pointer;"></i>
                        </span>
                    </div>
                    <small class="text-danger fw-bold fst-italic"><?php echo form_error('password') ?></small>
                </div>
                <button type="submit" class="btn btn-dark w-100 mb-3">Register</button>
            </div>
        <?= form_close();?>
    </div>
</div>
<br>
<script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/register.js"></script>