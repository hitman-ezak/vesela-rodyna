<?php
/**
 * Template Name: Рецепты
 */
get_header();
?>
<?php get_sidebar('recipes'); ?>
<section class="content">
    <?php
    $args = array('post_type' => 'recipes', 'recipes_taxonomy' => 'zakyski', 'posts_per_page' => 9);
    $recipes = new WP_Query($args);
    if ($recipes->have_posts()) :
        while ($recipes->have_posts()) :
            $recipes->the_post();?>
            <article class="post-box all-recipes">
                <h3><a href="<?php echo $recipes->post->guid ?>"><?php echo $recipes->post->post_title ?></a></h3>
                <figure>
                    <?php the_post_thumbnail('medium') ?>
                    <figcaption>
                        <p><?php echo excerpt(20) ?></p>
                    </figcaption>
                </figure>
            </article>
            <?php endwhile; else:?>
        Nothing found
    <?php endif; wp_reset_postdata();?>
    <div class="page-nav">
        <a class="btn green" href="#">Предыдущие</a>
        <ul>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a class="active" href="#">3</a></li>
        </ul>
    </div>
</section><!--content-->
<?php get_footer(); ?>