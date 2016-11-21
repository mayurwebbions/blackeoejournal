<div class="home-post-page">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="col-md-12 nopadright">
            <header class="entry-header">
                <?php
                if (is_single()) :
                    the_title('<h3 class="entry-title">', '</h3>');
                else :
                    the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
                endif;
                ?>
            </header><!-- .entry-header -->
            <div class="entry-meta-content-tag">
                <?php
                printf('<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>', esc_url(get_permalink()), esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_url(get_author_posts_url(get_the_author_meta('ID'))), get_the_author()
                );
                ?>
            </div>
            <div class="entry-content-social-content">
                <div class="facebook-icon">
                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/color-fb.png" alt="facebook"/></a>
                </div>
                <div class="twitter-icon">
                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/color-twit.png" alt="facebook"/></a>
                </div>
                <div class="linkedin-icon">
                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/color-linkedin.png" alt="facebook"/></a>
                </div>
                <div class="sharing-icon">
                    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/color-sharing.png" alt="facebook"/></a>
                </div>
            </div>
            <div class="col-md-12" style="padding: 0px;">
                <div class="col-md-6 content-image-single" style="padding-left: 0px;">
                    <?php twentyfourteen_post_thumbnail(); ?>
                </div>
                <div class="entry-content" style="text-align: justify">
                    <?php
                    /* translators: %s: Name of current post */
                    the_content(sprintf(
                                    __('Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentyfourteen'), the_title('<span class="screen-reader-text">', '</span>', false)
                    ));
                    wp_link_pages(array(
                        'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'twentyfourteen') . '</span>',
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                    ));
                    ?>
                </div><!-- .entry-content -->
            </div>
            <div class="clearfix"></div>
            <!-- .entry-meta -->
        </div>
        <?php the_tags('<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>'); ?>
    </article><!-- #post-## -->
</div>