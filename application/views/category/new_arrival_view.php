<!-- INSERT CODE  -->
<section class="bg-dark py-5 text-center text-white container-fluid">
    <h1>New Arriving Products</h1>
</section>
<div class="container mt-3 mb-3">
    <div class="row d-flex justify-content-center">
        <?php if($arrival): ?>
            <?php foreach($arrival as $product): ?>
                <div class="col-md-4 mb-2">                    
                    <div class="card">                        
                        <div class="card-header">
                            <img src="<?= base_url('uploads/images/product/'.$product->product_image);?>" class="card-img-top img-thumbnail">
                        </div>                        
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Name</span>
                                <input class="form-control bg-white" value="<?= $product->product_name; ?>" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-circle-info"></i></span>
                                <textarea class="form-control bg-white" rows="3" readonly><?= $product->product_description;  ?></textarea>
                            </div> 
                            <div class="input-group mb-3">
                                <span class="input-group-text">PHP</span>
                                <input class="form-control bg-white" value="<?= number_format($product->product_price, 2);  ?>" readonly>
                            </div>                    
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?= site_url('Order/order/'.$product->product_id); ?>" class="btn btn-white border-dark"><i class="fa-solid fa-cart-plus"></i> Add to cart</a>
                        </div>
                    </div> 
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-8">
                <div class="card text-center">
                    <div class="card-title">
                        <h1>This product category have not yet added a product.</h1>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_dmw3t0vg.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                    </div>                    
                </div>
            </div>
        <?php endif; ?>        
    </div>
</div>