<?php

function render_button_type_input()
{
    global $active_tab;
    $key = "lyket_${active_tab}_button_type";
    $value = get_option($key, "like");
    $options = render_options(array("like", "clap", "like/dislike"), $value); ?>
      <select
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        required
      >
        <?php $options; ?>
      </select>
    <?php
}

function render_template_input()
{
    global $active_tab;
    $key = "lyket_${active_tab}_template"; ?>
      <input
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, 'simple'); ?>"
      />
    <?php
}

function render_h_align_input()
{
    global $active_tab;
    $key = "lyket_${active_tab}_h_align"; ?>
      <input
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, 'center'); ?>"
      />
    <?php
}

function render_v_align_input()
{
    global $active_tab;
    $key = "lyket_${active_tab}_v_align"; ?>
      <input
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, 'top'); ?>"
      />
    <?php
}

function render_text_color_input()
{
    global $active_tab;
    global $default_colors;
    $key = "lyket_${active_tab}_text_color"; ?>
      <input
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, $default_colors["text"]); ?>"
      />
    <?php
}

function render_primary_color_input()
{
    global $active_tab;
    global $default_colors;
    $key = "lyket_${active_tab}_primary_color"; ?>
      <input
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, $default_colors["primary"]); ?>"
      />
    <?php
}

function render_secondary_color_input()
{
    global $active_tab;
    global $default_colors;
    $key = "lyket_${active_tab}_secondary_color"; ?>
      <input
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, $default_colors["secondary"]); ?>"
      />
    <?php
}

function render_background_color_input()
{
    global $active_tab;
    global $default_colors;
    $key = "lyket_${active_tab}_background_color"; ?>
      <input
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, $default_colors["background"]); ?>"
      />
    <?php
}

function render_highlight_color_input()
{
    global $active_tab;
    global $default_colors;
    $key = "lyket_${active_tab}_highlight_color"; ?>
      <input
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, $default_colors["highlight"]); ?>"
      />
    <?php
}

function render_options($elements, $value)
{
    foreach ($elements as $element) {
        echo `<option value="$element" selected="$value">` . ucfirst($element) . `</option>`;
    }
}
