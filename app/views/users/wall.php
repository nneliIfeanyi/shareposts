<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="#" onclick="history.back()" class="btn btn-light mb-3 me-2"><i class="bi bi-chevron-left" aria-hidden="true"></i> Back</a>
<a href="<?php echo URLROOT; ?>/users/profile" class="btn btn-outline-dark mb-3"><i class="bi bi-person" aria-hidden="true"></i> Profile</a>
<a href="<?php echo URLROOT; ?>/posts/add" class="btn mb-3"><i class="bi bi-pen" aria-hidden="true"></i> Add Post</a>
<br>
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
            <a class="btn btn-dark me-2" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $post->id2; ?>">Edit</a>
            <?php if (empty($post->status)): ?>
                <a class="btn btn-success" href="<?php echo URLROOT; ?>/posts/status_on/<?php echo $post->id2; ?>">Publish</a>
            <?php else: ?>
                <a class="btn btn-success" href="<?php echo URLROOT; ?>/posts/status_off/<?php echo $post->id2; ?>">Retrieve</a>
            <?php endif; ?>
            <form class="ms-2" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $post->id2; ?>" method="post">
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </div>
    </div>
<?php endforeach; ?>


<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>