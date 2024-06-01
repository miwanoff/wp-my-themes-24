<?php

// Setup

define('BOOTSTRAPTOPIC_DEV_MODE', true);

// Includes

include get_theme_file_path('includes/enqueue.php');
include get_theme_file_path('includes/setup.php');
include get_theme_file_path('includes/custom-nav-walker.php');
include get_theme_file_path('includes/widgets.php');

// Hooks

add_action('wp_enqueue_scripts', 'bootkit_enqueue');
add_action('after_setup_theme', 'bootkit_setup_theme');
add_action('widgets_init', 'bootkit_widgets');

// Shortcodes

function foobar_func($atts)
{
    return "<h4>foo and bar</h4>";
}
add_shortcode('foobar', 'foobar_func');

// [kitlink link="foo-value"]

function kitlink_func($atts)
{
    extract(shortcode_atts(array(
        'link' => 'https://kitit.com.ua/',
        'description' => "Навчальний центр комп'ютерних технологій",
    ), $atts));
    return "<h4>{$description}</h4> <a href='{$link}'>{$link}</a>";
}
add_shortcode('kitlink', 'kitlink_func');

function site_url_shortcode($atts)
{
    $link = site_url();
    return  "<a href='{$link}'>{$link}</a>";
}
add_shortcode('myurl', 'site_url_shortcode');

// Adds & Odds

// add_filter('next_posts_link_attributes', 'posts_link_attributes');
// add_filter('previous_posts_link_attributes', 'posts_link_attributes');
// function posts_link_attributes() {
//   return 'class="page-link"';
// }

// function added_footer()
// {
//     echo 'Added to footer by hook-example plugin';
// }
// add_action('wp_footer', 'added_footer');

// function my_footer()
// {
//     do_action('wp_hook_footer');
// }
// add_action('wp_footer', 'my_footer');

// function hello_footer()
// {
//     echo 'Hello';
// }
// add_action('wp_hook_footer', 'hello_footer');

// Ajax

function bootkit_ajax()
{
    $summa = $_POST['param1'] + $_POST['param2'];
    echo $summa;
    die;
}

add_action('wp_ajax_bootkit', 'bootkit_ajax');
add_action('wp_ajax_nopriv_bootkit', 'bootkit_ajax');