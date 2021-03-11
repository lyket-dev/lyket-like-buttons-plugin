<?php

function render_lyket_api_key_input()
{
    ?>
        <input type="text" name="api_key" id="api_key" value="<?php echo get_option('api_key'); ?>" />
    <?php
}

function render_lyket_disable_session_id_input()
{
    ?>
        <input type="text" name="disable_session_id" id="disable_session_id" value="<?php echo get_option('disable_session_id'); ?>" />
    <?php
}
