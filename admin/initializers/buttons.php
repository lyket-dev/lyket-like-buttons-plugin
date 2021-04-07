<?php
add_action('register_buttons_settings', 'register_buttons');

function register_buttons()
{
    //add_settings_section: section name, display name, callback to print description of section, page to which section is attached.
    add_settings_section(
        'lyket_post_buttons',
        'Post buttons',
        'lyket_render_post_section',
        'lyket_post_buttons'
    );

    //* add_settings_field: renders a new field
    // setting name, display name, callback to print form element, page in which field is displayed, section to which it belongs.
    //* register_setting: registers a certain setting section name, form element name, callback for sanitization
    lyket_register_post_buttons('Enable buttons for posts', 'lyket_post_enable', 'lyket_render_enable_input');
    lyket_register_post_buttons('Button type', 'lyket_post_button_type', 'lyket_render_button_type_input');
    lyket_register_post_buttons('Template', 'lyket_post_template', 'lyket_render_template_input');

    $post_template = get_option("lyket_post_template", 'simple');
    $post_class = $post_template === "simple" ? 'lyket-colors-row' : 'lyket-colors-row lyket-hidden';

    lyket_register_post_buttons('Counter font color', 'lyket_post_text_color', 'lyket_render_text_color_input', $post_class . " lk-text");
    lyket_register_post_buttons('Icon color', 'lyket_post_icon_color', 'lyket_render_icon_color_input', $post_class . " lk-icon");
    lyket_register_post_buttons('Pressed like button color', 'lyket_post_primary_color', 'lyket_render_primary_color_input', $post_class . " lk-primary");
    lyket_register_post_buttons('Pressed dislike button color', 'lyket_post_secondary_color', 'lyket_render_secondary_color_input', $post_class . " lk-secondary");
    lyket_register_post_buttons('Inactive button color', 'lyket_post_background_color', 'lyket_render_background_color_input', $post_class . " lk-background");
    lyket_register_post_buttons('Animation color', 'lyket_post_highlight_color', 'lyket_render_highlight_color_input', $post_class . " lk-highlight");
    lyket_register_post_buttons('Horizontal alignment', 'lyket_post_h_align', 'lyket_render_h_align_input');
    lyket_register_post_buttons('Vertical alignment', 'lyket_post_v_align', 'lyket_render_v_align_input');

    add_settings_section(
        'lyket_page_buttons',
        'Page buttons',
        'lyket_render_page_section',
        'lyket_page_buttons'
    );

    lyket_register_page_buttons('Enable buttons for pages', 'lyket_page_enable', 'lyket_render_enable_input');
    lyket_register_page_buttons('Button type', 'lyket_page_button_type', 'lyket_render_button_type_input');
    lyket_register_page_buttons('Template', 'lyket_page_template', 'lyket_render_template_input');

    $page_template = get_option("lyket_page_template", 'simple');
    $page_class = $page_template === "simple" ? 'lyket-colors-row' : 'lyket-colors-row lyket-hidden';

    lyket_register_page_buttons('Counter font color', 'lyket_page_text_color', 'lyket_render_text_color_input', $page_class . " lk-text");
    lyket_register_page_buttons('Icon color', 'lyket_page_icon_color', 'lyket_render_icon_color_input', $page_class . " lk-icon");
    lyket_register_page_buttons('Pressed like button color', 'lyket_page_primary_color', 'lyket_render_primary_color_input', $page_class . " lk-primary");
    lyket_register_page_buttons('Pressed dislike button color', 'lyket_page_secondary_color', 'lyket_render_secondary_color_input', $page_class . " lk-secondary");
    lyket_register_page_buttons('Inactive button color', 'lyket_page_background_color', 'lyket_render_background_color_input', $page_class . " lk-background");
    lyket_register_page_buttons('Animation color', 'lyket_page_highlight_color', 'lyket_render_highlight_color_input', $page_class . " lk-highlight");
    lyket_register_page_buttons('Horizontal alignment', 'lyket_page_h_align', 'lyket_render_h_align_input');
    lyket_register_page_buttons('Vertical alignment', 'lyket_page_v_align', 'lyket_render_v_align_input');
}

function lyket_render_post_section()
{
    echo '<p>Enable and customize post buttons</p>';
}

function lyket_render_page_section()
{
    echo '<p>Enable and customize page buttons</p>';
}

function lyket_register_post_buttons($name, $key, $render_function, $rowClass = "lyket-form-row") {
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

function lyket_register_page_buttons($name, $key, $render_function, $rowClass = "lyket-form-row") {
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
