<section class="bg-dark py-5 text-center text-white container-fluid">
    <h1>Checkout</h1>
</section>
<div class="card container text-center my-3">  
    <?php if ($this->session->flashdata('memo')): ?>
        <div class="p-3 d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card-header text-center"> 
                    <h1><?= $this->session->flashdata('memo'); ?></h1> 
                </div>
                <div class="card-body border border-dark">                                     
                    <div class="d-flex justify-content-center">                                                        
                        <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_tpoukxhv.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                        <a class="btn btn-primary align-self-center" href="<?= site_url('Profile/deposit'); ?>">Cash-in Now</a>
                    </div>
                </div>
            </div>
        </div>  
    <?php endif; ?>  
    <div class="row">
    <div class="col-md-6 text-align-center mb-5">
            <div class="card">
                <div class="card-header">
                    E-Card
                </div>
                <div class="card-body">                
                    <i class="fa fa-money-check-alt fa-10x"></i>
                </div>
            </div>
        </div>
        
        <div class="col-md-6  text-align-center mb-5 ">
            <div class="card">
                <div class="card-header">
                    Total Products Pending: <?= $order_count; ?>
                </div>
                <div class="card-body">                
                    <i class="fa fa-clipboard-list fa-10x"></i>
                </div>                
            </div>
        </div>           
    </div>
    <?= form_open('Order/payment/');?>
        <div class="row">
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        Total Amount of Products Pending
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">PHP</span>
                            <input type="text" name="total" class="form-control bg-white" value="<?= number_format($total_amount, 2); ?>" readonly>
                        </div>
                    </div>               
                </div>
            </div>
            <div class="col-md-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        Current Balance
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">PHP</span>
                            <input type="text" name="current" class="form-control bg-white" value="<?= number_format($current_balance, 2); ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <!-- CHECKOUT -->
            <a class="btn btn-danger m-2" href="<?= site_url('Order/cart'); ?>">Go Back</a>
            <button class="btn btn-success m-2" type="submit">Proceed Payment</button></a>
        </div>
    <?= form_close(); ?>
</div>