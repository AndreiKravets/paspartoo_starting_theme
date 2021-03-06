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
    register_sidebar( array( 'name'          => __( 'Header logo home', 'themename' ),
        'id'            => 'header_logo_home',
        'description'   => __( 'logo', 'themename' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ) );
    register_sidebar( array( 'name'          => __( 'Header logo about', 'themename' ),
        'id'            => 'header_logo_about',
        'description'   => __( 'logo', 'themename' ),
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
	register_sidebar( array( 'name'          => __( 'Footer logo white', 'themename' ),
	                         'id'            => 'footer_logo_white',
	                         'description'   => __( 'Footer logo white', 'themename' ),
	                         'before_widget' => '',
	                         'after_widget'  => '',
	                         'before_title'  => '',
	                         'after_title'   => ''
	) );
	register_sidebar( array( 'name'          => __( 'Footer social', 'themename' ),
	                         'id'            => 'footer_social',
	                         'description'   => __( 'Footer social', 'themename' ),
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
    register_sidebar( array( 'name'          => __( 'Get in Touch', 'themename' ),
        'id'            => 'get_in_touch',
        'description'   => __( '', 'themename' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ) );
    register_sidebar( array( 'name'          => __( 'Get in Touch form', 'themename' ),
        'id'            => 'get_in_touch_form',
        'description'   => __( '', 'themename' ),
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





$post_type_labels = array(
    'name' => __('Our Work', 'themename'),
    'singular_name' => __('Our Work', 'themename'),
    'add_new' => __('Add New', 'themename'),
    'add_new_item' => __('Add New', 'themename'),
    'edit_item' => __('Edit', 'themename'),
    'new_item' => __('New', 'themename'),
    'view_item' => __('View', 'themename'),
    'search_items' => __('Search', 'themename'),
    'not_found' => __('No found', 'themename'),
    'parent_item_colon' => '',
);
$description = get_option('theme_custom_description');
$post_type_args = array(
    'labels' => apply_filters('inspiry_property_post_type_labels', $post_type_labels),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'has_archive' => true,
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_icon' => 'dashicons-layout',
    'menu_position' => 5,
    'description' => $description,
    'supports' => array('title', 'thumbnail', 'editor',  'page-attributes'),
    'rewrite' => array(
        'slug' => apply_filters('inspiry_property_slug',  'our_works'),
    ),
);

register_post_type('our_works', $post_type_args);




function home_our_work_func()
{
    $our_work = '<div class="home_our_work_cont">
	<div class="row">';
    global $wp_query;
    $temp_query = $wp_query;
    $args1 = array('post_type' => 'our_works', 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'menu_order', 'order' => 'asc');

    $posts = new WP_Query($args1);
    if ($posts->have_posts()) {

        ?>
        <?php
        $i = 1;
        while ($posts->have_posts()) {

            $posts->the_post();
            $home_thumbnails = get_field("work_home_thumbnails");
            $work_title_logo = get_field('work_title_logo');
            if ($home_thumbnails == true) {
                if ($i == 1) {
                    $our_work .= '<div class="col-md-6 col-sm-12 col-12 home_work_block_1">
<a href="' . get_home_url() . '/our-work/#our_work_content_' . get_the_ID() . '">
<div class="home_work_img" style="background-image:url(' . $home_thumbnails . ')">	
<div class="work_title_logo_h3"> <img src=' . $work_title_logo . ' alt="" ></div>
<img src="/wp-content/uploads/2021/02/Group-23.svg" alt="">
		  </div></a>
		</div><div class="col-md-6 col-sm-12 col-12 home_work_block_4">';
                    $i++;
                }
                else {
                    $our_work .= '  <a href="' . get_home_url() . '/our-work/#our_work_content_' . get_the_ID() . '">
<div class="home_work_img" style="background-image:url(' . $home_thumbnails . ')">	

<div class="work_title_logo_h3"> <img src=' . $work_title_logo . ' alt="" ></div>
<img src="/wp-content/uploads/2021/02/Group-23.svg" alt="">
		  </div></a>';
                    $i++;

                }
            }
        }
        $our_work .= '</div></div></div>';
        wp_reset_postdata();
        $wp_query = NULL;
        $wp_query = $temp_query;

        return $our_work;

    }
}


add_shortcode('home_our_work', 'home_our_work_func');

// end home_our_work





function show_our_work_func()
{
    $show_our_work = 	'<div class="container">
	<div class="row">';
    global $wp_query;
    $temp_query = $wp_query;
    $args2 = array('post_type' => 'our_works', 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'menu_order', 'order' => 'asc');

    $posts = new WP_Query($args2);

    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
            $work_thumbnails = get_field("work_thumbnails");
            $work_layout = get_field("work_layout");
            $work_title_logo = get_field("work_title_logo");

            $show_our_work .= '<div class=" '. $work_layout .' col-md-6 show_our_work_content">';
            $show_our_work .= '<a href="' .get_the_permalink() . '"><div class="show_our_work_item" id="our_work_content_'.get_the_ID().'"style="background-image:url(' . $work_thumbnails . ')">
                                        <div class="show_our_work_img_div"><img src="' . $work_title_logo . '" class="show_our_work_img" alt=""> </div>
                                       <img src="/wp-content/uploads/2021/02/Group-23.svg" alt="" class="work_arrow">
                                       
                                      </div></a></div>';

        }

        $show_our_work .= '</div></div>';

        wp_reset_postdata();
        $wp_query = NULL;
        $wp_query = $temp_query;

        return $show_our_work;
    }
}


add_shortcode('show_our_work', 'show_our_work_func');

////////////////////////////////////////////////////////////


function show_our_work_slider_func()
{
    $show_our_work = 	'<div class="work_slider_section">';
    global $wp_query;
    $temp_query = $wp_query;
    $args2 = array('post_type' => 'our_works', 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'menu_order', 'order' => 'asc');

    $posts = new WP_Query($args2);

    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();

            $work_title_logo = get_field("work_title_logo");

            $show_our_work .= '<div class="show_our_work_slider_item">
                     <img src="' . $work_title_logo . '" class="show_our_work_img" alt=""></div>';

        }

        $show_our_work .= '</div>';

        wp_reset_postdata();
        $wp_query = NULL;
        $wp_query = $temp_query;

        return $show_our_work;
    }
}


add_shortcode('show_our_work_slider', 'show_our_work_slider_func');