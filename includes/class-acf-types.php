<?php

class ACF_Types {

	/*
	*    INITIALISATION
	*/

	const DEFAULT_TYPE_NAME = 'acf_type';

	protected $loader;
	protected $public;
	protected $admin;
	protected $plugin_name;
	protected $plugin_dir;
	protected $type_name;
	protected $version;

	protected $existing_types;

	public function __construct() {

		$this->version    = '1.0.0';
		$this->plugin_name = 'acf-types';
		$this->plugin_dir = plugin_dir_path( dirname(dirname(__FILE__)) . '/acf-types.php' );
		$this->type_name = apply_filters('acf_types_type_name', ACF_Types::DEFAULT_TYPE_NAME);

		//  load dependencies
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-acf-types-loader.php';

		//  initialize dependencies
		$this->loader = new ACF_Types_Loader();

		//  register post types object type
		$this->loader->add_action( 'init', $this, 'register_types' );

		//	register custom post types
		$this->loader->add_action( 'init', $this, 'load_custom_types' );
		$this->loader->add_action( 'admin_notices', $this, 'admin_notices' );
		$this->loader->add_action( 'acf/settings/load_json', $this, 'load_json' );


	}

	/*
	*    TYPES
	*/

	function register_types() {

		//	register custom post types
		register_post_type( $this->type_name, array(
			'labels' => array(
				'name'					=> _x( 'Post Types', $this->type_name ),
				'singular_name'			=> _x( 'Type', $this->type_name ),
				'add_new'				=> _x( 'Add New', $this->type_name ),
				'add_new_item'			=> _x( 'Add New Type', $this->type_name ),
				'edit_item'				=> _x( 'Edit Type', $this->type_name ),
				'new_item'				=> _x( 'New Type', $this->type_name ),
				'view_item'				=> _x( 'View Type', $this->type_name ),
				'search_items'			=> _x( 'Search Types', $this->type_name ),
				'not_found'				=> _x( 'No Type found', $this->type_name ),
				'not_found_in_trash' 	=> _x( 'No Type found in Trash', $this->type_name ),
				'parent_item_colon'  	=> _x( 'Parent Type:', $this->type_name ),
				'menu_name'          	=> _x( 'Post Types', $this->type_name ),
			),
			'supports'            => array( 'title' ),
			'hierarchical'        => false,
			'taxonomies'          => array(),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_icon'           => 'dashicons-admin-generic',
			'menu_position'       => 95,
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'has_archive'         => false,
			'query_var'           => false,
			'can_export'          => false,
			'rewrite'             => false,
			'capability_type'     => 'post'
		) );

	}

	/*
	*    TYPE LOADER
	*/

	function load_json( $paths ) {
		$paths[] = plugin_dir_path(__FILE__).'../field-groups/types';
		return $paths;
	}

	public function load_custom_types()
	{
		$this->existing_types = array();
		$types = ACF_Types::get_custom_types();

		$menu_position = apply_filters('acf_types_initial_menu_position', 300);
		foreach($types as $type)
		{

			$args = self::get_post_args($type->ID, $menu_position);
		//	echo '<pre>';
///			print_r($type);
//			print_r(get_fields($type->ID));
		//	print_r($args);
		//	echo '</pre>';

			//echo $type->post_title . '<br />';
			register_post_type( $type->post_title, $args );

			$menu_position++;

		}

		//flush_rewrite_rules();

	}

	public static function get_post_args($type_id, $menu_position = null)
	{

		if ($menu_position == null)
			$menu_position = apply_filters('acf_types_initial_menu_position', 300);

		//	get field values
		$args = array_replace_recursive( get_fields($type_id), array(
			'menu_position' 			=> $menu_position,
			'menu_icon' 				=> 'dashicons-admin-post'
		));

		//	wrangle labels
		if (!isset($args['labels']))
		{
			$plural = $args['label'];
			$singular = $args['singular_label'];

			$args['labels'] = array(
				'name'					=> $plural,
				'singular_name'			=> $singular,
				'add_new'				=> 'Add New',
				'add_new_item'			=> 'Add New ' . $singular,
				'edit_item'				=> 'Edit ' . $singular,
				'new_item'				=> 'New ' . $singular,
				'view_item'				=> 'View ' . $singular,
				'search_items'			=> 'Search ' . $plural,
				'not_found'				=> 'No ' .  $singular . ' found',
				'not_found_in_trash' 	=> 'No ' . $singular . ' found in Trash',
				'parent_item_colon'  	=> 'Parent ' .  $singular . ':',
				'menu_name'          	=> $plural
			);
			unset($args['singular_label']);
		}

		return $args;

	}

	function admin_notices(){

		global $post;
		$screen = get_current_screen();

		if ( $post != null && $post->post_status == 'publish' && $screen->id == 'acf_type' ) {

			$post_title = get_the_title($post->ID);
			echo '<div class="updated">';
			echo '<p>Add this code to your functions.php to register this post type:</p>';
			echo '<pre>';
			echo 'register_post_type("' . $post_title . '", ';
			echo var_export(self::get_post_args($post->ID), TRUE);
			echo ');';

			echo '</div>';
		}

		if (count($this->existing_types) > 0) {
			$types = array();
			foreach ( $this->existing_types as $type)
				$types[] = $type->name;
			echo '<div class="error"><p><b>Warning:</b> ACF_Types couldn\'t load the following post types as they already exist: ' . join( ',', $types ) . '</p></div>';
		}
	}

/*
*    UTILITIES
*/

	public function get_custom_types()
	{
		return get_posts(array(
			'posts_per_page' => -1,
			'post_type' => apply_filters('acf-types_type_name', ACF_Types::DEFAULT_TYPE_NAME)
		));
	}

	public static function get_type_fields()
	{
		acf_disable_local();
		$groups = wp_filter_object_list(acf_get_field_groups(), array('title' => 'Types'));
		acf_enable_local();
		if (count($groups) == 0)
			return array();
		return acf_get_fields_by_id($groups[0]['ID']);
	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}
