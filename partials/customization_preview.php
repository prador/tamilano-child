<?php global $image_path; ?> 
<div class="divider"></div>
<div class="section customization-preview" <?php if(get_sub_field("white_background")): echo "style='background:#fff'"; endif; ?>>
    <div class="container">
        <div class="row">   
            <div class="col-center offset-custom">
                <div class="section-title-icon">
                    <img src="<?php echo $image_path; ?>/pattern-orange.png" class="img-fluid" />
                </div>
            </div>
            <div class="col-custom">
                <div class="section-title">
                    <?php echo get_sub_field("titolo"); ?>
                </div>
            </div>
            <?php if(get_sub_field("testo_intro")): ?>
                <div class="col-custom offset-custom-2">
                    <div class="section-text">
                        <?php echo get_sub_field("testo_intro"); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row row-eq-height">   
            <div class="col-12 col-md-6 text-center">
                <div class="image-mosaico big">
                    <img src="<?php echo wp_get_attachment_url(get_sub_field("image_1"));?>" class="img-fluid"/>
                </div>
            </div>
            <div class="col-12 col-md-3 text-center">
                
                <div class="image-mosaico small">
                    <img src="<?php echo wp_get_attachment_url(get_sub_field("image_2"));?>" class="img-fluid"/>
                </div>
                <div class="image-mosaico small">
                    <img src="<?php echo wp_get_attachment_url(get_sub_field("image_3"));?>" class="img-fluid"/>
                </div>
            </div>
            <div class="col-12 col-md-3 text-center">
                <div class="image-mosaico small">
                    <img src="<?php echo wp_get_attachment_url(get_sub_field("image_4"));?>" class="img-fluid"/>
                </div>
                <div class="image-mosaico small">
                    <img src="<?php echo wp_get_attachment_url(get_sub_field("image_5"));?>" class="img-fluid"/>
                </div>
            </div>
        </div>
    </div>
</div>