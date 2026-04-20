<?php

/**
 * ACF function stubs for local development and IDEs.
 * These are no-op implementations so the theme can be analyzed
 * when the ACF plugin is not installed. Safe to include in production
 * because each function is wrapped in `function_exists` checks.
 */

if (!function_exists('get_field')) {
    /**
     * @param string $selector
     * @param mixed $post_id
     * @param bool $format_value
     * @return mixed|null
     */
    function get_field($selector, $post_id = false, $format_value = true)
    {
        return null;
    }

    function the_field($selector, $post_id = false)
    {
        echo '';
    }

    function have_rows($selector, $post_id = false)
    {
        return false;
    }

    function the_row()
    {
        return false;
    }

    function get_sub_field($selector)
    {
        return null;
    }

    function the_sub_field($selector)
    {
        echo '';
    }

    function get_fields($post_id = false)
    {
        return [];
    }
}
