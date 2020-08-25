<?php global $image_path; ?>
<div class="section home-header" <?php if(get_sub_field("white_background")): echo "style='background:#fff'"; endif; ?>s>
    <div class="container">
        <div class="row h-100">   
            <div class="col-custom full-mobile">
                <div class="big-logo">
                    <img src="<?php echo $image_path; ?>/ta-logo-gold.png" class="img-full">
                </div>
            </div>
            <div class="col-center full-mobile">
                <div class="pattern-gold">
                    <img src="<?php echo $image_path; ?>/pattern-gold.png" class="img-fluid">
                </div>
            </div>
            <div class="col-custom full-mobile">
                <div class="home-header-text">
                    <?php echo get_sub_field("testo"); ?>
                    <a href="<?php echo get_sub_field("link_bottone"); ?>" class="orange-button"><?php echo get_sub_field("testo_bottone"); ?></a>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="col"> 
                <div class="image-header">
                    <img src="<?php echo wp_get_attachment_url(get_sub_field("immagine")); ?>" class="img-full">
                </div>
            </div>
        </div>
    </div>
</div>