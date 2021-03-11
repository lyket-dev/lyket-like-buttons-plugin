<?php
include dirname(__FILE__) . '/render.php';
$active_tab = "user_settings";

add_action('render_lyket_tabs', 'render_tabs');

function render_tabs()
{
    global $page_name;
    global $active_tab;

    if (isset($_GET["tab"])) {
        if ($_GET["tab"] == "user_settings") {
            $active_tab = "user_settings";
        } else {
            $active_tab = "post_buttons";
        }
    } ?>
      <div class="wrap">
        <div class="nav-tab-wrapper">
          <a
            href="?page=<?php echo $page_name; ?>&tab=user_settings"
            class="nav-tab <?php if ($active_tab == 'user_settings') {
        echo 'nav-tab-active';
    } ?> "
          >
            User Settings
          </a>
          <a
            href="?page=<?php echo $page_name; ?>&tab=post_buttons"
            class="nav-tab <?php if ($active_tab == 'post_buttons') {
        echo 'nav-tab-active';
    } ?>"
          >
            Post Buttons
          </a>
          <?php do_action('render_lyket_form', $active_tab); ?>
        </div>
    </div>
  <?php
}
