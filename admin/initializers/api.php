<?php
add_action('register_user_settings', 'register_lyket_user_settings');

function register_lyket_user_settings()
{
    add_settings_section(
        'lyket_user_settings',
        'User Settings',
        'lyket_render_user_settings_section',
        'lyket_user_settings'
    );

    lyket_register_user_settings_field('API key', 'lyket_api_key', 'render_lyket_api_key_input');
    // lyket_register_user_settings_field('Recognize visitor by IP instead of ID', 'lyket_disable_session_id', 'render_lyket_disable_session_id_input');
}

function lyket_render_user_settings_section()
{
  echo '<div>
      <p>
      To use Lyket you need to register to <a href="https://app.lyket.dev/signup" target="_blank">our website</a>. Then copy and paste your API key here!
    </div>
  ';
}

function lyket_register_user_settings_field($name, $key, $render_function) {
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
