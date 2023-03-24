<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://hellomasum.com
 * @since      1.0.0
 *
 * @package    Content_Counting
 * @subpackage Content_Counting/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Content_Counting
 * @subpackage Content_Counting/admin
 * @author     Masum <masumthedeveloper@gmail.com>
 */
class Content_Counting_Admin {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_filter( 'the_title', [$this, 'cc_title_changing_callback'] );
		add_filter( 'the_content', [$this, 'cc_content_counting_callback'] );

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Content_Counting_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Content_Counting_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/content-counting-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Content_Counting_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Content_Counting_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/content-counting-admin.js', array( 'jquery' ), $this->version, false );

	}





	/**
	 * The blog title converting to uppercse
	 */

	 public function cc_title_changing_callback($title){
		$uppercase_title = strtoupper($title);
		$title = $uppercase_title;
		return $title;
	 }

	/**
	 * Counting Content Letters & Words
	 */

	 public function cc_content_counting_callback($content) {
		$total_words = str_word_count($content);
		$total_letters = strlen($content);

		$final_output = sprintf('The total Words are %s and total letters are %s', $total_words, $total_letters);

		return $content.= $final_output;
	 }

}
