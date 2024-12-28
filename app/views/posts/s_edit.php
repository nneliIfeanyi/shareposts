<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 78px;"></div>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= URLROOT; ?>/posts"><i class="bi bi-house text-muted"></i></a></li>
        <li class="breadcrumb-item fst-italic">Edit Post</li>
    </ol>
</nav>
<?php flash('post_message'); ?>
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="mb-5">
            <!-- <p class="fst-italic fs-6 fw-light">Change the details of this post</p> -->
            <form action="<?php echo URLROOT; ?>/process/edit/<?php echo $data['id']; ?>" method="post">
                <input type="hidden" name="title" value="<?php echo $data['title']; ?>">
                <div class="form-group my-3" style="position: relative;">
                    <textarea id="post_body" name="body" cols="30" rows="10" maxlength="500" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Write here..."><?php echo $data['body']; ?></textarea>
                    <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                    <span class="input-count pe-2" id="pla"></span>
                </div>
                <div class="d-flex">
                    <input type="submit" class="btn btn-success px-5 me-3" value="Submit">
                    <a href="<?= URLROOT; ?>/users/series/<?= $data['post']->s_id; ?>" class="btn btn-outline-secondary"><i class="bi bi-chevron-left"></i> Return</a>
                </div>
            </form>
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