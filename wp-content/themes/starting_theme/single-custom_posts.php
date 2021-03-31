<?php
get_header();
$args = [
    'post_type'     => 'Custom_Post',
    'post_status'   => 'publish',
    'post_per_page' => -1
];

$query = new WP_Query($args);
?>


    <div class="container single_press_top_content">
        <h1 class="h3"><?php the_title(); ?></h1>
        <h5 class="press_item_date"><?php echo get_the_date(); ?></h5>
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
    </div>
    <div class="container single_press_content">
<?php if ($query->have_posts()) : ?>
    <?php  while ($query->have_posts()) : $query->the_post(); ?>
            <?php the_content();?>

        <?php endwhile; endif; ?>

    </div>

<?php get_footer('blog');