<?php
/**
 * The Template for displaying all single posts.
 */
get_header();
?>
<?php while (have_posts()) : the_post(); ?>
    <section class="content post-ful">
        <article class="news-post-ful">



            <header class="post-ful-title">
                <h2><?php the_title() ?></h2>
                <time><?php the_date() ?></time>
            </header>
            <div class="news-post-ful-holder">           
                <article>
                    <?php the_content()?>
                </article>

            </div><!--news post-ful holder-->
        </article><!--news-box ful-->
    </section><!--content-->
<?php endwhile; // end of the loop.  ?>
<?php get_footer(); ?>