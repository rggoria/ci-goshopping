<!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style=" background-image: url('https://cdn.crispedge.com/43464b.png');">
    <h1 class="text-white">
      ADMIN MODE
    </h1>
  </div>
</section>
<!-- Section: Design Block -->
<!-- Background image -->
<div class="card py-5 px-md-5 shadow-5-strong text-center">  
  <i class="fa fa-users fa-light fa-9x"></i>
  <div class="card-body">
    <h2 class="fw-bold mb-3">Edit A Product</h2>    
    <?php if ($this->session->flashdata('success')): ?>
      <div class="d-flex justify-content-center m-2">
        <div class="col-lg-4">
          <div class="bg-success p-3">
            <h1 class="text-white"><?= $this->session->flashdata('success'); ?></h1>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
      <div class="row d-flex justify-content-center mb-2">
        <div class="col-lg-4">
          <div class="bg-danger p-3">
            <h1 class="text-white"><?= $this->session->flashdata('error'); ?></h1>
          </div>
        </div>
      </div>
    <?php endif; ?>    
    <?= form_open('Admin/edit_product_validation/'.$product->product_id); ?>
      <div class="row d-flex justify-content-center">    
        <div class="col-md-5">
          <div class="card m-2">            
            <div class="card-body">
              <img id="preview" src="<?= base_url('uploads/images/'.$product->product_image);?>" class="card-img" height="400" width="200">
            </div>                 
          </div>
        </div>

        <div class="col-md-5">
          <div class="card m-2">
            <div class="card-header">
              <h1>Product Details</h1>
            </div>
            <div class="card-body">
              <div class="form-outline">
                <!-- Product Name -->
                <div class="input-group">
                  <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                  <input type="text" name="productname" class="form-control bg-white" value="<?= $product->product_name; ?>" readonly>
                </div>
                <label class="form-label">Product Name</label>                

                <!-- Product Description -->
                <div class="input-group">
                  <span class="input-group-text"><i class="fa-solid fa-book"></i></span>
                  <input type="text" name="productdescription" class="form-control" placeholder="Product Description" value="<?= $product->product_description; ?>">
                </div>
                <?php if(form_error('productdescription')):?>
                  <small class="text-danger fw-bold fst-italic"><?= form_error('productdescription'); ?></small>
                <?php else:?>
                  <label class="form-label">Product Description</label>
                <?php endif;?>

                <!-- Product Price -->
                <div class="input-group">
                  <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                  <input type="number" min="0" name="productprice" class="form-control" placeholder="Product Price" value="<?= $product->product_price; ?>">
                </div>
                <?php if(form_error('productprice')):?>
                  <small class="text-danger fw-bold fst-italic"><?= form_error('productprice'); ?></small>
                <?php else:?>
                  <label class="form-label">Product Price</label>
                <?php endif;?>

                <!-- Product Category -->
                <div class="input-group">
                  <label class="input-group-text" for="inputGroupSelect01">Choose Category</label>
                  <input type="text" name="productcategory" class="form-control bg-white" value="<?= $product->product_category; ?>" readonly>
                </div>
                <label class="form-label">Product Category</label>           
              </div>
            </div>
            <div class="card-footer">
              <div class="form-outline">
                <!-- Submit button -->
                <a href="<?= site_url('Admin') ?>" class="btn btn-danger btn-block me-5" type="button">Go Back</a>
                <button type="submit" class="btn btn-success btn-block">Edit Product</button>
              </div> 
            </div>                     
          </div>
        </div>      
      </div>
    <?= form_open_multipart(); ?>
  </div>
</div>