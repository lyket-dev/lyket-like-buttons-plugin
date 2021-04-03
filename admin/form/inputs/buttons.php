<?php

global $lk_active_tab;

function render_enable_input()
{
    $key = get_key("enable");
    $value = get_option($key, true); ?>
    <input
      id=<?php echo $key; ?>
      name=<?php echo $key; ?>
      type="checkbox"
      <?php echo $value ? 'checked' : ''; ?>
    />
    <?php
}

function render_button_type_input()
{
    $options = array(
      "Like" => "like",
      "Like/dislike" => "updown",
      "Clap" => "clap"
    );
    $key = get_key("button_type");
    $value = get_option($key, "like"); ?>
      <select
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        required
      >
        <?php echo render_options($options, $value); ?>
      </select>
    <?php
}

function render_template_input()
{
    global $lk_templates;
    $key = get_key("template");
    $type_key = get_key("button_type");
    $button_type = get_option($type_key, "like");
    $value = get_option($key, "simple"); ?>
      <select
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        required
      >
        <?php echo render_options($lk_templates[$button_type], $value); ?>
      </select>
    <?php
}

function render_h_align_input()
{
    $key = get_key("h_align");
    $options = array(
      "Center" => "center",
      "Left" => "left",
      "Right" => "right"
    );
    $value = get_option($key, "like"); ?>
      <select
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        required
      >
        <?php echo render_options($options, $value); ?>
      </select>
    <?php
}

function render_v_align_input()
{
    $key = get_key("v_align");
    $options = array(
      "Top" => "top",
      "Bottom" => "bottom",
      "Top and bottom" => "top_bottom"
    );
    $value = get_option($key, "like"); ?>
      <select
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        required
      >
        <?php echo render_options($options, $value); ?>
      </select>
    <?php
}
function render_text_color_input()
{
    global $lk_default_colors;
    $key = get_key("text_color"); ?>
      <input
        class="lk-color-picker"
        data-alpha-enabled="true"
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, $lk_default_colors["text"]); ?>"
      />
    <?php
}

function render_primary_color_input()
{
    global $lk_default_colors;
    $key = get_key("primary_color"); ?>
      <input
        class="lk-color-picker"
        data-alpha-enabled="true"
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, $lk_default_colors["primary"]); ?>"
      />
    <?php
}

function render_secondary_color_input()
{
    global $lk_default_colors;
    $key = get_key("secondary_color"); ?>
      <input
        class="lk-color-picker"
        data-alpha-enabled="true"
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, $lk_default_colors["secondary"]); ?>"
      />
    <?php
}

function render_background_color_input()
{
    global $lk_default_colors;
    $key = get_key("background_color"); ?>
      <input
        class="lk-color-picker"
        data-alpha-enabled="true"
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, $lk_default_colors["background"]); ?>"
      />
    <?php
}

function render_highlight_color_input()
{
    global $lk_default_colors;
    $key = get_key("highlight_color"); ?>
      <input
        class="lk-color-picker"
        data-alpha-enabled="true"
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, $lk_default_colors["highlight"]); ?>"
      />
    <?php
}

function render_icon_color_input()
{
    global $lk_default_colors;
    $key = get_key("icon_color"); ?>
      <input
        class="lk-color-picker"
        data-alpha-enabled="true"
        id=<?php echo $key; ?>
        name=<?php echo $key; ?>
        type="text"
        value="<?php echo get_option($key, $lk_default_colors["icon"]); ?>"
      />
    <?php
}

function render_options($options, $selected)
{
    foreach ($options as $label => $value) {
        ?>
        <option value=<?php echo $value; ?> <?php echo $selected == $value ? "selected" : ""; ?>>
          <?php echo $label; ?>
        </option>
      <?php
    }
}

function get_key($value)
{
    global $lk_active_tab;

    $context = str_replace("_buttons", "", $lk_active_tab);
    $key = "lyket_${context}_${value}";
    return $key;
}
