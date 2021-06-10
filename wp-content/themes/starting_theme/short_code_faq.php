<?php
function add_post_type_faq() {
    $post_type_labels = array(
        'name'              => __( 'FAQ', 'themename' ),
        'singular_name'     => __( 'FAQ', 'themename' ),
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
        'menu_icon'          => 'dashicons-editor-help',
        'menu_position'      => 5,
        'description'        => $description,
        'supports'           => array( 'title', 'thumbnail', 'editor', 'page-attributes' ),
        'rewrite'            => array( 'slug' => 'faqs', 'with_front' => false )
    );
    register_post_type( 'faq', $post_type_args );
    // fullscreen slider end
}
add_action( 'init', 'add_post_type_faq' );


function short_code_faq()
{

    global $wp_query;
    $temp_query = $wp_query;
    $args = array('post_type' => 'faq', 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'menu_order', 'order' => 'asc');
    $posts = new WP_Query($args);



    if ( $posts->have_posts() ) : ?>
        <div class="faq_section">
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
                    <div class="line">
                        <div class="question">
                            <h6><?php echo $title;?></h6>
                        </div>
                        <div class="answer">
                            <p><?php echo $content;?></p>
                        </div>
                    </div>


            <?php
            endwhile;
            ?>

        </div>
    <?php
    endif;
    wp_reset_postdata();
    $wp_query = NULL;
    $wp_query = $temp_query;

}
add_shortcode('faq_shortcode', 'short_code_faq');
?>