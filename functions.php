<?php

declare(strict_types=1);

// Include lightweight ACF stubs for local development / IDEs (only when safe)
if (defined('WP_DEBUG') && WP_DEBUG && !function_exists('get_field')) {
    require_once get_template_directory() . '/inc/acf-stubs.php';
}

function house_of_achi_register_post_types(): void
{
    register_post_type('case', [
        'labels' => [
            'name' => 'Cases',
            'singular_name' => 'Case',
            'add_new' => 'Add New',
            'add_new_item' => 'Add New Case',
            'edit_item' => 'Edit Case',
            'new_item' => 'New Case',
            'view_item' => 'View Case',
            'search_items' => 'Search Cases',
            'not_found' => 'No cases found',
        ],
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite' => ['slug' => 'cases'],
        'show_in_rest' => true,
    ]);
}

add_action('init', 'house_of_achi_register_post_types');

add_filter('the_content', function ($content) {
    if (!is_singular('case')) {
        return $content;
    }

    return preg_replace(
        '/<img(?![^>]*\bdata-case-lightbox\b)/i',
        '<img data-case-lightbox="1"',
        $content
    );
});

function house_of_achi_scripts(): void
{
    $style_path = get_template_directory() . '/style.css';
    $script_path = get_template_directory() . '/assets/js/script.js';

    wp_enqueue_style(
        'house-of-achi-style',
        get_stylesheet_uri(),
        [],
        file_exists($style_path) ? (string) filemtime($style_path) : null
    );

    wp_enqueue_script(
        'house-of-achi-script',
        get_template_directory_uri() . '/assets/js/script.js',
        [],
        file_exists($script_path) ? (string) filemtime($script_path) : null,
        true
    );
}

add_action('wp_enqueue_scripts', 'house_of_achi_scripts');

function house_of_achi_case_styles(): void
{
    if (is_singular('case')) {
        wp_enqueue_style(
            'house-of-achi-case-style',
            get_template_directory_uri() . '/assets/css/case.css',
            [],
            filemtime(get_template_directory() . '/assets/css/case.css')
        );
    }
}

add_filter('render_block', function ($block_content, $block) {

    if (is_singular('case') && $block['blockName'] === 'core/image') {
        $block_content = str_replace(
            '<figure class="wp-block-image',
            '<figure class="wp-block-image" data-case-lightbox',
            $block_content
        );
    }

    if ($block['blockName'] === 'core/video') {
        $block_content = str_replace(
            '<video',
            '<video autoplay muted loop playsinline',
            $block_content
        );
    }

    return $block_content;
}, 10, 2);

add_action('wp_enqueue_scripts', 'house_of_achi_case_styles');

// Hide admin bar on the front-end while developing locally
add_filter('show_admin_bar', '__return_false');
