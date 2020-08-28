<?php global $image_path; ?>
<div class="divider"></div>
<div class="section box-button" <?php if(get_sub_field("white_background")): echo "style='background:#fff'"; endif; ?>>
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
        </div>
        <?php 
            $num_colonne = get_sub_field("numero_colonne");
            $col = 12 / $num_colonne;
        ?>
        <?php if( have_rows('box') ): ?>
        <div class="row justify-content-center">   
            <?php while( have_rows('box') ): the_row(); ?>
                <div class="col-12 col-md-<?php echo $col; ?>">
                    <div class="box">
                        <img src="<?php echo wp_get_attachment_url(get_sub_field("immagine"));?>" class="img-fluid">
                        <div class="text-center">
                            <a class="orange-button" href="<?php echo get_sub_field("link_bottone"); ?>"><?php echo get_sub_field("testo_bottone"); ?></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</div>