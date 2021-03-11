<?php
include dirname(__FILE__) . '/inputs/buttons.php';
include dirname(__FILE__) . '/inputs/user.php';

add_action('render_lyket_form', 'render_form');

function render_form($tab)
{
    ?>
      <div class="wrap">
        <form method="post" action="options.php">
          <?php echo "lyket_$tab"; ?>
          <?php
            //[[add_settings_section callback is displayed here. For every new section we need to call settings_fields.
            settings_fields("lyket_$tab");

    // all the add_settings_field callbacks is displayed here
    do_settings_sections("lyket_$tab");

    // Add the submit button to serialize the options
    submit_button(); ?>
        </form>
    </div>
    <?php
}
