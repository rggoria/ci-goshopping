<br>
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <!-- Card -->
    <div class="card border-gray w-50">
        <!-- Card Header -->
        <div class="card-header text-bg-gray p-4 text-center fs-2"> Sign Up</div>
        <!-- Card body -->
        <?= form_open('Register/email_validation');?>
            <div class="card-body">
                <!-- Card Form -->            
                <div class="text-center">
                    <i class="fa-solid fa-user-circle fa-5x mt-3 mb-3"></i>
                    <h5 class="fs-5 mt-2">Please fill in the required forms to register</span></h5>
                </div>

                <hr>    

                <div class="text-center">
                    <h6>STEP 1 OF 3</h4>
                    <h3>Enter your Email</h3>
                </div>

                <div class="mb-4">                    
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-sharp fa-solid fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder=" Email Address">
                    </div>
                    <small class="text-danger fw-bold fst-italic"><?php echo form_error('email') ?></small>
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-3">Verify Email</button>            
                <div class="text-center">
                    Already have an account? <span><a href="<?= site_url('Login'); ?>">Login Here!</a></span>
                </div>
            </div>
        <?= form_close();?>
    </div>
</div>
<br>