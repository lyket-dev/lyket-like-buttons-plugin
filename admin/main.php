<?php

include dirname(__FILE__) . '/globals/index.php';
include dirname(__FILE__) . '/form/tabs.php';
include dirname(__FILE__) . '/initializers/buttons.php';
include dirname(__FILE__) . '/initializers/api.php';


add_action('admin_enqueue_scripts', 'enqueue_admin_style');

function enqueue_admin_style()
{
    wp_register_style('lyket_admin_style', plugin_dir_url(__FILE__) . 'styles/lk-admin.css', false);
    wp_enqueue_style('lyket_admin_style');
}

add_action('admin_enqueue_scripts', 'enqueue_lk_scripts');

function enqueue_lk_scripts($hook_suffix)
{
    // --------------- alpha color picker ---------------
    wp_enqueue_style('wp-color-picker');

    wp_register_script('wp-color-picker-alpha', plugin_dir_url(__FILE__) . 'scripts/wp_color_picker_alpha.js', array( 'wp-color-picker' ));
    wp_enqueue_script('wp-color-picker-alpha');

    wp_register_script('lk_color_picker', plugin_dir_url(__FILE__) . 'scripts/wp_color_picker.js', array( 'wp-color-picker' ));
    wp_enqueue_script('lk_color_picker');

    // --------------- lyket preview ---------------
    wp_enqueue_style('lk_interactive_preview');
    wp_enqueue_script('lk_interactive_preview', plugin_dir_url(__FILE__) . 'scripts/lk_interactive_preview.js');
}

// Creates menu item in navbar and page that will contain the settings form
add_action('admin_menu', 'lyket_settings_page');

function lyket_settings_page()
{
    global $lk_page_name;
    $logo_url = lyket_absolute_url() . 'public/img/menu_icon.png';

    add_menu_page(
        __('Lyket', 'lyket'),
        __('Lyket', 'lyket'),
        'manage_options',
        $lk_page_name,
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
