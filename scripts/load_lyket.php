<?php

function load_lyket()
{
    $disable = get_option('lyket_disable_session_id', false);
    $api_key = get_option('lyket_api_key', false);
    $url = "https://unpkg.com/@lyket/widget@latest/dist/lyket.js?apiKey=" . $api_key; ?>
    <script
      type="text/javascript"
      src=<?php echo $url ?>
      ></script>
    <?php
}

add_action('wp_head', 'load_lyket');
add_action('admin_head', 'load_lyket');
