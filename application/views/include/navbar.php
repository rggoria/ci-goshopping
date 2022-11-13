<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= site_url('Homepage'); ?>">GoShopping</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <ul class="navbar-nav">
                <?php if($this->session->has_userdata('login_status')): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fa-solid fa-user-circle"></span>&nbsp;<?php echo $this->session->userdata('login_username'); ?>
                        </a>
                        <ul class="dropdown-menu">                            
                            <li><a class="dropdown-item" href="<?= site_url('Profile'); ?>"><span class="fa-solid fa-gear"></span>&nbsp;My Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?= site_url('Login/logout_user'); ?>"><span class="fa-solid fa-sign-out"></span>&nbsp;Logout</a></li>                            
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="" class="btn fw-bold">Your Cart</a>
                    </li> 
                <?php else: ?>
                    <li class="nav-item">
                        <a href="<?= site_url('Login'); ?>" class="btn fw-bold me-2">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('Register'); ?>" class="btn fw-bold me-2">Signup</a> 
                    </li>
                    <li class="nav-item">
                        <a href="" class="btn fw-bold">Your Cart</a>
                    </li> 
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>