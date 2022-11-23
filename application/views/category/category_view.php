<!-- INSERT CODE  -->
<section class="bg-dark py-5 text-center text-white container-fluid">
    <h1><?php if (str_contains($section, '%20')) {
                if (str_contains($section, '%7C')){
                    echo str_replace('%7C','a',$section);
                } else {
                    echo str_replace('%20',' ',$section);
                }
            } else {
                echo ucfirst($section);
            } ?> Category
    </h1>
</section>
<div class="container mt-3 mb-3">
    <div class="row">
        <?php foreach($category as $product): ?>
            <div class="col-4">
                <div class="card">
                    <img src="<?= $product->product_image; ?>" class="card-img-top" alt="...">
                    <div class="card-body mt-5 text-center">
                        <h5 class="card-title mt-4"><?= $product->product_name; ?></h5>
                        <p class="card-text"><?= $product->product_description; ?></p>
                        
                        <a href="<?= site_url('Order/order/'.$product->product_id); ?>" class="btn btn-white border-dark">Add to cart</a>

                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>