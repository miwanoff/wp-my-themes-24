<?php
/**
 * Plugin Name: Hooks example
 */

function hooked_title($title)
{
    return '&#9829; ' . $title;
}

add_filter('the_title', 'hooked_title');

function added_footer()
{
    echo 'Added to footer by hook-example plugin';
}
add_action('wp_footer', 'added_footer');