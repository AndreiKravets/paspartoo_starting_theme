<?php
function add_post_type_fullscreen_slider() {
    $post_type_labels = array(
        'name'              => __( 'Fullscreen slider', 'themename' ),
        'singular_name'     => __( 'Fullscreen slider', 'themename' ),
        'add_new'           => __( 'New', 'themename' ),
        'add_new_item'      => __( 'New', 'themename' ),
        'edit_item'         => __( 'Review', 'themename' ),
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
        'menu_icon'          => 'dashicons-images-alt',
        'menu_position'      => 5,
        'description'        => $description,
        'supports'           => array( 'title', 'thumbnail', 'editor', 'page-attributes' ),
        'rewrite'            => array( 'slug' => 'fullscreen_slider_post', 'with_front' => false )
    );
    register_post_type( 'fullscreen_slider', $post_type_args );
    // fullscreen slider end
}
add_action( 'init', 'add_post_type_fullscreen_slider' );




function short_code_fullscreen_slider()
{

    global $wp_query;
    $temp_query = $wp_query;
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array('post_type' => 'fullscreen_slider', 'posts_per_page' => -1, 'paged'=> $paged, 'post_status' => 'publish', 'orderby' => 'menu_order', 'order' => 'asc');
    $posts = new WP_Query($args);



    if ( $posts->have_posts() ) : ?>
        <div class="home_slider">
                <?php while ( $posts->have_posts() ) : $posts->the_post();
                $id         = get_the_ID();
                $permalink  = get_the_permalink();
                $image      = get_the_post_thumbnail_url( $id, 'full' );
                $title      = get_the_title();
                $content      = get_the_content();
                $date       = get_the_date();
                $categories = get_the_terms( $id, 'category' );
                $cat        = $categories[0]->name;
                $excerpt    = get_the_excerpt(); ?>
            <div class="fullscreen_slider_item" style="background-image:url('<?php echo $image;?>'); background-repeat:no-repeat; background-size: cover">
                <div class="container">
                    <div>

                        <h1><?php echo $title;?></h1>
                        <p><?php echo $content;?></p>

                    </div>
                </div>
            </div>

            <?php
            endwhile; ?>

        </div>
    <?php
    endif;
    wp_reset_postdata();
    $wp_query = NULL;
    $wp_query = $temp_query;

}
add_shortcode('fullscreen_slider_shortcode', 'short_code_fullscreen_slider');

?>