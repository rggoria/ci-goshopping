<br>
<div class="d-flex align-items-center justify-content-center min-vh-100">
    <!-- Card -->
    <div class="card border-gray w-50">
        <!-- Card Header -->
        <div class="card-header text-bg-gray p-4 text-center fs-2"><?= $product_name; ?></div>        
        <!-- Card body -->
        <?= form_open('Order/add_arrival_cart/'.$product_id);?>
            <div class="card-body row">
                <div class="col-md-6 p-3 bg-dark text-white">
                    <img src="<?= base_url('uploads/images/product/'.$product_image);?>" class="card-img-top">                    
                </div>
                <div class="col-md-6 p-3 bg-primary text-white">
                    <div class="row g-3">                        
                        <div class="col-md-12">
                            <label class="form-label">Product Price</label>
                            <input type="text" id="price" class="form-control text-center" value="<?= $product_price; ?>" readonly>
                        </div>
                        <label class="form-label">Quantity</label>
                        <div class="input-group mb-3">                                
                            <label class="input-group-text" id="decrease" onclick="decreaseValue()">-</label>
                            <input type="tel" id="number" name="quantity" value="0" minlength="0" class="form-control text-center" readonly>
                            <label class="input-group-text" id="increase" onclick="increaseValue()" value="Increase Value">+</label>
                        </div>
                        <label class="form-label">Total</label>
                        <div class="input-group mb-3">                                
                            <label class="input-group-text">PHP</label>
                            <input type="tel" id="total" value="0" minlength="0" class="form-control text-center" readonly>
                        </div>
                    </div>
                </div>                         
            </div>
            <div class="d-flex justify-content-around">
                <a class="btn btn-primary m-2" href="<?php echo site_url('Homepage/arrival') ?>" role="button">Go Back</a>
                <button type="submit" id="submitBtn" class="btn btn-primary m-2" disabled>Add to Cart</button>
            </div>
        <?= form_close(); ?>
    </div>
</div>
<br>
<script>
function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;

    var total = parseInt(document.getElementById('total').value, 10);
    var price = parseInt(document.getElementById('price').value, 10);
    document.getElementById('total').value = value * price;

    if (value == 0) {
        document.getElementById("submitBtn").disabled = true;
    } else {
        document.getElementById("submitBtn").disabled = false;
    }
}

function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    document.getElementById('number').value = value;

    var total = parseInt(document.getElementById('total').value, 10);
    var price = parseInt(document.getElementById('price').value, 10);
    document.getElementById('total').value = value * price;

    if (value == 0) {
        document.getElementById("submitBtn").disabled = true;
    } else {
        document.getElementById("submitBtn").disabled = false;
    }
}
</script>