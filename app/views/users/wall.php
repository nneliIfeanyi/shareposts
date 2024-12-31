<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 78px;"></div>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= URLROOT; ?>/posts"><i class="bi bi-house text-muted"></i></a></li>
        <li class="breadcrumb-item fst-italic">My Wall</li>
    </ol>
</nav>
<?php flash('post_message'); ?>
<hr>
<h5>Private Posts</h5>
<div class="horizontal-scroll">
    <?php foreach ($data['private'] as $post) : ?>
        <div class="cardz">
            <div class="card card-body mb-3">
                <h4 class="card-title"><?php echo $post->title; ?></h4>
                <div class="bg-light p-2 mb-3">
                    Written on <?php echo $post->created_at; ?>
                </div>
                <p class="card-text"><?php echo $post->body; ?></p>
                <hr>
                <div class="d-flex flex-wrap">

                    <?php if ($isSeries = $this->postModel->checkIfSeries($post->s_id)): ?>
                        <a class=" btn-sm btn btn-outline-secondary me-2 mb-2" href="<?php echo URLROOT; ?>/users/series/<?php echo $post->s_id; ?>">Episodes <span style="font-size: x-small;"><?= $isSeries; ?></span></a>
                        <a class=" btn-sm btn btn-outline-secondary me-2 mb-2" href="<?php echo URLROOT; ?>/posts/append/<?php echo $post->id; ?>">Append More</a>
                    <?php else: ?>
                        <?php if (empty($post->status)): ?>
                            <a class="btn-sm btn btn-outline-success me-2 mb-2" href="<?php echo URLROOT; ?>/posts/status_on/<?php echo $post->id2; ?>">Publish</a>
                        <?php else: ?>
                            <a class="btn-sm btn btn-outline-success me-2 mb-2" href="<?php echo URLROOT; ?>/posts/status_off/<?php echo $post->id2; ?>">Retrieve</a>
                        <?php endif; ?>
                        <a class=" btn-sm btn btn-outline-secondary me-2 mb-2" href="<?php echo URLROOT; ?>/posts/append/<?php echo $post->id; ?>">Append Post</a>
                        <a class=" btn-sm btn btn-outline-secondary me-2 mb-2" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $post->id; ?>">Edit</a>
                        <a class=" btn-sm btn btn-outline-danger me-2 mb-2" href="<?php echo URLROOT; ?>/posts/delete_post/<?php echo $post->id; ?>">Delete</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<hr>
<h5>Public Posts</h5>
<?php foreach ($data['public'] as $post) : ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $post->title; ?></h4>
        <div class="bg-light p-2 mb-3">
            Written on <?php echo $post->created_at; ?>
        </div>
        <p class="card-text"><?php echo $post->body; ?></p>
        <hr>
        <div class="d-flex flex-wrap">

            <?php if ($isSeries = $this->postModel->checkIfSeries($post->s_id)): ?>
                <a class=" btn-sm btn btn-outline-secondary me-2 mb-2" href="<?php echo URLROOT; ?>/users/series/<?php echo $post->s_id; ?>">Episodes <span style="font-size: x-small;"><?= $isSeries; ?></span></a>
                <a class=" btn-sm btn btn-outline-secondary me-2 mb-2" href="<?php echo URLROOT; ?>/posts/append/<?php echo $post->id; ?>">Append More</a>
            <?php else: ?>
                <?php if (empty($post->status)): ?>
                    <a class="btn-sm btn btn-outline-success me-2 mb-2" href="<?php echo URLROOT; ?>/posts/status_on/<?php echo $post->id2; ?>">Publish</a>
                <?php else: ?>
                    <a class="btn-sm btn btn-outline-success me-2 mb-2" href="<?php echo URLROOT; ?>/posts/status_off/<?php echo $post->id2; ?>">Retrieve</a>
                <?php endif; ?>
                <a class=" btn-sm btn btn-outline-secondary me-2 mb-2" href="<?php echo URLROOT; ?>/posts/append/<?php echo $post->id; ?>">Append Post</a>
                <a class=" btn-sm btn btn-outline-secondary me-2 mb-2" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $post->id; ?>">Edit</a>
                <a class=" btn-sm btn btn-outline-danger me-2 mb-2" href="<?php echo URLROOT; ?>/posts/delete_post/<?php echo $post->id; ?>">Delete</a>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>


<?php require APPROOT . '/views/inc/foot.php'; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>