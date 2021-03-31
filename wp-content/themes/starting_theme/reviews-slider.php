<?php
//Register custom post type reviews

function add_post_type() {
    $post_type_labels = array(
        'name'              => __( 'Reviews', 'themename' ),
        'singular_name'     => __( 'Review', 'themename' ),
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
        'menu_icon'          => 'dashicons-editor-quote',
        'menu_position'      => 5,
        'description'        => $description,
        'supports'           => array( 'title', 'thumbnail', 'editor', 'page-attributes' ),
        'rewrite'            => array( 'slug' => 'reviews', 'with_front' => false )
    );
    register_post_type( 'reviews', $post_type_args );
    // reviews post type end
}
add_action( 'init', 'add_post_type' );


// Post output
function shortcode_func_reviews() {
$args = [
    'post_type'     => 'reviews',
    'post_status'   => 'publish',
    'post_per_page' => -1
];

$query = new WP_Query($args);
?>

<?php if ($query->have_posts()) : ?>
    <div class="reviews_slider js_reviews container">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php
            $id = get_the_ID();
            $img_url = get_the_post_thumbnail_url($id, 'full');
            ?>
            <div class="rewiews_slider_item">
                <div class="reviews" style="background-image: url('<?php print get_template_directory_uri() ?>/img/quote.png');"></div>
                <div class="reviews_slider_text">
                    <?php the_content(); ?>
                    <h5><?php the_title(); ?></h5>

                </div>
            </div>
        <?php endwhile; ?>
    </div>

<?php endif; }?>
<?php add_shortcode( 'reviews_slider', 'shortcode_func_reviews' );
