<?php

function load_lyket()
{
    $disable = get_option('lyket_disable_session_id', false);
    $api_key = get_option('lyket_api_key', false); ?>
    <script
      type="text/javascript"
      src="https://unpkg.com/@lyket/widget@latest/dist/lyket.js?apiKey=acc0dbccce8e557db5ebbe6d605aaa&baseUrl=http://localhost:3000"
      ></script>
    <?php
}

add_action('wp_head', 'load_lyket');
add_action('admin_head', 'load_lyket');
