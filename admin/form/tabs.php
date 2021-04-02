<?php
include dirname(__FILE__) . '/render.php';
$active_tab;

// * render_lyket_admin function renders the form element + tabs
function render_lyket_admin()
{
    global $lk_page_name;
    global $active_tab;
    $active_tab = isset($_GET["tab"]) ? $_GET["tab"] : "user_settings"; ?>
      <div class="lyket wrap">
        <div class="nav-tab-wrapper">
          <a
            href="?page=<?php echo $lk_page_name; ?>&tab=user_settings"
            class="nav-tab <?php if ($active_tab == 'user_settings') {
        echo 'nav-tab-active';
    } ?> "
          >
            User Settings
          </a>
          <a
            href="?page=<?php echo $lk_page_name; ?>&tab=post_buttons"
            class="nav-tab <?php if ($active_tab == 'post_buttons') {
        echo 'nav-tab-active';
    } ?>"
          >
            Post Buttons
          </a>
          <a
            href="?page=<?php echo $lk_page_name; ?>&tab=page_buttons"
            class="nav-tab <?php if ($active_tab == 'page_buttons') {
        echo 'nav-tab-active';
    } ?>"
          >
            Page Buttons
          </a>
        </div>
        <?php do_action('render_lyket_form', $active_tab); ?>
    </div>
  <?php
}
