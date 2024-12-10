<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 78px;"></div>
<?php flash('post_message'); ?>
<?php $n = 1;
foreach ($data['posts'] as $post) : ?>
    <div class="card card-body mb-3" style="position: relative;">
        <span class="badge text-bg-light shadow fw-light" style="position: absolute;top:0;right:0;font-size:x-small;">Episode <?= $n; ?></span>
        <h4 class="card-title fst-italic"><?php echo $post->title; ?></h4>
        <div class="bg-light p-2 mb-3">
            Written on <?php echo $post->created_at; ?>
        </div>
        <p class="card-text"><?php echo $post->body; ?></p>
        <hr>
        <div class="d-flex">
            <a class="btn-sm btn btn-dark me-2" href="<?php echo URLROOT; ?>/posts/s_edit/<?php echo $post->id2; ?>">Edit</a>
            <?php if (empty($post->status)): ?>
                <a class="btn-sm btn btn-success me-2" href="<?php echo URLROOT; ?>/posts/status_on/<?php echo $post->id2; ?>">Publish</a>
            <?php else: ?>
                <a class="btn-sm btn btn-success me-2" href="<?php echo URLROOT; ?>/posts/status_off/<?php echo $post->id2; ?>">Retrieve</a>
            <?php endif; ?>
            <a class="btn-sm btn btn-outline-secondary me-2" href="<?php echo URLROOT; ?>/posts/append/<?php echo $post->id; ?>">Append Post</a>
            <form class="ms-2" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $post->id2; ?>" method="post">
                <input type="submit" class="btn-sm btn btn-danger" value="Delete">
            </form>
        </div>
    </div>
<?php $n++;
endforeach; ?>


<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>