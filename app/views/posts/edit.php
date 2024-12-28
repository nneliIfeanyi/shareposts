<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 78px;"></div>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= URLROOT; ?>/posts"><i class="bi bi-house text-muted"></i></a></li>
    <li class="breadcrumb-item fst-italic">Edit Post</li>
  </ol>
</nav>
<div class="row">
  <div class="col-lg-6 mx-auto">
    <div class="card card-body bg-light mb-5">
      <p class="fst-italic fs-6 fw-light">Change the details of this post</p>
      <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
        <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
          <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="form-group my-3" style="position: relative;">
          <label for="post_body">Body</label>
          <textarea id="post_body" name="body" cols="30" rows="10" maxlength="500" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Write here..."><?php echo $data['body']; ?></textarea>
          <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          <span class="input-count pe-2" id="pla"></span>
        </div>
        <input type="submit" class="btn btn-success my-2 px-5" value="Submit">
      </form>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
  var max = 500;
  $('textarea').keyup(function() {
    var len = $(this).val().length;
    var len = max - len;
    $('#pla').text(len);
  })
</script>