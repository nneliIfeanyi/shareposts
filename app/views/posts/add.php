<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="bi bi-chevron-left" aria-hidden="true"></i> Back</a>
<div class="row">
  <div class="col-lg-6 mx-auto">
    <div class="card px-2 shadow bg-light my-5">
      <h2 class="h3">Add Post</h2>
      <p class="fst-italic fs-6 fw-light">Create a post with this form</p>
      <form action="<?php echo URLROOT; ?>/posts/add" method="post">
        <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>" placeholder="Add a title...">
          <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="form-group my-3">
          <label>Body</label>
          <textarea name="body" cols="30" rows="10" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Write here..."><?php echo $data['body']; ?></textarea>
          <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success px-5 my-2" value="Submit">
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>