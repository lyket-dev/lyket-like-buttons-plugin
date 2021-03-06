<?php
function lyket_render_api_key_input()
{
    ?>
      <input
        id="lyket_api_key"
        name="lyket_api_key"
        type="text"
        required
        value="<?php echo get_option('lyket_api_key'); ?>"
      />
    <?php
}

function lyket_render_disable_session_id_input()
{
    ?>
      <input
        id="lyket_disable_session_id"
        name="lyket_disable_session_id"
        type="checkbox"
        <?php echo get_option('lyket_disable_session_id', false) ? 'checked' : ''; ?>
      />
    <?php
}
