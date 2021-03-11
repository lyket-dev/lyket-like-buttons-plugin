<?php

function render_form()
{
    ?>
      <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <form method="post" action="options.php">
          <?php
            //[[add_settings_section callback is displayed here. For every new section we need to call settings_fields.
            settings_fields("header_section");
    settings_fields("advertising_section");

    // all the add_settings_field callbacks is displayed here
    do_settings_sections("lyket-user-settings");

    // Add the submit button to serialize the options
    submit_button(); ?>
        </form>
    </div>
    <?php
}
