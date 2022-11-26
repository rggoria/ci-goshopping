<div class="d-flex flex-nowrap" id="navbar-example2">
    <!-- OPEN -->
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100 ">
            <a href="" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <h2 class="d-none d-sm-inline ms-4 mb-5 mt-5">Admin Panel</h2>
            </a>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                <li class="nav-item mt-5">
                    <a href="<?= site_url('Admin') ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-house">
                            <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </i>
                    </a>
                </li>
                <li class="mt-5">
                    <a href="#user" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-users">
                            <span class="ms-1 d-none d-sm-inline">List of Users</span>
                        </i>
                    </a>
                </li>
                <li class="nav-item mt-5">
                    <a href="#product" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-shop">
                            <span class="ms-1 d-none d-sm-inline">List of Products</span>
                        </i>
                    </a>
                </li>
                <li class=" mt-5">
                    <a href="#order" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-list">
                            <span class="ms-1 d-none d-sm-inline">List of Orders</span>
                        </i>
                    </a>
                </li>
                <li class="mt-5">
                    <a href="<?= site_url('Admin/logout_admin'); ?>" class="nav-link px-0 align-middle">
                        <i class="fa-solid fa-right-from-bracket">
                            <span class="ms-1 d-none d-sm-inline">
                            Logout</span>
                        </i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- CLOSE -->    
    <div class="container-fluid">
        <!-- OPEN -->
        <div class="row">
            <div class="card col-md-4">
                <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                    <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                        <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                    </div>
                    <div class="ms-3" style="margin-top: 130px;">
                        <h5>Users</h5>
                    </div>
                </div>
                <div class="p-4 text-black" style="background-color: #f8f9fa;">
                    <div class="d-flex justify-content-end text-center py-1">
                        <div>
                            <p class="mb-1 h5"><?= $user_count; ?></p>
                            <p class="small text-muted mb-0">Total Number of Users</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-4">
                <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                    <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                        <img src="https://cdn-icons-png.flaticon.com/512/81/81960.png" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                    </div>
                    <div class="ms-3" style="margin-top: 130px;">
                        <h5>Products</h5>
                    </div>
                </div>
                <div class="p-4 text-black" style="background-color: #f8f9fa;">
                    <div class="d-flex justify-content-end text-center py-1">
                        <div>
                            <p class="mb-1 h5"><?= $product_count; ?></p>
                            <p class="small text-muted mb-0">Total Number of Products</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-4">
                <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                    <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                        <img src="https://cdn-icons-png.flaticon.com/512/3496/3496156.png" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                    </div>
                    <div class="ms-3" style="margin-top: 130px;">
                        <h5>Order</h5>
                    </div>
                </div>
                <div class="p-4 text-black" style="background-color: #f8f9fa;">
                    <div class="d-flex justify-content-end text-center py-1">
                        <div>
                            <p class="mb-1 h5"><?= $order_count; ?></p>
                            <p class="small text-muted mb-0">Total Number of Orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CLOSE -->
        <div class="my-5" data-spy="scroll" data-target="#navbar-example2" data-offset="0">            
            <!-- List of users -->
            <div class="mt-5">
                <div class="row">
                    <div class="col-md-6 text-start">
                        <h4 id="user">List of Users</h4>
                    </div>
                    <div class="col-md-6 text-end mb-1">
                        <a href="<?= site_url('Admin/add_user') ?>" class="btn btn-success" type="button">Add Users</a>
                    </div>
                </div>
                <div class="table-responsive-xxl card">
                    <table class="table table-striped table-hover ">
                        <caption class="ms-2">End of list of users...</caption>
                        <thead>
                            <tr>
                                <th scope="col">Username</th>
                                <th scope="col">User Email</th>
                                <th scope="col">User Status</th>
                                <th scope="col">User Command</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$user_list == 0): ?>
                                <?php foreach($user_list as $user): ?>                             
                                    <tr>
                                        <th scope="row"><?= $user->user_username; ?></th>
                                        <td><?= $user->user_email; ?></td>
                                        <td><?= $user->user_status; ?></td>
                                        <td class="d-flex justify-content-start">
                                            <a href="<?= site_url('Admin/edit_user/'.$user->user_id) ?>" class="btn btn-warning mx-1" type="button">Edit</a>
                                            <?php if ($user->user_status == "USER"): ?>
                                                <a href="<?= site_url('Admin/disable_user/'.$user->user_id) ?>" class="btn btn-danger mx-1" type="button">Disabled</a>
                                            <?php elseif ($user->user_status == "DISABLE"): ?>
                                                <a href="<?= site_url('Admin/activate_user/'.$user->user_id) ?>" class="btn btn-primary mx-1" type="button">Activate</a>
                                            <?php else: ?>
                                                <?php continue; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>                                
                                <?php endforeach; ?> 
                            <?php elseif($user_list == 0): ?>
                                <tr>
                                    <td colspan="5">
                                        Empty
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- List of products -->
            <div class="mt-5">
                <div class="row">
                    <div class="col-md-6 text-start">
                        <h4 id="product">List of Products</h4>
                    </div>
                    <div class="col-md-6 text-end mb-1">
                        <a href="<?= site_url('Admin/add_product') ?>" class="btn btn-success" type="button">Add products</a>                        
                    </div>
                </div>                
                <div class="table-responsive-xxl card">
                    <table class="table table-striped table-hover ">
                        <caption class="ms-2">End of list of products...</caption>
                        <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Category</th>
                                <th scope="col">Product Command</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$product_list == 0): ?>
                                <?php foreach($product_list as $product): ?>
                                    <tr>
                                        <th scope="row"><?= $product->product_name; ?></th>
                                        <td><?= $product->product_price; ?></td>
                                        <td><?= $product->product_category; ?></td>
                                        <td><a href="<?= site_url('Admin/edit_product/'.$product->product_id) ?>" class="btn btn-warning" type="button">Edit</a></td>
                                    </tr>                                
                                <?php endforeach; ?>
                            <?php elseif($product_list == 0): ?>
                                <tr>
                                    <td colspan="3">
                                        Empty
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- List of orders -->
            <div class="mt-5">
                <h4 id="order">List of Orders</h4>
                <div class="table-responsive-xxl card">
                    <table class="table table-striped table-hover ">
                        <caption class="ms-2">End of list of orders...</caption>
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Order Quantity</th>
                                <th scope="col">Order Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$order_list == 0): ?>
                                <?php foreach($order_list as $order): ?>
                                    <tr>
                                        <th scope="row"><?= $order->order_id; ?></th>
                                        <td><?= $order->product_name; ?></td>
                                        <td><?= $order->order_quantity; ?></td>
                                        <td><?= $order->order_status; ?></td>
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
    </div>
</div>