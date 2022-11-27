<br>
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <!-- Card -->
    <div class="card border-gray w-50">
        <!-- Card Header -->
        <div class="card-header text-bg-gray p-4 text-center fs-2">Congratulations</div>
        <!-- Card body -->       
        <div class="card-body">
            <!-- Card Form -->            
            <div class="card d-flex justify-content-center p-1 m-3">
                <div class="text-center">
                    <div class="d-flex justify-content-center">                                
                        <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_gaxn5gzy.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                        <h1 class="align-self-center"><?= $this->session->flashdata('success'); ?></h1>
                    </div>
                    <h3>Your account successfully created!</h3>
                    <a href="<?= site_url('Login'); ?>" class="btn btn-success">Login</a>
                </div>
            </div>

            <hr>

            <div class="text-center">
                <h3>In our browser you can do the following:</h3>                
            </div>
            <div class="container mt-3 mb-3 text-center">
                <div class="row">                    
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <div class="d-flex justify-content-center card-header">                                
                                <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_gktputje.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                                <h1 class="align-self-center"><?= $this->session->flashdata('success'); ?></h1>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Add to cart the product</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <div class="d-flex justify-content-center card-header">                                
                                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_vbrwdppa.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                                <h1 class="align-self-center"><?= $this->session->flashdata('success'); ?></h1>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Checkout your product</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <div class="d-flex justify-content-center card-header">                                
                                <lottie-player src="https://assets8.lottiefiles.com/private_files/lf30_oosm9mdk.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                                <h1 class="align-self-center"><?= $this->session->flashdata('success'); ?></h1>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Transact the product</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/js/register.js"></script>