<?php

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );

	acf_add_options_sub_page( array(
		'page_title'  => 'Theme Subscribe Settings',
		'menu_title'  => 'Subscribe',
		'parent_slug' => 'theme-general-settings',
	) );

}


add_filter( 'the_generator', '__return_empty_string' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_wp_emojis_in_tinymce' );

add_filter( 'show_admin_bar', '__return_false' );


add_filter( 'pll_get_post_types', 'unset_cpt_pll', 10, 2 );
function unset_cpt_pll( $post_types, $is_settings ) {
	$post_types['acf-field-group'] = 'acf-field-group';
	$post_types['acf']             = 'acf';

	return $post_types;
}

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
add_theme_support( 'post-thumbnails' );
add_filter( 'jpeg_quality', function () {
	return 100;
} );

function _remove_script_version( $src ) {
	$parts = explode( '?', $src );
	if ( $parts[0] == 'https://fonts.googleapis.com/css' ) {
		$parts[0] = $src;
	}
	if ( $parts[0] == 'https://maps.googleapis.com/maps/api/js' ) {
		$parts[0] = $src;
	}


	return $parts[0];
}

add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


function disable_wp_emojis_in_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

function load_theme_styles() {

	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), null, 'all' );
	wp_register_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome.min.css', array(), null, 'all' );
	wp_register_style( 'style', get_template_directory_uri() . '/style.css', array(), time(), 'all' );;

	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'fontawesome' );
	wp_enqueue_style( 'style' );
	$js_directory_uri = get_template_directory_uri() . '/js/';
	wp_register_script( 'slick', $js_directory_uri . 'slick.js', array( 'jquery' ), null );
	wp_register_script( 'script', $js_directory_uri . 'script.js', array( 'jquery' ), null );
    wp_register_script( 'valid', $js_directory_uri . 'valid.js', array( 'jquery' ), null );
    wp_enqueue_script( 'slick' );
	wp_enqueue_script( 'script' );
	wp_enqueue_script( 'valid' );
}

add_action( 'wp_enqueue_scripts', 'load_theme_styles', 100 );


function menulang_setup() {
	load_theme_textdomain( 'themename', get_template_directory() . '/languages' );
	register_nav_menus( array( 'header_menu' => __( 'Menu', 'themename' ) ) );
	register_nav_menus( array( 'footer_menu' => __( 'footer menu', 'themename' ) ) );
	register_nav_menus( array( 'social' => __( 'Social link', 'themename' ) ) );
}

add_action( 'after_setup_theme', 'menulang_setup' );

function inspiry_theme_sidebars() {
	register_sidebar( array( 'name'          => __( 'Header logo', 'themename' ),
	                         'id'            => 'header_logo',
	                         'description'   => __( 'Header logo', 'themename' ),
	                         'before_widget' => '',
	                         'after_widget'  => '',
	                         'before_title'  => '',
	                         'after_title'   => ''
	) );
	register_sidebar( array( 'name'          => __( 'Header Call Us', 'themename' ),
	                         'id'            => 'header_call',
	                         'description'   => __( 'Header Call Us', 'themename' ),
	                         'before_widget' => '',
	                         'after_widget'  => '',
	                         'before_title'  => '',
	                         'after_title'   => ''
	) );
	register_sidebar( array( 'name'          => __( 'Footer logo', 'themename' ),
	                         'id'            => 'footer_logo',
	                         'description'   => __( 'Footer logo', 'themename' ),
	                         'before_widget' => '',
	                         'after_widget'  => '',
	                         'before_title'  => '',
	                         'after_title'   => ''
	) );
	register_sidebar( array( 'name'          => __( 'Footer Developed', 'themename' ),
	                         'id'            => 'footer_developed',
	                         'description'   => __( 'Footer Developed', 'themename' ),
	                         'before_widget' => '',
	                         'after_widget'  => '',
	                         'before_title'  => '',
	                         'after_title'   => ''
	) );
    register_sidebar( array( 'name'          => __( 'Footer Privacy', 'themename' ),
                              'id'            => 'footer_privacy',
                              'description'   => __( 'Footer privacy', 'themename' ),
                              'before_widget' => '',
                              'after_widget'  => '',
                              'before_title'  => '',
                              'after_title'   => ''
    ) );
    register_sidebar( array( 'name'          => __( 'Footer Phone', 'themename' ),
                              'id'            => 'footer_phone',
                              'description'   => __( 'Footer phone', 'themename' ),
                              'before_widget' => '',
                              'after_widget'  => '',
                              'before_title'  => '',
                              'after_title'   => ''
    ) );
    register_sidebar( array( 'name'          => __( 'Footer Address', 'themename' ),
                              'id'            => 'footer_addres',
                              'description'   => __( 'Footer address', 'themename' ),
                              'before_widget' => '',
                              'after_widget'  => '',
                              'before_title'  => '',
                              'after_title'   => ''
    ) );
}

add_action( 'widgets_init', 'inspiry_theme_sidebars' );


function add_file_types_to_uploads( $file_types ) {
	$new_filetypes        = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types           = array_merge( $file_types, $new_filetypes );

	return $file_types;
}

add_action( 'upload_mimes', 'add_file_types_to_uploads' );


class    Main_Submenu_Class extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$classes     = array( 'sub-menu', 'list-unstyled', 'child-navigation' );
		$class_names = implode( ' ', $classes );
		$output      .= "\n" . '<ul class="' . $class_names . '">' . "\n";
	}

	function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( is_object( $args[0] ) ) {
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		}

		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
		global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names_arr = array();
		$class_names     = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names       = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names_arr[] = esc_attr( $class_names );
		$class_names_arr[] = 'menu-item-id-' . $item->ID;
		if ( $args->has_children ) {
			$class_names_arr[] = 'has-child';
		}


		$class_names = ' class="' . implode( ' ', $class_names_arr ) . '"';
		$output      .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';
		$attributes  = '';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . $item->url . '"' : '';


		$item_output = $args->before;
		$item_output .= '<div class="parent"><a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $args->link_after;
		$item_output .= '</a>';
		if ( $args->has_children ) {
			$item_output .= '<span data-id="' . $item->ID . '"><i class="fal fa-chevron-left"></i></span>';
		}
		$item_output .= '</div>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}



// numbered pagination
function pagination( $pages = '', $range = 4 ) {
	$showitems = ( $range * 2 ) + 1;

	global $paged;
	if ( empty( $paged ) ) {
		$paged = 1;
	}

	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( ! $pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo "<div class='paginate'>";
		if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( 1 ) . "'>&laquo; First</a>";
		}
		if ( $paged > 1 && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $paged - 1 ) . "'>&lsaquo; Previous</a>";
		}

		for ( $i = 1; $i <= $pages; $i ++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i ) ? "<span class=\"pag_item current\">" . $i . "</span>" : "<a href='" . get_pagenum_link( $i ) . "' class=\"pag_item inactive\">" . $i . "</a>";
			}
		}

		if ( $paged < $pages && $showitems < $pages ) {
			echo "<a href=\"" . get_pagenum_link( $paged + 1 ) . "\">Next &rsaquo;</a>";
		}
		if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
			echo "<a href='" . get_pagenum_link( $pages ) . "'>Last &raquo;</a>";
		}
		echo "</div>\n";
	}
}


