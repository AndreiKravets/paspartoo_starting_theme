<?php

function add_post_type() {
    $post_type_labels = array(
        'name'              => __( 'About slider', 'themename' ),
        'singular_name'     => __( 'About slider', 'themename' ),
        'add_new'           => __( 'New', 'themename' ),
        'add_new_item'      => __( 'New', 'themename' ),
        'edit_item'         => __( 'About slider', 'themename' ),
        'new_item'          => __( 'New', 'themename' ),
        'view_item'         => __( 'View', 'themename' ),
        'search_items'      => __( 'Search', 'themename' ),
        'not_found'         => __( 'Not Found', 'themename' ),
        'parent_item_colon' => '',
    );
    $description      = get_option( 'theme_custom_description' );

    $post_type_args = array(
        'labels'             => apply_filters( 'inspiry_property_post_type_labels', $post_type_labels ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'query_var'          => true,
        'has_archive'        => true,
        'capability_type'    => 'post',
        'hierarchical'       => true,
        'menu_icon'          => 'dashicons-editor-quote',
        'menu_position'      => 5,
        'description'        => $description,
        'supports'           => array( 'title', 'thumbnail', 'editor', 'page-attributes' ),
        'rewrite'            => array( 'slug' => 'about_slider', 'with_front' => false )
    );
    register_post_type( 'about_slider', $post_type_args );
    // reviews post type end
}
add_action( 'init', 'add_post_type' );


// Post output
function shortcode_func_about_slider() {
    global $wp_query;
    $temp_query = $wp_query;
$args = [
    'post_type'     => 'about_slider',
    'post_status'   => 'publish',
    'post_per_page' => -1
];

$query = new WP_Query($args);
?>

<?php if ($query->have_posts()) : ?>
    <div class="rampiq_team_slider">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php
            $id = get_the_ID();
            $img_url = get_the_post_thumbnail_url($id, 'full');
            ?>
            <div class="wpb_text_column">
                <div class="wpb_wrapper">
                    <p>
                        <a class="massonry_item" href="<?php echo $img_url ?>" data-fancybox="massonry" tabindex="0">
                            <img class="alignnone" src="<?php echo $img_url ?>" alt="">
                        </a>
                    </p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

<?php endif;
    wp_reset_postdata();
    $wp_query = NULL;
    $wp_query = $temp_query;
}?>
<?php add_shortcode( 'about_slider', 'shortcode_func_about_slider' );
