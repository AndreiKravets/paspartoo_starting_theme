<?php
$blog_post_id =get_option('page_for_posts');
$blog_post=get_post($blog_post_id);
$bg_img = get_the_post_thumbnail_url($blog_post_id, 'full');
?>
<section class="blog_page_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?php echo $blog_post->post_title; ?></h1>
                Tactical insights for growing brands.
            </div>
        </div>
    </div>



<div class="container content_blog">
    <div class="row row_all_news">
        <div class="col-12">
            <div class="row news_block">

                <?php
                global $wp_query;
                $i = 1;
                if (isset($wp_query->posts)) {
                    foreach ($wp_query->posts as $key=>$val) {
                        $id         = $val->ID;
                        $permalink  = get_the_permalink($id);
                        $image      = get_the_post_thumbnail_url( $id, 'full' );
                        $title      = get_the_title($id);
                        $date       = get_the_date($id);
                        $categories = get_the_terms( $id, 'category' );
                        $cat        = $categories[0]->name;
                        $excerpt    = get_the_excerpt( $id );
                        if ($i == 1) { ?>
                            <div class="col-md-12">
                                <div class="press_item" style="background-image: url(<?php echo $image;?>)">
                                    <a href="<?php echo $permalink; ?>" class="press_item_img">
                                        <div class="press_item_wrapper">
                                                <h4><?php echo $title; ?></h4>
                                            <h5 class="press_item_date"><?php echo get_the_date(); ?></h5>
                                        </div>
                                        <img src="/wp-content/uploads/2021/02/Group-23.svg" alt="">
                                    </a>

                                </div>
                            </div>
                            <?php
                        }
                        else {
                            ?>

                            <div class="col-md-6">
                                <div class="press_item" style="background-image: url(<?php echo $image;?>)">
                                    <a href="<?php echo $permalink; ?>" class="press_item_img">
                                        <div class="press_item_wrapper">
                                            <h4><?php echo $title; ?></h4>
                                            <h5 class="press_item_date"><?php echo get_the_date(); ?></h5>
                                        </div>
                                        <img src="/wp-content/uploads/2021/02/Group-23.svg" alt="">
                                    </a>

                                </div>
                            </div>
                            <?php
                        }
                        $i++;
                    }
                }
                ?>



            </div>
        </div>
    </div>
    <div class="row"><div class="col-md-12 press_pagination">
            <?php
            the_posts_pagination( array(
                'prev_text'          => '<i class="fal fa-angle-left"></i>',
                'next_text'          => '<i class="fal fa-angle-right"></i>',
                'before_page_number' => '',
                'screen_reader_text' =>''
            ) );

            ?>
        </div></div>
</div>
</section>