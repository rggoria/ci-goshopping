<section class="bg-dark py-5 text-center text-white container-fluid">
    <h1>My Orders</h1>
</section>
<div class="container mt-5 mb-5">
    <div class="card-body p-0">
        <div class="card">
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
                                            <img src='<?= $orders->product_image; ?>' class="rounded-circle" width="150px">
                                            <p class="ms-2"><?= $orders->product_name; ?></p>
                                        </div>
                                    </td>
                                    <td>                             
                                        <p>PHP: <?= $orders->product_price; ?></p>
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
                                    Empty
                                </td>
                            </tr>
                        <?php endif; ?>                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="py-3 text-center text-black container-fluid">
        <h4>
            Total Amount:
            <?php $total = 0; ?>
            <?php if (!$order_list == 0): ?>
                <?php foreach($order_list as $orders): ?>
                <?php
                    $total += $orders->product_price * $orders->order_quantity
                ?>
                <?php endforeach; ?>
                <?= $total; ?>
            <?php elseif ($order_list == 0): ?>
                0
            <?php endif; ?>
        </h4>
    </div>

    <div class="mt-2 text-center">
        <!-- CHECKOUT -->
        <button
            class="btn btn-success profile-button"
            type="button"> <a class="text-white"
            style="text-decoration: none"
            href="<?= site_url('Homepage/payment'); 
            ?>">Proceed to Checkout 
        </button></a>
    </div>
</div>