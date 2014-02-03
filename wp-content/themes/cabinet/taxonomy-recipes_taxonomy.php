<?php

/**
 * The template
 */
get_header();?>
<script>
    jQuery(document).ready(function($) {
           $('#menu-item-138').addClass('current-menu-item');
});
</script>
<?php get_sidebar('recipes'); ?>
<section class="content recipes-content-holder">
    <?php if(have_posts()){?>
    <?php  while (have_posts()) : the_post();?>
            <article class="post-box all-recipes">
                <h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
                <figure>
                    <?php the_post_thumbnail('medium') ?>
                    <figcaption>
                        <p><?php echo excerpt(20) ?></p>
                    </figcaption>
                </figure>
            </article>
            <?php endwhile;?>
    <div class="page-nav">
        <?php wp_pagenavi(); ?>
    </div>
    <?php }else{?>
    <p>Данная категория пуста</p>
    <?php }?>
</section><!--content-->
<?php get_footer(); ?>