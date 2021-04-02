<?php
add_action('register_buttons_settings', 'register_buttons');

function register_buttons()
{
    //add_settings_section: section name, display name, callback to print description of section, page to which section is attached.
    add_settings_section(
        'lyket_post_buttons',
        'Post buttons',
        'render_post_buttons_section',
        'lyket_post_buttons'
    );

    //* add_settings_field: renders a new field
    // setting name, display name, callback to print form element, page in which field is displayed, section to which it belongs.
    //* register_setting: registers a certain setting section name, form element name, callback for sanitization
    register_post_buttons_field('Enable buttons for posts', 'lyket_post_enable', 'render_enable_input');
    register_post_buttons_field('Button type', 'lyket_post_button_type', 'render_button_type_input');
    register_post_buttons_field('Template', 'lyket_post_template', 'render_template_input');

    $post_template = get_option("lyket_post_template", 'simple');
    $post_class = $post_template === "simple" ? 'lyket-colors-row' : 'lyket-colors-row lyket-hidden';

    register_post_buttons_field('Counter font color', 'lyket_post_text_color', 'render_text_color_input', $post_class . " lk-text");
    register_post_buttons_field('Icon color', 'lyket_post_icon_color', 'render_icon_color_input', $post_class . " lk-icon");
    register_post_buttons_field('Pressed like button color', 'lyket_post_primary_color', 'render_primary_color_input', $post_class . " lk-primary");
    register_post_buttons_field('Pressed dislike button color', 'lyket_post_secondary_color', 'render_secondary_color_input', $post_class . " lk-secondary");
    register_post_buttons_field('Inactive button color', 'lyket_post_background_color', 'render_background_color_input', $post_class . " lk-background");
    register_post_buttons_field('Animation color', 'lyket_post_highlight_color', 'render_highlight_color_input', $post_class . " lk-highlight");
    register_post_buttons_field('Horizontal alignment', 'lyket_post_h_align', 'render_h_align_input');
    register_post_buttons_field('Vertical alignment', 'lyket_post_v_align', 'render_v_align_input');

    add_settings_section(
        'lyket_page_buttons',
        'Page buttons',
        'render_page_buttons_section',
        'lyket_page_buttons'
    );

    register_page_buttons_field('Enable buttons for pages', 'lyket_page_enable', 'render_enable_input');
    register_page_buttons_field('Button type', 'lyket_page_button_type', 'render_button_type_input');
    register_page_buttons_field('Template', 'lyket_page_template', 'render_template_input');

    $page_template = get_option("lyket_page_template", 'simple');
    $page_class = $page_template === "simple" ? 'lyket-colors-row' : 'lyket-colors-row lyket-hidden';

    register_page_buttons_field('Counter font color', 'lyket_page_text_color', 'render_text_color_input', $page_class . " lk-text");
    register_page_buttons_field('Icon color', 'lyket_page_icon_color', 'render_icon_color_input', $page_class . " lk-icon");
    register_page_buttons_field('Pressed like button color', 'lyket_page_primary_color', 'render_primary_color_input', $page_class . " lk-primary");
    register_page_buttons_field('Pressed dislike button color', 'lyket_page_secondary_color', 'render_secondary_color_input', $page_class . " lk-secondary");
    register_page_buttons_field('Inactive button color', 'lyket_page_background_color', 'render_background_color_input', $page_class . " lk-background");
    register_page_buttons_field('Animation color', 'lyket_page_highlight_color', 'render_highlight_color_input', $page_class . " lk-highlight");
    register_page_buttons_field('Horizontal alignment', 'lyket_page_h_align', 'render_h_align_input');
    register_page_buttons_field('Vertical alignment', 'lyket_page_v_align', 'render_v_align_input');
}

function render_post_buttons_section()
{
    echo '<p>Enable and customize post buttons</p>';
}

function render_page_buttons_section()
{
    echo '<p>Enable and customize page buttons</p>';
}

function register_post_buttons_field($name, $key, $render_function, $rowClass = "lyket-form-row") {
  // add_settings_field(
  //   string $id,
  //   string $title,
  //   callable $callback,
  //   string $page,
  //   string $section = 'default',
  //   array $args = array()
  // )

  add_settings_field(
      $key,
      $name,
      $render_function,
      'lyket_post_buttons',
      'lyket_post_buttons',
      array("class" => $rowClass, 'context' => "post"),
  );

  register_setting('lyket_post_buttons', $key);
}

function register_page_buttons_field($name, $key, $render_function, $rowClass = "lyket-form-row") {
  add_settings_field(
      $key,
      $name,
      $render_function,
      'lyket_page_buttons',
      'lyket_page_buttons',
      array("class" => $rowClass, 'context' => "page"),
  );

  register_setting('lyket_page_buttons', $key);
}
