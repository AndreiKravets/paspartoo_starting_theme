<?php get_header();
$blog_post_id =get_option('custom_posts');
$blog_post=get_post($blog_post_id);
$main_id=0;$content='';
$bg_img = get_the_post_thumbnail_url($blog_post_id, 'full');
$pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'template-custom_posts.php'
));
if (isset($pages[0]->ID)) { $main_id=$pages[0]->ID; $content=$pages[0]->post_content;  }
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <ul class="blog_link">
                <?php
                $cat = get_term_by('name', single_cat_title('',false), 'custom_post-type');
                $args1 = array('taxonomy' => 'custom_post-type','hide_empty' => false,'orderby'=>'name','order'=>'asc');
                $terms = get_terms( $args1 );
                $my_posts = get_posts($args1);
                print '<li  ><a href="'.get_the_permalink($main_id).'">'.__('All','themename').'</a>';
                foreach ($terms as $termses) :
                    if ($termses->slug!='uncategorized') {
                        print '<li '.(($termses->term_id==$cat->term_id) ? 'class="active"' : '').'><a href="'.get_term_link($termses->term_id).'">'.$termses->name.'</a>';
                    }
                endforeach;
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="container content_blog">
    <div class="row row_all_news">
        <div class="col-12">
            <div class="row news_block">
                <?php

                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();

                        $id         = get_the_ID();
                        $permalink  = get_the_permalink();
                        $image      = get_the_post_thumbnail_url( $id, 'full' );
                        $title      = get_the_title();
                        $date       = get_the_date('m/d/Y');
                        $categories = get_the_terms( $id, 'custom_post-type' );
                        $cat        = $categories[0]->name;
                        $excerpt    = get_the_excerpt( $id ); ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                            <div class="press_item">
                                <a href="<?php echo $permalink; ?>" class="press_item_img">
                                    <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
                                </a>
                                <div class="press_item_wrapper">
                                    <p class="press_item_cat"><?php echo $date; ?></p>

                                    <a class="press_item_title" href="<?php echo $permalink; ?>">
                                        <h3><?php echo $title; ?></h3>
                                    </a>
                                    <p class="press_item_excerpt"><?php echo $excerpt; ?></p>
                                    <div class="blog_btn_wrapper">
                                        <a class="press_item_link" href="<?php echo $permalink; ?>">
                                            Read More
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif;
                ?>
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
    </div>
<?php get_footer();