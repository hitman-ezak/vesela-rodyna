<?php
/**
 * The Template for displaying all single posts.
 */
get_header();
?>
<script>
    jQuery(document).ready(function($) {
           $('#menu-item-160').addClass('current-menu-item');
           $('#menu-item-209').addClass('active');
});
</script>
<?php get_sidebar(); ?>
<?php get_sidebar('novosti'); ?>
<?php while (have_posts()) : the_post(); ?>
<section class="content post-ful">
    <article class="news-post-ful">
        

            
                <header class="post-ful-title">
                    <h2><?php the_title() ?></h2>
                    <time><?php the_date() ?></time>
                </header>
                <div class="news-post-ful-holder">           
                <article>
                    <?php the_content() ?>
                </article>
            
            <footer class="foot-news">							
                <div class="post-box-news-holder">
                    
                    <?php $prev_post = get_previous_post();
                          $next_post = get_next_post();
                          $prevthumbnail = get_the_post_thumbnail($prev_post->ID, 'medium');
                          $nextthumbnail = get_the_post_thumbnail($next_post->ID, 'medium');
                     ?>
                    
                    
                     <?php if(!empty($next_post)):?>
                    <article class="post-box all-recipes2 prev_post">
                        <header class="post-header">
                            <div class="post-title">
                                <div class="title-holder"><time><p><?php echo get_the_date('d.m.', $next_post->ID); ?><br /><span><?php echo get_the_date('Y', $next_post->ID)?></span></p></time></div>
                            </div>
                        </header>
                        <article class="post-news">
                            <figure>
                                <?php echo $nextthumbnail?>
                                <figcaption>
                                    <h3><a href="<?php echo $next_post->guid?>"><?php echo $next_post->post_title?></a></h3>
                                    <?php echo content_custom(10, $next_post->post_content)?>
                                </figcaption>
                            </figure>
                        </article><!--post news-->
                    </article><!--post box1-->
                    <?php endif?>
                     <?php if(!empty($prev_post)):?>
                    <article class="post-box all-recipes2 next_post">
                        <header class="post-header">
                            <div class="post-title">
                                <div class="title-holder">
                                    <time><p><?php echo get_the_date('d.m.', $prev_post->ID); ?><br /><span><?php echo get_the_date('Y', $prev_post->ID)?></span></p></time>
                                </div>
                            </div>
                        </header>
                        <article class="post-news">
                            <figure>
                                <?php echo $prevthumbnail?>
                                <figcaption>
                                    <h3><a href="<?php echo $prev_post->guid?>"><?php echo $prev_post->post_title?></a></h3>
                                    <?php echo content_custom(10, $prev_post->post_content)?>
                                </figcaption>
                            </figure>
                        </article><!--post news-->
                    </article><!--post box2-->
                    <?php endif?>
                    
                </div><!--post box news holder-->
                
                <div class="news-nav">
                    <?php if(!empty($next_post)):?><a href="<?php echo $next_post->guid?>" class="prev-news">Предыдущая новость</a><?php endif?>
                    <?php if(!empty($prev_post)):?><a href="<?php echo $prev_post->guid?>" class="next-news">Следующая новость</a><?php endif?>
                </div>
            </footer>


        </div><!--news post-ful holder-->
    </article><!--news-box ful-->
</section><!--content-->
<?php endwhile; // end of the loop.  ?>
<?php get_footer(); ?>