<?php
add_action('render_lyket_tabs', 'render_tabs');

function render_tabs()
{
    $active_tab = "user-settings";
    global $page_name;

    if (isset($_GET["tab"])) {
        if ($_GET["tab"] == "user-settings") {
            $active_tab = "user-settings";
        } else {
            $active_tab = "post-buttons";
        }
    } ?>
      <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <div class="nav-tab-wrapper">
          <a
            href="?page=<?php echo $page_name; ?>&tab=user-settings"
            class="nav-tab <?php if ($active_tab == 'user-settings') {
        echo 'nav-tab-active';
    } ?> "
          >
            User Settings
          </a>
          <a
            href="?page=<?php echo $page_name; ?>&tab=post-buttons"
            class="nav-tab <?php if ($active_tab == 'post-buttons') {
        echo 'nav-tab-active';
    } ?>"
          >
            Post Buttons
          </a>
        </div>
    </div>
  <?php
}
