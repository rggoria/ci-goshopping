<br>
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <!-- Card -->
    <div class="card border-gray w-50">
        <!-- Card Header -->
        <div class="card-header text-bg-gray p-4 text-center fs-2"> Login</div>
        <!-- Card body -->
        <?= form_open('Login/login_validation');?>
            <div class="card-body">
                <!-- Card Form -->
                <div class="text-center">
                    <i class="fa-solid fa-user-circle fa-5x mt-3 mb-3"></i>
                    <h5 class="fs-5 mt-2">Welcome to GoShopping</span></h5>
                </div>
                <?php if(isset($error)):?>
                    <div class="form-group">
                        <div class="alert alert-danger text-dark text-center">
                        <h4><?= $error; ?></h4>
                        </div>
                    </div>
                <?php endif;?>
                <hr>
                
                <div class="mb-3">
                    <label class="form-label">Username or Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input type="text" name="login" class="form-control" placeholder="Enter Username of Password">
                    </div>
                    <small class="text-danger fw-bold fst-italic"><?= form_error('login'); ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input 
                            id="psw"
                            type="password"
                            name="password" 
                            class="form-control" 
                            placeholder="Password">
                        <span class="input-group-text">
                            <i
                                id="eye"
                                class="fa-solid fa-eye-slash"
                                style="cursor: pointer;"></i>
                        </span>
                    </div>
                    <small class="text-danger fw-bold fst-italic"><?= form_error('password'); ?></small>
                    <div class="text-end" style="text-decoration: none"><span><a href="">Forgot Password</a></span>
                        <div class="d-flex align-items-center mb-2"><input name="" type="checkbox" value="" /> <span class="font-weight-bold"> Remember Me</span></div>

                    </div>
                </div>
                <button type="submit" class="btn btn-dark w-100 mb-3">Login</button>
                <div class="text-center">
                    Don't have an account? <span><a href="<?= site_url('Register'); ?>">Sign Up Here!</a></span>
                </div>
            </div>
        <?= form_close();?>
    </div>
</div>
<br>
<script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/login.js"></script>
