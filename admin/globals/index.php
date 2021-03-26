<?php

$lk_page_name = 'lyket-page';

$lk_default_colors = array(
    "primary" => '#22c1c3',
    "secondary" => '#ff00c3',
    "text" => '#292929',
    "background" => 'rgba(255,255,255, 0)',
    "highlight" => '#e095ed',
    "icon" => '#292929',
);

$lk_templates = array(
  "like" => array(
    "Simple" => "simple",
    "Twitter" => "twitter",
    "Chevron" => "chevron"
  ),
  "clap" => array(
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

$lk_page_type = get_option('lyket_page_button_type', 'like');
$lk_page_text = get_option('lyket_page_color_text', $lk_default_colors["text"]);
$lk_page_primary = get_option('lyket_page_color_primary', $lk_default_colors["primary"]);
$lk_page_secondary = get_option('lyket_page_color_secondary', $lk_default_colors["secondary"]);
$lk_page_background = get_option('lyket_page_color_background', $lk_default_colors["background"]);
$lk_page_highlight = get_option('lyket_page_color_highlight', $lk_default_colors["highlight"]);
$lk_page_icon = get_option('lyket_page_color_icon', $lk_default_colors["icon"]);
$lk_page_h_align = get_option('lyket_page_h_align', 'center');
$lk_page_v_align = get_option('lyket_page_v_align', 'top_bottom');
$lk_page_enable = get_option('lyket_page_enable', true);

$lk_post_type = get_option('lyket_post_button_type', 'like');
$lk_post_text = get_option('lyket_post_color_text', $lk_default_colors["text"]);
$lk_post_primary = get_option('lyket_post_color_primary', $lk_default_colors["primary"]);
$lk_post_secondary = get_option('lyket_post_color_secondary', $lk_default_colors["secondary"]);
$lk_post_background = get_option('lyket_post_color_background', $lk_default_colors["background"]);
$lk_post_highlight = get_option('lyket_post_color_highlight', $lk_default_colors["highlight"]);
$lk_post_icon = get_option('lyket_post_color_icon', $lk_default_colors["icon"]);
$lk_post_h_align = get_option('lyket_post_h_align', 'center');
$lk_post_v_align = get_option('lyket_post_v_align', 'top_bottom');
$lk_post_enable = get_option('lyket_post_enable', true);
