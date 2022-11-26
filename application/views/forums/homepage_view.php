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
                    <div class="col-4">
                        <div class="card">
                            <img src="https://i.pinimg.com/originals/07/87/a6/0787a6c9bce72eb7026e9069fefbcc9a.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Meat</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="<?php echo site_url('Homepage/Category/Meat') ?>" class="btn btn-white border-dark">Go to Meat Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/005/607/208/small_2x/meat-and-meat-products-color-set-simple-design-on-brown-background-flat-style-cartoon-illustration-free-vector.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Poultry</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="<?= site_url('Homepage/category/Poultry');?>" class="btn btn-white border-dark">Go to Poultry Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img src="https://img.freepik.com/free-vector/drinks_1308-4653.jpg?w=2000" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Beverages</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="<?= site_url('Homepage/category/Beverages');?>" class="btn btn-white border-dark">Go to Beverages Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
                <p>Representative category content for the first slide.</p>
            </div>
            <!-- First Slide End -->
        </div>

        <div class="carousel-item pb-5" data-bs-interval="10000">
            <!-- Second Slide Start -->
            <div class="container mt-3 mb-5 pb-5">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <img src="https://st.depositphotos.com/1531425/1985/v/450/depositphotos_19856381-stock-illustration-personal-care-icons.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Personal Care</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="<?= site_url('Homepage/category/Personal Care');?>" class="btn btn-white border-dark">Go to Personal Care Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img src="http://unblast.com/wp-content/uploads/2020/09/Fruit-and-Vegetable-Icons-2.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Fruits and Vegetables</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="<?= site_url('Homepage/category/Fruits and Vegetables');?>" class="btn btn-white border-dark">Go to Fruits and Vegetables Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img src="https://img.freepik.com/free-vector/fast-food-icon-set_1284-4716.jpg?w=2000" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Junk Foods</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="<?= site_url('Homepage/category/Junk Foods');?>" class="btn btn-white border-dark">Go to Junk Foods Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
                <p>Representative category content for the second slide.</p>
            </div>
            <!-- Second Slide End -->
        </div>

        <div class="carousel-item pb-5" data-bs-interval="10000">
            <!-- Third Slide Start -->
            <div class="container mt-3 mb-5 pb-5">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <img src="https://img.freepik.com/free-vector/seafood-icon-set-with-fish-vine-which-are-prepared-restaurant_1284-33861.jpg?w=2000" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Seafood</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="<?= site_url('Homepage/category/Seafood');?>" class="btn btn-white border-dark">Go to Seafood Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img src="https://media.istockphoto.com/id/1213557382/vector/processed-foods-icon-set.jpg?s=612x612&w=0&k=20&c=OnRXPEv2XBxa-cozPeo8y14Gp_z1e71OJFBJGBUnIks=" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Processed Foods</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="<?= site_url('Homepage/category/Processed Foods');?>" class="btn btn-white border-dark">Go to Processed Foods Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img src="https://static.vecteezy.com/system/resources/previews/005/317/422/non_2x/bakery-icons-set-outline-style-vector.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Bread and Bakery</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="<?= site_url('Homepage/category/Bread and Bakery');?>" class="btn btn-white border-dark">Go to Bread and Bakery Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
                <p>Representative category content for the third slide.</p>
            </div>
            <!-- Third Slide End -->
        </div>

        <div class="carousel-item pb-5" data-bs-interval="10000">
            <!-- Fourth Slide Start -->
            <div class="container mt-3 mb-5 pb-5">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <img src="https://cdn.w600.comps.canstockphoto.com/cleaning-supplies-vector-clip-art_csp30713316.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Cleaners</h5>
                                <p class="card-text">All- purpose, laundry detergent, dishwashing liquid/detergent</p>
                                <a href="<?= site_url('Homepage/category/Cleaners');?>" class="btn btn-white border-dark">Go to Cleaners Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img src="https://media.istockphoto.com/id/1353743528/vector/supermarket-line-icons.jpg?s=612x612&w=0&k=20&c=Nc-ToKZpjYmxDUpTfauFE_2wf3aKf_RcGFjAUf8EsXs=" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Paper Goods</h5>
                                <p class="card-text">Paper towels, toilet paper, aluminum foil, sandwich bags</p>
                                <a href="<?= site_url('Homepage/category/Paper Goods');?>" class="btn btn-white border-dark">Go to Paper Goods Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img src="https://media.istockphoto.com/id/1144415199/vector/colored-icon-collection-food-in-aluminum-can-canned-fruits-and-olives-product-for.jpg?s=612x612&w=0&k=20&c=GVwbbInV2vcZs8JKCPdxswhhwxMSIrK19yfYVqJIDZw=" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Canned and Jarred Goods</h5>
                                <p class="card-text">All- purpose, laundry detergent, dishwashing liquid/detergent</p>
                                <a href="<?= site_url('Homepage/category/Canned and Jarred Goods');?>" class="btn btn-white border-dark">Go to Canned and Jarred Goods Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
            <h5>Fourth slide label</h5>
                <p>Representative category content for the fourth slide.</p>
            </div>
            <!-- Fourth Slide End -->
        </div>

        <div class="carousel-item pb-5" data-bs-interval="10000">
            <!-- Fifth Slide Start -->
            <div class="container mt-3 mb-5 pb-5">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <img src="https://www.freeiconspng.com/uploads/supermarket-png-4.png
                            " class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Cereal</h5>
                                <p class="card-text">Oats, rice, wheat, granola, etc.</p>
                                <a href="<?= site_url('Homepage/category/Cereal');?>" class="btn btn-white border-dark">Go to Cereal Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img src="https://img.freepik.com/premium-vector/frozen-food-store-with-products-vacuumed-using-foil-pouch-packaging-be-fresh-illustration_2175-8688.jpg?w=2000" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Frozen Foods</h5>
                                <p class="card-text">Fish, ice cream, pizza, potatoes, ready meals, etc.</p>
                                <a href="<?= site_url('Homepage/category/Frozen Foods');?>" class="btn btn-white border-dark">Go to Frozen Foods Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img src="http://cdn.shopify.com/s/files/1/0434/9824/2204/collections/Rice_Pasta_Noodles_1200x1200.png?v=1597717641" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Pasta and Rice</h5>
                                <p class="card-text">Spaghetti, macaroni, noodles, white rice, etc.</p>
                                <a href="<?= site_url('Homepage/category/Pasta and Rice');?>" class="btn btn-white border-dark">Go to Pasta|Rice Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
            <h5>Fifth slide label</h5>
                <p>Representative category content for the fifth slide.</p>
            </div>
            <!-- Fifth Slide End -->
        </div>

        <div class="carousel-item pb-5" data-bs-interval="10000">
            <!-- Sixth Slide Start -->
            <div class="container mt-3 mb-5 pb-5">
                <div class="row">
                    <div class="col-4 row">
                        <div class="card">
                            <img src="https://t4.ftcdn.net/jpg/01/85/06/93/360_F_185069371_GfhFqb7GP0mhZYlnY1ZcsO9v2amxabKh.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Deli</h5>
                                <p class="card-text">Cheese, ham, turkey, salami, etc</p>
                                <a href="<?= site_url('Homepage/category/Deli');?>" class="btn btn-white border-dark">Go to Deli Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <img src="https://img.freepik.com/premium-vector/sauce-icon-ketchup-mayonnaise-mustard-soy-sauce-glass-plastic-bottle-tube-bowl-condiment-wavy-trace-stain-icon-set-white-background-food-ingredient-illustration_124507-8321.jpg?w=2000" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Condiments</h5>
                                <p class="card-text">Salt, sugar, pepper, oregano, cinnamon, ketchup, mayonnaise, mustard , etc.</p>
                                <a href="#" class="btn btn-white border-dark">Go to Condiments Category</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Others</h5>
                                <p class="card-text">Baby items, pet items, batteries, greeting cardsp, flowers, tobacco, etc. </p>
                                <a href="<?= site_url('Homepage/category/Others');?>" class="btn btn-white border-dark">Go to Others Category</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-caption d-none d-md-block">
                <h5>Sixth slide label</h5>
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
        <div class="col-6 text-white align-self-center">
            <h1>New Arriving Products</h1>
            <div class="btn text-white border border-white">View Products</div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <?= $new_list->product_name; ?>
                </div>
                <img class="card-img-top" src="<?= base_url('uploads/images/'.$new_list->product_image);?>" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><?= $new_list->product_description; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>