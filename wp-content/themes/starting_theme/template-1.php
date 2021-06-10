<?php
/*
*   Template Name: template-1
*/
get_header("1");
?>
<h1>1111</h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>


<?php endwhile; endif; ?>

<?php get_footer("1"); ?>
