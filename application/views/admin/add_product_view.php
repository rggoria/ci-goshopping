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
    <?php if ($this->session->flashdata('error')): ?>
      <div class="card d-flex justify-content-center p-1 m-3">
        <div class="text-center">
          <div class="d-flex justify-content-center">                                
            <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_bdnjxekx.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
            <h1 class="align-self-center"><?= $this->session->flashdata('error'); ?></h1>
          </div>                    
        </div>
      </div>
    <?php elseif ($this->session->flashdata('success')): ?>
      <div class="card d-flex justify-content-center p-1 m-3">
        <div class="text-center">
          <div class="d-flex justify-content-center">                                
            <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_gaxn5gzy.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
            <h1 class="align-self-center"><?= $this->session->flashdata('success'); ?></h1>
          </div>                    
        </div>
      </div>
    <?php else: ?>
      <h2 class="fw-bold mb-5">Add A Product</h2>
    <?php endif; ?>    
    <?= form_open_multipart('Admin/add_product_validation'); ?>
      <div class="row d-flex justify-content-center">    
        <div class="col-md-6">
          <div class="card m-2">
            <div class="card-header">
              <h1>Preview Image</h1>
            </div>
            <div class="card-body">
              <img id="preview" src="<?= base_url('uploads/private/product.png');?>" class="card-img" height="300" width="200">
            </div>
            <div class="card-footer">
              <input class="form-control form-control-lg" name="productimage" type="file" accept="image/png, image/jpg, image/jpeg" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="card m-2">
            <div class="card-header">
              <h1>Product Details</h1>
            </div>
            <div class="card-body">
              <div class="form-outline">
                <!-- Product Name -->
                <div class="input-group">
                  <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                  <input type="text" name="productname" class="form-control" placeholder="Product Name">
                </div>
                <?php if(form_error('productname')):?>
                  <small class="text-danger fw-bold fst-italic"><?= form_error('productname'); ?></small>
                <?php else:?>
                  <label class="form-label">Product Name</label>
                <?php endif;?>

                <!-- Product Description -->
                <div class="input-group">
                  <span class="input-group-text"><i class="fa-solid fa-book"></i></span>
                  <input type="text" name="productdescription" class="form-control" placeholder="Product Description">
                </div>
                <?php if(form_error('productdescription')):?>
                  <small class="text-danger fw-bold fst-italic"><?= form_error('productdescription'); ?></small>
                <?php else:?>
                  <label class="form-label">Product Description</label>
                <?php endif;?>

                <!-- Product Price -->
                <div class="input-group">
                  <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                  <input type="number" min="0" name="productprice" class="form-control" placeholder="Product Price">
                </div>
                <?php if(form_error('productprice')):?>
                  <small class="text-danger fw-bold fst-italic"><?= form_error('productprice'); ?></small>
                <?php else:?>
                  <label class="form-label">Product Price</label>
                <?php endif;?>

                <!-- Product Category -->
                <div class="input-group">
                  <label class="input-group-text" for="inputGroupSelect01">Choose Category</label>
                  <select class="form-select" name="productcategory" id="inputGroupSelect01">
                    <option>Meat</option>
                    <option>Poultry</option>
                    <option>Beverages</option>
                    <option>Personal Care</option>
                    <option>Fruits and Vegetables</option>
                    <option>Junk Foods</option>
                    <option>Seafood</option>
                    <option>Processed Foods</option>
                    <option>Bread and Bakery</option>
                    <option>Cleaners</option>
                    <option>Paper Goods</option>
                    <option>Canned and Jarred Goods</option>
                    <option>Cereal</option>
                    <option>Frozen Foods</option>
                    <option>Pasta and Rice</option>
                    <option>Deli</option>
                    <option>Condiments</option>
                    <option>Others</option>
                  </select>
                </div>
                <label class="form-label">Product Category</label>           
              </div>
            </div>
            <div class="card-footer">
              <div class="form-outline">
                <!-- Submit button -->
                <a href="<?= site_url('Admin') ?>" class="btn btn-danger btn-block me-5" type="button">Go Back</a>
                <button type="submit" class="btn btn-success btn-block">Add Product</button>
              </div> 
            </div>                     
          </div>
        </div>      
      </div>
    <?= form_open_multipart(); ?>
  </div>
</div>