<?php
//Register custom post type our works

function add_post_type_works() {
    $post_type_labels = array(
        'name'              => __( 'Our work', 'themename' ),
        'singular_name'     => __( 'Our work', 'themename' ),
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
        'menu_icon'          => 'dashicons-analytics',
        'menu_position'      => 5,
        'description'        => $description,
        'supports'           => array( 'title', 'thumbnail', 'editor', 'page-attributes' ),
        'rewrite'            => array( 'slug' => 'our_works', 'with_front' => false )
    );
    register_post_type( 'our_works', $post_type_args );
    // reviews post type end
}
add_action( 'init', 'add_post_type_works' );


function short_code_output_post()
{

    global $wp_query;
    $temp_query = $wp_query;
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args3 = array('post_type' => 'our_works', 'posts_per_page' => 6, 'paged'=> $paged, 'post_status' => 'publish', 'orderby' => 'menu_order', 'order' => 'asc');
    $posts = new WP_Query($args3);



if ( $posts->have_posts() ) : ?>
    <div class="row">
        <?php while ( $posts->have_posts() ) : $posts->the_post();
            $id         = get_the_ID();
            $permalink  = get_the_permalink();
            $image      = get_the_post_thumbnail_url( $id, 'full' );
            $title      = get_the_title();
            $date       = get_the_date();
            $categories = get_the_terms( $id, 'category' );
            $cat        = $categories[0]->name;
            $excerpt    = get_the_excerpt(); ?>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="press_item">
                    <a href="<?php echo get_home_url().'/our-work/#'.$id?>" class="press_item_img">
                        <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">

                    <div class="press_item_wrapper">

                            <h5><?php echo $title; ?></h5>
                        <p class="press_item_excerpt"><?php echo $excerpt; ?></p>
                        <div class="home_news_btn">
                            READ MORE
                        </div>
                    </a>
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
add_shortcode('our_works_post', 'short_code_output_post');

function short_code_single_our_work()
{

    global $wp_query;
    $temp_query = $wp_query;
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array('post_type' => 'our_works', 'posts_per_page' => -1, 'paged'=> $paged, 'post_status' => 'publish', 'orderby' => 'menu_order', 'order' => 'asc');
    $posts = new WP_Query($args);



if ( $posts->have_posts() ) : ?>
<div class="container">
    <div class="row">
        <div class="col-lg-3 work_menu_container">
            <nav class="work_link">
                <ul>
        <?php while ( $posts->have_posts() ) : $posts->the_post();
            $id         = get_the_ID();
            $permalink  = get_the_permalink();
            $image      = get_the_post_thumbnail_url( $id, 'full' );
            $title      = get_the_title();
            $date       = get_the_date();
            $categories = get_the_terms( $id, 'category' );
            $cat        = $categories[0]->name;
            $excerpt    = get_the_excerpt();
            $content = get_the_content();?>
            <li class="link_anchor_div"><a href="<?php echo '#' .$id;?>" class="anchor_link"><?php echo $title;?> </a></li>
        <?php
        endwhile; ?>
                </ul>
                </nav>
        </div>
        <div class="col-lg-9 col-md-12 work_content">
            <div class="work_item sections" >
        <?php while ( $posts->have_posts() ) : $posts->the_post();
            $title      = get_the_title();
            $content = get_the_content();
            $id      = get_the_ID();?>

<div class="work_content_item" id="<?php echo $id;?>">
            <h2><?php echo $title;?></h2>
            <p><?php echo $content;?> </p>
            <div><img src="<?php echo $image;?>"  alt="">
            </div>
</div>

       <?php endwhile; ?>
        </div>
        </div>
    </div>
</div>
<?php
endif;
wp_reset_postdata();
    $wp_query = NULL;
    $wp_query = $temp_query;

}
add_shortcode('our_works_single', 'short_code_single_our_work');

?>
