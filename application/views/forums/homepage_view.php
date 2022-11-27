<section class="bg-dark py-5 text-center text-white container-fluid">
    <h1>Welcome to GoShopping Website! Enjoy yourself!</h1>
</section>

<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 5"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 6"></button>
    </div>

    <div class="carousel-inner text-center">
        <div class="carousel-item active pb-5" data-bs-interval="10000">
            <!-- First Slide Start -->
            <div class="container mt-3 mb-5 pb-5">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p1.png');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Meat</h5>
                                <textarea class="form-control bg-white mb-2" rows="4" readonly>High quality and fresh livestock containing all the amino acids necessary for the human body.</textarea>
                                <a href="<?php echo site_url('Homepage/Category/Meat') ?>" class="btn btn-white border-dark">Go to Meat Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p2.jpg');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Poultry</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">The best proteins which are chickens and eggs, require the best service keeping it loyal to the quality fresh from the start.</textarea>
                                <a href="<?= site_url('Homepage/category/Poultry');?>" class="btn btn-white border-dark">Go to Poultry Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p3.webp');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Beverages</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Craving for a beverage? Well, there are so many options for you to choose from, for example, juice, beer, wine, etc. This wide variety of beverages may dazzle you.</textarea>
                                <a href="<?= site_url('Homepage/category/Beverages');?>" class="btn btn-white border-dark">Go to Beverages Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
            <h5>First slide</h5>
                <p>Representative category content for the first slide.</p>
            </div>
            <!-- First Slide End -->
        </div>

        <div class="carousel-item pb-5" data-bs-interval="10000">
            <!-- Second Slide Start -->
            <div class="container mt-3 mb-5 pb-5">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p4.jpg');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Personal Care</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Personal care or toiletries used in personal hygiene, personal grooming or for beautification.</textarea>
                                <a href="<?= site_url('Homepage/category/Personal Care');?>" class="btn btn-white border-dark">Go to Personal Care Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p5.jpg');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Fruits and Vegetables</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Cabbage, cauliflower, Brussels sprouts and broccoli apples and pears etc.</textarea>
                                <a href="<?= site_url('Homepage/category/Fruits and Vegetables');?>" class="btn btn-white border-dark">Go to Fruits and Vegetables Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p6.webp');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Junk Foods</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Imported and native junk foods including Ruffles, Lays, Cheesy, Piattos, Pillows, Nova, Tortillas.</textarea>
                                <a href="<?= site_url('Homepage/category/Junk Foods');?>" class="btn btn-white border-dark">Go to Junk Foods Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
            <h5>Second slide</h5>
                <p>Representative category content for the second slide.</p>
            </div>
            <!-- Second Slide End -->
        </div>

        <div class="carousel-item pb-5" data-bs-interval="10000">
            <!-- Third Slide Start -->
            <div class="container mt-3 mb-5 pb-5">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p7.webp');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Seafood</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Fresh and High Quality Bangus, Galunggong, Tilapia, etc.</textarea>
                                <a href="<?= site_url('Homepage/category/Seafood');?>" class="btn btn-white border-dark">Go to Seafood Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p8.jpg');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Processed Foods</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Cereals, Cheese, Bacon, Sausage, Ham Salami, MRE.</textarea>
                                <a href="<?= site_url('Homepage/category/Processed Foods');?>" class="btn btn-white border-dark">Go to Processed Foods Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p9.jpg');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Bread and Bakery</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Crinkles, Pandesal, Gardenia, Black Forest, Ensymada, Hopia, Siopao, Empanada.</textarea>
                                <a href="<?= site_url('Homepage/category/Bread and Bakery');?>" class="btn btn-white border-dark">Go to Bread and Bakery Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
            <h5>Third slide</h5>
                <p>Representative category content for the third slide.</p>
            </div>
            <!-- Third Slide End -->
        </div>

        <div class="carousel-item pb-5" data-bs-interval="10000">
            <!-- Fourth Slide Start -->
            <div class="container mt-3 mb-5 pb-5">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p10.png');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Cleaners</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">All- purpose, laundry detergent, dishwashing liquid/detergent</textarea>
                                <a href="<?= site_url('Homepage/category/Cleaners');?>" class="btn btn-white border-dark">Go to Cleaners Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p11.jpg');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Paper Goods</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Paper towels, toilet paper, aluminum foil, sandwich bags</textarea>
                                <a href="<?= site_url('Homepage/category/Paper Goods');?>" class="btn btn-white border-dark">Go to Paper Goods Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p12.jpg');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Canned and Jarred Goods</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">All canned goods ready to eat, Corned Beef, Century Tuna, Sarines, Sisig.</textarea>
                                <a href="<?= site_url('Homepage/category/Canned and Jarred Goods');?>" class="btn btn-white border-dark">Go to Canned and Jarred Goods Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
            <h5>Fourth slide</h5>
                <p>Representative category content for the fourth slide.</p>
            </div>
            <!-- Fourth Slide End -->
        </div>

        <div class="carousel-item pb-5" data-bs-interval="10000">
            <!-- Fifth Slide Start -->
            <div class="container mt-3 mb-5 pb-5">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p13.png');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Cereal</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Oats, rice, wheat, granola, etc.</textarea>
                                <a href="<?= site_url('Homepage/category/Cereal');?>" class="btn btn-white border-dark">Go to Cereal Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p14.webp');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Frozen Foods</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Fish, ice cream, pizza, potatoes, ready meals, etc.</textarea>
                                <a href="<?= site_url('Homepage/category/Frozen Foods');?>" class="btn btn-white border-dark">Go to Frozen Foods Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p15.webp');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pasta and Rice</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Spaghetti, macaroni, noodles, white rice, etc.</textarea>
                                <a href="<?= site_url('Homepage/category/Pasta and Rice');?>" class="btn btn-white border-dark">Go to Pasta|Rice Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
            <h5>Fifth slide</h5>
                <p>Representative category content for the fifth slide.</p>
            </div>
            <!-- Fifth Slide End -->
        </div>

        <div class="carousel-item pb-5" data-bs-interval="10000">
            <!-- Sixth Slide Start -->
            <div class="container mt-3 mb-5 pb-5">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p16.jpg');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Deli</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Cheese, ham, turkey, salami, etc</textarea>
                                <a href="<?= site_url('Homepage/category/Deli');?>" class="btn btn-white border-dark">Go to Deli Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="<?= base_url('uploads/private/p17.webp');?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Condiments</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Salt, sugar, pepper, oregano, cinnamon, ketchup, mayonnaise, mustard, etc.</textarea>
                                <a href="<?= site_url('Homepage/category/Condiments');?>" class="btn btn-white border-dark">Go to Condiments Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Others</h5>
                                <textarea class="form-control bg-white mb-2" rows="4">Baby items, pet items, batteries, greeting cards, flowers, tobacco, etc. </textarea>
                                <a href="<?= site_url('Homepage/category/Others');?>" class="btn btn-white border-dark">Go to Others Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
                <h5>Sixth slide</h5>
                <p>Representative category content for the sixth slide.</p>
            </div>
            <!-- Sixth Slide End -->
        </div>
        
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section class="bg-dark py-5 text-center container-fluid">    
    <div class="row py-lg-5">
        <div class="col-md-6 text-white align-self-center">
            <div class="card-body d-flex justify-content-center">
                <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_7foh1e6l.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
            </div> 
            <h1>New Arriving Products</h1>
            <a href="<?php echo site_url('Homepage/arrival/') ?>" class="btn text-white border border-white">View Products</a>
        </div>
        <div class="col-md-4">
            <?php if($new_list): ?>
                <div class="card">                        
                        <div class="card-header">
                            <img src="<?= base_url('uploads/images/product/'.$new_list->product_image);?>" class="card-img-top img-thumbnail">
                        </div>                        
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text">Name</span>
                                <input class="form-control bg-white" value="<?= $new_list->product_name; ?>" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-circle-info fa-2x"></i></span>
                                <textarea class="form-control bg-white" rows="3" readonly><?= $new_list->product_description;  ?></textarea>
                            </div> 
                            <div class="input-group mb-3">
                                <span class="input-group-text">PHP</span>
                                <input class="form-control bg-white" value="<?= number_format($new_list->product_price, 2);  ?>" readonly>
                            </div>                    
                        </div>
                    </div>   
            <?php else: ?>
                <div class="card text-center">
                    <div class="card-title">
                        <h1>Sorry for the inconvenience there are still no updates yet.</h1>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <lottie-player src="https://assets4.lottiefiles.com/private_files/lf30_e3pteeho.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player>
                    </div>                    
                </div>
            <?php endif; ?>            
        </div>
    </div>
</section>