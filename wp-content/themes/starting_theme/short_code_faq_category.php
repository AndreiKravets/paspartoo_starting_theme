<?php
function add_post_type_faq_category() {
    $post_type_labels = array(
        'name'              => __( 'FAQ_Category', 'themename' ),
        'singular_name'     => __( 'FAQ_Category', 'themename' ),
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
        'rewrite'            => array( 'slug' => 'faq_cstgorys', 'with_front' => false )
    );
    register_post_type( 'faq_category', $post_type_args );
    // fullscreen slider end
}
add_action( 'init', 'add_post_type_faq_category' );

$feature_labels = array(
    'name'          => __('Faq category', 'themename'),
    'singular_name' => __('Faq category', 'themename'),
    'menu_name'     => __('Faq category', 'themename'),
);
register_taxonomy(
    'faq_category-type',
    array('faq_category'),
    array(
        'hierarchical'   => true,
        'labels'         => apply_filters('inspiry_property_feature_labels', $feature_labels),
        'show_ui'        => true,
        'query_var'      => true,
        'rewrite'        => array(
            'slug'       => apply_filters('inspiry_property_feature_slug',  'faq_category-type'),
        ),
    )
);

function short_code_faq_category()
{
$terms = get_terms(
    array(
        'taxonomy'   => 'faq_category-type',
        'hide_empty' => true,
        'hierarchical' => false,
        'orderby' => 'name',
        'order' => 'ASC',
    )
);
?>
<div class="fag_tabs_section">
    <ul class="tabs_caption_fag">
    <?php
    $first = TRUE;
    foreach ( $terms as $term ) {
        if ($first == TRUE) { ?>
        <li class="active"><?php echo $term->name; ?></li>
    <?php $first = FALSE;}
    else{ ?>
           <li><?php echo $term->name; ?></li>
    <?php }} ?>
   </ul>
    <?php
    $first_tabs = TRUE;
    foreach ( $terms as $term ) {
        if ($first_tabs == TRUE) { ?>
    <div class='faq_tabs active'>
            <?php $first_tabs = FALSE;}
        else{ ?>
            <div class='faq_tabs'>
        <?php }

        $args = array(
            'post_type' => 'faq_category',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'faq_category-type',
                    'field' => 'name',
                    'terms' => $term->name
                )
            )
        );


        $partnersList = new WP_Query( $args );

        if($partnersList->have_posts()) {

            while($partnersList->have_posts()) {
                $partnersList->the_post();
                $title      = get_the_title();
                $content      = get_the_content();
                ?>
                <div class="line">
                    <div class="question">
                        <h6><?php echo $title;?></h6>
                    </div>
                    <div class="answer">
                        <p><?php echo $content;?></p>
                    </div>
                </div>
                <?php
            }

        }

        wp_reset_postdata();

        ?>
    </div>
    </div>
<?php
    }?>
</div>
    <?php
}
add_shortcode('faq_shortcode_category', 'short_code_faq_category');
?>