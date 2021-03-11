<?php

function render_tabs()
{
    ?>
      <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <?php
            //we check if the page is visited by click on the tabs or on the menu button.
            //then we get the active tab.
            $active_tab = "user-settings";
            if(isset($_GET["tab"]))
            {
                if($_GET["tab"] == "user-settings")
                {
                    $active_tab = "user-settings";
                }
                else
                {
                    $active_tab = "post-buttons";
                }
            }
        ?>

        <!-- wordpress provides the styling for tabs. -->
        <h2 class="nav-tab-wrapper">
            <!-- when tab buttons are clicked we jump back to the same page but with a new parameter that represents the clicked tab. accordingly we make it active -->
          <a
            href="?page=theme-options&tab=user-settings"
            class="nav-tab
            <?php if($active_tab == 'user-settings'){echo 'nav-tab-active';} ?> "><?php _e('Header Options', 'sandbox'); ?>
          </a>
          <a
            href="?page=theme-options&tab=post-buttons"
            class="nav-tab <?php if($active_tab == 'post-buttons'){echo 'nav-tab-active';} ?>"><?php _e('Advertising Options', 'sandbox'); ?>
          </a>
        </h2>
    </div>
}
