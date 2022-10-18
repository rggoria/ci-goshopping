<div class="d-flex align-items-center justify-content-center min-vh-100">
    <!-- Card -->
    
    <div class="card border-dark shadow" style="width:23%">
        <!-- Card Header -->
        <div class="card-header text-bg-gray p-4 text-center fs-2"> Login</div>
        <!-- Card body -->
        <div class="card-body mt-3">
            <!-- Card Form -->
            <div class="text-center">
                <i class="fa-solid fa-user-circle fa-5x"></i>
                <h5 class="fs-5 mt-2">Welcome to GoShopping</span></h5>
            </div>

            <hr>
            <div class="mb-4">
                <label class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                </div>
                <small class="text-danger fw-bold fst-italic"></small>
            </div>

            <div class="mb-5">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="text-end" style="text-decoration: none"><span><a href="">Forgot Password</a></span>

                    <div class="d-flex align-items-center mb-2"><input name="" type="checkbox" value="" /> <span class="font-weight-bold"> Remember Me</span></div>

                    <button type="submit" class="btn btn-dark w-100 mb-3">Login</button>
                    
                    <div class="text-center" style="text-decoration:none">
                        Don't have an account? <span><a href="<?= site_url('Register'); ?>">Sign Up Here!</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

