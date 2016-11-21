<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
    <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="page" class="hfeed site">
            <div class="ad-manager">
                <div class="ad-manager-list">
                    <?php echo do_shortcode('[the_ad id="35"]'); ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <header id="masthead" class="site-header" role="banner">
                <div class="container">
                    <div class="header-main">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="navbar-header">
                                    <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/black-eoe-journal-logo.jpg" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                                <nav class="navbar primary-navigation" role="navigation">
                                    <button class="menu-toggle"><?php _e('Primary Menu', 'twentyfourteen'); ?></button>
                                    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav nav-menu', 'menu_id' => 'primary-menu')); ?>
                                    <div class="search-toggle">
                                        <a href="#search-container" class="screen-reader-text" aria-expanded="false" aria-controls="search-container"><?php _e('Search', 'twentyfourteen'); ?></a>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-md-3">
                                <?php if (get_header_image()) : ?>
                                    <div class="free-magazine">
                                        <div class="header-image">
                                            <img src="<?php header_image(); ?>"  alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                                        </div>
                                        <div class="free-magazine-label">
                                            <div class="free-magazine-arrow">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/free-magazine-arrow.png"/>
                                                <label>Free magazine</label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="search-container" class="search-box-wrapper hide">
                    <div class="search-box">
                        <div class="container">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </header>
            <div class="header header-hide">
                <div class="container">
                    <div class="header-main">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-2 nopadleft">
                                    <nav class="header-navbar navbar primary-navigation" role="navigation">
                                        <button class="menu-toggle"><?php _e('Primary Menu', 'twentyfourteen'); ?></button>
                                        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'nav nav-menu', 'menu_id' => 'primary-menu')); ?>
                                    </nav>
                                </div>
                                <div class="col-md-10">
                                    <div class="navbar-header">
                                        <a class="header-site-logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/black-eoe-journal-logo.jpg" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="border-middle"></div>
                            <div class="col-md-6">
                                <?php if (get_header_image()) : ?>
                                    <div class="free-magazine">
                                        <div class="header-image">
                                            <img src="<?php header_image(); ?>"  alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                                        </div>
                                        <div class="free-magazine-label">
                                            <div class="free-magazine-arrow">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/arrow.png"/>
                                                <label>Free magazine</label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="search-toggle">
                                    <a href="#search-container" class="screen-reader-text" aria-expanded="false" aria-controls="search-container"><?php _e('Search', 'twentyfourteen'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="search-container-second" class="search-box-wrapper hide">
                    <div class="search-box">
                        <div class="container">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="main" class="site-main">