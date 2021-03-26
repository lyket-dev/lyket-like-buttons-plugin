<?php

add_filter('the_content', 'filter_the_content_in_the_main_loop', 1);
add_action('wp_head', 'lyket_header_script');

function lyket_header_script()
{
    $disable = get_option('lyket_disable_session_id', false);
    $api_key = get_option('lyket_api_key', false);
    $key = get_key("button_type"); ?>
    <script
      type="text/javascript"
      src="https://unpkg.com/@lyket/widget@latest/dist/lyket.js?apiKey=acc0dbccce8e557db5ebbe6d605aaa&baseUrl=http://localhost:3000"
      ></script>
    <?php
}

function filter_the_content_in_the_main_loop($content)
{
    global $lk_page_v_align, $lk_page_enable;

    // Check if we're inside the main loop in a single Post.
    if (is_singular() && in_the_loop() && is_main_query()) {
        if (!$lk_page_enable) {
            return $content;
        }

        $page_button = page_button();

        if ($lk_page_v_align == 'top') {
            return $page_button . $content;
        } elseif ($lk_page_v_align == 'bottom') {
            return $content . $page_button;
        } else {
            return $page_button . $content . page_button();
        }
    }

    return $content;
}

function page_button()
{
    global $lk_default_colors, $lk_page_primary, $lk_page_type, $lk_page_text, $lk_page_h_align;
    global $lk_page_secondary, $lk_page_background, $lk_page_highlight, $lk_page_icon; ?>
    <div
      style="text-align: <?php echo $lk_page_h_align ?>;"
      data-lyket-type=<?php echo $lk_page_type ?>
      data-lyket-id="hello-world"
      data-lyket-namespace="my-wp-website"
      data-lyket-color-text=<?php $lk_page_text ?>
      data-lyket-color-primary=<?php $lk_page_primary ?>
      data-lyket-color-secondary=<?php $lk_page_secondary ?>
      data-lyket-color-background=<?php $lk_page_background ?>
      data-lyket-color-highlight=<?php $lk_page_highlight ?>
      data-lyket-color-icon=<?php $lk_page_icon ?>
    ></div>
  <?php
}



// https://www.dreamhost.com/blog/how-to-create-your-first-wordpress-plugin/
