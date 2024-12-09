<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light shadow mt-5">
      <?php flash('register_success'); ?>
      <h2>Login</h2>
      <p class="fst-italic fs-6 fw-light">Please fill in your credentials to login.</p>
      <form action="<?php echo URLROOT; ?>/users/login" method="post">
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <div class="form-group my-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
        <div class="row">
          <div class="col">
            <input type="submit" class="btn btn-success px-5 my-2" value="Login">
          </div>
          <div class="col-lg-6">
            <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light my-2">No account? Register</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>