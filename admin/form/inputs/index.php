<?php
function render_lyket_api_key_input()
{
    ?>
      <input
        id="api_key"
        type="text"
        name="api_key"
        required
        value="<?php echo get_option('api_key'); ?>"
      />
    <?php
}

function render_lyket_disable_session_id_input()
{
    ?>
      <input
        id="disable_session_id"
        type="checkbox"
        name="disable_session_id"
        checkbox
        value="<?php echo get_option('disable_session_id', false); ?>"
      />
    <?php
}
