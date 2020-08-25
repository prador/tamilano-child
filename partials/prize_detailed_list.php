<?php global $image_path; ?>
<div class="divider"></div>
<div class="section prize_detailed_list" <?php if(get_sub_field("white_background")): echo "style='background:#fff'"; endif; ?>>
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
                <?php if(get_sub_field("link_bottone")): ?>
                    <a class="orange-button" href="<?php echo get_sub_field("link_bottone"); ?>"><?php echo get_sub_field("testo_bottone"); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <?php if( have_rows('premio') ): ?>
            <?php while( have_rows('premio') ): the_row(); ?>
            <div class="row premio-wrap">
                    <div class="col-custom full-mobile padding">
                        <div class="premio-image">
                            <img src="<?php echo wp_get_attachment_url(get_sub_field("logo_premio")); ?>" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-center d-none d-md-block"></div>
                    <div class="col-custom full-mobile padding">
                        <div class="premio-title">
                            <?php echo get_sub_field("titolo_premio"); ?>
                        </div>
                        <div class="premio-text">
                            <?php echo get_sub_field("testo_premio"); ?>
                        </div>
                    </div>
                <hr> 
            </div>           
        <?php endwhile; endif; ?>                                       
    </div>
</div>