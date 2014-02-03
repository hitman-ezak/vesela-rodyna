<?php
/**
 * Template Name: Страница истории
 */
get_header();
?>
<?php get_sidebar('novosti'); ?>
        <?php while (have_posts()) : the_post(); ?>
			<section class="content">
				<article class="history-post">
					<header class="history-title">
						<h3><?php the_title(); ?></h3>
            <?php the_content() ?>
        <?php endwhile; // end of the loop.  ?>
<?php get_footer(); ?>