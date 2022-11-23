<br>
    <div class="container-fluid">
        <div class="d-flex justify-content-center align-items-center">
            <!-- Card -->
            <div class="card container">
                <div class="row text-center">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="">
                            <img src="https://abs.twimg.com/sticky/default_profile_images/default_profile_400x400.png" alt="Generic placeholder image" class="img-fluid rounded-circle img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div>
                            <h5> Total Orders </h5>
                            <p><?= $count_total_order; ?></p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div>
                            <h5> Current Balance</h5>
                            <p>PHP: <span><?= number_format($current_balance, 2); ?></span></p>
                        </div>
                    </div>
                </div>

                <div class="row p-4 text-black bg-secondary">
                    <div class="col-md-6">
                        <h5 class="m-1"><?= $this->session->userdata('login_email'); ?></h5>
                        <p class="m-1"><?= $this->session->userdata('login_username'); ?></p>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <a class="btn btn-primary m-1" href="<?php echo site_url('Profile/deposit/') ?>">Cash-in</a>
                        <button class="btn btn-primary m-1"> <a class="text-white text-decoration-none" href="<?= site_url('Edit'); ?>">Edit Profile</a> </button>
                    </div>                    
                </div>

                <div class="card-body p-4 text-black">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="lead fw-normal mb-0">Transaction Activity</p>
                    </div>
                    <div class="card-body p-0">
                        <div class="card">
                            <!-- Card Body -->
                            <div class="table-responsive">
                                <table class="table table-sm text-center">
                                    <thead>
                                        <tr>                                       
                                            <th scope="col">Date Made</th>
                                            <th scope="col">Transaction</th>
                                            <th scope="col">User Balance</th>
                                            <th scope="col">Discount</th>                                            
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <?php if (!$transaction_list == 0): ?>

                                            <caption class="ms-3">End of list transactions...</caption>

                                            <?php foreach($transaction_list as $transaction): ?>
                                                <tr>         
                                                    <td>
                                                        <p><?= $newdateformat = date("D, d M Y h:i:s A", strtotime($transaction->transaction_date));?></p>
                                                    </td>
                                                    <td>
                                                        <?php if ($transaction->transaction_status == "DEPOSIT"): ?>
                                                            <p> + PHP <?= number_format($transaction->transaction_balance, 2); ?></p>
                                                        <?php else: ?>
                                                            <p> - PHP <?= number_format($transaction->transaction_balance, 2); ?></p>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <p> PHP <?= number_format($transaction->user_balance, 2); ?></p>
                                                    </td>
                                                    <td>
                                                        <p> PHP <?= number_format($transaction->transaction_discount, 2); ?></p>
                                                    </td>                                                
                                                    <td>
                                                        <p><?= $transaction->transaction_status; ?></p>
                                                    </td>
                                                </tr> 
                                            <?php endforeach; ?>   
                                        <?php elseif($transaction_list == 0): ?>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>