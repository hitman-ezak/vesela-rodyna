<?php
/**
 * The template for displaying Category pages.
 */
get_header();?>
<?php get_sidebar('novosti'); ?>
<section class="content-news">


    <?php while (have_posts()) : the_post(); ?>
        <article class="post-box">
            <header class="post-header">
                <div class="post-title">
                    <?php //the_date('d.m.'); ?>
                    <div class="title-holder"><time><p><?php echo get_the_date('d.m.'); ?><br /><span><?php echo get_the_date('Y'); ?></span></p></time></div>
                </div>
            </header>
            <article class="post-news">
                <figure>
                    <?php the_post_thumbnail('medium')?>
                    <figcaption>
                        <h3><a href="<?php the_permalink() ?>"><?php echo the_title()?></a></h3>
                        <?php echo excerpt(15) ?>
                    </figcaption>
                </figure>
            </article><!--post news-->
        </article><!--post box1-->
    <?php endwhile; // end of the loop. ?>
<div class="page-nav">
        <?php wp_pagenavi(); ?>
    </div>

    <!-- <nav class="page-nav">
        <a href="#" class="btn green">Еще новости</a>
    </nav> -->
</section><!--content-->
<?php get_footer(); ?>