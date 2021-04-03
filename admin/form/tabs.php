<?php
include dirname(__FILE__) . '/render.php';
$lk_active_tab;

// * render_lyket_admin function renders the form element + tabs
function render_lyket_admin()
{
    global $lk_page_name;
    global $lk_active_tab;
    $allowed_slugs = array("user_settings", "post_buttons", "page_buttons");
    $lk_active_tab =
      isset($_GET["tab"]) && in_array($_GET["tab"], $allowed_slugs) ?
        sanitize_key($_GET["tab"]) :
        "user_settings"; ?>
      <div class="lyket wrap">
        <div class="nav-tab-wrapper">
          <a
            href="?page=<?php echo $lk_page_name; ?>&tab=user_settings"
            class="nav-tab <?php if ($lk_active_tab == 'user_settings') {
            echo 'nav-tab-active';
        } ?> "
          >
            User Settings
          </a>
          <a
            href="?page=<?php echo $lk_page_name; ?>&tab=post_buttons"
            class="nav-tab <?php if ($lk_active_tab == 'post_buttons') {
            echo 'nav-tab-active';
        } ?>"
          >
            Post Buttons
          </a>
          <a
            href="?page=<?php echo $lk_page_name; ?>&tab=page_buttons"
            class="nav-tab <?php if ($lk_active_tab == 'page_buttons') {
            echo 'nav-tab-active';
        } ?>"
          >
            Page Buttons
          </a>
        </div>
        <?php do_action('render_lyket_form', $lk_active_tab); ?>
    </div>
  <?php
}
