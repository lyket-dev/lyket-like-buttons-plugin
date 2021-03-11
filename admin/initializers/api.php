<?php
add_action('register_user_settings', 'register_lyket_user_settings');

function register_lyket_user_settings()
{
    add_settings_section(
        'lyket_user_settings',
        'User Settings',
        'render_user_settings_section',
        'lyket_user_settings'
    );

    register_user_settings_field('API key', 'lyket_api_key', 'render_lyket_api_key_input');
    register_user_settings_field('Disable Session ID', 'lyket_disable_session_id', 'render_lyket_disable_session_id_input');
}

function render_user_settings_section()
{
    echo '<p>Configure Lyket user settings</p>';
}

function register_user_settings_field($name, $key, $render_function) {
  // add_settings_field(
  //   string $id,
  //   string $title,
  //   callable $callback,
  //   string $page,
  //   string $section = 'default',
  //   array $args = array()
  // )

  //* add_settings_field: renders a new field
  // setting name, display name, callback to print form element, page in which field is displayed, section to which it belongs.
  //* register_setting: registers a certain setting section name, form element name, callback for sanitization

  add_settings_field(
      $key,
      $name,
      $render_function,
      'lyket_user_settings',
      'lyket_user_settings',
  );

  register_setting('lyket_user_settings', $key);
}
