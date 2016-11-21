<?php

/**
 * Footer menu
 */
function journal_footer_menu() {
    ?>
    <nav id="footer-navigation" class="footer-navigation" role="navigation">
        <?php wp_nav_menu(array('theme_location' => 'footer', 'menu_id' => 'footer-menu', 'depth' => 1)); ?>
    </nav>
    <?php
}

add_action('journal_footer', 'journal_footer_menu', 7);

/**
 * Go to top button
 */
function journal_go_to_top() {
    echo '<a class="go-top"></a>';
}

add_action('journal_footer', 'journal_go_to_top', 8);

/**
 * Footer credits
 */
function journal_footer_credits() {
    ?>
    <div class="site-info">
        <a href="<?php echo esc_url(__('https://wordpress.org/', 'journal')); ?>"><?php printf(esc_html__('Powered by %s', 'tora'), 'WordPress'); ?></a>
        <span class="sep"> | </span>
    <?php printf(esc_html__('Theme: %s', 'journal'), '<a href="#" rel="designer">BlackEoEJournal</a>'); ?>
    </div>
    <?php
}

add_action('journal_footer', 'journal_footer_credits', 9);

