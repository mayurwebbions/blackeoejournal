<div class="home-post-page">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="col-md-3 nopadleft">
            <div class="post-home-image">
                <?php twentyfourteen_post_thumbnail(); ?>
            </div>
        </div>
        <div class="col-md-9 nopadright">
            <header class="entry-header">
                <?php if (in_array('category', get_object_taxonomies(get_post_type())) && twentyfourteen_categorized_blog()) : ?>
                    <div class="entry-meta">
                        <span class="cat-links"><?php echo get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen')); ?></span>
                    </div><!-- .entry-meta -->
                    <?php
                endif;
                if (is_single()) :
                    the_title('<h3 class="entry-title">', '</h3>');
                else :
                    the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
                endif;
                ?>
            </header><!-- .entry-header -->
            <div class="entry-content">
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
            <div class="entry-meta">
                <?php twentyfourteen_posted_on(); ?>
            </div><!-- .entry-meta -->
        </div>
        <?php the_tags('<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>'); ?>
    </article><!-- #post-## -->
</div>