<?php
/**
 * Template Name: Страница истории
 */
get_header();
?>
<script>
    jQuery(document).ready(function($) {
           $('#menu-item-209').addClass('active');
});
</script>
<?php get_sidebar('novosti'); ?>
        <?php while (have_posts()) : the_post(); ?>
			<section class="content">
				<article class="history-post">
					<header class="history-title">
						<h3><?php the_title(); ?></h3>
            <?php the_content() ?>
        <?php endwhile; // end of the loop.  ?>
    		</section>
<?php get_footer(); ?>