<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
?>
<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-2" style="padding: 20px 0;">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php
                            $count_posts = wp_count_posts();
                            $nextpost = 0;
                            $published_posts = $count_posts->publish;
                            $myposts = get_posts(array('posts_per_page' => $published_posts));
                            foreach ($myposts as $post) :
                                $nextpost++;
                                setup_postdata($post);
                                ?>
                                <div class="category-conetnt" style="float: left;width: 100%;display: block;padding: 10px 0;">
                                    <div class="left-sidebar-content-image">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="entry-meta">
                                        <span class="cat-links"><?php echo get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen')); ?></span>
                                    </div>
                                    <?php the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>') ?>
                                </div>
                                <?php
                            endforeach;
                            wp_reset_postdata();
                            ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <?php
                    $orig_post = $post;
                    global $post;
                    $categories = get_the_category($post->ID);
                    if ($categories) {
                        $category_ids = array();
                        foreach ($categories as $individual_category)
                            $category_ids[] = $individual_category->term_id;
                        $args = array(
                            'category__in' => $category_ids,
                            'post__not_in' => array($post->ID),
                            'caller_get_posts' => 1
                        );
                        $my_query = new wp_query($args);
                        if ($my_query->have_posts()) {
                            while ($my_query->have_posts()) {
                                $my_query->the_post();
                                ?>
                                <div class="home-post-page" style="display: none;">
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
                                    </article><!-- #post-## -->
                                </div>
                                <?php
                            }
                        }
                    }
                    $post = $orig_post;
                    wp_reset_query();
                    ?>
                </div>
                <div class="col-md-2 right-widgets">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div><!-- #content -->
    </div>
</div><!-- #primary -->
<?php
get_footer();
