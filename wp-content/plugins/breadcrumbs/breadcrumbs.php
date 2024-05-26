<?php
/*
Plugin Name: Breadcrumbs
Plugin URI: https://example.com/
Description: Breadcrumbs,  navigation scheme that reveals the user's location in a website
Version: 1.0
Author: M.A.I.
Author URI: https://example.com/
License: GPL2
 */

function breadcrumbs()
{
    echo '<ol class="breadcrumb">';
    if (!is_front_page()) {
        echo '<li class="breadcrumb-item"><a href="';
        echo get_option('home');
        echo '">' . __("Home") . '</a></li>';
        if (is_category() || is_single()) {
            echo '<li class="breadcrumb-item">';
            the_category('&nbsp;/&nbsp;');
            echo '</li>';
            if (is_single()) {
                echo '<li class="breadcrumb-item active">';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            echo '<li class="breadcrumb-item active">';
            echo the_title();
            echo '</li>';
        }
    } else {
        echo __('<li class="breadcrumb-item">' . __("Home") . '</li>');
    }
    echo '</ol>';
}
//add_action('wp_head', 'breadcrumbs');