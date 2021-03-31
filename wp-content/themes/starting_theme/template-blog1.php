<?php
/*
*   Template Name: blog-1
*/
get_header();
?>
<section class="blog_page_top_section" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?php the_title();?></h1>
                <h5><?php the_content();?></h5>
            </div>
        </div>
    </div>
</section>

<section class="blog_page_section_1">
    <div class="container content_blog_1">
            <div class="row news_block_1">

                <?php
                global $wp_query;
                $temp_query = $wp_query;
                $pages=6;
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args2 = array('post_type' => 'post', 'posts_per_page' => 6, 'post_status' => 'publish','paged' => $paged, 'orderby' => 'menu_order', 'order' => 'asc');

                $query = new WP_Query($args2);
                $i = 1;
                if (isset($query->posts)) {
                    foreach ($query->posts as $key=>$val) {
                        $id         = $val->ID;
                        $permalink  = get_the_permalink($id);
                        $image      = get_the_post_thumbnail_url( $id, 'full' );
                        $title      = get_the_title($id);
                        $date       = get_the_date();
                        $categories = get_the_terms( $id, 'category' );
                        $cat        = $categories[0]->name;
                        $excerpt    = get_the_excerpt( $id );
                            ?>

                            <div class="col-lg-4 col-md-6">
                                <div class="press_item_1">
                                    <a href="<?php echo $permalink; ?>" class="press_item_img_1">
                                        <div class="press_item_img_1">
                                            <img src="<?php echo $image;?>" alt="<?php echo $title; ?>">
                                        </div>
                                        <div class="press_item_wrapper_1">
                                            <span class="press_item_date_1"><?php echo $date; ?></span>
                                            <h4><?php echo $title; ?></h4>
                                            <p class="press_item_excerpt_1"><?php echo $excerpt; ?></p>
                                            <h6 class="press_item_read_more_1">
                                                Read More </h6>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <?php
                    }
                ?>

    </div>
                    <div class="row" id="row_posts"></div>
                    <?php

                    if ($query->max_num_pages > 1) {
                        ?>
                        <div class="blog_btn_ajax">
                            <a class="btn-loadmore btn-loadmore-post" href="#">
                                load more <i class="far fa-arrow-right"></i>
                            </a>
                            <script>
                                var count_list=<?php print $pages;?>;
                                var count_page=<?php print $query->max_num_pages;?>;
                                var current_page=1;
                                var toins='row_posts';
                            </script>

                        </div>

</div>
</section>
                    <?php
                    }
                }


wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query;

?>
<?php get_footer(); ?>