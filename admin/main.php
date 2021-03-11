<?php

$page_name = 'lyket-page';

$default_colors = array(
    "primary" => '#22c1c3',
    "secondary" => '#ff00c3',
    "text" => '#292929',
    "background" => 'rgba(255,255,255, 0)',
    "highlight" => '#e095ed',
);

$templates = array(
    "like" => array("simple", "twitter"),
    "clap" => array("simple", "medium"),
    "updown" => array("simple", "reddit")
);

include dirname(__FILE__) . '/form/tabs.php';
include dirname(__FILE__) . '/form/user_settings.php';
include dirname(__FILE__) . '/form/buttons.php';
include dirname(__FILE__) . '/initializers/buttons.php';
include dirname(__FILE__) . '/initializers/api.php';

add_action('admin_enqueue_scripts', 'load_admin_style');

function load_admin_style()
{
    wp_register_style('lyket_admin_style', plugin_dir_url(__FILE__) . '/styles/admin.css', false);
    wp_enqueue_style('lyket_admin_style');
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

// * render_lyket_admin function renders the form element
// * settings_fields tell the form what to do, as well as a hidden input to make it secure using a nonce. The argument passed to the function is a name for the settings group that will be registered later.
// * do_settings_sections is the key part of the form, this is where all the sections and fields are output (textboxes, selects, checkboxes etc) so data can be entered by the user. Again, that function argument is arbitrary but needs to be unique. We will use that when registering fields.

function render_lyket_admin()
{
    ?>
	    <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>

        <?php do_action('render_lyket_tabs'); ?>
				<?php do_action('render_lyket_form'); ?>
      </div>
		<?php
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
