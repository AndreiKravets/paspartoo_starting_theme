<?php
/*
*   Template Name: template-3
*/
get_header("3");
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>


<?php endwhile; endif; ?>

<?php get_footer("3"); ?>
