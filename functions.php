<?php

declare(strict_types=1);

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
