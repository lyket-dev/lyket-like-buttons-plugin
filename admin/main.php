<?php

include dirname(__FILE__) . '/globals/index.php';
include dirname(__FILE__) . '/form/tabs.php';
include dirname(__FILE__) . '/initializers/buttons.php';
include dirname(__FILE__) . '/initializers/api.php';

add_action('admin_enqueue_scripts', 'enqueue_admin_style');

function enqueue_admin_style()
{
    wp_enqueue_style('lyket_admin_style');
    wp_register_style('lyket_admin_style', plugin_dir_url(__FILE__) . 'styles/admin.css', false);
}

add_action('admin_enqueue_scripts', 'enqueue_color_picker');

function enqueue_color_picker($hook_suffix)
{
    wp_enqueue_style('wp_color_picker');
    wp_enqueue_script('wp_color_picker', plugin_dir_url(__FILE__) . 'scripts/wp_color_picker.js', array( 'wp-color-picker' ), false, true);
}

// Creates menu item in navbar and page that will contain the settings form
add_action('admin_menu', 'lyket_settings_page');

function lyket_settings_page()
{
    global $page_name;
    $logo_url = lyket_absolute_url() . 'public/img/menu_icon.png';

    // add_menu_page(__('Like Buttons', 'likebtn-like-button'), __('Like Buttons', 'likebtn-like-button'), 'manage_options', 'likebtn_buttons', '', $logo_url);
    add_menu_page(
        __('Lyket', 'lyket'),
        __('Lyket', 'lyket'),
        'manage_options',
        $page_name,
        'render_lyket_admin',
        $logo_url
    );
}

// Registers and renders all form inputs
add_action('admin_init', 'lyket_register_settings');

function lyket_register_settings()
{
    //section name, display name, callback to print description of section, page to which section is attached.
    do_action('register_buttons_settings');
    do_action('register_user_settings');
}

// http://qnimate.com/wordpress-settings-api-a-comprehensive-developers-guide/
