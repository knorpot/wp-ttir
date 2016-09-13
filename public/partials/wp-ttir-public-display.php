<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://cardocket.com
 * @since      1.0.0
 *
 * @package    Wp_Ttir
 * @subpackage Wp_Ttir/public/partials
 */
?>
<p>
	<h4><?php _e('Word count'); ?>: <?php echo $this->post_word_count; ?> </h4>
	<h4><?php _e('Image count'); ?>: <?php echo $this->post_image_count; ?> </h4>
	<h4><?php _e('Ratio'); ?>: <?php echo $this->post_text_to_image_ratio; ?> </h4>
</p>
