<?php
/**
 * Bangsawan Pictures theme functions
 */

if (!defined('ABSPATH')) { exit; }

add_action('after_setup_theme', function () {
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('custom-logo');
    register_nav_menus([
        'primary' => __('Primary Menu', 'bangsawan-pictures'),
    ]);
});

// Seed default Services on theme activation
add_action('after_switch_theme', function () {
    $services = [
        'music-event' => 'Music Event',
        'corporate-event' => 'Corporate Event',
        'social-media-campaign' => 'Social Media Campaign',
        'short-film-tvc' => 'Short Film TVC',
        'montage' => 'Montage',
        'music-video' => 'Music Video',
        'travel-video' => 'Travel Video',
        'wedding' => 'Wedding',
    ];

    foreach ($services as $slug => $title) {
        if (!get_page_by_path($slug, OBJECT, 'service')) {
            wp_insert_post([
                'post_type' => 'service',
                'post_status' => 'publish',
                'post_name' => $slug,
                'post_title' => $title,
                'post_content' => sprintf(__('This is a placeholder for the %s service. Replace with your content.', 'bangsawan-pictures'), $title),
            ]);
        }
    }
});

// Register Service custom post type
add_action('init', function () {
    $labels = [
        'name'               => __('Services', 'bangsawan-pictures'),
        'singular_name'      => __('Service', 'bangsawan-pictures'),
        'add_new'            => __('Add New', 'bangsawan-pictures'),
        'add_new_item'       => __('Add New Service', 'bangsawan-pictures'),
        'edit_item'          => __('Edit Service', 'bangsawan-pictures'),
        'new_item'           => __('New Service', 'bangsawan-pictures'),
        'view_item'          => __('View Service', 'bangsawan-pictures'),
        'search_items'       => __('Search Services', 'bangsawan-pictures'),
        'not_found'          => __('No services found', 'bangsawan-pictures'),
        'not_found_in_trash' => __('No services found in Trash', 'bangsawan-pictures'),
        'all_items'          => __('All Services', 'bangsawan-pictures'),
        'menu_name'          => __('Services', 'bangsawan-pictures'),
    ];

    register_post_type('service', [
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'has_archive' => true,
        'rewrite' => ['slug' => 'services'],
        'menu_icon' => 'dashicons-format-video',
    ]);
});

add_action('enqueue_block_assets', function () {
    // Frontend & editor shared assets
    $theme_version = wp_get_theme()->get('Version');
    $theme_uri = get_template_directory_uri();
    wp_enqueue_style('bangsawan-main', $theme_uri . '/assets/css/main.css', [], $theme_version);
    wp_enqueue_script('bangsawan-main', $theme_uri . '/assets/js/main.js', [], $theme_version, true);
});
