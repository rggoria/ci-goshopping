<br>
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <!-- Card -->
    <div class="card border-gray w-50">
        <!-- Card Header -->
        <div class="card-header text-bg-gray p-4 text-center fs-2">Forget Password</div>
        <!-- Card body -->
        <?= form_open('Profile/verify_email');?>
            <div class="card-body">
                <!-- Card Form -->            
                <div class="text-center">
                    <i class="fa-solid fa-user-circle fa-5x mt-3 mb-3"></i>
                    <h5 class="fs-5 mt-2">Please fill in the required forms to register</span></h5>
                </div>

                <hr>    

                <div class="text-center">
                    <h6>STEP 1 OF 3</h4>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="card d-flex justify-content-center p-1 m-3">
                            <div class="text-center">
                                <div class="d-flex justify-content-center">                                
                                    <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_bdnjxekx.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                                    <h1 class="align-self-center"><?= $this->session->flashdata('error'); ?></h1>
                                </div>                    
                            </div>
                        </div>
                    <?php else: ?>
                        <h3 class="m-3">Enter your Email</h3>
                    <?php endif; ?>
                </div>

                <div class="mb-4">                    
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-sharp fa-solid fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder=" Email Address">
                    </div>
                    <small class="text-danger fw-bold fst-italic"><?php echo form_error('email') ?></small>
                </div>

                <button type="submit" class="btn btn-dark w-100 mb-4">Verify Email</button>                
            </div>
        <?= form_close();?>
    </div>
</div>
<br>