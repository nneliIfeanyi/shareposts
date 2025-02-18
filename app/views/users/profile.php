<?php require APPROOT . '/views/inc/header.php'; ?>
<div style="margin-top: 78px;"></div>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= URLROOT; ?>/posts"><i class="bi bi-house text-muted"></i></a></li>
        <li class="breadcrumb-item fst-italic">Profile</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mb-5">
            <?php flash('profile_message'); ?>
            <p class="fst-italic fs-6 fw-light">Change details of this form to update profile</p>
            <form action="<?php echo URLROOT; ?>/users/profile" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control form-control-lg" value="<?php echo $data['user']->name; ?>">
                </div>
                <div class="form-group my-3">
                    <label>Email Address</label>
                    <input type="text" name="email" class="form-control form-control-lg" value="<?php echo $data['user']->email; ?>">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" name="phone" class="form-control form-control-lg" value="<?php echo $data['user']->phone; ?>">
                </div>
                <div class="form-group my-3">
                    <label>Residence</label>
                    <input name="residence" class="form-control form-control-lg" value="<?php echo $data['user']->residence; ?>">
                </div>

                <div class="d-flex">
                    <div class="col">
                        <input type="submit" class="btn btn-success  my-2" value="Save Changes">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/wall" class="btn btn-light my-2"><i class="bi bi-journal-text" aria-hidden="true"></i> My Wall</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require APPROOT . '/views/inc/foot.php'; ?>
    <?php require APPROOT . '/views/inc/footer.php'; ?>