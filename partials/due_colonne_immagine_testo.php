<?php global $image_path; ?>
<div class="divider"></div>
<div class="section due_colonne" <?php if(get_sub_field("white_background")): echo "style='background:#fff'"; endif; ?>>
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
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="image">
                    <img src="<?php echo wp_get_attachment_url(get_sub_field("immagine")); ?>" class="img-fluid">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="text">
                    <?php echo get_sub_field("testo"); ?>
                    <?php if(get_sub_field("link_bottone")): ?>
                        <a class="orange-button" href="<?php echo get_sub_field("link_bottone"); ?>"><?php echo get_sub_field("testo_bottone"); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>