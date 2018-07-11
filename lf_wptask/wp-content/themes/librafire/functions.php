<?php
function my_theme_enqueue_styles() {
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function custom_post_employee() {
	$labels = array(
	'name' => _x( 'Employee', 'post type general name' ),
	'singular_name' => _x( 'Employee', 'post type singular name' ),
	'add_new' => _x( 'Add New', 'Employee' ),
	'add_new_item' => __( 'Add New Employee' ),
	'edit_item' => __( 'Edit Employee' ),
	'new_item' => __( 'New Employee' ),
	'all_items' => __( 'All Employees' ),
	'view_item' => __( 'View Employee' ),
	'search_items' => __( 'Search Employees' ),
	'not_found' => __( 'No Employees found' ),
	'not_found_in_trash' => __( 'No Employees found in the Trash' ),
	'parent_item_colon' => '',
	'menu_name' => 'Employees'
	);
	$supports = array(
	'title',
	'editor', 
	'author',
	'custom-fields',
	'post-formats',
	'comments',
	'revisions'
	);
	$details = array(
		'labels' => $labels,
		'description' => 'Employees',
		'public' => true,
		'menu_position' => 5,
		'supports' => $supports,
		'has_archive' => true
	);
	register_post_type( 'employee', $details );
}
add_action( 'init', 'custom_post_employee' );
function taxonomies_employee() {
	$labels = array(
		'name' => _x( 'Employee roles', 'taxonomy general name' ),
		'singular_name' => _x( 'Employee role', 'taxonomy singular name' ),
		'search_items' => __( 'Search Employee roles' ),
		'all_items' => __( 'All Employee roles' ),
		'parent_item' => __( 'Parent Employees role' ),
		'parent_item_colon' => __( 'Parent Employees role:' ),
		'edit_item' => __( 'Edit Employee role' ),
		'update_item' => __( 'Update Employee role' ),
		'add_new_item' => __( 'Add New Employee role' ),
		'new_item_name' => __( 'New Employee role' ),
		'menu_name' => 'Employee roles'
	);
	$args = array(
	'labels' => $labels,
	'hierarchical' => true
	);
	register_taxonomy('employee_category', 'employee', $args);
}
add_action('init', 'taxonomies_employee', 0 );
add_action('add_meta_boxes', 'employee_details_box');
function employee_details_box() {
	add_meta_box(
	'employee_details_box',
	__( 'employee metabox', 'myplugin_textdomain' )
	,
	'employee_details_box_content', 'employee', 'normal','high'
	);
}
function employee_details_box_content($post){
	wp_nonce_field( plugin_basename( __FILE__ ), 'employee_details_box_content_nonce' );
	echo '<label for="employee_details_text">Employee: </label>';
	echo '<input type="text" id="employee_details_text" name="employee_details_text">';
}
	add_action( 'save_post', 'employee_details_box_save' );
	
	function employee_details_box_save( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;
		if ( !wp_verify_nonce( $_POST['employee_details_box_content_nonce'], plugin_basename( __FILE__ ) ) )
			return;
		if ( 'page' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ) )
				return;
		} else {
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
		}
		
		$employee_details_text = $_POST['employee_details_text'];
		update_post_meta( $post_id, 'employee_details_text', $employee_details_text );
	}
?>
