<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a class="post-thumbnail" href="<?php the_permalink(); ?>">
        <?php
        // Output the featured image.
        if (has_post_thumbnail()) :
            if ('grid' == get_theme_mod('featured_content_layout')) {
                the_post_thumbnail();
            } else {
                the_post_thumbnail('twentyfourteen-full-width');
            }
        endif;
        ?>
    </a>
    <div  class="featured-post-label">
        <div class="featured-post-label-content">
            <h3>featured</h3>
        </div>
    </div>
    <header class="entry-header">
        <?php if (in_array('category', get_object_taxonomies(get_post_type())) && twentyfourteen_categorized_blog()) : ?>
            <div class="entry-meta">
                <span class="cat-links"><?php echo get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen')); ?></span>
            </div><!-- .entry-meta -->
        <?php endif; ?>

        <?php the_title('<h1 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h1>'); ?>
    </header><!-- .entry-header -->
</article><!-- #post-## -->
