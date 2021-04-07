<?php
include dirname(__FILE__) . '/inputs/buttons.php';
include dirname(__FILE__) . '/inputs/user.php';
include dirname(__FILE__) . '/preview.php';

add_action('render_lyket_form', 'render_form');

// * settings_fields tell the form what to do, as well as a hidden input to make it secure using a nonce. The argument passed to the function is a name for the settings group that will be registered later.
function render_form($tab)
{
    global $lyket_active_tab; ?>
        <div class="lk-admin-container">
          <?php if ($lyket_active_tab == 'post_buttons') : ?>
            <?php lyket_render_post_button_preview(); ?>
          <?php elseif ($lyket_active_tab == 'page_buttons') : ?>
            <?php lyket_render_page_button_preview(); ?>
          <?php endif; ?>

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
            <div class="lk-box__icon">
              <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
               width="522.000000pt" height="120.000000pt" viewBox="0 0 522.000000 120.000000"
               preserveAspectRatio="xMidYMid meet">
                <g transform="translate(0.000000,120.000000) scale(0.100000,-0.100000)"
                fill="#000000" stroke="none">
                <path d="M20 585 l0 -575 420 0 420 0 0 105 0 105 -117 0 c-65 0 -196 3 -290
                7 l-173 6 0 464 0 463 -130 0 -130 0 0 -575z"/>
                <path d="M750 1152 c0 -5 97 -170 215 -366 l215 -358 0 -209 0 -209 135 0 135
                0 0 208 0 207 193 320 c106 176 206 341 221 368 l28 47 -130 0 -129 0 -149
                -250 c-82 -137 -153 -248 -158 -247 -6 2 -77 114 -159 250 l-148 247 -135 0
                c-74 0 -134 -4 -134 -8z"/>
                <path d="M2000 585 l0 -575 130 0 130 0 0 144 0 144 76 81 c42 45 79 81 83 81
                4 0 89 -101 189 -225 l183 -225 144 0 c79 0 146 3 148 8 3 4 -105 146 -239
                316 -134 170 -244 312 -244 315 0 4 96 110 213 237 116 127 221 241 231 253
                l19 21 -145 0 -145 0 -243 -257 c-134 -142 -250 -262 -257 -266 -11 -6 -13 42
                -13 258 l0 265 -130 0 -130 0 0 -575z"/>
                <path d="M3220 585 l0 -575 445 0 445 0 0 105 0 105 -312 2 -313 3 -3 133 -3
                132 271 0 270 0 0 105 0 105 -270 0 -270 0 0 125 0 125 305 0 305 0 0 105 0
                105 -435 0 -435 0 0 -575z"/>
                <path d="M4200 1055 l0 -105 183 -2 182 -3 3 -467 2 -468 130 0 130 0 2 468 3
                467 183 3 182 2 0 105 0 105 -500 0 -500 0 0 -105z"/>
                </g>
              </svg>
            </div>
            <?php if ($lyket_active_tab == 'user_settings') : ?>
              <h4>Registration</h4>
              <p>
                Register to <a href="https://app.lyket.dev/signup" target="_blank">our website</a> and paste your personal API in the form.
              </p>
              <!-- <p>Check the disable ID option to make your buttons fully GDPR compliant</p> -->
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
            <p>Read the full documentation on <a href="https://app.lyket.dev/signup" target="_blank">the official website</a> to know more about Lyket buttons options.</p>
            <h4>Support</h4>
            <p>If you are having issues don't hesitate to contact <a href="https://lyket.dev/contact" target="_blank">Lyket's support</a>, we are happy to help you!</p>
          </div>
        </div>
    <?php
}
