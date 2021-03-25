<?php
include dirname(__FILE__) . '/inputs/buttons.php';
include dirname(__FILE__) . '/inputs/user.php';

add_action('render_lyket_form', 'render_form');

// * settings_fields tell the form what to do, as well as a hidden input to make it secure using a nonce. The argument passed to the function is a name for the settings group that will be registered later.
function render_form($tab)
{
    ?>
      <div class="wrap">
        <form method="post" action="options.php">
          <?php
            //[[add_settings_section callback is displayed here. For every new section we need to call settings_fields.
            settings_fields("lyket_$tab");

    // * do_settings_sections is the key part of the form, this is where all the sections and fields are output (textboxes, selects, checkboxes etc) so data can be entered by the user. Again, that function argument is arbitrary but needs to be unique. We will use that when registering fields.

    do_settings_sections("lyket_$tab");

    // Add the submit button to serialize the options
    submit_button(); ?>
        </form>
    </div>
    <?php
}
