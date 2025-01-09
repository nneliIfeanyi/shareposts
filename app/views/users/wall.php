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
<h5 class="text-muted lead">Private Posts</h5>
<div class="horizontal-scroll">
    <?php foreach ($data['private'] as $post) : ?>
        <div class="cardz">
            <div class="card card-body mb-3">
                <h4 data-bs-toggle="modal" data-bs-target="#view<?php echo $post->id; ?>" class="card-title text-truncate point"><?php echo $post->title; ?></h4>
                <div class="bg-light p-2 mb-3">
                    Written on <?php echo $post->created_at; ?>
                </div>
                <p data-bs-toggle="modal" data-bs-target="#view<?php echo $post->id; ?>" class="card-text single-line point">
                    <?php echo $post->body; ?>
                </p>
                <hr>
                <div class="d-flex flex-wrap">

                    <?php if ($isSeries = $this->postModel->checkIfSeries($post->s_id)): ?>
                        <a class=" btn-sm btn btn-outline-secondary me-2 mb-2" href="<?php echo URLROOT; ?>/users/series/<?php echo $post->s_id; ?>">Episodes <span style="font-size: x-small;"><?= $isSeries; ?></span></a>
                        <a class=" btn-sm btn btn-outline-secondary me-2 mb-2" href="<?php echo URLROOT; ?>/posts/append/<?php echo $post->id; ?>">Append More</a>
                    <?php else: ?>
                        <?php if (empty($post->status)): ?>
                            <a class="btn-sm btn btn-outline-success me-2 mb-2" href="<?php echo URLROOT; ?>/posts/status_on/<?php echo $post->id2; ?>">
                                <i data-bs-toggle="tooltip" data-bs-title="Publish Post" class="bi bi-send"></i>
                            </a>
                        <?php else: ?>
                            <a class="btn-sm btn btn-outline-success me-2 mb-2" href="<?php echo URLROOT; ?>/posts/status_off/<?php echo $post->id2; ?>">
                                <i data-bs-toggle="tooltip" data-bs-title="Retrieve Post" class="bi bi-send-dash"></i>
                            </a>
                        <?php endif; ?>
                        <a class=" btn-sm btn btn-outline-secondary me-2 mb-2" href="<?php echo URLROOT; ?>/posts/append/<?php echo $post->id; ?>">
                            <i data-bs-toggle="tooltip" data-bs-title="Append Post" class="bi bi-plus-circle"></i>
                        </a>
                        <a class=" btn-sm btn btn-outline-secondary me-2 mb-2" href="<?php echo URLROOT; ?>/posts/edit/<?php echo $post->id; ?>">
                            <i data-bs-toggle="tooltip" data-bs-title="Edit Post" class="bi bi-pen"></i>
                        </a>
                        <a class=" btn-sm btn btn-outline-danger me-2 mb-2" href="<?php echo URLROOT; ?>/posts/delete_post/<?php echo $post->id; ?>">
                            <i data-bs-toggle="tooltip" data-bs-title="Delete Post" class="bi bi-trash"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- View Modal -->
        <div class="modal fade" id="view<?php echo $post->id; ?>" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title multi-line"><?php echo $post->title; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p class="multi-line">
                                <?php echo $post->body; ?>
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex gap-4">
                            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">Done</button>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- End View Modal-->
    <?php endforeach; ?>
</div>
<h5 class="mt-2 text-muted lead">Public Posts</h5>
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