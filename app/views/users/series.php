<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 78px;"></div>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= URLROOT; ?>/posts"><i class="bi bi-house text-muted"></i></a></li>
        <li class="breadcrumb-item fst-italic">Series</li>
    </ol>
</nav>
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
            <?php if ($n == 1): ?>
                <a class="btn-sm btn btn-dark me-2" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $post->id; ?>">Edit</a>
                <a href="<?= URLROOT; ?>/users/wall" class="btn btn-sm"><i class="bi bi-chevron-left"></i> Return</a>
            <?php else : ?>

                <a class="btn-sm btn btn-dark me-2" href="<?php echo URLROOT; ?>/posts/s_edit/<?php echo $post->id; ?>">Edit</a>
                <form class="ms-2" action="<?php echo URLROOT; ?>/posts/delete_series/<?php echo $post->id; ?>" method="post">
                    <input type="hidden" name="s_id" value="<?= $post->s_id; ?>">
                    <input type="submit" class="btn-sm btn btn-danger" value="Delete">
                </form>
                <a href="<?= URLROOT; ?>/users/wall" class="ms-2 btn btn-sm"><i class="bi bi-chevron-left"></i> Return</a>
            <?php endif; ?>
        </div>
    </div>
<?php $n++;
endforeach; ?>
<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>