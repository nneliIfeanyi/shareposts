<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>" class="btn btn-light"><i class="bi bi-chevron-left" aria-hidden="true"></i> Back</a>
<div class="card card-body bg-light mt-5">
    <h2>Edit Post</h2>
    <p class="fst-italic fs-6 fw-light">Change the details of this post</p>
    <form action="<?php echo URLROOT; ?>/process/edit/<?php echo $data['id']; ?>" method="post">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>
        <div class="form-group my-3">
            <label>Body</label>
            <textarea name="body" rows="5" cols="30" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success my-2 px-5" value="Submit">
    </form>
</div>


<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>