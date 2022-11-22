<br>
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <!-- Card -->
    <div class="card border-gray w-50">
        <!-- Card Header -->
        <div class="card-header text-bg-gray p-4 text-center fs-2"> Sign Up</div>
        <!-- Card body -->
        <?= form_open('Register/verify_code');?>
            <div class="card-body">
                <!-- Card Form -->            
                <div class="text-center">
                    <i class="fa-solid fa-user-circle fa-5x mt-3 mb-3"></i>
                    <h5 class="fs-5 mt-2">Please fill in the required forms to register</span></h5>
                </div>

                <hr>    

                <div class="text-center">
                    <h6>STEP 2 OF 3</h4>
                    <h3>Verify your email address</h3>
                </div>

                <p style="margin-bottom:5px;"><b>Code will be sent to your email:</b></p>
                <span class="text-primary h3"><?php echo $this->session->userdata('email') ?></span>

                <div class="mb-4 mt-3">                    
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-sharp fa-solid fa-lock"></i></span>
                        <input
                            type="tel"
                            name="code"
                            id="verify-code"
                            class="form-control"
                            placeholder="Enter your 4-digit code..."
                            maxlength="4"
                            autocomplete="off"
                            onkeyup="verify()">
                    </div>                    
                    <small class="text-danger fw-bold fst-italic"><?php echo form_error('code') ?></small>
                    <p class="mt-3">Did not receive?
                        <?php echo anchor('Register/resend', 'Resend Code'); ?>
                    </p>
                </div>

                <button
                    type="submit"
                    class="btn btn-dark w-100 mb-3"
                    id="verify-submit"
                    class="btn btn-primary w-50"
                    disabled>Verify Email</button>
            </div>
        <?= form_close();?>
    </div>
</div>
<br>
<script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/verify_code.js"></script>