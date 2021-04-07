<?php
add_filter('the_content', 'lyket_filter_content_in_the_main_loop', 1);
add_filter('the_excerpt', 'lyket_filter_content_in_the_main_loop', 1);

function lyket_filter_content_in_the_main_loop($content)
{
    global $lyket_page_v_align, $lyket_page_enable;
    global $lyket_post_v_align, $lyket_post_enable;
    $real_entity_name = get_post_type();

    // Check if we're inside the main loop in a single Post.
    if (in_the_loop() && is_main_query()) {
        if (is_page()) {
            if (!$lyket_page_enable) {
                return $content;
            }

            if ($lyket_page_v_align == 'top') {
                return lyket_render_page_button() . $content;
            } elseif ($lyket_page_v_align == 'bottom') {
                return $content . lyket_render_page_button();
            } else {
                return lyket_render_page_button() . $content . lyket_render_page_button();
            }
        } elseif (is_single()) {
            if (!$lyket_post_enable) {
                return $content;
            }

            if ($lyket_post_v_align == 'top') {
                return lyket_render_post_button() . $content;
            } elseif ($lyket_post_v_align == 'bottom') {
                return $content . lyket_render_post_button();
            } else {
                return lyket_render_post_button() . $content . lyket_render_post_button();
            }
        } elseif (!is_singular()) {
            if (!$lyket_post_enable) {
                return $content;
            }

            return lyket_render_post_button_excerpt() . $content;
        }
    }

    return $content;
}

function lyket_render_page_button()
{
    global $lyket_default_colors, $lyket_page_primary, $lyket_page_type, $lyket_page_text, $lyket_page_h_align;
    global $lyket_page_secondary, $lyket_page_background, $lyket_page_highlight, $lyket_page_icon, $lyket_page_template;
    $post_slug = get_post_field('post_name', get_post());
    ob_start(); ?>
    <div
      data-lyket-namespace="pages"
      data-lyket-template=<?php echo $lyket_page_template ?>
      style="text-align: <?php echo $lyket_page_h_align ?>;"
      data-lyket-type=<?php echo $lyket_page_type ?>
      data-lyket-id=<?php echo $post_slug ?>
      data-lyket-color-text=<?php echo $lyket_page_text ?>
      data-lyket-color-primary=<?php echo $lyket_page_primary ?>
      data-lyket-color-secondary=<?php echo $lyket_page_secondary ?>
      data-lyket-color-background=<?php echo $lyket_page_background ?>
      data-lyket-color-highlight=<?php echo $lyket_page_highlight ?>
      data-lyket-color-icon=<?php echo $lyket_page_icon ?>
    ></div>
  <?php
  return ob_get_clean();
}

function lyket_render_post_button()
{
    global $lyket_default_colors, $lyket_post_primary, $lyket_post_type, $lyket_post_text, $lyket_post_h_align;
    global $lyket_post_secondary, $lyket_post_background, $lyket_post_highlight, $lyket_post_icon, $lyket_post_template;

    $post_slug = get_post_field('post_name', get_post());
    ob_start(); ?>
    <div
      data-lyket-namespace="posts"
      data-lyket-template=<?php echo $lyket_post_template ?>
      style="text-align: <?php echo $lyket_post_h_align ?>;"
      data-lyket-type=<?php echo $lyket_post_type ?>
      data-lyket-id=<?php echo $post_slug ?>
      data-lyket-color-text=<?php echo $lyket_post_text ?>
      data-lyket-color-primary=<?php echo $lyket_post_primary ?>
      data-lyket-color-secondary=<?php echo $lyket_post_secondary ?>
      data-lyket-color-background=<?php echo $lyket_post_background ?>
      data-lyket-color-highlight=<?php echo $lyket_post_highlight ?>
      data-lyket-color-icon=<?php echo $lyket_post_icon ?>
    ></div>
  <?php
  return ob_get_clean();
}

function lyket_render_post_button_excerpt()
{
    global $lyket_default_colors, $lyket_post_primary, $lyket_post_type, $lyket_post_text, $lyket_post_h_align;
    global $lyket_post_secondary, $lyket_post_background, $lyket_post_highlight, $lyket_post_icon, $lyket_post_template;

    $post_slug = get_post_field('post_name', get_post()); ?>
    <div
      data-lyket-namespace="posts"
      style="text-align: center;"
      data-lyket-template=<?php echo $lyket_post_template ?>
      data-lyket-type=<?php echo $lyket_post_type ?>
      data-lyket-id=<?php echo $post_slug ?>
      data-lyket-color-text=<?php echo $lyket_post_text ?>
      data-lyket-color-primary=<?php echo $lyket_post_primary ?>
      data-lyket-color-secondary=<?php echo $lyket_post_secondary ?>
      data-lyket-color-background=<?php echo $lyket_post_background ?>
      data-lyket-color-highlight=<?php echo $lyket_post_highlight ?>
      data-lyket-color-icon=<?php echo $lyket_post_icon ?>
    ></div>
  <?php
}
