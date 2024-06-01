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

function breadcrumbs_for_shortcode()
{
    $breadcrumbs = '<ol class="breadcrumb">';
    if (!is_front_page()) {
        $breadcrumbs .= '<li class="breadcrumb-item"><a href="';
        $breadcrumbs .= get_option('home');
        $breadcrumbs .= '">' . __("Home") . '</a></li>';
        if (is_category()) {
            $breadcrumbs .= '<li class="breadcrumb-item">';
            $categorie = get_category(get_query_var('cat'));
            $breadcrumbs .= '<a href="' . get_category_link($categorie->term_id) . '">' . $categorie->name . '</a> / ';
            $breadcrumbs = trim($breadcrumbs, ' / ');
        } elseif (is_single()) {
            $breadcrumbs .= '<li class="breadcrumb-item">';
            $categories = get_the_category();
            if ($categories) {
                foreach ($categories as $category) {
                    $breadcrumbs .= '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> / ';
                }
                $breadcrumbs = trim($breadcrumbs, ' / ');
            }
            $breadcrumbs .= '</li>';
            if (is_single()) {
                $breadcrumbs .= '<li class="breadcrumb-item active">' . get_the_title();
                $breadcrumbs .= '</li>';
            }
        } elseif (is_page()) {
            $breadcrumbs .= '<li class="breadcrumb-item active">';
            $breadcrumbs .= get_the_title();
            $breadcrumbs .= '</li>';
        }
    } else {
        $breadcrumbs .= __('<li class="breadcrumb-item">' . __("Home") . '</li>');
    }
    $breadcrumbs .= '</ol>';
    return $breadcrumbs;
}

function breadcrumbs_shortcode($atts)
{
    return breadcrumbs_for_shortcode();
}
add_shortcode('breadcrumbs', 'breadcrumbs_shortcode');
