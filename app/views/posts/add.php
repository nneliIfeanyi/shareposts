<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 78px;"></div>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= URLROOT; ?>/posts"><i class="bi bi-house text-muted"></i></a></li>
    <li class="breadcrumb-item fst-italic">Add Post</li>
  </ol>
</nav>
<div class="row">
  <div class="col-lg-6 mx-auto">
    <div class="card px-2 shadow  mb-5">
      <p class="fst-italic fs-6 fw-light">Type or paste what's on your mind</p>
      <form action="<?php echo URLROOT; ?>/posts/add" method="post">
        <div class="form-group">
          <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>" placeholder="Add a title...">
          <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="form-group my-3">
          <textarea name="body" cols="30" rows="10" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Write here..."><?php echo $data['body']; ?></textarea>
          <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success px-5 my-2" value="Submit">
        <!-- <p class="fst-italic fs-6 fw-light">Create a post with this form</p> -->
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>