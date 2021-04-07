<?php

function lyket_render_post_button_preview()
{
    global $lyket_default_colors, $lyket_post_primary, $lyket_post_type, $lyket_post_text, $lyket_post_h_align;
    global $lyket_post_secondary, $lyket_post_background, $lyket_post_highlight, $lyket_post_icon, $lyket_post_template; ?>
    <div
      id="lyket-preview"
      data-lyket-id="wordpress-preview"
      data-lyket-namespace="admin-post-buttons"
      data-lyket-type=<?php echo $lyket_post_type ?>
      data-lyket-template=<?php echo $lyket_post_template ?>
      data-lyket-color-text=<?php echo $lyket_post_text ?>
      data-lyket-color-primary=<?php echo $lyket_post_primary ?>
      data-lyket-color-secondary=<?php echo $lyket_post_secondary ?>
      data-lyket-color-background=<?php echo $lyket_post_background ?>
      data-lyket-color-highlight=<?php echo $lyket_post_highlight ?>
      data-lyket-color-icon=<?php echo $lyket_post_icon ?>
    ></div>
    <p class="lk-image__caption">This is a preview of your post buttons.</p>
  <?php
}

function lyket_render_page_button_preview()
{
    global $lyket_default_colors, $lyket_page_primary, $lyket_page_type, $lyket_page_text, $lyket_page_h_align;
    global $lyket_page_secondary, $lyket_page_background, $lyket_page_highlight, $lyket_page_icon, $lyket_page_template; ?>
    <div
      id="lyket-preview"
      data-lyket-id="wordpress-preview"
      data-lyket-namespace="admin-page-buttons"
      data-lyket-type=<?php echo $lyket_page_type ?>
      data-lyket-template=<?php echo $lyket_page_template ?>
      data-lyket-color-text=<?php echo $lyket_page_text ?>
      data-lyket-color-primary=<?php echo $lyket_page_primary ?>
      data-lyket-color-secondary=<?php echo $lyket_page_secondary ?>
      data-lyket-color-background=<?php echo $lyket_page_background ?>
      data-lyket-color-highlight=<?php echo $lyket_page_highlight ?>
      data-lyket-color-icon=<?php echo $lyket_page_icon ?>
    ></div>
    <p class="lk-image__caption">This is a preview of your page buttons.</p>
  <?php
}
