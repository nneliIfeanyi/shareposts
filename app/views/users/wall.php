<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 78px;"></div>
<?php flash('post_message'); ?>
<?php foreach ($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $post->title; ?></h4>
        <div class="bg-light p-2 mb-3">
            Written on <?php echo $post->created_at; ?>
        </div>
        <p class="card-text"><?php echo $post->body; ?></p>
        <hr>
        <div class="d-flex">
            <a class="btn-sm btn btn-outline-dark me-2" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $post->id2; ?>">Edit</a>
            <?php if (empty($post->status)): ?>
                <a class="btn-sm btn btn-outline-success me-2" href="<?php echo URLROOT; ?>/posts/status_on/<?php echo $post->id2; ?>">Publish</a>
            <?php else: ?>
                <a class="btn-sm btn btn-outline-success me-2" href="<?php echo URLROOT; ?>/posts/status_off/<?php echo $post->id2; ?>">Retrieve</a>
            <?php endif; ?>
            <?php if ($isSeries = $this->postModel->checkIfSeries($post->s_id)): ?>
                <a class=" btn-sm btn btn-outline-secondary" href="<?php echo URLROOT; ?>/users/series/<?php echo $post->s_id; ?>">Episodes <span style="font-size: x-small;font-weisecondary"><?= $isSeries; ?></span></a>
            <?php else: ?>
                <a class=" btn-sm btn btn-outline-secondary" href="<?php echo URLROOT; ?>/posts/append/<?php echo $post->id; ?>">Append Post</a>
            <?php endif; ?>
            <form class="ms-2" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $post->id2; ?>" method="post">
                <input type="submit" class="btn-sm btn btn-outline-danger" value="Delete">
            </form>
        </div>
    </div>
<?php endforeach; ?>


<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>