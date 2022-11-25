<!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
  <div class="p-5 bg-image" style=" background-image: url('https://cdn.crispedge.com/43464b.png'); height: 275px;">
    <h1 class="text-white">
      ADMIN MODE
    </h1>
  </div>
  <!-- Background image -->
  <div class="card py-5 px-md-5  shadow-5-strong" style="margin-top: -100px; backdrop-filter: blur(30px);">
    <?php if ($this->session->flashdata('success')): ?>
      <div class="row d-flex justify-content-center mb-2">
        <div class="col-lg-4">
          <div class="bg-success p-3">
            <h1 class="text-white"><?= $this->session->flashdata('success'); ?></h1>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <i class="fa fa-users fa-light fa-9x"></i>
    <div class="card-body py-5 px-md-5 ">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-4">
          <h2 class="fw-bold mb-5">Edit A User</h2>
          <?php echo form_open('Admin/edit_validation/'.$user->user_id); ?>
            <div class="form-outline mb-4">
              <div class="row">              
                <div class="input-group">
                  <span class="input-group-text">@</span>
                  <input type="text" name="username" class="form-control bg-white" value="<?= $user->user_username; ?>" readonly>
                </div>
                <?php if(form_error('username')):?>
                  <small class="text-danger fw-bold fst-italic"><?= form_error('username'); ?></small>
                <?php else:?>
                  <label class="form-label">Username</label>
                <?php endif;?>                

                <div class="col-md-6">
                  <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input type="text" name="firstname" class="form-control bg-white" value="<?= $user->user_firstname; ?>">
                  </div>
                  <?php if(form_error('firstname')):?>
                    <small class="text-danger fw-bold fst-italic"><?= form_error('firstname'); ?></small>
                  <?php else:?>
                    <label class="form-label">Firstname</label>
                  <?php endif;?> 
                </div>
                
                <div class="col-md-6 mb-4">
                  <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input type="text" name="lastname" class="form-control" value="<?= $user->user_firstname; ?>">
                  </div>
                  <?php if(form_error('lastname')):?>
                    <small class="text-danger fw-bold fst-italic"><?= form_error('lastname'); ?></small>
                  <?php else:?>
                    <label class="form-label">Lastname</label>
                  <?php endif;?> 
                </div>
                
              </div>
              <!-- Email input -->
              <div class="input-group">
                <span class="input-group-text">@</span>
                <input type="text" name="email" class="form-control bg-white" value="<?= $user->user_email; ?>" readonly>
              </div>
              <?php if(form_error('email')):?>
                <small class="text-danger fw-bold fst-italic"><?= form_error('email'); ?></small>
              <?php else:?>
                <label class="form-label">Email</label>
              <?php endif;?>

              <!-- Password input -->
              <div class="input-group">
                <span class="input-group-text">@</span>
                <input type="text" name="password" class="form-control" value="<?= $user->user_password; ?>">
              </div>
              <?php if(form_error('password')):?>
                <small class="text-danger fw-bold fst-italic"><?= form_error('password'); ?></small>
              <?php else:?>
                <label class="form-label">Password</label>
              <?php endif;?>
            </div>
            <!-- Submit button -->
            <a href="<?= site_url('Admin') ?>" class="btn btn-danger btn-block mb-4 me-5" type="button">Go Back</a>
            <button type="submit" class="btn btn-success btn-block mb-4">Update User</button>
          <?php form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->