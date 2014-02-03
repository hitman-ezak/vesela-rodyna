<?php
/**
 * The template
 */
get_header();
?>
<script>
    jQuery(document).ready(function($) {
           $('#menu-item-138').addClass('current-menu-item');
});
</script>
<?php get_sidebar('recipes'); ?>
<section class="content post-ful">
    <article class="news-post-ful recipes-ful">
        

            <?php while (have_posts()) : the_post(); ?>
                <?php $sostav = simple_fields_get_post_group_values(get_the_id(), 3, false, 1); ?>
                <?php $count_porc = simple_fields_get_post_group_values(get_the_id(), 5, false, 1); ?>
                <?php $steps = simple_fields_get_post_group_values(get_the_id(), 2, false, 1); ?>
                <?php $p_s = simple_fields_get_post_group_values(get_the_id(), 4, false, 1); ?>
            
                <?php foreach ($sostav as $selected_value => $mass) {
                    //echo $selected_value; break;
                    if ($selected_value == 1) {
                        foreach ($mass as $key) {
                            $ingredient[] = $key;
                        }
                    } elseif ($selected_value == 2) {
                        foreach ($mass as $key) {
                            $count[] = $key;
                        }
                    }
                }?>
                <?php foreach ($steps as $selected_value => $mass) {
                    if ($selected_value == 1) {
                        foreach ($mass as $key) {
                            $step[] = $key;
                        }
                    } elseif ($selected_value == 2) {
                        foreach ($mass as $key) {
                            $img[] = $key;
                        }
                    }
                }?>
                <header class="post-ful-title">
                    <h2><?php the_title() ?></h2>
                    <?php the_content() ?>
                </header>
                <div class="news-post-ful-holder">
                <article class="recipes-post">
                    <article class="recipes-post-box">
                        <figure>
                            <?php the_post_thumbnail('large') ?>
                            <figcaption>
                                <h4>Ингридиенты</h4>
                                <p>на <?php echo $count_porc[1][0] ?> порции</p>
                                <table>
                                    <?php for ($i = 0; $i < count($ingredient); $i++): ?>
                                        <tr>
                                            <td><?php echo $ingredient[$i] ?></td>
                                            <td><?php echo $count[$i] ?></td>
                                        </tr>
                                    <?php endfor;?>
                                </table>
                            </figcaption>
                        </figure>
                    </article><!--recipes post box1-->
                    <?php $st = 1; for ($i = 0; $i < count($step); $i++):?>
        <?php $image = wp_get_attachment_image_src($img[$i], 'large'); ?>
                        <article class="recipes-post-box">
                            <figure>
                                <img src="<?php echo $image[0] ?>" width="<?php echo $image[1] ?>" height="<?php echo $image[2] ?>" alt="Как приготовить вареники">
                                <figcaption>
                                    <h3><?php echo $st ?>.</h3>
                                    <p><?php echo $step[$i] ?></p>
                                </figcaption>
                            </figure>
                        </article>
                        <?php $st++; endfor;?>
                    
                    <h6><?php echo $p_s[1][0] ?></h6>		
                </article>
                <footer class="recipes-ful-foot">
                    <?php $prev_post = get_previous_post();
                          $next_post = get_next_post();
                          $prevthumbnail = get_the_post_thumbnail($prev_post->ID, 'medium');
                          $nextthumbnail = get_the_post_thumbnail($next_post->ID, 'medium');
                     ?>
                    
                    <h2>Приятного апетита!</h2>

                    <div class="post-box-news-holder">
                        
                        
                        <?php if(!empty($next_post)):?>
                        <article class="post-box all-recipes prev_post">
                            <h3><a href="<?php echo $next_post->guid?>"><?php echo $next_post->post_title?></a></h3>
                            <figure>
                                <?php echo $nextthumbnail?>
                                <figcaption>
                                    <?php echo content_custom(15, $next_post->post_content)?>
                                </figcaption>
                            </figure>
                        </article><!--post box4-->
                        <?php endif?>
                        
                        
                        
                        
                        <?php if(!empty($prev_post)):?>
                        <article class="post-box all-recipes next_post">
                            <h3><a href="<?php echo $prev_post->guid?>"><?php echo $prev_post->post_title?></a></h3>
                            <figure>
                                <?php echo $prevthumbnail?>
                                <figcaption>
                                    <?php echo content_custom(15, $prev_post->post_content)?>
                                </figcaption>
                            </figure>
                        </article><!--post box6-->
                        <?php endif?>
                        
                        
                    </div>
                    <div class="news-nav"><?php if(!empty($next_post)):?><a href="<?php echo $next_post->guid?>" class="prev-news">Предыдущий рецепт</a><?php endif?><?php if(!empty($prev_post)):?><a href="<?php echo $prev_post->guid?>" class="next-news">Следующий рецепт</a><?php endif?></div>
                </footer>

<?php endwhile; // end of the loop.     ?>            
        </div><!--news-post-ful-->
    </article><!--news-post-ful-holder-->
</section><!--content-->

<?php //get_sidebar();  ?>
<?php get_footer(); ?>