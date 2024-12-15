<script src="<?php echo URLROOT; ?>/js/jquery.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.js"></script>
<script src="<?php echo URLROOT; ?>/tinymce/tinymce.min.js"></script>
<script src="<?php echo URLROOT; ?>/app.js"></script>
<script>
    $(function() {
        $('#loading-bg').delay(300).fadeOut('slow');
        $('#loading-image').delay(300).fadeOut('slow');

        $(window).on('beforeunload', function() {
            $('#loading-bg').fadeIn();
            $('#loading-image').fadeIn();
        });
    });
</script>