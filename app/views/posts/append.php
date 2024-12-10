<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 78px;"></div>
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card px-2 shadow bg-light my-5">
            <h2 class="h3">Make Series</h2>
            <p class="fst-italic fs-6 fw-light">Create A Stream Of Thought</p>
            <form action="<?php echo URLROOT; ?>/process/append/<?= $data['post']->id; ?>" method="post">
                <div class="form-group">
                    <label>Title</label>
                    <input value="<?= $data['post']->title ?>" disabled class="form-control form-control-lg border-0 outline-0">
                </div>
                <?php $n = 1;
                foreach ($data['posts'] as $post): ?>
                    <div class="form-group my-3">
                        <label>Episode <?= $n; ?></label>
                        <textarea disabled cols="30" rows="7" class="form-control form-control-lg"><?php echo $post->body; ?></textarea>

                    </div>
                <?php $n++;
                endforeach; ?>
                <div class="form-group my-3">
                    <label>Next Episode</label>
                    <textarea name="ep2" cols="30" rows="7" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Write here..."><?php echo $data['body']; ?></textarea>
                    <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                </div>
                <div class="d-flex">
                    <input type="submit" class="btn btn-success px-5 my-2 me-2" value="Submit">
                    <a href="<?= URLROOT; ?>/users/wall" class="btn my-2"><i class="bi bi-chevron-left"></i> Return</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>