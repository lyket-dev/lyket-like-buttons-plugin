<?php
add_filter('the_content', 'lk_filter_content_in_the_main_loop', 1);
add_filter('the_excerpt', 'lk_filter_content_in_the_main_loop', 1);

function lk_filter_content_in_the_main_loop($content)
{
    global $lk_page_v_align, $lk_page_enable;
    global $lk_post_v_align, $lk_post_enable;
    $real_entity_name = get_post_type();

    // Check if we're inside the main loop in a single Post.
    if (in_the_loop() && is_main_query()) {
        if (is_page()) {
            if (!$lk_page_enable) {
                return $content;
            }

            if ($lk_page_v_align == 'top') {
                return lyket_render_page_button() . $content;
            } elseif ($lk_page_v_align == 'bottom') {
                return $content . lyket_render_page_button();
            } else {
                return lyket_render_page_button() . $content . lyket_render_page_button();
            }
        } elseif (is_single()) {
            if (!$lk_post_enable) {
                return $content;
            }

            if ($lk_post_v_align == 'top') {
                return lyket_render_post_button() . $content;
            } elseif ($lk_post_v_align == 'bottom') {
                return $content . lyket_render_post_button();
            } else {
                return lyket_render_post_button() . $content . lyket_render_post_button();
            }
        } elseif (!is_singular()) {
            if (!$lk_post_enable) {
                return $content;
            }

            return lyket_render_post_button_excerpt() . $content;
        }
    }

    return $content;
}

function lyket_render_page_button()
{
    global $lk_default_colors, $lk_page_primary, $lk_page_type, $lk_page_text, $lk_page_h_align;
    global $lk_page_secondary, $lk_page_background, $lk_page_highlight, $lk_page_icon, $lk_page_template;
    $post_slug = get_post_field('post_name', get_post());
    ob_start(); ?>
    <div
      data-lyket-namespace="pages"
      data-lyket-template=<?php echo $lk_page_template ?>
      style="text-align: <?php echo $lk_page_h_align ?>;"
      data-lyket-type=<?php echo $lk_page_type ?>
      data-lyket-id=<?php echo $post_slug ?>
      data-lyket-color-text=<?php echo $lk_page_text ?>
      data-lyket-color-primary=<?php echo $lk_page_primary ?>
      data-lyket-color-secondary=<?php echo $lk_page_secondary ?>
      data-lyket-color-background=<?php echo $lk_page_background ?>
      data-lyket-color-highlight=<?php echo $lk_page_highlight ?>
      data-lyket-color-icon=<?php echo $lk_page_icon ?>
    ></div>
  <?php
  return ob_get_clean();
}

function lyket_render_post_button()
{
    global $lk_default_colors, $lk_post_primary, $lk_post_type, $lk_post_text, $lk_post_h_align;
    global $lk_post_secondary, $lk_post_background, $lk_post_highlight, $lk_post_icon, $lk_post_template;

    $post_slug = get_post_field('post_name', get_post());
    ob_start(); ?>
    <div
      data-lyket-namespace="posts"
      data-lyket-template=<?php echo $lk_post_template ?>
      style="text-align: <?php echo $lk_post_h_align ?>;"
      data-lyket-type=<?php echo $lk_post_type ?>
      data-lyket-id=<?php echo $post_slug ?>
      data-lyket-color-text=<?php echo $lk_post_text ?>
      data-lyket-color-primary=<?php echo $lk_post_primary ?>
      data-lyket-color-secondary=<?php echo $lk_post_secondary ?>
      data-lyket-color-background=<?php echo $lk_post_background ?>
      data-lyket-color-highlight=<?php echo $lk_post_highlight ?>
      data-lyket-color-icon=<?php echo $lk_post_icon ?>
    ></div>
  <?php
  return ob_get_clean();
}

function lyket_render_post_button_excerpt()
{
    global $lk_default_colors, $lk_post_primary, $lk_post_type, $lk_post_text, $lk_post_h_align;
    global $lk_post_secondary, $lk_post_background, $lk_post_highlight, $lk_post_icon, $lk_post_template;

    $post_slug = get_post_field('post_name', get_post()); ?>
    <div
      data-lyket-namespace="posts"
      style="text-align: center;"
      data-lyket-template=<?php echo $lk_post_template ?>
      data-lyket-type=<?php echo $lk_post_type ?>
      data-lyket-id=<?php echo $post_slug ?>
      data-lyket-color-text=<?php echo $lk_post_text ?>
      data-lyket-color-primary=<?php echo $lk_post_primary ?>
      data-lyket-color-secondary=<?php echo $lk_post_secondary ?>
      data-lyket-color-background=<?php echo $lk_post_background ?>
      data-lyket-color-highlight=<?php echo $lk_post_highlight ?>
      data-lyket-color-icon=<?php echo $lk_post_icon ?>
    ></div>
  <?php
}
