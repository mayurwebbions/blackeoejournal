<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
?>

<div id="main-content" class="main-content">
    <?php
    if (is_front_page() && twentyfourteen_has_featured_posts()) {
        // Include the featured content template.
        get_template_part('featured-content');
    }
    ?>
    <div id="primary" class="content-area">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    
                    <?php
                    echo 'aa';
                    if (is_page('article')) :
                        ?>
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
                    <?php
                        global $post;
                        $args = array('post_type' => 'post');
                        $posts = get_posts($args);
                        ?>
                    
                        <div class="row" style="padding: 20px 0;">
                            <div class="col-md-3">
                                <?php
                                foreach ($posts as $post): setup_postdata($post);
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <style type="text/css">
                                                .img-thumbnail {
                                                    max-width: 110px;
                                                    max-height: 110px;
                                                }

                                                .small-img img {
                                                    max-width: 100px;
                                                    max-height: 100px;
                                                }
                                            </style>
                                            <div class="small-img img-thumbnail">
                                                <?php twentyfourteen_post_thumbnail(); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            $cats = get_the_category();
                                            ?>
                                            <label style="color:#126ab4;">
                                                <?php echo ucfirst($cats[0]->cat_name); ?>
                                            </label>
                                            <br/>
                                            <small>
                                                <?php
                                                if (is_single()) :
                                                    the_title();
                                                else :
                                                    the_title('<a style="color:#333;" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>');
                                                endif;
                                                ?>
                                            </small>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
                            </div>
                            <div class="col-md-9">

                                <div class="fusion-title title sep-single">
                                    <?php
                                    foreach ($posts as $post): setup_postdata($post);
                                        ?>
                                        <div class="home-post-page" style="border-bottom: none;">
                                            <div style="color:#126ab4;">
                                                <lable><b>Featured</b></lable>
                                                <div style="margin-top: 10px; width: 90%; float: right; border-bottom: 1px solid #126ab4;"></div>
                                            </div>

                                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                <div class="col-md-12 nopadright">
                                                    <header class="entry-header">
                                                        <?php
                                                        if (is_single()) :
                                                            the_title('<h2 class="entry-title">', '</h2>');
                                                        else :
                                                            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                                                        endif;
                                                        ?>
                                                    </header><!-- .entry-header -->
                                                    <div class="entry-meta-content-tag">
                                                        <?php
                                                        printf('<span class="entry-date"><a href="%1$s"  style="color:#afadad;" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard">| <a style="color:#afadad" class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>', esc_url(get_permalink()), esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_url(get_author_posts_url(get_the_author_meta('ID'))), get_the_author()
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
                                                    <div class="col-md-12" style="padding: 0px; margin-top: 10px;">
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
                                    endforeach;
                                    ?>
                                </div>

                            </div>
                        </div>
                        <?php
                    else:
                        while (have_posts()) : the_post();

                            // Include the page content template.
                            get_template_part('content', 'page');

                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) {
                                comments_template();
                            }
                        endwhile;
                    endif;
                    ?>
                </div>
                <div class="col-md-2 right-widgets">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();