<?php

    $show_media = get_post_meta($post->ID, 'wpzoom_show_media', true);

    $template = get_post_meta($post->ID, 'wpzoom_post_template', true);

    if ($template == 'full') {
        $media_width = 1400;
        $size = "single-full";
    }
    else {
        $media_width = 1000;
        $size = "single";
    }

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="second">
    <header class="entry-header">

        <?php if ( option::is_on( 'post_thumb' ) && has_post_thumbnail() ) {

            if (!$show_media == 1 || !$show_media) { ?>
                <div class="post-thumb"><?php the_post_thumbnail($size); ?></div>
            <?php }
        } ?>

        <?php if ( option::is_on( 'post_category' ) ) : ?><span class="entry-category"><?php the_category( ', ' ); ?></span><?php endif; ?>

        <?php the_title( '<h1 class="second">', '</h1>' ); ?>

        <h6>
        <?php printf( '<time class="entry-date updated published" datetime="%1$s">%2$s</time> ', esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ) ); ?>
        </h6>
        <?php edit_post_link( __( 'Edit', 'wpzoom' ), '<span class="edit-link">', '</span>' ); ?>

    </header><!-- .entry-header -->


    <div class="clear"></div>

    <div class="post-area">

        <div class="post-inner">

            <div class="entry-content">

                <?php the_content(); ?>

                <div class="clear"></div>

                <?php if ( option::is_on('banner_post_enable')  ) { // Banner after post ?>

                    <div class="adv_content">
                    <?php
                        if ( option::get('banner_post_html') <> "" ) {
                            echo stripslashes(option::get('banner_post_html'));
                        } else {
                            ?><a href="<?php echo option::get('banner_post_url'); ?>"><img src="<?php echo option::get('banner_post'); ?>" alt="<?php echo option::get('banner_post_alt'); ?>" /></a><?php
                        }

                    ?></div><?php
                } ?>


            </div><!-- .entry-content -->


            <footer class="entry-footer">

                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'wpzoom' ),
                        'after'  => '</div>',
                    ) );
                ?>


                <?php if ( option::is_on( 'post_tags' ) ) echo preg_replace( '/<a([^>]+)>([^<]+)<\/a>/i', '<a$1><span>$2</span></a>', get_the_tag_list( '<ul class="tags clearfix"><li>', '</li><li>', '</li></ul>' ) ); ?>

            </footer><!-- .entry-footer -->

        </div><!-- .post-inner -->

    </div><!-- .post-area -->
  </div> <!-- .second -->
</article><!-- #post -->
