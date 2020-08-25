<?php global $image_path; ?> 
<div class="divider"></div>
<div class="section full-banner" <?php if(get_sub_field("white_background")): echo "style='background:#fff'"; endif; ?>>
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
            <div class="col-12">
                <div class="banner">
                    <a href="<?php echo get_sub_field("link_banner"); ?>">
                        <img src="<?php echo wp_get_attachment_url(get_sub_field("immagine_banner"));?>" class="img-full">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>