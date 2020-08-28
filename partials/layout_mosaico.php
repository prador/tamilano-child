<?php global $image_path; ?> 
<div class="divider"></div>
<div class="section layout_mosaico" <?php if(get_sub_field("white_background")): echo "style='background:#fff'"; endif; ?>>
    <div class="container">
        <div class="row">   
            <div class="col-center offset-custom left-mobile">
                <div class="section-title-icon">
                    <img src="<?php echo $image_path; ?>/pattern-orange.svg" class="img-fluid" />
                </div>
            </div>
            <div class="col-custom pattern-mobile">
                <div class="section-title">
                    <?php echo get_sub_field("titolo"); ?>
                </div>
            </div>
            <?php if(get_sub_field("testo_intro")): ?>
                <div class="col-custom offset-custom-2 left-mobile full-mobile">
                    <div class="section-text">
                        <?php echo get_sub_field("testo_intro"); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row row-eq-height">   
            <div class="col-12 col-md-6 text-center">
                <a href="<?php echo get_sub_field("link_1"); ?>" class="orizontal-mosaic">
                    <div class="image-mosaico">
                        <img src="<?php echo wp_get_attachment_url(get_sub_field("immagine_1"));?>" class="img-fluid"/>
                    </div>
                    <div class="testo-mosaico"><?php echo get_sub_field("testo_1"); ?></div>
                </a>

                <a href="<?php echo get_sub_field("link_2"); ?>" class="orizontal-mosaic">
                    <div class="image-mosaico">
                        <img src="<?php echo wp_get_attachment_url(get_sub_field("immagine_2"));?>" class="img-fluid"/>
                    </div>
                    <div class="testo-mosaico"><?php echo get_sub_field("testo_2"); ?></div>
                </a>
            </div>
            <div class="col-12 col-md-3 text-center">
                <a href="<?php echo get_sub_field("link_3"); ?>" class="vertical-mosaic">
                    <div class="image-mosaico">
                        <img src="<?php echo wp_get_attachment_url(get_sub_field("immagine_3"));?>" class="img-fluid"/>
                    </div>
                    <div class="testo-mosaico"><?php echo get_sub_field("testo_3"); ?></div>
                </a>
            </div>
            <div class="col-12 col-md-3 text-center">
                <a href="<?php echo get_sub_field("link_4"); ?>" class="vertical-mosaic">
                    <div class="image-mosaico">
                        <img src="<?php echo wp_get_attachment_url(get_sub_field("immagine_4"));?>" class="img-fluid"/>
                    </div>
                    <div class="testo-mosaico"><?php echo get_sub_field("testo_4"); ?></div>
                </a>
            </div>
        </div>
    </div>
</div>