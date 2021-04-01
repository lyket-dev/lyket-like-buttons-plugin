<?php
include dirname(__FILE__) . '/inputs/buttons.php';
include dirname(__FILE__) . '/inputs/user.php';

add_action('render_lyket_form', 'render_form');

// * settings_fields tell the form what to do, as well as a hidden input to make it secure using a nonce. The argument passed to the function is a name for the settings group that will be registered later.
function render_form($tab)
{
    global $active_tab;
    $active_tab = isset($_GET["tab"]) ? $_GET["tab"] : "user_settings"; ?>
      <div class="wrap">
        <div class="lk-flex">
          <div class="lk-flex__float">
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
        <div class="lk-flex__fixed">
          <?php if ($active_tab == 'user_settings') : ?>
            <h4>Registration</h4>
            <p>
              Register to <a href="https://app.lyket.dev/signup" target="_blank">our website</a> and paste your personal API in the form.
            </p>
            <p>Check the disable ID option to make your buttons fully GDPR compliant</p>
            <h4>Pricing</h4>
            <div>
              <p>Lyket charges you only if your website is successful! Pricing is based on your website visualizations and it is billed yearly</p>
              <ul>
                <li><strong>FREE</strong> - Up to 1,000 pageviews per month</li>
                <li><strong>PRO</strong> - Up to 10,000 pageviews per month - 3€/month</li>
                <li><strong>FLAT</strong> - No limitations - 10€/month</li>
              </ul>
            </div>
          <?php endif; ?>
          <h4>About</h4>
          <p>Read the full documentation on <a href="https://app.lyket.dev/signup" target="_blank">the official website</a>, to know more about Lyket options</p>
          <h4>Support</h4>
          <p>If you are having issues don't hesitate to contact <a href="https://lyket.dev/contact" target="_blank">Lyket's support</a>, we are happy to help you!</p>
        </div>
      </div>
    <?php
}
