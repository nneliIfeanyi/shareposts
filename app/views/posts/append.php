<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 78px;"></div>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= URLROOT; ?>/posts"><i class="bi bi-house text-muted"></i></a></li>
        <li class="breadcrumb-item fst-italic">Append Post</li>
    </ol>
</nav>
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class=" px-2  pb-3 mb-5">
            <h2 class="h3">Make Series</h2>
            <p class="fst-italic fs-6 fw-light">Create A Stream Of Thought</p>
            <form action="<?php echo URLROOT; ?>/process/append/<?= $data['post']->id; ?>" method="post">
                <div class="form-group">
                    <label>Title</label>
                    <input style="background-color: inherit;" value="<?= $data['post']->title ?>" disabled class="form-control form-control-lg outline-0">
                </div>
                <?php $n = 1;
                foreach ($data['posts'] as $post): ?>
                    <div class="form-group my-3">
                        <label>Episode <?= $n; ?></label>
                        <textarea style="background-color: inherit;" disabled cols="30" rows="7" class="form-control form-control-lg"><?php echo $post->body; ?></textarea>

                    </div>
                <?php $n++;
                endforeach; ?>
                <div class="form-group my-3">
                    <label>Next Episode</label>
                    <textarea name="ep2" cols="30" rows="7" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" placeholder="Write here..."><?php echo $data['body']; ?></textarea>
                    <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
                </div>
                <div class="d-flex">
                    <input type="submit" class="btn btn-success px-4 me-3" value="Submit">
                    <a href="<?php echo URLROOT; ?>/users/wall" class="btn btn-outline-secondary">Not Now</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>