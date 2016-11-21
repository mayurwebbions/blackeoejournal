<?php get_header(); ?>
<div id="main-content" class="main-content">
    <div id="primary" class="content-area">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <?php
                    if (is_front_page() && twentyfourteen_has_featured_posts()) {
                        // Include the featured content template.
                        get_template_part('featured-content');
                    }
                    ?>
                    <div class="post-area">
                        <?php
                        if (have_posts()) :
                            // Start the Loop.
                            while (have_posts()) : the_post();
                                ?>
                                <div class = "home-post-page">
                                    <article id = "post-<?php the_ID(); ?>" <?php post_class();
                                ?>>
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
                                            <div class="col-md-11" style="padding: 0px;">
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
                                            <div class="col-md-1 nopadright">
                                                <div class="entry-content-social">
                                                    <div class="facebook-icon">
                                                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="facebook"/></a>
                                                    </div>
                                                    <div class="twitter-icon">
                                                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="facebook"/></a>
                                                    </div>
                                                    <div class="linkedin-icon">
                                                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="facebook"/></a>
                                                    </div>
                                                    <div class="sharing-icon">
                                                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/share.png" alt="facebook"/></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="entry-meta">
                                                <?php twentyfourteen_posted_on(); ?>
                                            </div><!-- .entry-meta -->
                                        </div>
                                        <?php the_tags('<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>'); ?>
                                    </article><!-- #post-## -->
                                </div>
                                <?php
                            endwhile;
                            // Previous/next post navigation.
                            twentyfourteen_paging_nav();
                        else :
                            // If no content, include the "No posts found" template.
                            get_template_part('content', 'none');
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-md-2 right-widgets">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    get_footer();
    