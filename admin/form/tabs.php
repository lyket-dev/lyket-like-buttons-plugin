<?php
include dirname(__FILE__) . '/render.php';
$lyket_active_tab;

// * lyket_render_admin function renders the form element + tabs
function lyket_render_admin()
{
    global $lyket_page_name;
    global $lyket_active_tab;
    $allowed_slugs = array("user_settings", "post_buttons", "page_buttons");
    $lyket_active_tab =
      isset($_GET["tab"]) && in_array($_GET["tab"], $allowed_slugs) ?
        sanitize_key($_GET["tab"]) :
        "user_settings"; ?>
      <div class="lyket wrap">
        <div class="nav-tab-wrapper">
          <a
            href="?page=<?php echo $lyket_page_name; ?>&tab=user_settings"
            class="nav-tab <?php if ($lyket_active_tab == 'user_settings') {
            echo 'nav-tab-active';
        } ?> "
          >
            User Settings
          </a>
          <a
            href="?page=<?php echo $lyket_page_name; ?>&tab=post_buttons"
            class="nav-tab <?php if ($lyket_active_tab == 'post_buttons') {
            echo 'nav-tab-active';
        } ?>"
          >
            Post Buttons
          </a>
          <a
            href="?page=<?php echo $lyket_page_name; ?>&tab=page_buttons"
            class="nav-tab <?php if ($lyket_active_tab == 'page_buttons') {
            echo 'nav-tab-active';
        } ?>"
          >
            Page Buttons
          </a>
        </div>
        <?php do_action('render_lyket_form', $lyket_active_tab); ?>
    </div>
  <?php
}
