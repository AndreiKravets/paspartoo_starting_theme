<?php

/*
*   Template Name: Custom Post
*/
?>
<?php   get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>

    <?php   $args = array('taxonomy' => 'custom_post-type','hide_empty' => false);
    $terms = get_terms( $args );?>
    <div class="container custom_category">
        <ul>
            <?php  print '<li  class="active"><a href="'.get_the_permalink(get_the_ID()).'">All</a></li>';
            foreach ($terms as $termses) :

                print '<li  '.$class.'><a href="'.get_term_link($termses->term_id).'">'.$termses->name.'</a></li>';
            endforeach;?>
        </ul>
    </div>
    <div>

        <?php
    global $wp_query;
    $temp_query = $wp_query;
    $pages=6;
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args2 = array('post_type' => 'custom_post', 'posts_per_page' => 6, 'post_status' => 'publish','paged' => $paged, 'orderby' => 'menu_order', 'order' => 'asc');

    $query = new WP_Query($args2);
        ?>

        <?php if ($query->have_posts()) : ?>
        <div class="container content_blog">
        <div class="row news_block">
                <?php while ($query->have_posts()) : $query->the_post();
            $id = get_the_ID();
            $permalink  = get_the_permalink($id);
            $image      = get_the_post_thumbnail_url( $id, 'full' );
            $title      = get_the_title($id);
            $date       = get_the_date($id);
            $categories = get_the_terms( $id, 'category' );
            $cat        = $categories[0]->name;
            $excerpt    = get_the_excerpt( $id );?>
            <div class="col-md-6">
                <div class="press_item">
                    <a href="<?php echo $permalink; ?>" class="press_item_img">
                        <div class="press_item_wrapper">
                            <h4><?php echo $title; ?></h4>
                            <h5 class="press_item_date"><?php echo get_the_date(); ?></h5>
                        </div>
                        <img src="<?php echo $image;?>" alt="<?php echo $title; ?>">
                    </a>

                </div>
            </div>

                <?php
                endwhile;
                endif;
                ?>
                <?php
                wp_reset_postdata();
                $wp_query = NULL;
                $wp_query = $temp_query;
                ?>
            </div>
        </div>


<?php endwhile;
endif; ?>
<?php get_footer(); ?>