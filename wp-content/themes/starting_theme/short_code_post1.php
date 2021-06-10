<?php

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args4 = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'paged'          => $paged,
        'posts_per_page' => 4
    ];

    $query = new WP_QUery( $args4 );

    function new_excerpt_length_3($length) {
        return 30;
    }
    add_filter('excerpt_length', 'new_excerpt_length_3');

    if ( $query->have_posts() ) : ?>
        <div class="home_blog_container1">
        <div class="row">
            
            <?php while ( $query->have_posts() ) : $query->the_post();
                $id         = get_the_ID();
                $permalink  = get_the_permalink();
                $image      = get_the_post_thumbnail_url( $id, 'full' );
                $title      = get_the_title();
                $date       = get_the_date();
                $categories = get_the_terms( $id, 'category' );
                $cat        = $categories[0]->name;
                $excerpt    = get_the_excerpt(); ?>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="press_item">
                        <a href="<?php echo $permalink; ?>" class="press_item_img">
                            <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
                        </a>
                        <div class="press_item_wrapper">
                            <h6 class="press_item_cat"><?php echo $date; ?></h6>
                            <a class="press_item_title" href="<?php echo $permalink; ?>">
                                <h4><?php echo $title; ?></h4>
                            </a>
                            <p class="press_item_excerpt"><?php echo $excerpt; ?></p>
                        </div>
                    </div>
                </div>
            <?php
            endwhile; ?>
        </div>
        </div>
    <?php
    endif;
    wp_reset_postdata(); ?>



