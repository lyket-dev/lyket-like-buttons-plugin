<?php

$lyket_page_name = 'lyket-page';

$lyket_default_colors = array(
    "primary" => '#22c1c3',
    "secondary" => '#ff00c3',
    "text" => '#292929',
    "background" => 'rgba(255,255,255, 0)',
    "highlight" => '#e095ed',
    "icon" => '#292929',
);

$lyket_templates = array(
  "like" => array(
    "Simple" => "simple",
    "Twitter" => "twitter",
    "Chevron" => "chevron"
  ),
  "updown" => array(
    "Simple" => "simple",
    "Reddit" => "reddit",
    "Chevron" => "chevron"
  ),
  "clap" => array(
    "Simple" => "simple",
    "Medium" => "medium",
    "Heart" => "heart"
  ),
);

$lyket_page_type = get_option('lyket_page_button_type', 'like');
$lyket_page_template = get_option('lyket_page_template', 'simple');
$lyket_page_text = get_option('lyket_page_text_color', $lyket_default_colors["text"]);
$lyket_page_primary = get_option('lyket_page_primary_color', $lyket_default_colors["primary"]);
$lyket_page_secondary = get_option('lyket_page_secondary_color', $lyket_default_colors["secondary"]);
$lyket_page_background = get_option('lyket_page_background_color', $lyket_default_colors["background"]);
$lyket_page_highlight = get_option('lyket_page_highlight_color', $lyket_default_colors["highlight"]);
$lyket_page_icon = get_option('lyket_page_icon_color', $lyket_default_colors["icon"]);
$lyket_page_h_align = get_option('lyket_page_h_align', 'center');
$lyket_page_v_align = get_option('lyket_page_v_align', 'top');
$lyket_page_enable = get_option('lyket_page_enable', true);

$lyket_post_type = get_option('lyket_post_button_type', 'like');
$lyket_post_template = get_option('lyket_post_template', 'simple');
$lyket_post_text = get_option('lyket_post_text_color', $lyket_default_colors["text"]);
$lyket_post_primary = get_option('lyket_post_primary_color', $lyket_default_colors["primary"]);
$lyket_post_secondary = get_option('lyket_post_secondary_color', $lyket_default_colors["secondary"]);
$lyket_post_background = get_option('lyket_post_background_color', $lyket_default_colors["background"]);
$lyket_post_highlight = get_option('lyket_post_highlight_color', $lyket_default_colors["highlight"]);
$lyket_post_icon = get_option('lyket_post_icon_color', $lyket_default_colors["icon"]);
$lyket_post_h_align = get_option('lyket_post_h_align', 'center');
$lyket_post_v_align = get_option('lyket_post_v_align', 'top');
$lyket_post_enable = get_option('lyket_post_enable', true);
