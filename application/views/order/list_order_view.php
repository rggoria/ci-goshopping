<section class="bg-dark py-5 text-center text-white container-fluid">
    <h1>My Orders</h1>
</section>
<div class="container mt-5 mb-5">
    <div class="card-body p-0">
        <div class="card">
            <?php if ($this->session->flashdata('memo')): ?>
                <div class="p-5">            
                    <div class="card-header text-center"> 
                        <h1><?= $this->session->flashdata('memo'); ?></h1> 
                    </div>
                    <div class="card-body border border-dark">                                     
                        <div class="d-flex justify-content-center">                                                        
                            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_k6ciq2nn.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                            <span class="align-self-center h1">Thank you for purchasing at GoShopping!</span>
                        </div>
                    </div> 
                </div>  
            <?php endif; ?>                 
            <!-- Card Body -->
            <div class="table-responsive">
                <table class="table align-middle mb-0 bg-white text-center">
                    <thead>
                        <tr>                      
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>                       
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php if (!$order_list == 0): ?>

                            <caption class="ms-3">End of list orders...</caption>

                            <?php foreach($order_list as $orders): ?>
                                <tr>                 
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src='<?= base_url('uploads/images/product/'.$orders->product_image);?>' class="rounded-circle" height="150px"  width="150px">
                                            <p class="ms-2"><?= $orders->product_name; ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <p>PHP: <?= number_format($orders->product_price, 2); ?></p>
                                    </td>
                                    <td>
                                        <p class="ms-2"><?= $orders->order_quantity; ?></p>                                                         
                                    </td>                        
                                    <td>
                                        <a class="btn btn-primary m-2" href="<?php echo site_url('Order/edit_order_list/'.$orders->order_id) ?>" role="button">Edit</a>
                                        <a class="btn btn-primary m-2" href="<?php echo site_url('Order/remove_order_list/'.$orders->order_id) ?>" role="button">Remove</a>
                                    </td>
                                </tr> 
                            <?php endforeach; ?>   
                        <?php elseif($order_list == 0): ?>
                            <tr>
                                <td colspan="4">
                                    <div class="card d-flex justify-content-center p-3">
                                        <div class="text-center">
                                            <h1>You have no orders yet.</h1>
                                            <div class="d-flex justify-content-center">                                                        
                                                <lottie-player src="https://assets4.lottiefiles.com/datafiles/vhvOcuUkH41HdrL/data.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                                            </div>                    
                                        </div>
                                    </div>                                                                    
                                </td>
                            </tr>
                        <?php endif; ?>                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="text-center text-black container-fluid row">
        <div class="col-md-6 p-3">
            <h4>
                Total Amount:
                <?php $total = 0; ?>
                <?php if (!$order_list == 0): ?>
                    <?php foreach($order_list as $orders): ?>
                    <?php
                        $total += $orders->product_price * $orders->order_quantity
                    ?>
                    <?php endforeach; ?>      
                    PHP <?= number_format($total, 2); ?>
                <?php elseif ($order_list == 0): ?>
                    0
                <?php endif; ?>
            </h4>
        </div>
        <div class="col-md-6 p-3">
            <?php if ($total == 0): ?>
                <button disabled
                    class="btn btn-success profile-button"
                    type="button"> <a class="text-white"
                    style="text-decoration: none"
                    href="<?= site_url('Order/checkout/'); 
                    ?>">Proceed to Checkout 
                </button></a>
            <?php else: ?>
                <button
                    class="btn btn-success profile-button"
                    type="button"> <a class="text-white"
                    style="text-decoration: none"
                    href="<?= site_url('Order/checkout/'); 
                    ?>">Proceed to Checkout 
                </button></a>
            <?php endif; ?>            
        </div>
        
    </div>

    <div class="py-3 text-center text-black container-fluid">
        
    </div>
</div>