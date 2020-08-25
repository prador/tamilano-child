<?php global $image_path; ?> 
<div class="divider"></div>
<div class="section prize-list" <?php if(get_sub_field("white_background")): echo "style='background:#fff'"; endif; ?>>
    <div class="container">
        <div class="row">   
            <div class="col-center offset-custom left-mobile">
                <div class="section-title-icon">
                    <img src="<?php echo $image_path; ?>/pattern-orange.png" class="img-fluid" />
                </div>
            </div>
            <div class="col-custom pattern-mobile">
                <div class="section-title">
                    <?php echo get_sub_field("titolo"); ?>
                </div>
            </div>
        </div>
        <?php if( have_rows('premio') ): ?>
        <div class="row justify-content-center align-items-center">   
            <?php while( have_rows('premio') ): the_row(); ?>
            <div class="col-custom-3">
                <div class="prize">
                    <img src="<?php echo wp_get_attachment_url(get_sub_field("logo_premio"));?>" class="img-fluid">
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</div>