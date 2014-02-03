<?php
/**
 * Template Name: Страница Майонез
 */
get_header();
?>
<script>
    jQuery(document).ready(function($) {
           $('#menu-item-209').addClass('active');
});
</script>
<?php get_sidebar('novosti'); ?>

<section class="content">
    <?php while (have_posts()) : the_post(); ?>







        <article class="post_mayo">
            <article class="paper_mayo">
                <figure>
                    <img src="<?php bloginfo('template_url') ?>/img/mayo-img1.png" width="380" height="404" alt="Легендарный соус">
                    <figcaption>
                        <h3><?php the_title() ?><h3>

                                <?php the_content() ?>
                            <?php endwhile; // end of the loop.  ?>
                            </section><!--content-->
                            <?php get_footer(); ?>