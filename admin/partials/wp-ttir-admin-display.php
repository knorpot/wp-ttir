<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://cardocket.com
 * @since      1.0.0
 *
 * @package    Wp_Ttir
 * @subpackage Wp_Ttir/admin/partials
 */
?>

<div class="wrap">
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    <form method="post" name="ttir_options" action="options.php">
        <fieldset>
            <p> <?php _e('No settings defined yet!', $this->plugin_name); ?></p>
        </fieldset>
    </form>

</div>
