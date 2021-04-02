<?php

function lk_render_post_button_preview()
{
    global $lk_default_colors, $lk_post_primary, $lk_post_type, $lk_post_text, $lk_post_h_align;
    global $lk_post_secondary, $lk_post_background, $lk_post_highlight, $lk_post_icon, $lk_post_template; ?>
    <div
      id="lyket-preview"
      data-lyket-id="wordpress-preview"
      data-lyket-namespace="admin-post-buttons"
      data-lyket-type=<?php echo $lk_post_type ?>
      data-lyket-template=<?php echo $lk_post_template ?>
      data-lyket-color-text=<?php echo $lk_post_text ?>
      data-lyket-color-primary=<?php echo $lk_post_primary ?>
      data-lyket-color-secondary=<?php echo $lk_post_secondary ?>
      data-lyket-color-background=<?php echo $lk_post_background ?>
      data-lyket-color-highlight=<?php echo $lk_post_highlight ?>
      data-lyket-color-icon=<?php echo $lk_post_icon ?>
    ></div>
    <p class="lk-image__caption">This is a preview of your post buttons.</p>
  <?php
}

function lk_render_page_button_preview()
{
    global $lk_default_colors, $lk_page_primary, $lk_page_type, $lk_page_text, $lk_page_h_align;
    global $lk_page_secondary, $lk_page_background, $lk_page_highlight, $lk_page_icon, $lk_page_template; ?>
    <div
      id="lyket-preview"
      data-lyket-id="wordpress-preview"
      data-lyket-namespace="admin-page-buttons"
      data-lyket-type=<?php echo $lk_page_type ?>
      data-lyket-template=<?php echo $lk_page_template ?>
      data-lyket-color-text=<?php echo $lk_page_text ?>
      data-lyket-color-primary=<?php echo $lk_page_primary ?>
      data-lyket-color-secondary=<?php echo $lk_page_secondary ?>
      data-lyket-color-background=<?php echo $lk_page_background ?>
      data-lyket-color-highlight=<?php echo $lk_page_highlight ?>
      data-lyket-color-icon=<?php echo $lk_page_icon ?>
    ></div>
    <p class="lk-image__caption">This is a preview of your page buttons.</p>
  <?php
}
