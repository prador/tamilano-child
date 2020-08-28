<?php global $image_path; ?>
<div class="section company-header" <?php if(get_sub_field("white_background")): echo "style='background:#fff'"; endif; ?>s>
    <div class="container">
        <div class="row h-100">   
            <div class="col-custom full-mobile">
                <div class="big-logo">
                    <img src="<?php echo $image_path; ?>/ta-logo-build..svg" class="img-full">
                </div>
            </div>
            <div class="col-center full-mobile">
                <div class="pattern-orange">
                    <img src="<?php echo $image_path; ?>/pattern-orange.svg" class="img-fluid">
                </div>
            </div>
            <div class="col-custom full-mobile">
                <div class="company-header-text">
                    <div class="company-header-title">
                        <?php echo get_sub_field("titolo"); ?>
                    </div>
                    <?php echo get_sub_field("testo"); ?>
                </div>
            </div>
        </div>
    </div>
</div>