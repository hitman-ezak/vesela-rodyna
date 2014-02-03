<?php
/**
 * The template
 */
get_header();
?>
<?php $queried_object = get_queried_object()?>
<script>
    jQuery(document).ready(function($) {
           $('#menu-item-17').addClass('active');
});
</script>
<section class="catalog-content kethup-ful">
    <?php global $wp_query; ?>
    <?php $count_posts = $wp_query->found_posts ?>
    <?php $c=1; while (have_posts()) : the_post(); ?>
        <?php $sostav = simple_fields_get_post_group_values(get_the_id(), 6, false, 1); ?>
        <?php $pit_cennost = simple_fields_get_post_group_values(get_the_id(), 7, false, 1); ?>
        <?php $calorinost = simple_fields_get_post_group_values(get_the_id(), 8, false, 1); ?>

        <?php
        $element = '';
        $count = '';
        ?>
        <?php
        foreach ($pit_cennost as $selected_value => $mass) {
            //echo $selected_value; break;
            if ($selected_value == 1) {
                foreach ($mass as $key) {
                    $element[] = $key;
                }
            } elseif ($selected_value == 2) {
                foreach ($mass as $key) {
                    $count[] = $key;
                }
            }
        }
        ?>

        <article class="catalog-post <?php
        if ($count_posts != 1) {
            echo 'big';
        }
        ?>">
    <?php $thumbnail_id = get_post_thumbnail_id(get_the_id()); ?> 
            <?php $image = wp_get_attachment_image_src($thumbnail_id, 'large'); ?>
            <div class="catalog-img-holder">
                <img src="<?php echo $image[0] ?>"  alt="Кетчуп нежный">
            </div>
            <?php if ($queried_object->term_id == 4) { ?>
                <h3 class="mayo-blue"><?php the_title() ?></h3>
            <?php } elseif ($queried_object->term_id == 5 || $queried_object->term_id == 6 || $queried_object->term_id == 7) { ?>
            <h3 class="mayo-red"><?php the_title() ?></h3>
            <?php } elseif ($queried_object->term_id == 8) { ?>
            <h3 class="mustard-yellow"><?php the_title() ?></h3>
            <?php } ?>
    <?php the_content() ?>
            <article class="composition">
                <h4>Состав</h4>
                <p><?php echo $sostav[1][0] ?></p>
                
                                                        <?php if ($queried_object->term_id == 4) { ?>
                <a href="#dialog<?php echo $c?>" name="modal" class="btn green">Асcортимент</a>
                                                        <?php } elseif ($queried_object->term_id == 5 || $queried_object->term_id == 6 || $queried_object->term_id == 7) { ?>
                                                            <a href="#dialog<?php echo $c?>" name="modal" class="btn red">Асcортимент</a>                                                       
                                                        <?php } elseif ($queried_object->term_id == 8) { ?>
                                                            <a href="#dialog<?php echo $c?>" name="modal" class="btn yellow">Асcортимент</a>
                                                        <?php } ?>
                
                
                
            </article>
            <article class="features-box">
                <article class="features">
                    <figure>
                        <img src="<?php bloginfo('template_url') ?>/img/features-img1.png" width="30" height="30" alt="Питательная ценность">
                        <figcaption>
                            <h5>Питательная ценность</h5>
                            <p>100 г продукта</p>
                            <ul>
    <?php for ($i = 0; $i < count($element); $i++): ?>
                                    <li><?php echo $element[$i] ?> — <?php echo $count[$i] ?></li>
    <?php endfor; ?>
                            </ul>
                        </figcaption>
                    </figure>
                </article>
                <article class="features">
                    <figure>
                        <img src="<?php bloginfo('template_url') ?>/img/features-img2.png" width="30" height="30" alt="Калорийность">
                        <figcaption>
                            <h5>Калорийность</h5>
                            <p>100 г продукта</p>
                            <ul>
                                <li><?php echo $calorinost[1][0] ?></li>
                            </ul>
                        </figcaption>
                    </figure>
                </article>
            </article>
        </article>

<?php $c++; endwhile; // end of the loop.   ?>


    <article class="use-by">
        <figure>
            <img src="<?php bloginfo('template_url')?>/img/use-by-img.png" width="48" height="48" alt="Срок хранения">
            <figcaption><h5>Срок хранения<h5></figcaption>
                        </figure>
        
                            <?php if ($queried_object->term_id == 4) {
                                echo simple_fields_value( 'mayonez', 211, 1 );
                            } elseif ($queried_object->term_id == 5) {
                                echo simple_fields_value( 'ketchup', 211, 1 );
                            } elseif ($queried_object->term_id == 6) {
                                echo simple_fields_value( 'sous', 211, 1 );
                            } elseif ($queried_object->term_id == 7) {
                                echo simple_fields_value( 'pasta', 211, 1 );
                            } elseif ($queried_object->term_id == 8) {
                                echo simple_fields_value( 'gorchca', 211, 1 );
                            }?>
                            
                            
                        </article><!--use-by-->
                        <footer class="catalog-content-foot">
                            <h2>А также обратите внимание:</h2>
                            <article class="more-product">

                                <?php
                                if(is_taxonomy('product_taxonomy')){
                                    $current_cat = get_query_var('product_taxonomy');
                                    $previous = -1;
                                    $next = 0;
                                    $count = 0;
                                    $args = array(
                                        'orderby' => 'name',
                                        'order' => 'ASC',
                                        'hierarchical' => 0,
                                        'hide_empty' => 1,
                                        'taxonomy' => 'product_taxonomy'
                                    );
                                    $categories = apply_filters('taxonomy-images-get-terms', '', $args);
                                    
                                    $categories_sorted = array();
                                    foreach ($categories as $cat) {
                                        
                                        if ($cat->slug == 'mayonez') {
                                            $categories_sorted[0] = $cat;
                                        }
                                        if ($cat->slug == 'ketchup') {
                                            $categories_sorted[1] = $cat;
                                        }
                                        if ($cat->slug == 'soys') {
                                            $categories_sorted[2] = $cat;
                                        }
                                        if ($cat->slug == 'tomat-pasta') {
                                            $categories_sorted[3] = $cat;
                                        }
                                        if ($cat->slug == 'gorchica') {
                                            $categories_sorted[4] = $cat;
                                        }
                                    }
                                    foreach ($categories_sorted as $cat => $key) {
                                        $count++;
                                        if ($key->slug == $current_cat) {
                                            $next = $cat+1;
                                        }
                                        if ($cat == 0) {
                                            $first = $key;
                                        }
                                    }
                                    ?>
                                    <?php
                                    if($next<5 && $next<count($categories_sorted)){
                                        $image = wp_get_attachment_image_src($categories_sorted[$next]->image_id, 'full')?>
                                        <figure>
                                            <img src="<?php echo $image[0];?>none.png">
                                            <figcaption>
                                                <?php if ($queried_object->term_id == 5) { ?>
                                                    <h3 class="mayo-red"><?php echo $categories_sorted[$next]->name ?></h3>
                                                <?php } elseif ($queried_object->term_id == 4 || $queried_object->term_id == 6 || $queried_object->term_id == 8) { ?>
                                                    
                                                    <?php if($queried_object->term_id == 6){?>                                                        
                                                <h3 class="mayo-red">Томатная паста и пюре</h3>
                                                <?php }else{ ?>
                                                    <h3 class="mayo-red"><?php echo $categories_sorted[$next]->name ?></h3>
                                                <?php } ?>
                                                <?php } elseif ($queried_object->term_id == 7) { ?>
                                                <h3 class="mustard-yellow"><?php echo $categories_sorted[$next]->name ?></h3>
                                                <?php } ?>
                                                
                                                <p><?php echo $categories_sorted[$next]->description ?></p>
                                                <?php if ($queried_object->term_id == 5) { ?>
                                                    
                                                    <a href="<?php echo get_term_link((int) $categories_sorted[$next]->term_id, 'product_taxonomy') ?>" class="btn red">Подробнее</a>
                                                <?php } elseif ($queried_object->term_id == 4 || $queried_object->term_id == 6 || $queried_object->term_id == 8) { ?>
                                                <a href="<?php echo get_term_link((int) $categories_sorted[$next]->term_id, 'product_taxonomy') ?>" class="btn red">Подробнее</a>
                                                <?php } elseif ($queried_object->term_id == 7) { ?>
                                                
                                                <a href="<?php echo get_term_link((int) $categories_sorted[$next]->term_id, 'product_taxonomy') ?>" class="btn yellow">Подробнее</a>
                                                <?php } ?>
                                            </figcaption>
                                        </figure>

                                    <?php }else{
                                        $image = wp_get_attachment_image_src($first->image_id, 'full')?>
                                        <figure>
                                            <img src="<?php echo $image[0];?>none.png">
                                            <figcaption>
                                                <h3 class="mayo-blue"><?php echo $first->name ?></h3>
                                                <p><?php echo $first->description ?></p>
                                                <a href="<?php echo get_term_link((int) $first->term_id, 'product_taxonomy') ?>" class="btn blue">Подробнее</a>
                                            </figcaption>
                                        </figure>
                                        <?php                                   
                                    }
                                }?>
                            </article><!--more producte-->
                            
                            
                            
                             <?php
    $args = array('post_type' => 'recipes','meta_key' => '_simple_fields_fieldGroupID_5_fieldID_2_numInSet_0',
   'orderby' => 'rand',
   'meta_query' => array(
       array(
           'key' => '_simple_fields_fieldGroupID_5_fieldID_2_numInSet_0',
           'value' => $queried_object->term_id,
           'compare' => 'LIKE',
       )
   ), 'posts_per_page' => 1, );
    
    $recipes = new WP_Query($args);
    if ($recipes->have_posts()) :
        while ($recipes->have_posts()) :
            $recipes->the_post();?>
            <article class="more-recipes">
                                <h3><?php echo $recipes->post->post_title?></h3>
                                <figure>
                                    <?php the_post_thumbnail('large')?>
                                    <figcaption>
                                        <?php echo content(15)?>
                                        <a href="<?php echo $recipes->post->guid?>" class="btn green">Подробнее</a>
                                    </figcaption>
                                </figure>

                            </article>
            <?php endwhile; else:?>
    <?php endif; wp_reset_postdata();?>
                        </footer><!--catalog content foot-->
                        </section><!--catalog content-->                        

<?php get_footer(); ?>
                        
                        

    
  <?php $c=1; while (have_posts()) : the_post(); ?>
    
    <?php  $asortiment = simple_fields_get_post_group_values(get_the_id(), 11, false, 2)?>
    <?php $count_assort = count($asortiment)?>
                        <?php if($count_assort > 1 && $count_assort < 3) $class='modal_3'?>
                        <?php if($count_assort > 3 && $count_assort < 6) $class='modal_6'?>
                        <?php if($count_assort > 6 && $count_assort < 9) $class='modal_9'?>
                        <?php if($count_assort > 9 && $count_assort < 12) $class='modal_12'?>
                        <?php if($count_assort > 12 && $count_assort < 15) $class='modal_15'?>
                        
    <div class="<?php echo $class?>" id="boxes" >
    <div id="dialog<?php echo $c?>" class="window">
            <header class="modal-title">
                <div class="catalog-title"><p>Ассортимент</p></div>
                <h2><?php the_title()?><a href="#" class="close"/>Закрыть его</a></h2>
            </header>
            <div class="modal-post">           
                
                    <?php foreach($asortiment as $item):
                    $image = wp_get_attachment_image_src($item[1], 'thumbnail')?>
                    <figure>
                        <img src="<?php echo $image[0]?>" alt="Асортимент">
                        <figcaption>
                            <p><?php echo $item[2]?></p>
                        </figcaption>
                    </figure>
                    <?php endforeach?>
                
            </div> 
            
        </div>
    <div id="mask"></div>
    </div>
    <?php $c++; endwhile?>
        