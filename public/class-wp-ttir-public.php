<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://cardocket.com
 * @since      1.0.0
 *
 * @package    Wp_Ttir
 * @subpackage Wp_Ttir/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Ttir
 * @subpackage Wp_Ttir/public
 * @author     Neels Groenewald <neelsg@gmail.com>
 */
class Wp_Ttir_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Word count of current post
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      integer    $post_word_count    Word count of current post
	 */
    private $post_word_count;

	/**
	 * Image count of current post
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      integer    $post_image_count    Image count of current post
	 */
    private $post_image_count;

	/**
	 * Image count of current post
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $post_text_to_image_ratio    text to image ratio of current post
	 */
	 private $post_text_to_image_ratio;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Ttir_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Ttir_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-ttir-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Ttir_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Ttir_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-ttir-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	* updates private variables for post contents
	*
	* @since    1.0.0
	*/
	private function update_ttir_for_post($post) {

		$this->post_word_count = str_word_count($post);
		$this->post_image_count = substr_count($post,"<img ");

		$total_count = $this->post_word_count + $this->post_image_count;
		$word_ratio = round(100 * $this->post_word_count / $total_count);
		$image_ratio = round(100 * $this->post_image_count / $total_count);

		$this->post_text_to_image_ratio = "$word_ratio:$image_ratio";
	}

	/**
	* Render the public page for this plugin.
	*
	* @since    1.0.0
	*/
	public function display_plugin_public_page($content) {
		if ( is_singular() && is_main_query() ) {

			$this->update_ttir_for_post($content);
			include_once( 'partials/wp-ttir-public-display.php' );
		}

		return $content;
	}

}
